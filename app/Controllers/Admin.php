<?php

namespace App\Controllers;
use App\Models\ClientModel;
use App\Models\InventoryModel;
use App\Models\CategoriesModel;
use App\Models\subCategoryModel;
use App\Libraries\Hash;

class Admin extends BaseController
{
    public function __construct(){
        helper(['url','form']);
    }

    public function admindashboard()
    {
        $categoriesModel = new \App\Models\CategoriesModel();
        $subCategoriesModel = new \App\Models\subCategoryModel();

        $data['joinedTable']= json_decode(json_encode($subCategoriesModel->join('categories', 'categories.id=category_ID')->getWhere(['is_deleted=0'])->getResultArray()),true);

        $data['categories'] = $categoriesModel->orderBy('id', 'ASC')->paginate(10);
        //$data['subs'] = $subCategoriesModel->orderBy('id', 'ASC')->paginate(10);

        $data['pagination_link'] = $categoriesModel->pager;

        return view('admin/admindashboard', $data);
    }

    public function add_users()
    {
        return view('admin/add_users');
    }

    public function add_users_validation()
    {
        $validation = $this->validate([
            'username'=>[
                'rules' =>'required|is_unique[users.username]',
                'errors'=>[
                    'required'=>'Username is required',
                    'is_unique'=>'Username already exists'
                ]
                ],
            'firstname'=>[
                'rules' =>'required',
                'errors'=>[
                    'required'=>'Firstname is required'
                ]
                ],
            'lastname'=>[
                'rules' =>'required',
                'errors'=>[
                    'required'=>'Lastname is required'
                ]
                ],
            'email'=>[
                'rules'=>'required|valid_email|is_unique[users.email]',
                'errors'=>[
                    'required'=>'Email is required',
                    'valid_email'=>'Enter a valid email address',
                    'is_unique'=>'Email already taken'
                ]
                ],
            'password'=>[
                'rules'=>'required|min_length[5]|max_length[12]',
                'errors'=>[
                    'required'=>'Password is required',
                    'min_length'=>'Password must have atleast 5 characters',
                    'max_length'=>'Password must not exceed 12 characters'
                ]
                ],
            'cpassword'=>[
                'rules'=>'required|min_length[5]|max_length[12]|matches[password]',
                'errors'=>[
                    'required'=>'Please confirm your password',
                    'min_length'=>'Confirm password must have atleast 5 characters',
                    'max_length'=>'Confirm password must not exceed 12 characters',
                    'matches'=>'Password does not match'
                ]
                ],
            'gender'=>[
                'rules' =>'required',
                'errors'=>[
                    'required'=>'Please pick your gender'
                ]
                ],
            'role'=>[
                'rules' =>'required',
                'errors'=>[
                    'required'=>'Role is required'
                ]
                ],
                ]);

                if(!$validation){
                    return view('admin/add_users',['validation'=>$this->validator]);
                }else{
                    //enter new information to db
                    $username = $this->request->getPost('username');
                    $firstname = $this->request->getPost('firstname');
                    $lastname = $this->request->getPost('lastname');
                    $email = $this->request->getPost('email');
                    $password = $this->request->getPost('password');
                    $gender = $this->request->getPost('gender');
                    $role = $this->request->getPost('role');
        
                    $values = [
                        'username'=>$username,
                        'firstname'=>$firstname,
                        'lastname'=>$lastname,
                        'email'=>$email,
                        'password'=>Hash::make($password),
                        'gender'=>$gender,
                        'role'=>$role,
                    ];
        
                    $clientModel = new \App\Models\ClientModel();
                    $query = $clientModel->insert($values);
                    if(!$query){
                        return redirect()->back()->with('fail', 'Something went wrong');
                        // return redirect()->to('register')->with('fail', 'Something went wrong');
                    }else{
                        return redirect()->to('Admin/add_users')->with('success', 'User added successfully');
                    }
        
                }
    }

