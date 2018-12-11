<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToItemTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('item', function(Blueprint $table)
		{
			$table->foreign('colecao_id', 'fk_item_colecao1')->references('id')->on('colecao')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('usuario_id', 'fk_item_usuario1')->references('id')->on('usuario')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('curso_id', 'fk_item_curso1')->references('id')->on('curso')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('disciplina_id', 'fk_item_disciplina1')->references('id')->on('disciplina')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('situacao_id', 'fk_item_situacao1')->references('id')->on('situacao')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('item', function(Blueprint $table)
		{
			$table->dropForeign('fk_item_colecao1');
			$table->dropForeign('fk_item_curso1');
			$table->dropForeign('fk_item_disciplina1');
			$table->dropForeign('fk_item_situacao1');
		});
	}

}
