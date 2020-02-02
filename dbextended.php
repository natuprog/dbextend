<?php

    /*
        Extension of db to make personaliced query's more easy
        Numbrer of hours wasted = 0.50;
    */

    require_once "db.php";
    require "dbextendintfc.php";

    class db_extended extends db implements idbextends{
        private $msg;

        public function __construct($host,$user,$pass,$db,$_msg){ 
            parent::__construct($host,$user,$pass,$db);
            if(isset($msg)){
                $this -> msg = $_msg;
            }
        }

        public function gethost(){
            return parent::$host;
        }
        public function sethost($_host){
            parent::$host = $_host;
        }

        public function insert($table, $columns, $values, $condition){
            if(gettype($columns) == gettype($values) == "array"){
                if( gettype($table) == "string" && sizeof($columns) == sizeof ($values)){

                    //Comprobations, then
                    $mesg = _INS[0] . $table;
                    $mesg .= _INS[1];
                    for ($i = 0 ; $i < sizeof($columns); $i++){
                        $mesg .= $columns[$i];
                        $mesg .= _INS[2];
                    }
                    
                    $mesg .= _INS[3];
                    $mesg .= _INS[4];

                    for($i = 0; $i < sizeof($values); $i++){
                        $mesg .= $values[$i];
                        $mesg .= _INS[2];
                    }

                    if(isset($condition)){
                        $mesg .= $condition;
                    }
                }
                //Message completed
                parent::query($mesg);
            }

        }
        public function select($columns, $table, $condition){
            $mesg = "";
            if(gettype($table) == "string"){
                $mesg .= _SEL[0];
                if(isset($columns)){ 
                    $mesg .= _SEL[2];
                    for ($i = 0; $i < sizeof($columns); $i++){
                        $mesg .= $columns[$i];
                        $mesg .= _SEL[3];
                    }
                    $mesg .= _SEL[4] . _SEL[1]. $table;
                }
                else{
                    $mesg .= "*" . _SEL[1] . $table;
                }
                if(isset($condition)){
                    $mesg .= $condition;
                }
                parent::query($mesg);
            }
        }
        public function delete($table, $condition){
            $mesg = "";
            if(gettype($table) == "string"){
                $mesg .= _DEL[0];
                $mesg .= _DEL[1];
                $mesg .= $table;
                if(isset($condition)){
                    $mesg .= " ". $condition;
                }
                parent::query($mesg);
            }
        }
    }

?>