<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResourcesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resources', function (Blueprint $table) {
            $table->increments('id')->index();
            $table->timestamps();                           // não-nulo

            // Campos não-nulos e o nome pode repetir
            $table->string("name");                         // não-nulo
            $table->longText("technicalDescription", 100000);   // não-nulo
            $table->longText("informalDescription", 100000);    // não-nulo

            // Criar um campo chamado URIResources (id e URI) que armazenará um JSON com as URIs (método json() não está
            // funcionando devido às versões mais antigas do MySQL)
            $table->text("uriResources");                   // não-nulo

            // Chave estrangeira para o usuário associado ao recurso
            $table->integer('user_id')->unsigned()->index();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('resources');
    }
}
