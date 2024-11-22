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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div id="app" class="d-flex flex-column">
        <!-- Barra de navegação superior -->
        <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
            <div class="container">
                <!-- Logo -->
                <a class="navbar-brand" href="{{ url('/') }}">
                    <h1>{{ config('app.name', 'RDO') }}</h1>
                </a>

                <!-- Perfil do Usuário no Canto Superior Direito -->
                @auth
                <div class="profile-container">
                    <button class="btn btn-secondary dropdown-toggle" id="profileDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        {{ Auth::user()->name }}
                    </button>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="profileDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            Logout
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </div>
                @endauth
            </div>
        </nav>

        <!-- Sidebar -->
        <nav class="sidebar bg-light shadow-sm">
            <button class="toggle-button" id="toggleSidebar">
                &times;
            </button>

            <div class="container py-4">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <h1>{{ config('app.name', 'RDO') }}</h1>
                </a>

                <!-- Botões da Sidebar -->
                @auth
                <div class="button-container d-flex flex-column">
                    <a href="{{ route('users.index') }}" class="btn btn-primary mb-2">Usuários</a>
                    <a href="{{ route('rdos.index') }}" class="btn btn-primary mb-2">RDOs</a>
                    <a href="{{ route('obras.index') }}" class="btn btn-primary mb-2">Obras</a>
                    <a href="{{ route('equipamentos.index') }}" class="btn btn-primary mb-2">Equipamentos</a>
                    <a href="{{ route('mao_obras.index') }}" class="btn btn-primary mb-2">Mão de Obra</a>
                </div>
                @endauth
            </div>
        </nav>

        <!-- Conteúdo Principal -->
        <main class="content flex-grow-1 py-4">
            @yield('content')
        </main>
    </div>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!-- Script para funcionalidade da Sidebar -->
    <script>
        // Alternar visibilidade da sidebar
        document.getElementById('toggleSidebar').addEventListener('click', function() {
            const sidebar = document.querySelector('.sidebar');
            const content = document.querySelector('.content');
            sidebar.classList.toggle('collapsed');
            content.classList.toggle('collapsed');
        });
    </script>
</body>

</html>