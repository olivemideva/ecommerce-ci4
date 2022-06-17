<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class BasicAuthFilter implements FilterInterface
{

    public function before(RequestInterface $request)
    {
        echo 'test filter';
    }

    public function after(RequestInterface $request, ResponseInterface $response)
    {
    }

}