<?php

namespace App\Controllers;
use App\Models\CategoriesModel;
use App\Models\subCategoryModel;
use App\Models\InventoryModel;
use App\Models\ClientModel;

class Cart extends BaseController
{
    public function cart()
    {
        $data['items'] = array_values(session('cart'));
        return view('client/cart', $data);
    }

    public function buy($id)
    {
        $inventoryModel = new \App\Models\InventoryModel();
        $inventory =  $inventoryModel->find($id);

        $item = array(
            'id' => $inventory['id'],
            'item_name' => $inventory['item_name'],
            'price' => $inventory['price'],
            'description' => $inventory['description'],
            'image' => $inventory['image'],
            'quantity' => 1,
        );
        $session = session();
        if($session->has('cart')){}
        else{
            $cart = array($item);
            $session->set('cart', $cart);
        }
        return $this->response->redirect(base_url('client/cart'));
    }

}
