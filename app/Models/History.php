<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use function PHPSTORM_META\map;

class History extends Model
{
    protected $table = 'history';
    protected $fillable = [
        'user_id',
        'ip',
        'city',
        'region',
        'country',
        'loc',
        'org',
        'postal',
        'timezone',
        'readme',
    ];
}
