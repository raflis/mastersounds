<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    use HasFactory;

    protected $table = 'sliders';

    protected $fillable = [
        'title1', 'title2', 'image_desktop', 'image_mobile',   'button_name1', 'button_link1','button_name2', 'button_link2',  'order',
    ];
    
}
