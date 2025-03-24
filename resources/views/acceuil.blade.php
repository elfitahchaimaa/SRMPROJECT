<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SRMMS - Société Régionale Multiservices Marrakech-Safi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" rel="stylesheet">
    <style>
        :root {
            --primary-color: #1a73e8;
            --secondary-color: #f50057;
            --dark-color: #333;
            --light-color: #f8f9fa;
        }
        
        body {
            font-family: 'Poppins', sans-serif;
            overflow-x: hidden;
        }
        
        /* Navbar Styling */
        .navbar {
            transition: all 0.4s ease;
            padding: 1rem 0;
            background: rgba(0, 0, 0, 0.7) !important;
            backdrop-filter: blur(10px);
        }
        
        .navbar-brand {
            font-weight: 700;
            font-size: 1.8rem;
            color: #fff;
        }
        
        .navbar-shrink {
            padding: 0.5rem 0;
            box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.1);
        }
        
        .nav-link {
            position: relative;
            margin: 0 0.5rem;
            font-weight: 500;
            transition: all 0.3s ease;
        }
        
        .nav-link:after {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            bottom: 0;
            left: 0;
            background-color: var(--secondary-color);
            transition: width 0.3s ease;
        }
        
        .nav-link:hover:after, .nav-link.active:after {
            width: 100%;
        }
        
        /* Hero Section */
        .hero-section {
            position: relative;
            background: linear-gradient(135deg, var(--primary-color), #4a148c);
            min-height: 100vh;
            display: flex;
            align-items: center;
            color: #fff;
            overflow: hidden;
        }
        
        .hero-section:before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: url('/api/placeholder/1200/800') center/cover no-repeat;
            opacity: 0.2;
            mix-blend-mode: overlay;
        }
        
        .hero-title {
            font-size: 3.5rem;
            font-weight: 800;
            margin-bottom: 1.5rem;
            position: relative;
        }
        
        .hero-title:after {
            content: '';
            position: absolute;
            bottom: -15px;
            left: 0;
            width: 100px;
            height: 4px;
            background: var(--secondary-color);
        }
        
        .hero-subtitle {
            font-size: 1.5rem;
            margin-bottom: 2rem;
            opacity: 0.9;
        }
        
        .hero-content {
            position: relative;
            z-index: 1;
        }
        
        .hero-image {
            position: relative;
            transform: perspective(1000px) rotateY(-15deg);
            transition: transform 1s ease;
            box-shadow: 0 30px 60px rgba(0, 0, 0, 0.3);
            border-radius: 10px;
            overflow: hidden;
        }
        
        .hero-image:hover {
            transform: perspective(1000px) rotateY(0);
        }
        
        /* Services Section */
        .section-title {
            position: relative;
            margin-bottom: 3rem;
            font-size: 2.5rem;
            text-align: center;
        }
        
        .section-title:after {
            content: '';
            position: absolute;
            bottom: -15px;
            left: 50%;
            transform: translateX(-50%);
            width: 80px;
            height: 4px;
            background: var(--primary-color);
        }
        
        .service-card {
            position: relative;
            background: #fff;
            border-radius: 15px;
            padding: 30px 20px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
            transition: all 0.3s ease;
            text-align: center;
            height: 100%;
            border: 1px solid rgba(0, 0, 0, 0.05);
            overflow: hidden;
        }
        
        .service-card:before {
            content: '';
            position: absolute;
            width: 100%;
            height: 0;
            bottom: 0;
            left: 0;
            background: linear-gradient(to top, rgba(26, 115, 232, 0.1), transparent);
            transition: all 0.5s ease;
            z-index: 0;
        }
        
        .service-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
        }
        
        .service-card:hover:before {
            height: 100%;
        }
        
        .service-icon {
            width: 80px;
            height: 80px;
            margin: 0 auto 1.5rem;
            background: rgba(26, 115, 232, 0.1);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--primary-color);
            position: relative;
            z-index: 1;
            transition: all 0.3s ease;
        }
        
        .service-card:hover .service-icon {
            background: var(--primary-color);
            color: white;
            transform: rotateY(360deg);
            transition: transform 0.8s ease, background 0.3s ease, color 0.3s ease;
        }
        
        .service-card-title {
            margin-bottom: 1rem;
            font-weight: 600;
            position: relative;
            z-index: 1;
        }
        
        .service-card-text {
            color: #6c757d;
            position: relative;
            z-index: 1;
        }
        
        /* Testimonials */
        .testimonial-card {
            position: relative;
            border: none;
            border-radius: 15px;
            overflow: hidden;
            margin-bottom: 20px;
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.06);
            transition: all 0.3s ease;
            height: 100%;
        }
        
        .testimonial-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
        }
        
        .testimonial-card .card-body {
            padding: 2rem;
            position: relative;
        }
        
        .testimonial-card .card-body:before {
            content: '\201C';
            font-family: serif;
            position: absolute;
            top: 10px;
            left: 20px;
            font-size: 5rem;
            color: rgba(26, 115, 232, 0.1);
            line-height: 1;
        }
        
        .rating {
            margin-bottom: 1rem;
            color: #FFD700;
        }
        
        .avatar {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            background: var(--primary-color);
            color: white;
            font-weight: bold;
        }
        
        /* Contact Section */
        .contact-info-item {
            display: flex;
            align-items: center;
            margin-bottom: 1.5rem;
        }
        
        .contact-info-item i {
            width: 40px;
            height: 40px;
            background: var(--primary-color);
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 1rem;
        }
        
        .social-links {
            display: flex;
            gap: 1rem;
        }
        
        .social-links a {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: var(--light-color);
            color: var(--dark-color);
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
        }
        
        .social-links a:hover {
            background: var(--primary-color);
            color: white;
            transform: translateY(-5px);
        }
        
        .contact-form {
            border-radius: 20px;
            overflow: hidden;
        }
        
        .form-control {
            border-radius: 10px;
            padding: 0.8rem 1.2rem;
            margin-bottom: 1rem;
            border: 1px solid #ced4da;
            transition: all 0.3s ease;
        }
        
        .form-control:focus {
            box-shadow: none;
            border-color: var(--primary-color);
        }
        
        .btn-primary {
            background: var(--primary-color);
            border: none;
            border-radius: 50px;
            padding: 0.8rem 2rem;
            font-weight: 500;
            transition: all 0.3s ease;
        }
        
        .btn-primary:hover {
            background: #0d47a1;
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(26, 115, 232, 0.4);
        }
        
        .btn-light {
            border-radius: 50px;
            padding: 0.8rem 2rem;
            font-weight: 500;
            transition: all 0.3s ease;
        }
        
        .btn-outline-light {
            border-radius: 50px;
            padding: 0.8rem 2rem;
            font-weight: 500;
            transition: all 0.3s ease;
        }
        
        .btn-outline-light:hover {
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(255, 255, 255, 0.2);
        }
        
        /* Floating shapes */
        .floating-shape {
            position: absolute;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            animation: float 10s ease-in-out infinite;
        }
        
        .shape-1 {
            width: 200px;
            height: 200px;
            top: 10%;
            left: 5%;
            animation-delay: 0s;
        }
        
        .shape-2 {
            width: 100px;
            height: 100px;
            top: 20%;
            right: 10%;
            animation-delay: 2s;
        }
        
        .shape-3 {
            width: 150px;
            height: 150px;
            bottom: 15%;
            right: 5%;
            animation-delay: 4s;
        }
        
        @keyframes float {
            0% {
                transform: translate(0, 0) rotate(0deg);
            }
            50% {
                transform: translate(20px, 20px) rotate(10deg);
            }
            100% {
                transform: translate(0, 0) rotate(0deg);
            }
        }
        
        /* Scroll Progress Indicator */
        .scroll-progress {
            position: fixed;
            top: 0;
            left: 0;
            width: 0%;
            height: 4px;
            background: var(--secondary-color);
            z-index: 9999;
            transition: width 0.1s linear;
        }
        
        /* Footer */
        footer {
            background: var(--dark-color);
            color: white;
            padding: 3rem 0;
        }
        
        .footer-title {
            font-weight: 600;
            margin-bottom: 1.5rem;
            position: relative;
            padding-bottom: 10px;
        }
        
        .footer-title:after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 50px;
            height: 2px;
            background: var(--secondary-color);
        }
        
        .footer-links {
            list-style: none;
            padding: 0;
        }
        
        .footer-links li {
            margin-bottom: 0.8rem;
        }
        
        .footer-links a {
            color: rgba(255, 255, 255, 0.7);
            text-decoration: none;
            transition: all 0.3s ease;
        }
        
        .footer-links a:hover {
            color: white;
            padding-left: 5px;
        }
        
        .footer-bottom {
            padding-top: 2rem;
            margin-top: 2rem;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            text-align: center;
        }
    </style>
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand" href="#">SRMMS</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link active" href="#">Accueil</a></li>
                    <li class="nav-item"><a class="nav-link" href="#services">Services</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">À propos</a></li>
                    <li class="nav-item"><a class="nav-link" href="#contact">Contact</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero-section text-white">
        <div class="container hero-content">
            <div class="row align-items-center">
                <div class="col-lg-7">
                    <h1 class="hero-title">Société Régionale Multiservices Marrakech-Safi</h1>
                    <p class="hero-subtitle">Des solutions professionnelles adaptées à tous vos besoins</p>
                    <a href="#services" class="btn btn-light btn-lg me-3">Nos Services</a>
                    <a href="#contact" class="btn btn-outline-light btn-lg">Contactez-nous</a>
                </div>
                <div class="col-lg-5 d-none d-lg-block">
                    <img src="/api/placeholder/400/320" alt="SRMMS Services" class="img-fluid rounded">
                </div>
            </div>
        </div>
    </section>

    <!-- Services Section -->
    <section id="services" class="container my-5">
        <h2 class="section-title fw-bold">Nos Services</h2>
        <div class="row g-4">
            <!-- Service Statique -->
            <div class="col-md-4 mb-4">
                <div class="service-card">
                    <div class="service-icon"><i class="fas fa-tools fa-2x"></i></div>
                    <div class="card-body">
                        <h4 class="service-card-title">Maintenance</h4>
                        <p class="service-card-text">Services de maintenance professionnelle pour vos installations et équipements.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="service-card">
                    <div class="service-icon"><i class="fas fa-building fa-2x"></i></div>
                    <div class="card-body">
                        <h4 class="service-card-title">Construction</h4>
                        <p class="service-card-text">Solutions complètes de construction et rénovation pour tous vos projets.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="service-card">
                    <div class="service-icon"><i class="fas fa-leaf fa-2x"></i></div>
                    <div class="card-body">
                        <h4 class="service-card-title">Jardinage</h4>
                        <p class="service-card-text">Entretien et aménagement d'espaces verts pour particuliers et professionnels.</p>
                    </div>
                </div>
            </div>

            <!-- Services dynamiques -->
            @foreach($services as $service)
                <div class="col-md-4 mb-4">
                    <div class="service-card">
                        <div class="service-icon">
                            <i class="{{ $service->icon }} fa-2x"></i>
                        </div>
                        <div class="card-body">
                            <h4 class="service-card-title">{{ $service->title }}</h4>
                            <p class="service-card-text">{{ $service->description }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>

    <!-- Testimonials Section -->
    <section class="bg-light py-5">
        <div class="container">
            <h2 class="section-title fw-bold">Témoignages Clients</h2>
            <div class="row">
                <!-- Exemple de témoignage -->
                <div class="col-md-4 mb-4">
                    <div class="card h-100">
                        <div class="card-body">
                            <div class="mb-3 text-warning">
                                <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                            </div>
                            <p class="card-text">"Un service exceptionnel et professionnel. L'équipe de SRMMS a dépassé toutes nos attentes."</p>
                            <div class="d-flex align-items-center">
                                <div class="rounded-circle bg-primary text-white d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">AM</div>
                                <div class="ms-3">
                                    <p class="mb-0 fw-bold">Ahmed M.</p>
                                    <small class="text-muted">Marrakech</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Répéter ou boucler pour d'autres témoignages -->
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="container my-5">
        <div class="row">
            <div class="col-lg-6">
                <h2 class="section-title fw-bold">Contactez-nous</h2>
                <p class="mb-4">Nous sommes à votre disposition pour répondre à toutes vos questions et vous accompagner dans vos projets.</p>
                <div class="contact-info-item"><i class="fas fa-map-marker-alt"></i><span>Avenue Hassan II, Marrakech, Maroc</span></div>
                <div class="contact-info-item"><i class="fas fa-phone"></i><span>+212 528 123456</span></div>
                <div class="contact-info-item"><i class="fas fa-envelope"></i><span>contact@srmms.ma</span></div>
                <div class="social-links mt-4">
                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="#"><i class="fab fa-linkedin-in"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
            <div class="col-lg-6 mt-4 mt-lg-0">
                <div class="card border-0 shadow-sm">
                    <div class="card-body p-4">
                        <h4 class="card-title mb-4">Envoyez-nous un message</h4>
                        <form>
                            <div class="mb-3">
                                <input type="text" class="form-control" placeholder="Votre nom">
                            </div>
                            <div class="mb-3">
                                <input type="email" class="form-control" placeholder="Votre email">
                            </div>
                            <div class="mb-3">
                                <textarea class="form-control" rows="4" placeholder="Votre message"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Envoyer</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
