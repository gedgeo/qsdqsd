<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simulateur de Drone</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
</head>
<body>
    <div class="container-fluid">
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
                <a class="nav-link" href="ajouter.php">Ajout d'élève</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="connection.php">Connection</a>
            </li>
        </ul>
    </nav>

        <div class="row">
            <!-- Formulaire HTML -->
    <form method="POST" action="">
    <label for="nom">Nom :</label>
    <input type="text" id="nom" name="nom" required><br><br>
    
    <label for="prenom">Prénom :</label>
    <input type="text" id="prenom" name="prenom" required><br><br>
    
    <label for="id_classes">Classe :</label>
    <select id="id_classes" name="id_classes" required>
        <option value="">Sélectionner une classe</option>
        <?= $options ?>
    </select><br><br>

    <button type="submit">Ajouter</button>
    </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
