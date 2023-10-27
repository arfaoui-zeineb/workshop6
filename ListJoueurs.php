<?php
require_once 'C:\xampp\htdocs\workshop6\controller\JoueurC.php';

$joueurController = new JoueurC();
$joueurs = $joueurController->listJoueurs();

if (isset($_GET['delete_id'])) {
    $idJoueurToDelete = $_GET['delete_id'];
    $joueurController->deleteJoueur($idJoueurToDelete);
    header("Location: ListJoueurs.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Liste des Joueurs</title>
    <link rel="stylesheet" type="text/css" href="JoueurC.css">
    <link rel="stylesheet" type="text/css" href="ListJoueurs.css"> <!-- Placez le lien vers votre feuille de style ici -->
</head>
<body>
    <h1>Liste des Joueurs</h1>
    <table border="1">
    <tr>
        <th>ID</th>
        <th>Nom</th>
        <th>Prénom</th>
        <th>E-mail</th>
        <th>Téléphone</th>
        <th>Action1</th>
        <th>Action2</th>
    </tr>
    <?php foreach ($joueurs as $joueur) { ?>
        <tr>
            <td><?php echo $joueur['idJoueur']; ?></td>
            <td><?php echo $joueur['nom']; ?></td>
            <td><?php echo $joueur['prenom']; ?></td>
            <td><?php echo $joueur['email']; ?></td>
            <td><?php echo $joueur['tel']; ?></td>
            <td><a href="?delete_id=<?php echo $joueur['idJoueur']; ?>">Supprimer</a></td>
            <td><a href="updateJoueur.php?id=<?php echo $joueur['idJoueur']; ?>">Mettre à jour</a></td>
        </tr>
    <?php } ?>
</table>


    <!-- Ajoutez un lien pour ajouter un joueur -->
    <a href="addJoueur.php">add</a>
</body>
</html>
