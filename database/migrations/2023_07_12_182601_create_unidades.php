<?php

use Illuminate\Database\Eloquent\Scope;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUnidades extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('unidades', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string("unidade",10);//cm, mm, m, etc...
            $table->string("descricao",100);
            
        });

        Schema::table("produto_detalhes",function(Blueprint $table){
            $table->unsignedBigInteger("unidade_id");
            $table->foreign("unidade_id")->references("id")->on("unidades");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table("produto_detalhes",function(Blueprint $table){
            $table->dropForeign("produto_detalhes_unidade_id_foreign");
            $table->dropColumn("unidade_id");
        });
        
        Schema::dropIfExists('unidades');
    
    }
}
