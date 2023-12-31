<?php
/* Host name of the MySQL server. */
$host = 'localhost';

/* MySQL account username. */
$user = 'dofus';

/* MySQL account password. */
$passwd = 'MOT DE PASSE';

/* The default schema you want to use. */
$schema = 'dofus';

/* Connection string, or "data source name". */
$dsn = 'mysql:host=' . $host . ';dbname=' . $schema;

/* Connection inside a try/catch block. */
try
{  
   /* PDO object creation. */
   $pdo = new PDO($dsn, $user,  $passwd);
   
   /* Enable exceptions on errors. */
   $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   $pdo->exec("set names utf8");
}
catch (PDOException $e)
{
   /* If there is an error, an exception is thrown. */
   echo 'Database connection failed.';
   die();
}
?>
