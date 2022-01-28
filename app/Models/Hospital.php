<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;


class Hospital extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'slug',

        'hospital_type',
        'name',
        'address',
        'owner_name',
        'phone_number',
        'details',
        'longitude',
        'latitude',

        'status',

        'ward_id',
    ];

    public static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $slug = Str::slug($model->name);
            $count = static::whereRaw("slug RLIKE '^{$slug}(-[0-9]+)?$'")->count();
            $model->slug = $count ? "{$slug}-{$count}" : $slug;
        });
        static::updating(function ($model) {
            $slug = Str::slug($model->name);
            $count = static::whereRaw("slug RLIKE '^{$slug}(-[0-9]+)?$'")->count();
            $model->slug = $count ? "{$slug}-{$count}" : $slug;
        });
    }

    public function wards()
    {
        return $this->belongsTo(Ward::class, 'ward_id', 'id');
    }

    public function findBySlug($slug)
    {
        return $this->where('slug', $slug)->first();
    }
}
