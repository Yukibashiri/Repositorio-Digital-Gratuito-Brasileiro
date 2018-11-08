<?php

use Illuminate\Database\Seeder;

class UsuarioTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('usuario')->insert([
            'login' => 'yukibashiri',
            'email' => 'mariodamiaocaparroz@gmail.com',
            'password' =>  bcrypt('123456'),
            'codinome' => 'Administrador',
            'informacao_pessoal_id' => 1,
            'categoria_id' => 1,
            'esta_ativo' => 1,
            'created_at' => now(),
            'updated_at' => now(),
            'email_verified_at' => now(),
        ]);
        $this->command->info('User: yukibashiri Created!');

        DB::table('usuario')->insert([
            'login' => 'rodrigomonteiro',
            'email' => 'rodrigomonteiro@gmail.com',
            'password' => bcrypt('123456'),
            'codinome' => 'Rodrigo Monteiro',
            'informacao_pessoal_id' => 2,
            'categoria_id' => 2,
            'esta_ativo' => 1,
            'created_at' => now(),
            'updated_at' => now(),
            'email_verified_at' => now(),
        ]);
        $this->command->info('User: rodrigo Created!');
    }
}
