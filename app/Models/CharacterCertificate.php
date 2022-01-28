<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class CharacterCertificate extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'slug',
        'serial',
        'issue_date',

        'people_id',
//        'ward_id',

        'status',
    ];

    public static function boot()
    {
        parent::boot();

        static::creating(function($model) {
            $slug = Str::slug($model->serial);
            $count = static::whereRaw("slug RLIKE '^{$slug}(-[0-9]+)?$'")->count();
            $model->slug = $count ? "{$slug}-{$count}" : $slug;
        });
        static::updating(function($model) {
            $slug = Str::slug($model->serial);
            $count = static::whereRaw("slug RLIKE '^{$slug}(-[0-9]+)?$'")->count();
            $model->slug = $count ? "{$slug}-{$count}" : $slug;
        });

    }

    public function findBySlug($slug)
    {
        return $this->where('slug', $slug)->first();
    }
    public function peoples() {
        return $this->belongsTo(People::class,'people_id','id');
    }
//    public function wards() {
//        return $this->belongsTo(Ward::class,'ward_id','id');
//    }
    public function getFullNameAttribute()
    {
        return "{$this->first_name} {$this->last_name}";
    }
}
