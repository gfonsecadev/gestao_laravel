<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fornecedor extends Model
{
    //por padrão o eloquent nomeia todas as tabelas para o plural no BD adicionando um S no final da classe.
    //Como o plural de fornecedor é fornecedores e não fornecedors, então precisamos ajudar o eloquent nomeando a mesma
protected $table="fornecedores";

//esta variavel $fillable nos garante que poderemos alterar as colunas representadas no array;
protected $fillable=["nome","site","email","uf"];

//por padrão as foreign keys são interpretadas como:  nomeColuna_id;
//como criei fornecedor_id_fk então preciso mostrar pra o eloquente o nome correto do foreign;
public function produtosHas(){
    return $this->hasMany(Produto::class,"fornecedor_id_fk");
}
}
