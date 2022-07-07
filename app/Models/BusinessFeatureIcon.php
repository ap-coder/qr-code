<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BusinessFeatureIcon extends Model
{
    use HasFactory;

    public $timestamps = false;
    public $table = 'business_feature_icons';

    protected $fillable = [
        'feature_icon_id',
        'business_page_id',
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
}
