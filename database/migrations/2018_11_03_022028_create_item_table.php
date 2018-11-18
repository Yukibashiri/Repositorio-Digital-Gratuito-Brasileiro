<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateItemTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('item', function(Blueprint $table)
		{
			$table->bigInteger('id', true);
			$table->integer('colecao_id')->index('fk_item_colecao1_idx');
			$table->string('titulo');
			$table->string('subtitulo')->nullable();
            $table->text('resumo');
			$table->integer('curso_id')->nullable()->index('fk_item_curso1_idx');
			$table->integer('disciplina_id')->nullable()->index('fk_item_disciplina1_idx')->nullable();
			$table->integer('situacao_id')->index('fk_item_situacao1_idx');
			$table->bigInteger('qnt_vizualizacoes')->nullable();
			$table->boolean('nota')->nullable();
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
		Schema::drop('item');
	}

}
