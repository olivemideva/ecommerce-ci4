<?php

namespace App\Controllers;
use App\Models\CategoriesModel;
use App\Models\subCategoryModel;
use App\Models\InventoryModel;
use App\Models\ClientModel;

class Client extends BaseController
{

    private $db;

    public function __construct()
    {
        // Loading database
        $this->db = \Config\Database::connect();
    }

    public function homepage()
    {
        $categoriesModel = new \App\Models\CategoriesModel();
        $subCategoriesModel = new \App\Models\subCategoryModel();

        $data = [
            'category' =>$this->subcategory(),
            'sub_category' =>$this->subs(),         
        ]; 

        return view('client/homepage', $data);
    }

    
    public function subs()
    {
        $subCategoriesModel = new \App\Models\subCategoryModel();

        $subCategoriesModel->select('id, sub_category_name, category_ID');
        $query = $subCategoriesModel->get();
                              
        return $query->getResult();
    }

    public function subcategory()
    {
        $categoriesModel = new \App\Models\CategoriesModel();

        $categoriesModel->select('id, category_name');
        $query = $categoriesModel->get();
                          
        return $query->getResult();
    }

    public function products()
    {
        $categoriesModel = new \App\Models\CategoriesModel();
        $subCategoriesModel = new \App\Models\subCategoryModel();
        $inventoryModel = new \App\Models\InventoryModel();

        $data['categories']= json_decode(json_encode($inventoryModel->join('categories', 'categories.id=category_id')->getWhere(['is_deleted=0'])->getResultArray()),true);

        return view('client/products', $data);
    }

}
