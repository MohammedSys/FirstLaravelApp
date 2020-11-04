<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    protected $table = "offers"; //Use this when you want to a diffrent table name from the model
    protected $fallable = ['name_ar','name_en','details_ar','details_en','price','created_at','updated_at'];
    protected $hidden = ['created_at','updated_at'];
    /**
     * The alternative to protected $fillable = ['title'];
     * would be :protected $guarded = [];
     * and leave it as an empty array, without the need to define anything inside.
     * It is the exact opposite of $fillable, sort of like telling the database to accept everything,
     * except the fields you specify inside the $guarded array.
    */
    protected $guarded = [];
    //public $timestamps = false;

}
