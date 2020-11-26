<?php
    define('HOST','localhost');
    define('USUARIO', 'root');
    define('SENHA','');
    define('DB','automoveis');

    $con = mysqli_connect(HOST,USUARIO,SENHA,DB) or die ('ERRO');

?>