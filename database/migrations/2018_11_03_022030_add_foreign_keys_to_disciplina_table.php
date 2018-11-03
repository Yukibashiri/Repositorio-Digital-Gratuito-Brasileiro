<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToDisciplinaTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('disciplina', function(Blueprint $table)
		{
			$table->foreign('curso_id', 'fk_disciplina_curso1')->references('id')->on('curso')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('disciplina', function(Blueprint $table)
		{
			$table->dropForeign('fk_disciplina_curso1');
		});
	}

}
