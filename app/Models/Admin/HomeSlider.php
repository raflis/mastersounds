<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class HomeSlider extends Model
{
    protected $table = 'home_sliders';
    protected $hidden = ['created_at', 'updated_at'];

    protected $fillable = [
        'image_desktop', 'image_mobile', 'title1', 'description1',
        'button_name1', 'button_link1', 'title2', 'description2',
        'button_name2', 'button_link2', 'order',
    ];
}
