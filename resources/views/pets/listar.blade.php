@extends('layout')

@section('botaoCadastro')
    @auth
        <a href="/pets/create" class="btn btn-dark mb-2"><h5>Novo Pet</h5></a>
    @endauth
@endsection

@section('cabecalho')
    Meus Pets
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
                <th>Nome</th>
                <th>Tipo</th>
                <th>Raça</th>
                <th>Cor</th>
                <th>Sexo</th>
                <th>Nascimento</th>
                <th><p class="has-text-centered is-3">Ações</p></th>
            </tr>
            @foreach($pets as $pet)
                <tr>
                    <td>{{ $pet->nome }}</td>
                    <td>{{ $pet->tipo }}</td>
                    <td>{{ $pet->raca }}</td>
                    <td>{{ $pet->cor }}</td>
                    <td>{{ $pet->sexo }}</td>
                    <td>{{ $pet->dataNascimento }}</td>
                    <td>
                        <div class="buttons is-centered">
                            @auth
                            <a href="/pets/{{$pet->id}}/edit"><input class="button is-primary is-rounded is-small" type="submit" value="Editar"></a>
                            <form method="post" action="/pets/{{$pet->id}}"
                                  onsubmit="return confirm('Tem certeza que deseja remover o pet: {{ $pet->nome }}?')">
                                @csrf
                                @method('DELETE')
                                <input class="button is-danger is-rounded is-small" type="submit" value="Excluir">
                            </form>
                            @endauth
                            <a href="/pets/{{$pet->id}}/vacinas"><input class="button is-link is-rounded is-small" type="submit" value="Vacinas"></a>
                        </div>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection
