<?php
    try{
        $db = 'mysql:host=143.106.241.3;dbname=cl201172;charset=utf8';
        $user = 'cl201172';
        $passwd = 'cl*10102005';
        $pdo = new PDO($db, $user, $passwd);

        $pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } 
    catch(PDOException $e){
        $output  = 'Impossível conectar com BD :' . $e . '<br>';
        echo $output;
    }
?>                             