    public function customers()
    {
        $ClientModel = new \App\Models\ClientModel();

        $data['user_data'] = $ClientModel->orderBy('id', 'DESC')->paginate(10);

        $data['pagination_link'] = $ClientModel->pager;

        return view('admin/customers', $data);
    }

    public function fetch_user($id = null)
    {
        $ClientModel = new \App\Models\ClientModel();

        $data['user_data'] = $ClientModel->where('id' , $id)->first();

        return view('admin/edit_users', $data);
    }
    public function edit_users_validation()
    {
        $validation = $this->validate([
            'username'=>[
                'rules' =>'required',
                'errors'=>[
                    'required'=>'Username is required',
                ]
                ],
            'firstname'=>[
                'rules' =>'required',
                'errors'=>[
                    'required'=>'Firstname is required'
                ]
                ],
            'lastname'=>[
                'rules' =>'required',
                'errors'=>[
                    'required'=>'Lastname is required'
                ]
                ],
            'email'=>[
                'rules'=>'required|valid_email',
                'errors'=>[
                    'required'=>'Email is required',
                    'valid_email'=>'Enter a valid email address',
                ]
                ],
            'password'=>[
                'rules'=>'required|min_length[5]',
                'errors'=>[
                    'required'=>'Password is required',
                    'min_length'=>'Password must have atleast 5 characters',
                ]
                ],
            'gender'=>[
                'rules' =>'required',
                'errors'=>[
                    'required'=>'Please pick your gender'
                ]
                ],
            'role'=>[
                'rules' =>'required',
                'errors'=>[
                    'required'=>'Role is required'
                ]
                ],
                ]);

                $clientModel = new \App\Models\ClientModel();

                $id = $this->request->getVar('id');

                if(!$validation){
                    $data['user_data'] = $clientModel->where('id', $id)->first();
                    $data['validation'] = $this->validator;
                    echo view('admin/edit_users',$data);
                }else{
                    //enter editted information to db
                    $username = $this->request->getPost('username');
                    $firstname = $this->request->getPost('firstname');
                    $lastname = $this->request->getPost('lastname');
                    $email = $this->request->getPost('email');
                    $password = $this->request->getPost('password');
                    $gender = $this->request->getPost('gender');
                    $role = $this->request->getPost('role');
        
                    $data = [
                        'username'=>$username,
                        'firstname'=>$firstname,
                        'lastname'=>$lastname,
                        'email'=>$email,
                        'password'=>Hash::make($password),
                        'gender'=>$gender,
                        'role'=>$role,
                    ];

                    $clientModel->update($id, $data);

                    $session = \Config\Services::session();

                    if(!$session){
                        return redirect()->back()->with('fail', 'Something went wrong');
                        // return redirect()->to('register')->with('fail', 'Something went wrong');
                    }else{
                        return redirect()->to('Admin/customers')->with('success', 'User edited successfully');
                    }
        
                }
    }
    public function delete_user($id)
    {
        $clientModel = new \App\Models\ClientModel();

        $clientModel->where('id', $id)->delete($id);

        $session = \Config\Services::session();

        if(!$session){
            return redirect()->back()->with('fail', 'Something went wrong');
            // return redirect()->to('register')->with('fail', 'Something went wrong');
        }else{
            return redirect()->to('Admin/customers')->with('success', 'User deleted successfully');
        }
    }

    public function inventory()
    {       
        $inventoryModel = new \App\Models\InventoryModel();

        $data['item_data'] = $inventoryModel->orderBy('id', 'DESC')->paginate(3);

        $data['pagination_link'] = $inventoryModel->pager;

        return view('admin/inventory', $data);

    }

    public function add_item()
    {
        $categoriesModel = new \App\Models\CategoriesModel();
        $subCategoriesModel = new \App\Models\subCategoryModel();

        $data['joinedTable']= json_decode(json_encode($subCategoriesModel->join('categories', 'categories.id=category_ID')->getWhere(['is_deleted=0'])->getResultArray()),true);
        $data = [
            'category' =>$this->subcategory(),
            'sub_category' =>$this->subs(),         
        ]; 

        // $data['categories'] = $categoriesModel->orderBy('id', 'DESC');
        // $data['sub_categories'] = $subCategoriesModel->orderBy('id', 'DESC');

        return view('admin/add_item', $data);
    }

