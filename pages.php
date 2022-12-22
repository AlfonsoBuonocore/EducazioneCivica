
<?php

    if (!isset($_GET['id']))
        header("Location: index.php");

    include "function.php";

    $content = get($_GET['id']);

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>
    <body>
        <h1><?= $content["titolo"]; ?></h1>
        <img><?= $content["img"]; ?></img>
        <p><?= $content["contenuto"]; ?></p>
    </body>
</html>