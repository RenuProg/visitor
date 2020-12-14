<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Visitor extends Model
{
    protected $table = 'visitors';
    protected $fillable = [
        'visitor_no', 'First_name','last_name','phone','email','register_date','address','status'
    ];
}
