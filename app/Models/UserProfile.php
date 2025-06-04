<?php

namespace App\Models;

use CodeIgniter\Model;

class UserProfile extends Model
{
    protected $table = 'user_profiles';
    protected $primaryKey = 'id';
    protected $allowedFields = ['user_id', 'bank_name', 'account_number', 'account_name', 'account_valid', 'identity_card_image', 'created_at', 'updated_at', 'deleted_at'];
    protected $useTimestamps = true;
}
