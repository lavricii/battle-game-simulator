<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

Artisan::command('battle:run', function (\App\Services\BattleEngine $engine) {
    $battle = $engine->simulate();
    $this->info("Battle finished! Winner: {$battle->winner} in {$battle->total_turns} turns.");
})->purpose('Run a battle simulation from the CLI');
