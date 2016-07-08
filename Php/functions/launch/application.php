<?php

function testIfServerStarted() {
    $status = 1;
    $user = 'root';
    $pwd = '';
    $server = 'mysql:host=127.0.0.1;dbname=modelerelationnelgestionnotes';
    try {
        $bdd = new PDO($server, $user, $pwd);
    } catch (Exception $ex) {
        die('<div class="alert alert-danger col-md-offset-4 row col-md-4"><center><h1>Ooouups!!!</h1><h2>Démarrer le serveur Mysql ...</h2></center></div>');
        $status = 0;
    }
    return $status;
}

function testIfConstante() {
    
    $status = 1;
    $bdd = connect();
    
    $constanteManager = new ConstantesManager($bdd);
    $cons = $constanteManager->findConstantesSpecial(1);
    if ($cons['id'] =='') {
        return 0;
    }
    return $status;
}

function testIfAdmin() {
    $status = 1;
    $bdd = connect();
    
    $adminManger = new AdminManager($bdd);
    $listeAdmin = $adminManger->findAll();
    if (count($listeAdmin) == 0) {
        $status = 0;
    } else {
        return $status;
    }
    return $status;
}

function startApp() {
    
    $status = 0;
    
    if (!testIfServerStarted()) {
        // TODO 
    } else {
        if (!testIfConstante()) {
            $status = 1;
        } else {
            if (!testIfAdmin()) {
                $status = 2; //indique que l'administrateur n'existe pas encore
            } else {
                $status = 10;
            }
        }
    }
    return $status;
}

function demarrage() {
    
}
