<?php


    function connessione(){

        $mysql = new mysqli("localhost","root","","eduCiv");

        return $mysql;

    }

    function get($id){

        $connessione = connessione();

        $content = $connessione->query("SELECT * FROM tab WHERE id='$id'") -> fetch_assoc();

        $connessione -> close();

        return $content;

    }

    function getAll(){

        $connessione = connessione();

        $content = $connessione->query("SELECT * FROM tab") -> fetch_all(MYSQLI_ASSOC);

        $connessione -> close();

        return $content;

    }


?>