<?php

namespace App\Models;

use CodeIgniter\Model;

class ActivationModel extends Model

{
    protected $table = 'user_token';
    protected $useTimestamps = true;
    protected $allowedFields = ['email', 'token', 'created_at'];
    public function getActivation($email = false)
    {
        // jika slugnya false maka ditampilkkan this projectsModel lalu find all
        if ($email == false) {
            return $this->findAll();
        }
        // jikada return 
        return $this->where(['email' => $email])->first();
    }
}
