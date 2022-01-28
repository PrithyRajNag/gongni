<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TradeLicenceHistory extends Model
{
    use SoftDeletes;

    protected $fillable=[

        'trade_id',

        'licence_type',
        'licence_number',
        'issue_date',
        'expiry_date',
        'flag',
        'fees_id'
    ];

    public function tradeLicencesHistory() {
        return $this->belongsTo(TradeLicence::class,'trade_id','id');
    }
    public  function subCategories()
    {
        return $this->belongsTo(SubCategory::class,'fees_id','id');
    }

//    public function sumOfFees(){
//        $result = 0;
//        $totals = $this->businessCategories()->get();
//        foreach ($totals as $total)
//        {
//            $result+=$total->fees;
//        }
//        return $result;
//    }
}
