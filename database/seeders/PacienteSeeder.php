<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PacienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('paciente')->insert([
            [
                'tipo_documento_id' => 1,
                'numero_documento' => '123456789',
                'nombre1' => 'Juan',
                'nombre2' => 'Carlos',
                'apellido1' => 'Pérez',
                'apellido2' => 'Gómez',
                'genero_id' => 1,
                'departamento_id' => 1,
                'municipio_id' => 1,
            ],

            [
                'tipo_documento_id' => 2,
                'numero_documento' => '145498789',
                'nombre1' => 'Laura',
                'nombre2' => 'Valentina',
                'apellido1' => 'Sanchez',
                'apellido2' => 'Romero',
                'genero_id' => 2,
                'departamento_id' => 2,
                'municipio_id' => 3,
            ],

            [
                'tipo_documento_id' => 1,
                'numero_documento' => '100569989',
                'nombre1' => 'Juan',
                'nombre2' => 'Pablo',
                'apellido1' => 'Rubiano',
                'apellido2' => 'Lozano',
                'genero_id' => 1,
                'departamento_id' => 3,
                'municipio_id' => 5,
            ],

            [
                'tipo_documento_id' => 1,
                'numero_documento' => '111072289',
                'nombre1' => 'Katherine',
                'nombre2' => 'Alexandra',
                'apellido1' => 'Solorzano',
                'apellido2' => 'Gutierrez',
                'genero_id' => 2,
                'departamento_id' => 4,
                'municipio_id' => 7,
            ],

            [
                'tipo_documento_id' => 1,
                'numero_documento' => '110072289',
                'nombre1' => 'Antonio',
                'nombre2' => 'Jose',
                'apellido1' => 'Ruiz',
                'apellido2' => 'Galvan',
                'genero_id' => 1,
                'departamento_id' => 5,
                'municipio_id' => 9,
            ],
           
        ]);
    }
}
