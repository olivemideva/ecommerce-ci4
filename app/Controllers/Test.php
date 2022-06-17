<?php

namespace App\Controllers;
use App\Models\InventoryModel;
use App\Models\CategoriesModel;
use App\Models\subCategoryModel;

class Test extends BaseController
{
    public function __construct(){
        helper(['url','form']);
    }
    public function index()
    {
        // $inventoryModel = new InventoryModel();
        // $categoriesModel = new CategoriesModel();
        // $subCategoriesModel = new subCategoryModel();

        // // $data['my_data'] = $categoriesModel->findAll() join->$subCategoriesModel->findAll(); ->where('t2.user_id', $user_id)
        // $data['my_data'] = $inventoryModel->join('sub-categories', 'sub-categories.category_ID = categories.id')->get()->getResultArray();


        // var_dump($data);
    }
    public function categories()
    {
        $subCategoriesModel = new subCategoryModel();
       // $data['dropdown'] =  $subCategoriesModel->join('categories', 'categories.id = sub-categories.category_ID')->findAll();

        $data['joinedTable']= json_decode(json_encode($subCategoriesModel->join('categories', 'categories.id=category_ID')->getWhere(['is_deleted=0'])->getResultArray()),true);

        var_dump($data);
    }
}
