<?php

namespace App\Models;

use CodeIgniter\Model;

class Transaction_model extends Model
{
    protected $table      = 'transaction';
    protected $primaryKey = 'id';

    protected $returnType = 'array';
    protected $useSoftDeletes = FALSE;

    protected $allowedFields = [
        'stripe_id',
        'business_name',
        'customer_name',
        'email',
        'qty',
        'amount',
        'product_id',
        'product_name',
        'created_at',
        'updated_at'
    ];

    protected $useTimestamps = TRUE;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = FALSE;
}
