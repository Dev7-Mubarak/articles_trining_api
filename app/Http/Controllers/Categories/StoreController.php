<?php

namespace App\Http\Controllers\Tags;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTagRequest;
use App\Http\Resources\TagResource;
use App\Models\Tag;
use App\Traits\ApiResponse;
use Illuminate\Support\Str;

class StoreController extends Controller
{
    use ApiResponse;

    public function __invoke(StoreTagRequest $request)
    {
        $data = $request->validated();

        $data['slug'] = Str::slug($data['name']);

        $count = Tag::where('slug', $data['slug'])->count();
        if ($count > 0) {
            $data['slug'] .= '-' . ($count + 1);
        }

        $tag = Tag::create($data);

        return $this->success(
            new TagResource($tag),
            'Tag created successfully',
            201
        );
    }
}
