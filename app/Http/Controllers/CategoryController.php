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

    public function index()
    {
        return $this->cateService->getCategories();
    }

    public function store(Request $request)
    {
        return $this->cateService->createCategories($request['name']);
    }
}
