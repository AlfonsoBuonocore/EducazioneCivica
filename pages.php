
<?php

    if (!isset($_GET['id']))
        header("Location: index.php");
    
    include "function.php";

    if(!exist($_GET['id']))
        header("Location: Assets/otherPages/404.php");
    
    include "header.php";

    $content = get($_GET['id']);

?>

        <section>

            <div class="left">
                <div class="page">
                    <img src="Assets/img/<?= $content["img"] ?>" alt="<?= $content["img"] ?>">
                    <h1 class="title">
                        <?= $content["id"] ?>
                    </h1>
                    <div class="content">
                        <?= $content["contenuto"] ?>
                    </div>
                </div>
            </div>

            <div class="right">

                <h1>
                    Guarda anche gli altri articoli
                </h1>

                <?php

                    foreach (getAll() as $content) {
                         if($content["id"] != $_GET["id"]){
                            $img = "../img/".$content["img"];
                            echo "
                            
                                <div class='flex-area'>

                                    <div class='img' style='--i: url($img)'>
                                    
                                        <a href='pages.php?id=".$content["id"]."'>".$content["id"]."</a>

                                    </div>
                                    

                                </div>
                            
                            ";
                        }

                    }
                
                ?>

            </div>

        </section>
        <div class="goBack">
            <a href="index.php" style="cursor: pointer;"><i class="bi bi-arrow-left"></i></a>
        </div>
    </body>
    <script src="Assets/javascript/main.js"></script>
</html>