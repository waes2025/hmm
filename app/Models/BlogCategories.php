<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BlogCategories extends Model
{
    protected $table = 'blog_categories';

    protected $fillable = [
        'name',
        'description',
        'slug',
    ];

    public function blogs()
    {
        return $this->hasMany(Blog::class, 'category_id');
    }
}
