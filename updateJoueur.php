<?php
require_once 'C:\xampp\htdocs\workshop6\controller\JoueurC.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['id']) && isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['email']) && isset($_POST['tel'])) {
        $joueurController = new JoueurC(); 
        $id = $_POST['id'];
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $email = $_POST['email'];
        $tel = $_POST['tel'];

        if ($joueurController->updateJoueur($id, $nom, $prenom, $email, $tel)) {
            echo 'Joueur mis à jour avec succès.';
        } else {
            echo 'Erreur lors de la mise à jour du joueur.';
        }

        header('Location: ListJoueurs.php');
        exit();
    }
} elseif (isset($_GET['id'])) {
    $id = $_GET['id'];
    $joueurController = new JoueurC(); 
    $joueur = $joueurController->getJoueurById($id);

    if (!$joueur) {
        echo 'Joueur non trouvé.';
        exit();
    }
} else {
    echo 'ID du joueur non spécifié.';
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Modifier un joueur</title>
    <link rel="stylesheet" type="text/css" href="UpdateJoueur.css">

</head>
<body>
    <h1>Modifier un joueur</h1>
    <form method="POST">
        <input type="hidden" name="id" value="<?php echo $joueur['idJoueur']; ?>">
        <label for="nom">Nom :</label>
        <input type="text" name="nom" id="nom" value="<?php echo $joueur['nom']; ?>" required><br><br>
        
        <label for "prenom">Prénom :</label>
        <input type="text" name="prenom" id="prenom" value="<?php echo $joueur['prenom']; ?>" required><br><br>
        
        <label for="email">Email :</label>
        <input type="email" name="email" id="email" value="<?php echo $joueur['email']; ?>" required><br><br>
        
        <label for="tel">Téléphone :</label>
        <input type="text" name="tel" id="tel" value="<?php echo $joueur['tel']; ?>" required><br><br>
        
        <input type="submit" value="Mettre à jour">
    </form>
</body>
</html>
