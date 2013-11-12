<?php
class Database
{
    private static $db = NULL;

	const DSN = "mysql:host=localhost;port=3306;dbname=nico_webtech_pdo";
	const USERNAME = "nico_webtech_pdo";
	const PASSWORD = "QwX5NQHm2Hwp2daQ";

    public static function getInstance()
    {
        if (self::$db) {
        	return self::$db;
        }
        
        try {
            self::$db = new PDO(self::DSN, self::USERNAME, self::PASSWORD);
            return self::$db;
        }
        catch (PDOException $e) {
            echo 'Connection failed: ' . $e->getMessage();
            exit();
        }        

        return self::$db;
    }
}
?>