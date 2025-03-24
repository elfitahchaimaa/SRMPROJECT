<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau de bord - Parc Informatique</title>
    <style>
    /* Variables pour le thème */
:root {
  --primary: #4361ee;
  --primary-light: #4cc9f0;
  --secondary: #7209b7;
  --success: #06d6a0;
  --warning: #ffd166;
  --danger: #ef476f;
  --light: #f8f9fa;
  --dark: #212529;
  --grey: #6c757d;
  --background: #f4f7fc;
  --card-bg: #ffffff;
  --card-shadow: 0 8px 24px rgba(149, 157, 165, 0.1);
  --transition: all 0.3s ease-in-out;
}

/* Styles généraux */
body {
  font-family: 'Poppins', sans-serif;
  background-color: var(--background);
  margin: 0;
  padding: 0;
  overflow-x: hidden;
  color: var(--dark);
}

.container-fluid {
  padding: 0;
}

/* Barre latérale */
.sidebar {
  background: linear-gradient(180deg, var(--primary) 0%, var(--secondary) 100%);
  color: white;
  width: 280px;
  height: 100vh;
  position: fixed;
  left: 0;
  top: 0;
  padding: 1.5rem 1rem;
  transition: var(--transition);
  z-index: 100;
  box-shadow: 4px 0 10px rgba(0, 0, 0, 0.1);
}

.sidebar .brand {
  display: flex;
  align-items: center;
  margin-bottom: 2.5rem;
  padding-left: 0.5rem;
}

.sidebar .brand div:first-child {
  font-size: 1.8rem;
  margin-right: 0.75rem;
}

.brand-name {
  font-size: 1.5rem;
  font-weight: 700;
  letter-spacing: 0.5px;
}

.brand-name span {
  font-weight: 300;
  opacity: 0.8;
}

.menu-item {
  display: flex;
  align-items: center;
  padding: 0.85rem 1rem;
  margin-bottom: 0.5rem;
  border-radius: 10px;
  color: rgba(255, 255, 255, 0.8);
  text-decoration: none;
  transition: var(--transition);
}

.menu-item div {
  margin-right: 0.75rem;
  font-size: 1.2rem;
  width: 24px;
  text-align: center;
}

.menu-item .menu-text {
  font-size: 0.95rem;
  font-weight: 500;
}

.menu-item:hover {
  background-color: rgba(255, 255, 255, 0.15);
  color: white;
  transform: translateX(3px);
}

.menu-item.active {
  background-color: rgba(255, 255, 255, 0.2);
  color: white;
  font-weight: 600;
  box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
}

/* Contenu principal */
.main-content {
  margin-left: 280px;
  padding: 1.5rem 2rem;
  min-height: 100vh;
  transition: var(--transition);
}

.header {
  display: flex;
  justify-content: space-between;
  align-items: center;
  margin-bottom: 1.5rem;
  padding-bottom: 1rem;
  border-bottom: 1px solid rgba(0, 0, 0, 0.05);
}

.header h1 {
  font-weight: 700;
  font-size: 1.8rem;
  margin-bottom: 0.25rem;
  background: linear-gradient(90deg, var(--primary) 0%, var(--secondary) 100%);
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
}

.header p {
  color: var(--grey);
  margin: 0;
}

.user-profile {
  display: flex;
  align-items: center;
  gap: 0.75rem;
  padding: 0.75rem 1rem;
  background-color: var(--card-bg);
  border-radius: 50px;
  box-shadow: var(--card-shadow);
  transition: var(--transition);
}

.user-profile:hover {
  transform: translateY(-3px);
  box-shadow: 0 10px 25px rgba(149, 157, 165, 0.15);
}

.profile-img {
  background: linear-gradient(135deg, var(--primary) 0%, var(--secondary) 100%);
  color: white;
  height: 40px;
  width: 40px;
  border-radius: 50%;
  display: flex;
  align-items: center;
  justify-content: center;
  font-weight: 600;
}

/* Cartes statistiques */
.stat-cards {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
  gap: 1.5rem;
  margin-bottom: 1.5rem;
}

.stat-card {
  background: var(--card-bg);
  border-radius: 16px;
  padding: 1.5rem;
  display: flex;
  align-items: center;
  box-shadow: var(--card-shadow);
  transition: var(--transition);
  position: relative;
  overflow: hidden;
}

