<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
// use CodeIgniter\I18n\Time;

class KabupatenSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'nama_kab_kota'    =>  'Surakarta',
            ],
            [
                'nama_kab_kota'    =>  'Sukoharjo',
            ],
            [
                'nama_kab_kota'    =>  'Semarang',
            ],
            [
                'nama_kab_kota'    =>  'Kudus',
            ],
            [
                'nama_kab_kota'    =>  'Jepara',
            ],
        ];
        $this->db->table('kab_kota')->insertBatch($data);
    }
}
