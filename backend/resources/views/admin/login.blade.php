<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Connexion - GHINA CARS</title>
    <style>
        body { background-color: #272435; height: 100vh; display: flex; align-items: center; }
        .login-card { background: white; padding: 2rem; border-radius: 15px; width: 100%; max-width: 400px; }
        .btn-navy { background-color: #272435; color: white; }
        .btn-navy:hover { background-color: #3d3950; color: white; }
    </style>
</head>
<body>
    <div class="container d-flex justify-content-center">
        <div class="login-card shadow-lg">
            <h3 class="text-center fw-bold mb-4">ADMIN LOGIN</h3>
            
            @if($errors->any())
                <div class="alert alert-danger small">{{ $errors->first() }}</div>
            @endif

            <form action="{{ route('login.submit') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" required>
                </div>
                <div class="mb-4">
                    <label class="form-label">Mot de passe</label>
                    <input type="password" name="password" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-navy w-100 fw-bold">Se Connecter</button>
            </form>
        </div>
    </div>
</body>
</html>