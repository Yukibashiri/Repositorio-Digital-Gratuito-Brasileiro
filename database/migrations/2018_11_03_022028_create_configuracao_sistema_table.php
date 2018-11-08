<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateConfiguracaoSistemaTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('configuracao_sistema', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('nome', 70)->unique('nome_UNIQUE');
			$table->string('desc')->nullable();
			$table->integer('valor')->nullable();
			$table->boolean('status', 1)->nullable();
			$table->timestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('configuracao_sistema');
	}

}
