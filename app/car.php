<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class car extends Model
{
    //
    use SoftDeletes;
    protected $dates = ['deleted_at']; 
    protected $table = 'car';
    protected $fillable = ['id','name','brand_id','type','color','wheels','doors',
                           'mile_list','model','price','description','image','start_date',
                           'end_date','start_time','end_time','status'];

}
