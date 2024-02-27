<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Unidade extends Model
{
    //uma unidade pode ser usada por varios produtos
    //só para fins didadicos
    public function produtoManyOne(){
        return $this->hasMany(Produto::class,"unidade_id_fk")->get()->first();
    }
}
