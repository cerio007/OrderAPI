<?php

namespace App\Services;

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
}
