<?php
require '../../Classes/Admin/AdminManager.php';
require '../../Classes/Admin/Admin.php';
require '../../Classes/Personnel/PersonnelManager.php';
require '../../Classes/Personnel/Personnel.php';
require '../../Classes/Compte/CompteManager.php';
require '../../Classes/Compte/Compte.php';
include_once '../../Php/functions/launch/connect.php';

function isAdmin($id) {
    $bdd = connect();
    $req = "SELECT id, code FROM admin where id = $id";

    $query = $bdd->query($req) or die('Erreur recuperation du compte admin');

    if ($query->fetch())
        return 1;
    return 0;
}

if (!isset($_POST['login']) || !isset($_POST['passwd']) || empty($_POST['login']) || empty($_POST['passwd'])) {
    header("Location: http://localhost/GestionBulletin/index.php");
    echo '<center class="danger"><h2>Informations Non valide</h2></center>';
} else {
    $bdd = connect();

    $requeteCompte = 'SELECT personnel.id, nom FROM personnel, compte where ((personnel.id = compte.id_personnel) and (compte.login = "' . $_POST['login'] . '") and (compte.motpasse = "' . $_POST['passwd'] . '"))';
    $requeteNom = $bdd->query($requeteCompte);

    $rslt = $requeteNom->fetch();

    $admin = 0;

    if (isAdmin($rslt['id'])) {
        $admin = 1;
    }
    ?>

    <!DOCTYPE html>
    <!--
    To change this license header, choose License Headers in Project Properties.
    To change this template file, choose Tools | Templates
    and open the template in the editor.
    -->
    <html>
        <head>
            <title>Accueil | Gestion Bulletin</title>
            <link href="../../Css/bootstrap/css/bootstrap-theme.css" rel="stylesheet" type="text/css"/>
            <link href="../../Css/bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css"/>
            <link href="../../Css/Install/parametre.css" rel="stylesheet" type="text/css"/>
            <script src="../../Css/bootstrap/js/jquery.js" type="text/javascript"></script>
            <meta charset="UTF-8">
            <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

            <meta name="viewport" content="width=device-width, initial-scale=1.0">
        </head>
        <body>
            <input type="text" value="<?php echo $admin; ?>" class="hide" id="admin">
            <nav  class="navbar navbar-inverse monmenu col-md-12" style="font: 22px cooper; box-shadow: 2px 2px 2px 3px #9295C1;">
                <ul class="nav navbar-nav lien">
                    <li class="active"><a href="#">Home</a></li>
                </ul>
                <div class="container-fluid">
                    <ul class="nav navbar-nav">
                        <li class="dropdown" onclick="sousRubrique('rub5')">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button">Gestion des Classes <span class="caret"></span></a>
                            <ul class="dropdown-menu rub5">
                                <li><a onclick="addClasse()" href="#">Creation des salles de classes</a></li>
                                <li><a href="#">Classes disponibles</a></li>
                            </ul>
                        </li>
                        <li class="dropdown" onclick="sousRubrique('rub1')">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button">Gestion des Elèves <span class="caret"></span></a>
                            <ul class="dropdown-menu rub1">
                                <li><a href="#" onclick="inscrire()" >Enregistrement</a></li>
                                <li><a href="#">Afficher les listes</a></li>
                            </ul>
                        </li>
                        <li class="dropdown" onclick="sousRubrique('rub2')">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button">Gestion des notes <span class="caret"></span></a>
                            <ul class="dropdown-menu rub2">
                                <li><a  onclick="remplirNote()" href="#">Remplir les notes</a></li>
                                <li><a href="#">Modifier une note</a></li>
                                <li><a href="#">Statistiques</a></li>
                                <li><a href="#">Exporter des notes</a></li>
                            </ul>
                        </li>
                        <li class="dropdown" onclick="sousRubrique('rub3')">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button">Gérer les delibérations <span class="caret"></span></a>
                            <ul class="dropdown-menu rub3">
                                <li><a href="#">Par séquence</a></li>
                                <li><a href="#">Par trimestre</a></li>
                                <li><a href="#">Annuel</a></li>
                                <li><a href="#">Procès verbal</a></li>
                                <li><a href="#">Exxoprtation des données</a></li>
                            </ul>
                        </li>
                        <li class="dropdown" onclick="sousRubrique('rub4')">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button">Générer les Bulletins <span class="caret"></span></a>
                            <ul class="dropdown-menu rub4">
                                <li><a href="#">Séquentiel</a></li>
                                <li><a href="#">Trimestriel</a></li>
                                <li><a href="#">Annuel</a></li>
                                <li><a href="#">D'un cycle</a></li>
                                <li><a href="#">D'un parcours</a></li>
                            </ul>
                        </li>
                    </ul>
                    <form class="navbar-form pull-right lien param">
                        <button title="Cliquer pour Modifier les paramètres." type = "button" onclick = "afficheParmam()" class="btn btn-primary btn-sm btn-seetings"><span class="glyphicon glyphicon-cog"> Gérer</span></button>
                    </form>
                    <form class="navbar-form pull-right lien user col-md-4">
                        <button title="Cliquer pour Modifier vos paramètres." type = "button" onclick = "afficheAction(1)" class="btn btn-primary btn-sm btn-seetings"><span class="glyphicon glyphicon-user"> <?php echo $rslt['nom']; ?> </span></button>
                    </form>
                </div>
            </nav>
            <div class="parametres well col-md-12" >
                <button class="btn btn-default btn-sm col-md-5" onclick="afficheAction(0)"><span class="glyphicon glyphicon-user"> Accounts </span></button>
                <div class="comptes dropdown-menu panel panel-info col-md-12 moi">
                    <h4><u>Action à effectuer</u></h4>
                    <div class="actions panel">
                        <button class="btn btn-primary btn-sm col-md-12" onclick="newcompte()"><span class="glyphicon glyphicon-plus"> Create a new account </span></button>
                        <button class="btn btn-info btn-sm col-md-12"><span class="glyphicon glyphicon-edit"> Edit an account </span></button>
                        <button class="btn btn-danger btn-sm col-md-12"><span class="glyphicon glyphicon-remove"> Delete an account </span></button>
                    </div>
                </div>
                <button class="btn btn-default col-md-offset-1 btn-sm col-md-5" onclick=""><span class="glyphicon glyphicon-remove"> Log out </span></button>
            </div>
            <div class="col-md-3 col-md-offset-9 ">
                <div class="com comptes well col-md-12 dropdown-menu">
                    <h5><u>Modifier vos paramètres</u></h5>
                    <button class="btn btn-primary btn-sm col-md-7" onclick="updateCompte()"><span class="glyphicon glyphicon-edit"> Update informations </span></button>
                    <button class="btn btn-default col-md-offset-1 btn-sm col-md-4" onclick=""><span class="glyphicon glyphicon-remove-sign"> Log out </span></button>
                </div>
            </div>

            <?php
            include './inscrire.php';
            ?>

            <script type="text/javascript">

                var use = 0;

                var actif = document.getElementsByClassName('sousmenu')[0];
                function sousRubrique(rub) {
                    if (use === 0) {
                        if (actif)
                            actif.hide("slow");
                        if ($('.' + rub + '').hasClass('sousmenu')) {
                            $('.' + rub + '').removeClass('sousmenu');
                        } else {
                            $('.' + rub + '').show("slow");
                            $('.' + rub + '').addClass('sousmenu');
                            actif = $('.' + rub + '');
                            use = 0;
                        }
                        use = 0;
                    }
                }
                function inscrire() {
                    if (use === 0) {
                        $('.inscrire').show("slow");
                        $('.inscrire').removeClass("dropdown-menu");
                        actif.hide("slow");
                        use = 0;
                    }
                    use = 1;
                }

                function remplirNote() {
                    if (use === 0) {
                        $('.remplirNote').show(".show");
                        $('.remplirNote').removeClass("dropdown-menu");
                        actif.hide("slow");
                        use = 0;
                    }
                    use = 1;
                }

                function addClasse() {
                    if (use === 0) {
                        $('.addClasse').show("slow");
                        $('.addClasse').removeClass('dropdown-menu');
                        actif.hide("slow");
                        use = 0;
                    }
                    use = 1;
                }

                var test = document.getElementById('admin');
                if (test.value === '0') {
                    $('.param').addClass('dropdown-menu');
                } else {
                    $('.user').addClass('dropdown-menu');
                }
            </script>

            <script src="../../Js/Pages/afficheParam.js" type="text/javascript"></script>
        </body>
    </html>
<?php } ?>