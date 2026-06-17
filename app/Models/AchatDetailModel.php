<?php

namespace App\Models;

use CodeIgniter\Model;

class AchatDetailModel extends Model
{
    protected $table         = 'details_achat';
    protected $primaryKey    = 'id';
    protected $returnType    = 'array';
    protected $useTimestamps = true;

    protected $allowedFields = ['achat_id', 'produit_id','quantite','prix_unitaire','montant'];

    public function insert($data) 
    {
        $this->insert() ;
    }
}
