<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PageField extends Model
{
    use HasFactory;

    protected $table = 'page_fields';

    protected $casts = [
        'details' => 'array',
    ];

    protected $fillable = [
        'logo_header', 'logo_footer', 'title1', 'description1', 
        'title2', 'description2', 'details',
        'title3', 'description3', 'file1',
        'file2','file3', 'file4', 'file5', 'link1',
        'link2', 'link3', 'link4', 'link5',
        'link6', 'link7', 'link8',
    ];
    public static function findOrCreate($id)
{
    $obj = static::find($id);
    return $obj ?: new static;
}
}