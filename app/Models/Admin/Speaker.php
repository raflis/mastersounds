<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Speaker extends Model
{
    protected $table = 'speakers';

    protected $fillable = [
        'image', 'flag', 'name', 'position1', 'position2',
        'button_name1', 'button_name2', 'button_link1', 'button_link2',
        'order',
    ];
}
