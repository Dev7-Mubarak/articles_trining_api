<?php

namespace App\Http\Controllers\Tags;

use App\Http\Controllers\Controller;
use App\Http\Resources\TagResource;
use App\Models\Tag;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    use ApiResponse;

    public function __invoke(Request $request)
    {
        $tags = Tag::all();

        return $this->success(
            TagResource::collection($tags),
            'Tags retrieved successfully'
        );
    }
}
