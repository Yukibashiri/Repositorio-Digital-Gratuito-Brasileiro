<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToArquivoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('arquivo', function(Blueprint $table)
		{
			$table->foreign('arquivo_extensao_id', 'fk_arquivo_arquivo_extensao1')->references('id')->on('arquivo_extensao')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('arquivo', function(Blueprint $table)
		{
			$table->dropForeign('fk_arquivo_arquivo_extensao1');
		});
	}

}
