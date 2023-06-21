<!-- resources/views/layouts/app.blade.php -->
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    @yield('styles')

    <link rel="stylesheet" href="css/app.css">

    <title>@yield('title') - Presensi DDD</title>

</head>

<body>

    <div class="col-lg-8 mx-auto p-3 py-md-5">
        <header class="align-items-center pb-3 mb-5 border-bottom">
            <div class="row">
                <div class="col-9">
                    <a href="/" class="text-dark text-decoration-none">
                        <span class="fs-4">@yield('title')</span>
                    </a>
                </div>
                <div class="col-2 d-flex justify-content-end">
                    <a href="{{ route('logout') }}"
                        onclick="event.preventDefault(); document.getElementById('frm-logout').submit();">
                        <h4><i class="bi bi-power"></i></h4>
                    </a>
                    <form id="frm-logout" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </div>
            </div>
        </header>

        <main>
            @yield('content')
        </main>

        <!-- footer class="footer mt-auto p-3">
                <span class="text-muted">Created by Rizky Januar Akbar &middot; &copy; 2021</span>
            </footer -->

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    @yield('scripts')
</body>

</html>
