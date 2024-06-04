<?php

namespace App;


use PDO;
use App\Aliments;
use PDOException;

class Modif
{
    // Nom de la table dans la base de données
    protected $table = "inventaire";

    // Nom de la classe associée aux résultats des requêtes
    protected $class = Aliments::class;

    // Instance de PDO pour les opérations de base de données
    private $pdo;

    /**
     * Constructeur de la classe Modif.
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
     * Sélectionne un élément par son ID.
     *
     * @param string $id L'ID de l'élément à sélectionner.
     * @return Aliments|false L'élément trouvé ou false si aucun élément n'est trouvé.
     */
    public function selectById(string $id)
    {
        try {
            $query = $this->pdo->prepare("SELECT * FROM " . $this->table . " WHERE id = :id");
            $query->execute([':id' => $id]);

            // Définit le mode de récupération en tant qu'objet de la classe spécifiée
            $query->setFetchMode(PDO::FETCH_CLASS, $this->class);

            // Récupère le résultat de la requête
            $result = $query->fetch();

            // Retourne l'élément trouvé ou false si aucun résultat n'est trouvé
            return $result ?: false;
        } catch (PDOException $e) {

            // Gestion des erreurs
            error_log("Erreur de sélection par ID : " . $e->getMessage());

            return false;
        }
    }

    /**
     * Modifie la quantité d'un élément par son ID.
     *
     * @param string $id L'ID de l'élément à modifier.
     * @param string $quantite La nouvelle quantité.
     * @return bool True en cas de succès, false sinon.
     */
    public function modifById(string $id, string $quantite)
    {
        try {
            $query = $this->pdo->prepare("UPDATE " . $this->table . " SET quantites = :quantite WHERE id = :id");
            return $query->execute([':id' => $id, ':quantite' => $quantite]);
        } catch (PDOException $e) {
            // Gestion des erreurs
            error_log("Erreur de modification par ID : " . $e->getMessage());
            return false;
        }
    }

    /**
     * Sélectionne tous les éléments dont la quantité est égale à 0.
     *
     * @return array|false Un tableau d'éléments ou false si aucun élément n'est trouvé.
     */
    public function selectAllElements()
    {
        try {
            $query = $this->pdo->prepare("SELECT * FROM " . $this->table . " WHERE quantites = 0 ORDER BY id");
            $query->execute();

            // Définit le mode de récupération en tant que tableau associatif
            $query->setFetchMode(PDO::FETCH_ASSOC);

            // Récupère tous les résultats de la requête
            $result = $query->fetchAll();

            // Retourne le tableau d'éléments trouvés ou false si aucun résultat n'est trouvé
            return $result ?: false;
        } catch (PDOException $e) {

            // Gestion des erreurs
            error_log("Erreur de sélection de tous les éléments : " . $e->getMessage());

            return false;
        }
    }

    /**
     * Supprime un élément par son ID.
     *
     * @param string $id L'ID de l'élément à supprimer.
     * @return bool True en cas de succès, false sinon.
     */
    public function deleteElementByID(string $id)
    {
        try {
            $query = $this->pdo->prepare("DELETE FROM " . $this->table . " WHERE id= :id");
            return $query->execute([':id' => $id]);
        } catch (PDOException $e) {
            // Gestion des erreurs
            error_log("Erreur de suppression par ID : " . $e->getMessage());
            return false;
        }
    }
}
