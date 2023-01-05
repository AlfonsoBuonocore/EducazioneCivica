<?php


    function connessione(){

        $mysql = new mysqli("localhost","root","","eduCiv");

        return $mysql;

    }

    function get($id){

        $connessione = connessione();

        $content = $connessione -> query("SELECT * FROM tab WHERE id='$id'") -> fetch_assoc();

        $connessione -> close();

        return $content;

    }

    function getAll(){

        $connessione = connessione();

        $content = $connessione -> query("SELECT * FROM tab") -> fetch_all(MYSQLI_ASSOC);

        $connessione -> close();

        return $content;

    }

    function upload($art){

        $connessione = connessione();

        $connessione -> query("INSERT INTO tab(id,img,contenuto) VALUES('".$art["titolo"]."','".$art["img"]."','".$art["contenuto"]."')");

        $connessione -> close();

    }

    function rearrange($files){
        foreach($files as $key1 => $val1) {
            for ($i = 0, $count = count($val1); $i < $count; $i++) {
                $newFiles[$i][$key1] = $val1[$i];
            }
        }
        return $newFiles;
    }

    function exist($id){

        $connessione = connessione();

        $result = $connessione -> query("SELECT * FROM tab WHERE id='$id'") -> fetch_array();

        if ($result == null)
            return false;
        
        return true;

    }

?>