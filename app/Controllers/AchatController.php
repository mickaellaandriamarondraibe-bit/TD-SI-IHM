<?php 
namespace App\Controllers ;

use App\Models\DetailsAchatModel ;
use App\Models\AchatModel;
use App\Models\ProduitModel;
class AchatController extends BaseController
{
    private $produitModel;
    public function __construct()
    {
        $this->produitModel = new ProduitModel();
    }
    
     public function form()
    {
        
         $idcaisse = $this->request->getPost('caisse_id');
        session()->set([
            'caisse_id' => $idcaisse
        ]);

        if (!session()->get('caisse_id')) {
            return redirect()->to('/caisse')->with('error', 'Veuillez choisir une caisse.');
        }

        return view('achat/acceuil', [
            'produits'  => $this->produitModel->getAllProduits(),
            'caisse_id' => session()->get('caisse_id'),
        ]);
    }
  
    public function cloturerAchat()
{
    $panierJson = $this->request->getPost('panierInput');
    $panier = json_decode($panierJson, true);

    if (empty($panier)) {
        return redirect()->back()->with('error', 'Le panier est vide.');
    }

    $db = \Config\Database::connect();
    $db->transStart();

    $achatModel = new AchatModel();
    $achatId = $achatModel->insert([
        'caisse_id' => session()->get('caisse_id'),
    ]);

    $produitModel = new ProduitModel();
    $detailModel  = new DetailsAchatModel();

    foreach ($panier as $ligne) {
        // on ne fait jamais confiance au prix envoyé par le navigateur
        $produit      = $produitModel->find($ligne['produit_id']);
        $prixUnitaire = $produit['prix'];
        $quantite     = (int) $ligne['quantite'];

        $detailModel->insert([
            'achat_id'      => $achatId,
            'produit_id'    => $ligne['produit_id'],
            'quantite'      => $quantite,
            'prix_unitaire' => $prixUnitaire,
            'montant'       => $quantite * $prixUnitaire,
        ]);
    }

    $db->transComplete();

    if ($db->transStatus() === false) {
        return redirect()->back()->with('error', "Erreur lors de l'enregistrement.");
    }

    return redirect()->to('achat')->with('success', 'Achat enregistré.');
}
}
?>