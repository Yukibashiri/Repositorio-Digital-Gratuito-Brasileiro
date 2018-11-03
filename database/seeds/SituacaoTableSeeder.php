<?php

use Illuminate\Database\Seeder;

class SituacaoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('situacao')->insert([
            'nome' => 'Aprovado',
            'desc' => '',
            'posicao' => 0,
            'status' => 1,
        ]);
        $this->command->info('Situacao: aprovado Created!');

        DB::table('situacao')->insert([
            'nome' => 'Em Análise',
            'desc' => '',
            'posicao' => 1,
            'status' => 1,
        ]);
        $this->command->info('Situacao: analise Created!');

        DB::table('situacao')->insert([
            'nome' => 'Rejeitado',
            'desc' => '',
            'posicao' => 2,
            'status' => 1,
        ]);
        $this->command->info('Situacao: rejeitado Created!');

        DB::table('situacao')->insert([
            'nome' => 'Aprovado com Ressalvas',
            'desc' => '',
            'posicao' => 3,
            'status' => 1,
        ]);
        $this->command->info('Situacao: ressalva Created!');

        DB::table('situacao')->insert([
            'nome' => 'Aprovado e Publicado',
            'desc' => '',
            'posicao' => 4,
            'status' => 1,
        ]);
        $this->command->info('Situacao: publicado Created!');
    }
}
