<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <link href="Css/bootstrap/css/bootstrap-theme.css" rel="stylesheet" type="text/css"/>
        <link href="Css/bootstrap/css/bootstrap-theme.min.css" rel="stylesheet" type="text/css"/>
        <link href="Css/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="Css/bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css"/>
        <link href="Css/Install/install.css" rel="stylesheet" type="text/css"/>
        <link href="Css/Install/start.css" rel="stylesheet" type="text/css"/>
        <link href="Css/Install/parametre.css" rel="stylesheet" type="text/css"/>
        <script src="Css/bootstrap/js/jquery.js" type="text/javascript"></script>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title>Gestion Bulletin</title>

        <style>

            .rotate {
                //-webkit-transform: rotate(-90deg);
            }

        </style>

    </head>
    <body style="font-family: Constantia">
        <div class="bullSequentiel col-md-6 col-md-offset-3 well">
            <?php
            include './Php/functions/launch/connect.php';
            require './Classes/Constantes/ConstantesManager.php';
            require './Classes/Constantes/Constantes.php';
            require './Classes/Ecole/EcoleManager.php';
            require './Classes/Ecole/Ecole.php';
            require './Classes/Eleve/EleveManager.php';
            require './Classes/Eleve/Eleve.php';

            include './Templates/DonneesStatiques/enteteGenerique.php';
            ?>

            <center>
                <h5>
                    Année scolaire 2016/2017
                </h5>
                <h5>
                    Bulletin séquentielle N° 2
                </h5>
            </center>

            <?php
            $eleveManag = new EleveManager($bdd);
            $eleve = $eleveManag->findEleve(2);
            ?>

            <div class="identification col-md-10 col-md-offset-1" style="padding: 20px">
                <table class="">
                    <tr>
                        <td>
                            Noms et prénoms
                        </td>
                        <td colspan="2" style="padding-left: 20px">
                            <strong><?php echo $eleve->get_nom() . '  ' . $eleve->get_prenom(); ?></strong>
                        </td>
                        <td>
                            Matricule
                        </td>
                        <td style="padding-left: 20px;">
                            <strong><?php echo $eleve->get_matricule(); ?></strong>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Né(e) le
                        </td>
                        <td style="padding-left: 20px">
                            <strong><?php echo $eleve->get_datenaiss(); ?></strong>
                        </td>
                        <td style="padding-left: 60px">
                            A
                        </td>
                        <td style="">
                            <strong><?php echo $eleve->get_lieu(); ?></strong>
                        </td>
                        <td style="padding-left: 20px">
                            Sexe
                        </td>
                        <td style="padding-left: 20px">
                            <strong>
                                <?php
                                if ($eleve->get_sexe() == 1)
                                    echo 'Homme';
                                else
                                    echo 'Femme';
                                ?>
                            </strong>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Parents
                        </td>
                        <td style="padding-left: 20px">
                            .............
                        </td>
                        <td>
                            Adresse des parents
                        </td>
                        <td style="padding-left: 2px" colspan="2">
                            ........................
                        </td>
                    </tr>
                </table>
            </div>
            <table class="well table table-bordered" style="padding: 20px">
                <thead>
                    <tr>
                        <th class="rotate">
                            Grp.
                        </th>
                        <th>
                            Ensg.
                        </th>
                        <th>
                            Matière
                        </th>
                        <th>
                            Note
                        </th>
                        <th>
                            Coef
                        </th>
                        <th>
                            Total
                        </th>
                        <th>
                            Moy Part.
                        </th>
                        <th>
                            Appr.
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        
                    
                    ?>
                    <tr>
                        <td class="rotate">
                            Grp.
                        </td>
                        <td>
                            Ensg.
                        </td>
                        <td>
                            Matière
                        </td>
                        <td>
                            Note
                        </td>
                        <td>
                            Coef
                        </td>
                        <td>
                            Total
                        </td>
                        <td>
                            Moy Part.
                        </td>
                        <td>
                            Appr.
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </body>
</html>
