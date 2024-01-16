<?php

namespace App\Models\Admin;

use Session;
use Illuminate\Database\Eloquent\Model;

class CategoryEpisode extends Model
{
    protected $table = 'category_episodes';
    protected $hidden = ['created_at', 'updated_at'];

    protected $casts = [
        'meta' => 'array',
    ];

    protected $fillable = [
        'name1','name2', 'order', 'meta',
    ];

    public function item_episodes()
    {
        
        return $this->hasMany(ItemEpisode::class)->where("locale_id", Session::get('locale'))->orderBy('id', 'Desc');
    }
}
