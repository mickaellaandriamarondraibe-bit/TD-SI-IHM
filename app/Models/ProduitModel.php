<?php

namespace App\Models;

use CodeIgniter\Model;

class ProduitModel extends Model
{
    protected $table         = 'produits';
    protected $primaryKey    = 'id';
    protected $returnType    = 'array';
    protected $useTimestamps = true;

    protected $allowedFields = ['designation', 'prix','quantite_stock','created_at','update_at'];

    public function getAllProduits(){
        return $this->findAll() ;
    }
}
