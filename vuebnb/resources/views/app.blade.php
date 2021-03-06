<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Vuebnb</title>
    <link rel="stylesheet" href="{{asset('css/style.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('css/vue-style.css')}}" type="text/css">
    <script>
        window.dados_servidor = JSON.parse("{!! addslashes(json_encode($dados)) !!}");
        window.csrf_token = "{{ csrf_token() }}";
    </script>
</head>

<body>
    <div id="app"></div>

    <script src="{{asset('js/app.js')}}"></script>
</body>

</html>