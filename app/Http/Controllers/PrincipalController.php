<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TipoContato;
class PrincipalController extends Controller
{
    public function principal(){
        $tipos=TipoContato::all();
        return view("site.principal",compact("tipos"));
    }
}
