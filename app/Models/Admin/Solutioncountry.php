<?php

namespace App\Models\Admin;

use App\Models\Country;
use Illuminate\Database\Eloquent\Model;

class Solutioncountry extends Model
{
    protected $table = 'solution_country';
    
    protected $casts = [
        'details' => 'array',
        
    ];

    protected $fillable = [
        'solution_id', 'country_id',
    ];

    public function solution()
    {
        return $this->belongsTo(ItemSolution::class);
    }
    public function country()
    {
        return $this->belongsTo(Country::class);
    }
}
