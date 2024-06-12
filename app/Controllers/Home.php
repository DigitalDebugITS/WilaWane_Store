<?php

namespace App\Controllers;

use App\Models\HomeModel;

class Home extends BaseController
{
    public function index()
    {
        $homeModel = new HomeModel();
        $data['blogPosts'] = $homeModel->getBlogPosts();
            // log_message('info','blog data:'.print_r($data));

        return view('home', $data);
    }
}
