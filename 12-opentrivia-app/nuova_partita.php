<?php 
# 1.attivare le sessioni 
session_start();
# 2.autoload 
require_once("./vendor/autoload.php");
require_once("./autoload.php");
# 3.require
require_once "./lib/jsonTools.php";
$difficulty = [
    // "Qualsiasi" => "",
    "Facile" => "easy",
    "Media" => "medium",
    "Difficile" =>"hard"
];

// ottengo l'elenco delle categorie diponibili
$response = getJson("https://opentdb.com/api_category.php");
$categories = $response['trivia_categories'];
?>
<!-- 4. header  -->
<?php require_once "./view/header.php" ?>
<!-- Contenuto Pagina -->
<div class="container">
<form method="POST" action="nuova_partita_visualizza.php">

<div class="mb-3">
    <label class="form-label" for="amount">Numero di domande</label>
    <input class="form-control" id="amount" type="number" 
           step="5" 
           min="5" 
           max="20" 
           name="amount"
           >
           <!-- required -->
</div>

<div class="mb-3">
    <label class="form-label" for="difficulty">Difficoltà</label>
    <!-- UL -->
    <select  id="difficulty" name="difficulty" class="form-select">
        <option value=''>Qualsiasi</option>
        <?php foreach ($difficulty as $user_label => $difficulty_level) { ?>
            <option value="<?= $difficulty_level ?>">
                <?= $user_label ?>
            </option>

        <?php } ?>
    </select>
</div>
<div class="mb-3">
    <label class="form-label" >Categorie</label>
    <select class="form-select" name="category">
     <?php foreach ($categories as $category) { ?>
        <option value="<?= $category['id'] ?>"> <?= $category['name'] ?> </option>
     <?php  } ?>
      
    </select>
</div>
<div class="mt-5">
    <button class="btn btn-primary" type="submit">Invia</button>
</div>
</form>
</div>
<!-- Contenuto pagina fine -->
<!-- 5. footer  -->
<?php require_once "./view/footer.php" ?>