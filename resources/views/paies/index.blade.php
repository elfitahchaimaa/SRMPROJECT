<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Système de Gestion du Personnel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f4f6f9;
            font-family: 'Arial', sans-serif;
        }

        .navbar {
            margin-bottom: 20px;
            background-color: #ffffff;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }

        .sidebar {
            background-color: #ffffff;
            border-right: 1px solid #e0e0e0;
            min-height: 100vh;
            padding: 20px;
        }

        .sidebar .nav-link {
            color: #6c757d;
            padding: 10px 15px;
        }

        .sidebar .nav-link.active {
            background-color: #007bff;
            color: white;
            border-radius: 5px;
        }

        .dashboard-card {
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            margin-bottom: 20px;
            padding: 20px;
        }

        .stats-card {
            background-color: #ffffff;
            border-radius: 10px;
            padding: 15px;
            text-align: center;
        }

        .stats-card.yellow { border-top: 4px solid #ffc107; }
        .stats-card.green { border-top: 4px solid #28a745; }
        .stats-card.red { border-top: 4px solid #dc3545; }

        .table-responsive {
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            padding: 20px;
        }

        .status-badge {
            padding: 5px 10px;
            border-radius: 20px;
            font-size: 0.8rem;
        }

        .status-complete { background-color: #28a745; color: white; }
        .status-pending { background-color: #ffc107; color: black; }
        .status-draft { background-color: #6c757d; color: white; }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
            <a class="navbar-brand" href="#">Système de Gestion du Personnel</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link" href="#">Tableau de bord</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Employés</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Départements</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Contrats</a></li>
                    <li class="nav-item"><a class="nav-link active" href="#">Paie</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Rapports</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Paramètres</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2 sidebar">
                <h5 class="mb-4">Gestion de la paie</h5>
                <ul class="nav flex-column">
                    <li class="nav-item"><a class="nav-link active" href="#">Vue d'ensemble</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Bulletins de paie</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Calendrier de paie</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Heures supplémentaires</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Primes & bonus</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Déductions</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Congés payés</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Paramètres fiscaux</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Rapports de paie</a></li>
                </ul>
            </div>

            <div class="col-md-10">
                <div class="row mb-4">
                    <div class="col-md-3">
                        <div class="stats-card">
                            <h6>Bulletins générés ce mois</h6>
                            <h3>215</h3>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="stats-card yellow">
                            <h6>En attente de validation</h6>
                            <h3>12</h3>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="stats-card green">
                            <h6>Masse salariale (mois)</h6>
                            <h3>427 850 €</h3>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="stats-card red">
                            <h6>Congés payés à traiter</h6>
                            <h3>8</h3>
                        </div>
                    </div>
                </div>

                <div class="dashboard-card mb-4">
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <select class="form-select">
                                <option>Mars 2025</option>
                                <option>Février 2025</option>
                                <option>Janvier 2025</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <select class="form-select">
                                <option>Tous les départements</option>
                                <option>Marketing</option>
                                <option>Ressources Humaines</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <div class="d-flex">
                                <button class="btn btn-primary me-2">Filtrer</button>
                                <button class="btn btn-secondary">Réinitialiser</button>
                            </div>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Employé</th>
                                    <th>Département</th>
                                    <th>Brut</th>
                                    <th>Net</th>
                                    <th>Statut</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>P-001</td>
                                    <td>Jean Dupont</td>
                                    <td>Marketing</td>
                                    <td>4 500,00 €</td>
                                    <td>3 487,50 €</td>
                                    <td><span class="badge status-badge status-complete">Complété</span></td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            <button class="btn btn-sm btn-outline-primary">Voir</button>
                                            <button class="btn btn-sm btn-outline-warning">Éditer</button>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>P-002</td>
                                    <td>Marie Martin</td>
                                    <td>Ressources Humaines</td>
                                    <td>3 800,00 €</td>
                                    <td>2 945,00 €</td>
                                    <td><span class="badge status-badge status-pending">En attente</span></td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            <button class="btn btn-sm btn-outline-primary">Voir</button>
                                            <button class="btn btn-sm btn-outline-warning">Éditer</button>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>