<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Accueil - Simulateur de Drone</title>
    
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <script src="https://kit.fontawesome.com/b99e675b6e.js" crossorigin="anonymous"></script>
    
    <!-- Fichier CSS -->
    <link href="libs/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
</head>
<body>

    <!-- navbar -->
    <nav  class="navbar navbar-expand-sm bg-dark navbar-dark">
        <a class="navbar-brand" href="#">LOGO</a>
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="acceuil.php">acceuil</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="historique.php">Historique des vols</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="stat.php">Statistiques</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="Ajout.php">Ajout d'élève</a>
            </li>
        </ul>
    </nav>
    <!-- Contenu principal -->
    <div class="main-content">
        <div class="container">
            <h1 class="my-4 text-primary">Bienvenue sur le Simulateur de Drone</h1>
            <p>Explorez notre simulateur pour apprendre et améliorer vos compétences de pilotage.</p>
            
            <div class="accueil-buttons">
                <a href="historique.php" class="btn btn-primary"><i class="fas fa-history"></i> Voir l'historique des vols</a>
                <a href="stat.php" class="btn btn-success"><i class="fas fa-chart-bar"></i> Consulter les statistiques</a>
                <a href="ajout.php" class="btn btn-warning"><i class="fas fa-user-plus"></i> Ajouter un élève</a>
            </div>
        </div>
    </div>

    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="web.js"></script>
</body>
</html>
