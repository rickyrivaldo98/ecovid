<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreatePuskesmasTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_puskesmas' => [
                'type' => 'int',
                'constraint' => 10,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'id_kab_kota' => ['type' => 'int', 'constraint' => 10,'unsigned' => true],
            'nama_puskesmas' => [
                'type' => 'varchar', 
                'constraint' => 255,
            ],
            'alamat' => [
                'type' => 'varchar', 
                'constraint' => 255,
            ],
        ]);
        $this->forge->addKey('id_puskesmas', true);
        $this->forge->addForeignKey('id_kab_kota', 'kab_kota', 'id_kab_kota', '', 'CASCADE');
        $this->forge->createTable('puskesmas');
    }

    public function down()
    {
        $this->forge->dropTable('puskesmas');
    }
}
