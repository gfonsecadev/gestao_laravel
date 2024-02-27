<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class AlterFornecedoresForeign extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::table("produtos",function(Blueprint $table){
            $fornecedorId= DB::table("fornecedores")->insertGetId([
              "nome"=>"Magazine Luiza",
              "site"=>"www.magazineempresas.com",
              "email"=>"magazine@hotmail.com",
              "uf"=>"sp"
            ]);


            $table->unsignedBigInteger("fornecedor_id_fk")->default($fornecedorId)->after("id");
            $table->foreign("fornecedor_id_fk")->references("id")->on("fornecedores");
        });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

        Schema::table("produtos",function(Blueprint $table){
            $table->dropForeign("produtos_fornecedor_id_fk_foreign");
            $table->dropColumn("fornecedor_id_fk");
        });
    }
}
