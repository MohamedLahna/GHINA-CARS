<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - GHINA CARS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .sidebar {
            background: #343047;
            color: white;
            min-height: 100vh;
        }

        .nav-link {
            color: rgba(255, 255, 255, 0.8);
            border-radius: 5px;
            margin-bottom: 5px;
        }

        .nav-link:hover,
        .nav-link.active {
            background: #b88938;
            color: white;
        }

        .text-orange {
            color: #b88938;
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .sidebar {
                min-height: auto;
                padding: 10px;
            }
        }
    </style>
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <nav class="col-md-3 col-lg-2 d-md-block sidebar py-3 shadow">
                <h4 class="text-orange fw-bold text-center mb-4">GHINA CARS</h4>
                <hr class="bg-light">
                <div class="nav flex-column">
                    <a href="{{ route('admin.cars.index') }}"
                        class="nav-link {{ request()->routeIs('admin.cars.index') ? 'active' : '' }}">
                        Gestion de Flotte
                    </a>
                    <a href="{{ route('admin.marques.index') }}"
                        class="nav-link {{ request()->routeIs('admin.marques.index') ? 'active' : '' }}">
                        Gestion des marques
                    </a>
                    <a href="{{ route('admin.cars.create') }}"
                        class="nav-link {{ request()->routeIs('admin.cars.create') ? 'active' : '' }}">
                        Ajouter une voiture
                    </a>
                    <a href="{{ route('admin.marques.create') }}"
                        class="nav-link {{ request()->routeIs('admin.marques.create') ? 'active' : '' }}">
                        Ajouter une marque
                    </a>
                    
                    <form action="{{ route('logout') }}" method="POST" class="p-3">
                        @csrf
                        <button type="submit" class="btn btn-sm btn-danger w-100">Déconnexion</button>
                    </form>
                </div>
            </nav>

            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 py-4">
                @yield('content')
            </main>
        </div>
    </div>
</body>

</html>
