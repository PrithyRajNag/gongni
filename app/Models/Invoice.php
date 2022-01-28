<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Invoice extends Model
{
    protected $fillable = [
        'slug',

        'name',
        'type',
        'phone_number',
        'date',
        'amount',
        'invoice_number',
        'date',
        'category_id',
        'sub_category_id',
    ];

    public static function boot()
    {
        parent::boot();

        static::creating(function($model) {
            $slug = Str::slug($model->name);
            $count = static::whereRaw("slug RLIKE '^{$slug}(-[0-9]+)?$'")->count();
            $model->slug = $count ? "{$slug}-{$count}" : $slug;

            $last_id = static::orderBy('id', 'desc')->first()->id ?? 0;
            $model->invoice_number = str_pad( (int) 10000 + $last_id + 1 ,STR_PAD_LEFT);
        });
        static::updating(function($model) {
            $slug = Str::slug($model->name);
            $count = static::whereRaw("slug RLIKE '^{$slug}(-[0-9]+)?$'")->count();
            $model->slug = $count ? "{$slug}-{$count}" : $slug;
        });

    }

    public function subCategories()
    {
        return $this->belongsTo(SubCategory::class, 'sub_category_id', 'id');
    }
    public function categories()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }



}
