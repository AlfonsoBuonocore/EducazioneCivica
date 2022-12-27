<?php

    if(isset($_POST["submit"])){

        $files = rearrange($_FILES);

        foreach ($files as $file) {
            if (UPLOAD_ERR_OK === $file['error']) {
                move_uploaded_file($file['tmp_name'], "..img/".$file["name"]);
            }
        }

}

    function rearrange($files)
    {
        foreach($files as $key1 => $val1) {
            foreach($val1 as $key2 => $val2) {
                for ($i = 0, $count = count($val2); $i < $count; $i++) {
                    $newFiles[$i][$key2] = $val2[$i];
                }
            }
        }
        return $newFiles;
    }

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
        <form method="POST" action="<?= $_SERVER["PHP_SELF"] ?>" enctype="multipart/form-data">

            <label for="file" class="input">
                Inserisci tutte le foto che ti servono per il tuo articolo
                <input type="file" id="file" name="file[]" accept=".jpg, .jpeg, .png, .svg" multiple>
            </label>
            <input type="submit" name="submit" value="uplode file">
        
        </form>
    </body>
</html>