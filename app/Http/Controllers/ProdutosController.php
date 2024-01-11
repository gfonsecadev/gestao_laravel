<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Produto;
use App\Unidade;


class ProdutosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request){
        $produtos=Produto::paginate(10);
    
        return view("app.produtos.index",["produtos"=>$produtos,"request"=>$request]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $unidades=Unidade::all();
        return view("app.produtos.create",["unidades"=>$unidades]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $regras=[
            "nome"=>"required|min:4|max:20|unique:site_contatos",
            "descricao"=>"required",
            "peso"=>"required|integer",
            "unidade_fk"=>"required|exists:unidades,id"
        ];

        $parametros=[
            "required"=>"* O campo :attribute é obrigatório.",
            "unique"=>"Este nome já existe em nossa base de dados.",
            "min"=>"* Este campo precisa ter no minímo 4 letras.",
            "integer"=>"Este campo só aceita números.",
            "unidade_fk.exists"=>"Unidade não informada.",
            "max"=>"* Quantidade de letras ultrapassadas.",
    ];
        $request->validate($regras, $parametros);

        Produto::create($request->all());
        return redirect()->route("produtos.index");
        

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Produto $produto)
    {
        return view("app.produtos.show",["produto"=>$produto]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Produto $produto)
    {   
        $unidades=Unidade::all();
        return view("app.produtos.edit",["produto"=>$produto,"unidades"=>$unidades]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Produto $produto)
    {
        $regras=[
            "nome"=>"required|min:4|max:20|unique:site_contatos",
            "descricao"=>"required",
            "peso"=>"required|integer",
            "unidade_fk"=>"required|exists:unidades,id"
        ];

        $parametros=[
            "required"=>"* O campo :attribute é obrigatório.",
            "unique"=>"Este nome já existe em nossa base de dados.",
            "min"=>"* Este campo precisa ter no minímo 4 letras.",
            "integer"=>"Este campo só aceita números.",
            "unidade_fk.exists"=>"Unidade não informada.",
            "max"=>"* Quantidade de letras ultrapassadas.",
    ];
        $request->validate($regras, $parametros);

        print_r($request->all());
        $produto->update($request->all());
        return redirect()->route("produtos.index");

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Produto $produto)
    {
        $produto->delete();
        return redirect()->route("produtos.index");
    }
}
