<?php
//include_once '../../Php/functions/launch/connect.php';
$bdd = connect();

//require '../../Classes/Constantes/ConstantesManager.php';
//require '../../Classes/Constantes/Constantes.php';

//require '../../Classes/Ecole/EcoleManager.php';
//require '../../Classes/Ecole/Ecole.php';
$constanteManager = new ConstantesManager($bdd);
$constante = $constanteManager->findConstantes(1);

$ecoleManager = new EcoleManager($bdd);
$ecole = $ecoleManager->findEcole(2);
?>

<div class="col-md-12" style="font-family: Constantia; font-size: 10px;">
    <div class="col-md-5">
        <center><label class="col-md-12"><?php echo $constante->get_paysfr(); ?></label></center>
        <center><label class="col-md-12"><?php echo $constante->get_devisefr(); ?></label></center>
        <center><label class="col-md-12"><?php echo $constante->get_ministryfr(); ?></label></center>
        <center><label class="col-md-12"><?php echo $ecole->get_nomfr(); ?></label></center>
        <center><label class="col-md-12"><?php echo $ecole->get_devisefr(); ?></label></center>
        <center><label class="col-md-12">B.P: <?php echo $ecole->get_pb(); ?></label></center>
    </div>
    <div class="col-md-2">
        <img src="./Ressources/Images/logoABS3.jpg.png" 
             style="height: 120px;
             width: 150px;
             margin-left: -37px;"/>
    </div>
    <div class="col-md-5">
        <center><label class="col-md-12"><?php echo $constante->get_paysfr(); ?></label></center>
        <center><label class="col-md-12"><?php echo $constante->get_devisean(); ?></label></center>
        <center><label class="col-md-12"><?php echo $constante->get_ministryan(); ?></label></center>
        <center><label class="col-md-12"><?php echo $ecole->get_noman(); ?></label></center>
        <center><label class="col-md-12"><?php echo $ecole->get_devisean(); ?></label></center>
        <center><label class="col-md-12">P.O. Box: <?php echo $ecole->get_pb(); ?></label></center>
    </div>
</div>


<?php

function remplirNoteGeneric($enseig, $classe, $matiere, $seq, $coef, $annee) {
    echo '<br>
    <!--<div class="col-md-12"> -->
        <center class="col-md-12"><u><h4>Année Scolaire: ' . $annee . ' / ' . ++$annee . '</u></h4></center>
        <center class="col-md-12"><u><h4>Evaluation séquentielle N°: ' . $seq . '</u></h4></center>
        <div class="col-md-12">
            <label class="col-md-4">Enseignant: M. ' . $enseig . '</label>
            <label class="col-md-offset-4 col-md-4">Classe: ' . $classe . '</label>
        </div>
        <div class="col-md-12">
            <label class="col-md-4">Matière: ' . $matiere . '</label>
            <label class="col-md-offset-4 col-md-4">Coef: ' . $coef . '</label>
        </div>
    <!--</div>--><br>';
}
?>