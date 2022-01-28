<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContractorLicenceDocument extends Model
{
    protected $fillable = [
        'file_name',
        'contractor_id',
    ];
    public  function contractorDocuments()
    {
        return $this->belongsTo(ContractorLicence::class ,'contractor_id' , 'id');
    }
}
