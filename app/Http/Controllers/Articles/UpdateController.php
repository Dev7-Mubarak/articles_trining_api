<?php

namespace App\Http\Controllers\Articles;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateArticleRequest;
use App\Models\Article;
use App\Traits\ApiResponse;

class UpdateController extends Controller
{
    use ApiResponse;

    public function __invoke(UpdateArticleRequest $request, $id)
    {
        $article = Article::find($id);

        if (!$article) {
            return $this->error('Article not found', null, 404);
        }

        $article->update($request->validated());

        return $this->success($article, 'Article updated successfully');
    }
}
