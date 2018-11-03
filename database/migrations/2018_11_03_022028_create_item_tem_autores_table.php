<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateItemTemAutoresTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('item_tem_autores', function(Blueprint $table)
		{
			$table->bigInteger('item_id')->index('fk_item_has_usuario_item1_idx');
			$table->bigInteger('usuario_id')->index('fk_item_has_usuario_usuario1_idx');
			$table->integer('papel_id')->index('fk_item_tem_autores_papel1_idx');
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
		Schema::drop('item_tem_autores');
	}

}
