<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class VehicleLicence extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'slug',

        'name',
        'father_name',
        'mother_name',
        'owner_name',
        'address',
        'gender',
        'phone_number',
        'nid',
        'licence_number',
        'subCategory_id',
        'expiry_date',


        'status',


    ];
    public static function boot()
    {
        parent::boot();

        static::creating(function($model) {
            $slug = Str::slug($model->name);
            $count = static::whereRaw("slug RLIKE '^{$slug}(-[0-9]+)?$'")->count();
            $model->slug = $count ? "{$slug}-{$count}" : $slug;
        });
        static::updating(function($model) {
            $slug = Str::slug($model->name);
            $count = static::whereRaw("slug RLIKE '^{$slug}(-[0-9]+)?$'")->count();
            $model->slug = $count ? "{$slug}-{$count}" : $slug;
        });
    }
    public function findBySlug($slug)
    {
        return $this->where('slug', $slug)->first();
    }
    public function subCategories()
    {
        return $this->belongsTo(SubCategory::class,'subCategory_id','id');
    }



}
