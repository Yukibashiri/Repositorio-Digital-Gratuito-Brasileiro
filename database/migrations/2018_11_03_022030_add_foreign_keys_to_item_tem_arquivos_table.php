<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToItemTemArquivosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('item_tem_arquivos', function(Blueprint $table)
		{
			$table->foreign('arquivo_id', 'fk_item_has_arquivo_arquivo1')->references('id')->on('arquivo')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('item_id', 'fk_item_has_arquivo_item1')->references('id')->on('item')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('item_tem_arquivos', function(Blueprint $table)
		{
			$table->dropForeign('fk_item_has_arquivo_arquivo1');
			$table->dropForeign('fk_item_has_arquivo_item1');
		});
	}

}
