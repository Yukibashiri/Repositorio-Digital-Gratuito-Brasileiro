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
            'ext' => '.pdf',
            'status' => 1,
        ]);
        $this->command->info('Ext: pdf Created!');

        DB::table('arquivo_extensao')->insert([
            'nome' => 'DOCX',
            'ext' => '.docx',
            'status' => 1,
        ]);
        $this->command->info('Ext: docx Created!');

        DB::table('arquivo_extensao')->insert([
            'nome' => 'DOC',
            'ext' => '.doc',
            'status' => 1,
        ]);
        $this->command->info('Ext: doc Created!');
    }
}
