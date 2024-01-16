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
        'meta_title' => 'array',
        'meta_keyword' => 'array',
        'meta_description' => 'array',
    ];

    protected $fillable = [
        'logo_header', 'logo_header_mobile', 'logo_footer', 'title1', 'description1', 
        'title2', 'description2', 'details',
        'title3', 'description3', 'file1',
        'file2','file3', 'file4', 'file5', 'link1',
        'link2', 'link3', 'link4', 'link5',
        'link6', 'link7', 'link8',
        'wizard_banner', 'wizard_text1', 'wizard_text2',
        'tooltip1', 'tooltip2',
        'wizard_result_text1', 'wizard_result_text2', 'wizard_result_link1', 'wizard_result_link2',
        'wizard_result_button1', 'wizard_result_button2',
        'meta_title', 'meta_keyword', 'meta_description', 'meta_image',
    ];

    public static function findOrCreate($id)
    {
        $obj = static::find($id);
        return $obj ?: new static;
    }
}
