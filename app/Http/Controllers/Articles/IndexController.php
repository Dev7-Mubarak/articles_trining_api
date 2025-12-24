<?php

namespace App\Http\Controllers\Articles;

use App\Http\Controllers\Controller;
use App\Http\Resources\ArticleResource;
use App\Models\Article;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    use ApiResponse;

    public function __invoke(Request $request)
    {
        $articles = Article::with('category')->paginate(10);
        return $this->paginatedSuccess(ArticleResource::collection($articles), 'Articles retrieved successfully');
    }
}
    