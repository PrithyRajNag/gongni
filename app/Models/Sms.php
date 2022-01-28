<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sms extends Model
{
    protected $fillable = [

        'receiver',
        'message',

        'template_id',
    ];

    public function smsTemplates()
    {
        return $this->hasMany(SmsTemplate::class, 'template_id', 'id');
    }
}
