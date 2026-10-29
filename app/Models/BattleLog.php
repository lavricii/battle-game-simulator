<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BattleLog extends Model
{
    protected $guarded = [];

    protected $casts = [
        'used_skills' => 'array',
        'missed' => 'boolean',
    ];
}
