<?php

    require_once("function.php");

    $contents = getAll();

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
        <div class="gap">

            <?php
                foreach ($contents as $content) {
                    echo "
                    
                        <div class='gap-area'>

                            <img href='".$content["img"]."' alt='".$content["img"]."' />
                            <p><a href='pages.php?id=".$content["id"]."'>". $content["id"]."</a></p>

                        </div>
                    
                    ";

                }
            ?>

        </div>
        
    </body>
</html>