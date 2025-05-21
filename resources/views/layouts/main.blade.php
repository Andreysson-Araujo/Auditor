<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title')</title>

        <!-- Fonte do Google -->
        <link href="https://fonts.googleapis.com/css2?family=Roboto" rel="stylesheet">

        <!-- CSS Bootstrap -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

        <!-- CSS da aplicação -->
        <link rel="stylesheet" href="/css/styles.css">
        <script src="/js/scripts.js"></script>
    </head>
    <body>
      <header>
        <nav class="navbar navbar-expand-lg navbar-light">
          <div class="collapse navbar-collapse" id="navbar">
            <a href="/welcome" class="navbar-brand">
              <img src="/img/logoOrganize.png" alt="THE QUESTION">
            </a>
           
          </div>
        </nav>
      </header>
      <main>
        <div class="container-fluid">
          <div class="row">
              @if(session('msg'))
                  <p class="msg text-success">{{ session('msg') }}</p>
              @endif
      
              @if(session('msg_e'))
                  <p class="msg_e">{{ session('msg_e') }}</p>
              @endif
      
              @yield('content')
          </div>
      </div>
      
      </main>
      <footer>
        <p>Detin &copy; 2025</p>
      </footer>
    </body>
</html>