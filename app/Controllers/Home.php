<?php

namespace App\Controllers;

use App\Models\Home;

class Home extends BaseController
{
    public function index()
    {
        $homeModel = new Home();
        $data['blogPosts'] = $homeModel->getBlogPosts();

        return view('home', $data);
    }
}
