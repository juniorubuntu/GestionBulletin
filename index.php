<!DOCTYPE html>
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
        <script src="Js/Pages/getDonnees.js" type="text/javascript"></script>

        <title>Gestion Bulletin</title>
    </head>
    <body>
        <?php
        require './Classes/Personnel/Personnel.php';
        require './Classes/Personnel/PersonnelManager.php';
        require './Classes/Admin/Admin.php';
        require './Classes/Admin/AdminManager.php';
        require './Classes/Constantes/Constantes.php';
        require './Classes/Constantes/ConstantesManager.php';
        require './Classes/Compte/CompteManager.php';
        require './Classes/Compte/Compte.php';

        include './Templates/install/pages/bareMenu.php';
        include './Php/functions/launch/seetings.php';
        include './Php/functions/launch/application.php';

        include './Php/functions/launch/connect.php';    // Il gère toutes les connections

        if (startApp() == 1) {

            include './Php/functions/launch/install.php';
            include './Templates/install/first.php';
            include './Templates/install/second.php';
            echo '<form method="POST" action="Php/functions/launch/start.php">';
            include './Templates/install/finish.php';
            echo '</form>';
        } else if (startApp() == 2) {

            include './Php/functions/users/createAnUpdate.php';
            createPersonnelForm(0);
        } else {
            ?> 
        <form class="col-md-offset-4 col-md-4" method="POST" action="Templates/Operations/accueil.php" style="border-radius: 100px 0px 100px 0px; color: white; background-color: #1F1D1B;">
                <div class="form-horizontal" style="padding: 50px;">
                    <div class="form-group">
                        <label for="login">Login</label>
                        <input type="text" class="form-control" name ="login" id="login" placeholder="Junior Ubuntu">
                    </div>
                    <div class="form-group">
                        <label for="passwd">Mot de passe</label>
                        <input type="password" class="form-control" name ="passwd" id="passwd" placeholder="Mot de passe">
                    </div>
                    <center><button type="submit" class="btn btn-default">Connecter</button></center>
                </div>
            </form>
            <?php
            
        }
        ?>



        <script src="Js/Pages/afficheParam.js" type="text/javascript"></script>
    </body>
</html>
