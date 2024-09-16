<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Site do Quim</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous" defer>
    </script>
    <link rel="stylesheet" href="resources/css/style.css" />
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('main.index') }}">
                <img src=" {{ asset('/images/logo.png') }}" style="height: 64px"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0" style="text-transform: uppercase; font-size: 9pt">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('main.index') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('users.add') }}">Add user</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('users.all') }}">All users</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('tasks.add') }}">Add task</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('tasks.all') }}">All tasks</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('dashboard.home') }}">Backoffice</a>
                    </li>
                </ul>
            </div>
            @if (Route::has('login'))
                <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
                    @auth
                        <a href="{{ url('/home') }}"
                            class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Home</a>
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-danger">Logout</button>
                        </form>
                    @else
                        <a href="{{ route('login') }}"
                            class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log
                            in</a>

                        @if (Route::has('users.add'))
                            <a href="{{ route('users.add') }}"
                                class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Registar</a>
                        @endif
                    @endauth
                </div>
            @endif
        </div>
    </nav>

    <div class="container">

        <!-- Indica que a secção content deve aparecer aqui -->
        @yield('content')

    </div>

    <div class="container fixed-bottom" style="background-color:#ffffff; z-index: 9999">
        <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
            <p class="col-md-4 mb-0 text-body-secondary" style="text-transform: uppercase; font-size: 9pt">&copy; 2024
                Quim</p>

            <a href="/"
                class="col-md-4 d-flex align-items-center justify-content-center mb-3 mb-md-0 me-md-auto link-body-emphasis text-decoration-none">
                <svg class="bi me-2" width="40" height="32">
                    <use xlink:href="#bootstrap" />
                </svg>
            </a>

            <ul class="nav col-md-4 justify-content-end" style="text-transform: uppercase; font-size: 9pt">
                <li class="nav-item"><a href="{{ route('main.index') }}"
                        class="nav-link px-2 text-body-secondary">Home</a></li>
                <li class="nav-item"><a href="{{ route('users.add') }}" class="nav-link px-2 text-body-secondary">Add
                        user</a></li>
                <li class="nav-item"><a href="{{ route('users.all') }}" class="nav-link px-2 text-body-secondary">All
                        users</a></li>
                <li class="nav-item"><a href="{{ route('tasks.add') }}" class="nav-link px-2 text-body-secondary">Add
                        task</a></li>
                <li class="nav-item"><a href="{{ route('tasks.all') }}" class="nav-link px-2 text-body-secondary">All
                        tasks</a></li>

            </ul>
        </footer>
    </div>

</body>

</html>
