<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateAchats extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => ['type' => 'INTEGER','auto_increment' => true,],
            'caisse_id' => ['type' => 'INTEGER','null' => false,],
            'created_at' => ['type' => 'DATETIME','null' => true,],
            'updated_at' => ['type' => 'DATETIME','null' => true,],
        ]);

        $this->forge->addKey('id', true);

        $this->forge->addForeignKey(
            'caisse_id',
            'caisses',
            'id',
            'CASCADE',
            'CASCADE'
        );

        $this->forge->createTable('achats');
    }

    public function down()
    {
        $this->forge->dropTable('achats');
    }
}