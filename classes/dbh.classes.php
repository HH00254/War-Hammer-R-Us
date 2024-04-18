<?php 

class Dbh {

    private const DB_DSN = 'mysql:host=localhost;dbname=serverside;charset=utf8';
    private const DB_USER = 'serveruser';
    private const DB_PASS = 'gorgonzola7!';

   protected function connect()
   {
   
        
        //  PDO is PHP Data Objects
        //  mysqli <-- BAD. 
        //  PDO <-- GOOD.
        try {
            // Try creating new PDO connection to MySQL.
            $dbh = new PDO(self::DB_DSN, self::DB_USER, self::DB_PASS);
            return $dbh;
            //,array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)
        } catch (PDOException $e) {
            print "Error: " . $e->getMessage() . "<br/>";
            die(); // Force execution to stop on errors.
            // When deploying to production you should handle this
            // situation more gracefully. ¯\_(ツ)_/¯
        } 
   }
}