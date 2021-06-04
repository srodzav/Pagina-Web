<?php 

    class DB {
        private static $connection;

        public static function getConnection() {
            if (self::$connection === null) {
                self::$connection = new PDO('mysql:host=localhost;dbname=panal_db;charset=utf8', 'root', 'qwert');
                self::$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                self::$connection->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
            }

            return self::$connection;
        }
    }

?>