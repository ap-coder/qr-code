<?php

namespace App\Models;

use \DateTimeInterface;
use App\Traits\MultiTenantModelTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Cviebrock\EloquentSluggable\Sluggable;

class Vcard extends Model implements HasMedia
{
    use SoftDeletes;
    use MultiTenantModelTrait;
    use InteractsWithMedia;
    use HasFactory;
    use Sluggable;

    public $table = 'vcards';

    protected $appends = [
        'photo',
        'loading_photo',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'active',
        'qr_name',
        'first_name',
        'last_name',
        'title',
        'summary',
        'company',
        'headline',
        'button_text',
        'button_lnk',
        'about',
        'email',
        'website_link',
        'home_phone',
        'mobile_number',
        'fax_number',
        'primary_color',
        'button_color',
        'gradient_color',
        'is_show_gradient',
        'designation',
        'is_direction_show',
        'is_sharing',
        'created_at',
        'slug',
        'address_id',
        'updated_at',
        'deleted_at',
        'created_by_id',
    ];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'qr_name'
            ]
        ];
    }

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')->fit('crop', 50, 50);
        $this->addMediaConversion('preview')->fit('crop', 120, 120);
    }

    public function vcardsQrCodes()
    {
        return $this->belongsToMany(QrCode::class);
    }

    public function getPhotoAttribute()
    {
        $file = $this->getMedia('photo')->last();
        if ($file) {
            $file->url       = $file->getUrl();
            $file->thumbnail = $file->getUrl('thumb');
            $file->preview   = $file->getUrl('preview');
        }

        return $file;
    }

    public function getLoadingPhotoAttribute()
    {
        $file = $this->getMedia('loading_photo')->last();
        if ($file) {
            $file->url       = $file->getUrl();
            $file->thumbnail = $file->getUrl('thumb');
            $file->preview   = $file->getUrl('preview');
        }

        return $file;
    }

    public function hours()
    {
        return $this->belongsToMany(Hour::class);
    }

    public function address()
    {
        return $this->belongsTo(Address::class, 'address_id');
    }

    public function socials()
    {
        return $this->belongsToMany(Social::class,'social_vcards');
    }

    public function qrcode()
    {
        return $this->belongsToMany(QrCode::class);
    }

    public function created_by()
    {
        return $this->belongsTo(User::class, 'created_by_id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
