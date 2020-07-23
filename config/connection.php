<?php
// ini_set('log_errors','On');
// ini_set('display_errors','Off');
// ini_set('error_reporting', E_ALL );
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

  try {
    $owlPDO = new PDO('mysql:host='.$dbserver.';dbname='.$dbname, $uname, $passwd, array(PDO::ATTR_PERSISTENT => true));
    $owlPDO->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
  }
  catch (PDOException $e) {
         print " ERRORCODE, could not connect\n";	
         print "ERRORCODE!: " . $e->getMessage() . "<br/>";
     die();
  }

?>
