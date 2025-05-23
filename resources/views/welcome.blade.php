<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Sistema Auditor</title>
    <link rel="stylesheet" href="{{ asset('css/menu.css') }}">
</head>
<body>
    <div class="login-container">
        <h1>Sistema Auditor</h1>

        @if($errors->any())
            <div class="msg_E">
                @foreach ($errors->all() as $error)
                    <p>{{$error}}</p>
                @endforeach
            </div>
        @endif
        <form method="POST" action="{{route('login')}}">
            @csrf
            <label for="email">E-mail</label>
            <input type="email" name="email" id="email" required>

            <label for="password">Senha</label>
            <input type="password" name="password" id="password" required>

            <button type="submit">Entrar</button>
        </form>

        <div class="footer">
            &copy; {{ date('Y') }} Sistema de Gestão
        </div>
    </div>
</body>
</html>
