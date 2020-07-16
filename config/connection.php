<?php
$dbserver='localhost';
$dbport  ='3306';
$dbname  ='ngoacc';
$uname	='root';
$passwd	='';

require 'db.class.php';
DB::$user = $uname;
DB::$password = $passwd;
DB::$dbName = $dbname;

DB::$usenull = false; //for null cant insert
DB::$error_handler = 'my_error_handler';

function my_error_handler($params) {
    echo "Error: " . $params['error'] . "<br>\n";
    echo "Query: " . $params['query'] . "<br>\n";
    die; // don't want to keep going if a query broke
  }


?>
