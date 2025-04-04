<?php
// Inclusion du fichier de configuration
require_once 'Modeles/config.inc.php';



// Vérification de la connexion
if (!$conn) {
    die("Erreur de connexion : " . mysqli_connect_error());
}

// Récupérer les classes depuis la base de données AVANT l'affichage du formulaire
$sql = "SELECT id_classes, nom_classe FROM CLASSES";
$result = $conn->query($sql);

$options = "";

// Vérifier si la requête a renvoyé un résultat
if ($result === false) {
    die("Erreur SQL : " . $conn->error);
}

while ($row = $result->fetch_assoc()) {
    $options .= '<option value="' . htmlspecialchars($row['id_classes']) . '">' . htmlspecialchars($row['nom_classe']) . '</option>';
}

// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['nom'], $_POST['prenom'], $_POST['id_classes'])) {
        // Récupérer les valeurs du formulaire
        $nom = trim($_POST['nom']);
        $prenom = trim($_POST['prenom']);
        $id_classes = intval($_POST['id_classes']); // Sécurisation du paramètre ID

        // Vérifier que tous les champs sont remplis
        if (!empty($nom) && !empty($prenom) && !empty($id_classes)) {
            // Préparer la requête SQL
            $sql = "INSERT INTO UTILISATEURS (nom, prenom, id_classes) VALUES (?, ?, ?)";
            $stmt = $conn->prepare($sql);
            if ($stmt) {
                $stmt->bind_param("ssi", $nom, $prenom, $id_classes);
                if ($stmt->execute()) {
                    echo "<p style='color:green;'>Nouvel enregistrement ajouté avec succès</p>";
                } else {
                    echo "<p style='color:red;'>Erreur lors de l'enregistrement : " . $stmt->error . "</p>";
                }
                $stmt->close();
            } else {
                echo "<p style='color:red;'>Erreur de préparation de requête</p>";
            }
        } else {
            echo "<p style='color:red;'>Veuillez remplir tous les champs</p>";
        }
    } else {
        echo "<p style='color:red;'>Données manquantes dans le formulaire</p>";
    }
}
?>