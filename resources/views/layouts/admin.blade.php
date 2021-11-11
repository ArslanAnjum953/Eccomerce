<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    {{-- fonts and icons --}}
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700%7CRoboto+Slab:400,700%7CMaterial+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
    <!-- Styles -->
    <link href="{{ url('css/app.css') }}" rel="stylesheet">
    <link href="{{ url('Admin/css/material-dashboard.css') }}" rel="stylesheet">
    <link href="{{ url('Admin/css/custom.css') }}" rel="stylesheet">
</head>
<body>
    <div class="wrapper ">
        @include('layouts.inc.sidebar')
        <div class="main-panel">
        @include('layouts.inc.adminnav')
        <div class="content">
            @yield('content')
        </div>
        @include('layouts.inc.adminfooter')
        </div>
    </div>
     <!-- Scripts -->
     <script src="{{ url('Admin/js/jquery.min.js') }}" defer></script>
     <script src="{{ url('Admin/js/popper.min.js') }}" defer></script>
     <script src="{{ url('Admin/js/bootstrap-material-design.min.js') }}" defer></script>
     <script src="{{ url('Admin/js/perfect-scrollbar.jquery.min.js') }}" defer></script>
     <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
     @if (session('status'))
     <script>
         swal("{{session('status')}}");
     </script>
         
     @endif
   @yield('scripts')  
</body>
</html>