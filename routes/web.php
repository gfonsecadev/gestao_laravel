<?php

use App\Http\Middleware\AutenticacaoMiddleware;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
/* Route::get('path',"nomeControlador@nomeDoMetodoDoController)->name('nomeOpcional)->middleware('nomeMiddleware') */
Route::get('/',"PrincipalController@principal")->name("site.principal")->middleware("site.log");
Route::get("/sobre_nos","SobreNosController@sobre_nos")->name("site.sobrenos");
Route::get("/contato","ContatoController@contato")->name("site.contato");
Route::post("/contato","ContatoController@formulario")->name("site.contato");
Route::get("/login","LoginController@index")->name("site.login");
Route::get("/sair","LoginController@sair")->name("site.sair");
Route::post("/login","LoginController@autenticar")->name("site.login");


#com o prefix podemos agrupar varias rotas
#podemos também aplicar um middleware ao prefix para aplicar a todos
Route::middleware("autenticacao:validacao")->prefix("/app")->group(function(){
    Route::get("/home","HomeController@index")->name("app.home");
    Route::resource("/clientes","ClientesController");
    Route::resource("/pedidos", "PedidosController");
    Route::get("/fornecedores{msg?}","FornecedoresController@index")->name("app.fornecedores");
    Route::post("/fornecedores","FornecedoresController@adicionar")->name("app.fornecedores");
    Route::get("/fornecedores/consultar","FornecedoresController@consultar")->name("app.fornecedores.consultar");
    Route::get("/fornecedores/excluir","FornecedoresController@excluir")->name("app.fornecedores.excluir");
    Route::get("/fornecedores/atualizar","FornecedoresController@atualizar")->name("app.fornecedores.atualizar");
    Route::post("/fornecedores/atualizar","FornecedoresController@atualizar")->name("app.fornecedores.atualizar");
    Route::post("/fornecedores/listar","FornecedoresController@listar")->name("app.fornecedores.listar");
    Route::get("/fornecedores/listar","FornecedoresController@listar")->name("app.fornecedores.listar");
    #criando um controller com resource o laravel conseque atribuir cada método de crud automaticamente criado no controlador para com a rota.
    Route::resource("/produtos", "ProdutosController");
});

#redirecionando rotas .
Route::get("/teste",function(){return redirect("/app/produtos");});
/* parametros são passdos por {} e quando opcionais seguidos de ?*/
/* para validar os parametros utilize o where passando o parametro e a logica */
Route::get("/teste2/{id?}",function(int $id=4){ echo "$id";})->where("id",'[0-9]+');
/* quando nenhuma rota declarada é chamada retorna um rota de pagina não encontrada */
Route::fallback(function(){
    echo "Página não foi encontrada";
});

Route::get("/fornecedor/{p1}/{p2}","FornecedorController@fornecer");






