<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class cartype extends Model
{
    //
    use SoftDeletes;
    protected $table = 'cartype';
    protected $fillable = ['id','name','status'];
    protected $dates = ['deleted_at'];

}
