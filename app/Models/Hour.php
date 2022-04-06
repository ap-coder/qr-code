<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Hour extends Model
{
    use SoftDeletes;
    use HasFactory;

    public const TIME_OF_DAY_SELECT = [
        'am' => 'AM',
        'pm' => 'PM',
    ];

    public const DAY_SELECT = [
        'mon'   => 'Monday',
        'tues'  => 'Tuesday',
        'wed'   => 'Wednesday',
        'thrus' => 'Thursday',
        'fri'   => 'Friday',
        'sat'   => 'Saturday',
        'sun'   => 'Sunday',
    ];

    public $table = 'hours';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'day',
        'open_time',
        'closing_time',
        'time_of_day',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
