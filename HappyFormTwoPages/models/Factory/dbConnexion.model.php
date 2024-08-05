<?php
/**
 * Cette class abstraite n'est accessible que si étendue par les class des modèles: elle sert à se connecter à la base de donnée.
 * Il est possible que selon votre système vous deviez changer le mot de passe "root" par un autre ou rien.
 */
abstract class DbConnexion
{
    private static PDO $pdo;

    private static function setBdd()
    {
        self::$pdo = new PDO("mysql:host=" . getenv('DB_HOST') . ";dbname=" . getenv('DB_DATABASE'), getenv('DB_USERNAME'), getenv('DB_PASSWORD'));
        self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
    }

    protected function getBdd()
    {
        if (self::$pdo === null) {
            self::setBdd();
        }
        return self::$pdo;
    }
}
