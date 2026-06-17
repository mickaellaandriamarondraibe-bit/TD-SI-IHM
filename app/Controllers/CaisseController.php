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

   

   
}