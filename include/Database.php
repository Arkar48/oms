<?php
class Database{
    private static $host="localhost";
    private static $dbname="ecommerce";
    private static $port = "3306";
    private static $username="root";
    private static $password="";
    private static $cont="";

    public static function connect(){
            try{
                self::$cont=new PDO("mysql:host=".self::$host.";port=".self::$port.";dbname=".self::$dbname,self::$username,self::$password);
               // echo "connected";
            }
            catch(PDOException $e){
                echo $e->getMessage();
            }
        
        
        return self::$cont;
    }
    public static function disconnect(){
        self::$cont=null;
    }
}
?>