<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
   @include('includes.head')
</head>
<body>
    <div id="app">
      
        <header class="row">
       @include('includes.Newuser')
   </header>
        <main class="py-4">
            @yield('content')
        </main>
        <header class="row">
       @include('includes.footer')
   </header>
    </div>



</body>
</html>
