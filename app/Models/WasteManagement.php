<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class WasteManagement extends Model
{
    use SoftDeletes;

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

    protected $fillable = [
        'slug',

        'name',
        'phone_number',
        'contractual_period',
        'join_date',
        'salary',
        'job_type',
        'file',
        'ward_id',

        'status'

    ];

    public function findBySlug($slug)
    {
        return $this->where('slug', $slug)->first();
    }

    public function wards() {
        return $this->belongsTo(Ward::class,'ward_id','id');
    }
}
