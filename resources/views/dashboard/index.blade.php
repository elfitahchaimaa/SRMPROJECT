<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portail de Gestion des Ressources</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- Boxicons -->
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
    <style>
        :root {
            --primary-color: #4e73df;
            --secondary-color: #1cc88a;
            --accent-color: #f6c23e;
            --danger-color: #e74a3b;
            --info-color: #36b9cc;
            --dark-bg: #212529;
            --light-bg: #f8f9fa;
            --card-shadow: 0 0.15rem 1.75rem 0 rgba(58, 59, 69, 0.15);
        }
        
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f8f9fc;
            padding-top: 0;
        }
        
        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            height: 100%;
            width: 250px;
            background-color: var(--dark-bg);
            z-index: 999;
            padding-top: 20px;
            transition: all 0.3s;
        }
        
        .sidebar-brand {
            padding: 1.5rem 1rem;
            color: white;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            margin-bottom: 1rem;
        }
        
        .sidebar-brand h4 {
            margin: 0;
            font-size: 1.2rem;
            font-weight: 600;
        }
        
        .sidebar-divider {
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            margin: 1rem 0;
        }
        
        .sidebar-heading {
            color: rgba(255, 255, 255, 0.4);
            font-size: 0.8rem;
            font-weight: 700;
            text-transform: uppercase;
            padding: 0 1rem;
            margin-bottom: 0.5rem;
        }
        
        .nav-item {
            margin-bottom: 0.25rem;
        }
        
        .nav-link {
            color: rgba(255, 255, 255, 0.8) !important;
            padding: 0.75rem 1rem;
            font-size: 0.9rem;
            display: flex;
            align-items: center;
            transition: all 0.3s;
        }
        
        .nav-link:hover {
            color: white !important;
            background-color: rgba(255, 255, 255, 0.1);
            border-left: 4px solid var(--primary-color);
        }
        
        .nav-link.active {
            color: white !important;
            background-color: rgba(78, 115, 223, 0.2);
            border-left: 4px solid var(--primary-color);
        }
        
        .nav-link i {
            margin-right: 0.8rem;
            font-size: 1.1rem;
        }
        
        .main-content {
            margin-left: 250px;
            padding: 20px;
            transition: all 0.3s;
        }
        
        .top-bar {
            background-color: white;
            box-shadow: var(--card-shadow);
            padding: 0.75rem 1.25rem;
            border-radius: 0.35rem;
            margin-bottom: 24px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .card {
            box-shadow: var(--card-shadow);
            margin-bottom: 24px;
            border: none;
            border-radius: 0.35rem;
            transition: transform 0.2s;
        }
        
        .card:hover {
            transform: translateY(-5px);
        }
        
        .card-header {
            background-color: white;
            border-bottom: 1px solid #e3e6f0;
            padding: 0.75rem 1.25rem;
            font-weight: 700;
            color: #4e73df;
            display: flex;
            align-items: center;
        }
        
        .card-header i {
            margin-right: 0.5rem;
            font-size: 1.1rem;
        }
        
        .stats-card {
            border-left: 4px solid;
            padding: 20px;
        }
        
        .stats-primary { border-left-color: var(--primary-color); }
        .stats-success { border-left-color: var(--secondary-color); }
        .stats-warning { border-left-color: var(--accent-color); }
        .stats-danger { border-left-color: var(--danger-color); }
        .stats-info { border-left-color: var(--info-color); }
        
        .stats-card .stats-icon {
            font-size: 2rem;
            opacity: 0.3;
        }
        
        .btn-custom-primary {
            background-color: var(--primary-color);
            border: none;
            color: white;
            font-weight: 500;
            padding: 0.5rem 1rem;
            border-radius: 5px;
        }
        
        .btn-custom-primary:hover {
            background-color: #2e59d9;
            color: white;
        }
        
        .btn-outline-custom {
            border: 1px solid #d1d3e2;
            color: #6e707e;
            background-color: transparent;
            font-weight: 500;
            padding: 0.5rem 1rem;
            border-radius: 5px;
        }
        
        .btn-outline-custom:hover {
            background-color: #eaecf4;
            color: #6e707e;
        }
        
        .profile-dropdown {
            cursor: pointer;
        }
        
        .profile-dropdown img {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            object-fit: cover;
        }
        
        .dropdown-menu {
            box-shadow: var(--card-shadow);
            border: none;
            border-radius: 0.35rem;
        }
        
        @media (max-width: 768px) {
            .sidebar {
                width: 100px;
            }
            
            .sidebar-brand h4 {
                display: none;
            }
            
            .nav-link span {
                display: none;
            }
            
            .main-content {
                margin-left: 100px;
            }
            
            .nav-link i {
                margin-right: 0;
                font-size: 1.4rem;
            }
            
            .sidebar-heading {
                text-align: center;
                padding: 0;
            }
        }
    </style>
</head>
<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <div class="sidebar-brand">
            <h4><i class='bx bx-building'></i> GestRessources</h4>
        </div>
        
        <div class="sidebar-heading">
            Principal
        </div>
        
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link active" href="{{ route('dashboard.index') }}">
                    <i class='bx bxs-dashboard'></i>
                    <span>Tableau de bord</span>
                </a>
            </li>
        </ul>
        
        <div class="sidebar-divider"></div>
        
        <div class="sidebar-heading">
            Gestion des ressources
        </div>
        
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('materiels.index') }}">
                    <i class='bx bx-laptop'></i>
                    <span>Matériels</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('agents.index') }}">
                    <i class='bx bx-user'></i>
                    <span>Agents</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('affectations.index') }}">
                    <i class='bx bx-transfer-alt'></i>
                    <span>Affectations</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <i class='bx bx-file'></i>
                    <span>Demandes de matériel</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <i class='bx bx-error-circle'></i>
                    <span>Réclamations</span>
                </a>
            </li>
        </ul>
        
        <div class="sidebar-divider"></div>
        
        <div class="sidebar-heading">
            Administration
        </div>
        
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <i class='bx bx-user-plus'></i>
                    <span>Gestion des comptes</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <i class='bx bx-cog'></i>
                    <span>Paramètres</span>
                </a>
            </li>
        </ul>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <!-- Top Bar -->
        <div class="top-bar">
            <h4 class="m-0">Tableau de bord</h4>
            
            <div class="profile-dropdown dropdown">
                <div class="d-flex align-items-center" data-bs-toggle="dropdown">
                   
                    <span class="ms-2 d-none d-lg-inline">Admin</span>
                    <i class='bx bx-chevron-down ms-1'></i>
                </div>
                <ul class="dropdown-menu dropdown-menu-end">
                    <li><a class="dropdown-item" href="#"><i class='bx bx-user me-2'></i>Profil</a></li>
                    <li><a class="dropdown-item" href="#"><i class='bx bx-cog me-2'></i>Paramètres</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li>
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="dropdown-item"><i class='bx bx-log-out me-2'></i>Déconnexion</button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
        
        <!-- Welcome Banner -->
        <div class="card mb-4">
            <div class="card-body">
                <h2>Bienvenue dans votre portail de gestion des ressources</h2>
                <p class="lead">Gérez efficacement votre inventaire, les affectations, les demandes des employés et les réclamations.</p>
            </div>
        </div>
        
        <!-- Stats Cards -->
        <div class="row">
            <div class="col-xl-3 col-md-6">
                <div class="card mb-4">
                    <div class="card-body stats-card stats-primary">
                        <div class="row no-gutters align-items-center">
                            <div class="col">
                                <div class="text-xs font-weight-bold text-uppercase mb-1">Matériels</div>
                                <div class="h5 mb-0 font-weight-bold">{{ isset($statsMateriels) ? $statsMateriels : '145' }}</div>
                            </div>
                            <div class="col-auto">
                                <i class='bx bx-laptop stats-icon'></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-xl-3 col-md-6">
                <div class="card mb-4">
                    <div class="card-body stats-card stats-success">
                        <div class="row no-gutters align-items-center">
                            <div class="col">
                                <div class="text-xs font-weight-bold text-uppercase mb-1">Agents</div>
                                <div class="h5 mb-0 font-weight-bold">{{ isset($statsAgents) ? $statsAgents : '87' }}</div>
                            </div>
                            <div class="col-auto">
                                <i class='bx bx-user stats-icon'></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-xl-3 col-md-6">
                <div class="card mb-4">
                    <div class="card-body stats-card stats-info">
                        <div class="row no-gutters align-items-center">
                            <div class="col">
                                <div class="text-xs font-weight-bold text-uppercase mb-1">Affectations</div>
                                <div class="h5 mb-0 font-weight-bold">{{ isset($statsAffectations) ? $statsAffectations : '93' }}</div>
                            </div>
                            <div class="col-auto">
                                <i class='bx bx-transfer-alt stats-icon'></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-xl-3 col-md-6">
                <div class="card mb-4">
                    <div class="card-body stats-card stats-warning">
                        <div class="row no-gutters align-items-center">
                            <div class="col">
                                <div class="text-xs font-weight-bold text-uppercase mb-1">Demandes</div>
                                <div class="h5 mb-0 font-weight-bold">{{ isset($statsDemandes) ? $statsDemandes : '24' }}</div>
                            </div>
                            <div class="col-auto">
                                <i class='bx bx-file stats-icon'></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-xl-12 col-md-12">
                <div class="card mb-4">
                    <div class="card-body stats-card stats-danger">
                        <div class="row no-gutters align-items-center">
                            <div class="col">
                                <div class="text-xs font-weight-bold text-uppercase mb-1">Réclamations</div>
                                <div class="h5 mb-0 font-weight-bold">{{ isset($statsReclamations) ? $statsReclamations : '12' }}</div>
                            </div>
                            <div class="col-auto">
                                <i class='bx bx-error-circle stats-icon'></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Quick Actions -->
        <div class="row">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <i class='bx bx-list-check'></i> Actions rapides
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <a href="/affectations/create" class="btn btn-custom-primary w-100">
                                    <i class='bx bx-transfer me-1'></i> Nouvelle affectation
                                </a>
                            </div>
                            <div class="col-md-6 mb-3">
                                <a href="#" class="btn btn-custom-primary w-100">
                                    <i class='bx bx-plus me-1'></i> Nouvelle demande
                                </a>
                            </div>
                            <div class="col-md-6 mb-3">
                                <a href="#" class="btn btn-custom-primary w-100">
                                    <i class='bx bx-error me-1'></i> Nouvelle réclamation
                                </a>
                            </div>
                            <div class="col-md-6 mb-3">
                                <a href="{{ route('materiels.create') }}" class="btn btn-outline-custom w-100">
                                    <i class='bx bx-plus me-1'></i> Ajouter un matériel
                                </a>
                            </div>
                            <div class="col-md-6 mb-3">
                                <a href="#" class="btn btn-outline-custom w-100">
                                    <i class='bx bx-user-plus me-1'></i> Créer un compte
                                </a>
                            </div>
                            <div class="col-md-6 mb-3">
                                <a href="{{ route('agents.create') }}" class="btn btn-outline-custom w-100">
                                    <i class='bx bx-user-plus me-1'></i> Ajouter un agent
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <i class='bx bx-time'></i> Activités récentes
                    </div>
                    <div class="card-body">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <div>
                                    <span class="fw-bold">Nouvelle affectation</span>
                                    <p class="small mb-0">Ordinateur portable - Morad Hamidi</p>
                                </div>
                                <span class="badge bg-primary rounded-pill">il y a 1h</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <div>
                                    <span class="fw-bold">Nouvelle demande de matériel</span>
                                    <p class="small mb-0">Par Ahmed Benali - Service IT</p>
                                </div>
                                <span class="badge bg-primary rounded-pill">il y a 2h</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <div>
                                    <span class="fw-bold">Réclamation traitée</span>
                                    <p class="small mb-0">Imprimante - 3ème étage</p>
                                </div>
                                <span class="badge bg-primary rounded-pill">il y a 5h</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <div>
                                    <span class="fw-bold">Nouveau matériel ajouté</span>
                                    <p class="small mb-0">5 ordinateurs portables - Dell XPS</p>
                                </div>
                                <span class="badge bg-primary rounded-pill">hier</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Boxicons -->
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
</body>
</html>