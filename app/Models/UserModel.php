<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table      = 'utilisateurs';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'nom',
        'email',
        'mot_de_passe',
        'role',
        'created_at',
        'updated_at',
    ];
    protected $useTimestamps = true;
    protected $beforeInsert = ['hashPassword'];
    protected $beforeUpdate = ['hashPassword'];

    protected function hashPassword(array $data)
    {
        if (empty($data['data']['mot_de_passe'])) {
            return $data;
        }

        $password = $data['data']['mot_de_passe'];

        if (! password_get_info($password)['algo']) {
            $data['data']['mot_de_passe'] = password_hash($password, PASSWORD_DEFAULT);
        }

        return $data;
    }

    public function verifyPassword(array $user, string $password): bool
    {
        if (empty($user['mot_de_passe'])) {
            return false;
        }

        $stored = $user['mot_de_passe'];

        if (password_get_info($stored)['algo']) {
            return password_verify($password, $stored);
        }

        return hash_equals($stored, $password);
    }
}
