<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class People extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'slug',

        'first_name',
        'first_name_bn',
        'last_name',
        'last_name_bn',
        'father_name',
        'father_name_bn',
        'mother_name',
        'mother_name_bn',
        'gender',
        'phone_number',
        'dob',
        'occupation',
        'marital_status',
        'spouse_name',
        'spouse_name_bn',
        'present_address',
        'permanent_address',
        'nid',
        'birth_reg',
        'cover',

        'is_alive',
        'status',

        'ward_id',
        'blood_group_id',
    ];
    public static function boot()
    {
        parent::boot();

        static::creating(function($model) {
            $slug = Str::slug($model->first_name .'-'.$model->last_name);
            $count = static::whereRaw("slug RLIKE '^{$slug}(-[0-9]+)?$'")->count();
            $model->slug = $count ? "{$slug}-{$count}" : $slug;
        });
        static::updating(function($model) {
            $slug = Str::slug($model->first_name .'-'.$model->last_name);
            $count = static::whereRaw("slug RLIKE '^{$slug}(-[0-9]+)?$'")->count();
            $model->slug = $count ? "{$slug}-{$count}" : $slug;
        });

    }

    public function wards() {
        return $this->belongsTo(Ward::class,'ward_id','id');
    }

    public function bloodGroups()
    {
        return $this->belongsTo(BloodGroup::class, 'blood_group_id', 'id');
    }

    public function getFullNameAttribute()
    {
        return "{$this->first_name} {$this->last_name}";
    }

    public function findBySlug($slug)
    {
        return $this->where('slug', $slug)->first();
    }
}
