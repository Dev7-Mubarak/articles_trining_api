<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;

class ArticleController extends Controller
{
    public function __invoke(){
        
    }
    function createArticle(Request $request) {
        $article = Article::create([
            'title' => "Sample Article",
            'body' => "This is the body of the sample article.",
        ]);
        return $article;
    }

    function updateArticle(Request $request, $id) {
        $article = Article::find($id);

        if (!$article) {
            return response()->json(['message' => 'Article not found'], 404);
        }

        $article->title = $request->input('title');
        $article->body = $request->input('body');
        $article->save();

        return $article;
    }

    function getAllArticles(Request $request) {
        $articles = Article::all();
        return $articles;
    }

    function getArticle($id) {
        $article = Article::find($id);
        return $article;
    }

    function deleteArticle(Request $request, $id) {
        $article = Article::find($id);
        if ($article) {
            $article->delete();
            return response()->json([
                'message' => 'Article deleted successfully'
            ]);
        } else {
            return response()->json([
                'message' => 'Article not found'
            ], status: 404);
        }
    }
}
