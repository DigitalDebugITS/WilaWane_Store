<?php

namespace App\Models;

use CodeIgniter\Model;

class ResourceModel extends Model
{
    protected $table = 'resources';
    protected $primaryKey = 'id';
    protected $allowedFields = ['id', 'title', 'price', 'description', 'url', 'image', 'category'];

    public function getCategories()
    {
        return $this->select('category')->distinct()->findAll();
    }

    public function getResources($category = '', $limit = 6, $offset = 0)
    {
        if ($category) {
            return $this->where('category', $category)->orderBy('id', 'DESC')->findAll($limit, $offset);
        } else {
            return $this->orderBy('id', 'DESC')->findAll($limit, $offset);
        }
    }

    public function getTotalResources($category = '')
    {
        if ($category) {
            return $this->where('category', $category)->countAllResults();
        } else {
            return $this->countAllResults();
        }
    }
}
