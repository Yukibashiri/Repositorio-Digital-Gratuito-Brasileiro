<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateArquivoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('arquivo', function(Blueprint $table)
		{
			$table->bigInteger('id', true);
			$table->string('nome')->nullable();
			$table->string('caminho')->nullable();
			$table->integer('arquivo_extensao_id')->index('fk_arquivo_arquivo_extensao1_idx');
			$table->timestamps();
			$table->bigInteger('qnt_downloads')->nullable();
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
		Schema::drop('arquivo');
	}

}
