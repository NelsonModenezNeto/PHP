<?php
    /*conexaoBD.php*/

    try {        
        // conexão PDO    // IP, nomeBD, usuario, senha   
        $db = 'mysql:host=152.67.40.125;dbname=tcc;charset=utf8';
        $user = 'samuel';
        $passwd = 'Samuel2022!';
        $pdo = new PDO($db, $user, $passwd);
    
        // ativar o depurador de erros para gerar exceptions em caso de erros
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);    

    } catch (PDOException $e) {
        $output = 'Impossível conectar BD : ' . $e . '<br>';
        echo $output;
    }    
?>