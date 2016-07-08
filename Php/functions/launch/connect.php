<?php

function connect() {
    $db = 'modelerelationnelgestionnotes';
    $user = 'root';
    $pwd = '';
    $server = 'mysql:host=127.0.0.1;dbname=modelerelationnelgestionnotes';

    try {
        $bdd = new PDO($server, $user, $pwd);
    } catch (Exception $ex) {
        die('Erreur: ' . $ex->getMessage());
    }
    return $bdd;
}
