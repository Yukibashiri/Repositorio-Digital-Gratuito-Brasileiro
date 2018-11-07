<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateArquivoExtensaoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('arquivo_extensao', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('nome', 100)->unique('nome_UNIQUE');;
			$table->string('slug', 15)->unique('slug_UNIQUE');;
			$table->boolean('status', 1)->nullable();
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
		Schema::drop('arquivo_extensao');
	}

}
