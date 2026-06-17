<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class DemoSeeder extends Seeder
{
    public function run()
    {
        $now = date('Y-m-d H:i:s');

        $this->db->table('produits')->insertBatch([
            [
                'designation' => 'Biscuit',
                'prix' => 1000,
                'quantite_stock' => 100,
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'designation' => 'Pain',
                'prix' => 400,
                'quantite_stock' => 200,
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'designation' => 'Lait',
                'prix' => 2500,
                'quantite_stock' => 50,
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'designation' => 'Sucre',
                'prix' => 3000,
                'quantite_stock' => 80,
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'designation' => 'Huile',
                'prix' => 7000,
                'quantite_stock' => 30,
                'created_at' => $now,
                'updated_at' => $now
            ],
        ]);

        // Caisses
        $this->db->table('caisses')->insertBatch([
            [
                'numero' => 1,
                'nom' => 'Caisse 1',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'numero' => 2,
                'nom' => 'Caisse 2',
                'created_at' => $now,
                'updated_at' => $now
            ],
        ]);

        // Utilisateurs
        $this->db->table('utilisateurs')->insertBatch([
    [
        'nom' => 'Admin',
        'email' => 'admin@itu.mg',
        'mot_de_passe' => 'admin123',
        'role' => 'admin',
        'created_at' => $now,
        'updated_at' => $now,
    ],
    [
        'nom' => 'Caissier 1',
        'email' => 'caissier1@itu.mg',
        'mot_de_passe' => '1234',
        'role' => 'caissier',
        'created_at' => $now,
        'updated_at' => $now,
    ],
    ]);
    }
}