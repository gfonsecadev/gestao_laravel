@extends("app.templates.html_padrao")
@section("titulo","Fornecedores")

@section("conteudo")
     <div class="conteudo-pagina">
            <div class="titulo-pagina">
                <h1>Fornecedores</h1>
                <div class="nav_fornecedor">
                    <ul  >
                         <li><a  class="link_selecionado" href="{{route('app.fornecedores')}}" >Adicionar</a></li>
                         <li><a  href="{{route('app.fornecedores.consultar')}}" >Consultar</a></li>
                    </ul>
                </div>
            </div>

            <div class="informacao-pagina">
                    <div style="color:white; background:green;" >{{$msg}}</div>
                    <div  style="width: 30%; height: 80px; margin-left: auto; margin-right: auto;">
                             
                       <form action={{!empty($fornecedor_atualizar) ? route("app.fornecedores.atualizar") : route("app.fornecedores")}} method="post" style="text-align:left;">

                             @csrf
                            <input type="hidden" name="id" value="{{!empty($fornecedor_atualizar) ? $fornecedor_atualizar->id : ''}}">
                            <label for="Nome" >Nome:</label>
                            <input type="text" placeholder="Seu nome" name="nome" value="{{!empty($fornecedor_atualizar) ? $fornecedor_atualizar->nome : old('nome')}}">
                            <div class="validation">{{$errors->has("nome") ? $errors->first("nome") : ""}}</div>
                            <label for="site" >Site:</label>
                            <input type="text" placeholder="Seu site" name="site" value="{{!empty($fornecedor_atualizar) ? $fornecedor_atualizar->site : old('site')}}">
                            <div class="validation">{{$errors->has("site") ? $errors->first("site") : ""}}</div>
                            <label for="email" >Email:</label>
                            <input type="text" placeholder="Seu email" name="email" value="{{!empty($fornecedor_atualizar) ? $fornecedor_atualizar->email : old('email')}}">
                            <div class="validation">{{$errors->has("email") ? $errors->first("email") : ""}}</div>
                            <label for="uf">Uf:</label>
                            <input type="text" placeholder="Seu estado" name="uf" value="{{!empty($fornecedor_atualizar) ? $fornecedor_atualizar->uf : old("uf")}}">
                            <div class="validation" >{{$errors->has("uf") ? $errors->first("uf") : ""}}</div>
                            <button type="submit">{{!empty($fornecedor_atualizar) ? "Atualizar" : "Adicionar"}}</button>
                        </form>
                    </div>
            </div>
    </div>
     
@endsection