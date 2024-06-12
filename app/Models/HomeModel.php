<?php

namespace App\Models;

use CodeIgniter\Model;

class HomeModel extends Model
{
    protected $table = 'blog';
    protected $primaryKey = 'id';
    protected $allowedFields = ['Cover_Image', 'date', 'author', 'Title', 'Content'];

    public function getBlogPosts($limit = 3)
    {
        return $this->orderBy('date', 'DESC')->limit($limit)->findAll();
    }
}
