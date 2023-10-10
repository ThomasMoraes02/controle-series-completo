<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }} - Controle de Séries</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-3">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('series.index') }}">Home</a>

            {{-- Só mostra se existir usuário ativo na sessão --}}
            {{-- @auth
                <a href="{{ route('logout') }}" class="navbar-brand">Sair</a>
            @endauth --}}
            
            @auth
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <a href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();"  class="navbar-brand">{{ __('Log Out') }}</a>
            </form>
            @endauth

            {{-- Caso não exista usuário logado --}}
            @guest
                <a href="{{ route('login') }}" class="navbar-brand">Entrar</a>
            @endguest
        </div>
    </nav>

    <div class="container">
        <h1>{{ $title }}</h1>

        @isset($successMessage)
            <div class="alert alert-success">
                {{ $successMessage }}
            </div>
        @endisset

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{ $slot }}
    </div>

</body>
<script src="{{ mix('js/app.js') }}"></script>

</html>
