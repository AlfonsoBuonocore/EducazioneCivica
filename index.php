<?php

    require_once("function.php");

    include "header.php";

    $contents = getAll();

?>

        <div class="flex">

            <?php
                foreach ($contents as $content) {
                    $img = "../img/".$content["img"];
                    echo "
                    
                        <div class='flex-area'>

                            <div class='img' style='--i: url($img)'>
                            
                                <a href='pages.php?id=".$content["id"]."'>".$content["id"]."</a>

                            </div>
                            

                        </div>
                    
                    ";

                }
            ?>

        </div>
        
    </body>
    <script src="Assets/javascript/main.js"></script>
</html>