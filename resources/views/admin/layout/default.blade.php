<!DOCTYPE html>
<html :class="{ 'theme-dark': dark }" x-data="data()" lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>admin Dashboard</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap"
        rel="stylesheet" />
        <link href="{{ asset('css/tailwind.output.css') }}" rel="stylesheet">
    {{-- <link rel="stylesheet" href="./assets/css/tailwind.output.css" /> --}}
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <script src={{ asset('js/init-alpine.js') }}></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js" defer></script>
    <script src={{ asset('js/charts-lines.js') }} defer></script>
    <script src={{ asset('js/charts-pie.js')}} defer></script>
</head>
<script>
    console.log(window.location.pathname);
</script>
<body>
@yield('content')
</body>

</html>