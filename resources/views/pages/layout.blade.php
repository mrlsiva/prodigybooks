<!doctype html>
<html>
<head>
   @include('includes.head')
</head>
<body>
<div class="container-fluid">
   <header class="row">
       @include('includes.header')
   </header>
   <main class="py-4">
            @yield('content')
        </main>
   <footer class="row footerdesign">
       @include('includes.footer')
   </footer>
</div>
</body>
</html>