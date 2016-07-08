<link href="../../Css/bootstrap/css/bootstrap-theme.css" rel="stylesheet" type="text/css"/>
<link href="../../Css/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

<script src="../../Css/bootstrap/js/jquery.min.js" type="text/javascript"></script>

<?php
if (isset($_POST['valider'])) {
    require '../../Classes/Evaluation/EvaluationManager.php';
    require '../../Classes/Evaluation/Evaluation.php';

    include_once '../../Php/functions/launch/connect.php';
    $bdd = connect();
    $evaluationManager = new EvaluationManager($bdd);
    ?>
    <div class = "well col-md-offset-2 col-md-8" method = "POST" action = "#">
        <?php
        include '../DonneesStatiques/enteteGenerique.php';
        remplirNoteGeneric('Atemgoua B.', 'Terminale C', 'Mathématiques', '1', '6', 2016);
        ?>
        <div class="col-md-12">
            <table class="table table-bordered">
                <thead style= "font-family: Constantia; font-size: 22px;">
                    <tr>
                        <th >N<u>°</u></th>
                <th >Matricules</th>
                <th>Noms et Prénoms</th>
                <th class="col-md-2">Notes</th>
                <th>Coef</th>
                <th>Total</th>
                </tr>
                </thead>
                <tbody>
                    <?php
                    for ($i = 1; $i <= $_POST['total']; $i++) {
                        
                        $evaluation = new Evaluation(array(
                            'id' => $_POST['id_' . $i . ''],
                            'id_matiere' => $_POST['idMatiere'],
                            'note' => $_POST['note_' . $i . ''],
                            'annee' => $_POST['annee'],
                            'id_sequence' => $_POST['id_sequence']
                        ));
                        
                        //$evaluationManager->add($evaluation);
                        
                        echo '
                    <tr style= "font-family: Arial; font-size: 18px"';
                        if ($i % 2) {
                            echo'class = "success"';
                        }
                        echo'>
                        <td>' . $i . '</td>
                        <td>'.$_POST['matricule_'.$i.''].'</td>
                        <td>'.$_POST['nom_'.$i.''].'</td>
                        <td>'.$_POST['note_'.$i.''].'</td>
                        <td>'.$_POST['coef'].'</td>
                        <td>'.$_POST['note_'.$i.''] * $_POST['coef'] .'</td>
                    </tr>';
                    }
                    ?>
                </tbody>
            </table>
        </div>
        <div class=" col-md-offset-7 col-md-8">
            <div class="">
                <button type="button" class="btn btn-default"><span class="glyphicon glyphicon-remove"></span> Annuler</button>
                <button type="button" class="btn btn-primary col-md-offset-1" onclick="print()" name="valider" value="1"><span class="glyphicon glyphicon-print"></span> Imprimer</button>
            </div>
        </div>
    </div>
    <?php
}