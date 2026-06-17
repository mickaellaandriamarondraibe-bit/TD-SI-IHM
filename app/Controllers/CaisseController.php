<?php
namespace App\Controllers;

use App\Models\CaisseModel;
use App\Models\UserModel;

class CaisseController extends BaseController
{
    public function index()
    {
        $caisseModel = new CaisseModel();
        $data['caisses'] = $caisseModel->findAll();
        return view('caisse/acceuil', $data);
    }

    public function valider()
    {
        $caisseId = $this->request->getPost('caisse_id');

        if (empty($caisseId)) {
            return redirect()->back()->with('error', 'Veuillez sélectionner une caisse.');
        }

        session()->set('caisse_id', $caisseId);

        return redirect()->to('/achat')->with('success', 'Caisse sélectionnée.');
    }
}
