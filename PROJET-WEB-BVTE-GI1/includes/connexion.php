<?php
    include_once("info.inc.php");
    $mysql="mysql:host=".MYHOST.";dbname=".DBNAME;
    try{
        $pdo=new PDO($mysql,MYUSER,MYPASS);
    }
    catch(PDOException $e){
        echo"Connection failed : ". $e->getMessage();
    }
?>