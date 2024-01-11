@extends("app.templates.html_padrao")
@section("titulo","Fornecedores")

@section("conteudo")
     <div class="conteudo-pagina">
            <div class="titulo-pagina">
                <h1>Fornecedores</h1>
                <div class="nav_fornecedor">
                    <ul  >
                         <li><a href="{{route('app.fornecedores')}}" >Adicionar</a></li>
                         <li ><a class="link_selecionado" href="{{route('app.fornecedores.consultar')}}" >Consultar</a></li>
                    </ul>
                </div>
            </div>

            <div class="informacao-pagina">
                    <div style="color:white; background:green;" >{{$msg}}</div>
                    <div  style="width: 30%; height: 80px; margin-left: auto; margin-right: auto;">
                        <form action={{route('app.fornecedores.listar')}} method="post" style="text-align:left;">
                             @csrf
                            <label for="Nome" >Nome:</label>
                            <input type="text" placeholder="Seu nome" name="nome" value={{old("nome")}}>
                            <label for="site" >Site:</label>
                            <input type="text" placeholder="Seu site" name="site" value={{old("site")}}>
                            <label for="email" >Email:</label>
                            <input type="text" placeholder="Seu email" name="email" value={{old("email")}}>
                            <label for="uf">Uf:</label>
                            <input type="text" placeholder="Seu estado" name="uf" value={{old("uf")}}>
                            <button type="submit">Consultar</button>
                        </form>
                    </div>
            </div>
    </div>
     
@endsection