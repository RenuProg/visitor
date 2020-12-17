<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
     protected $table = 'notification_settings';
    protected $fillable = [
        'sms_notification', 'email_notification',


        
    ];
}
