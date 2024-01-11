<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class AlterSiteContatosForeign extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table("site_contatos",function(Blueprint $table){
          $table->unsignedBigInteger("motivo_contato_id");
            
        });



        Schema::table("site_contatos",function(Blueprint $table){
            DB::statement("UPDATE site_contatos set motivo_contato_id=motivo_contato");
            $table->dropColumn("motivo_contato");
            $table->foreign("motivo_contato_id")->references("id")->on("tipo_contatos");
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table("site_contatos",function(Blueprint $table){
            $table->integer("motivo_contato");
           
        });

        DB::statement("UPDATE site_contatos set motivo_contato=motivo_contato_id");

        Schema::table("site_contatos",function(Blueprint $table){
            $table->dropForeign("site_contatos_motivo_contato_id_foreign");
            $table->dropColumn("motivo_contato_id");
        });
    }
}
