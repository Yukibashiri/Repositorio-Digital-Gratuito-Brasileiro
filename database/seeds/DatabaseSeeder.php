<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    { // Ressalto que a ordem aqui importa muito, para não criar problema com as dependencias existentes.

        $this->call([
            // Inserts das configurações do Sistema
            ConfiguracaoTableSeeder::class,

            // Insert das informações do usuário
            CategoriaTableSeeder::class,

            // Insert das informações do material cientifico
            ColecaoTableSeeder::class,
            PapelTableSeeder::class,
            ArquivoExtensaoTableSeeder::class,
            SituacaoTableSeeder::class,
        ]);
        if(!app()->environment('production')): // Caso esteja no ambiente de teste ou desenvolvimento..
            $this->call([
                 // Insert das informações do usuário
                 InformacaoPessoalTableSeeder::class,
                 UsuarioTableSeeder::class,

                 // Insert das informações do material cientifico
                 CursoTableSeeder::class,
                 DisciplinaTableSeeder::class,
             ]);
        endif;
    }
}
