<?php

namespace App\Http\Controllers;

use App\Fornecedor;
use Illuminate\Http\Request;
use App\Produto;
use App\Unidade;
use Illuminate\Support\Facades\DB;

class ProdutosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $produtos = Produto::paginate(10);
        // $fornecedor=Fornecedor::all();
        // echo("<pre>".$fornecedor[1]->produtosHas()->get()."</pre>");
        //  echo("<pre>".$produtos[0]->belongFornecedor()->get()."</pre>");

        return view("app.produtos.index", ["produtos" => $produtos, "request" => $request]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    //metodo responsavel por redirecionar o formulario para o store
    public function create()
    {
        $fornecedores = Fornecedor::all();
        $unidades = Unidade::all();
        return view("app.produtos.create", ["unidades" => $unidades, "fornecedores" => $fornecedores]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    //responsável por persistir os dados recebidos do create
    public function store(Request $request)
    {
        $regras = [
            "nome" => "required|min:4|max:20|unique:site_contatos",
            "descricao" => "required",
            "peso" => "required|integer",
            "unidade_id_fk" => "required|exists:unidades,id",
            "fornecedor_id_fk" => "required|exists:fornecedores,id"
        ];

        $parametros = [
            "required" => "* O campo :attribute é obrigatório.",
            "unique" => "*Este nome já existe em nossa base de dados.",
            "min" => "* Este campo precisa ter no minímo 4 letras.",
            "integer" => "* Este campo só aceita números.",
            "unidade_id_fk.exists" => "* Unidade não informada.",
            "max" => "* Quantidade de letras ultrapassadas.",
            "fornecedor_id_fk.exists" => "* fornecedor não informado"
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
        $unidade = Unidade::where('id', $produto->unidade_id_fk)->get()->first();

        return view("app.produtos.show", ["produto" => $produto, "unidade" => $unidade]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Produto $produto)
    {
        $unidades = Unidade::all();
        $fornecedores = Fornecedor::all();
        return view("app.produtos.edit", ["produto" => $produto, "unidades" => $unidades, "fonecedores" => $fornecedores]);
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
        $regras = [
            "nome" => "required|min:4|max:20|unique:site_contatos",
            "descricao" => "required",
            "peso" => "required|integer",
            "unidade_id_fk" => "required|exists:unidades,id",
            "fornecedor_id_fk" => "required|exists:fornecedores,id"
        ];

        $parametros = [
            "required" => "* O campo :attribute é obrigatório.",
            "unique" => "Este nome já existe em nossa base de dados.",
            "min" => "* Este campo precisa ter no minímo 4 letras.",
            "integer" => "Este campo só aceita números.",
            "unidade_id_fk.exists" => "Unidade não informada.",
            "max" => "* Quantidade de letras ultrapassadas.",
            "fornecedor_id_fk.exists" => "Fornecedor não informado."
        ];
        $request->validate($regras, $parametros);


        //echo("<pre>".json_encode($request->all())."</pre>");
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
