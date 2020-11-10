<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    protected $table = "videos"; //Use this when you want to a diffrent table name from the model
    protected $fallable = ['name','viewers'];
    protected $hidden = false;
}
