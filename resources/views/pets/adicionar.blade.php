@extends('layout')

@section('botaoCadastro')
    @auth
        <a href="/pets/create" class="btn btn-dark mb-2"><h5>Novo Pet</h5></a>
    @endauth
@endsection

@section('cabecalho')
    Cadastrar Novo Pet
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
                    <label class="label">Nome</label>
                    <div class="control">
                        <input class="input" type="text" placeholder="Nome do pet" id="nome" name="nome">
                    </div>
                </div>

                <div class="field">
                    <label class="label">Tipo</label>
                    <div class="control">
                        <div class="select">
                            <select id="tipo" name="tipo">
                                <option>Escolha uma opção</option>
                                <option>Cão</option>
                                <option>Gato</option>
                                <option>Outros</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="field">
                    <label class="label">Raça</label>
                    <div class="control">
                        <input class="input" type="text" placeholder="Raça do pet" id="raca" name="raca">
                    </div>
                </div>

                <div class="field">
                    <label class="label">Cor</label>
                    <div class="control">
                        <input class="input" type="text" placeholder="Cor da pelagem" id="cor" name="cor">
                    </div>
                </div>

                <div class="field">
                    <label class="label">Tipo</label>
                    <div class="control">
                        <div class="select">
                            <select id="sexo" name="sexo">
                                <option>Escolha uma opção</option>
                                <option>Macho</option>
                                <option>Fêmea</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="field">
                    <label class="label">Data de Nascimento</label>
                    <div class="control">
                        <input class="input" type="text" placeholder="dd/mm/aaaa" id="dataNascimento" name="dataNascimento">
                    </div>
                </div>

                <div class="field">
                    <label class="label">Observações</label>
                    <div class="control">
                        <input class="input" type="text" placeholder="Observações importantes sobre o pet" id="observacoes" name="observacoes">
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
