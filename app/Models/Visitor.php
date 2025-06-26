<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Visitor extends Model
{
    protected $fillable = [
        'ip',
        'browser',
        'device',
        'platform',
        'page',
        'country_name',
        'country_code',
        'region_name',
        'region_code',
        'city',
        'pin_code',
        'latitude',
        'longitude',
    ];
}
