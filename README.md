This file has been created by relifenatu@gmail.com

This file has two classes:

1.db class is the parent class 
2.dbextended is the inherited class

dbextends is instanced by dbextendintfc interface

functions dbextended:

dbextended::__construct($host,$user,$password,$database,$msg) ==> constructor
dbextended::parent::query(&msg) ==> sql query
dbextended::parent::close(); ==> close conection
dbextended::insert($table,$columns,$values,$conditions) ==> add element to a table in your database
dbextended::select($table,$columns,$conditions) ==> select columns in a table with your conditions
dbextended::delete($table,$condition) ==> remove row from table with desired conditions

functions db:
db::__construct($host,$user,$password,$database) ==> set the class
db::query($msg) ==> send query
db::close() ==> close conection