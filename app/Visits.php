<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Visits extends Model
{
    protected $table = 'visits';
    protected $fillable = [
        'visit_no', 'end_date','visiting_area','check_in_time','check_out_time','department_id','user_id','visit_purpose_id','visitor_type_id','vehicle_type','vehicle_no','visitor_id','remarks','image','qr_code'];
}
