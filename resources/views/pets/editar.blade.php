@extends('layout')

@section('botaoCadastro')
    @auth
        <a href="/pets/create" class="btn btn-dark mb-2"><h5>Novo Pet</h5></a>
    @endauth
@endsection

@section('cabecalho')
    Pet: {{$pet->nome}}
@endsection

@section('conteudo')
    <section class="section">
         <div class="container">
             @if ($errors->any())
                 <article class="message is-danger">
                     <div class="message-body">
                         @foreach ($errors->all() as $error)
                             <li>{{ $error }}</li>
                         @endforeach
                     </div>
                 </article>
             @endif
             @if(!empty($mensagem))
                 <article class="message is-success">
                     <div class="message-body">
                         {{ $mensagem }}
                     </div>
                 </article>
             @endif
            <form method="post" action="/pets/{{$pet->id}}">
                @csrf
                @method('PUT')
                <div class="field">
                    <label class="label">Nome</label>
                    <div class="control">
                        <input class="input" type="text" placeholder="Nome do pet" id="nome" name="nome" value="{{$pet->nome}}">
                    </div>
                </div>

                <div class="field">
                    <label class="label">Tipo</label>
                    <div class="control">
                        <div class="select">
                            <select id="tipo" name="tipo">
                                <option value="Cão" {{$pet->tipo == 'Cão' ? 'selected' : ''}}>Cão</option>
                                <option value="Gato" {{$pet->tipo == 'Gato' ? 'selected' : ''}}>Gato</option>
                                <option value="Outros" {{$pet->tipo == 'Outros' ? 'selected' : ''}}>Outros</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="field">
                    <label class="label">Raça</label>
                    <div class="control">
                        <input class="input" type="text" placeholder="Raça do pet" id="raca" name="raca" value="{{$pet->raca}}">
                    </div>
                </div>

                <div class="field">
                    <label class="label">Cor</label>
                    <div class="control">
                        <input class="input" type="text" placeholder="Cor da pelagem" id="cor" name="cor" value="{{$pet->cor}}">
                    </div>
                </div>

                <div class="field">
                    <label class="label">Tipo</label>
                    <div class="control">
                        <div class="select">
                            <select id="sexo" name="sexo">
                                <option value="Macho" {{$pet->sexo == 'Macho' ? 'selected' : ''}}>Macho</option>
                                <option value="Fêmea" {{$pet->sexo == 'Fêmea' ? 'selected' : ''}}>Fêmea</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="field">
                    <label class="label">Data de Nascimento</label>
                    <div class="control">
                        <input class="input" type="text" placeholder="dd/mm/aaaa" id="dataNascimento" name="dataNascimento" value="{{$pet->dataNascimento}}">
                    </div>
                </div>

                <div class="field">
                    <label class="label">Observações</label>
                    <div class="control">
                        <input class="input" type="text" placeholder="Observações importantes sobre o pet" id="observacoes" name="observacoes" value="{{$pet->observacoes}}">
                    </div>
                </div>

                <div class="field is-grouped">
                    <div class="control">
                        <button class="button is-link">Salvar</button>
                        <button class="button is-link is-light" formaction="{{ route('home') }}">Cancelar</button>
                    </div>
                </div>
            </form>
        </div>
    </section>
@endsection
