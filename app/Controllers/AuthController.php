<?php 
namespace App\Controllers;

use App\Models\UserModel;

class AuthController extends BaseController
{
    public function login()
    {
        helper(['form']);
        return view('auth/login');
    }

    public function authenticate()
    {
        helper(['form']);

        $rules = [
            'email' => 'required|valid_email',
            'mot_de_passe' => 'required|min_length[3]',
        ];

        if (! $this->validate($rules)) {
            return view('auth/login', [
                'validation' => $this->validator,
            ]);
        }

        $userModel = new UserModel();
        $user = $userModel->where('email', $this->request->getPost('email'))->first();

        if (! $user || ! $userModel->verifyPassword($user, $this->request->getPost('mot_de_passe'))) {
            return redirect()->back()->withInput()->with('error', 'Email ou mot de passe incorrect.');
        }

        session()->set([
            'user_id' => $user['id'],
            'nom'      => $user['nom'],
            'email'    => $user['email'],
            'role'     => $user['role'],
            'loggedIn' => true,
        ]);

        return redirect()->to('/caisse');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login')->with('success', 'Vous êtes déconnecté.');
    }
}
