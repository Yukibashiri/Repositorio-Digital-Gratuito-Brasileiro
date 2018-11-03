<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateItemTemArquivosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('item_tem_arquivos', function(Blueprint $table)
		{
			$table->bigInteger('item_id')->index('fk_item_has_arquivo_item1_idx');
			$table->bigInteger('arquivo_id')->index('fk_item_has_arquivo_arquivo1_idx');
			$table->timestamps();
			$table->softDeletes();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('item_tem_arquivos');
	}

}
