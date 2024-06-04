<?php
namespace App;
use \PDO;

class Database
{
    /**
     * Renvoie une instance PDO représentant la connexion à la base de données.
     *
     * Cette méthode établit une connexion à la base de données si aucune n'a 
     * encore été créée. Elle utilise les paramètres de connexion suivants :
     *
     * - Hôte : localhost (peut être remplacé par votre hôte de base de données réel)
     * - Port : 3306 (port standard pour MySQL)
     * - Nom de la base de données : test (remplacez par le nom réel de votre base de données)
     * - Nom d'utilisateur : root (remplacez par le nom d'utilisateur réel de votre base de données)
     * - Mot de passe : password (remplacez par un mot de passe sécurisé pour votre base de données)
     *
     * La méthode définit également le mode d'erreur PDO sur PDO::ERRMODE_EXCEPTION 
     * pour lever des exceptions en cas d'erreurs de base de données, garantissant une 
     * meilleure gestion des erreurs.
     * 
     * @return PDO
     */
    public static function getPdo(): PDO
    {
       return  new PDO('mysql:host=localhost:3306;dbname=test;charset=utf8','root','',[
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ]);
    }
}