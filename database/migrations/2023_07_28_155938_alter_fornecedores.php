<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class AlterFornecedores extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table("fornecedores",function(Blueprint $table){
            $table->text("site")->after("nome");
            
        });
        DB::statement("truncate sq.fornecedores");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table("fornecedores",function(Blueprint $table){
            $table->dropColumn("site");
        });
    }
}
