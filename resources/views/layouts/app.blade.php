<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Yellow AdminLTE Dashboard')</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
    @include('layouts.styles')
    @yield('additional_styles')
</head>
<body>
    <div class="wrapper">
        @include('layouts.sidebar')

        <!-- Main Content -->
        <div class="content-wrapper">
            @include('layouts.navbar')

            <!-- Main content -->
            <main class="content">
                @yield('content')
            </main>
        </div>
    </div>

    @include('layouts.scripts')
    @yield('additional_scripts')
</body>
</html>