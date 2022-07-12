<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Session\Session;

class Pages extends BaseController
{
    public function index()
    {
        $data = ['title' => 'Home'];
        return view('pages/home', $data);
    }
}
