<?php

namespace App\Models;

use CodeIgniter\Model;

class AdminModel extends Model
{
    protected $table = 'admins';
    protected $primaryKey = 'id';
    protected $allowedFields = ['username', 'password'];

    // Check if the username and password are correct
    public function authenticateAdmin($username, $password)
    {
        $admin = $this->where('username', $username)->first();

        if ($admin && password_verify($password, $admin['password'])) {
            return true; // Authenticated
        }

        return false; // Not authenticated
    }
}
