<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Schema;

class PedidoProduto extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {   //Criação tabela clientes
        Schema::create("clientes",function(Blueprint $table){
            $table->id();
            $table->string("nome",50);
            $table->timestamps();
        });

        //Criação tabela pedidos e relacionamento com a tabela clientes
        //um cliente para muitos pedidos
        Schema::create("pedidos",function(Blueprint $table){
            $table->id();
            $table->unsignedBigInteger("cliente_id_fk");
            $table->timestamps();

            $table->foreign("cliente_id_fk")->references("id")->on("clientes")->cascadeOnDelete();
        });

        //Criação tabela auxiliar para relação de N:N
        //Um pedido pode ter varios produtos e um produto pode estar em varios pedidos
        Schema::create("pedidos_produtos",function(Blueprint $table){
            //tanto faz usar os metodos abaixo são iguais para relaçao n:n
            $table->foreignId("pedido_id_fk");
            $table->unsignedBigInteger("produto_id_fk");
            $table->integer("cliente_id");
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table("pedidos",function(Blueprint $table){
            $table->dropForeign("pedidos_cliente_id_fk_foreign");
        });

        Schema::drop("pedidos");
        Schema::drop("clientes");
        Schema::drop("pedidos_produtos");
    }
}
