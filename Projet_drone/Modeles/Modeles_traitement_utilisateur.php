<?php
// Inclusion du fichier de configuration pour la connexion à la base de données
require_once 'Modeles/config.inc.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['nom'], $_POST['prenom'], $_POST['id_classes'])) {
        $nom = trim($_POST['nom']);
        $prenom = trim($_POST['prenom']);
        $id_classes = intval($_POST['id_classes']); // Sécurisation du paramètre ID

        if (!empty($nom) && !empty($prenom) && !empty($id_classes)) {
            // Vérifier si l'utilisateur existe déjà
            $sql_check = "SELECT COUNT(*) FROM UTILISATEURS WHERE nom = ? AND prenom = ?";
            $stmt_check = $conn->prepare($sql_check);

            if ($stmt_check) {
                $stmt_check->bind_param("ss", $nom, $prenom);
                $stmt_check->execute();
                $stmt_check->bind_result($count);
                $stmt_check->fetch();
                $stmt_check->close();

                if ($count > 0) {
                    $message = "<p style='color:red;'>Cet utilisateur existe déjà !</p>";
                } else {
                    // Insérer le nouvel utilisateur
                    $sql_insert = "INSERT INTO UTILISATEURS (nom, prenom, id_classes) VALUES (?, ?, ?)";
                    $stmt_insert = $conn->prepare($sql_insert);

                    if ($stmt_insert) {
                        $stmt_insert->bind_param("ssi", $nom, $prenom, $id_classes);
                        if ($stmt_insert->execute()) {
                            $message = "<p style='color:green;'>Nouvel enregistrement ajouté avec succès</p>";
                        } else {
                            $message = "<p style='color:red;'>Erreur lors de l'enregistrement : " . $stmt_insert->error . "</p>";
                        }
                        $stmt_insert->close();
                    } else {
                        $message = "<p style='color:red;'>Erreur de préparation de requête</p>";
                    }
                }
            } else {
                $message = "<p style='color:red;'>Erreur de vérification de l'utilisateur</p>";
            }
        } else {
            $message = "<p style='color:red;'>Veuillez remplir tous les champs</p>";
        }
    } else {
        $message = "<p style='color:red;'>Données manquantes dans le formulaire</p>";
    }
}

// Fermer la connexion à la base de données
$conn->close();

// Retourner le message pour affichage dans le formulaire
echo isset($message) ? $message : '';
?>
