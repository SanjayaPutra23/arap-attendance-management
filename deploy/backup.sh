#!/usr/bin/env bash
# ==============================================================================
# Script Otomatisasi Backup Harian ARAP v2 (Database & Berkas Privat)
# Sentra Pelayanan Pemenuhan Gizi (SPPG) Kalisapu
# ==============================================================================
# Dapat didaftarkan pada crontab server (misal pukul 02:00 setiap malam):
# 0 2 * * * /var/www/arap-v2/deploy/backup.sh >> /var/log/arap_backup.log 2>&1
# ==============================================================================

set -euo pipefail

# 1. Konfigurasi Direktori & Variabel
TIMESTAMP=$(date +"%Y%m%d_%H%M%S")
APP_DIR="/var/www/arap-v2"
BACKUP_ROOT="/var/backups/arap"
DB_BACKUP_DIR="${BACKUP_ROOT}/db"
STORAGE_BACKUP_DIR="${BACKUP_ROOT}/storage"
RETENTION_DAYS=30

echo "------------------------------------------------------------------"
echo "[$(date +"%Y-%m-%d %H:%M:%S")] Memulai proses backup ARAP v2..."
echo "------------------------------------------------------------------"

# 2. Buat direktori tujuan backup jika belum ada
mkdir -p "${DB_BACKUP_DIR}"
mkdir -p "${STORAGE_BACKUP_DIR}"

# 3. Baca konfigurasi database dari berkas .env
if [ ! -f "${APP_DIR}/.env" ]; then
    echo "[ERROR] Berkas .env tidak ditemukan pada ${APP_DIR}!"
    exit 1
fi

DB_HOST=$(grep -E '^DB_HOST=' "${APP_DIR}/.env" | cut -d '=' -f2- | tr -d ' "\r')
DB_PORT=$(grep -E '^DB_PORT=' "${APP_DIR}/.env" | cut -d '=' -f2- | tr -d ' "\r')
DB_DATABASE=$(grep -E '^DB_DATABASE=' "${APP_DIR}/.env" | cut -d '=' -f2- | tr -d ' "\r')
DB_USERNAME=$(grep -E '^DB_USERNAME=' "${APP_DIR}/.env" | cut -d '=' -f2- | tr -d ' "\r')
DB_PASSWORD=$(grep -E '^DB_PASSWORD=' "${APP_DIR}/.env" | cut -d '=' -f2- | tr -d ' "\r')

# Default fallback jika tidak diset
DB_HOST=${DB_HOST:-"127.0.0.1"}
DB_PORT=${DB_PORT:-"3306"}

DB_BACKUP_FILE="${DB_BACKUP_DIR}/${DB_DATABASE}_backup_${TIMESTAMP}.sql.gz"

# 4. Dump Database MySQL secara Non-Blocking & Terkompresi
echo "[INFO] Menjalankan mysqldump untuk database '${DB_DATABASE}'..."

# Gunakan MYSQL_PWD untuk keamanan agar password tidak tampil di ps command list
export MYSQL_PWD="${DB_PASSWORD}"

mysqldump --host="${DB_HOST}" \
          --port="${DB_PORT}" \
          --user="${DB_USERNAME}" \
          --single-transaction \
          --quick \
          --routines \
          --triggers \
          --default-character-set=utf8mb4 \
          "${DB_DATABASE}" | gzip -9 > "${DB_BACKUP_FILE}"

unset MYSQL_PWD

DB_SIZE=$(du -h "${DB_BACKUP_FILE}" | cut -f1)
echo "[SUCCESS] Database berhasil dicadangkan: ${DB_BACKUP_FILE} (${DB_SIZE})"

# 5. Arsip Direktori Storage Privat (Foto Selfie & Lampiran Izin)
STORAGE_BACKUP_FILE="${STORAGE_BACKUP_DIR}/storage_private_${TIMESTAMP}.tar.gz"

if [ -d "${APP_DIR}/storage/app/private" ]; then
    echo "[INFO] Mengarsipkan berkas storage/app/private..."
    tar -czf "${STORAGE_BACKUP_FILE}" -C "${APP_DIR}" storage/app/private
    STORAGE_SIZE=$(du -h "${STORAGE_BACKUP_FILE}" | cut -f1)
    echo "[SUCCESS] Berkas privat berhasil diarsipkan: ${STORAGE_BACKUP_FILE} (${STORAGE_SIZE})"
else
    echo "[WARNING] Direktori ${APP_DIR}/storage/app/private tidak ditemukan, melewati backup storage."
fi

# 6. Rotasi Pembersihan Backup Usang (> RETENTION_DAYS hari)
echo "[INFO] Membersihkan arsip backup yang berusia lebih dari ${RETENTION_DAYS} hari..."
find "${DB_BACKUP_DIR}" -type f -name "*.sql.gz" -mtime +"${RETENTION_DAYS}" -exec rm -f {} \;
find "${STORAGE_BACKUP_DIR}" -type f -name "*.tar.gz" -mtime +"${RETENTION_DAYS}" -exec rm -f {} \;

echo "[$(date +"%Y-%m-%d %H:%M:%S")] Seluruh proses backup ARAP v2 SELESAI dengan sukses."
echo "------------------------------------------------------------------"
