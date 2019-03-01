<?php

use App\Models\FighterLevel;
use Illuminate\Database\Seeder;

class FightLevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $levels = [
            [
                'name' => 'Novato',
                'min' => 0,
                'max' => 1,
            ],
            [
                'name' => 'Iniciante',
                'min' => 1,
                'max' => 2,
            ],
            [
                'name' => 'Intermediário',
                'min' => 2,
                'max' => 3,
            ],
            [
                'name' => 'Avançado',
                'min' => 4,
                'max' => 999,
            ],
        ];

        foreach ($levels as $level) {
            FighterLevel::create($level);
        }
    }
}
