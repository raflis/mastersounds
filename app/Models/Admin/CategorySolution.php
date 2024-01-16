<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class CategorySolution extends Model
{
    protected $table = 'category_solutions';
    protected $hidden = ['created_at', 'updated_at'];

    protected $casts = [
        'meta' => 'array',
    ];

    protected $fillable = [
        'name1', 'name2', 'icon', 'description1', 'description2', 'order', 'meta',
    ];

    public function item_solutions()
    {
        return $this->hasMany(ItemSolution::class)->orderBy('order', 'Asc');
    }
}
