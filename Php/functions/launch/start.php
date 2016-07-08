<?php

if (isset($_POST['nompays']) && isset($_POST['deviseEcole']) &&
        isset($_POST['devisePays']) && isset($_POST['nomEcole']) && isset($_POST['nomMinistere']) && isset($_POST['boitePostal']) && isset($_POST['countryName']) && isset($_POST['schoolMotto']) && isset($_POST['countryMotto']) && isset($_POST['schoolName']) && isset($_POST['ministryName']) && isset($_POST['poBox'])) {
    
    require '../../../Classes/Constantes/ConstantesManager.php';
    require '../../../Classes/Constantes/Constantes.php';
    require '../../../Classes/Ecole/EcoleManager.php';
    require '../../../Classes/Ecole/Ecole.php';

    echo 'oupsssss un sauveur ';

    $db = 'modelerelationnelgestionnotes';
    $user = 'root';
    $pwd = '';
    $server = 'mysql:host=127.0.0.1;dbname=modelerelationnelgestionnotes';

    echo 'Je suis ici declaration';

    try {
        $bdd = new PDO($server, $user, $pwd);
    } catch (Exception $ex) {
        die('Erreur: ' . $ex->getMessage());
    }

    echo 'Je suis ici connexion';
    $ecoleManager = new EcoleManager($bdd);
    $constanteManager = new ConstantesManager($bdd);
    echo 'Je suis ici instanciation des managers';
    $ecole = new Ecole(array(
        'nomfr' => $_POST['nomEcole'],
        'noman' => $_POST['schoolName'],
        'devisefr' => $_POST['deviseEcole'],
        'devisean' => $_POST['schoolMotto'],
        'pb' => $_POST['boitePostal']
    ));


    $constante = new Constantes(array(
        'paysfr' => $_POST['nompays'],
        'paysan' => $_POST['countryName'],
        'ministryfr' => $_POST['nomMinistere'],
        'ministryan' => $_POST['ministryName'],
        'devisefr' => $_POST['devisePays'],
        'devisean' => $_POST['countryMotto']
    ));
    echo 'Je suis ici construction';
    $ecoleManager->add($ecole);
    $constanteManager->add($constante);

    echo 'Je suis ici fin';
} else {
    echo 'Les informamtions ne sont pas bien spécifiés';
}
//else {
//    
//    echo '<div class="block-first-admin">
//            <div class="info-admin col-md-12">
//                <div class="info-region">
//                    <center><h2>Fin de l\'installation</h2><h4>Création du compte administrateur</h4></center>
//                </div>
//                <form class="col-md-12">
//                    <legend>Qui êtes vous ?</legend>
//                    <div class="form-group">
//                        <label for="texte">Nom :</label>
//                        <input id="text" type="text" class="form-control" placeholder="ex: Atemgoua">
//                    </div>
//                    <div class="form-group">
//                        <label for="texte">Prénom :</label>
//                        <input id="text" type="text" class="form-control" placeholder="ex: Evadas">
//                    </div>
//                    <div class="form-group">
//                        <label for="texte">Adresse :</label>
//                        <input id="text" type="text" class="form-control" placeholder="ex: juniorubuntu@gmail.com">
//                    </div>
//                    <div class="form-group codesecret">
//                        <label for="texte">Code secret de récupération : </label>
//                        <input id="text" type="text" class="form-control" placeholder="ex: ADJaohvs13<1">
//                    </div>
//                    <div class="form-group">
//                        <label for="texte">Login : </label>
//                        <input id="text" type="text" class="form-control" placeholder="ex: ADJaohvs13<1">
//                    </div>
//                    <div class="form-group">
//                        <label for="texte">Mot de passe </label>
//                        <input id="text" type="password" class="form-control" placeholder="ex: ADJaohvs13<1">
//                    </div>
//                    <div class="form-group">
//                        <label for="texte">Confirmer le mot de passe </label>
//                        <input id="text" type="password" class="form-control" placeholder="ex: ADJaohvs13<1">
//                    </div>
//                </form>
//            </div>
//            <div class="avance-admin">
//                <div class="boutton-start">
//                    <div class="cancel">
//                        <input type="button" value="Create" name="valider" class="btn-primary"/>
//                    </div> 
//                    <div class="next">
//                        <input type="button" value="Cancel" name="annuler" class="btn-primary"/>
//                    </div>
//                </div>
//            </div>
//        </div>';
//}