<?php

namespace App\Http\Controllers\Articles;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;

class DestroyController extends Controller
{
    use ApiResponse;

    public function __invoke(Request $request, $id)
    {
        $article = Article::find($id);

        if (!$article) {
            return $this->error('Article not found', null, 404);
        }

        if ($article->image) {
            Storage::disk('public')->delete($article->image);
        }

        $article->delete();

        return $this->success(null, 'Article deleted successfully');
    }
}
