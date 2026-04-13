<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\VisiMisi;
use App\Models\Pejabat;

class ProfilSeeder extends Seeder
{
    public function run(): void
    {
        VisiMisi::create([
            'visi' => 'Mendukung Kinerja Pimpinan Daerah dengan Pelayanan Prima',
            'misi' => '<ul><li>Biro Umum Sekretariat Daerah Provinsi Bengkulu merupakan unsur staf yang bertugas membantu Sekretaris Daerah dalam menyusun kebijakan dan mengkoordinasikan urusan ketatausahaan, rumah tangga pimpinan, serta keprotokolan.</li><li>Kami berkomitmen untuk menyediakan fasilitas dan layanan terbaik guna memastikan kelancaran kegiatan pemerintahan di lingkungan Pemerintah Provinsi Bengkulu secara transparan dan akuntabel.</li></ul>',
        ]);

        Pejabat::insert([
            [
                'nama' => 'A.GUNAWAN, S.Sos',
                'jabatan' => 'KEPALA BIRO UMUM',
                'pangkat_golongan' => 'Pembina Utama Muda (IV/c)',
                'nip' => '197102041992021001',
                'foto' => null,
                'level' => 'kepala'
            ],

            [
                'nama' => 'BUDI TRAPSILO, S.IP',
                'jabatan' => 'KEPALA BAGIAN RUMAH TANGGA',
                'pangkat_golongan' => 'Penata TK.I III/d',
                'nip' => '198308252010011013',
                'foto' => null,
                'level' => 'kabag_rt'
            ],
            [
                'nama' => 'ETIZA MILIANTIKA, ST',
                'jabatan' => 'KEPALA BAGIAN ADMINISTRASI KEUANGAN DAN ASET',
                'pangkat_golongan' => 'Penata TK.I III/d',
                'nip' => '198709042011012007',
                'foto' => null,
                'level' => 'kabag_keuangan'
            ],
            [
                'nama' => 'FERRY ERNEZ PARERA, S.STP., M.Si',
                'jabatan' => 'KEPALA BAGIAN PROTOKOL & ADM. PIMPINAN',
                'pangkat_golongan' => 'Pembina TK.I (IV/b)',
                'nip' => '197810201998101001',
                'foto' => null,
                'level' => 'kabag_protokol'
            ],

            [
                'nama' => 'ARDIANSYAH, S.STP, M.Si',
                'jabatan' => 'Kasubbag Tata Usaha & Layanan Umum',
                'pangkat_golongan' => 'Penata TK.I III/d',
                'nip' => '199007072010101002',
                'foto' => null,
                'level' => 'sub_rt'
            ],
            [
                'nama' => 'ISDIANTO, S.SOS',
                'jabatan' => 'Ketua Tim Kerja Urusan Rumah Tangga Gubernur & Wakil Gubernur',
                'pangkat_golongan' => 'Penata (III/c)',
                'nip' => '196806032008011004',
                'foto' => null,
                'level' => 'sub_rt'
            ],
            [
                'nama' => 'FERDIANSYAH',
                'jabatan' => 'Ketua Tim Kerja Urusan Dalam',
                'pangkat_golongan' => 'Pengatur / II.c',
                'nip' => '19800731200701104',
                'foto' => null,
                'level' => 'sub_rt'
            ],

            [
                'nama' => 'HAMDAN AZHARI, S.IP.,M.SI',
                'jabatan' => 'Ketua Tim Kerja Akuntansi & Penatausahaan Keuangan & Aset',
                'pangkat_golongan' => 'Penata TK I (III/d)',
                'nip' => '198608202006041007',
                'foto' => null,
                'level' => 'sub_keuangan'
            ],
            [
                'nama' => 'MUHAMMAD ZAILANI, S.E',
                'jabatan' => 'Ketua Tim Kerja Perencanaan, Penggunaan & Pemeliharaan Aset',
                'pangkat_golongan' => 'Penata Tk I (III/d)',
                'nip' => '197709022006041005',
                'foto' => null,
                'level' => 'sub_keuangan'
            ],
            [
                'nama' => 'RIZKI LIANTI, STP, M.Si.',
                'jabatan' => 'Ketua Tim Kerja Keuangan Dan Verifikasi Sekretariat Daerah',
                'pangkat_golongan' => 'Pembina (IV/a)',
                'nip' => '196712172002122003',
                'foto' => null,
                'level' => 'sub_keuangan'
            ],

            [
                'nama' => 'ALDI SUHENDRA, S.E',
                'jabatan' => 'Ketua Tim Kerja Protokol & Pelayanan Tamu',
                'pangkat_golongan' => 'Penata TK.I III/d',
                'nip' => '19781118 2010011005',
                'foto' => null,
                'level' => 'sub_protokol'
            ],
            [
                'nama' => 'RELY PUSPITASARI, S.Sos., M.Si.',
                'jabatan' => 'Ketua Tim Kerja Materi & Komunikasi Pimpinan',
                'pangkat_golongan' => 'Penata Tk.I (III/d)',
                'nip' => '198308172006042032',
                'foto' => null,
                'level' => 'sub_protokol'
            ],
            [
                'nama' => 'DENTO PUTERA, S.Sos',
                'jabatan' => 'Ketua Tim Kerja Tata Usaha Pimpinan Dan Staf Ahli',
                'pangkat_golongan' => 'Penata Muda Tk I (III/b)',
                'nip' => '198312092008031002',
                'foto' => null,
                'level' => 'sub_protokol'
            ],
        ]);
    }
}
