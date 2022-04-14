<!DOCTYPE html>
<html>
    <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link href="{{ asset('css/tailwind.min.css') }}" rel="stylesheet">
      @yield('css')
    </head>
    <body class="h-screen flex flex-col divide-y-2" id="app">
      <div class="w-full h-20 px-5 flex items-center text-2xl">
        <h1 class="font-serif text-gray-700">
          @yield('cabecera')
        </h1>
      </div>
      @yield('cuerpo')
      @yield('js')
    </body>
</html>
