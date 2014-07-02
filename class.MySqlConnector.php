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
     * Prevent object cloning
     */
    final private function __clone() { }

    final public static function getInstance() {
        if (null !== static::$_instance) {
            return static::$_instance;
        }
        $mySqlUserName = '';
        $mySqlPassword = '';
        $mySqlHost  = '';
        $mySqlPort = '';
        if (APPLICATION_ENV == 'dev') {
            $mySqlUserName = defined(LOCAL_MYSQL_USERNAME) ? LOCAL_MYSQL_USERNAME : '';
            $mySqlPassword = defined(LOCAL_MYSQL_PASSWORD) ? LOCAL_MYSQL_PASSWORD : '';
            $mySqlHost = defined(LOCAL_MYSQL_HOST) ? LOCAL_MYSQL_HOST : '';
            $mySqlPort = defined(LOCAL_MYSQL_PORT) ? LOCAL_MYSQL_PORT : '';

        }
    }


}