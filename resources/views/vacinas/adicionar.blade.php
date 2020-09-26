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
            <form method="post">
                @csrf
                <div class="field">
                    <label class="label">Tipo da Vacina</label>
                    <div class="control">
                        <div class="select">
                            <select id="tipo" name="tipo">
                                <option>Escolha uma opção</option>
                                <option>Antiviral</option>
                                <option>Raiva</option>
                                <option>Outras</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="field">
                    <label class="label">Rótulo</label>
                    <div class="control">
                        <input class="input" type="text" placeholder="Nome e Laboratório" id="rotulo" name="rotulo">
                    </div>
                </div>

                <div class="field">
                    <label class="label">Data da Aplicação</label>
                    <div class="control">
                        <input class="input" type="text" placeholder="dd/mm/aaaa" id="dataAplicacao" name="dataAplicacao">
                    </div>
                </div>

                <div class="field">
                    <label class="label">Data Próxima Aplicação</label>
                    <div class="control">
                        <input class="input" type="text" placeholder="dd/mm/aaaa" id="dataProximaAplicacao" name="dataProximaAplicacao">
                    </div>
                </div>

                <div class="field is-grouped">
                    <div class="control">
                        <button class="button is-link">Salvar</button>
                        <button class="button is-link is-light" formaction="/pets/{{$petId}}/vacinas">Cancelar</button>
                    </div>
                </div>
            </form>
        </div>
    </section>
@endsection
