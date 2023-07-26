<?php

namespace App\Models\Admin;
use App\Models\Locale;

use Illuminate\Database\Eloquent\Model;

class ItemEpisode extends Model
{
    protected $table = 'item_episodes';
    protected $hidden = ['created_at', 'updated_at'];

    protected $casts = [
        'details' => 'array',
    ];

    protected $fillable = [
        'category_episode_id', 'name', 'slug', 'image',
        'body', 'link0', 'link1', 'link2', 'link3', 'link4',
        'autor_name', 'autor_image', 'date', 'order','locale_id'
    ];

    public function category_episode()
    {
        return $this->belongsTo(CategoryEpisode::class);
    }
    public function locale()
    {
        return $this->belongsTo(Locale::class);
    }
}
