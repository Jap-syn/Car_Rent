<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class brand extends Model
{
    //
    use SoftDeletes;
    protected $dates = ['deleted_at']; 
    
    protected $table = 'brand';
    protected $fillable = ['id','name','status'];
}
