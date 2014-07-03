<?php
abstract class MySql_Connector
{
    /**
     * @var MySQL connector Object
     */
    protected static $_instance = NULL;

    /**
     * Prevent direct object creation
     */
    final private function __construct() { }

    /**
     * Database Name
     */
    const MY_SQL_DATABASE = 'gapp_db';
    /**
     * Prevent object cloning
     */
    final private function __clone() { }

    final public static function getInstance() {
        echo 'krishna'; die;
        if (null !== static::$_instance) {
            return static::$_instance;
        }
        include 'config.php';
        $mySqlUserName = '';
        $mySqlPassword = '';
        $mySqlHost  = '';
        $mySqlPort = '';
        $dbName = self::MY_SQL_DATABASE;
        if (APPLICATION_ENV == 'dev') {
            $mySqlUserName = defined(LOCAL_MYSQL_USERNAME) ? LOCAL_MYSQL_USERNAME : '';
            $mySqlPassword = defined(LOCAL_MYSQL_PASSWORD) ? LOCAL_MYSQL_PASSWORD : '';
            $mySqlHost = defined(LOCAL_MYSQL_HOST) ? LOCAL_MYSQL_HOST : '';
            $mySqlPort = defined(LOCAL_MYSQL_PORT) ? LOCAL_MYSQL_PORT : '';

        } elseif (APPLICATION_ENV == 'live') {
            $mySqlUserName = defined(G_MYSQL_USERNAME) ? LOCAL_MYSQL_USERNAME : '';
            $mySqlPassword = defined(G_MYSQL_PASSWORD) ? LOCAL_MYSQL_PASSWORD : '';
            $mySqlHost = defined(G_MYSQL_HOST) ? LOCAL_MYSQL_HOST : '';
            $mySqlPort = defined(G_MYSQL_PORT) ? LOCAL_MYSQL_PORT : '';
        }

        // Create connection
        try {
            static::$_instance=mysqli_connect($mySqlHost, $mySqlUserName,$mySqlPassword,$dbName);
        } catch (Exception $e) {
            echo 'My Sql Connection error';
            echo '<br> Error : ' . $e->getMessage();
            echo '<br> Line No : ' . $e->getLine();
            exit;
        }

        return static::$_instance;
    }

    public function getDBName()
    {
        return self::MY_SQL_DATABASE;
    }


}