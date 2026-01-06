<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>@yield('title', 'Sistema Auditor')</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
<body>
    <header class="header-top">
        <div class="logo">Sistema Auditor</div>
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="navbar-nav">
                <a class="nav-link" href="{{ route('dashboard') }}">Dashboard</a>
                <a class="nav-link" href="{{ route('relatorios.index') }}">Relatórios</a>
                <a class="nav-link" href="{{ route('manifestacoes') }}">Manifestações</a>

                <div class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Configurações
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('perguntas.index') }}">Perguntas</a>
                        <a class="dropdown-item" href="{{ route('usuarios.index') }} ">Usuários</a>
                    </div>
                </div>

                <form action="{{ route('logout') }}" method="POST" class="logout-form d-inline">
                    @csrf
                    <button class="btn btn-link nav-link" type="submit">Sair</button>
                </form>
            </div>
        </nav>
    </header>

    <main>
        @yield('content')
    </main>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>