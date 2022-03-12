<?php
$dsn = 'mysql:host=m7az7525jg6ygibs.cbetxkdyhwsb.us-east-1.rds.amazonaws.com; dbname=mvagsta26o5b3jpu';
$username = 'jcfk9fsv3m030zuq';
$p = 'glxgh2xo370kspw2';


try {
    $db =new PDO($dsn, $username, $p);


} catch (PDOException $e) {
    $error_message = 'Database Error: ';
    $error_message .= $e->getMessage();
    echo $error_message;
    exit();
} ?>
