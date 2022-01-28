<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class ReliefCard extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'slug',
        'category_id',
        'people_id',
        'card_number',

        'status',

        'ward_id',

    ];
    public static function boot()
    {
        parent::boot();

        static::creating(function($model) {
            $slug = Str::slug($model->card_number);
            $count = static::whereRaw("slug RLIKE '^{$slug}(-[0-9]+)?$'")->count();
            $model->slug = $count ? "{$slug}-{$count}" : $slug;
        });
        static::updating(function($model) {
            $slug = Str::slug($model->card_number);
            $count = static::whereRaw("slug RLIKE '^{$slug}(-[0-9]+)?$'")->count();
            $model->slug = $count ? "{$slug}-{$count}" : $slug;
        });

    }

    public function wards() {
        return $this->belongsTo(Ward::class,'ward_id','id');
    }
    public function reliefCategories() {
        return $this->belongsTo(ReliefCategory::class,'category_id','id');
    }
    public function peoples() {
        return $this->belongsTo(People::class,'people_id','id');
    }
    public function getFullNameAttribute()
    {
        return "{$this->first_name} {$this->last_name}";
    }
    public function findBySlug($slug)
    {
        return $this->where('slug', $slug)->first();
    }
//    public function hasReliefCategory($Categories) {
//        return $project->users->contains($user);
//    }
}
