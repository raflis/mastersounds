<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class ItemPost extends Model
{
    protected $table = 'item_posts';
    protected $hidden = ['created_at', 'updated_at'];

    protected $casts = [
        'details' => 'array',
        'meta' => 'array',
    ];

    protected $fillable = [
        'category_post_id', 'name1', 'name2', 'slug', 'image0', 'image',
        'body1', 'body2', 'date', 'order', 'meta',
    ];

    public function category_post()
    {
        return $this->belongsTo(CategoryPost::class);
    }
}