    public function save_item()
    {

        $validation = $this->validate([
            'item_name'=>[
                'rules' =>'required',
                'errors'=>[
                    'required'=>'Item name is required',
                ]
                ],
            'price'=>[
                'rules' =>'required',
                'errors'=>[
                    'required'=>'Price is required'
                ]
                ],
            'description'=>[
                'rules' =>'required',
                'errors'=>[
                    'required'=>'Description is required'
                ]
                ],
            'image'=>[
                'rules'=>'uploaded[image]|is_image[image]',
                'label'=>'Image'
                ],
                ]);

                if(!$validation){
                    return view('admin/add_item',['validation'=>$this->validator]);
                }else{

                    $file = $this->request->getFile('image');

                    if($file->isValid() && !$file->hasMoved()){
                        $imageName = $file->getRandomName();
                        $file->move('./uploads', $imageName);
                    }

                    $itemname = $this->request->getPost('item_name');
                    $price = $this->request->getPost('price');
                    $description = $this->request->getPost('description');
                    $category_id = $this->request->getPost('category_id');
                    $sub_category_id = $this->request->getPost('sub_category_id');
            
                    $data = [
                        'item_name'=>$itemname,
                        'price'=>$price,
                        'image'=>$imageName,
                        'description'=>$description,
                        'category_id'=>$category_id,
                        'sub_category_id'=>$sub_category_id,
                    ];
                    // $inventoryModel->save($data);
                    // return redirect()->to('Admin/inventory')->with('status','Product data and image saved');
                    
                    $inventoryModel = new \App\Models\InventoryModel();

                    $query = $inventoryModel->save($data);
                    if(!$query){
                        return redirect()->back()->with('fail', 'Something went wrong');
                        // return redirect()->to('register')->with('fail', 'Something went wrong');
                    }else{
                        return redirect()->to('Admin/inventory')->with('success', 'Item added successfully');
                    }
                   
                }
        
    }
    public function fetch_item($id = null)
    {
        $inventoryModel = new \App\Models\InventoryModel();

        $data = [
            'category' =>$this->subcategory(),
            'sub_category' =>$this->subs(),         
        ];
        $data['item_data'] = $inventoryModel->where('id' , $id)->first();

        return view('admin/edit_item', $data);
    }

    public function edit_item_validation($id = null)
    {
        
        $inventoryModel = new \App\Models\InventoryModel();
        
        $validation = $this->validate([
            'item_name'=>[
                'rules' =>'required',
                'errors'=>[
                    'required'=>'Item name is required',
                ]
                ],
            'price'=>[
                'rules' =>'required',
                'errors'=>[
                    'required'=>'Price is required'
                ]
                ],
            'description'=>[
                'rules' =>'required',
                'errors'=>[
                    'required'=>'Description is required'
                ]
                ],
            'image'=>[
                'rules'=>'is_image[image]',
                'label'=>'Image'
                ],
                ]);

                if(!$validation){
                    $data['item_data'] = $inventoryModel->where('id', $id)->first();
                    $data['validation'] = $this->validator;
                    echo view('admin/edit_item',$data);
                }else{

                    $file = $this->request->getFile('image');
                    $product = $inventoryModel->find($id);
                    $imageName = $file->getRandomName();

                    echo $product['image'];

                    if($file->isValid() && !$file->hasMoved()){
                        $old_imageName = $product['image'];
                        //unlink("uploads/" .$old_imageName);
                        $file->move('./uploads', $imageName);
                       }else{
                        $old_imageName = $imageName;
                       }

                    $itemname = $this->request->getPost('item_name');
                    $price = $this->request->getPost('price');
                    $description = $this->request->getPost('description');
                    $category_id = $this->request->getPost('category_id');
                    $sub_category_id = $this->request->getPost('sub_category_id');
            
                    $data = [
                        'item_name'=>$itemname,
                        'price'=>$price,
                        'image'=>$imageName,
                        'description'=>$description,
                        'category_id'=>$category_id,
                        'sub_category_id'=>$sub_category_id,
                    ];
                    // $inventoryModel->save($data);
                    // return redirect()->to('Admin/inventory')->with('status','Product data and image saved');

                    $inventoryModel->update($id, $data);

                    $session = \Config\Services::session();

                    if(!$session){
                        return redirect()->back()->with('fail', 'Something went wrong');
                        // return redirect()->to('register')->with('fail', 'Something went wrong');
                    }else{
                        return redirect()->to('Admin/inventory')->with('success', 'Item edited successfully');
                    }
                   
                 }
    }

