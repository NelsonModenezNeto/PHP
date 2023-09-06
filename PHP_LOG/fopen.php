<?php
$filename = fopen("log.txt", 'w+');
fwrite($filename, date("Y-m-d H:i:s"));
fwrite($filename, "data");

fclose($filename);

echo "Arquivo criado com sucesso";

echo filesize("teste.text");

?>