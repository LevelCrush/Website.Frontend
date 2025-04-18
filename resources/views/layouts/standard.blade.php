<!DOCTYPE html>
<html lang="en" data-mode="dark" class="dark">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>@yield('title')</title>

        <link rel="stylesheet" href="https://use.typekit.net/qle8kaw.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body>
        <header>
            <navbar class="navbar navbar-expand-lg bg-body-tertiary">
                <div class="container-fluid">
                    <h1 class="fs-1 align-middle m-0">
                        <button class="btn text-black p-0 fs-1 align-middle" type="button" data-bs-toggle="offcanvas" data-bs-target="#offCanvas" aria-controls="offCanvas">
                            <i class="bi bi-list"></i>
                        </button>
                        <span class="align-middle">@yield('brand.name', config('app.name'))</span>
                    </h1>
                </div>
            </navbar>

            @yield('main-navigation')
        </header>
        <main>
            @yield('content')
        </main>
        <footer>
            @yield('footer')
        </footer>
        <div class="offcanvas offcanvas-start" tabindex="-1" id="offCanvas" aria-labelledby="offCanvasLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title text-center fs-4 flex-grow-1" id="offCanvas">@yield('brand.name.offcanvas', config('app.name'))</h5>
            </div>
            <div class="offcanvas-body">
                <x-filament-menu-builder::menu slug="main-navigation" view="filament-menu-builder::components.offcanvas.menu"/>
            </div>
        </div>
    </body>
</html>
