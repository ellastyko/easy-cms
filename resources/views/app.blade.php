<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#000000" />
    <meta
        name="description"
        content="Easy cms"
    />

    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon"/>
    <link rel="apple-touch-icon" href="{{ asset('favicon.ico') }}" type="image/x-icon"/>

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    @vite(['resources/css/app.scss', 'resources/scss/app.scss'])
</head>
<body>
    <div id="app">
        <landing-page/>
    </div>
    @vite('resources/js/app.js')
    @yield('scripts')
</body>
</html>
