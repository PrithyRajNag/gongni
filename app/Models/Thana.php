<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Thana extends Model
{
    protected $fillable = ['name', 'bn_name', 'slug', 'status', 'district_id'];

    protected static function boot() {
        parent::boot();

        static::creating(function ($model) {
            $model->slug = Str::slug($model->name);
        });

        static::updating(function ($model) {
            $model->slug = Str::slug($model->name);
        });
    }

    public function district()
    {
        return $this->belongsTo(District::class, 'district_id', 'id');
    }
}
