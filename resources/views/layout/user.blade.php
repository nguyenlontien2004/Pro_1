<!DOCTYPE html>
<html lang="en">

<head>
    @include('user.partials.head')
</head>

<body>

    <header>
        <div class="header-top ">
            @include('user.partials.header-top')
        </div>

        <div class="header-bottom">
            @include('user.partials.header-buttom')
        </div>
    </header>

    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class=" text-center text-lg-start">
        @include('user.partials.footer')
    </footer>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
