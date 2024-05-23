<?php
use crud\MazzoCRUD;

# 1.attivare le sessioni 
session_start();
# 2.autoload 
require_once ("./vendor/autoload.php");
require_once ("./autoload.php");
require_once "./lib/jsonTools.php";

$mazzoCrud = new MazzoCRUD();
if (!isset($_SESSION['mazzo_id'])) {

    $mazzo_id = $mazzoCrud->create($_POST);
    $_SESSION['mazzo_id'] = $mazzo_id;
    $mazzo_partita = $mazzoCrud->readOne($mazzo_id);
    //print_r($mazzo_id);
} else {
    $mazzo_partita = $mazzoCrud->readOne($_SESSION['mazzo_id']);
}


$user_answer = $_POST['user_answer'];
$mazzo_risposte = [];
$user_answer_point = 0;
foreach ($mazzo_partita->carte() as $numero => $card) {

    # controllo se l'utente ha risposto a una domanda
    if(isset($user_answer[$numero])){
            // $a['s']['r'] ?? "ciccio"
        $card->user_answer = $user_answer[$numero];
        if($card->isCorrect($user_answer[$numero])){
            $user_answer_point++;
        }

    }else{
        $user_answer_point -= 2;
        $card->user_answer = null;
    }

    $mazzo_risposte[$numero] = $card;
}

echo "Hai fatto $user_answer_point punti<br>";
echo "<pre>";
print_r($mazzo_risposte);
print_r($mazzo_risposte[0]->serializeJSON());
echo "</pre>";

/**
 Array
(
    [user_answer] => Array
        (
            [0] => 2004
            
            [2] => Pyramid
            [3] => Psychology
        )

)
 */



print_r($_POST);





?>
