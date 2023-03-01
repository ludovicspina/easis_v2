<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://cdn.tailwindcss.com"></script>

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet"/>

</head>
<body class="antialiased bg-neutral-900 text-neutral-300">
<h1 class="text-3xl text-center border-b-2 border-neutral-500 bg-neutral-800"><a href="{{ route('home') }}">Easis</a></h1>
<ul class="flex justify-center flex-col items-center sm:flex-row gap-1 sm:gap-4">
    <li><a href="{{ route('cdg') }}" class="underline hover:text-blue-300">Objets cdg</a></li>
    @if (!Auth::check())
    <li><a href="{{ route('login') }}" class="underline hover:text-blue-300">Connexion</a></li>
    <li><a href="{{ route('register') }}" class="underline hover:text-blue-300">Inscription</a></li>
    @endif
    @if (Auth::check())
    <li><a href="{{ route('profile.show') }}" class="underline hover:text-blue-300">Profil utilisateur</a></li>
    <li><form method="POST" action="{{ route('logout') }}">
            @csrf
            <button class="underline hover:text-blue-300" type="submit">Déconnexion</button>
        </form></li>
    @endif
</ul>
@section('content')
@show
</body>
</html>
