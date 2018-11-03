<?php

use Illuminate\Database\Seeder;

class PapelTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('papel')->insert([
            'nome' => 'Autor',
            'posicao' => 0,
            'status' => 1,
        ]);
        $this->command->info('Autor Created!');

        DB::table('papel')->insert([
            'nome' => 'Co-Autor',
            'posicao' => 1,
            'status' => 1,
        ]);
        $this->command->info('Co-Autor Created!');

        DB::table('papel')->insert([
            'nome' => 'Orientador',
            'posicao' => 2,
            'status' => 1,
        ]);
        $this->command->info('Orientador Created!');

        DB::table('papel')->insert([
            'nome' => 'Co-Orientador',
            'posicao' => 3,
            'status' => 1,
        ]);
        $this->command->info('Co-Orientador Created!');
    }
}