    public function delete_item($id)
    {
        $inventoryModel = new \App\Models\InventoryModel();

        $inventoryModel->where('id', $id)->delete($id);

        // $product = $inventoryModel->find($id);

        // unlink("uploads/" .$product['image']);

        $session = \Config\Services::session();

        if(!$session){
            return redirect()->back()->with('fail', 'Something went wrong');
            // return redirect()->to('register')->with('fail', 'Something went wrong');
        }else{
            return redirect()->to('Admin/inventory')->with('success', 'Item deleted successfully');
        }
    }

    public function delete_category($id)
    {}

    public function delete_sub($id)
    {
        $subCategoriesModel = new \App\Models\subCategoryModel();

        $subCategoriesModel->where('id', $id)->delete($id);

        $session = \Config\Services::session();

        if(!$session){
            return redirect()->back()->with('fail', 'Something went wrong');
            // return redirect()->to('register')->with('fail', 'Something went wrong');
        }else{
            return redirect()->to('Admin/admindashboard')->with('success', 'Item deleted successfully');
        }
    }
    public function edit_subs($id)
    {
        $subCategoriesModel = new \App\Models\subCategoryModel();

        $data['subs'] =  $subCategoriesModel->where('id' , $id)->first();
    
        $data = [
                    'sub_category' =>$this->subcategory(),        
                ];       

        return view('admin/edit_subs', $data);
    }

    public function edit_subs_validation()
    {
        $validation = $this->validate([
            'sub_category_name'=>[
                'rules' =>'required',
                'errors'=>[
                    'required'=>'Sub-category is required',
                ]
                ],
            'category_name'=>[
                'rules' =>'required',
                'errors'=>[
                    'required'=>'Field is required'
                ]
                ],
                ]);

                $categoriesModel = new \App\Models\CategoriesModel();
                $subCategoriesModel = new \App\Models\subCategoryModel();
        
                $id = $this->request->getVar('id');

                if(!$validation){
                    $data['joinedTable']= json_decode(json_encode($subCategoriesModel->join('categories', 'categories.id=category_ID')->getWhere('id', $id)->first()->getResultArray()),true); 
                    //$data['sub_categories'] =  $subCategoriesModel ->where('sub_category_ID', $id)->first();
                    $data['validation'] = $this->validator;
                    echo view('admin/edit_subs',$data);
                }else{
                    //enter editted information to db
                    $sub_Categoryname = $this->request->getPost('sub_category_name');
                    $category_id = $this->request->getPost('category_ID');
        
                    $data = [
                        'sub_category_name'=>$sub_Categoryname,
                        'category_ID'=>$category_id,
                    ];

                    $subCategoriesModel ->update($id, $data);

                    $session = \Config\Services::session();

                    if(!$session){
                        return redirect()->back()->with('fail', 'Something went wrong');
                        // return redirect()->to('register')->with('fail', 'Something went wrong');
                    }else{
                        return redirect()->to('Admin/admindashboard')->with('success', 'Sub-category edited successfully');
                    }
        
                }

            }

            public function subs()
            {
                $subCategoriesModel = new \App\Models\subCategoryModel();
    
                $subCategoriesModel->select('id, sub_category_name, category_ID');
                $query = $subCategoriesModel->get();
    
                // $db=\Config\Database::connect();
                // $builder=$db->table('tbl_categories');
                // $builder->select('id, category_name');
                // $query = $builder->get();
                                      
                return $query->getResult();
            }

