<?php
session_start();

class DbConnect {
     protected  static $connection;

     function __construct()
     {
      self::connect();   
     }
     private static function connect(){
         self::$connection = new mysqli("localhost","root","","btc");
         if(self::$connection){
             return self::$connection;
         }else{
            return self::$connection->error;
         }
     }

     protected static function filter($data){
         $data = trim($data);
         $data = strip_tags($data);
         $data = stripslashes($data);
         $data = htmlentities($data);
         $data = htmlspecialchars($data);
         return self::$connection->real_escape_string($data);

     }
     protected static function generateName(){
         $characters = "imagephotoscreenshotqwertyuiopasdfghjklzxcvbnm1234567890qazxwsedcrfvtgbyhnujmiklop";
         $name = substr(str_shuffle($characters),0,7);
         return $name;
     }
}