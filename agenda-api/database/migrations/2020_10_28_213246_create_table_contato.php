<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableContato extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contato', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome',100);
            $table->char('cpf',11)->unique();
            $table->string('email')->unique();
            $table->date('dataNascimento');
            $table->timestamps();
            $table->integer('enderecoId')->unsigned();
            $table->integer('telefoneId')->unsigned();
        });

        Schema::table('contato', function($table) {
            $table->foreign('telefoneId')->references('id')->on('telefone');
            $table->foreign('enderecoId')->references('id')->on('endereco');
            //verificar se ta correto isso aqui qnd possivel
            // $table->foreign('FK_contato_endereco')->references('id')
            // ->on('endereco')->onDelete('cascade')->on;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contato');
    }
}
