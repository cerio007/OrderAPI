<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\Repositories\CategoryRepository;

class CategoryService
{
    protected $cate;

    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->cate = $categoryRepository;
    }

    public function createCategories($data)
    {
        return $this->cate->createCategories($data);
    }

    public function getCategories()
    {
        return $this->cate->getCategories();
    }
    // Get a Category
    public function getACategory($id)
    {
        return $this->cate->getACategory($id);
    }
    // Update Product
    public function updateCate(Request $request, $id)
    {
        return $this->cate->updateCate($request, $id);
    }
        // Delete Product
        public function deleteCategory($id)
        {
            return $this->cate->deleteCategory($id);
        }
    
}
