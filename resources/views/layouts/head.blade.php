<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Attestations') }}</title>
<link rel="shortcut icon" type="image/png" href="{{ asset('assets/favicon.png') }}" />

    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            content: [
                "./resources/**/*.blade.php",
                "./resources/**/*.js",
                "./resources/**/*.vue",
            ],
            theme: {
                fontFamily: {
                'sans': ['Montserrat'],
                },
                extend: {
                colors: {
                    "footer-bg": "#02213d",
                    "telecharger-bg": "#0079fe",
                    "reclamer-bg": "#007afe",
                    "left": "#3473b3",
                    "right": "#3693f4",
                    "bg-two": "#f8f9fb",
                },
                },
            },
        }
    </script>

    <!-- Scripts -->
    @vite('resources/css/app.css')
</head>

<body class="font-['Montserrat'] antialiased bg-white">