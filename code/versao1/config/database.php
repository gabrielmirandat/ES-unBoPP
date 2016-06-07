<!-- Throughout this application, Database handles all the stuff related to database connections, such as connecting and disconnecting. -->
<!-- Singleton class -->
<?php
class Database
{
    private static $dbName = 'ESunBoPP' ;
    private static $dbHost = 'localhost' ;
    private static $dbUsername = 'root';
    private static $dbUserPassword = 'root';
     
    private static $cont  = null;
     
    public function __construct() {
        // Since it is a static class, initialization of this class is not allowed.
        die('Init function is not allowed');
    }
     
    // Database::connect()
    public static function connect()
    {
       // One connection through whole application
       if ( null == self::$cont )
       {     
          try
          {
            // PDO provides a uniform method of access to multiple databases.
            self::$cont =  new PDO( "mysql:host=".self::$dbHost.";"."dbname=".self::$dbName, self::$dbUsername, self::$dbUserPassword); 
          }
          catch(PDOException $e)
          {
              if ($e->errorInfo[1] == 1062) {
                  echo 'Entrada duplicada! Use a tela de login.';
              } else {
                  // an error other than duplicate entry occurred
              }
              die($e->getMessage()); 
          }
       }
       return self::$cont;
    }
     
    public static function disconnect()
    {
        self::$cont = null;
    }
}
?>