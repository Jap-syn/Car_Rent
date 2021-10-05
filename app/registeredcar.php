<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class registeredcar extends Model
{
    //
    protected $table = 'registered_car';
    protected $fillable = ['id','user_id','car_id','price','start_date','end_date','status'
                          ];
   
}
