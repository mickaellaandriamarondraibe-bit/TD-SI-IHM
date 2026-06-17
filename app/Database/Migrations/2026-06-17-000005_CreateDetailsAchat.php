<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateDetailsAchat extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => ['type' => 'INTEGER','auto_increment' => true,],
            'achat_id' => ['type' => 'INTEGER','null' => false,],
            'produit_id' => ['type' => 'INTEGER','null' => false,],
            'quantite' => ['type' => 'INTEGER','null' => false,],
            'prix_unitaire' => ['type' => 'INTEGER','null' => false,],
            'montant' => ['type' => 'INTEGER','null' => false,],
            'created_at' => ['type' => 'DATETIME','null' => true,],
            'updated_at' => ['type' => 'DATETIME','null' => true,],
        ]);

        $this->forge->addKey('id', true);

        $this->forge->addForeignKey(
            'achat_id',
            'achats',
            'id',
            'CASCADE',
            'CASCADE'
        );

        $this->forge->addForeignKey(
            'produit_id',
            'produits',
            'id',
            'CASCADE',
            'CASCADE'
        );

        $this->forge->createTable('details_achat');
    }

    public function down()
    {
        $this->forge->dropTable('details_achat');
    }
}