<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class TradeLicence extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'slug',
        'serial',

        'business_name',
        'business_name_bn',
        'business_details',
        'shop_holding_no',
        'shop_holding_no_bn',
        'address',
        'address_bn',
        'road',
        'road_bn',
        'area',
        'area_bn',
        'market_name',
        'floor_no',
        'shop_no',
        'business_start_date',
        'business_nature',
        'authorised_capital',
        'paidUp_capital',
        'is_factory',
        'is_chemical_available',
        'plot_type',
        'plot_category',
        'place',
        'activity',
        'licence_number',
        'issue_date',
        'expiry_date',

        'name',
        'name_bn',
        'father_name',
        'father_name_bn',
        'mother_name',
        'mother_name_bn',
        'gender',
        'marital_status',
        'spouse_name',
        'spouse_name_bn',
        'dob',
        'phone_number',
        'email',
        'bin',
        'nid',
        'passport_no',
        'birth_reg',
        'photo',

        'present_address',
        'present_address_bn',
        'present_holding_no',
        'present_holding_no_bn',
        'present_address_area',
        'present_address_area_bn',
        'present_post_code',
        'present_post_code_bn',
        'present_division_id',
        'present_district_id',
        'present_thana_id',

        'permanent_address',
        'permanent_address_bn',
        'permanent_holding_no',
        'permanent_holding_no_bn',
        'permanent_address_area',
        'permanent_address_area_bn',
        'permanent_post_code',
        'permanent_post_code_bn',
        'permanent_division_id',
        'permanent_district_id',
        'permanent_thana_id',

        'sub_category_id',
        'ward_id',

        'status',

    ];

    public static function boot()
    {
        parent::boot();

        static::creating(function($model) {
            $slug = Str::slug($model->name);
            $count = static::whereRaw("slug RLIKE '^{$slug}(-[0-9]+)?$'")->count();
            $model->slug = $count ? "{$slug}-{$count}" : $slug;

            $last_id = static::orderBy('id', 'desc')->first()->id ?? 0;
            $model->serial = str_pad( (int) 10000 + $last_id + 1 ,STR_PAD_LEFT);
        });
//        static::updating(function($model) {
//            $slug = Str::slug($model->name);
//            $count = static::whereRaw("slug RLIKE '^{$slug}(-[0-9]+)?$'")->count();
//            $model->slug = $count ? "{$slug}-{$count}" : $slug;
//        });

    }

    public function findBySlug($slug)
    {
        return $this->where('slug', $slug)->first();
    }

    public function wards() {
        return $this->belongsTo(Ward::class,'ward_id','id');
    }

    public  function subCategories()
    {
        return $this->belongsTo(SubCategory::class,'sub_category_id','id');
    }

    public function presentDivisions() {
        return $this->belongsTo(Division::class,'present_division_id','id');
    }
    public function permanentDivisions() {
        return $this->belongsTo(Division::class,'permanent_division_id','id');
    }
    public function presentDistricts() {
        return $this->belongsTo(District::class,'present_district_id','id');
    }
    public function permanentDistricts() {
        return $this->belongsTo(District::class,'permanent_district_id','id');
    }
    public function presentThanas() {
        return $this->belongsTo(Thana::class,'present_thana_id','id');
    }
    public function permanentThanas() {
        return $this->belongsTo(Thana::class,'permanent_thana_id','id');
    }

    public function tradeLicenceHistory()
    {
        return $this->hasMany(TradeLicenceHistory::class , 'trade_id', 'id');
    }

    public function getTotalFees()
    {
        return $this->businessCategories->sum('fees');
    }






}
