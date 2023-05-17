<?php
     try{
        $db = 'mysql:host=localhost;dbname=;charset=utf8';
        $user = '';
        $passwd = '';
        $pdo = new PDO($dv, $ $user, $passwd);

        $pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } 
    catch(PDOException $e){
        $output  = 'Impossível conectar com BD :' . $e . '<br>';
        echo $output;
    }

?>