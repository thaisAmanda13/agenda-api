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
            $table->id();
            $table->string('nome',100);
            $table->char('cpf',11)->unique();
            $table->string('email')->unique();
            $table->date('dataNascimento');
            $table->timestamps();
            $table->bigInteger('enderecoId')->unsigned();
            $table->bigInteger('telefoneId')->unsigned();
            $table->foreign('telefoneId')->references('id')->on('telefone');
            $table->foreign('enderecoId')->references('id')->on('endereco');
        });

    //    Schema::table('contato', function($table) {
            
        
    //         // $table->foreign('FK_contato_endereco')->references('id')
    //         // ->on('endereco')->onDelete('cascade')->on;
    //     });
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
