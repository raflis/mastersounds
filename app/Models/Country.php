<?php
namespace App\Models;
use Dyrynda\Database\Support\CascadeSoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Kyslik\ColumnSortable\Sortable;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;
class Country extends Model
{
    use Sortable, HasFactory, SoftDeletes;
    protected $table = "country";
    protected $fillable = ["name", "isocode", "enabled"];
    protected $guarded = ['id'];

    public function region()
    {
        return $this->hasMany(Region::class);
    }
    public function users()
    {
        return $this->hasMany(Users::class);
    }
}
