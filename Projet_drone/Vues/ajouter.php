<?php
$conn = getConnexion();
$options = getOptionsClasses($conn);
traiterFormulaire($conn);
?>
<?php
afficherTableauUtilisateurs($conn);
$conn->close();
?>

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


