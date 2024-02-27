<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    protected $fillable =["nome","fornecedor_id_fk","descricao","peso","unidade_id_fk"];

    //Um produto pertence a uma unidade.
    public function unidadeBelong(){
        return $this->belongsTo(Unidade::class,"unidade_id_fk",)->get()->first()->descricao;
    }

   public function BelongFornecedor(){
    return $this->belongsTo(Fornecedor::class,"fornecedor_id_fk")->get()->first();
   }

}
