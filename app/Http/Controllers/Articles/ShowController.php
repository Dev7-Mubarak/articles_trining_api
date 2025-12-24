<?php

namespace App\Http\Controllers\Articles;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;

class ShowController extends Controller
{
    use ApiResponse;

    public function __invoke(Request $request, $id)
    {
        $article = Article::find($id);

        if (!$article) {
            return $this->error('Article not found', null, 404);
        }

        return $this->success($article, 'Article retrieved successfully');
    }
}
