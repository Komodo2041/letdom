<!DOCTYPE html>
<html lang="pl" data-theme="light">

<head>
    <title>Projekt - Domino</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="color-scheme" content="dark">


    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="{{URL::asset('css/style.css')}}" />

</head>

<body>
    <div class="container">

        @if (session('success'))
        <div class="success" style="white-space: pre-line;">
            {{ session('success') }}
        </div>
        @endif
        @if (session('error'))
        <div class="error">
            {{ session('error') }}
        </div>
        @endif



        <div id="content">
            @yield("content")
        </div>




    </div>

    <script src="{{URL::asset('js/main.js')}}"></script>

</body>

</html>