<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = ['title', 'body', 'category_id', 'image'];

    /**
     * Get the category that this article belongs to
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}