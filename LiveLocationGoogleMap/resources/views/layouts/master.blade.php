<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>
        Laramap
    </title>

    </meta>
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
</head>

<body>
    @yield('content')
    <script crossorigin="anonymous" integrity="sha256-cCueBR6CsyA4/9szpPfrX3s49M9vUU5BgtiJj06wt/s="
        src="https://code.jquery.com/jquery-3.1.0.min.js"></script>
    {{-- Google map api  --}}

    <script async="" defer=""
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDTZeMegMGC7e7qOAO36yRGjPmuMjsdXw4&libraries=places"></script>

    <script src="{{ asset('js/script.js') }}"></script>
    <script src="{{ asset('js/ajaxsearch.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>

    @yield('js')

</body>

</html>
