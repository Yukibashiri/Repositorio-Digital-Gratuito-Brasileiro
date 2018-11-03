<?php

use Illuminate\Database\Seeder;

class ConfiguracaoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('configuracao_sistema')->insert([
            'nome' => 'max_keywords',
            'desc' => 'Determina o numero máximo de palavras chaves de um item',
            'valor' => 3,
            'status' => 1,
        ]);
        $this->command->info('max_keywords Created!');

        DB::table('configuracao_sistema')->insert([
            'nome' => 'min_keywords',
            'desc' => 'Determina o numero minimo de palavras chaves de um item',
            'valor' => 0,
            'status' => 1,
        ]);
        $this->command->info('min_keywords Created!');

        DB::table('configuracao_sistema')->insert([
            'nome' => 'max_authors',
            'desc' => 'Determina o numero máximo de autores de um item',
            'valor' => 3,
            'status' => 1,
        ]);
        $this->command->info('max_authors Created!');

        DB::table('configuracao_sistema')->insert([
            'nome' => 'min_authors',
            'desc' => 'Determina o numero minimo de autores de um item',
            'valor' => 1,
            'status' => 1,
        ]);
        $this->command->info('min_authors Created!');

    }
}
