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
<h1 class="text-3xl text-center border-b-2 border-neutral-500 bg-neutral-800">Easis</h1>
<ul class="flex justify-center gap-4">
    <li><a href="{{ route('cdg') }}" class="underline hover:text-blue-300">Objets cdg</a></li>
</ul>
@section('content')
@show
</body>
</html>
