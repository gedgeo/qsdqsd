<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simulateur de Drone</title>
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="drone_css.css">
</head>
<body>
    <div class="wrapper">
        <div class="top_navbar">
            <div class="hamburger">
                <div class="one"></div>
                <div class="two"></div>
                <div class="three"></div>
            </div>
            <div class="top_menu">
                <div class="logo">
                    SIMULATEUR DE DRONE
                </div>
                <ul>
                    <li><a href="#"><i class="fas fa-cog"></i></a></li>
                </ul>
            </div>
        </div>

         <div class="sidebar">
    <ul>
        <li><a href="acceuil.html">
            <span class="icon"><i class="fas fa-bars"></i></span>
            <span class="title">Accueil</span>
        </a></li>
        <li><a href="web.html" class="active">
            <span class="icon"><i class="fas fa-history"></i></span>
            <span class="title">Historique des vols</span>
        </a></li>
        <li><a href="stat.html">
            <span class="icon"><i class="fas fa-chart-bar"></i></span>
            <span class="title">Statistiques</span>
        </a></li>
        <li><a href="Ajout.html">
            <span class="icon"><i class="fas fa-map"></i></span>
            <span class="title">Ajout d'eleve</span>
        </a></li>
    </ul>
</div>

        <div class="main_container">
            <h2>Statistiques des vols</h2>
                <div class="cards-container">
                    <!-- Carte exemple 1 -->
                    <div class="simulation-card">
                        <div class="card-header">
                            <div class="user-info">
                                <i class="fas fa-user"></i>
                                <span class="nom-prenom">Dupont Jean</span>
                            </div>
                            <div class="simulation-date">
                                <i class="fas fa-calendar-alt"></i>
                                24/04/2024 14:30
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="info-item">
                                <span class="info-label">Type de simulation:</span>
                                <span class="info-value">Reconnaissance</span>
                            </div>
                            <div class="info-item">
                                <span class="info-label">Durée de simulation:</span>
                                <span class="info-value badge">5 min</span>
                            </div>
                            <div class="info-item">
                                <span class="info-label">Objectif de la simulation:</span>
                                <span class="info-value badge">faire le tour du poteau</span>
                            </div>
                            <div class="info-item">
                                <span class="info-label">Fin de simulation:</span>
                                <span class="info-value badge">4 min et 25 seconde</span>
                            </div>
                        </div>
        </div>
    
        <div id="chartContainer" style="display:none; text-align: center;">
            <canvas id="pieChart"></canvas>
        </div>
    </div>

    <script src="web.js"></script>
</body>
</html>
