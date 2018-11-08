<?php

use Illuminate\Database\Seeder;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tags')->insert([
            'texto' => 'Direito',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        $this->command->info('Direito Created!');

        DB::table('tags')->insert([
            'texto' => 'Tecnologia',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        $this->command->info('Tecnologia Created!');

        DB::table('tags')->insert([
            'texto' => 'Sistemas Distribuidos',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        $this->command->info('Sistemas Distribuidos Created!');

        DB::table('tags')->insert([
            'texto' => 'Repositório Digital',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        $this->command->info('Repositório Digital Created!');

        DB::table('tags')->insert([
            'texto' => 'Open Source',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        $this->command->info('Open Source Created!');

        DB::table('tags')->insert([
            'texto' => 'Desenvolvimento',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        $this->command->info('Desenvolvimento Created!');
    }
}
