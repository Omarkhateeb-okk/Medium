<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use phpDocumentor\Reflection\Types\Integer;
use Faker\Factory as Faker;
use function Symfony\Component\String\length;


class articleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker=Faker::create();
        foreach (range(1,100) as $index) {
            DB::table('articles')->insert([
//                'user_id'=>$faker->randomDigit(),
                'title' => $faker->sentence(5),
                'description' => $faker->paragraph(4)
            ]);
        }
    }
}
