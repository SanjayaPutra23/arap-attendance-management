<?php
if(!function_exists('tgl')) {
    function tgl($tanggal, $cetak_hari = false)
    {
        if(is_null($tanggal)){
            return null;
        }
        $hari = array(1 => 'Senin',
            'Selasa',
            'Rabu',
            'Kamis',
            'Jumat',
            'Sabtu',
            'Minggu'
        );

        $bulan = array(1 => 'Januari',
            'Februari',
            'Maret',
            'April',
            'Mei',
            'Juni',
            'Juli',
            'Agustus',
            'September',
            'Oktober',
            'November',
            'Desember'
        );
        $split = explode('-', $tanggal);
        $tgl_ind = $split[2] . ' ' . $bulan[(int)$split[1]] . ' ' . $split[0];

        if ($cetak_hari) {
            $num = date('N', strtotime($tanggal));
            $tgl_indo = $hari[$num].", ".$tgl_ind;
        } else{
            $tgl_indo = $tgl_ind;
        }
        return $tgl_indo;
    }
}

if(!function_exists('tsp')) {
    function tsp($tanggal, $cetak_hari = false)
    {
        if(is_null($tanggal)){
            return "belum pernah sinkronisasi";
        }
        $hari = array(1 => 'Senin',
            'Selasa',
            'Rabu',
            'Kamis',
            'Jumat',
            'Sabtu',
            'Minggu'
        );

        $bulan = array(1 => 'Januari',
            'Februari',
            'Maret',
            'April',
            'Mei',
            'Juni',
            'Juli',
            'Agustus',
            'September',
            'Oktober',
            'November',
            'Desember'
        );
        $split = explode('-', $tanggal);
        $notime = explode(' ',$split[2] );
        $tgl_ind =  $notime[0]. ' ' . $bulan[(int)$split[1]] . ' ' . $split[0];

        if ($cetak_hari) {
            $num = date('N', strtotime($tanggal));
            $tgl_indo = $hari[$num]." ".$tgl_ind;
        } else{
            $tgl_indo = $tgl_ind;
        }
        return $tgl_indo ;
    }
}

if(!function_exists('dateRange')) {
    function dateRange($first, $last, $step = '+1 day', $format = 'Y-m-d')
    {
        $dates = [];
        $current = strtotime($first);
        $last = strtotime($last);

        while ($current <= $last) {

            $dates[] = date($format, $current);
            $current = strtotime($step, $current);
        }

        return $dates;
    }
}

if(!function_exists('islibur')) {
            function islibur ($tanggal)
            {

                if(is_null($tanggal)){
                    return null;
                }
                $tglx = date('w', strtotime($tanggal));
                if ($tglx == '0' || $tglx == '6') {
                    return true;
                }else {
                    return false;
                }

            }
        }
if(!function_exists('namabulan')) {
    function namabulan($bln)
    {
        if(is_null($bln)){
            return null;
        }
        $bulan = array(1 => 'Januari',
            2 => 'Februari',
            3 => 'Maret',
            4 => 'April',
            5 => 'Mei',
            6 => 'Juni',
            7 => 'Juli',
            8 => 'Agustus',
            9 => 'September',
            10 => 'Oktober',
            11 => 'November',
            12 => 'Desember'
        );
       $namabln =  $bulan[(int)$bln];

        return $namabln;
    }
}
if(!function_exists('namahari')) {
    function namahari($hri)
    {
        if(is_null($hri)){
            return null;
        }
        $hari = array(1 => 'Senin',
            'Selasa',
            'Rabu',
            'Kamis',
            'Jumat',
            'Sabtu',
            'Minggu'
        );
        $namahri =  $hari[$hri];

        return $namahri;
    }
}

if(!function_exists('tilPun')){
    function tilPun($nohp) {
         // kadang ada penulisan no hp 0811 239 345
         $nohp = str_replace(" ","",$nohp);
         // kadang ada penulisan no hp (0274) 778787
         $nohp = str_replace("(","",$nohp);
         // kadang ada penulisan no hp (0274) 778787
         $nohp = str_replace(")","",$nohp);
         // kadang ada penulisan no hp 0811.239.345
         $nohp = str_replace(".","",$nohp);
     
         // cek apakah no hp mengandung karakter + dan 0-9
         if(!preg_match('/[^+0-9]/',trim($nohp))){
             // cek apakah no hp karakter 1-3 adalah +62
             if(substr(trim($nohp), 0, 3)=='+62'){
                 $hp = trim($nohp);
             }
             // cek apakah no hp karakter 1 adalah 0
             elseif(substr(trim($nohp), 0, 1)=='0'){
                 $hp = substr(trim($nohp), 1);
             }
         }
        return $hp;
     }
    }

    if(!function_exists('sendWAtest')){
        function sendWATest($telp){
            $apiKey = config('services.whatsapp.api_key', env('WA_API_KEY', ''));
            $sender = config('services.whatsapp.sender', env('WA_SENDER_NUMBER', ''));
            $url    = config('services.whatsapp.url', env('WA_GATEWAY_URL', 'http://api.flarology.id/send-message'));

            $data = [
                'api_key' => $apiKey,
                'sender'  => $sender,
                'number'  => $telp ?: '6282219199300',
                'message' => "Notifikasi Presensi ARAP SPPG Kalisapu."
            ];
            $curl = curl_init();
            curl_setopt_array($curl, array(
                CURLOPT_URL => $url,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 5,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'POST',
                CURLOPT_POSTFIELDS => json_encode($data),
                CURLOPT_HTTPHEADER => array(
                    'Content-Type: application/json'
                ),
            ));
            
            $response = curl_exec($curl);
            curl_close($curl);
            return $response;
        }
    }

    if(!function_exists('sendWA')){
        function sendWA($telp, $msg){
            $apiKey = config('services.whatsapp.api_key', env('WA_API_KEY', ''));
            $sender = config('services.whatsapp.sender', env('WA_SENDER_NUMBER', ''));
            $url    = config('services.whatsapp.url', env('WA_GATEWAY_URL', 'http://api.flarology.id/send-message'));

            $data = [
                'api_key' => $apiKey,
                'sender'  => $sender,
                'number'  => '62'.$telp,
                'message' => $msg
            ];
            $curl = curl_init();
            curl_setopt_array($curl, array(
                CURLOPT_URL => $url,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 5,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "POST",
                CURLOPT_POSTFIELDS => json_encode($data),
                CURLOPT_HTTPHEADER => array(
                    'Content-Type: application/json'
                ),
            ));
    
            $response = curl_exec($curl);
            curl_close($curl);
            return $response;
        }
    }

if(!function_exists('formatDivisi')) {
    function formatDivisi($jabatan)
    {
        if (empty($jabatan)) {
            return '-';
        }
        $lower = strtolower(trim($jabatan));
        if (in_array($lower, ['scurity', 'security', 'keamanan', 'satpam'])) {
            return 'Keamanan';
        }
        if ($lower === 'kebersihan' || $lower === 'cs') {
            return 'Kebersihan';
        }
        return ucfirst($lower);
    }
}