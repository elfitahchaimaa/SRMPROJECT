<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Réinitialisation du mot de passe</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome pour les icônes -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
         :root {
            --primary: #4e73df;
            --secondary: #858796;
            --success: #1cc88a;
            --bg-gradient: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }
        
        body {
            background: var(--bg-gradient);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Nunito', sans-serif;
        }
        
        .card {
            border-radius: 1rem;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
            backdrop-filter: blur(10px);
            background-color: rgba(255, 255, 255, 0.9);
            border: none;
            overflow: hidden;
        }
        
        .card-header {
            background-color: transparent;
            border-bottom: none;
            padding: 2rem 2rem 0;
        }
        
        .card-body {
            padding: 2rem;
        }
        
        .card-title {
            color: var(--primary);
            font-weight: 700;
            text-align: center;
            margin-bottom: 2rem;
            position: relative;
        }
        
        .card-title::after {
            content: "";
            position: absolute;
            bottom: -15px;
            left: 50%;
            transform: translateX(-50%);
            width: 50px;
            height: 4px;
            background: var(--bg-gradient);
            border-radius: 2px;
        }
        
        .form-control {
            border-radius: 0.5rem;
            padding: 0.75rem 1rem;
            font-size: 1rem;
            border: 2px solid #e0e0e0;
            transition: all 0.3s;
        }
        
        .form-control:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 0.25rem rgba(78, 115, 223, 0.25);
        }
        
        .input-group-text {
            border-radius: 0.5rem 0 0 0.5rem;
            border: 2px solid #e0e0e0;
            border-right: none;
            background-color: white;
        }
        
        .form-floating label {
            padding-left: 1rem;
        }
        
        .btn-primary {
            background: var(--bg-gradient);
            border: none;
            border-radius: 0.5rem;
            padding: 0.75rem 1.5rem;
            font-weight: 600;
            transition: all 0.3s;
            box-shadow: 0 4px 15px rgba(102, 126, 234, 0.4);
        }
        
        .btn-primary:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(102, 126, 234, 0.6);
        }
        
        .alert {
            border-radius: 0.5rem;
            border: none;
            animation: fadeIn 0.5s;
        }
        
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        .email-icon {
            color: var(--primary);
        }
        
        .logo-container {
            text-align: center;
            margin-bottom: 1rem;
        }
        
        .logo {
            width: 80px;
            height: 80px;
            background-color: var(--primary);
            border-radius: 50%;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 2rem;
            margin-bottom: 1rem;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-5">
                <div class="card">
                    <div class="card-header">
                        <div class="logo-container">
                            <div class="logo">
                                <i class="fas fa-lock"></i>
                            </div>
                        </div>
                        <h2 class="card-title">Mot de passe oublié</h2>
                    </div>
                    <div class="card-body">
                        @if (session('status'))
                        <div class="alert alert-success mb-4">
                            <i class="fas fa-check-circle me-2"></i> {{ session('status') }}
                        </div>
                        @endif

                        <p class="text-center text-muted mb-4">Entrez votre adresse email pour recevoir un lien de réinitialisation de mot de passe.</p>

                        <form method="POST" action="{{ route('password.email') }}">
                            @csrf
                            <div class="mb-4">
                                <div class="input-group">
                                    <span class="input-group-text">
                                        <i class="fas fa-envelope email-icon"></i>
                                    </span>
                                    <div class="form-floating flex-grow-1">
                                        <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
                                        <label for="email">Adresse email</label>
                                    </div>
                                </div>
                            </div>

                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-paper-plane me-2"></i> Envoyer le lien de réinitialisation
                                </button>
                            </div>

                            <div class="text-center mt-4">
                                <a href="http://127.0.0.1:8000/login" class="text-decoration-none text-secondary">
                                    <i class="fas fa-arrow-left me-1"></i> Retour à la connexion
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JavaScript Bundle avec Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>