    public function subcategory()
        {
            $categoriesModel = new \App\Models\CategoriesModel();

            $categoriesModel->select('id, category_name');
            $query = $categoriesModel->get();

            // $db=\Config\Database::connect();
            // $builder=$db->table('tbl_categories');
            // $builder->select('id, category_name');
            // $query = $builder->get();
                                  
            return $query->getResult();
        }

    public function category()
        {
            $data = [
                        'sub_category' =>$this->subcategory(),        
                    ];  
            return view('admin/add_subs',  $data);
        }
        

    public function storesubcategory()
        {

            $subCategoriesModel = new \App\Models\subCategoryModel();

            $data=[
                'sub_category_name'=>$this->request->getVar('sub_category_name'),
                'category_ID'=>$this->request->getVar('category_ID'),
            ];
                
            // $db=\Config\Database::connect();
            // $insertcategory=$db->table('tbh_sub-categories');
                
            // $insertcategory->insert($data);

            $query = $subCategoriesModel->save($data);

            if(!$query){
                return redirect()->back()->with('fail', 'Something went wrong');
            }else{
                return redirect()->to('Admin/inventory')->with('success', 'Sub-category added successfully');
            }

            // if($insertcategory==true){
                  
            //     return redirect()->to('Admin/admindashboard')->with('success', 'Sub-category added successfully');
                    
            // }
            // else{
            //     return redirect()->back()->with('fail', 'Something went wrong');
            //     }
        }

    public function add_categories()
        {
            return view('admin/add_categories');
        }
    
                public function save_categories()
                {
                    $validation = $this->validate([
                        'category_name'=>[
                            'rules' =>'required',
                            'errors'=>[
                                'required'=>'Field is required'
                            ]
                            ],
                            ]);
            
                            $categoriesModel = new \App\Models\CategoriesModel();
                    
                            if(!$validation){
                                return view('admin/add_categories',['validation'=>$this->validator]);
                            }else{
            
                                $categoryname = $this->request->getPost('category_name');
        
                                $data = [
                                    'category_name'=>$categoryname,
                                ];
            
                                $query =  $categoriesModel->save($data);
                                if(!$query){
                                    return redirect()->back()->with('fail', 'Something went wrong');
                                    // return redirect()->to('register')->with('fail', 'Something went wrong');
                                }else{
                                    return redirect()->to('Admin/admindashboard')->with('success', 'Category added successfully');
                                }
                               
                            }
                }

                public function edit_categories($id)
                {
                    $categoriesModel = new \App\Models\CategoriesModel();

                    $data['category'] =  $categoriesModel->where('id' , $id)->first();
            
                    return view('admin/edit_categories', $data);
                }

                public function edit_categories_validation()
                {

                    $categoriesModel = new \App\Models\CategoriesModel();

                    $validation = $this->validate([
                        'category_name'=>[
                            'rules' =>'required',
                            'errors'=>[
                                'required'=>'Field is required'
                            ]
                            ],
                            ]);    
            
                            $id = $this->request->getVar('id');
            
                            if(!$validation){
                                $data['categories'] =  $categoriesModel ->where('id', $id)->first();
                                $data['validation'] = $this->validator;
                                echo view('admin/edit_categories',$data);
                            }else{
                                //enter editted information to db
                                $categoryname = $this->request->getPost('category_name');
                    
                                $data = [
                                    'category_name'=>$categoryname,
                                ];
            
                                $categoriesModel ->update($id, $data);
            
                                $session = \Config\Services::session();
            
                                if(!$session){
                                    return redirect()->back()->with('fail', 'Something went wrong');
                                    // return redirect()->to('register')->with('fail', 'Something went wrong');
                                }else{
                                    return redirect()->to('Admin/admindashboard')->with('success', 'Category edited successfully');
                                }
                    
                            }
                }
}
