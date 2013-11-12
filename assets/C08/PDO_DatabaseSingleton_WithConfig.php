<?php
class Database
{
    private static $db = NULL;

	const INI_FILE = "config_db.ini";

    public static function getInstance()
    {
        if (self::$db) {
        	return self::$db;
        }
        
        // Parse config
        if (!$settings = parse_ini_file(self::INI_FILE, TRUE))
            throw new exception('Unable to open ' . self::INI_FILE);

        $dsn = $settings["db_driver"] . ":";
        foreach ($settings ["dsn"] as $key => $val)
            $dsn .= "$key=$val;";

        try {
            self::$db = new PDO($dsn, $settings["db_user"], $settings["db_password"]);
            return self::$db;
        }
        catch (PDOException $e) {
            echo 'Connection failed: ' . $e->getMessage();
            exit();
        }
    }
}
?>