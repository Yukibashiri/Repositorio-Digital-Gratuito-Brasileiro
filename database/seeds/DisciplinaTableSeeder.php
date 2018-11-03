<?php

use Illuminate\Database\Seeder;

class DisciplinaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('disciplina')->insert([
            'nome' => 'Introdução a Programação',
            'desc' => 'Introdução a Programação',
            'created_at' => NOW(),
            'curso_id' => 2,
        ]);
        $this->command->info('Disciplina: SI Created!');

        DB::table('disciplina')->insert([
            'nome' => 'Introdução a Direito Penal',
            'desc' => 'Introdução a Direito Penal',
            'created_at' => NOW(),
            'curso_id' => 1,
        ]);
        $this->command->info('Disciplina: direito Created!');
    }
}
