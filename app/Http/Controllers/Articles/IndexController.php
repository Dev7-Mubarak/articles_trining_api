<?php

namespace App\Http\Controllers\Articles;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    use ApiResponse;

    public function __invoke(Request $request)
    {
        $articles = Article::all();
        return $this->success($articles, 'Articles retrieved successfully');
    }
}
