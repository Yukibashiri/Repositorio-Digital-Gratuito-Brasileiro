<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateItemTemPalavrasChaveTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('item_tem_palavras_chave', function(Blueprint $table)
		{
			$table->bigInteger('item_id')->index('fk_item_has_tags_item1_idx');
			$table->integer('tags_id')->index('fk_item_has_tags_tags1_idx');
			$table->boolean('posicao')->nullable();
			$table->boolean('status', 1)->nullable();
			$table->string('item_has_tagscol', 45)->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('item_tem_palavras_chave');
	}

}
