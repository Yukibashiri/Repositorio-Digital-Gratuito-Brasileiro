<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToItemTemPalavrasChaveTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('item_tem_palavras_chave', function(Blueprint $table)
		{
			$table->foreign('item_id', 'fk_item_has_tags_item1')->references('id')->on('item')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('tags_id', 'fk_item_has_tags_tags1')->references('id')->on('tags')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('item_tem_palavras_chave', function(Blueprint $table)
		{
			$table->dropForeign('fk_item_has_tags_item1');
			$table->dropForeign('fk_item_has_tags_tags1');
		});
	}

}
