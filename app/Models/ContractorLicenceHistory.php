<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ContractorLicenceHistory extends Model
{
    use SoftDeletes;

    protected $fillable = [

        'contractor_id',
        'flag',
        'fees_id',
        'start_date',
        'expiry_date',

    ];

    public function subCategories()
    {
       return $this->belongsTo(SubCategory::class , 'fees_id', 'id');
    }



}
