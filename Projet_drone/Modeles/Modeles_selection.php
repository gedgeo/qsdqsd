<?php
// Récupérer les utilisateurs depuis la base de données
$sql = "SELECT UTILISATEURS.nom, UTILISATEURS.prenom, CLASSES.nom_classe 
        FROM UTILISATEURS 
        JOIN CLASSES ON UTILISATEURS.id_classes = CLASSES.id_classes";
$result = $conn->query($sql);

// Affichage du tableau des utilisateurs
if ($result && $result->num_rows > 0) {
    echo "<table border='1'>
            <caption>Liste des utilisateurs</caption>
            <thead>
                <tr>
                    <th scope='col'>Nom</th>
                    <th scope='col'>Prénom</th>
                    <th scope='col'>Classe</th>
                </tr>
            </thead>
            <tbody>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . htmlspecialchars($row['nom']) . "</td>
                <td>" . htmlspecialchars($row['prenom']) . "</td>
                <td>" . htmlspecialchars($row['nom_classe']) . "</td>
              </tr>";
    }

    echo "</tbody></table>";
} else {
    echo "<p>Aucun utilisateur enregistré.</p>";
}

// Fermer la connexion à la base de données
$conn->close();
?>