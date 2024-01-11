<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProdutosFiliais extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produtos_filiais', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->unsignedBigInteger("produto_id");
            $table->unsignedBigInteger("filial_id");
            $table->decimal("preco_venda",8,2);
            $table->integer("estoque_minimo");
            $table->integer("estoque_maximo");
            $table->foreign("produto_id")->references("id")->on("produtos");
            $table->foreign("filial_id")->references("id")->on("filiais");
        });

        Schema::table("produtos",function(Blueprint $table){
            $table->dropColumn(["preco_venda","estoque_minimo",'estoque_maximo']);
        });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('produtos_filiais');
        Schema::table("produtos",function(Blueprint $table){
            $table->decimal("preco_venda",8,2);
            $table->integer("estoque_minimo");
            $table->integer("estoque_maximo");
        });

    }
}
