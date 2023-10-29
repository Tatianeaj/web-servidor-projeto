
<?php 
class Connection{

    private static $instancia;

    public static function get(){

        try{
            if(!isset(self::$instancia))
                self::$instancia = new PDO('mysql:host=localhost;dbname=dbevents','root','');
            return self::$instancia;
            
        }
        catch(Exception $e){
            throw new Exception($e->getMessage());
        }
    }
}

?>