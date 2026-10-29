<?php

namespace App\Services;

class BattleEngine
{
    public array $kratos;
    public array $monster;

    public function __construct()
    {
        $this->kratos = $this->generateKratos();
        $this->monster = $this->generateMonster();
    }

    public function generateKratos(): array
    {
        return [
            'name'     => 'Kratos',
            'health'   => rand(65, 100),
            'strength' => rand(75, 90),
            'defence'  => rand(40, 50),
            'speed'    => rand(40, 50),
            'luck'     => rand(10, 20),
        ];
    }

    public function generateMonster(): array
    {
        return [
            'name'     => 'Wild Monster',
            'health'   => rand(50, 80),
            'strength' => rand(55, 80),
            'defence'  => rand(50, 70),
            'speed'    => rand(40, 60),
            'luck'     => rand(30, 45),
        ];
    }

    public function firstAttacker(): array
    {
        return match (true) {
            $this->kratos['speed'] > $this->monster['speed'] => [$this->kratos, $this->monster],
            $this->kratos['speed'] < $this->monster['speed'] => [$this->monster, $this->kratos],
            $this->kratos['luck'] > $this->monster['luck']   => [$this->kratos, $this->monster],
            default => [$this->monster, $this->kratos],
        };
    }

    public function logRound(array &$attacker, array &$defender, int $turnNr): array
    {
        $usedSkill = [];
        $totalDamage = 0;
        $missedAttack = false;
        $attackCount = 1;

        if ($attacker['name'] === 'Kratos' && rand(1, 100) <= 15) {
            $attackCount = 2;
            $usedSkill[] = 'Rapid Fire';
        }

        for ($hit = 1; $hit <= $attackCount; $hit++) {
            if (rand(1, 100) <= $defender['luck']) {
                if ($hit === 1) {
                    $missedAttack = true;
                }
                continue;
            }

            $damage = max(0, ($attacker['strength'] - $defender['defence']));

            if ($defender['name'] === 'Kratos' && rand(1, 100) <= 15) {
                if (!in_array('Magic Armour', $usedSkill)) {
                    $usedSkill[] = 'Magic Armour';
                }
                $damage = (int) floor($damage / 2);
            }

            $totalDamage += $damage;
            $defender['health'] = max(0, ($defender['health'] - $damage));

            if ($defender['health'] <= 0) {
                break;
            }
        }

        return [
            'turn_nr'                  => $turnNr,
            'attacker'                 => $attacker['name'],
            'defender'                 => $defender['name'],
            'damage'                   => $totalDamage,
            'missed'                   => $missedAttack && $totalDamage === 0,
            'defender_health_remained' => $defender['health'],
            'used_skills'              => array_values(array_unique($usedSkill)),
        ];
    }

    public function simulate(): \App\Models\Battle
    {
        [$attacker, $defender] = $this->firstAttacker();
        $logs = [];
        $winner = 'Draw';

        for ($turn = 1; $turn <= 15; $turn++) {
            $logTurn = $this->logRound($attacker, $defender, $turn);
            $logs[] = $logTurn;

            if ($defender['health'] <= 0) {
                $winner = $attacker['name'];
                break;
            }

            $temp = $attacker;
            $attacker = $defender;
            $defender = $temp;
        }

        $battle = \App\Models\Battle::create([
            'kratos_health'   => $this->kratos['health'],
            'kratos_strength' => $this->kratos['strength'],
            'kratos_defence'  => $this->kratos['defence'],
            'kratos_speed'    => $this->kratos['speed'],
            'kratos_luck'     => $this->kratos['luck'],

            'monster_health'   => $this->monster['health'],
            'monster_strength' => $this->monster['strength'],
            'monster_defence'  => $this->monster['defence'],
            'monster_speed'    => $this->monster['speed'],
            'monster_luck'     => $this->monster['luck'],

            'winner'      => $winner,
            'total_turns' => count($logs),
        ]);

        foreach ($logs as $log) {
            $battle->logs()->create($log);
        }

        return $battle;
    }
}
