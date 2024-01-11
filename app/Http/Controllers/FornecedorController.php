<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FornecedorController extends Controller{
    public function fornecer($p1,$p2,$num=12){//passando parâmetros do controller para view
    echo "Chegamos até aqui com as variaveis: ".$p1." e ".$p2;
    //return view("outras.fornecedor",["p1"=>$p1,"p2"=>$p2]); ***array associativo
    //return view("outras.fornecedor",compact("p1","p2"));  ***através do compact nativo do php
    $vazia="";
    $nomes2=[];
    $nomes=["Gilmar", "Gabriela", "Neliane"];
return view("outras.fornecedor")->with("p1",$p1)->with("p2",$p2)->with("num",$num)->with("vazia",$vazia)->with("nomes",$nomes)->with("nomes2",$nomes2); //*** através do with
    }
}
