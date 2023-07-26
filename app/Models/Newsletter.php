<?php

namespace App\Models;

use App\Models\Admin\ItemSolution;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Newsletter extends Model
{
    protected $table = 'newsletter';

    protected $fillable = [
         'email'
    ];

}
