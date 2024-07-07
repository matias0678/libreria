<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class libros extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'lib_id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'nombre' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'autor' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'fecha' => [
                'type' => 'DATE',
                'null' => true,
            ],
        ]);
        $this->forge->addKey('lib_id', true);
        $this->forge->createTable('libros');
    }

    public function down()
    {
        $this->forge->dropTable('libros');
    }
}
