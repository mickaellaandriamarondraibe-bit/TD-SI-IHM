<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateCaisses extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => ['type'=> 'INTEGER','auto_increment' => true,],
            'numero' => ['type' => 'INTEGER','null' => false,],
            'nom' => ['type' => 'TEXT','null' => true,],
            'created_at' => ['type' => 'DATETIME','null' => true,],
            'updated_at' => ['type' => 'DATETIME','null' => true,],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->addUniqueKey('numero');
        $this->forge->createTable('caisses');
    }

    public function down()
    {
        $this->forge->dropTable('caisses');
    }
}