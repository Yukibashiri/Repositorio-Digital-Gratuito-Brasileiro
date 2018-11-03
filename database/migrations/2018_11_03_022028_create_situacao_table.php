<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSituacaoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('situacao', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('nome', 45);
			$table->string('desc')->nullable();
			$table->boolean('posicao')->nullable()->unique('posicao_UNIQUE');
			$table->boolean('status', 1)->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('situacao');
	}

}
