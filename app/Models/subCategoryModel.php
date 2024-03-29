<?php

namespace App\Models;

use CodeIgniter\Model;

class subCategoryModel extends Model
{
    protected $table      = 'sub-categories';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;

    // protected $returnType     = 'array';
    // protected $useSoftDeletes = true;

    protected $allowedFields = 
    [
        'sub-category_name','category_ID','is_deleted'
    ];

    // protected $useTimestamps = false;
    // protected $createdField  = 'created_at';
    // protected $updatedField  = 'updated_at';
    // protected $deletedField  = 'deleted_at';

    // protected $validationRules    = [];
    // protected $validationMessages = [];
    // protected $skipValidation     = false;
}

?>