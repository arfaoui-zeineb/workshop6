<?php
require_once 'C:\xampp\htdocs\workshop6\controller\JoueurC.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['idJoueur']) && isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['email']) && isset($_POST['tel'])) {
        $joueurController = new JoueurC();
        $id = $_POST['idJoueur'];
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $email = $_POST['email'];
        $tel = $_POST['tel'];

        if ($joueurController->addJoueur($id, $nom, $prenom, $email, $tel)) {
            $message = 'Joueur ajouté avec succès.';
            $messageClass = 'success';
        } else {
            $message = 'Erreur lors de l\'ajout du joueur.';
            $messageClass = 'error';
        }

        // Redirection vers ListeJoueurs.php
        header('Location: ListeJoueurs.php');
        exit();
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Ajouter un joueur</title>
    <link rel="stylesheet" type="text/css" href="AddJoueurs.css">
</head>
<body>
    <h1>Ajouter un joueur</h1>
    <form method="POST">
        <label for="idJoueur">ID :</label>
        <input type="text" name="idJoueur" id="idJoueur" required><br><br>

        <label for="nom">Nom :</label>
        <input type="text" name="nom" id="nom" required><br><br>
        
        <label for "prenom">Prénom :</label>
        <input type="text" name="prenom" id="prenom" required><br><br>
        
        <label for="email">Email :</label>
        <input type="email" name="email" id="email" required><br><br>
        
        <label for="tel">Téléphone :</label>
        <input type="text" name="tel" id="tel" required><br><br>
        
        <input type="submit" name="ajouter" value="Ajouter">
    </form>
    
    <!-- Affichage du message de résultat -->
    <?php if (isset($message)) { ?>
        <div id="result-message" class="<?php echo $messageClass; ?>">
            <?php echo $message; ?>
        </div>
    <?php } ?>
</body>
</html>
