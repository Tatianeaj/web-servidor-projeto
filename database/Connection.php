
<?php
class Connection
{
    private static $instance;
    public static function get()
    {
        try {
            if (!isset(self::$instance))
                self::$instance = new PDO('mysql:host=localhost;dbname=dbevents', 'root', '');
            return self::$instance;
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
}
?>