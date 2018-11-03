<?php

use Illuminate\Database\Seeder;

class ColecaoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('colecao')->insert([
            'nome' => 'Case',
            'desc' => 'Estudo de caso',
            'posicao' => 0,
            'status' => 1,
        ]);
        $this->command->info('Case Created!');

        DB::table('colecao')->insert([
            'nome' => 'Paper',
            'desc' => '',
            'posicao' => 1,
            'status' => 1,
        ]);
        $this->command->info('Paper Created!');

        DB::table('colecao')->insert([
            'nome' => 'TCC',
            'desc' => 'Trabalho de Conclusão de Curso',
            'posicao' => 2,
            'status' => 1,
        ]);
        $this->command->info('TCC Created!');

        DB::table('colecao')->insert([
            'nome' => 'Monografia',
            'desc' => '',
            'posicao' => 3,
            'status' => 1,
        ]);
        $this->command->info('Monografia Created!');

        DB::table('colecao')->insert([
            'nome' => 'Dissertação',
            'desc' => '',
            'posicao' => 4,
            'status' => 1,
        ]);
        $this->command->info('Dissertação Created!');

        DB::table('colecao')->insert([
            'nome' => 'Tese',
            'desc' => '',
            'posicao' => 5,
            'status' => 1,
        ]);
        $this->command->info('Dissertação Created!');

        DB::table('colecao')->insert([
            'nome' => 'Artigo',
            'desc' => '',
            'posicao' => 6,
            'status' => 1,
        ]);
        $this->command->info('Artigo Created!');
    }
}
