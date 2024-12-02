<?php

include "./config/Database.php";

$db = new Database;
$valida =$db->connect();

if($valida){
    echo "Conexão realizada !";
} else {
    echo "Falha na conexão!";
}

