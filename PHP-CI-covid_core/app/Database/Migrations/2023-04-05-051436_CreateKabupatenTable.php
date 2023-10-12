<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateKabupatenTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_kab_kota' => [
                'type' => 'int',
                'constraint' => 10,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'nama_kab_kota' => [
                'type' => 'varchar', 
                'constraint' => 255,
            ],
        ]);
        $this->forge->addKey('id_kab_kota', true);
        $this->forge->createTable('kab_kota');
    }

    public function down()
    {
        $this->forge->dropTable('kab_kota');
    }
}
