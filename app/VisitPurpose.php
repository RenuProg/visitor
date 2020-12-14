<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VisitPurpose extends Model
{
    protected $table = 'visit_purpose';
    protected $fillable = [
        'name', 'status',
    ];
}
