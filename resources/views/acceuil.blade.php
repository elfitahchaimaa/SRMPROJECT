<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SRMMS - Services Multiservices Marrakech-Safi</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        :root {
            --primary-color: #0056b3;
            --secondary-color: #17a2b8;
            --accent-color: #ffc107;
            --dark-color: #343a40;
            --light-color: #f8f9fa;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: #333;
            line-height: 1.6;
        }
        
        /* Navigation */
        .navbar {
            padding: 1rem 0;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            background: linear-gradient(135deg, var(--primary-color), #003366);
        }
        
        .navbar-brand {
            display: flex;
            align-items: center;
        }
        
        .navbar-logo {
            height: 45px;
            transition: transform 0.3s ease;
        }
        
        .navbar-logo:hover {
            transform: scale(1.05);
        }
        
        .nav-link {
            color: white !important;
            font-weight: 500;
            margin: 0 0.5rem;
            padding: 0.5rem 1rem;
            border-radius: 5px;
            transition: all 0.3s ease;
        }
        
        .nav-link:hover {
            background-color: rgba(255, 255, 255, 0.1);
            transform: translateY(-2px);
        }
        
        .nav-link.active {
            background-color: rgba(255, 255, 255, 0.2);
        }
        
        .btn-connexion {
            background-color: var(--accent-color);
            color: var(--dark-color) !important;
            font-weight: 600;
            padding: 0.5rem 1.5rem;
            border-radius: 50px;
            transition: all 0.3s ease;
            border: none;
        }
        
        .btn-connexion:hover {
            transform: scale(1.05);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }
        
        /* Hero Section */
        .hero {
            background: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)), url('/api/placeholder/1920/800') no-repeat center center;
            background-size: cover;
            padding: 8rem 0;
            color: white;
            text-align: center;
            position: relative;
        }
        
        .hero-content {
            max-width: 800px;
            margin: 0 auto;
        }
        
        .hero h1 {
            font-size: 3.5rem;
            font-weight: 700;
            margin-bottom: 1.5rem;
            animation: fadeInUp 1s ease;
        }
        
        .hero p {
            font-size: 1.25rem;
            margin-bottom: 2rem;
            opacity: 0.9;
            animation: fadeInUp 1s ease 0.3s;
            animation-fill-mode: both;
        }
        
        .hero-btns {
            animation: fadeInUp 1s ease 0.6s;
            animation-fill-mode: both;
        }
        
        .btn-hero {
            padding: 0.8rem 2rem;
            border-radius: 50px;
            font-weight: 600;
            margin: 0 0.5rem;
            transition: all 0.3s ease;
        }
        
        .btn-primary-custom {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
        }
        
        .btn-primary-custom:hover {
            background-color: #004494;
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }
        
        .btn-outline-light:hover {
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }
        
        /* Wave Divider */
        .wave-divider {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            overflow: hidden;
            line-height: 0;
        }
        
        .wave-divider svg {
            display: block;
            width: calc(100% + 1.3px);
            height: 65px;
        }
        
        .wave-divider .shape-fill {
            fill: #FFFFFF;
        }
        
        /* Services Section */
        .section-title {
            text-align: center;
            margin-bottom: 3rem;
            position: relative;
            padding-bottom: 15px;
        }
        
        .section-title:after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 80px;
            height: 3px;
            background: var(--primary-color);
        }
        
        .service-card {
            background: white;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            transition: all 0.3s ease;
            height: 100%;
            display: flex;
            flex-direction: column;
            border-top: 4px solid var(--primary-color);
        }
        
        .service-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
        }
        
        .service-icon {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 80px;
            height: 80px;
            margin: 2rem auto 1rem;
            border-radius: 50%;
            background-color: rgba(0, 86, 179, 0.1);
            color: var(--primary-color);
            transition: all 0.3s ease;
        }
        
        .service-card:hover .service-icon {
            background-color: var(--primary-color);
            color: white;
            transform: rotateY(180deg);
        }
        
        .service-card-title {
            font-weight: 600;
            margin-bottom: 1rem;
            text-align: center;
            color: var(--dark-color);
        }
        
        .service-card-text {
            color: #666;
            text-align: center;
        }
        
        .card-body {
            padding: 1.5rem;
            flex-grow: 1;
        }
        
        /* Stats Section */
        .stats-section {
            background-color: var(--primary-color);
            padding: 4rem 0;
            color: white;
            position: relative;
        }
        
        .stat-item {
            text-align: center;
            padding: 2rem 1rem;
        }
        
        .stat-number {
            font-size: 3rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
            display: block;
        }
        
        .stat-text {
            font-size: 1.25rem;
            opacity: 0.9;
        }
        
        /* Testimonials */
        .testimonial-section {
            padding: 5rem 0;
            background-color: #f8f9fa;
        }
        
        .testimonial-card {
            background: white;
            border-radius: 15px;
            padding: 2rem;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            margin-bottom: 2rem;
            position: relative;
        }
        
        .testimonial-card:before {
            content: '\201C';
            font-size: 80px;
            position: absolute;
            top: -20px;
            left: 20px;
            color: var(--primary-color);
            opacity: 0.2;
            font-family: Georgia, serif;
        }
        
        .testimonial-text {
            font-style: italic;
            margin-bottom: 1.5rem;
            color: #555;
        }
        
        .testimonial-author {
            display: flex;
            align-items: center;
        }
        
        .testimonial-author-image {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            object-fit: cover;
            margin-right: 1rem;
        }
        
        .testimonial-author-name {
            font-weight: 600;
            margin-bottom: 0.2rem;
        }
        
        .testimonial-author-title {
            color: #777;
            font-size: 0.9rem;
        }
        
        /* Footer */
        .footer {
            background: linear-gradient(135deg, #343a40, #1a1e21);
            color: white;
            padding-top: 4rem;
            position: relative;
        }
        
        .footer h5 {
            position: relative;
            padding-bottom: 15px;
            margin-bottom: 20px;
        }
        
        .footer h5:after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 50px;
            height: 2px;
            background: var(--accent-color);
        }
        
        .footer p {
            color: rgba(255, 255, 255, 0.8);
            margin-bottom: 1rem;
        }
        
        .footer i {
            margin-right: 10px;
            color: var(--accent-color);
        }
        
        .social-icons {
            margin-bottom: 1.5rem;
        }
        
        .social-icons a {
            display: inline-block;
            width: 40px;
            height: 40px;
            line-height: 40px;
            text-align: center;
            background-color: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            margin: 0 5px;
            color: white;
            transition: all 0.3s ease;
        }
        
        .social-icons a:hover {
            background-color: var(--accent-color);
            color: var(--dark-color);
            transform: translateY(-3px);
        }
        
        .copyright {
            background-color: rgba(0, 0, 0, 0.2);
            padding: 1.5rem 0;
            margin-top: 3rem;
        }
        
        .copyright p {
            margin-bottom: 0;
            font-size: 0.9rem;
        }
        
        .footer-links a {
            color: rgba(255, 255, 255, 0.8);
            margin: 0 10px;
            transition: color 0.3s ease;
            text-decoration: none;
        }
        
        .footer-links a:hover {
            color: var(--accent-color);
        }
        
        /* Animations */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        /* Responsive */
        @media (max-width: 768px) {
            .hero h1 {
                font-size: 2.5rem;
            }
            
            .hero p {
                font-size: 1rem;
            }
            
            .btn-hero {
                display: block;
                width: 100%;
                margin: 0.5rem 0;
            }
            
            .service-icon {
                width: 60px;
                height: 60px;
            }
            
            .stat-number {
                font-size: 2.5rem;
            }
        }
    </style>
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="https://www.radeema.ma/wp-content/themes/radeema-v2/assets/logo-SRM-Marrakech.svg" alt="Logo SRMMS" class="navbar-logo">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link active" href="#">Accueil</a></li>
                    <li class="nav-item"><a class="nav-link" href="#services">Services</a></li>
                    <li class="nav-item"><a class="nav-link" href="#testimonials">Témoignages</a></li>
                    <li class="nav-item"><a class="nav-link" href="#contact">Contact</a></li>
                    <li class="nav-item"><a class="btn btn-connexion" href="{{ route('login') }}">Connexion</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero">
        <div class="container">
            <div class="hero-content">
                <h1>Solutions Multiservices pour Marrakech-Safi</h1>
                <p>SRMMS vous offre des services de qualité avec des solutions adaptées à tous vos besoins professionnels et personnels.</p>
                <div class="hero-btns">
                    <a href="#services" class="btn btn-primary-custom btn-hero">Nos Services</a>
                    <a href="#contact" class="btn btn-outline-light btn-hero">Contactez-nous</a>
                </div>
            </div>
        </div>
        <div class="wave-divider">
            <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
                <path d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V0H0V27.35A600.21,600.21,0,0,0,321.39,56.44Z" class="shape-fill"></path>
            </svg>
        </div>
    </section>

    <!-- Services Section -->
    <section id="services" class="container my-5 py-5">
        <h2 class="section-title fw-bold">Nos Services</h2>
        <div class="row g-4">
            <div class="col-md-4 mb-4">
                <div class="service-card">
                    <div class="service-icon">
                        <i class="fas fa-exclamation-circle fa-2x"></i>
                    </div>
                    <div class="card-body">
                        <h4 class="service-card-title">Réclamations</h4>
                        <p class="service-card-text">Gérez et suivez vos réclamations en temps réel avec notre système intuitif. Une réponse rapide garantie.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="service-card">
                    <div class="service-icon">
                        <i class="fas fa-user-graduate fa-2x"></i>
                    </div>
                    <div class="card-body">
                        <h4 class="service-card-title">Espace Stagiaire</h4>
                        <p class="service-card-text">Un espace dédié aux stagiaires pour accéder aux ressources pédagogiques et suivre leur progression.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="service-card">
                    <div class="service-icon">
                        <i class="fas fa-file-invoice-dollar fa-2x"></i>
                    </div>
                    <div class="card-body">
                        <h4 class="service-card-title">Suivi de Factures</h4>
                        <p class="service-card-text">Suivez vos factures et paiements en temps réel, avec historique complet et notifications automatiques.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="service-card">
                    <div class="service-icon">
                        <i class="fas fa-hands-helping fa-2x"></i>
                    </div>
                    <div class="card-body">
                        <h4 class="service-card-title">Assistance Clientèle</h4>
                        <p class="service-card-text">Notre équipe d'experts est disponible pour répondre à toutes vos questions et vous accompagner.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="service-card">
                    <div class="service-icon">
                        <i class="fas fa-chart-line fa-2x"></i>
                    </div>
                    <div class="card-body">
                        <h4 class="service-card-title">Analyses & Rapports</h4>
                        <p class="service-card-text">Obtenez des données détaillées et des rapports personnalisés pour optimiser votre utilisation.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="service-card">
                    <div class="service-icon">
                        <i class="fas fa-mobile-alt fa-2x"></i>
                    </div>
                    <div class="card-body">
                        <h4 class="service-card-title">Application Mobile</h4>
                        <p class="service-card-text">Accédez à tous nos services depuis votre smartphone avec notre application dédiée.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Stats Section -->
    <section class="stats-section">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-6">
                    <div class="stat-item">
                        <span class="stat-number">10+</span>
                        <span class="stat-text">Années d'expérience</span>
                    </div>
                </div>
                <div class="col-md-3 col-6">
                    <div class="stat-item">
                        <span class="stat-number">15K+</span>
                        <span class="stat-text">Clients satisfaits</span>
                    </div>
                </div>
                <div class="col-md-3 col-6">
                    <div class="stat-item">
                        <span class="stat-number">98%</span>
                        <span class="stat-text">Taux de satisfaction</span>
                    </div>
                </div>
                <div class="col-md-3 col-6">
                    <div class="stat-item">
                        <span class="stat-number">24/7</span>
                        <span class="stat-text">Support disponible</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section id="testimonials" class="testimonial-section">
        <div class="container">
            <h2 class="section-title fw-bold">Témoignages Clients</h2>
            <div class="row">
                <div class="col-md-6">
                    <div class="testimonial-card">
                        <p class="testimonial-text">SRMMS a complètement transformé notre façon de gérer nos factures. Le système est intuitif et l'équipe de support est toujours disponible pour nous aider.</p>
                        <div class="testimonial-author">
                            <img src="/api/placeholder/60/60" alt="Ahmed Benani" class="testimonial-author-image">
                            <div>
                                <h5 class="testimonial-author-name">Ahmed Benani</h5>
                                <p class="testimonial-author-title">Directeur Commercial, Société XYZ</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="testimonial-card">
                        <p class="testimonial-text">En tant que stagiaire, j'ai apprécié l'espace dédié qui m'a permis d'accéder facilement à toutes les ressources dont j'avais besoin. Une expérience très formatrice.</p>
                        <div class="testimonial-author">
                            <img src="/api/placeholder/60/60" alt="Leila Tazi" class="testimonial-author-image">
                            <div>
                                <h5 class="testimonial-author-name">Leila Tazi</h5>
                                <p class="testimonial-author-title">Ancienne Stagiaire</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer id="contact" class="footer">
        <div class="container">
            <div class="row">
                <!-- Colonne 1 : À Propos -->
                <div class="col-lg-4 col-md-6 mb-4">
                    <h5 class="fw-bold">À Propos de SRMMS</h5>
                    <p>Depuis 2015, SRMMS est devenu un leader régional dans les services multiservices à Marrakech-Safi. Nous nous engageons à offrir des solutions personnalisées avec un service client exceptionnel.</p>
                    <p>Notre équipe de professionnels qualifiés est prête à répondre à tous vos besoins avec expertise et dévouement.</p>
                </div>
                
                <!-- Colonne 2 : Contact -->
                <div class="col-lg-4 col-md-6 mb-4">
                    <h5 class="fw-bold">Contactez-Nous</h5>
                    <p><i class="fas fa-map-marker-alt"></i> Avenue Hassan II, Résidence Firdaous, Étage 3, Marrakech</p>
                    <p><i class="fas fa-phone"></i> +212 528 123456 | +212 661 987654</p>
                    <p><i class="fas fa-envelope"></i> contact@srmms.ma</p>
                    <p><i class="fas fa-clock"></i> Lun-Ven: 8h30-18h00 | Sam: 9h00-13h00</p>
                </div>
                
                <!-- Colonne 3 : Newsletter -->
                <div class="col-lg-4 col-md-12">
                    <h5 class="fw-bold">Newsletter</h5>
                    <p>Inscrivez-vous pour recevoir nos actualités et offres exclusives.</p>
                    <div class="input-group mb-3">
                        <input type="email" class="form-control" placeholder="Votre adresse email" aria-label="Email">
                        <button class="btn btn-warning" type="button">S'inscrire</button>
                    </div>
                </div>
            </div>
            
            <!-- Réseaux sociaux -->
            <div class="text-center social-icons">
                <a href="#"><i class="fab fa-facebook fa-lg"></i></a>
                <a href="#"><i class="fab fa-twitter fa-lg"></i></a>
                <a href="#"><i class="fab fa-linkedin fa-lg"></i></a>
                <a href="#"><i class="fab fa-instagram fa-lg"></i></a>
                <a href="#"><i class="fab fa-whatsapp fa-lg"></i></a>
            </div>
            
            <!-- Copyright -->
            <div class="copyright">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-md-6 text-center text-md-start">
                            <p>&copy; 2025 SRMMS Multiservices. Tous droits réservés.</p>
                        </div>
                        <div class="col-md-6 text-center text-md-end footer-links">
                            <a href="#">Mentions légales</a>
                            <a href="#">Politique de confidentialité</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>
</html>