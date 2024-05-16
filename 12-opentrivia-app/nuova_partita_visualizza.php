<?php 
use crud\MazzoCRUD;
# 1.attivare le sessioni 
session_start();
# 2.autoload 
require_once("./vendor/autoload.php");
require_once("./autoload.php");
require_once "./lib/jsonTools.php";

$mazzoCrud = new MazzoCRUD();
# todo ricordarti de m
if(!isset($_SESSION['mazzo_id'])){

    $mazzo_id = $mazzoCrud->create($_POST);
    $_SESSION['mazzo_id'] = $mazzo_id;
    $mazzo_partita = $mazzoCrud->readOne($mazzo_id);
    //print_r($mazzo_id);
}else{
    $mazzo_partita = $mazzoCrud->readOne($_SESSION['mazzo_id']);
}


print_r($mazzo_partita->carte());