<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class VehicleType extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'slug',

        'type',
        'fees',
        'department_id',


        'status',
    ];
    public static function boot()
    {
        parent::boot();

        static::creating(function($model) {
            $slug = Str::slug($model->type);
            $count = static::whereRaw("slug RLIKE '^{$slug}(-[0-9]+)?$'")->count();
            $model->slug = $count ? "{$slug}-{$count}" : $slug;
        });
        static::updating(function($model) {
            $slug = Str::slug($model->type);
            $count = static::whereRaw("slug RLIKE '^{$slug}(-[0-9]+)?$'")->count();
            $model->slug = $count ? "{$slug}-{$count}" : $slug;
        });

    }

    public function findBySlug($slug)
    {
        return $this->where('slug', $slug)->first();
    }

    public function departments()
    {
        return $this->belongsTo(Department::class, 'department_id', 'id');
    }
}
