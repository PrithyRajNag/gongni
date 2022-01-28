<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Tender extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'slug',

        'ministry_id',

        'entity_name',
        'entity_code',
        'invitation_for',
        'submission_date',
        'method',
        'budget',
        'development_partner',
        'package_name',
        'package_no',
        'programme_name',
        'programme_code',
        'publish_date',
        'last_selling_date',
        'closing_date',
        'opening_date',
        'principle_selling_document',
        'receiving_document',
        'opening_document',
        'other_selling_document',
        'meeting_place',
        'meeting_date',
        'eligibility',
        'description_goods',
        'description_related_service',
        'document_price',
        'lot_no',
        'identification',
        'location',
        'security_amount',
        'completion',
        'official_inviting_name',
        'official_inviting_designation',
        'official_inviting_address',
        'official_inviting_contact_phone',
        'official_inviting_contact_fax',
        'official_inviting_contact_email',
        'file',

        'status',
    ];

    public static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $slug = Str::slug($model->entity_name);
            $count = static::whereRaw("slug RLIKE '^{$slug}(-[0-9]+)?$'")->count();
            $model->slug = $count ? "{$slug}-{$count}" : $slug;

//            $last_id = static::orderBy('id', 'desc')->first()->id ?? 0;
//            $model->serial = str_pad((int)10000 + $last_id + 1, STR_PAD_LEFT);
        });
        static::updating(function ($model) {
            $slug = Str::slug($model->entity_name);
            $count = static::whereRaw("slug RLIKE '^{$slug}(-[0-9]+)?$'")->count();
            $model->slug = $count ? "{$slug}-{$count}" : $slug;
        });
    }

    public function findBySlug($slug)
    {
        return $this->where('slug', $slug)->first();
    }

    public function ministries()
    {
        return $this->belongsTo(Ministry::class,'ministry_id','id');
    }

    public function tenderDocuments()
    {
        return $this->hasMany(TenderDocument::class, 'tender_id', 'id');
    }
}
