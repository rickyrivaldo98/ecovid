<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
// use CodeIgniter\I18n\Time;

class PuskesmasSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'id_kab_kota'    =>  '1',
                'nama_puskesmas' =>  'Fatmawati',
                'alamat'       =>  'Jl Andi Tonro 52, Sulawesi Selatan',
            ],
            [
                'id_kab_kota'    =>  '2',
                'nama_puskesmas' =>  'Konoha',
                'alamat'       =>  'Jl Gegerkalong Girang 67, Jawa Barat',
            ],
            [
                'id_kab_kota'    =>  '3',
                'nama_puskesmas' =>  'Suna',
                'alamat'       =>  'Jl Letjen MT Haryono 427-429 Mataram Plaza Ruko Bl E-7 Lt 3,Brumbungan',
            ],
            [
                'id_kab_kota'    =>  '4',
                'nama_puskesmas' =>  'Iwa',
                'alamat'       =>  'Jl Letjen S Parman Ruko Gateway C 17-18',
            ],
            [
                'id_kab_kota'    =>  '5',
                'nama_puskesmas' =>  'Kiri',
                'alamat'       =>  'Psr Tanah Abang Bl F/K-8, Dki Jakarta',
            ],
        ];
        $this->db->table('puskesmas')->insertBatch($data);
    }
}
