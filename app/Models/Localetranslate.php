<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Localetranslate extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = "localetranslate";
    protected $fillable = ["localetag_id", "locale_id", "translation"];
    protected $guarded = ['id'];
    public function localetag()
    {
        return $this->belongsTo(Localetag::class);
    }
    public function locale()
    {
        return $this->belongsTo(Locale::class);
    }
}
