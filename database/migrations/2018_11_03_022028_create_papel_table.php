<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePapelTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('papel', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('nome', 45)->unique('nome_UNIQUE');
			$table->boolean('posicao')->unique('posicao_UNIQUE');
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
		Schema::drop('papel');
	}

}