.stat-card:hover {
  transform: translateY(-5px);
  box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
}

.stat-card::before {
  content: '';
  position: absolute;
  top: 0;
  left: 0;
  width: 5px;
  height: 100%;
  background: linear-gradient(to bottom, var(--primary), var(--secondary));
  border-top-left-radius: 16px;
  border-bottom-left-radius: 16px;
}

.stat-icon {
  width: 50px;
  height: 50px;
  border-radius: 12px;
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 1.5rem;
  margin-right: 1rem;
  box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
}

.bg-primary {
  background: linear-gradient(135deg, var(--primary) 0%, var(--primary-light) 100%);
  color: white;
}

.bg-success {
  background: linear-gradient(135deg, var(--success) 0%, #39e5ac 100%);
  color: white;
}

.bg-warning {
  background: linear-gradient(135deg, var(--warning) 0%, #ffdd76 100%);
  color: white;
}

.bg-danger {
  background: linear-gradient(135deg, var(--danger) 0%, #ff7e9d 100%);
  color: white;
}

.stat-details {
  flex: 1;
}

.stat-title {
  font-size: 0.75rem;
  font-weight: 600;
  letter-spacing: 1px;
  text-transform: uppercase;
  color: var(--grey);
  margin-bottom: 0.25rem;
}

.stat-value {
  font-size: 1.75rem;
  font-weight: 700;
  line-height: 1.2;
  margin-bottom: 0.25rem;
}

.stat-desc {
  font-size: 0.85rem;
  color: var(--grey);
}

/* Cartes principales */
.main-card {
  background: var(--card-bg);
  border-radius: 16px;
  box-shadow: var(--card-shadow);
  margin-bottom: 1.5rem;
  transition: var(--transition);
  overflow: hidden;
}

.main-card:hover {
  box-shadow: 0 12px 30px rgba(149, 157, 165, 0.15);
}

.card-header {
  padding: 1.25rem 1.5rem;
  border-bottom: 1px solid rgba(0, 0, 0, 0.05);
  display: flex;
  align-items: center;
  justify-content: space-between;
  flex-wrap: wrap;
  gap: 1rem;
}

.card-title {
  font-size: 1.1rem;
  font-weight: 600;
  color: var(--dark);
}

.search-bar {
  display: flex;
  align-items: center;
  background-color: rgba(0, 0, 0, 0.03);
  border-radius: 50px;
  padding: 0.5rem 1rem;
  flex: 1;
  max-width: 400px;
}

.search-icon {
  margin-right: 0.5rem;
  color: var(--grey);
}

.search-input {
  border: none;
  background: transparent;
  outline: none;
  width: 100%;
  font-size: 0.9rem;
}

.filter-btn {
  background: linear-gradient(90deg, var(--primary) 0%, var(--secondary) 100%);
  color: white;
  border: none;
  padding: 0.5rem 1.25rem;
  border-radius: 50px;
  display: flex;
  align-items: center;
  gap: 0.5rem;
  font-weight: 500;
  cursor: pointer;
  transition: var(--transition);
  box-shadow: 0 4px 12px rgba(67, 97, 238, 0.2);
}

.filter-btn:hover {
  transform: translateY(-2px);
  box-shadow: 0 6px 15px rgba(67, 97, 238, 0.3);
}

/* Tableau de données */
.table-container {
  padding: 0 1.5rem;
  overflow-x: auto;
}

.data-table {
  width: 100%;
  border-collapse: separate;
  border-spacing: 0;
  margin: 1rem 0;
}

.data-table th, .data-table td {
  padding: 1rem 0.75rem;
  text-align: left;
}

.data-table thead tr {
  background-color: rgba(0, 0, 0, 0.02);
}

.data-table th {
  font-size: 0.85rem;
  font-weight: 600;
  text-transform: uppercase;
  letter-spacing: 0.5px;
  color: var(--grey);
}

.data-table tbody tr {
  border-bottom: 1px solid rgba(0, 0, 0, 0.05);
  transition: var(--transition);
}

.data-table tbody tr:hover {
  background-color: rgba(67, 97, 238, 0.03);
}

.status {
  padding: 0.25rem 0.75rem;
  border-radius: 50px;
  font-size: 0.75rem;
  font-weight: 600;
  display: inline-block;
}

.status-active {
  background-color: rgba(6, 214, 160, 0.1);
  color: var(--success);
}

.status-maintenance {
  background-color: rgba(255, 209, 102, 0.1);
  color: var(--warning);
}

.status-inactive {
  background-color: rgba(108, 117, 125, 0.1);
  color: var(--grey);
}

.action-btn {
  background: none;
  border: none;
  width: 30px;
  height: 30px;
  border-radius: 50%;
  display: inline-flex;
  align-items: center;
  justify-content: center;
  cursor: pointer;
  transition: var(--transition);
}

.action-btn:hover {
  background-color: rgba(0, 0, 0, 0.05);
}

/* Pagination */
.card-footer {
  padding: 1rem 1.5rem;
  display: flex;
  justify-content: space-between;
  align-items: center;
  background-color: rgba(0, 0, 0, 0.01);
  border-top: 1px solid rgba(0, 0, 0, 0.05);
  font-size: 0.9rem;
  color: var(--grey);
}

.pagination {
  display: flex;
  list-style: none;
  padding: 0;
  margin: 0;
  gap: 0.25rem;
}

.pagination li a {
  display: flex;
  align-items: center;
  justify-content: center;
  width: 36px;
  height: 36px;
  border-radius: 8px;
  text-decoration: none;
  color: var(--primary);
  font-weight: 500;
  transition: var(--transition);
}

.pagination li a:hover {
  background-color: rgba(67, 97, 238, 0.1);
}

.pagination li a.active {
  background: linear-gradient(90deg, var(--primary) 0%, var(--secondary) 100%);
  color: white;
  box-shadow: 0 4px 10px rgba(67, 97, 238, 0.2);
}

/* Layout colonnes */
.two-columns {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
  gap: 1.5rem;
}

/* Animations */
@keyframes pulse {
  0% {
    transform: scale(1);
  }
  50% {
    transform: scale(1.05);
  }
  100% {
    transform: scale(1);
  }
}

/* Media Queries pour la responsivité */
@media (max-width: 992px) {
  .sidebar {
    width: 70px;
    padding: 1.5rem 0.5rem;
  }
  
  .brand-name, .menu-text {
    display: none;
  }
  
  .menu-item {
    justify-content: center;
    padding: 0.85rem 0;
  }
  
  .menu-item div {
    margin-right: 0;
  }
  
  .main-content {
    margin-left: 70px;
  }
}

@media (max-width: 768px) {
  .main-content {
    padding: 1rem;
  }
  
  .stat-cards {
    grid-template-columns: 1fr;
  }
  
  .header {
    flex-direction: column;
    align-items: flex-start;
    gap: 1rem;
  }
  
  .user-profile {
    align-self: flex-start;
  }
  
  .card-header {
    flex-direction: column;
    align-items: flex-start;
  }
  
  .search-bar {
    max-width: 100%;
    width: 100%;
  }
}

/* Retouches Bootstrap */
.btn-primary {
  background: linear-gradient(90deg, var(--primary) 0%, var(--secondary) 100%);
  border: none;
  box-shadow: 0 4px 12px rgba(67, 97, 238, 0.2);
  transition: var(--transition);
}

.btn-primary:hover {
  transform: translateY(-2px);
  box-shadow: 0 6px 15px rgba(67, 97, 238, 0.3);
}

/* Animation de chargement des cartes */
.stat-card, .main-card {
  animation: fadeInUp 0.5s ease-in-out;
}

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

/* Effets de survol améliorés */
.stat-card:hover .stat-icon {
  animation: pulse 1s infinite;
}

/* Mode sombre */
@media (prefers-color-scheme: dark) {
  :root {
    --background: #1a1d21;
    --card-bg: #252a30;
    --dark: #e9ecef;
    --grey: #adb5bd;
    --card-shadow: 0 8px 24px rgba(0, 0, 0, 0.2);
  }
  
  .search-bar {
    background-color: rgba(255, 255, 255, 0.05);
  }
  
  .search-input {
    color: var(--dark);
  }
  
  .data-table thead tr {
    background-color: rgba(255, 255, 255, 0.05);
  }
  
  .card-footer {
    background-color: rgba(255, 255, 255, 0.02);
  }
  
  .data-table tbody tr:hover {
    background-color: rgba(67, 97, 238, 0.1);
  }
  
  .action-btn:hover {
    background-color: rgba(255, 255, 255, 0.1);
  }
}
    </style>
</head>
<body>
    <div class="sidebar">
        <div class="brand">
            <div>🖥️</div>
            <div class="brand-name">Tech<span>Assets</span></div>
        </div>
        
        <a href="#" class="menu-item active">
            <div>📊</div>
            <span class="menu-text">Tableau de bord</span>
        </a>
        <a href="#" class="menu-item">
            <div>💻</div>
            <span class="menu-text">Équipements</span>
        </a>
        <a href="#" class="menu-item">
            <div>👥</div>
            <span class="menu-text">Utilisateurs</span>
        </a>
        <a href="#" class="menu-item">
            <div>🔧</div>
            <span class="menu-text">Maintenance</span>
        </a>
        <a href="#" class="menu-item">
            <div>📄</div>
            <span class="menu-text">Licences</span>
        </a>
        <a href="#" class="menu-item">
            <div>📱</div>
            <span class="menu-text">Mobiles</span>
        </a>
        <a href="#" class="menu-item">
            <div>🔔</div>
            <span class="menu-text">Notifications</span>
        </a>
        <a href="#" class="menu-item">
            <div>📊</div>
            <span class="menu-text">Rapports</span>
        </a>
        <a href="#" class="menu-item">
            <div>⚙️</div>
            <span class="menu-text">Paramètres</span>
        </a>
    </div>
    
    <div class="main-content">
        <div class="header">
            <div>
                <h1>Tableau de bord</h1>
                <p>Bienvenue dans votre espace de gestion de parc informatique</p>
            </div>
            <div class="user-profile">
                <div class="profile-img">AD</div>
                <div>
                    <div style="font-weight: 600;">Admin Système</div>
                    <div style="font-size: 0.8rem; color: var(--grey);">admin@techassets.fr</div>
                </div>
            </div>
        </div>
        
        <div class="stat-cards">
            <div class="stat-card">
                <div class="stat-icon bg-primary">💻</div>
                <div class="stat-details">
                    <div class="stat-title">ÉQUIPEMENTS TOTAL</div>
                    <div class="stat-value">367</div>
                    <div class="stat-desc">+12 nouveaux ce mois</div>
                </div>
            </div>
            
            <div class="stat-card">
                <div class="stat-icon bg-success">👥</div>
                <div class="stat-details">
                    <div class="stat-title">UTILISATEURS</div>
                    <div class="stat-value">215</div>
                    <div class="stat-desc">92% des équipements assignés</div>
                </div>
            </div>
            
            <div class="stat-card">
                <div class="stat-icon bg-warning">🔧</div>
                <div class="stat-details">
                    <div class="stat-title">EN MAINTENANCE</div>
                    <div class="stat-value">18</div>
                    <div class="stat-desc">4.9% du parc total</div>
                </div>
            </div>
            
            <div class="stat-card">
                <div class="stat-icon bg-danger">⚠️</div>
                <div class="stat-details">
                    <div class="stat-title">ALERTES</div>
                    <div class="stat-value">7</div>
                    <div class="stat-desc">3 critiques, 4 modérées</div>
                </div>
            </div>
        </div>
        
        <div class="main-card">
            <div class="card-header">
                <div class="card-title">Inventaire des équipements</div>
                <div class="search-bar">
                    <span class="search-icon">🔍</span>
                    <input type="text" class="search-input" placeholder="Rechercher un équipement...">
                </div>
                <button class="filter-btn">
                    <span>🔍</span> Filtrer
                </button>
            </div>
            
            <div class="table-container">
                <table class="data-table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Équipement</th>
                            <th>Utilisateur</th>
                            <th>Département</th>
                            <th>Date d'achat</th>
                            <th>Statut</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>#PC-2025-125</td>
                            <td>MacBook Pro M3</td>
                            <td>Marie Laurent</td>
                            <td>Design</td>
                            <td>12 Jan 2025</td>
                            <td><span class="status status-active">Actif</span></td>
                            <td>
                                <button class="action-btn">✏️</button>
                                <button class="action-btn">👁️</button>
                                <button class="action-btn">⋮</button>
                            </td>
                        </tr>
                        <tr>
                            <td>#PC-2024-089</td>
                            <td>Dell XPS 15</td>
                            <td>Thomas Blanc</td>
                            <td>Développement</td>
                            <td>05 Nov 2024</td>
                            <td><span class="status status-maintenance">Maintenance</span></td>
                            <td>
                                <button class="action-btn">✏️</button>
                                <button class="action-btn">👁️</button>
                                <button class="action-btn">⋮</button>
                            </td>
                        </tr>
                        <tr>
                            <td>#MON-2025-042</td>
                            <td>Dell UltraSharp 32"</td>
                            <td>Julie Moreau</td>
                            <td>Comptabilité</td>
                            <td>18 Fév 2025</td>
                            <td><span class="status status-active">Actif</span></td>
                            <td>
                                <button class="action-btn">✏️</button>
                                <button class="action-btn">👁️</button>
                                <button class="action-btn">⋮</button>
                            </td>
                        </tr>
                        <tr>
                            <td>#TAB-2025-018</td>
                            <td>iPad Pro 12.9"</td>
                            <td>Michel Dubois</td>
                            <td>Commercial</td>
                            <td>03 Fév 2025</td>
                            <td><span class="status status-active">Actif</span></td>
                            <td>
                                <button class="action-btn">✏️</button>
                                <button class="action-btn">👁️</button>
                                <button class="action-btn">⋮</button>
                            </td>
                        </tr>
                        <tr>
                            <td>#PC-2023-054</td>
                            <td>Lenovo ThinkPad X1</td>
                            <td>Sophie Martin</td>
                            <td>Ressources Humaines</td>
                            <td>22 Mai 2023</td>
                            <td><span class="status status-inactive">Hors service</span></td>
                            <td>
                                <button class="action-btn">✏️</button>
                                <button class="action-btn">👁️</button>
                                <button class="action-btn">⋮</button>
                            </td>
                        </tr>
                        <tr>
                            <td>#SRV-2025-004</td>
                            <td>Dell PowerEdge R750</td>
                            <td>Équipe IT</td>
                            <td>Infrastructure</td>
                            <td>08 Jan 2025</td>
                            <td><span class="status status-active">Actif</span></td>
                            <td>
                                <button class="action-btn">✏️</button>
                                <button class="action-btn">👁️</button>
                                <button class="action-btn">⋮</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            
            <div class="card-footer">
                <div>Affichage de 1-6 sur 367 entrées</div>
                <ul class="pagination">
                    <li><a href="#">⬅️</a></li>
                    <li><a href="#" class="active">1</a></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#">...</a></li>
                    <li><a href="#">62</a></li>
                    <li><a href="#">➡️</a></li>
                </ul>
            </div>
        </div>
        
        <div class="two-columns">
            <div class="main-card">
                <div class="card-header">
                    <div class="card-title">Équipements par département</div>
                </div>
                <div style="padding: 1.5rem; height: 250px; display: flex; align-items: center; justify-content: center;">
                    [Graphique Distribution par Département]
                </div>
            </div>
            
            <div class="main-card">
                <div class="card-header">
                    <div class="card-title">Alertes récentes</div>
                </div>
                <div style="padding: 1rem;">
                    <div style="padding: 0.75rem; border-bottom: 1px solid #eee;">
                        <div style="display: flex; justify-content: space-between;">
                            <div style="font-weight: 600;">Mise à jour disponible</div>
                            <div style="font-size: 0.8rem; color: var(--grey);">Il y a 2h</div>
                        </div>
                        <div style="font-size: 0.9rem; margin-top: 0.25rem;">25 appareils nécessitent une mise à jour de sécurité</div>
                    </div>
                    <div style="padding: 0.75rem; border-bottom: 1px solid #eee;">
                        <div style="display: flex; justify-content: space-between;">
                            <div style="font-weight: 600;">License expirée</div>
                            <div style="font-size: 0.8rem; color: var(--grey);">Il y a 5h</div>
                        </div>
                        <div style="font-size: 0.9rem; margin-top: 0.25rem;">Adobe Creative Cloud - 3 licences expirées</div>
                    </div>
                    <div style="padding: 0.75rem; border-bottom: 1px solid #eee;">
                        <div style="display: flex; justify-content: space-between;">
                            <div style="font-weight: 600;">Stockage critique</div>
                            <div style="font-size: 0.8rem; color: var(--grey);">Il y a 1j</div>
                        </div>
                        <div style="font-size: 0.9rem; margin-top: 0.25rem;">Serveur de fichiers principal à 92% de capacité</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
</html>
