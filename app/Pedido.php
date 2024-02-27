<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    protected $fillable=["cliente_id_fk"];

    //recuperar o cliente relacionado ao pedidos
    public function cliente(){
       return $this->belongsTo(Cliente::class,"cliente_id_fk");
    }

    //metodo para correlacionar o pedido com o produto na tabela auxiliar
    public function produtos(){
        return $this->belongsToMany(Produto::class,"pedidos_produtos","pedido_id_fk","produto_id_fk");
                    /* ->withPivot(["cliente_id"]);  SERVE PARA TRAZER MAIS COLUNAS DA TABELA ASSOCIATIVA SE EXISTIR É CLARO*/
    }
    //belongsToMany recebe o nome da tabela da relação principal,
    //o nome da tabela auxiliar
    //o nome da coluna que representa esse modelo na tabela auxiliar
    //o nome da coluna que representa o modelo correlacionado com esse modelo na tabela auxiliar
    //metodo withPivot nos traz os colunas que queremos da tabela auxiliar
    //pois por padrao o eloquent traz somente as fks correlacionadas entre as tabelas
}
