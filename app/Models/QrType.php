<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class QrType extends Model implements HasMedia
{
    use SoftDeletes;
    use InteractsWithMedia;
    use HasFactory;

    public const SELECT_TYPE_SELECT = [
        '1'  => 'Website',
        '2'  => 'Social Media',
        '3'  => 'Business Page',
        '4'  => 'vCard Pro',
        '5'  => 'Rating',
        '6'  => 'Event',
        '7'  => 'FaceBook',
        '8'  => 'Images',
        '9'  => 'Video',
        '10' => 'App',
        '11' => 'PDF',
        '12' => 'Feedback',
    ];

    public $table = 'qr_types';

    protected $appends = [
        'mock_image',
        'hover_over_image',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'published',
        'title',
        'subtitle',
        'select_type',
        'icon_class',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function scopePublished($query)
	{
		return $query->where('published', 1);
	}
    
    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')->fit('crop', 50, 50);
        $this->addMediaConversion('preview')->fit('crop', 120, 120);
    }

    public function typesQrCodes()
    {
        return $this->belongsToMany(QrCode::class);
    }

    public function getMockImageAttribute()
    {
        $file = $this->getMedia('mock_image')->last();
        if ($file) {
            $file->url       = $file->getUrl();
            $file->thumbnail = $file->getUrl('thumb');
            $file->preview   = $file->getUrl('preview');
        }

        return $file;
    }

    public function getHoverOverImageAttribute()
    {
        $file = $this->getMedia('hover_over_image')->last();
        if ($file) {
            $file->url       = $file->getUrl();
            $file->thumbnail = $file->getUrl('thumb');
            $file->preview   = $file->getUrl('preview');
        }

        return $file;
    }

    public function industries()
    {
        return $this->belongsToMany(QrIndustry::class);
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
