<?php

    /*
        Extension of db to make personaliced query's more easy
        Numbrer of hours wasted = 1.25;
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
            return $this->host;
        }
        public function sethost($_host){
            $this->host = $_host; 
        }

        public function insert($table, $columns, $values, $condition){

            if(gettype($columns) == "array" && gettype($values) == "array"){
                if( gettype($table) == "string" && sizeof($columns) == sizeof ($values)){

                    //Comprobations, then
                    $mesg = _INS[0] . $table;
                    $mesg .= _PAR[0];
                    for ($i = 0 ; $i < sizeof($columns); $i++){
                        $mesg .= $columns[$i];
                        if($i != sizeof($columns)-1){
                            $mesg .= _PAR[1];
                        }
                    }
                    
                    $mesg .= _PAR[2];
                    $mesg .= _INS[4];
                    $mesg .= _INS[1];
                    for($i = 0; $i < sizeof($values); $i++){
                        $mesg .= $values[$i];
                        if($i != sizeof($values)-1){
                            $mesg .= _INS[2];
                        }
                    }
                    $mesg .= _INS[3];

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
                if($columns != [""]){ 
                    $mesg .= _PAR[0];
                    for ($i = 0; $i < sizeof($columns); $i++){
                        $mesg .= $columns[$i];
                        if($i != sizeof($columns)-1){
                            $mesg .= _PAR[1];
                        }
                    }
                    $mesg .= _PAR[2] . _SEL[1]. $table;
                }
                else{
                    $mesg .= " * " . _SEL[1] . $table;
                }
                if($condition!=""){
                    $mesg .= $condition;
                }
                $result = parent::query($mesg);
                return $result;
            }
        }
        public function delete($table, $condition){
            $mesg = "";
            if(gettype($table) == "string"){
                $mesg .= _DEL[0];
                $mesg .= _DEL[1];
                $mesg .= $table;
                if($condition != ""){
                    $mesg .= " ". $condition;
                }
                parent::query($mesg);
            }
        }
    }

?>