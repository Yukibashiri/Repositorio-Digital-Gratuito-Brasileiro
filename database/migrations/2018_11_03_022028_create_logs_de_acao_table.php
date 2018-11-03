<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLogsDeAcaoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('logs_de_acao', function(Blueprint $table)
		{
			$table->bigInteger('id', true);
			$table->bigInteger('responsavel')->nullable();
			$table->string('modulo', 100)->nullable();
			$table->string('funcao', 100)->nullable();
			$table->string('erro', 45)->nullable();
			$table->string('msg')->nullable();
			$table->timestamp('data_ocorrencia')->default(DB::raw('CURRENT_TIMESTAMP'));
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('logs_de_acao');
	}

}
