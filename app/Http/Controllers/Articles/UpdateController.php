<?php

namespace App\Http\Controllers\Articles;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateArticleRequest;
use App\Http\Resources\ArticleResource;
use App\Models\Article;
use App\Traits\ApiResponse;

use Illuminate\Support\Facades\Storage;

class UpdateController extends Controller
{
    use ApiResponse;

    public function __invoke(UpdateArticleRequest $request, $id)
    {
        $article = Article::find($id);

        if (!$article) {
            return $this->error('Article not found', null, 404);
        }

        $data = $request->validated();

        if ($request->hasFile('image')) {
            // Delete old image
            if ($article->image) {
                Storage::disk('public')->delete($article->image);
            }
            $data['image'] = $request->file('image')->store('articles', 'public');
        }

        $article->update($data);

        return $this->success(new ArticleResource($article), 'Article updated successfully');
    }
}
