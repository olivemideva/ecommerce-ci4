<?php

namespace App\Controllers;
use App\Models\ClientModel;
use App\Libraries\Hash;

class Loginandregister extends BaseController
{
    public function __construct(){
        helper(['url','form']);
    }

    public function login()
    {
        return view('login');
    }
    
    public function register()
    {
        return view('register');
    }

    public function save(){
        //register form validation

        // $validation =$this->validate([
        //     'username'=>'required|is_unique[users.username]',
        //     'firstname'=>'required',
        //     'lastname'=>'required',
        //     'email'=>'required|valid_email|is_unique[users.email]',
        //     'password'=>'required|min_length[5]|max_length[12]',
        //     'cpassword'=>'required|min_length[5]|max_length[12]|matches[password]',
        //     'gender'=>'required',
        //     'role'=>'required',
        // ]);

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
            return view('register',['validation'=>$this->validator]);
        }else{
            //enter register information to db
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
                return redirect()->to('Loginandregister/register')->with('success', 'You have been registered successfully');
            }

        }
    }

    public function check(){
        //validation
        $validation = $this->validate([
            'email'=>[
                'rules'=>'required|valid_email|is_not_unique[users.email]',
                'errors'=>[
                    'required'=>'Email is required',
                    'valid_email'=>'Enter a valid email address',
                    'is_not_unique'=>'This email is not registered'
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
                ]);

        if(!$validation){
            return view('login',['validation'=>$this->validator]);
        }else{
            //get user info according to requested email address
            $email = $this->request->getPost('email');
            $password = $this->request->getPost('password');
            $clientModel = new \App\Models\ClientModel();
            $user_info =$clientModel->where('email', $email)->first();
            // $check_password = Hash::check($password, $user_info['password']);

            if($password!=$user_info['password']){
                session()->setFlashdata('fail', 'Incorrect password');
                return redirect()->to('Loginandregister/login')->withInput();
            }else{
                if($user_info['role'] == 1){
                    $username = $user_info['username'];
                    session()->set('loggedClient', $username);
                    return redirect()->to('Client/homepage');

                }else{
                    $username = $user_info['username'];
                    session()->set('loggedAdmin', $username);
                    return redirect()->to('Admin/admindashboard');
                }
            }
        }
    }

    public function user()
    {}

    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('Loginandregister/login');
    }
}
