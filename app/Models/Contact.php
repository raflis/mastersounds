<?php

namespace App\Models;

use App\Models\Admin\ItemSolution;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Contact extends Model
{
    protected $table = 'contacts';

    protected $fillable = [
        'message', 'name', 'lastname', 'email', 'country_id',
    ];

    public function item_solution()
    {
        return $this->belongsTo(ItemSolution::class);
    }

    public function scopeName($query, $name)
    {
        if($name):
            return $query->Where('name', 'LIKE', "%$name%");
        endif;
    }

    public function scopeLastname($query, $name)
    {
        if($name):
            return $query->Where('lastname', 'LIKE', "%$name%");
        endif;
    }

    public function scopeStartdate($query, $name)
    {
        if($name):
            return $query->WhereDate('created_at', '>=', "$name");
        endif;
    }

    public function scopeEnddate($query, $name)
    {
        if($name):
            return $query->WhereDate('created_at', '<=', "$name");
        endif;
    }
}
