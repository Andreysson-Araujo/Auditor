<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>
</head>
<body>
    <h1>Bem vindo ao Auditor, {{Auth::user()->name}}!</h1>
    <form method="POST" action="{{route('login')}}">
        @csrf
        <button type="submit">Logout</button>
    </form>
</body>
</html>