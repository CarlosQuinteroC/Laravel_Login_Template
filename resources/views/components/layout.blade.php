<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>App Name - @yield('title')</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>

{{--Nav bar--}}
@include('components.navbar')  {{-- Put your navbar here --}}
{{-- Sidebar --}}
 @include('components.sidebar')
{{--Content--}}
    @include('components.content')


</body>
</html>


