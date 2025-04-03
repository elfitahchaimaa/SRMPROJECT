<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Connexion - SRM</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
    <style>
        :root {
            --primary-color: #4361ee;
            --secondary-color: #3f37c9;
            --accent-color: #4895ef;
            --light-color: #f8f9fa;
            --dark-color: #212529;
            --success-color: #4caf50;
            --danger-color: #f44336;
            --warning-color: #ff9800;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f5f7fa;
            margin: 0;
            padding: 0;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .login-container {
            display: flex;
            width: 1000px;
            height: 600px;
            background-color: white;
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
        }

        /* Côté gauche - Branding */
        .brand-side {
            width: 50%;
            background-color: var(--primary-color);
            color: white;
            position: relative;
            display: flex;
            flex-direction: column;
            padding: 3rem;
            justify-content: space-between;
            overflow: hidden;
        }

        .brand-pattern {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            opacity: 0.1;
            background-image: url("data:image/svg+xml,%3Csvg width='100' height='100' viewBox='0 0 100 100' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M11 18c3.866 0 7-3.134 7-7s-3.134-7-7-7-7 3.134-7 7 3.134 7 7 7zm48 25c3.866 0 7-3.134 7-7s-3.134-7-7-7-7 3.134-7 7 3.134 7 7 7zm-43-7c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zm63 31c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zM34 90c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zm56-76c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zM12 86c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm28-65c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm23-11c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm-6 60c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm29 22c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zM32 63c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm57-13c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm-9-21c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM60 91c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM35 41c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM12 60c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2z' fill='%23ffffff' fill-opacity='1' fill-rule='evenodd'/%3E%3C/svg%3E");
        }

        .brand-circles {
            position: absolute;
            width: 300px;
            height: 300px;
            border-radius: 50%;
            background: radial-gradient(circle, var(--accent-color) 0%, rgba(255,255,255,0) 70%);
            bottom: -150px;
            right: -150px;
            opacity: 0.2;
        }

        .brand-logo {
            z-index: 1;
        }

        .brand-tkh {
            display: flex;
            align-items: center;
            margin-bottom: 1rem;
        }

        .brand-icon {
            background-color: white;
            color: var(--primary-color);
            width: 40px;
            height: 40px;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 12px;
            font-size: 1.2rem;
        }

        .brand-title {
            font-size: 2rem;
            font-weight: 700;
            margin: 0;
        }

        .brand-subtitle {
            font-size: 1rem;
            font-weight: 300;
            opacity: 0.8;
            margin-top: 0;
        }

        .features-list {
            z-index: 1;
        }

        .feature-item {
            display: flex;
            align-items: center;
            margin-bottom: 1.5rem;
        }

        .feature-icon {
            background-color: rgba(255, 255, 255, 0.1);
            width: 36px;
            height: 36px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 12px;
        }

        .feature-text {
            font-weight: 400;
        }

        /* Côté droit - Formulaire */
        .form-side {
            width: 50%;
            padding: 3rem;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .welcome-header {
            margin-bottom: 2rem;
            text-align: center;
        }

        .welcome-title {
            font-size: 1.8rem;
            font-weight: 600;
            color: var(--dark-color);
            margin-bottom: 0.5rem;
        }

        .welcome-text {
            color: #6c757d;
            margin-top: 0;
        }

        .alert {
            display: flex;
            align-items: center;
            margin-bottom: 1.5rem;
            padding: 12px 16px;
            border-radius: 8px;
            background-color: #FEE2E2;
            border: 1px solid #FCA5A5;
        }

        .alert-danger {
            color: #B91C1C;
        }

        .alert-icon {
            margin-right: 10px;
            font-size: 1.2rem;
        }

        .input-wrapper {
            position: relative;
            margin-bottom: 1.5rem;
        }

        .input-icon {
            position: absolute;
            top: 50%;
            left: 16px;
            transform: translateY(-50%);
            color: #6c757d;
        }

        .form-input {
            width: 100%;
            padding: 12px 16px 12px 45px;
            border: 1px solid #dee2e6;
            border-radius: 8px;
            font-size: 0.95rem;
            transition: border-color 0.2s;
        }

        .form-input:focus {
            outline: none;
            border-color: var(--primary-color);
            box-shadow: 0 0 0 4px rgba(67, 97, 238, 0.1);
        }

        .remember-forgot {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1.5rem;
        }

        .custom-checkbox {
            display: flex;
            align-items: center;
            position: relative;
            cursor: pointer;
            user-select: none;
        }

        .custom-checkbox input {
            position: absolute;
            opacity: 0;
            cursor: pointer;
            height: 0;
            width: 0;
        }

        .checkmark {
            height: 18px;
            width: 18px;
            background-color: #fff;
            border: 1px solid #dee2e6;
            border-radius: 4px;
            margin-right: 8px;
        }

        .custom-checkbox:hover input ~ .checkmark {
            background-color: #f8f9fa;
        }

        .custom-checkbox input:checked ~ .checkmark {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
        }

        .checkmark:after {
            content: "";
            position: absolute;
            display: none;
        }

        .custom-checkbox input:checked ~ .checkmark:after {
            display: block;
        }

        .custom-checkbox .checkmark:after {
            left: 6px;
            top: 2px;
            width: 6px;
            height: 12px;
            border: solid white;
            border-width: 0 2px 2px 0;
            transform: rotate(45deg);
        }

        .checkbox-label {
            font-size: 0.9rem;
            color: #6c757d;
        }

        .forgot-link {
            font-size: 0.9rem;
            color: var(--primary-color);
            text-decoration: none;
        }

        .forgot-link:hover {
            text-decoration: underline;
        }

        .login-btn {
            width: 100%;
            padding: 12px;
            background-color: var(--primary-color);
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 1rem;
            font-weight: 500;
            cursor: pointer;
            transition: background-color 0.2s;
        }

        .login-btn:hover {
            background-color: var(--secondary-color);
        }

        .separator {
            position: relative;
            text-align: center;
            margin: 1.5rem 0;
        }

        .separator::before {
            content: "";
            position: absolute;
            left: 0;
            top: 50%;
            width: 45%;
            height: 1px;
            background-color: #dee2e6;
        }

        .separator::after {
            content: "";
            position: absolute;
            right: 0;
            top: 50%;
            width: 45%;
            height: 1px;
            background-color: #dee2e6;
        }

        .separator span {
            display: inline-block;
            padding: 0 10px;
            background-color: white;
            position: relative;
            z-index: 1;
            color: #6c757d;
            font-size: 0.9rem;
        }

        .social-login {
            display: flex;
            justify-content: center;
            gap: 1rem;
            margin-bottom: 1.5rem;
        }

        .social-btn {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            border: 1px solid #dee2e6;
            background-color: white;
            font-size: 1.2rem;
            cursor: pointer;
            transition: background-color 0.2s, transform 0.2s;
        }

        .social-btn:hover {
            transform: translateY(-3px);
        }

        .google-btn {
            color: #DB4437;
        }

        .google-btn:hover {
            background-color: rgba(219, 68, 55, 0.1);
        }

        .microsoft-btn {
            color: #00a1f1;
        }

        .microsoft-btn:hover {
            background-color: rgba(0, 161, 241, 0.1);
        }

        .apple-btn {
            color: #000;
        }

        .apple-btn:hover {
            background-color: rgba(0, 0, 0, 0.1);
        }

        .register-link {
            text-align: center;
            font-size: 0.9rem;
            color: #6c757d;
        }

        .register-link a {
            color: var(--primary-color);
            text-decoration: none;
        }

        .register-link a:hover {
            text-decoration: underline;
        }

        .d-none {
            display: none !important;
        }

        /* Spinner pour le bouton */
        .spinner-border {
            display: inline-block;
            width: 1rem;
            height: 1rem;
            vertical-align: text-bottom;
            border: 0.2em solid currentColor;
            border-right-color: transparent;
            border-radius: 50%;
            animation: spinner-border .75s linear infinite;
        }

        @keyframes spinner-border {
            to { transform: rotate(360deg); }
        }

        /* Responsive */
        @media (max-width: 992px) {
            .login-container {
                width: 90%;
                height: auto;
                flex-direction: column;
            }
            
            .brand-side, .form-side {
                width: 100%;
            }
            
            .brand-side {
                padding: 2rem;
                text-align: center;
            }
            
            .brand-tkh {
                justify-content: center;
            }
            
            .feature-item {
                justify-content: center;
            }
        }

        @media (max-width: 576px) {
            .login-container {
                width: 95%;
            }
            
            .form-side {
                padding: 2rem 1.5rem;
            }
        }
    </style>
</head>
<body>
<div class="login-container">
  <!-- Côté gauche - Branding -->
  <div class="brand-side">
    <div class="brand-pattern"></div>
    <div class="brand-circles"></div>
    
    <div class="brand-logo">
      <div class="brand-tkh">
        <div class="brand-icon">
          <i class="fas fa-layer-group"></i>
        </div>
        <h1 class="brand-title">SRM</h1>
      </div>
      <p class="brand-subtitle">Gestion de parc informatique intelligente</p>
    </div>

    <div class="features-list">
      <div class="feature-item">
        <div class="feature-icon">
          <i class="fas fa-chart-line"></i>
        </div>
        <div class="feature-text">Suivez vos actifs IT en temps réel</div>
      </div>
      <div class="feature-item">
        <div class="feature-icon">
          <i class="fas fa-shield-alt"></i>
        </div>
        <div class="feature-text">Sécurisez votre infrastructure</div>
      </div>
      <div class="feature-item">
        <div class="feature-icon">
          <i class="fas fa-magic"></i>
        </div>
        <div class="feature-text">Automatisez les tâches de maintenance</div>
      </div>
    </div>
  </div>

  <!-- Côté droit - Formulaire -->
  <div class="form-side">
    <div class="welcome-header">
      <h2 class="welcome-title">Bienvenue !</h2>
      <p class="welcome-text">Connectez-vous à votre espace personnel</p>
    </div>

    <!-- Affichage des erreurs de validation Laravel -->
    @if ($errors->any())
    <div class="alert alert-danger" id="errors-container">
        <div class="alert-icon"><i class="fas fa-exclamation-circle"></i></div>
        <div class="alert-content">
            @foreach ($errors->all() as $error)
                <div>{{ $error }}</div>
            @endforeach
        </div>
    </div>
    @else
    <div class="alert alert-danger d-none" id="errors-container">
      <div class="alert-icon"><i class="fas fa-exclamation-circle"></i></div>
      <div class="alert-content">
        <!-- Les erreurs seront injectées ici -->
      </div>
    </div>
    @endif

    <form id="login-form" action="{{ route('login.submit') }}" method="POST">
      @csrf
      <div class="input-wrapper">
        <i class="input-icon fas fa-envelope"></i>
        <input type="email" class="form-input" id="email" name="email" placeholder="Adresse email" value="{{ old('email') }}" required>
      </div>

      <div class="input-wrapper">
        <i class="input-icon fas fa-lock"></i>
        <input type="password" class="form-input" id="password" name="password" placeholder="Mot de passe" required>
      </div>

      <div class="remember-forgot">
        <label class="custom-checkbox">
          <input type="checkbox" id="remember" name="remember">
          <span class="checkmark"></span>
          <span class="checkbox-label">Se souvenir de moi</span>
        </label>
        <a href="{{ route('password.request') }}" class="forgot-link">Mot de passe oublié ?</a>
      </div>

      <button type="submit" class="login-btn" id="login-button">
        Se connecter
      </button>
    </form>

    <div class="separator">
      <span>ou</span>
    </div>

    <div class="social-login">
      <button class="social-btn google-btn">
        <i class="fab fa-google"></i>
      </button>
      <button class="social-btn microsoft-btn">
        <i class="fab fa-microsoft"></i>
      </button>
      <button class="social-btn apple-btn">
        <i class="fab fa-apple"></i>
      </button>
    </div>

    <p class="register-link">
      Vous n'avez pas de compte ? <a href="#">Contactez votre administrateur</a>
    </p>
  </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
<script>
document.addEventListener('DOMContentLoaded', () => {
    const loginForm = document.getElementById('login-form');
    const loginButton = document.getElementById('login-button');
    const errorsContainer = document.getElementById('errors-container');
    const errorsContent = errorsContainer.querySelector('.alert-content');
    
    loginForm.addEventListener('submit', function(e) {
        // Validation côté client
        const email = document.getElementById('email').value;
        const password = document.getElementById('password').value;
        let errors = [];
        
        if (!email) {
            e.preventDefault();
            errors.push("L'adresse email est requise");
        } else if (!/\S+@\S+\.\S+/.test(email)) {
            e.preventDefault();
            errors.push("L'adresse email n'est pas valide");
        }
        
        if (!password) {
            e.preventDefault();
            errors.push("Le mot de passe est requis");
        } else if (password.length < 6) {
            e.preventDefault();
            errors.push("Le mot de passe doit contenir au moins 6 caractères");
        }
        
        // Affichage des erreurs ou soumission du formulaire
        if (errors.length > 0) {
            errorsContent.innerHTML = errors.map(error => `<div>${error}</div>`).join('');
            errorsContainer.classList.remove('d-none');
        } else {
            errorsContainer.classList.add('d-none');
            loginButton.innerHTML = '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Connexion...';
            loginButton.disabled = true;
            // Le formulaire sera naturellement soumis si e.preventDefault() n'est pas appelé
        }
    });
    
    // Vérification de redirection automatique si déjà connecté
    @if (Auth::check())
        window.location.href = "{{ route('dashboard') }}";
    @endif
});
</script>
</body>
</html>