<?php
use crud\MazzoCRUD;

# 1.attivare le sessioni 
session_start();
# 2.autoload 
require_once ("./vendor/autoload.php");
require_once ("./autoload.php");
require_once "./lib/jsonTools.php";

$mazzoCrud = new MazzoCRUD();
# todo ricordarti de m
if (!isset($_SESSION['mazzo_id'])) {

    $mazzo_id = $mazzoCrud->create($_POST);
    $_SESSION['mazzo_id'] = $mazzo_id;
    $mazzo_partita = $mazzoCrud->readOne($mazzo_id);
    //print_r($mazzo_id);
} else {
    $mazzo_partita = $mazzoCrud->readOne($_SESSION['mazzo_id']);
}



?>
<?php require_once "./view/header.php" ?>

<div class="container">
    <form action="nuova_partita_fine.php" method="post">
        <button class="btn btn-primary" type="submit">Fine Partita</button>

        <!-- FOREAC DELLE CARTE -->
        <?php foreach ($mazzo_partita->carte() as $numero => $card): ?>
            <!-- card -->
            <div class="card" style="width: 18rem">
                <div class="card-body">
                    <h5 class="card-title"><?= $numero ?>     <?= $card->showQuestion() ?></h5>
                    <!-- <p class="card-text">
                        Some quick example text to build on the card title and make up the
                        bulk of the card's content.
                    </p> -->
                </div>
                <div class="p-3">
                    <pre class="rosso"><?php // print_r($card->showAnswers()) ?></pre>
                    <?php foreach ($card->showAnswers() as $n_risposta => $risposta) { ?>
                        <!-- INIZIO RISPOSTA -->
                        <div class="form-check">
                            <input class="form-check-input" 
                                type="radio" 
                                name="user_answer[<?= $numero ?>]"
                                value="<?= $risposta ?>"
                                id="flexRadioDefault1" />

                            <label class="form-check-label" for="flexRadioDefault1">
                                <?php echo $n_risposta ?>         <?= $risposta ?>
                            </label>
                        </div>
                        <!-- FINE  RISPOSTA -->
                    <?php } ?>


                </div>
            </div>
            <!-- card - fine -->
        <?php endforeach ?>

    </form>
    <pre>
        <?php print_r($mazzo_partita->carte()) ?>

    </pre>
</div> <!-- container -->

<?php require_once "./view/footer.php" ?>