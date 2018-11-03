<?php

use Illuminate\Database\Seeder;

class CursoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('curso')->insert([
            'nome' => 'Direito',
            'desc' => '',
        ]);
        $this->command->info('Curso: Direito Created!');

        DB::table('curso')->insert([
            'nome' => 'Sistemas de Informação',
            'desc' => '',
        ]);
        $this->command->info('Situacao: SI Created!');
    }
}
