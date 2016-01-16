<?php
    
    $host       =   "localhost:8889";
    $db_name    =   "ingilizcekelimelik";
    $user       =   "root";
    $pass       =   "root";
    try{
        $baglan = new PDO("mysql:host=".$host.";dbname=".$db_name, $user,$pass);
        $baglan->exec("set names utf8");
    }catch(PDOException $e){
        echo $e->getMessage();
    }

    require_once 'class.crud.php';
    $crud = new crud($baglan);


?>