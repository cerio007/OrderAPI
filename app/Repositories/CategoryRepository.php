<?php

namespace App\Repositories;

use App\Models\Category;
use Illuminate\Http\Request;
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
    // Get A Category
    public function getACategory($id)
    {
        try {
            $category = Category::findOrFail($id);

            return $this->responseData($category, "Category fetched Successfully");
        } catch (\Throwable $th) {
            return $this->responseData($th, "Failed");
        }
    }
    // Update Category
    public function updateCate(Request $request, $id)
    {
        try {
        
            $updateCategory = Category::findOrFail($id);
  
            // Validate the request data
            $validatedCategory = $request->validate([
              'name' => 'required|string|max:255'
            ]);
            $updateCategory->name = $validatedCategory['name'];
            $updateCategory->save();
        return $this->responseData($updateCategory, "Category updated successfully");
        } catch (\Throwable $th) {
            return $this->responseData($th, "Failed");
        }
    }
    // Delete Product
    public function deleteCategory($id) 
    {
    try {
        $delCategory = Category::findOrFail($id);
        $delCategory->delete();
        return $this->responseData($delCategory, "Category deleted successfully");
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
