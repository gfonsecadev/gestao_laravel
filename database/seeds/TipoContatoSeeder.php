<?php

use Illuminate\Database\Seeder;
use App\TipoContato;
class TipoContatoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tipo1=new TipoContato();
        $tipo2=new TipoContato();
        $tipo3=new TipoContato();
        $tipo1->motivo_contato="Dúvida";
        $tipo2->motivo_contato="Elogios";
        $tipo3->motivo_contato="Reclamação";
        $tipo1->save();
        $tipo2->save();
        $tipo3->save();
    }
}
