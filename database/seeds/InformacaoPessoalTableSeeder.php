<?php

use Illuminate\Database\Seeder;

class InformacaoPessoalTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('informacao_pessoal')->insert([
            'nome' => 'Mário',
            'sobrenome' => 'Caparroz',
            'nascimento' => '1993-11-22',
        ]);
        $this->command->info('Inf.Pessoal: Mario Created!');

        DB::table('informacao_pessoal')->insert([
            'nome' => 'Rodrigo',
            'sobrenome' => 'Monteiro',
            'nascimento' => '1988-05-05',
        ]);
        $this->command->info('Inf.Pessoal: Rodrigo Created!');

    }
}
