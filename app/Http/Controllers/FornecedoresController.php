<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Fornecedor;

class FornecedoresController extends Controller
{
    public function index(Request $request){
        $msg=$request->get("msg") ?? "";
        $id=$request->get("id") ?? "";
        $fornecedor=Fornecedor::where("id",$id)->get()->first();
    
        return view("app.fornecedores.index",["msg"=>$msg,"fornecedor_atualizar"=>$fornecedor]);
    }

    public function adicionar(Request $request){
        $request->validate([
            "nome"=>"required",
            "site"=>"required",
            "email"=>"required|email",
            "uf"=>"required|min:2|max:2"
        ],[
            "required"=>"O campo :attribute precisa ser preenchido",
            "email.email"=>"Este email não é válido",
            "min"=>"Quantidade de caracteres insuficiente",
            "max"=>"Quantidade de caracteres ultrapassada"
        ]);

        Fornecedor::create(["nome"=>$request->input("nome"),
                            "site"=>$request->get("site"),
                            "email"=>$request->input("email"),
                            "uf"=>$request->get("uf")]);
        
       return redirect()->route("app.fornecedores",["msg"=>"Cadastro realizado com sucesso!!!"]);
        
    }

    public function consultar(Request $request){
        $msg=$request->get("msg") ?? "";
        return view("app.fornecedores.consultar",["msg"=>$msg]);
    }

    public function listar(Request $request){
        $fornecedor=new Fornecedor();
        $fornecedor=$fornecedor->where("nome","like",'%'.$request->input('nome').'%')
                               ->where("site","like",'%'.$request->input("site").'%')
                               ->where("email","like",'%'.$request->input('email').'%')
                               ->where("uf","like",'%'.$request->input('uf').'%')->paginate(2);
        //dd($fornecedor->all());
        if($fornecedor){
            return view("app.fornecedores.listar",["fornecedores"=>$fornecedor,"request"=>$request->all()]);
        }else{
            return redirect()->route("app.fornecedores.consultar",["msg"=>"Nada encontrado"]);
        }
    }

    public function excluir(Request $request){
        $id=$request->get("id") ?? "";
        Fornecedor::where("id",$id)->delete();
        return redirect()->route("app.fornecedores");
        
    }

    public function atualizar(Request $request){
        $id=$request->get("id") ?? "";
        $fornecedor=Fornecedor::where("id",$id)->get()->first();

        $fornecedor->update($request->all());
        return redirect()->route("app.fornecedores");
    }
}
