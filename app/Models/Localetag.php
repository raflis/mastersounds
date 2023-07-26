<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Localetag extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = "localetag";
    protected $fillable = ["module", "action", "tag"];
    protected $guarded = ['id'];

    public function localetranslate()
    {
        return $this->hasMany(Localetranslate::class);
    }
}
