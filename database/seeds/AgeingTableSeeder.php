<?php

use App\AgeBracket;
use Illuminate\Database\Seeder;

class AgeingTableSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'name' => 'Mirim',
                'min' => 0,
                'max' => 5,
            ],
            [
                'name' => 'Infatil',
                'min' => 6,
                'max' => 8,
            ],
            [
                'name' => 'Junior',
                'min' => 9,
                'max' => 11,
            ],
            [
                'name' => 'Infanto Juvenil',
                'min' => 12,
                'max' => 14,
            ],
            [
                'name' => 'Juvenil',
                'min' => 15,
                'max' => 17,
            ],
            [
                'name' => 'Adulto',
                'min' => 18,
                'max' => 36,
            ],
            [
                'name' => 'Sênior',
                'min' => 36,
                'max' => 999,
            ],
        ];

        foreach ($data as $ageing) {
            AgeBracket::create($ageing);
        }
    }
}
