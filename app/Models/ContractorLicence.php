<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class ContractorLicence extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'slug',

        'enlistment_no',
        'application_type',
        'applicant_name',
        'applicant_constitution',
        'constitution_date',

        'vat_reg_no',
        'tin_no',
        'managing_director_name',
        'age',
        'education_qualification',
        'father_name',
        'mother_name',
        'gender',
        'personal_phone_number',
        'personal_email',
        'nid',

        'business_address_street',
        'business_address_post_office',
        'business_address_post_code',
        'business_phone',
        'business_email',

        'bank_name',
        'branch',
        'account_no',

        'technical_employee',
        'support_staff',
        'other_staff',

        'equipment_name',
        'number',
        'year',
        'condition',

        'financial_source',
        'amount',
        'debarred',
        'debarred_reason',
        'file',
        'start_date',
        'expiry_date',

        'business_address_district_id',
        'subcategory_id',

//        'fees',

        'status',

    ];

    public static function boot()
    {
        parent::boot();

        static::creating(function($model) {
            $slug = Str::slug($model->applicant_name);
            $count = static::whereRaw("slug RLIKE '^{$slug}(-[0-9]+)?$'")->count();
            $model->slug = $count ? "{$slug}-{$count}" : $slug;
        });
//        static::updating(function($model) {
//            $slug = Str::slug($model->contractor_name);
//            $count = static::whereRaw("slug RLIKE '^{$slug}(-[0-9]+)?$'")->count();
//            $model->slug = $count ? "{$slug}-{$count}" : $slug;
//        });

    }

    public function findBySlug($slug)
    {
        return $this->where('slug', $slug)->first();
    }
    public  function subCategories()
    {
        return $this->belongsTo(SubCategory::class,'subCategory_id','id');
    }
    public  function districts()
    {
        return $this->belongsTo(District::class,'business_address_district_id','id');
    }

    public function contractorLicenceHistory()
    {
        return $this->hasMany(ContractorLicenceHistory::class , 'contractor_id', 'id');
    }
    public function contractorDocuments()
    {
        return $this->hasMany(ContractorLicenceDocument::class, 'contractor_id', 'id');
    }
}
