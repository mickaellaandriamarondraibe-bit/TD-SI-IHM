<?php 
namespace App\Controllers ;

use App\Models\ProduitModel;
class ProduitController extends BaseController
{
    private $produitModel;

     public function __construct()
    {
        $this->produitModel = new ProduitModel();
        
    }
    public function getAllProduits(){
        return $this->produitModel->getAllProduits() ;
    }
}
?>