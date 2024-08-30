<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PMS</title>
    @include('layout.links')
    @yield('css')
</head>
<body>
    @include('layout.navbar')
    
    <div class="main-content">
        @yield('content')
    </div>

    @include('layout.footer')

    @include('layout.script')
</body>
</html>