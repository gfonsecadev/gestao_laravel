<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\USER;

class LoginController extends Controller
{
    public function index(Request $request){
       $erro=$request->get("erro");

        return view("app.login",compact("erro"));
    }

    public function autenticar(Request $request){
        $request->validate([
            "email"=>"email",
            "senha"=>"required"
        ],
        [
            "email.email"=>"Este email não é válido",
            "senha.required"=>"Este campo deve ser preenchido"
        ]);
        
        $usuario=new USER();
        $usuario=$usuario->where("email",$request->get("email"))->where("password",$request->get("senha"))->get()->first();

        if(isset($usuario->email) && isset($usuario->password)){
            session_start();
            $_SESSION["email"]=$usuario->email;
            $_SESSION["senha"]=$usuario->password;
            return redirect()->route("app.home");

        }else return redirect()->route("site.login",["erro"=>1]);

        
    }

    public function sair(){
        session_start();
        session_destroy();
        return redirect()->route("site.login");
    }
}
