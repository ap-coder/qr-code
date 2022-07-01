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

class BusinessPage extends Model implements HasMedia
{
    use SoftDeletes;
    use MultiTenantModelTrait;
    use InteractsWithMedia;
    use HasFactory;
    use Sluggable;

    public $table = 'business_pages';

    protected $appends = [
        'header_image',
        'loading_image',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'active',
        'qr_name',
        'company',
        'headline',
        'summary',
        'button_text',
        'button_lnk',
        'about',
        'contact_name',
        'phone',
        'email',
        'website_link',
        'slug',
        'summery',
        'primary_color',
        'button_color',
        'address_id',
        'created_at',
        'updated_at',
        'deleted_at',
        'created_by_id',
    ];
    

    public const FEATURE_ICONS = [
        1   => 'fa fa-wifi',
        2  => 'fas fa-chair',
        3   => 'fa fa-wheelchair',
        4 => 'fa fa-toilet',
        5   => 'fa fa-child',
        6   => 'fa fa-paw',
        7   => 'fas fa-parking',
        8   => 'fa fa-train',
        9   => 'fa fa-taxi',
        10   => 'fa fa-bed',
        11   => 'fa fa-coffee',
        12   => 'fa fa-wine-glass-alt',
        13   => 'fa fa-utensils',
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

    public function businessPagesQrCodes()
    {
        return $this->belongsToMany(QrCode::class);
    }

    public function getHeaderImageAttribute()
    {
        $file = $this->getMedia('header_image')->last();
        if ($file) {
            $file->url       = $file->getUrl();
            $file->thumbnail = $file->getUrl('thumb');
            $file->preview   = $file->getUrl('preview');
        }

        return $file;
    }

    public function getLoadingImageAttribute()
    {
        $file = $this->getMedia('loading_image')->last();
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

    public function created_by()
    {
        return $this->belongsTo(User::class, 'created_by_id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function socials()
    {
        return $this->belongsToMany(Social::class);
    }
}
