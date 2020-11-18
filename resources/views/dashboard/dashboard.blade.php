<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="mobile-web-app-capable" content="yes">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Messy Bessy') }}</title>

    <!-- Scripts -->

    <!-- Core plugin JavaScript-->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js" defer></script>

    <script src="{{ asset('js/dashboard.min.js')}}" defer></script>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/messy.js') }}" defer></script>
    <script src="{{ asset('js/main.js') }}" defer></script>

    <!-- App Icons-->

    <link rel="apple-touch-icon" href="{{ asset('storage/appicon/ios/AppIcon.appiconset/Icon-App-60x60@2x.png') }}" />
    <link rel="apple-touch-icon" sizes="58x58" href="{{ asset('storage/appicon/ios/AppIcon.appiconset/Icon-App-29x29@2x.png') }}" />
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('storage/appicon/ios/AppIcon.appiconset/Icon-App-76x76@1x.png') }}" />
    <link rel="apple-touch-icon" sizes="152x152" href="{{ asset('storage/appicon/ios/AppIcon.appiconset/Icon-App-76x76@2x.png') }}" />
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('storageappicon//ios/AppIcon.appiconset/Icon-App-60x60@3x.png') }}" />
    <link rel="shortcut icon" href="{{ asset('storage/appicon/favicon.ico') }}" type="image/x-icon">  

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;700;900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/dashboard2.css') }}" rel="stylesheet">

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous" defer></script>

</head>

<body>
    <div id="app">
        <div class="dashboard">
            @livewire('dashboard.header-menu')
            <div class="content relative" style="padding-top: 106px; height: 100%;">
                @yield('content')
                @livewireScripts
            </div>
        </div>
        <div class="sidebar-wrapper" hidden="">
            @include('dashboard.sidebar')     
        </div>
        <div class="main-content">
            <div class="dashboard-content">
                @livewire('dashboard.header')
            </div>
        </div>
    </div>
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>;
        windows.addEventListener('openDeleteModal', event = {
            $('#deleteProduct').modal('show');
        });
        windows.addEventListener('closeDeleteModal', event = {
            $('#deleteProduct').modal('hide');
        });
    </script>

</body>
</html>