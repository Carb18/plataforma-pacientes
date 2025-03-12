<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MunicipioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('municipios')->insert([
            ['departamento_id' => 1, 'nombre' => 'Ibague'],
            ['departamento_id' => 1, 'nombre' => 'Chaparral'],
            ['departamento_id' => 2, 'nombre' => 'Medellin'],
            ['departamento_id' => 2, 'nombre' => 'Ciudad Bolivar'],
            ['departamento_id' => 3, 'nombre' => 'Mosquera'],
            ['departamento_id' => 3, 'nombre' => 'Funza'],
            ['departamento_id' => 4, 'nombre' => 'Florencia'],
            ['departamento_id' => 4, 'nombre' => 'Albania'],
            ['departamento_id' => 5, 'nombre' => 'Pereira'],
            ['departamento_id' => 5, 'nombre' => 'La Celia'],
        ]);
    }
}
