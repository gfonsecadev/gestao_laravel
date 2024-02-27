 {{-- extende esse componente para dentro de outro --}}
 @extends("templates.html_padrao")
 {{-- cada section é recebida pelo outro componente
      com o @yeld --}}

{{-- titulo para o componente --}}
 @section("titulo","principal")

 {{-- nome do componente com todo seu conteudo--}}
 @section("conteudo")

        <div class="conteudo-destaque">

            <div class="esquerda">
                <div class="informacoes">
                    <h1>Sistema Super Gestão</h1>
                    <p>Software para gestão empresarial ideal para sua empresa.<p>
                    <div class="chamada">
                       <img src="{{asset('img/check.png')}}">
                        <span class="texto-branco">Gestão completa e descomplicada</span>
                    </div>
                    <div class="chamada">
                        <img src="{{asset('img/check.png')}}">
                        <span class="texto-branco">Sua empresa na nuvem</span>
                    </div>
                </div>

                <div class="video">
                    <img src="{{asset('img/player_video.jpg')}}">
                </div>
            </div>

            <div class="direita">
                <div class="contato">
                    <h1>Contato</h1>
                    <p>Caso tenha qualquer dúvida por favor entre em contato com nossa equipe pelo formulário abaixo.<p>

                    {{-- se preciso utilizar outros componentes neste extends
                        utilize o @components informando o caminho e parametros
                        se preciso --}}
                    @component("componentes.formulario",['estilo'=>'branca',"tipos"=>$tipos])
                    @endcomponent
                </div>
            </div>
        </div>
    @endsection
