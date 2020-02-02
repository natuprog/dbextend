<?php

    /*
    File of database_connect class (db)
    
    */

    class db {

        //Conection parameters
        protected $host;
        private $user;
        private $pass;
        private $db;
        public $connect;

        
        public function __construct($host,$user,$pass,$db) {
            $this -> host = $host;
            $this -> user = $user;
            $this -> pass = $pass;
            $this -> db = $db;
            $this -> connect = new mysqli($this -> host,$this -> user,$this -> pass,$this -> db);
            $this -> connect -> set_charset('utf8'); //Chasret setting
            if($this -> connect) {
                return true;
            }
            else{
                return false;
            }
        }
        //query basic msg
        public function query($m) {
            $result = $this -> connect -> query ($m) or die ("No se ha podido seleccionar lo que busca en la base de datos". $this -> connect -> error);
            if(gettype($result) != 'boolean'){
                $result = $result -> fetch_all(MYSQLI_NUM);
            }
            return $result;
        }
  
        public function close(){
            $this -> connect -> close();
        }
    }

?>