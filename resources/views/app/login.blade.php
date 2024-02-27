@extends("templates.html_padrao")
@section("titulo","login")

@section("conteudo")

 <div class="conteudo-pagina">
            <div class="titulo-pagina">
                <h1>Acesse sua conta</h1>
            </div>

            <div class="informacao-pagina">
                    <div  style="width: 30%; margin: auto">
                        <form action={{route('site.login')}} method="post" style="text-align:left;">
                             @csrf
                            <label for="email" >Email:</label>
                            <input type="text" placeholder="Seu email" name="email" value={{old("email") ? old("email") : "usuario@usuario.com"}}>
                            <div class="validation">{{$errors->has("email") ? $errors->first("email") : ""}}</div>
                            <label for="senha">Senha:</label>
                            <input type="password" placeholder="Sua senha" name="senha" value={{old("senha") ? old("senha") : "1234"}}>
                            <div class="validation" >{{$errors->has("senha") ? $errors->first("senha") : ""}}</div>
                            <button type="submit">Acessar</button>
                        </form>
                            <div class="validation" >{{(isset($erro) && $erro==1) ? "Usuário ou senha inválido" : ($erro==2 ? "É preciso logar com usuário e senha para continuar" : "")}}</div>
                    </div>
            </div>
    </div>
@endsection
