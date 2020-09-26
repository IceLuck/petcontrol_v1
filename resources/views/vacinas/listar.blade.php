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
        <table class="table is-bordered is-striped is-fullwidth">
            <tr class="th is-selected">
                <th>Tipo</th>
                <th>Rótulo</th>
                <th>Data da Aplicação</th>
                <th>Data da Próxima Aplicação</th>
                <th><p class="has-text-centered">Ações</p></th>
            </tr>
            @foreach($vacinas as $vacina)
                <tr>
                    <td>{{ $vacina->tipo }}</td>
                    <td>{{ $vacina->rotulo }}</td>
                    <td>{{ $vacina->dataAplicacao }}</td>
                    <td>{{ $vacina->dataProximaAplicacao }}</td>
                    <td>
                        @auth
                            <div class="buttons is-centered">
                                <a href="/pets/{{$petId}}/vacinas/{{$vacina->id}}/edit"><input class="button is-primary is-rounded is-small" type="submit" value="Editar"></a>
                                <form method="post" action="/pets/{{$petId}}/vacinas/{{$vacina->id}}"
                                      onsubmit="return confirm('Tem certeza que deseja remover esta vacina?')">
                                    @csrf
                                    @method('DELETE')
                                    <input class="button is-danger is-rounded is-small" type="submit" value="Excluir">
                                </form>
                            </div>
                        @endauth
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection
