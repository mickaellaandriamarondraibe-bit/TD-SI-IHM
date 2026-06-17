<?php

namespace App\Models;

use CodeIgniter\Model;

class DetailsAchatModel extends Model
{
    protected $table         = 'details_achat';
    protected $primaryKey    = 'id';
    protected $returnType    = 'array';
    protected $useTimestamps = true;
    protected $allowedFields = ['achat_id', 'produit_id', 'quantite', 'prix_unitaire', 'montant'];
}