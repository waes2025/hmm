<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $table = 'blogs';

    protected $fillable = [
        'title',
        'category_id',
        'created_by',
        'content',
        'status',
        'published_at'
    ];

    public function category()
    {
        return $this->belongsTo(BlogCategories::class, 'category_id');
    }

    public function users()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function blog_categories()
    {
        return $this->belongsTo(BlogCategories::class, 'category_id');
    }
}
