<?php
class Database
{
	private static $dbName = 'datosservicios';
	private static $dbHost = '192.168.0.2';
	private static $dbUserName = 'admin';//easycode_innmob
	//private static $dbPassword = '';//innmob2017!
	private static $dbPassword = 'sPd2T2QAJn71ouN4';//innmob2017!

	private static $cont  = null;
	
	public function __construct() 
	{
		exit('Init function is not allowed');
	}

	public static function connect()
	{
       if ( null == self::$cont )
       {      
        try 
        {
          self::$cont =  new PDO( "mysql:host=".self::$dbHost.";"."dbname=".self::$dbName, self::$dbUserName, self::$dbPassword,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));  
        }
        catch(PDOException $e) 
        {
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
