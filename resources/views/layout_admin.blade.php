<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $judul ?? 'Admin' }}</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/admin.css') }}">
</head>
<body>
    <div class="wrapper">
        <!-- header -->
        @include('template.admin_header')
        <!-- header -->

        <div class="isi">
            <!-- sidebar -->
            @include('template.admin_sidebar')
            <!-- sidebar -->

            <!-- content -->
            <main class="content">
                @yield('content')
            </main>
            <!-- content -->
        </div>
    </div>
</body>
</html>