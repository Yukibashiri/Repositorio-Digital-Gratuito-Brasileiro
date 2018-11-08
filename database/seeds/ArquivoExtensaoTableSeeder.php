<?php

use Illuminate\Database\Seeder;

class ArquivoExtensaoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('arquivo_extensao')->insert([
            'nome' => 'PDF',
            'slug' => 'pdf',
            'status' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        $this->command->info('Ext: pdf Created!');

        DB::table('arquivo_extensao')->insert([
            'nome' => 'DOCX',
            'slug' => 'docx',
            'status' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        $this->command->info('Ext: docx Created!');

        DB::table('arquivo_extensao')->insert([
            'nome' => 'DOC',
            'slug' => 'doc',
            'status' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        $this->command->info('Ext: doc Created!');
    }
}
