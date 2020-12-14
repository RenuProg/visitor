<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VisitorType extends Model
{
    protected $table = 'visitor_type';
    protected $fillable = [
        'name', 'status',
    ];
}
