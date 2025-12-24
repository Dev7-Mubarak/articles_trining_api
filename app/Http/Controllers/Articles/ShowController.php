<?php

namespace App\Http\Controllers\Articles;

use App\Http\Controllers\Controller;
use App\Http\Resources\ArticleResource;
use App\Models\Article;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;

class ShowController extends Controller
{
    use ApiResponse;

    public function __invoke(Request $request, $id)
    {
        $article = Article::with('category')->find($id);

        if (!$article) {
            return $this->error('Article not found', null, 404);
        }

        return $this->success(new ArticleResource($article), 'Article retrieved successfully');
    }
}
