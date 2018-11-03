<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUsuarioTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('usuario', function(Blueprint $table)
		{
			$table->bigInteger('id', true);
			$table->string('login', 50)->unique('login_UNIQUE');
			$table->string('email')->unique('email_UNIQUE');
			$table->string('senha');
			$table->string('codinome', 100);
			$table->bigInteger('informacao_pessoal_id')->index('fk_usuario_informacao_pessoal1_idx');
			$table->integer('categoria_id')->index('fk_usuario_categoria1_idx');
			$table->boolean('esta_ativo', 1)->nullable();
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
		Schema::drop('usuario');
	}

}
