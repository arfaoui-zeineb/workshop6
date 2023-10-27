<?php
require_once 'C:\xampp\htdocs\workshop6\controller\JoueurC.php';

if (isset($_GET['id'])) {
    $idJoueur = $_GET['id'];
    $joueurController = new JoueurC();
    $joueurController->deleteJoueur($idJoueur);
}

header("C:\xampp\htdocs\workshop6\views\ListJoueurs.php"); // Redirection vers la liste des joueurs
exit;
?>
