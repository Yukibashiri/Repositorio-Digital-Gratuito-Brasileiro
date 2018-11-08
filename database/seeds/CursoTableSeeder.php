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
            'status' => 1,
            'desc' => '',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        $this->command->info('Curso: Direito Created!');

        DB::table('curso')->insert([
            'nome' => 'Sistemas de Informação',
            'status' => 1,
            'desc' => '',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        $this->command->info('Situacao: SI Created!');
    }
}
