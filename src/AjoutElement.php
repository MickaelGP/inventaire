<?php
namespace App;

use PDO;
use PDOException;


class AjoutElement{
    // Instance de PDO pour les opérations de base de données
    private $pdo;

     /**
     * Constructeur AjoutElement.
     *
     * @param PDO $pdo Une instance PDO pour les opérations de base de données.
     *
     */
    public function __construct($pdo)
    {
        // Initialise l'instance PDO
        $this->pdo = $pdo; 
    }

    /**
     * Ajoute un nouvel élément à la table d'inventaire.
     *
     * Cette méthode insère un nouvel enregistrement dans la table `inventaire` avec le nom,
     * la quantité et la date d'expiration (facultative) de l'élément fournis.
     *
     * @param string $element Le nom de l'élément à ajouter.
     * @param int $quantites La quantité de l'élément à ajouter.
     * @param string $date (optionnel) La date d'expiration de l'élément (défaut : deux mois à partir de maintenant).
     * @return bool True en cas de succès, false sinon.
     */
    public function ajout(string $element, int $quantites,string $date = '' )
    {
        // Si aucune date n'est fournie, définir la date d'expiration à deux mois à partir de maintenant
        if($date === ''){
            $date = date("Y-m-d", strtotime('+2 month'));
        }
        // Préparer la requête SQL pour insérer un nouvel enregistrement dans la table inventaire
        $query = $this->pdo->prepare("INSERT INTO inventaire (aliments, quantites, dates) VALUES (:element, :quantite, :date)");
        
        // Essayer d'exécuter la requête, en attrapant les exceptions PDO éventuelles
        try {
            $success = $query->execute([
                ':element' => $element,
                ':quantite' => $quantites,
                ':date' => $date
            ]);

            // Rediriger vers la page d'accueil en cas de succès
            if ($success) {
                header("Location: /");
                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            // Enregistrer l'erreur en cas d'exception
            error_log("Erreur lors de l'ajout d'un élément : " . $e->getMessage());
            return false;
        }
    }
}