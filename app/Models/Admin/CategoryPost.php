<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class CategoryPost extends Model
{
    protected $table = 'category_posts';
    protected $hidden = ['created_at', 'updated_at'];

    protected $fillable = [
        'name1','name2', 'order',
    ];

    public function item_posts()
    {
        return $this->hasMany(ItemPost::class);
    }
}
