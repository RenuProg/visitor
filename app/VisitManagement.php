<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VisitManagement extends Model
{
    protected $table = 'visit_management';
    protected $fillable = [
        'name', 'visit_date','check_in_time','check_out_time','department_id','visit_purpose_id','visitor_type_id','vehicle_type','vehicle_no','phone','email','gender','address','visit_no',


        
    ];
}
