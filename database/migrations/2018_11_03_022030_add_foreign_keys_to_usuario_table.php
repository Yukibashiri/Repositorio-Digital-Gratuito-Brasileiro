<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToUsuarioTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('usuario', function(Blueprint $table)
		{
			$table->foreign('categoria_id', 'fk_usuario_categoria1')->references('id')->on('categoria')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('informacao_pessoal_id', 'fk_usuario_informacao_pessoal1')->references('id')->on('informacao_pessoal')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('usuario', function(Blueprint $table)
		{
			$table->dropForeign('fk_usuario_categoria1');
			$table->dropForeign('fk_usuario_informacao_pessoal1');
		});
	}

}
