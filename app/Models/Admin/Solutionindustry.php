<?php

namespace App\Models\Admin;

use App\Models\Country;
use Illuminate\Database\Eloquent\Model;

class Solutionindustry extends Model
{
    protected $table = 'solution_industry';
    
    protected $casts = [
        'details' => 'array',
        
    ];

    protected $fillable = [
        'solution_id', 'industry_id',
    ];

    public function solution()
    {
        return $this->belongsTo(ItemSolution::class);
    }
    public function industry()
    {
        return $this->belongsTo(Industry::class);
    }
}
