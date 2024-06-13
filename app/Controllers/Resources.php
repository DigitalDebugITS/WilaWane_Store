<?php

namespace App\Controllers;

use App\Models\ResourceModel;

class Resources extends BaseController
{
    public function index()
    {
        $model = new ResourceModel();
        $resourcesPerPage = 6;

        // Determine the current page number
        $page = $this->request->getVar('page') ?? 1;
        $selectedCategory = $this->request->getVar('category') ?? '';

        // Calculate the starting resource index for the current page
        $start = ($page - 1) * $resourcesPerPage;

        // Fetch categories from the database
        $categories = $model->getCategories();

        // Fetch resources from the database with pagination and category filter
        $resources = $model->getResources($selectedCategory, $resourcesPerPage, $start);

        // Fetch total number of resources
        $totalResources = $model->getTotalResources($selectedCategory);

        // Calculate total number of pages
        $totalPages = ceil($totalResources / $resourcesPerPage);

        // Pass data to the view
        return view('resources', [
            'categories' => $categories,
            'resources' => $resources,
            'selectedCategory' => $selectedCategory,
            'totalPages' => $totalPages,
            'currentPage' => $page
        ]);
    }
}
