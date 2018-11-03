<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateInformacaoPessoalTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('informacao_pessoal', function(Blueprint $table)
		{
			$table->bigInteger('id', true);
			$table->string('nome', 150);
			$table->string('sobrenome', 100);
			$table->dateTime('nascimento');
			$table->dateTime('updated_at')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('informacao_pessoal');
	}

}
