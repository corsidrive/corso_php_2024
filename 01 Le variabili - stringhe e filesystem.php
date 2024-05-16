<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>le variabili</title>
</head>

<body>
    <h1>Le variabili - stringhe e filesystem </h1>
    <?php
    $parola = "mandarino";
    $cartella = "./pagine";
    $url = "https://www.google.com/search?q=$parola&oq=$parola&gs_lcrp=EgZjaHJvbWUqDAgAECMYJxiABBiKBTIMCAAQIxgnGIAEGIoFMg0IARAuGIMBGLEDGIAEMg0IAhAuGIMBGLEDGIAEMhAIAxAuGK8BGMcBGLEDGIAEMg0IBBAuGK8BGMcBGIAEMg8IBRAuGAoYxwEY0QMYgAQyBwgGEAAYgAQyBwgHEAAYgAQyBwgIEAAYjwIyBwgJEAAYjwLSAQgxMjU2ajBqN6gCALACAA&sourceid=chrome&ie=UTF-8";
    $pagina = file_get_contents($url);

    // la @ davanti a una funzione disabilita i messaggi di errore
    @mkdir($cartella);
    // echo $pagina;
    file_put_contents("$cartella/$parola.html", $pagina); // Filesystem        
    ?>
</body>

</html>