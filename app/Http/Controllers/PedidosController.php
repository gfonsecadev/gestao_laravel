<?php

namespace App\Http\Controllers;

use App\Cliente;
use App\Pedido;
use App\Produto;
use Illuminate\Http\Request;

class PedidosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pedidos=Pedido::with("cliente","produtos")->orderBy("cliente_id_fk")->get();
       //echo("<pre>".$pedidos[0]->produtos()->count()."</pre>");
       return view("app.pedidos.index",["pedidos"=>$pedidos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    //abre a rota de criação de pedido
    public function create(Request $request)
    {
        $produtos=Produto::all();
        $cliente=Cliente::where("id",$request->cliente)->get()->first();

        return view("app.pedidos.create",["cliente"=>$cliente,"produtos"=>$produtos]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    //criar pedido e adicionar produto
    public function store(Request $request)
{       $pedido=new Pedido();
        $pedido->cliente_id_fk=$request->get("cliente_id");
        $pedido->save();
        //metodo attach() do relacionamento belongsToMany da classe pedido
        //ele é responsável de adicionar o relacionamento n:n do model
        //passei o id do cliente para o attach salvar também na tabela intermédiaria
        $pedido->produtos()->attach($request->get("produto_id"),["cliente_id"=>$request->get("cliente_id")]);
        return redirect()->route("pedidos.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //mostra os produtos que estão no pedido
    public function show($id_pedido)
    {   //recupero todos os produtos pelo belongsToMany criado no modelo
        $produtos=Pedido::all()->where("id",$id_pedido)->first()->produtos;
        //echo("<pre>".$produtos."</pre>");
        return view("app.pedidos.show",["produtos"=>$produtos]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //retorna a view para adicionar mais produtos ao pedido já criado
    public function edit($id_pedido)
    {

        $produtos=Produto::all();
        //recupero o pedido e o cliente para carregar a view
        $pedido=Pedido::all()->where("id",$id_pedido)->first();
        $cliente=Cliente::all()->where("id",$pedido->cliente_id_fk)->first();

        return view("app.pedidos.edit",["produtos"=>$produtos,"cliente"=>$cliente,"pedido"=>$pedido]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_pedido)
    {
       $pedido=Pedido::all()->where("id",$id_pedido)->first();
       //dd($request->all());
       $pedido->produtos()->attach($request->get("produto_id"),["cliente_id"=>$request->get('cliente_id')]);
       return redirect()->route("pedidos.show",["pedido"=>$id_pedido]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

       $pedido=Pedido::all()->where("id",$id)->first();
       //desanexo ou seja excluo todos os relacionamentos pedidos_produtos atrelados a esse pedido antes de excluir o pedido
       $pedido->produtos()->detach();
       $pedido->delete();

       return redirect()->route('pedidos.index');
    }
}
