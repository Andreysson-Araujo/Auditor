<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>@yield('title', 'Sistema Auditor')</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
<body>
    <header class="header-top">
        <div class="logo">Sistema Auditor</div>
        <nav class="navbar navbar-expand-lg navbar-light">
            <a href="{{ route('dashboard') }}">Dashboard</a>
            <a href="{{ route('relatorios.index') }}">Relatórios</a>
            <a href="{{ route('manifestacoes') }}">Manifestações</a>
            <form action="{{ route('logout') }}" method="POST" class="logout-form">
                @csrf
                <button  type="submit">Sair</button>
            </form>
        </nav>
    </header>

    <main>
        @yield('content')
    </main>
</body>
</html>
