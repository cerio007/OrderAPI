<?php

namespace App\Http\Controllers;

use App\Services\CategoryService;
use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Request;

class CategoryController extends Controller
{

    protected $cateService;

    public function __construct(CategoryService $categoryService)
    {
        $this->cateService = $categoryService;
    }

// Get all Categories
    public function index()
    {
        return $this->cateService->getCategories();
    }

// Get a Category
    public function show($id)
    {
        return $this->cateService->getACategory($id);
    }

// Create a Category
    public function store(Request $request)
    {
        return $this->cateService->createCategories($request['name']);
    }

    // Update a Category
    public function update(Request $request, $id)
    {
        return $this->cateService->updateCate($request, $id);
    }
// Delete a Category
    public function destroy($id)
    {
        return $this->cateService->deleteCategory($id);
    }
}
