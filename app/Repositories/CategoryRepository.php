<?php

namespace App\Repositories;

use App\Models\Category;
use PhpParser\Node\Stmt\TryCatch;

class CategoryRepository
{
    public function createCategories($name)
    {
        try {
            $category = Category::create([
                'name' => $name
            ]);
            return $this->responseData($category, "Created Successfully");
        } catch (\Throwable $th) {
            return $this->responseData($th, "Failed");
        }
    }

    public function getCategories()
    {
        try {
            $allCategories = Category::all();
            return $this->responseData($allCategories, "Fetched Successfully");
        } catch (\Throwable $th) {
            return $this->responseData($th, "Failed");
        }
    }

    private function responseData($data, $message)
    {
        return response()->json([
            'message' => $message,
            'data' => $data
        ]);
    }
}
