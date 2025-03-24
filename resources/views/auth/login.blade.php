<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TechAssets - Authentification</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome pour les icônes -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        /* Variables pour les couleurs et faciliter la maintenance */
        :root {
            --primary: #6d28d9;
            --primary-dark: #5b21b6;
            --primary-light: #ddd6fe;
            --secondary: #0f172a;
            --accent: #10b981;
            --light: #f8fafc;
            --dark: #0f172a;
            --gray-light: #e2e8f0;
            --gray: #94a3b8;
            --white: #ffffff;
            --card-border-radius: 24px;
            --input-border-radius: 16px;
            --button-border-radius: 16px;
        }

        /* Règles de base et fond principal */
        body {
            font-family: 'Poppins', sans-serif;
            min-height: 100vh;
            overflow-x: hidden;
            background-color: #f1f5f9;
            position: relative;
            margin: 0;
        }
        
        /* Mesh gradient moderne pour le fond */
        .bg-mesh {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: 
                radial-gradient(ellipse at 20% 30%, rgba(109, 40, 217, 0.2) 0%, transparent 70%),
                radial-gradient(ellipse at 80% 20%, rgba(16, 185, 129, 0.2) 0%, transparent 70%),
                radial-gradient(ellipse at 50% 70%, rgba(99, 102, 241, 0.2) 0%, transparent 70%),
                radial-gradient(ellipse at 10% 90%, rgba(217, 70, 239, 0.2) 0%, transparent 70%);
            z-index: -2;
        }

        /* Grille décorative pour le fond */
        .grid-pattern {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: 
                linear-gradient(rgba(226, 232, 240, 0.1) 1px, transparent 1px),
                linear-gradient(90deg, rgba(226, 232, 240, 0.1) 1px, transparent 1px);
            background-size: 30px 30px;
            z-index: -1;
        }

        /* Formes flottantes décoratives */
        .floating-shapes {
            position: fixed;
            width: 100%;
            height: 100%;
            z-index: -1;
            pointer-events: none;
        }

        .shape {
            position: absolute;
            border-radius: 50%;
            filter: blur(30px);
            opacity: 0.4;
            animation: float 20s infinite ease-in-out;
        }

        .shape-1 {
            width: 300px;
            height: 300px;
            background: linear-gradient(45deg, var(--primary), #8b5cf6);
            top: -100px;
            left: -100px;
            animation-delay: 0s;
        }

        .shape-2 {
            width: 350px;
            height: 350px;
            background: linear-gradient(-45deg, var(--accent), #0ea5e9);
            bottom: -150px;
            right: -100px;
            animation-delay: 4s;
        }

        .shape-3 {
            width: 250px;
            height: 250px;
            background: linear-gradient(135deg, #f472b6, #ec4899);
            top: 60%;
            left: 15%;
            animation-delay: 8s;
        }

        @keyframes float {
            0% {
                transform: translateY(0) translateX(0) rotate(0);
            }
            25% {
                transform: translateY(-30px) translateX(30px) rotate(5deg);
            }
            50% {
                transform: translateY(0) translateX(60px) rotate(10deg);
            }
            75% {
                transform: translateY(30px) translateX(30px) rotate(5deg);
            }
            100% {
                transform: translateY(0) translateX(0) rotate(0);
            }
        }

        /* Conteneur principal */
        .container-fluid {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            padding: 2rem;
        }

        .login-wrapper {
            display: flex;
            max-width: 1200px;
            width: 100%;
            background: rgba(255, 255, 255, 0.8);
            border-radius: var(--card-border-radius);
            box-shadow: 
                0 20px 50px -12px rgba(0, 0, 0, 0.1),
                0 0 0 1px rgba(255, 255, 255, 0.3);
            overflow: hidden;
            backdrop-filter: blur(10px);
            position: relative;
            z-index: 1;
        }

        /* Style pour la partie gauche (branding) */
        .brand-side {
            flex: 1;
            background: linear-gradient(135deg, var(--primary) 0%, var(--accent) 100%);
            color: white;
            padding: 3rem;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
            position: relative;
            display: none;
        }

        @media (min-width: 992px) {
            .brand-side {
                display: flex;
            }
        }

        .brand-pattern {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            opacity: 0.1;
            background-image: 
                radial-gradient(circle at 20% 30%, rgba(255, 255, 255, 0.3) 0%, transparent 8%),
                radial-gradient(circle at 50% 50%, rgba(255, 255, 255, 0.3) 0%, transparent 8%),
                radial-gradient(circle at 80% 70%, rgba(255, 255, 255, 0.3) 0%, transparent 8%);
            background-size: 40px 40px;
            background-position: 0 0, 20px 20px;
        }

        .brand-logo {
            margin-bottom: 3rem;
            position: relative;
            z-index: 2;
            transform: translateY(-20px);
            opacity: 0;
            animation: fadeInUp 1s forwards;
            animation-delay: 0.2s;
        }

        @keyframes fadeInUp {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        .brand-tkh{
            display:flex;
            gap:10px;
            align-items: center;
        }

        .brand-icon {
            
            font-size: 2.5rem;
            margin-bottom: 1.5rem;
            background: rgba(255, 255, 255, 0.2);
            width: 120px;
            height: 120px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 30px;
            box-shadow: 
                0 15px 25px -10px rgba(0, 0, 0, 0.2),
                0 0 0 1px rgba(255, 255, 255, 0.2);
            position: relative;
            overflow: hidden;
        }

        .brand-icon::after {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: linear-gradient(
                45deg,
                transparent 40%,
                rgba(255, 255, 255, 0.3) 50%,
                transparent 60%
            );
            transform: rotate(45deg);
            animation: shimmer 6s infinite;
        }

        @keyframes shimmer {
            0% { transform: translateX(-100%) rotate(45deg); }
            100% { transform: translateX(100%) rotate(45deg); }
        }

        .brand-title {
            font-size: 2.8rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
            background: linear-gradient(90deg, #ffffff, #e2e8f0);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            letter-spacing: -0.5px;
        }

        .brand-subtitle {
            font-size: 1.25rem;
            margin-bottom: 3rem;
            opacity: 0.9;
        }

        .features-list {
            width: 100%;
            max-width: 400px;
            position: relative;
            z-index: 2;
        }

        .feature-item {
            display: flex;
            align-items: center;
            margin-bottom: 1.5rem;
            background: rgba(255, 255, 255, 0.15);
            padding: 1.25rem;
            border-radius: 20px;
            backdrop-filter: blur(5px);
            box-shadow: 
                0 10px 15px -5px rgba(0, 0, 0, 0.1),
                0 0 0 1px rgba(255, 255, 255, 0.1);
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            transform: translateX(-20px);
            opacity: 0;
            animation: fadeInRight 1s forwards;
        }

        .feature-item:nth-child(1) { animation-delay: 0.4s; }
        .feature-item:nth-child(2) { animation-delay: 0.6s; }
        .feature-item:nth-child(3) { animation-delay: 0.8s; }

        @keyframes fadeInRight {
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        .feature-item:hover {
            transform: translateY(-8px) scale(1.03);
            box-shadow: 
                0 20px 30px -10px rgba(0, 0, 0, 0.15),
                0 0 0 1px rgba(255, 255, 255, 0.2);
        }

        .feature-icon {
            background: rgba(255, 255, 255, 0.25);
            width: 60px;
            height: 60px;
            border-radius: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 1.25rem;
            font-size: 1.5rem;
            transition: all 0.3s;
        }

        .feature-item:hover .feature-icon {
            transform: rotate(10deg);
        }

        .feature-text {
            font-size: 1.1rem;
            text-align: left;
            font-weight: 500;
        }

        /* Style pour la partie droite (formulaire) */
        .form-side {
            flex: 1;
            padding: 3.5rem;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .form-header {
            margin-bottom: 3rem;
            text-align: center;
            transform: translateY(-20px);
            opacity: 0;
            animation: fadeInUp 1s forwards;
        }

        .welcome-message {
            font-size: 2.5rem;
            font-weight: 700;
            color: var(--dark);
            margin-bottom: 0.75rem;
            background: linear-gradient(90deg, var(--primary-dark), var(--accent));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .welcome-subtitle {
            color: var(--gray);
            font-size: 1.15rem;
        }

        .input-group {
            position: relative;
            margin-bottom: 2.25rem;
            transform: translateY(20px);
            opacity: 0;
            animation: fadeInUp 0.8s forwards;
        }

        .input-group:nth-child(1) { animation-delay: 0.2s; }
        .input-group:nth-child(2) { animation-delay: 0.4s; }

        .form-control {
            height: 65px;
            background-color: var(--light);
            border: 2px solid var(--gray-light);
            border-radius: var(--input-border-radius);
            padding: 0.75rem 1rem 0.75rem 4rem;
            font-size: 1.1rem;
            transition: all 0.3s;
            box-shadow: 0 4px 10px -2px rgba(0, 0, 0, 0.05);
        }

        .form-control:focus {
            border-color: var(--primary);
            box-shadow: 
                0 8px 15px -5px rgba(109, 40, 217, 0.25),
                0 0 0 2px rgba(109, 40, 217, 0.1);
            transform: translateY(-2px);
        }

        .input-icon {
            position: absolute;
            left: 1.5rem;
            top: 50%;
            transform: translateY(-50%);
            color: var(--gray);
            font-size: 1.25rem;
            transition: all 0.3s;
            z-index: 2;
            display: flex;
            align-items: center;
            justify-content: center;
            width: 1.5rem;
        }

        .form-control:focus ~ .input-icon {
            color: var(--primary);
            transform: translateY(-50%) scale(1.1);
        }

        .form-floating > label {
            left: 4rem;
            top: 0.5rem;
            z-index: 3;
            padding-left: 0;
            transform-origin: left top;
            color: var(--gray);
            transition: all 0.3s;
        }

        .form-floating > .form-control:focus ~ label,
        .form-floating > .form-control:not(:placeholder-shown) ~ label {
            opacity: 0.8;
            transform: scale(0.85) translateY(-1rem) translateX(0);
            padding-left: 0.5rem;
            color: var(--primary);
        }

        .remember-forgot {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2.5rem;
            transform: translateY(20px);
            opacity: 0;
            animation: fadeInUp 0.8s forwards;
            animation-delay: 0.6s;
        }

        .form-check {
            display: flex;
            align-items: center;
        }

        .form-check-input {
            width: 1.3em;
            height: 1.3em;
            margin-right: 0.5rem;
            background-color: var(--light);
            border: 2px solid var(--gray-light);
            border-radius: 0.3em;
            cursor: pointer;
            transition: all 0.3s;
        }

        .form-check-input:checked {
            background-color: var(--primary);
            border-color: var(--primary);
            box-shadow: 0 0 0 2px rgba(109, 40, 217, 0.2);
        }

        .form-check-label {
            cursor: pointer;
            font-size: 0.95rem;
            color: var(--dark);
        }

        .forgot-link {
            color: var(--primary);
            font-size: 0.95rem;
            text-decoration: none;
            transition: all 0.3s;
            position: relative;
            font-weight: 500;
        }

        .forgot-link::after {
            content: '';
            position: absolute;
            bottom: -2px;
            left: 0;
            width: 0;
            height: 2px;
            background: linear-gradient(to right, var(--primary), var(--accent));
            transition: width 0.3s;
        }

        .forgot-link:hover::after {
            width: 100%;
        }

        .forgot-link:hover {
            color: var(--primary-dark);
        }

        .btn-login {
            height: 65px;
            background: linear-gradient(135deg, var(--primary) 0%, var(--accent) 100%);
            border: none;
            border-radius: var(--button-border-radius);
            color: white;
            font-size: 1.15rem;
            font-weight: 600;
            transition: all 0.4s;
            box-shadow: 
                0 10px 20px -5px rgba(109, 40, 217, 0.4),
                0 0 0 2px rgba(109, 40, 217, 0.05);
            transform: translateY(20px);
            opacity: 0;
            animation: fadeInUp 0.8s forwards;
            animation-delay: 0.8s;
            position: relative;
            overflow: hidden;
        }

        .btn-login::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(
                90deg,
                transparent 0%,
                rgba(255, 255, 255, 0.2) 50%,
                transparent 100%
            );
            transition: left 0.7s;
        }

        .btn-login:hover::before {
            left: 100%;
        }

        .btn-login:hover {
            transform: translateY(-5px);
            box-shadow: 
                0 15px 30px -5px rgba(109, 40, 217, 0.5),
                0 0 0 2px rgba(109, 40, 217, 0.1);
            background: linear-gradient(135deg, var(--primary-dark) 0%, var(--primary) 100%);
        }

        .btn-login:active {
            transform: translateY(0);
        }

        .or-divider {
            display: flex;
            align-items: center;
            margin: 2.5rem 0;
            color: var(--gray);
            transform: translateY(20px);
            opacity: 0;
            animation: fadeInUp 0.8s forwards;
            animation-delay: 1s;
        }

        .or-divider::before,
        .or-divider::after {
            content: "";
            flex: 1;
            height: 2px;
            background: linear-gradient(to right, transparent, var(--gray-light), transparent);
        }

        .or-divider span {
            padding: 0 1.25rem;
            font-size: 0.95rem;
            font-weight: 500;
        }

        .social-login {
            display: flex;
            justify-content: center;
            gap: 1.25rem;
            margin-bottom: 2.5rem;
            transform: translateY(20px);
            opacity: 0;
            animation: fadeInUp 0.8s forwards;
            animation-delay: 1.2s;
        }

        .social-btn {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 65px;
            height: 65px;
            border-radius: var(--button-border-radius);
            background-color: var(--light);
            border: 2px solid var(--gray-light);
            font-size: 1.5rem;
            transition: all 0.4s;
            position: relative;
            overflow: hidden;
            box-shadow: 0 5px 15px -5px rgba(0, 0, 0, 0.1);
        }

        .social-btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.05);
            transform: translateY(100%);
            transition: transform 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        }

        .social-btn:hover::before {
            transform: translateY(0);
        }

        .social-btn:hover {
            transform: translateY(-8px);
            box-shadow: 
                0 15px 25px -10px rgba(0, 0, 0, 0.15),
                0 0 0 2px rgba(0, 0, 0, 0.02);
        }

        .google-btn {
            color: #DB4437;
        }

        .microsoft-btn {
            color: #0078D4;
        }

        .apple-btn {
            color: #000000;
        }

        .signup-link {
            text-align: center;
            margin-top: 2rem;
            color: var(--gray);
            font-size: 0.95rem;
            transform: translateY(20px);
            opacity: 0;
            animation: fadeInUp 0.8s forwards;
            animation-delay: 1.4s;
        }

        .signup-link a {
            color: var(--primary);
            text-decoration: none;
            font-weight: 600;
            transition: color 0.3s;
            position: relative;
        }

        .signup-link a::after {
            content: '';
            position: absolute;
            bottom: -2px;
            left: 0;
            width: 0;
            height: 2px;
            background: linear-gradient(to right, var(--primary), var(--accent));
            transition: width 0.3s;
        }

        .signup-link a:hover::after {
            width: 100%;
        }

        .signup-link a:hover {
            color: var(--primary-dark);
        }

        .alert {
            border-radius: 16px;
            padding: 1.25rem;
            margin-bottom: 2.5rem;
            display: flex;
            align-items: flex-start;
            border: none;
            background: rgba(239, 68, 68, 0.1);
            box-shadow: 
                0 10px 15px -5px rgba(239, 68, 68, 0.1),
                0 0 0 1px rgba(239, 68, 68, 0.1);
        }

        .alert-danger {
            border-left: 4px solid #ef4444;
        }

        .alert-icon {
            margin-right: 1rem;
            font-size: 1.5rem;
            color: #ef4444;
        }

        /* Animation de chargement pour le bouton */
        .btn-loading {
            position: relative;
            pointer-events: none;
        }

        .btn-loading::after {
            content: "";
            position: absolute;
            width: 24px;
            height: 24px;
            top: 50%;
            left: 50%;
            margin-left: -12px;
            margin-top: -12px;
            border: 3px solid rgba(255, 255, 255, 0.3);
            border-radius: 50%;
            border-top-color: white;
            animation: spin 1s ease-in-out infinite;
        }

        @keyframes spin {
            to { transform: rotate(360deg); }
        }

        /* Responsive */
        @media (max-width: 991.98px) {
            .login-wrapper {
                flex-direction: column;
                max-width: 500px;
            }
            
            .form-side {
                padding: 2.5rem 2rem;
            }
            
            .welcome-message {
                font-size: 2rem;
            }
            
            .form-control {
                height: 60px;
            }
            
            .btn-login {
                height: 60px;
            }
            
            .social-btn {
                width: 60px;
                height: 60px;
            }
        }

        @media (max-width: 575.98px) {
            .container-fluid {
                padding: 1rem;
            }
            
            .form-side {
                padding: 2rem 1.5rem;
            }
            
            .welcome-message {
                font-size: 1.75rem;
            }
            
            .remember-forgot {
                flex-direction: column;
                align-items: flex-start;
                gap: 1rem;
            }
            
            .social-login {
                gap: 0.75rem;
            }
            
            .social-btn {
                width: 55px;
                height: 55px;
            }
        }

        /* Amélioration pour l'accessibilité - état focus visible */
        a:focus, 
        button:focus, 
        input:focus, 
        .form-check-input:focus {
            outline: 2px solid var(--primary);
            outline-offset: 2px;
        }
        
        /* Ajout de police web pour améliorer l'apparence */
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');
    </style>
</head>

<body>
    <!-- Fond avec mesh gradient et grille -->
    <div class="bg-mesh"></div>
    <div class="grid-pattern"></div>
    
    <!-- Formes flottantes décoratives -->
    <div class="floating-shapes">
        <div class="shape shape-1"></div>
        <div class="shape shape-2"></div>
        <div class="shape shape-3"></div>
    </div>

    <div class="container-fluid">
        <div class="login-wrapper">
            <!-- Côté gauche - Branding -->
            <div class="brand-side">
                <div class="brand-pattern"></div>
                
                <div class="brand-logo">
                    <div class="brand-tkh">
                    <div class="brand-icon">
                        <i class="fas fa-layer-group"></i>
                    </div>
                    <h1 class="brand-title">SRM</h1></div>
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
                <div class="form-header">
                    <h2 class="welcome-message">Bienvenue !</h2>
                    <p class="welcome-subtitle">Connectez-vous pour accéder à votre espace</p>
                </div>

                <!-- Alerte (masquée par défaut) -->
                <div class="alert alert-danger d-none" id="errors-container">
                    <div class="alert-icon"><i class="fas fa-exclamation-circle"></i></div>
                    <div class="alert-content">
                        <!-- Les erreurs seront injectées ici -->
                    </div>
                </div>

                <form id="login-form">
                    <div class="input-group form-floating">
                        <input type="email" class="form-control" id="email" name="email" placeholder=" " required>
                        <label for="email">Adresse email</label>
                        <div class="input-icon">
                            <i class="fas fa-envelope"></i>
                        </div>
                    </div>

                    <div class="input-group form-floating">
                        <input type="password" class="form-control" id="password" name="password" placeholder=" " required>
                        <label for="password">Mot de passe</label>
                        <div class="input-icon">
                            <i class="fas fa-lock"></i>
                        </div>
                    </div>

                    <div class="remember-forgot">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="remember" name="remember">
                            <label class="form-check-label" for="remember">
                                Se souvenir de moi
                            </label>
                        </div>
                        <a href="#" class="forgot-link">Mot de passe oublié ?</a>
                    </div>

                    <button type="submit" class="btn btn-login w-100" id="login-button">
                        Se connecter
                    </button>
                </form>

                <div class="or-divider">
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

                <p class="signup-link">
                    Vous n'avez pas de compte ? <a href="#">Contactez votre administrateur