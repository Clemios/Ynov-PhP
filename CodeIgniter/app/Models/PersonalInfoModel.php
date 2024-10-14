<?php

namespace App\Models;

use CodeIgniter\Model;

class PersonalInfoModel extends Model
{
    protected $table = 'personal_info';
    protected $primaryKey = 'id';
    protected $allowedFields = ['name', 'title', 'email', 'phone', 'profile_description'];

    // Get personal information by ID (we assume ID is 1)
    public function getPersonalInfo()
    {
        return $this->where('id', 1)->first();
    }

    // Update personal information
    public function updatePersonalInfo($data)
    {
        return $this->update(1, $data);
    }
}
