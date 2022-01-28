<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class SmsTemplate extends Model
{
    use SoftDeletes;
    protected $fillable=[
        'slug',

        'title',
        'description',
    ];

    public static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $slug = Str::slug($model->title);
            $count = static::whereRaw("slug RLIKE '^{$slug}(-[0-9]+)?$'")->count();
            $model->slug = $count ? "{$slug}-{$count}" : $slug;

//            $last_id = static::orderBy('id', 'desc')->first()->id ?? 0;
//            $model->serial = str_pad((int)10000 + $last_id + 1, STR_PAD_LEFT);
        });
        static::updating(function ($model) {
            $slug = Str::slug($model->title);
            $count = static::whereRaw("slug RLIKE '^{$slug}(-[0-9]+)?$'")->count();
            $model->slug = $count ? "{$slug}-{$count}" : $slug;
        });
    }

    public function findBySlug($slug)
    {
        return $this->where('slug', $slug)->first();
    }


}
