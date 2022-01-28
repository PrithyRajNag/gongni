<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TenderDocument extends Model
{
    protected $fillable = [
        'file_name',
        'tender_id',
    ];
}
