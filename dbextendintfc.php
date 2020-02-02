<?php
    const _INS = ["INSERT INTO ", "('","','","') ","VALUES "];
    const _SEL = ["SELECT ","FROM ","('","','","') "];
    const _DEL = ["DELETE ","FROM "];
    const _PAR = [" (",",",") "];

    interface idbextends {

        //SQL constants for db implementations
        //Functions for adding, deleting and inserting
        public function insert($table, $columns, $values, $condition);
        public function select($columns, $table, $condition);
        public function delete($table, $condition);
    }

?>