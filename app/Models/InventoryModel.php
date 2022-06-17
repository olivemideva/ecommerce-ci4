<?php

namespace App\Models;

use CodeIgniter\Model;

class InventoryModel extends Model
{
    protected $table      = 'inventory';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;

    // protected $returnType     = 'array';
    // protected $useSoftDeletes = true;

    protected $allowedFields = 
    [
        'item_name', 'price','image','description','category_id','sub_category_id','is_deleted'
    ];

    public function getdata(){	

        $this->select('*');        
        $this->from('inventory');
        $this->join('sub-categories', 'sub-categories.category_ID = inventory.category_id');
        $this->join('categories', 'categories.id = sub_categories.category_ID');
        $query = $this->get();

        return $query->getResult();
    
        }
 }

?>