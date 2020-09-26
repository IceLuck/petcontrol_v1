@extends('layout')

@section('botaoCadastro')
    @auth
        <a href="/pets/{{$petId}}/vacinas/create" class="btn btn-dark mb-2"><h5>Nova Vacina</h5></a>
    @endauth
@endsection

@section('cabecalho')
    Pet: {{$petNome}}/Vacinas
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
            <form method="post" action="/pets/{{$petId}}/vacinas/{{$vacina->id}}">
                @csrf
                @method('PUT')
                <div class="field">
                    <label class="label">Tipo</label>
                    <div class="control">
                        <div class="select">
                            <select id="tipo" name="tipo">
                                <option value="Antiviral" {{$vacina->tipo == 'Antiviral' ? 'selected' : ''}}>Antiviral</option>
                                <option value="Raiva" {{$vacina->tipo == 'Raiva' ? 'selected' : ''}}>Raiva</option>
                                <option value="Outras" {{$vacina->tipo == 'Outras' ? 'selected' : ''}}>Outras</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="field">
                    <label class="label">Rótulo</label>
                    <div class="control">
                        <input class="input" type="text" placeholder="Nome e Laboratório" id="rotulo" name="rotulo" value="{{$vacina->rotulo}}">
                    </div>
                </div>

                <div class="field">
                    <label class="label">Data da Aplicação</label>
                    <div class="control">
                        <input class="input" type="text" placeholder="dd/mm/aaaa" id="dataAplicacao" name="dataAplicacao" value="{{$vacina->dataAplicacao}}">
                    </div>
                </div>

                <div class="field">
                    <label class="label">Data Próxima Aplicação</label>
                    <div class="control">
                        <input class="input" type="text" placeholder="dd/mm/aaaa" id="dataProximaAplicacao" name="dataProximaAplicacao" value="{{$vacina->dataProximaAplicacao}}">
                    </div>
                </div>

                <div class="field is-grouped">
                    <div class="control">
                        <button class="button is-link">Salvar</button>
                        <a href="/pets/{{$petId}}/vacinas"><input class="button is-link is-light" value="Cancelar"></a>
                    </div>
                </div>
            </form>
        </div>
    </section>
@endsection
