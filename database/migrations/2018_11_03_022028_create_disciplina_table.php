<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDisciplinaTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('disciplina', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('curso_id')->index('fk_disciplina_curso1_idx');
			$table->string('nome', 45)->unique('nome_UNIQUE');
			$table->string('desc');
            $table->boolean('status', 1)->nullable();
			$table->timestamps();
			$table->softDeletes();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('disciplina');
	}

}
