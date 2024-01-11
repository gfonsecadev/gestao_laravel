<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TipoContato;
use App\SiteContato;
use GuzzleHttp\RedirectMiddleware;
use App\Http\Middleware\LogAcessoMiddleware;

class ContatoController extends Controller{
    public function __construct(){
        $this->middleware(LogAcessoMiddleware::class);
    }
    public function contato(){
        $tipos=TipoContato::all();
        return view("site.contato",compact("tipos"));
    }

    public function formulario(Request $request){
        //dd($request);
        //print_r($request->all());
        $request->validate([
            "nome"=>"required|min:4|max:20|unique:site_contatos",
            "telefone"=>"required",
            "email"=>"email",
            "motivo_contato_id"=>"required",
            "mensagem"=>"required|max:1000"
        ],
        ["required"=>"* O campo :attribute é obrigatório.",
         "unique"=>"Este nome já existe em nossa base de dados.",
         "min"=>"* Este campo precisa ter no minímo 4 letras.",
         "motivo_contato_id.required"=>"Selecione um motivo.",
         "max"=>"* Quantidade de letras ultrapassadas.",
         "email"=>"* O email informado não se apresenta no padrão aceito, ex: xxx@.xxx.com",
         "mensagem.required"=>"* Este campo precisa ser preenchido."

        ]);

        //SiteContato::create($request->all());
        $contato=new SiteContato();
        $contato->create($request->all());
        
        
        return redirect()->route("site.principal");
    }
}
