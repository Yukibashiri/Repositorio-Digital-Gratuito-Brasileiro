<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateArquivoExtensaoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('arquivo_extensao', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('nome', 100);
			$table->string('ext', 15);
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
		Schema::drop('arquivo_extensao');
	}

}
