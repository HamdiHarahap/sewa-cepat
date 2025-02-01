<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$title}}</title>
    @vite(['resources/css/app.css', 'resources/js/main.js'])
</head>
<body class="bg-zinc-100">
    @unless (request()->routeIs('booking'))
        <x-header></x-header>
    @endunless

    <main>
        {{$slot}}
    </main>

    @unless (request()->routeIs('booking'))
        <x-footer></x-footer>
    @endunless
</body>
</html>