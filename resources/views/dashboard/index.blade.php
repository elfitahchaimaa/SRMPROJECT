<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau de bord - Parc Informatique</title>
    <style>
    /* Variables pour le thème */
    /* Général */

/* VARIABLES ET RESET */
:root {
  --primary: #4361ee;
  --primary-dark: #3a56d4;
  --secondary: #7209b7;
  --success: #06d6a0;
  --danger: #ef476f;
  --warning: #ffd166;
  --grey: #6c757d;
  --light-grey: #e9ecef;
  --dark: #343a40;
  --shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
  --transition: all 0.3s ease;
  --radius: 8px;
}

* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: 'Poppins', sans-serif;
}

body {
  display: flex;
  background-color: #f8f9fa;
  min-height: 100vh;
}

/* SIDEBAR */
.sidebar {
  width: 280px;
  background: linear-gradient(135deg, var(--dark) 0%, #212529 100%);
  color: white;
  padding: 1.5rem;
  display: flex;
  flex-direction: column;
  gap: 0.8rem;
  position: fixed;
  height: 100vh;
  overflow-y: auto;
  transition: var(--transition);
  box-shadow: var(--shadow);
  z-index: 10;
}

.brand {
  display: flex;
  align-items: center;
  gap: 0.8rem;
  padding-bottom: 1.5rem;
  margin-bottom: 1rem;
  border-bottom: 1px solid rgba(255, 255, 255, 0.1);
}

.brand div {
  font-size: 1.8rem;
}

.brand-name {
  font-size: 1.5rem;
  font-weight: 700;
  letter-spacing: 0.5px;
}

.brand-name span {
  color: var(--primary);
}

.menu-item {
  display: flex;
  align-items: center;
  gap: 0.8rem;
  padding: 0.8rem 1rem;
  color: rgba(255, 255, 255, 0.8);
  text-decoration: none;
  border-radius: var(--radius);
  transition: var(--transition);
}

.menu-item:hover {
  background-color: rgba(255, 255, 255, 0.1);
  color: white;
  transform: translateX(5px);
}

.menu-item.active {
  background-color: var(--primary);
  color: white;
  box-shadow: 0 4px 8px rgba(67, 97, 238, 0.3);
}

.menu-item div {
  font-size: 1.2rem;
  display: flex;
  align-items: center;
  justify-content: center;
  width: 24px;
}

/* MAIN CONTENT */
.main-content {
  flex: 1;
  margin-left: 280px;
  padding: 2rem;
}

.header {
  display: flex;
  justify-content: space-between;
  align-items: center;
  margin-bottom: 2rem;
  padding-bottom: 1rem;
  border-bottom: 1px solid var(--light-grey);
}

.header h1 {
  font-size: 1.8rem;
  font-weight: 700;
  color: var(--dark);
}

.header p {
  color: var(--grey);
  margin-top: 0.3rem;
}

.user-profile {
  display: flex;
  align-items: center;
  gap: 1rem;
  padding: 0.8rem 1rem;
  background-color: white;
  border-radius: var(--radius);
  box-shadow: var(--shadow);
}

.profile-img {
  width: 42px;
  height: 42px;
  background-color: var(--primary);
  color: white;
  display: flex;
  align-items: center;
  justify-content: center;
  border-radius: 50%;
  font-weight: 600;
}

.logout-btn {
  background: none;
  border: none;
  color: var(--danger);
  cursor: pointer;
  font-size: 0.85rem;
  padding: 0.3rem 0.6rem;
  margin-left: 1rem;
  border-radius: 4px;
  transition: var(--transition);
}

.logout-btn:hover {
  background-color: rgba(239, 71, 111, 0.1);
}

/* STAT CARDS */
.stat-cards {
  display: grid;
  grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
  gap: 1.5rem;
  margin-bottom: 2rem;
}

.stat-card {
  background: white;
  border-radius: var(--radius);
  box-shadow: var(--shadow);
  padding: 1.5rem;
  display: flex;
  align-items: center;
  gap: 1.2rem;
  transition: var(--transition);
}

.stat-card:hover {
  transform: translateY(-5px);
  box-shadow: 0 10px 20px rgba(0, 0, 0, 0.12);
}

.stat-icon {
  width: 56px;
  height: 56px;
  border-radius: 12px;
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 1.5rem;
}

.bg-primary {
  background-color: var(--primary);
  color: white;
}

.stat-details {
  flex: 1;
}

.stat-title {
  font-size: 0.75rem;
  font-weight: 600;
  color: var(--grey);
  letter-spacing: 0.5px;
}

.stat-value {
  font-size: 1.8rem;
  font-weight: 700;
  color: var(--dark);
  margin: 0.2rem 0;
}

.stat-desc {
  font-size: 0.8rem;
  color: var(--success);
}

/* RESPONSIVE */
@media (max-width: 992px) {
  .sidebar {
    width: 80px;
    padding: 1.5rem 0.8rem;
  }
  
  .brand-name, .menu-item span {
    display: none;
  }
  
  .brand {
    justify-content: center;
  }
  
  .menu-item {
    justify-content: center;
  }
  
  .main-content {
    margin-left: 80px;
  }
}

@media (max-width: 768px) {
  .header {
    flex-direction: column;
    align-items: flex-start;
    gap: 1rem;
  }
  
  .user-profile {
    width: 100%;
  }
  
  .stat-cards {
    grid-template-columns: 1fr;
  }
}

/* Bootstrap Integration */
.btn {
  padding: 0.5rem 1rem;
  border-radius: var(--radius);
  transition: var(--transition);
  font-weight: 500;
}

.btn-primary {
  background-color: var(--primary);
  border-color: var(--primary);
}

.btn-primary:hover {
  background-color: var(--primary-dark);
  border-color: var(--primary-dark);
}

.card {
  border-radius: var(--radius);
  box-shadow: var(--shadow);
  border: none;
  transition: var(--transition);
}

.card:hover {
  box-shadow: 0 8px 15px rgba(0, 0, 0, 0.1);
}

.form-control {
  border-radius: var(--radius);
  padding: 0.6rem 1rem;
}

.form-control:focus {
  border-color: var(--primary);
  box-shadow: 0 0 0 0.2rem rgba(67, 97, 238, 0.25);
}

/* Animation */
@keyframes fadeIn {
  from { opacity: 0; transform: translateY(10px); }
  to { opacity: 1; transform: translateY(0); }
}

.stat-card {
  animation: fadeIn 0.5s ease forwards;
}

.stat-card:nth-child(2) { animation-delay: 0.1s; }
.stat-card:nth-child(3) { animation-delay: 0.2s; }
.stat-card:nth-child(4) { animation-delay: 0.3s; }

    </style>
</head>
<!DOCTYPE html>
<body>
    <div class="sidebar">
        <div class="brand">
            <div>🖥️</div>
            <div class="brand-name">Tech<span>Assets</span></div>
        </div>
        <a href="#" class="menu-item active"><div>📊</div><span>Tableau de bord</span></a>
        <a href="#" class="menu-item"><div>💻</div><span>Équipements</span></a>
        <a href="#" class="menu-item"><div>👥</div><span>Utilisateurs</span></a>
        <a href="#" class="menu-item"><div>🔧</div><span>Maintenance</span></a>
        <a href="#" class="menu-item"><div>📄</div><span>Licences</span></a>
        <a href="#" class="menu-item"><div>📱</div><span>Mobiles</span></a>
        <a href="#" class="menu-item"><div>🔔</div><span>Notifications</span></a>
        <a href="#" class="menu-item"><div>📊</div><span>Rapports</span></a>
        <a href="#" class="menu-item"><div>⚙️</div><span>Paramètres</span></a>
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
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="logout-btn">🚪 Déconnexion</button>
                </form>
            </div>
        </div>
        
        <!-- CONTENU PRINCIPAL -->
        <div class="stat-cards">
            <div class="stat-card">
                <div class="stat-icon bg-primary">💻</div>
                <div class="stat-details">
                    <div class="stat-title">ÉQUIPEMENTS TOTAL</div>
                    <div class="stat-value">367</div>
                    <div class="stat-desc">+12 nouveaux ce mois</div>
                </div>
            </div>
        </div>
        
    </div>
</body>
</html>
