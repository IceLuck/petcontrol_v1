<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no,initial-scale=1.0,
                maximum-scale=1.0, minimum-scale=.10">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PetControl</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.0/css/bulma.min.css">
</head>
<body>
    <section class="hero is-small is-light">
        <div class="hero-body">
            <div class="container">
                <h1 class="title">
                    <a href="/home" class="btn btn-dark mb-2">PetControl</a>
                </h1>

                <div class="navbar-menu">
                    <h2 class="subtitle">
                        @yield('cabecalho')
                    </h2>
                    <div class="navbar-end">
                        @guest
                            <a class="navbar-item">
                                <a href="/" class="btn btn-dark mb-2"><h5>Login</h5></a>
                            </a>
                        @endguest
                        @auth
                            <a class="navbar-item">
                                @yield('botaoCadastro')
                            </a>
                            <a class="navbar-item">
                                <a href="/logout" class="btn btn-dark mb-2"><h5>Logout</h5></a>
                            </a>
                        @endauth
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div>
        @yield('conteudo')
    </div>
</body>
<footer class="footer">
    <div class="content has-text-centered">
        <p>
            Projeto desenvolvido por Luciano Henrique Albano - Pós Graduação de Desenvolvimento Web e Mobile - IFPR-Pinhais
        </p>
    </div>
</footer>
</html>
