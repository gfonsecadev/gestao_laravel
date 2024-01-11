<?php

use Illuminate\Database\Seeder;
use App\SiteContato;
class SiteContatoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   
        $siteContato=new SiteContato();
       // factory(SiteContato::class,100)->create();
       
        $siteContato->nome="Gilmar";
        $siteContato->telefone="35 997091244";
        $siteContato->email="gilmareeneliane@gmail.com";
        $siteContato->motivo_contato="Dúvidas";
        $siteContato->mensagem="Quero exclarecer algumas dúvidas sobre o Super Gestão.";
        $siteContato->save();

    }
}
