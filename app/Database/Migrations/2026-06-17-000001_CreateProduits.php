<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateProduits extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => ['type'=> 'INTEGER','auto_increment' => true,],
            'designation' => ['type' => 'TEXT','null' => false,],
            'prix' => ['type' => 'INTEGER','null' => false,],
            'quantite_stock' => ['type' => 'INTEGER','null' => false,'default' => 0,],
            'created_at' => ['type' => 'DATETIME','null' => true,],
            'updated_at' => ['type' => 'DATETIME','null' => true,],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->createTable('produits');
    }

    public function down()
    {
        $this->forge->dropTable('produits');
    }
}