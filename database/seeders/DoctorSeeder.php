<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DoctorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('doctors')->insert([
            [
                'name' => 'Anne Rose Barbosa',
                'especialidade_id' => 1,
                'image' => 'images/doctorAnneRose.jpg'
            ],
            [
                'name' => 'Robson Martins',
                'especialidade_id' => 2,
                'image' => 'images/doctors.jpg'
            ],
            [
                'name' => 'Mariane Silva',
                'especialidade_id' => 3,
                'image' => 'images/doctorMarianeSilva.jpg'
            ],
            [
                'name' => 'Jéssica Santos',
                'especialidade_id' => 2,
                'image' => 'images/doctorJessicaSantos.jpg'
            ],
            [
                'name' => 'Shaun Murphy',
                'especialidade_id' => 7,
                'image' => 'images/doctorShaunMurphy.jpg'
            ],
            [
                'name' => 'Immanuel Kant',
                'especialidade_id' => 6,
                'image' => 'images/doctorImmanuelKant.jpg'
            ],
            [
                'name' => 'Rodrigo Alencar',
                'especialidade_id' => 7,
                'image' => 'images/doctorRodrigoAlencar.jpg'
            ],
            [
                'name' => 'Carlos Barbosa Feitosa',
                'especialidade_id' => 4,
                'image' => 'images/doctors.jpg'
            ],
            [
                'name' => 'Caroline Conceição',
                'especialidade_id' => 4,
                'image' => 'images/doctorCarolineConceicao.jpg'
            ],
            [
                'name' => 'André Rodrigues',
                'especialidade_id' => 8,
                'image' => 'images/imagePerfil.png'
            ],
            [
                'name' => 'Fernando Almeida',
                'especialidade_id' => 5,
                'image' => 'images/imagePerfil.png'
            ],
            [
                'name' => 'Felipe Batista',
                'especialidade_id' => 1,
                'image' => 'images/imagePerfil.png'
            ],
            [
                'name' => 'Bruna Castro',
                'especialidade_id' => 1,
                'image' => 'images/doctorBrunaCastro.jpg'
            ],
            [
                'name' => 'Hiago Ferreira',
                'especialidade_id' => 9,
                'image' => 'images/doctors.png'
            ],
            [
                'name' => 'Geovana Garcia',
                'especialidade_id' => 3,
                'image' => 'images/imagePerfil.png'
            ],
        ]);
    }
}
