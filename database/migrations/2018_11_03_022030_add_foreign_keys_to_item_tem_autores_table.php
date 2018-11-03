<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToItemTemAutoresTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('item_tem_autores', function(Blueprint $table)
		{
			$table->foreign('item_id', 'fk_item_has_usuario_item1')->references('id')->on('item')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('usuario_id', 'fk_item_has_usuario_usuario1')->references('id')->on('usuario')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('papel_id', 'fk_item_tem_autores_papel1')->references('id')->on('papel')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('item_tem_autores', function(Blueprint $table)
		{
			$table->dropForeign('fk_item_has_usuario_item1');
			$table->dropForeign('fk_item_has_usuario_usuario1');
			$table->dropForeign('fk_item_tem_autores_papel1');
		});
	}

}
