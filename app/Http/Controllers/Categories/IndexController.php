<?php

namespace App\Http\Controllers\Categories;

use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResource;
use App\Models\Category;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    use ApiResponse;

    public function __invoke(Request $request)
    {
        $categories = Category::all();
        return $this->success(CategoryResource::collection($categories), 'Categories retrieved successfully');
    }
}
