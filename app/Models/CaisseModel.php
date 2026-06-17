<?php

namespace App\Models;

use CodeIgniter\Model;

class CaisseModel extends Model
{
    protected $table         = 'caisses';
    protected $primaryKey    = 'id';
    protected $returnType    = 'array';
    protected $useTimestamps = true;

    protected $allowedFields = ['numero', 'nom' , 'created_at', 'updated_at'];
}
