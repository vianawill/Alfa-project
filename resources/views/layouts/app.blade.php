<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'RDO') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/sidebar.css') }}" rel="stylesheet">
    <link href="{{ asset('css/home.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div id="app">
        <!-- Botão para abrir/fechar a sidebar -->
        <button id="sidebarToggle" class="btn btn-primary sidebar-toggle-btn">Menu</button>
        
        <!-- Sidebar -->
        <div id="sidebar" class="sidebar">
            <h1 class="sidebar-header">{{ config('app.name', 'RDO') }}</h1>

            <!-- Links de navegação - visível somente se logado -->
            @auth
                <div class="button-container">
                    <a href="{{ route('users.index') }}" class="btn btn-link">Usuários</a>
                    <a href="{{ route('rdos.index') }}" class="btn btn-link">RDOs</a>
                    <a href="{{ route('obras.index') }}" class="btn btn-link">Obras</a>
                    <a href="{{ route('equipamentos.index') }}" class="btn btn-link">Equipamentos</a>
                    <a href="{{ route('mao_obras.index') }}" class="btn btn-link">Mão de obra</a>
                </div>
            @endauth

            <!-- Links de autenticação -->
            <div class="auth-links">
                @guest
                    @if (Route::has('login'))
                        <a class="btn btn-link" href="{{ route('login') }}">Login</a>
                    @endif
                    @if (Route::has('register'))
                        <a class="btn btn-link" href="{{ route('register') }}">Cadastrar</a>
                    @endif
                @else
                    <a class="btn btn-link" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
                        Logout
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                @endguest
            </div>
        </div>

        <!-- Conteúdo principal -->
        <div class="content">
            <main class="py-4">
                @yield('content')
            </main>
        </div>
    </div>
</body>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const sidebarToggle = document.getElementById("sidebarToggle");
        const sidebar = document.getElementById("sidebar");
        const content = document.querySelector(".content");

        sidebarToggle.addEventListener("click", function() {
            sidebar.classList.toggle("active");
            content.classList.toggle("sidebar-open");
        });
    });
</script>

</html>
