<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TiposSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tipos')->insert([
            'id' => 1,
            'nombre' => "repaso",
            'familia' => "informatica"

        ]);
        DB::table('tipos')->insert([
            'id' => 2,
            'nombre' => "ampliacion",
            'familia' => "informatica"

        ]);
        DB::table('tipos')->insert([
            'id' => 3,
            'nombre' => "repaso",
            'familia' => "administracion"
        ]);
        DB::table('tipos')->insert([
            'id' => 4,
            'nombre' => "ampliacion",
            'familia' => "administracion"
        ]);
        DB::table('tipos')->insert([
            'id' => 5,
            'nombre' => "repaso",
            'familia' => "marketing"
        ]);
        DB::table('tipos')->insert([
            'id' => 6,
            'nombre' => "ampliacion",
            'familia' => "marketing"
        ]);
        DB::table('tipos')->insert([
            'id' => 7,
            'nombre' => "repaso",
            'familia' => "logistica"
        ]);
        DB::table('tipos')->insert([
            'id' => 8,
            'nombre' => "ampliacion",
            'familia' => "logistica"
        ]);
        DB::table('tipos')->insert([
            'id' => 9,
            'nombre' => "repaso",
            'familia' => "otros"
        ]);
        DB::table('tipos')->insert([
            'id' => 10,
            'nombre' => "ampliacion",
            'familia' => "otros"
        ]);
    }
}
