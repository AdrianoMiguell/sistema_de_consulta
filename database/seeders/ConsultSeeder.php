<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ConsultSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('consults')->insert([
            [
                'title' => 'Hipertensão (Pressão alta)',
                'description' => 'Atendimento a pacientes vitimas de hipertensão.',
                'date' => '2023-02-13',
                'hour' => '15:00:00',
                'doctor_id' => 4,
            ],
            [
                'title' => ' ULTRAFORMER III',
                'description' => 'O ULTRAFORMER III é um procedimento não invasivo, tratamento personalizado para todo o rosto, pescoço e corpo. É um ultrassom micro e macrofocado, isso quer dizer que ele proporciona a contração tecidual, com isso há estimulo de colágeno e as áreas de flacidez são tratadas com maior eficácia na face e também em áreas corporais.
                ',
                'date' => '2023-05-13',
                'hour' => '9:00:00',
                'doctor_id' => 8,
            ],
            [
                'title' => 'Cuidado com os olhos',
                'description' => 'O acompanhamento oftalmológico tem como objetivo detectar quaisquer irregularidades no globo ocular e na região dos olhos, a fim de averiguar a saúde ocular do paciente. Nessa consulta você receberá orientações de cuidados diários com os olhos.
                ',
                'date' => '2022-12-27',
                'hour' => '08:00:00',
                'doctor_id' => 14,
            ],
        ]);
    }
}
