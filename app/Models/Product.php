<?php
namespace App\Models;
use App\Http\Middleware\TrimStrings;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model {
    use HasFactory;
    protected $fillable = ['name', 'description', 'price', 'category_id', 'status'];
//    protected $guarded = ['id'];
    protected $table = "products";

    /**
    * // custom primary key
    * protected $primaryKey = "id";
    *
    * // $incrementing
    * public $incrementing = false;
    *
    * // timestamps
    * public $timestamps = false;
     **/

    // default value
    protected $attributes = [
        'status'=>true
    ];

}
