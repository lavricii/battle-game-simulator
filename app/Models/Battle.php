<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Battle extends Model
{
    protected $guarded = [];
    public function logs(): HasMany
    {
        return $this->hasMany(BattleLog::class);
    }
}
