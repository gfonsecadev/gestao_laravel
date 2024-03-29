<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProdutos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produtos', function (Blueprint $table) {
            $table->id();
            $table->string("nome", 30);
            $table->string("descricao", 50);
            $table->integer("peso");
            $table->timestamps();
            //essas abaixo serão dropadas na migrate 192015 só para fins de aprendizado
            $table->decimal("preco_venda", 8, 2);
            $table->integer("estoque_minimo");
            $table->integer("estoque_maximo");

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('produtos');
    }
}
