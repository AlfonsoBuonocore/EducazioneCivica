<?php

    require_once("function.php");

    include "header.php";

    $contents = getAll();

        if (isset($_POST["submit"])) {

        if (count($_FILES["file"]["size"]) > 1) 
            $files = rearrange($_FILES["file"]);

        $files[] = $_FILES["fileC"];


        foreach ($files as $file) {
            if (UPLOAD_ERR_OK == $file['error']) {
                move_uploaded_file($file['tmp_name'], "Assets/img/".$file["name"]);
            }
        }
        

        $articolo = array("titolo" => $_POST["title"], "img" => $_FILES["fileC"]["name"], "contenuto" => $_POST["content"]);

        upload($articolo);

        header("Location: index.php");
    }

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

        <div class="addArticle">
            <a id="active" style="cursor: pointer;"><i class="bi bi-file-plus"></i></a>
        </div>

        <div class="inserimento">
            <form action="<?= $_SERVER["PHP_SELF"]; ?>" method="post" enctype="multipart/form-data">
                <div class="title">
                    <a href="<?= $_SERVER["PHP_SELF"]; ?>"><i class="bi bi-x close"></i></a>
                    <label for="title">
                        Inserisci nome articolo <br>
                        <input type="text" name="title" id="title">
                    </label>
                    <input type="button" value="invia" onclick="regTitle()">
                </div>
                <div class="content">
                    <a href="<?= $_SERVER["PHP_SELF"]; ?>"><i class="bi bi-x close"></i></a>
                    <label for="content">
                        Inserisci il contenuto del tuo articolo e se ti servono delle immagini inseriscile come le inseriresti su HTML e il tag src scrivetelo cosi: src="Assets/img/nome immagine" <br>
                        <textarea name="content" id="content" rows="10"></textarea>
                    </label>
                    <input type="button" value="invia" onclick="regContent()">
                </div>
                <div class="imgIns">
                    <a href="<?= $_SERVER["PHP_SELF"]; ?>"><i class="bi bi-x close"></i></a>
                    <label for="fileC">
                        Inserisci l'immagine di copertina del tuo articolo <br>
                        <input type="file" name="fileC" id="fileC" accept=".jpg, .jpeg, .png, .svg" required>
                    </label>
                    <label for="file">
                        Inserisci tutte le immagini che ti servono per il tuo articolo <br>
                        <input type="file" name="file[]" id="file" accept=".jpg, .jpeg, .png, .svg" multiple>
                    </label>
                    <input type="submit" value="invia" name="submit">
                </div>
            </form>
        </div>
        
    </body>
    <script src="Assets/javascript/main.js"></script>
</html>