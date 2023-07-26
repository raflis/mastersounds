<?php
namespace App\Models;
use Dyrynda\Database\Support\CascadeSoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Kyslik\ColumnSortable\Sortable;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;
class Industry extends Model
{
    use Sortable, HasFactory, SoftDeletes;
    protected $table = "industry";
    protected $fillable = ["name"];
    protected $guarded = ['id'];

   
}
