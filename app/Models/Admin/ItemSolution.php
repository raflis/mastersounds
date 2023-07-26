<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use \App\Models\Country;

class ItemSolution extends Model
{
    protected $table = 'item_solutions';
    protected $hidden = ['created_at', 'updated_at'];

    protected $casts = [
        'details' => 'array',

    ];

    protected $fillable = [
        'category_solution_id', 'name', 'slug', 'slider', 'description1', 'description2',
        'body1', 'details', 'body2', 'pdf1', 'pdf2', 'podcast1', 'podcast2','podcastlink1', 'podcastlink2','minuserforsale',
        'order',
    ];

    public function category_solution()
    {
        return $this->belongsTo(CategorySolution::class);
    }
    public function solution_country(){
        return $this->belongsToMany(Solutioncountry::class);
    }
    public function solution_industry(){
        return $this->belongsToMany(Solutionindustry::class);
    }
    public function countries()
    {
        return $this->belongsToMany(Country::class, 'solution_country', 'solution_id',"country_id");
        //return $this->belongsTo(Hostingplanprice::class, "hostingplanprice_id_old", "id");
    }
    public function industries()
    {
        return $this->belongsToMany(Industry::class, 'solution_industry', 'solution_id',"industry_id");
        //return $this->belongsTo(Hostingplanprice::class, "hostingplanprice_id_old", "id");
    }
}
