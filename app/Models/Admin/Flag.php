<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Flag extends Model
{
    use HasFactory;

    protected $table = 'flags';

    protected $fillable = [
        'name', 'dial_code', 'image', 'placeholder',
    ];
    
}
