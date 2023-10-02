<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}" />
  <title>---</title>
 
  <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
  
</head>

<body>
  @if (Auth::check())
  <script>
    // Для проверки авторизован пользователь на сервере или нет
    window.isLoggedin = true;
  </script>
  @endif


  <div id="app"></div>
  @vite('resources/js/app.js')
</body>

</html>