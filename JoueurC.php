<?php
require_once 'config.php';

class JoueurC
{
    public function listJoueurs()
    {
        $db = config::getConnexion();
        $query = "SELECT idJoueur, nom, prenom, email, tel FROM Joueur";
        $stmt = $db->query($query);
        return $stmt->fetchAll();
    }

    public function deleteJoueur($id)
    {
        $db = config::getConnexion();
        $query = "DELETE FROM Joueur WHERE idJoueur = :id";
        $stmt = $db->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
    }

    public function addJoueur($id, $nom, $prenom, $email, $tel) {
        $db = config::getConnexion();
        $query = "INSERT INTO Joueur (idJoueur, nom, prenom, email, tel) VALUES (:id, :nom, :prenom, :email, :tel)";
        $stmt = $db->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->bindParam(':nom', $nom, PDO::PARAM_STR);
        $stmt->bindParam(':prenom', $prenom, PDO::PARAM_STR);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->bindParam(':tel', $tel, PDO::PARAM_STR);
        return $stmt->execute(); 
    }

    public function getJoueurById($id) {
        $db = config::getConnexion();
        $query = "SELECT idJoueur, nom, prenom, email, tel FROM Joueur WHERE idJoueur = :id";
        $stmt = $db->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch();
    }
    
    
    public function updateJoueur($id, $nom, $prenom, $email, $tel) {
        $pdo = config::getConnexion();
    
        try {
            $query = $pdo->prepare('UPDATE joueur SET nom = :nom, prenom = :prenom, email = :email, tel = :tel WHERE idJoueur = :id');
            $query->bindParam(':id', $id, PDO::PARAM_INT);
            $query->bindParam(':nom', $nom);
            $query->bindParam(':prenom', $prenom);
            $query->bindParam(':email', $email);
            $query->bindParam(':tel', $tel);
            $query->execute();
            return true; 
        } catch (PDOException $e) {
            echo 'Erreur lors de la mise à jour du joueur : ' . $e->getMessage();
            return false;
        }
    }
}

