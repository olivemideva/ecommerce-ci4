<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class MyAPI extends BaseController{

public function index1()
{
    return $this->response->setStatusCode(200)
    ->setContentType('text/plain')
    ->setBody('index 1');
}

public function index2()
{
    return $this->response->setStatusCode(200)
    ->setContentType('text/plain')
    ->setBody('index 2');
}

}
