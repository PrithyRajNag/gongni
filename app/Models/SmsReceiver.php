<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SmsReceiver extends Model
{
    protected $fillable =[

        'phone_number',
        'sms_id',

    ];
    public function sms()
    {
        return $this->belongsTo(Sms::class,'sms_id','id');
    }
}
