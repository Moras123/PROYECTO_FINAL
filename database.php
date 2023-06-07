<?php
class Database {
    private static $host = 'localhost';
    private static $username = 'root';
    private static $password = '';
    private static $database = 'bubbles';
    private static $pdo;

    public static function connect() {
        if (!isset(self::$pdo)) {
            try {
                self::$pdo = new PDO("mysql:host=" . self::$host . ";dbname=" . self::$database, self::$username, self::$password);
                self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                die("Connection failed: " . $e->getMessage());
            }
        }
        return self::$pdo;
    }
}
?>