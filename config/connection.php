<?
$dbserver='localhost';
$dbport  ='3306';
$dbname  ='akunting';
$uname	='root';
$passwd	='';

require 'db.class.php';
DB::$user = $uname;
DB::$password = $passwd;
DB::$dbName = $dbname;

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
