<?php

namespace App\Models;

use \DateTimeInterface;
use App\Traits\MultiTenantModelTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Cviebrock\EloquentSluggable\Sluggable;

class Website extends Model
{
    use SoftDeletes;
    use MultiTenantModelTrait;
    use HasFactory;
    use Sluggable;

    public $table = 'websites';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'active',
        'qr_name',
        'website_name',
        'url',
        'created_at',
        'slug',
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

    public function websitesQrCodes()
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
