<?php

namespace Database\Seeders;

use App\Models\Especialidade;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EspecialidadeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('especialidades')->insert([
            ['name' => 'Clinico Geral'],
            ['name' => 'Cardiologista'],
            ['name' => 'Psiquiatra'],
            ['name' => 'Dermatologista'],
            ['name' => 'Ortopedista'],
            ['name' => 'Anestesiologista'],
            ['name' => 'Cirurgião'],
            ['name' => 'Pediatria'],
            ['name' => 'Oftalmologia'],
            ['name' => 'Urologia'],
        ]);
    }
}
