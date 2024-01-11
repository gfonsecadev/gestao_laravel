<form action="{{route('site.contato')}}" method="post">
                        @csrf
                        <input type="text" placeholder="Nome" class="borda-{{$estilo}}" name="nome" value={{old("nome")}}>
                        <br>
                           <div class="validation"> {{$errors->has("nome") ? $errors->first("nome") : ""}}</div>
                        <br>
                        <input type="text" placeholder="Telefone" class="borda-{{$estilo}}" name="telefone" value={{old("telefone")}}>
                           <div class="validation"> {{$errors->has("telefone") ? $errors->first("telefone") : ""}}</div>
                        <br>
                        <input type="text" placeholder="E-mail" class="borda-{{$estilo}}" name="email" value={{old("email")}}>
                        <div class="validation">{{$errors->has("email") ? $errors->first("email") : ""}}</div>
                        <br>
                        <select class="borda-{{$estilo}}" name="motivo_contato_id">
                            <option value="">Qual o motivo do contato?</option>

                            @foreach ($tipos as $key=>$tipo )
                                <option value= {{$tipo->id}} {{old("motivo_contato_id") == $tipo->id ? "selected" : ""}} >{{$tipo->motivo_contato}}</option>
                            @endforeach
                            
                    
                        </select>
                        <div class="validation">{{$errors->has("motivo_contato_id") ? $errors->first("motivo_contato_id") : ""}}</div>

                        <br>
                        <textarea class="borda-{{$estilo}}" name="mensagem">{{empty(old("mensagem")) ? "Preencha aqui sua mensagem" : old("mensagem")}}</textarea>
                        <div class="validation">{{$errors->has("mensagem") ? $errors->first("mensagem") : ""}}</div>
                        <br>
                        <button type="submit" class="borda-{{$estilo}}">ENVIAR</button>
</form>