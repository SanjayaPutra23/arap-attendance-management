<?php

namespace Database\Seeders;

use App\Models\Peserta;
use Illuminate\Database\Seeder;

class PesertaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Peserta::create([
            'name'=> 'Catur Setiya Sulistiyana, dr., M.Med.Ed.',
            'uid'=> '1',
            'nik'=> '91710583',
            'type'=> 'Dekan',
            'jabatan'=> 'Dekanat'
        ]);
        Peserta::create([
            'name'=> 'Muhammad Edial Sanif, dr., SpJP ',
            'uid'=> '2',
            'nik'=> '91550895',
            'type'=> 'WD 1',
            'jabatan'=> 'Dekanat'
        ]);
        Peserta::create([
            'name'=> 'Hj. Eni Suhaeni, SKM., M.Kes',
            'uid'=> '3',
            'nik'=> '93680584',
            'type'=> 'WD 2',
            'jabatan'=> 'Dekanat'
        ]);
        Peserta::create([
            'name'=> 'H. Ahmad Fariz Malvi Zamzam Zein dr. Sp.PD',
            'uid'=> '4',
            'nik'=> '93820624',
            'type'=> 'WD 3',
            'jabatan'=> 'Dekanat'
        ]);

        Peserta::create([
            'name'=> 'R. Vivi Meidianawaty,dr.,MMedEd',
            'uid'=> '11',
            'nik'=> '91740588',
            'type'=> 'MEU',
            'jabatan'=> 'Dosen'
        ]);
        Peserta::create([
            'name'=> 'Shofa Nur Fauzah,dr.,MKM',
            'uid'=> '12',
            'nik'=> '91850689',
            'type'=> 'MEU',
            'jabatan'=> 'Dosen'
        ]);
        Peserta::create([
            'name'=> 'Dini Norviatin, dr., M.KM',
            'uid'=> '13',
            'nik'=> '91830873',
            'type'=> 'MEU',
            'jabatan'=> 'Dosen'
        ]);
        Peserta::create([
            'name'=> 'Niklah Zaidah,dr.,M.Biomed',
            'uid'=> '14',
            'nik'=> '91860770',
            'type'=> 'MEU',
            'jabatan'=> 'Dosen'
        ]);
        Peserta::create([
            'name'=> 'M. Duddy Satrianugraha W, S.Si., M.Si.Med.',
            'uid'=> '15',
            'nik'=> '94830741',
            'type'=> 'MEU',
            'jabatan'=> 'Dosen'
        ]);
        Peserta::create([
            'name'=> 'Aprilyan Laras Chantika dr',
            'uid'=> '16',
            'nik'=> '90920004',
            'type'=> 'MEU',
            'jabatan'=> 'Dosen'
        ]);
        Peserta::create([
            'name'=> 'Muhammad Hasbi Trijati, dr',
            'uid'=> '17',
            'nik'=> '90920014',
            'type'=> 'MEU',
            'jabatan'=> 'Dosen'
        ]);
        Peserta::create([
            'name'=> 'Vita Maulina, dr',
            'uid'=> '18',
            'nik'=> '90940028',
            'type'=> 'MEU',
            'jabatan'=> 'Dosen'
        ]);
        Peserta::create([
            'name'=> 'Tiar M. Pratamawati,dr., M.M.,M.Biomed',
            'uid'=> '30',
            'nik'=> '91860771',
            'type'=> 'PKKPM',
            'jabatan'=> 'Dosen'
        ]);
        Peserta::create([
            'name'=> 'Herry Nurhendriyana, dr.,MKM',
            'uid'=> '31',
            'nik'=> '91820844',
            'type'=> 'PKKPM',
            'jabatan'=> 'Dosen'
        ]);
        Peserta::create([
            'name'=> 'Sri Marfuati, M.Farm.,APT',
            'uid'=> '32',
            'nik'=> '91760998',
            'type'=> 'PKKPM',
            'jabatan'=> 'Dosen'
        ]);
        Peserta::create([
            'name'=> 'Mustika Weni, S.Si.,M.Si',
            'uid'=> '33',
            'nik'=> '91921070',
            'type'=> 'PKKPM',
            'jabatan'=> 'Dosen'
        ]);
        Peserta::create([
            'name'=> 'Staviera Antonivirizky, dr',
            'uid'=> '34',
            'nik'=> '90950020',
            'type'=> 'PKKPM',
            'jabatan'=> 'Dosen'
        ]);
        Peserta::create([
            'name'=> 'Uswatun Hasanah, S.Pd.M.Pd',
            'uid'=> '35',
            'nik'=> '91830586',
            'type'=> 'UPM',
            'jabatan'=> 'Dosen'
        ]);
        Peserta::create([
            'name'=> 'Risnandya Primanagara, S.Kom., M.Si.',
            'uid'=> '36',
            'nik'=> '94800597',
            'type'=> 'UPM',
            'jabatan'=> 'Dosen'
        ]);
        Peserta::create([
            'name'=> 'Rama Samara Brajawikalpa S.Farm.., Apt., M.Sc',
            'uid'=> '37',
            'nik'=> '91890872',
            'type'=> 'UPM',
            'jabatan'=> 'Dosen'
        ]);
        Peserta::create([
            'name'=> 'Tissa Octavira Permatasari,dr.,MMedEd',
            'uid'=> '26',
            'nik'=> '91840581',
            'type'=> 'PSPD',
            'jabatan'=> 'Dosen'
        ]);
        Peserta::create([
            'name'=> 'Bambang Wibisono,dr.,MH',
            'uid'=> '27',
            'nik'=> '91860756',
            'type'=> 'PSPD',
            'jabatan'=> 'Dosen'
        ]);
        Peserta::create([
            'name'=> 'Windhy Hidayat, SKM',
            'uid'=> '28',
            'nik'=> '94830717',
            'type'=> 'PSPD',
            'jabatan'=> 'Tendik'
        ]);
        Peserta::create([
            'name'=> 'Ema Sugara, SE',
            'uid'=> '29',
            'nik'=> '94810973',
            'type'=> 'PSPD',
            'jabatan'=> 'Tendik'
        ]);
        Peserta::create([
            'name'=> 'Frista Martha Rahayu, dr.,Sp.DV',
            'uid'=> '19',
            'nik'=> '91870758',
            'type'=> 'P3D',
            'jabatan'=> 'Dosen'
        ]);
        Peserta::create([
            'name'=> 'Ouve Rahadiani Permana,dr.,MH.Kes.,M.Sc',
            'uid'=> '20',
            'nik'=> '91870802',
            'type'=> 'P3D',
            'jabatan'=> 'Dosen'
        ]);
        Peserta::create([
            'name'=> 'Witri Pratiwi, dr.,M.Kes',
            'uid'=> '21',
            'nik'=> '91097186',
            'type'=> 'P3D',
            'jabatan'=> 'Dosen'
        ]);
        Peserta::create([
            'name'=> 'Cici Nataliya, SE',
            'uid'=> '22',
            'nik'=> '94800892',
            'type'=> 'P3D',
            'jabatan'=> 'Tendik'
        ]);
        Peserta::create([
            'name'=> 'Nurul Ferdian, S.Psi',
            'uid'=> '23',
            'nik'=> '94870807',
            'type'=> 'P3D',
            'jabatan'=> 'Tendik'
        ]);
        Peserta::create([
            'name'=> 'Deni Perdana, SE',
            'uid'=> '24',
            'nik'=> '94941015',
            'type'=> 'P3D',
            'jabatan'=> 'Tendik'
        ]);
        Peserta::create([
            'name'=> 'Ati Artati, dr',
            'uid'=> '25',
            'nik'=> '90940033',
            'type'=> 'P3D',
            'jabatan'=> 'Dosen'
        ]);
        Peserta::create([
            'name'=> 'Hikmah Fitriani, S.Si.M.Si.Med',
            'uid'=> '5',
            'nik'=> '91840609',
            'type'=> 'BIOMED',
            'jabatan'=> 'Dosen'
        ]);
        Peserta::create([
            'name'=> 'Amanah, S.Si.,M.Si.Med',
            'uid'=> '6',
            'nik'=> '94880760',
            'type'=> 'BIOMED',
            'jabatan'=> 'Dosen'
        ]);
        Peserta::create([
            'name'=> 'Kosim Nursehah, SE.I',
            'uid'=> '7',
            'nik'=> '94820595',
            'type'=> 'BIOMED',
            'jabatan'=> 'Tendik'
        ]);
        Peserta::create([
            'name'=> 'Laila Roudtaul Janah, Amd.Ak',
            'uid'=> '8',
            'nik'=> '94950999',
            'type'=> 'BIOMED',
            'jabatan'=> 'Tendik'
        ]);
        Peserta::create([
            'name'=> 'Heru Priyatna, Amd.AK',
            'uid'=> '9',
            'nik'=> '94971007',
            'type'=> 'BIOMED',
            'jabatan'=> 'Tendik'
        ]);
        Peserta::create([
            'name'=> 'Destiany Rurrahmah, Amd.Ak',
            'uid'=> '10',
            'nik'=> '94951017',
            'type'=> 'BIOMED',
            'jabatan'=> 'Tendik'
        ]);
        Peserta::create([
            'name'=> 'Kati Sriwiyati,dr.,M.Biomed',
            'uid'=> '38',
            'nik'=> '91860757',
            'type'=> 'SKILLSLAB',
            'jabatan'=> 'Dosen'
        ]);
        Peserta::create([
            'name'=> 'Ade Yusuf , dr.,MM.,M.KM',
            'uid'=> '39',
            'nik'=> '91830868',
            'type'=> 'SKILLSLAB',
            'jabatan'=> 'Dosen'
        ]);
        Peserta::create([
            'name'=> 'Siti Maria Ulfah, dr.,MMR',
            'uid'=> '40',
            'nik'=> '91851073',
            'type'=> 'SKILLSLAB',
            'jabatan'=> 'Dosen'
        ]);
        Peserta::create([
            'name'=> 'Adithya Darmawan, Skm',
            'uid'=> '41',
            'nik'=> '94890600',
            'type'=> 'SKILLSLAB',
            'jabatan'=> 'Tendik'
        ]);
        Peserta::create([
            'name'=> 'Saepul Zaid, S.Kep.',
            'uid'=> '42',
            'nik'=> '94900829',
            'type'=> 'SKILLSLAB',
            'jabatan'=> 'Tendik'
        ]);
        Peserta::create([
            'name'=> 'Nurdianah, A.Md., Kep.',
            'uid'=> '43',
            'nik'=> '94860598',
            'type'=> 'SKILLSLAB',
            'jabatan'=> 'Tendik'
        ]);
        Peserta::create([
            'name'=> 'Muhammad Ronald Reesa, S.Kom',
            'uid'=> '44',
            'nik'=> '94921016',
            'type'=> 'SKILLSLAB',
            'jabatan'=> 'Tendik'
        ]);
        Peserta::create([
            'name'=> 'Moch Demar Devantry, SE',
            'uid'=> '45',
            'nik'=> '94931006',
            'type'=> 'SKILLSLAB',
            'jabatan'=> 'Tendik'
        ]);
        Peserta::create([
            'name'=> 'Amalia Prarizkahati, dr',
            'uid'=> '46',
            'nik'=> '90930016',
            'type'=> 'SKILLSLAB',
            'jabatan'=> 'Dosen'
        ]);
        Peserta::create([
            'name'=> 'Nike Indah Permatasari, dr',
            'uid'=> '47',
            'nik'=> '90940026',
            'type'=> 'SKILLSLAB',
            'jabatan'=> 'Dosen'
        ]);
        Peserta::create([
            'name'=> 'Cantika Widia Astuti, dr',
            'uid'=> '48',
            'nik'=> '90940027',
            'type'=> 'SKILLSLAB',
            'jabatan'=> 'Dosen'
        ]);
        Peserta::create([
            'name'=> 'Yorim Sora Pasila, dr',
            'uid'=> '49',
            'nik'=> '90890010',
            'type'=> 'SKILLSLAB',
            'jabatan'=> 'Dosen'
        ]);
        Peserta::create([
            'name'=> 'Muftikhin, SE',
            'uid'=> '50',
            'nik'=> '74851075',
            'type'=> 'SKILLSLAB',
            'jabatan'=> 'Tendik'
        ]);
        Peserta::create([
            'name'=> 'Saiful Anam, S.Sos',
            'uid'=> '51',
            'nik'=> '44740362',
            'type'=> 'KA TU',
            'jabatan'=> 'Tendik'
        ]);
        Peserta::create([
            'name'=> 'Thysa Tysmelia Affandi, dr.,MKM',
            'uid'=> '52',
            'nik'=> '91820591',
            'type'=> 'Kaur Kemahasiswaan',
            'jabatan'=> 'Dosen'
        ]);
        Peserta::create([
            'name'=> 'Egis Febri Theresa, S.Pd.',
            'uid'=> '53',
            'nik'=> '94880606',
            'type'=> 'Kaur Keuangan',
            'jabatan'=> 'Tendik'
        ]);
        Peserta::create([
            'name'=> 'H. Lukman Nurhakim, ST, M.Kom',
            'uid'=> '54',
            'nik'=> '94800585',
            'type'=> 'Kaur IT & Lib',
            'jabatan'=> 'Tendik'
        ]);
        Peserta::create([
            'name'=> 'Indra Yulian Suwendo, SH',
            'uid'=> '55',
            'nik'=> '94891002',
            'type'=> 'Kaur Umum',
            'jabatan'=> 'Tendik'
        ]);
        Peserta::create([
            'name'=> 'Dadan Ramadhan Apriyanto, S.Si., M.Si.Biomed',
            'uid'=> '56',
            'nik'=> '91900894',
            'type'=> 'Staff Kemahasiswaan',
            'jabatan'=> 'Dosen'
        ]);
        Peserta::create([
            'name'=> 'Ignatius Hapsoro Wirandoko, dr., M.Si.',
            'uid'=> '57',
            'nik'=> '91720772',
            'type'=> 'Staff Kemahasiswaan',
            'jabatan'=> 'Dosen'
        ]);
        Peserta::create([
            'name'=> 'Magindra Nursani Afifa, dr',
            'uid'=> '58',
            'nik'=> '90930021',
            'type'=> 'Staff Kemahasiswaan',
            'jabatan'=> 'Dosen'
        ]);
        Peserta::create([
            'name'=> 'Arie Widyastuti, Amd',
            'uid'=> '59',
            'nik'=> '94870593',
            'type'=> 'Staff Keuangan',
            'jabatan'=> 'Tendik'
        ]);
        Peserta::create([
            'name'=> 'Dwi Wahyuningsih, SE',
            'uid'=> '60',
            'nik'=> '94880601',
            'type'=> 'Staff Keuangan',
            'jabatan'=> 'Tendik'
        ]);
        Peserta::create([
            'name'=> 'Rizki Eliani, S.Hum.',
            'uid'=> '61',
            'nik'=> '94910831',
            'type'=> 'Staff Perpustakaan',
            'jabatan'=> 'Tendik'
        ]);
        Peserta::create([
            'name'=> 'Silvy Natasha Putrisari, S.A.B.',
            'uid'=> '62',
            'nik'=> '94840604',
            'type'=> 'Staff TU',
            'jabatan'=> 'Tendik'
        ]);
        Peserta::create([
            'name'=> 'Heru Faijin',
            'uid'=> '63',
            'nik'=> '94710592',
            'type'=> 'Staff TU',
            'jabatan'=> 'Tendik'
        ]);
        Peserta::create([
            'name'=> 'Moh. Mansur R',
            'uid'=> '64',
            'nik'=> '94760001',
            'type'=> 'Staff TU',
            'jabatan'=> 'Tendik'
        ]);
        Peserta::create([
            'name'=> 'Widya Winantia Putri, S.Tr.Keb',
            'uid'=> '65',
            'nik'=> '94971069',
            'type'=> 'Staff TU',
            'jabatan'=> 'Tendik'
        ]);
        Peserta::create([
            'name'=> 'Monica Bellanissa, SA',
            'uid'=> '66',
            'nik'=> '94991104',
            'type'=> 'Staff Keuangan',
            'jabatan'=> 'Tendik'
        ]);
        Peserta::create([
            'name'=> 'Hidayat',
            'uid'=> '67',
            'nik'=> '94910830',
            'type'=> 'Sarpras',
            'jabatan'=> 'Tendik'
        ]);
        Peserta::create([
            'name'=> 'Jejep Setiawan',
            'uid'=> '68',
            'nik'=> '94890696',
            'type'=> 'Sarpras',
            'jabatan'=> 'Tendik'
        ]);
        Peserta::create([
            'name'=> 'R. Saeful Mulki',
            'uid'=> '69',
            'nik'=> '94940798',
            'type'=> 'Pramubakti',
            'jabatan'=> 'Tendik'
        ]);
        Peserta::create([
            'name'=> 'Untung Pribadi',
            'uid'=> '70',
            'nik'=> '94950869',
            'type'=> 'Pramubakti',
            'jabatan'=> 'Tendik'
        ]);
        Peserta::create([
            'name'=> 'Sirojuddin',
            'uid'=> '71',
            'nik'=> '94930970',
            'type'=> 'Pramubakti',
            'jabatan'=> 'Tendik'
        ]);
        Peserta::create([
            'name'=> 'Wahidin',
            'uid'=> '72',
            'nik'=> '94770827',
            'type'=> 'Driver',
            'jabatan'=> 'Tendik'
        ]);
        Peserta::create([
            'name'=> 'Dian Wirayawan',
            'uid'=> '73',
            'nik'=> '94730002',
            'type'=> 'Driver',
            'jabatan'=> 'Tendik'
        ]);
        Peserta::create([
            'name'=> 'Ruri Eka Maryam Mulyaningsih,dr.,M.M.,M.Biomed',
            'uid'=> '120',
            'nik'=> '91850755',
            'type'=> 'DOSEN FK',
            'jabatan'=> 'Dosen'
        ]);
        Peserta::create([
            'name'=> 'Donny Nauphar, B.Sc.(Biotech),M.Si.Med',
            'uid'=> '121',
            'nik'=> '91810888',
            'type'=> 'DOSEN FK',
            'jabatan'=> 'Dosen'
        ]);
        Peserta::create([
            'name'=> 'Yandri Naldi, dr.,MH.MKM',
            'uid'=> '122',
            'nik'=> '91700580',
            'type'=> 'DOSEN FK',
            'jabatan'=> 'Dosen'
        ]);
        Peserta::create([
            'name'=> 'Nurbaiti, dr., Sp.PA., M.Kes',
            'uid'=> '123',
            'nik'=> '91750759',
            'type'=> 'DOSEN FK',
            'jabatan'=> 'Dosen'
        ]);
        Peserta::create([
            'name'=> 'Imam Syakhruddin,dr.,Sp.A',
            'uid'=> '124',
            'nik'=> '91840688',
            'type'=> 'DOSEN FK',
            'jabatan'=> 'Dosen'
        ]);
        Peserta::create([
            'name'=> 'Yukke Nilla Permata,dr.,M.Biomed',
            'uid'=> '125',
            'nik'=> '91860753',
            'type'=> 'DOSEN FK',
            'jabatan'=> 'Dosen'
        ]);
        Peserta::create([
            'name'=> 'Gara Samara Brajadenta, dr.,SE.,MM.,M.Res.,M.Si.Med.,PhD',
            'uid'=> '126',
            'nik'=> '91850690',
            'type'=> 'DOSEN FK',
            'jabatan'=> 'Dosen'
        ]);
        Peserta::create([
            'name'=> 'Ariestya Indah Permata Sari,dr., M.Sc., M.Si.Med',
            'uid'=> '127',
            'nik'=> '91870893',
            'type'=> 'DOSEN FK',
            'jabatan'=> 'Dosen'
        ]);
        Peserta::create([
            'name'=> 'Duddy Facrudin, M.Psi.,Psikolog',
            'uid'=> '128',
            'nik'=> '91850997',
            'type'=> 'DOSEN FK',
            'jabatan'=> 'Dosen'
        ]);
        Peserta::create([
            'name'=> 'Alya Amila Fitrie, dr.,M.Kes.,Sp.PA',
            'uid'=> '129',
            'nik'=> '91761023',
            'type'=> 'DOSEN FK',
            'jabatan'=> 'Dosen'
        ]);
        Peserta::create([
            'name'=> 'Rhiza Mohammad Ishaq Sobari, dr.,Sp.BA',
            'uid'=> '130',
            'nik'=> '91830589',
            'type'=> 'DOSEN FK',
            'jabatan'=> 'Dosen'
        ]);
        Peserta::create([
            'name'=> 'Emallia Fitriani, dr',
            'uid'=> '74',
            'nik'=> '90890002',
            'type'=> 'Tutor FK',
            'jabatan'=> 'Dosen'
        ]);
        Peserta::create([
            'name'=> 'Rian Damayanti, dr',
            'uid'=> '75',
            'nik'=> '90890001',
            'type'=> 'Tutor FK',
            'jabatan'=> 'Dosen'
        ]);
        Peserta::create([
            'name'=> 'Muhammad Ajmalunnas, dr',
            'uid'=> '76',
            'nik'=> '90890005',
            'type'=> 'Tutor FK',
            'jabatan'=> 'Dosen'
        ]);
        Peserta::create([
            'name'=> 'Hilmi Mawaddi Ahmad, dr',
            'uid'=> '77',
            'nik'=> '90920009',
            'type'=> 'Tutor FK',
            'jabatan'=> 'Dosen'
        ]);
        Peserta::create([
            'name'=> 'Moh. Irwan dharmansyah, dr',
            'uid'=> '78',
            'nik'=> '90920007',
            'type'=> 'Tutor FK',
            'jabatan'=> 'Dosen'
        ]);
        Peserta::create([
            'name'=> 'Raden Handidwiono, dr',
            'uid'=> '79',
            'nik'=> '90920008',
            'type'=> 'Tutor FK',
            'jabatan'=> 'Dosen'
        ]);
        Peserta::create([
            'name'=> 'Helga Marwa Afifah, dr',
            'uid'=> '80',
            'nik'=> '90930010',
            'type'=> 'Tutor FK',
            'jabatan'=> 'Dosen'
        ]);
        Peserta::create([
            'name'=> 'Muhammad Suhanda, dr',
            'uid'=> '81',
            'nik'=> '90930012',
            'type'=> 'Tutor FK',
            'jabatan'=> 'Dosen'
        ]);
        Peserta::create([
            'name'=> 'Efendi Agnilinia, dr',
            'uid'=> '82',
            'nik'=> '90930013',
            'type'=> 'Tutor FK',
            'jabatan'=> 'Dosen'
        ]);
        Peserta::create([
            'name'=> 'Kartika Dwi Aprisia , dr',
            'uid'=> '83',
            'nik'=> '90930015',
            'type'=> 'Tutor FK',
            'jabatan'=> 'Dosen'
        ]);
        Peserta::create([
            'name'=> 'Fadly Aufar Saptadirja, dr',
            'uid'=> '84',
            'nik'=> '90960018',
            'type'=> 'Tutor FK',
            'jabatan'=> 'Dosen'
        ]);
        Peserta::create([
            'name'=> 'Fatih Farabi, dr',
            'uid'=> '85',
            'nik'=> '90960017',
            'type'=> 'Tutor FK',
            'jabatan'=> 'Dosen'
        ]);
        Peserta::create([
            'name'=> 'Ayu Intan Purnama Wulan, dr',
            'uid'=> '86',
            'nik'=> '90950019',
            'type'=> 'Tutor FK',
            'jabatan'=> 'Dosen'
        ]);
        Peserta::create([
            'name'=> 'Coryna Frisqila, dr',
            'uid'=> '87',
            'nik'=> '90930022',
            'type'=> 'Tutor FK',
            'jabatan'=> 'Dosen'
        ]);
        Peserta::create([
            'name'=> 'Permata Ayunung Tyas, dr',
            'uid'=> '88',
            'nik'=> '90930024',
            'type'=> 'Tutor FK',
            'jabatan'=> 'Dosen'
        ]);
        Peserta::create([
            'name'=> 'Erma Permata Sari, dr',
            'uid'=> '89',
            'nik'=> '90930025',
            'type'=> 'Tutor FK',
            'jabatan'=> 'Dosen'
        ]);
        Peserta::create([
            'name'=> 'Amri Muharam, dr',
            'uid'=> '90',
            'nik'=> '90950029',
            'type'=> 'Tutor FK',
            'jabatan'=> 'Dosen'
        ]);
        Peserta::create([
            'name'=> 'Novi Robbayanti Fiqih, dr',
            'uid'=> '91',
            'nik'=> '90920030',
            'type'=> 'Tutor FK',
            'jabatan'=> 'Dosen'
        ]);
        Peserta::create([
            'name'=> 'Dea Triasari Indriyanti Wahidin, dr',
            'uid'=> '92',
            'nik'=> '90940035',
            'type'=> 'Tutor FK',
            'jabatan'=> 'Dosen'
        ]);
        Peserta::create([
            'name'=> 'Gita Bestari, dr',
            'uid'=> '93',
            'nik'=> '90930036',
            'type'=> 'Tutor FK',
            'jabatan'=> 'Dosen'
        ]);
        Peserta::create([
            'name'=> 'Rizkia Alifia Fitriani, dr',
            'uid'=> '94',
            'nik'=> '90930037',
            'type'=> 'Tutor FK',
            'jabatan'=> 'Dosen'
        ]);
        Peserta::create([
            'name'=> 'Bellia Marsya Putriyani, dr',
            'uid'=> '95',
            'nik'=> '90940038',
            'type'=> 'Tutor FK',
            'jabatan'=> 'Dosen'
        ]);
        Peserta::create([
            'name'=> 'Ully Tangziyah Fatmala,dr',
            'uid'=> '96',
            'nik'=> '90960039',
            'type'=> 'Tutor FK',
            'jabatan'=> 'Dosen'
        ]);
        Peserta::create([
            'name'=> 'Vania Avissa Salsabila,dr',
            'uid'=> '97',
            'nik'=> '90980040',
            'type'=> 'Tutor FK',
            'jabatan'=> 'Dosen'
        ]);
        Peserta::create([
            'name'=> 'Qurotul Aqyun, dr',
            'uid'=> '98',
            'nik'=> '90960041',
            'type'=> 'Tutor FK',
            'jabatan'=> 'Dosen'
        ]);
        Peserta::create([
            'name'=> 'Irnawati Budiono, dr',
            'uid'=> '99',
            'nik'=> '90950035',
            'type'=> 'Tutor FK',
            'jabatan'=> 'Dosen'
        ]);
        Peserta::create([
            'name'=> 'Lita Harlianti, dr',
            'uid'=> '100',
            'nik'=> '90940042',
            'type'=> 'Tutor FK',
            'jabatan'=> 'Dosen'
        ]);
        Peserta::create([
            'name'=> 'Putri Puspa Lestari, dr',
            'uid'=> '101',
            'nik'=> '90950043',
            'type'=> 'Tutor FK',
            'jabatan'=> 'Dosen'
        ]);
        Peserta::create([
            'name'=> 'Nurlita Fauziyyah Basri,dr',
            'uid'=> '102',
            'nik'=> '90960044',
            'type'=> 'Tutor FK',
            'jabatan'=> 'Dosen'
        ]);


    }
}
