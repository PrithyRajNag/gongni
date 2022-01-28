<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class DailyEarning extends Model
{
    use  SoftDeletes;
    protected $fillable = [


//        'amount',
//        'form_number',
//        'date',
//        'category',
//        'sub_category',


    ];

    public static function boot()
    {
        parent::boot();

        static::creating(function($model) {
            $last_id = static::orderBy('id', 'desc')->first()->id ?? 0;
            $model->form_number = str_pad( (int) 10000 + $last_id + 1 ,STR_PAD_LEFT);
        });
//        static::updating(function($model) {
//            $slug = Str::slug($model->name);
//            $count = static::whereRaw("slug RLIKE '^{$slug}(-[0-9]+)?$'")->count();
//            $model->slug = $count ? "{$slug}-{$count}" : $slug;
//        });

    }

//    public function categories()
//    {
//        return $this->hasMany(Category::class);
//    }

}
