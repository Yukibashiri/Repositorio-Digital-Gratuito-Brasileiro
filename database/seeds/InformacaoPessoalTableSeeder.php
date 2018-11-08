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
            'created_at' => now(),
            'updated_at' => now(),

        ]);
        $this->command->info('Inf.Pessoal: Mario Created!');

        DB::table('informacao_pessoal')->insert([
            'nome' => 'Rodrigo',
            'sobrenome' => 'Monteiro',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        $this->command->info('Inf.Pessoal: Rodrigo Created!');

    }
}
