<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class District extends Model
{
    protected $fillable = ['name', 'bn_name', 'slug', 'status', 'division_id'];

    protected static function boot() {
        parent::boot();

        static::creating(function ($model) {
            $model->slug = Str::slug($model->name);
        });

        static::updating(function ($model) {
            $model->slug = Str::slug($model->name);
        });
    }

    public function division()
    {
        return $this->belongsTo(Division::class);
    }

    public function thanas() {
        return $this->hasMany(Thana::class)->orderBy('name', 'ASC');
    }
}
