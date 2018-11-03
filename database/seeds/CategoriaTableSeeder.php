<?php

use Illuminate\Database\Seeder;

class CategoriaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categoria')->insert([
            'nome' => 'Administrador',
            'desc' => 'Gerente do sistema',
            'posicao' => 0,
            'status' => 1,
        ]);
        $this->command->info('Admin Created!');

        DB::table('categoria')->insert([
            'nome' => 'Professor',
            'desc' => 'Professor da Instituição, responsável por gerenciar os trabalhos enviados',
            'posicao' => 1,
            'status' => 1,
        ]);
        $this->command->info('Professor Created!');

        DB::table('categoria')->insert([
            'nome' => 'Aluno',
            'desc' => 'Aluno da Instituição',
            'posicao' => 2,
            'status' => 1,
        ]);
        $this->command->info('Aluno Created!');
    }
}
