<?php

function createPersonnelForm($type) {
    if (isset($_POST['bouton'])) {
        if (!empty($_POST['nom']) && !empty($_POST['prenom']) &&
                !empty($_POST['adresse']) && !empty($_POST['code']) && 
                !empty($_POST['login']) && !empty($_POST['passwd']) && 
                !empty($_POST['confirmpasswd'])) {

            $bdd = connect();
            $personnelManager = new PersonnelManager($bdd);
            $adminManager = new AdminManager($bdd);
            $compteManager = new CompteManager($bdd);
            

            $personnel = new Personnel(array(
                'nom' => utf8_decode($_POST['nom']),
                'prenom' => utf8_decode($_POST['prenom']),
                'adresse' => utf8_decode($_POST['adresse'])
            ));

            $personnelManager->add($personnel);

            $admin = new Admin(array(
                'id' => $personnelManager->findPersonnel(1)->get_id(),
                'code' => utf8_decode($_POST['code']),
            ));
            $adminManager->add($admin);
            
            $compte = new Compte(array(
               'id_personnel' => $personnelManager->findPersonnel(1)->get_id(),
                'type' => 'admin',
                'login' => $_POST['login'],
                'motpasse' => $_POST['passwd']
            ));
            $compteManager->add($compte);
            
        } else {
            echo'<div class="row">"
            <div class="col-md-offset-4 col-md-4"><span class="alert alert-danger">Veuillez remplir tous les champs obligatoire *</span></div>
            </div>';
            ?>
            <div class="row">
                <h2 class="text-center">Fin de l'installation </h2>
            </div>
            <div class="row">
                <h4 class="text-center">Création du compte administrateur</h4>
            </div>
            <div class="row">
                <h4 class="text-center">Qui êtes vous ?</h4>
            </div>

            <form method = "POST" action="" >
                <div class="row">                
                    <div class="col-md-offset-4 col-md-4">
                        <div class="form-group nomP">
                            <label for="nom">Nom* :</label>
                            <input id="nom" name="nom"
                            <?php
                            if (isset($_POST['bouton'])) {
                                echo 'value="' . $_POST['nom'] . '"';
                            }
                            ?> type="text" class="form-control" placeholder="ex: Atemgoua"/>
                            <span class="glyphicon glyphicon-remove form-control-feedback hide sp13"></span>
                        </div>
                    </div>    
                </div>
                <div class="row">                
                    <div class="col-md-offset-4 col-md-4">
                        <div class="form-group prenomP">
                            <label for="prenom">Prénom* :</label>
                            <span class="glyphicon glyphicon-remove form-control-feedback hide sp14">Desole</span>
                            <input id="prenom" <?php
                            if (isset($_POST['bouton'])) {
                                echo 'value="' . $_POST['prenom'] . '"';
                            }
                            ?> name="prenom" type="text" class="form-control" placeholder="ex: Evadas"/>
                        </div>
                    </div>    
                </div>
                <div class="row">                
                    <div class="col-md-offset-4 col-md-4">
                        <div class="form-group adresseP">
                            <label for="adresse">Adresse* :</label>
                            <input id="adresse" <?php
                            if (isset($_POST['bouton'])) {
                                echo 'value="' . $_POST['adresse'] . '"';
                            }
                            ?> name="adresse" type="text" class="form-control" placeholder="ex: juniorubuntu@gmail.com">
                            <span class="glyphicon glyphicon-remove form-control-feedback hide sp14"></span>
                        </div>
                    </div>    
                </div>
                <div class="row codesecret">                
                    <div class="col-md-offset-4 col-md-4">
                        <div class="form-group loginP">
                            <label for="login">Login* :</label>
                            <input id="login" <?php
                            if (isset($_POST['bouton'])) {
                                echo 'value="' . $_POST['login'] . '"';
                            }
                            ?> name="login" type="text" class="form-control" placeholder="ex: juniorubuntu">
                            <span class="glyphicon glyphicon-remove form-control-feedback hide sp15"></span>
                        </div>
                    </div>    
                </div>
                <div class="row codesecret">                
                    <div class="col-md-offset-4 col-md-4">
                        <div class="form-group passwdP">
                            <label for="passwd">Mot de passe* :</label>
                            <input id="passwd" <?php
                            if (isset($_POST['bouton'])) {
                                echo 'value="' . $_POST['passwd'] . '"';
                            }
                            ?> name="passwd" type="password" class="form-control" placeholder="">
                            <span class="glyphicon glyphicon-remove form-control-feedback hide sp16"></span>
                        </div>
                    </div>    
                </div>
                <div class="row codesecret">                
                    <div class="col-md-offset-4 col-md-4">
                        <div class="form-group confirmpasswdP">
                            <label for="confirmpasswd">Confirmer le  de passe* :</label>
                            <input id="confirmpasswd" <?php
                            if (isset($_POST['bouton'])) {
                                echo 'value="' . $_POST['confirmpasswd'] . '"';
                            }
                            ?> name="confirmpasswd" type="password" class="form-control" placeholder="">
                            <span class="glyphicon glyphicon-remove form-control-feedback hide sp17"></span>
                        </div>
                    </div>    
                </div>
                <div class="row">                
                    <div class="col-md-offset-4 col-md-4">
                        <div class="form-group codesecret codeP">
                            <label for="code">Code secret de récupération* : </label>
                            <input id="code" <?php
                            if (isset($_POST['bouton'])) {
                                echo 'value="' . $_POST['code'] . '"';
                            }
                            ?> name="code" type="text" class="form-control" placeholder="ex: ADJaohvs13<1">
                            <span class="glyphicon glyphicon-remove form-control-feedback hide sp16"></span>
                        </div>
                    </div>    
                </div>

                <div class="row">
                    <div class="col-md-offset-6 col-md-1">
                        <input type="submit" name="bouton" class="btn btn-primary" value="Create"/>
                    </div> 

                    <div>
                        <a class="btn btn-default active">Cancel</a>
                    </div>
                </div>
            </form>
            <?php
            if ($type == 1) {
                echo '<script type="text/javascript">$(\'.codesecret\').addClass(\'dropdown-menu\'); $(\'.fin-install\').addClass(\'dropdown-menu\');</script>';
            }
        }
    } else {
        ?>
        <div class="row">
            <h2 class="text-center">Fin de l'installation </h2>
        </div>
        <div class="row">
            <h4 class="text-center">Création du compte administrateur</h4>
        </div>
        <div class="row">
            <h4 class="text-center">Qui êtes vous ?</h4>
        </div>

        <form method = "POST" action="" >
            <div class="row">                
                <div class="col-md-offset-4 col-md-4">
                    <div class="form-group nomP">
                        <label for="nom">Nom* :</label>
                        <input id="nom" name="nom"
                        <?php
                        if (isset($_POST['bouton'])) {
                            echo 'value="' . $_POST['nom'] . '"';
                        }
                        ?> type="text" class="form-control" placeholder="ex: Atemgoua"/>
                        <span class="glyphicon glyphicon-remove form-control-feedback hide sp13"></span>
                    </div>
                </div>    
            </div>
            <div class="row">                
                <div class="col-md-offset-4 col-md-4">
                    <div class="form-group prenomP">
                        <label for="prenom">Prénom* :</label>
                        <span class="glyphicon glyphicon-remove form-control-feedback hide sp14">Desole</span>
                        <input id="prenom" <?php
                        if (isset($_POST['bouton'])) {
                            echo 'value="' . $_POST['prenom'] . '"';
                        }
                        ?> name="prenom" type="text" class="form-control" placeholder="ex: Evadas"/>
                    </div>
                </div>    
            </div>
            <div class="row">                
                <div class="col-md-offset-4 col-md-4">
                    <div class="form-group adresseP">
                        <label for="adresse">Adresse* :</label>
                        <input id="adresse" <?php
                        if (isset($_POST['bouton'])) {
                            echo 'value="' . $_POST['adresse'] . '"';
                        }
                        ?> name="adresse" type="text" class="form-control" placeholder="ex: juniorubuntu@gmail.com">
                        <span class="glyphicon glyphicon-remove form-control-feedback hide sp14"></span>
                    </div>
                </div>    
            </div>
            <div class="row codesecret">                
                <div class="col-md-offset-4 col-md-4 ">
                    <div class="form-group loginP">
                        <label for="login">Login* :</label>
                        <input id="login" <?php
                        if (isset($_POST['bouton'])) {
                            echo 'value="' . $_POST['login'] . '"';
                        }
                        ?> name="login" type="text" class="form-control" placeholder="ex: juniorubuntu">
                        <span class="glyphicon glyphicon-remove form-control-feedback hide sp15"></span>
                    </div>
                </div>    
            </div>
            <div class="row codesecret">                
                <div class="col-md-offset-4 col-md-4">
                    <div class="form-group passwdP">
                        <label for="passwd">Mot de passe* :</label>
                        <input id="passwd" <?php
                        if (isset($_POST['bouton'])) {
                            echo 'value="' . $_POST['passwd'] . '"';
                        }
                        ?> name="passwd" type="password" class="form-control" placeholder="">
                        <span class="glyphicon glyphicon-remove form-control-feedback hide sp16"></span>
                    </div>
                </div>    
            </div>
            <div class="row codesecret">                
                <div class="col-md-offset-4 col-md-4">
                    <div class="form-group confirmpasswdP">
                        <label for="confirmpasswd">Confirmer le mot de passe* :</label>
                        <input id="confirmpasswd" <?php
                        if (isset($_POST['bouton'])) {
                            echo 'value="' . $_POST['confirmpasswd'] . '"';
                        }
                        ?> name="confirmpasswd" type="password" class="form-control" placeholder="">
                        <span class="glyphicon glyphicon-remove form-control-feedback hide sp17"></span>
                    </div>
                </div>    
            </div>
            <div class="row">                
                <div class="col-md-offset-4 col-md-4">
                    <div class="form-group codesecret codeP">
                        <label for="code">Code secret de récupération* : </label>
                        <input id="code" <?php
                        if (isset($_POST['bouton'])) {
                            echo 'value="' . $_POST['code'] . '"';
                        }
                        ?> name="code" type="text" class="form-control" placeholder="ex: ADJaohvs13<1">
                        <span class="glyphicon glyphicon-remove form-control-feedback hide sp16"></span>
                    </div>
                </div>    
            </div>

            <div class="row">
                <div class="col-md-offset-6 col-md-1">
                    <input type="submit" name="bouton" class="btn btn-primary" value="Create"/>
                </div> 

                <div>
                    <a class="btn btn-default active">Cancel</a>
                </div>
            </div>
        </form>
        <?php
        if ($type == 1) {
            echo '<script type="text/javascript">$(\'.codesecret\').addClass(\'dropdown-menu\'); $(\'.fin-install\').addClass(\'dropdown-menu\');</script>';
        }
    }
}
?>
<?php

function createClasseForm() {
    
}

function createSequenceForm() {
    
}

function createCategorieForm() {
    
}
?>
<?php

function createAccountForm() {

    $bdd = connect();
    $requetePers = "SELECT * FROM personnel";
    $resultatPers = $bdd->query($requetePers);
    ?>
    <div class="row">
        <h4 class="text-center">Création du compte Personnel</h4>
    </div>

    <form method = "POST" action="" >
        <div class="row">                
            <div class="col-md-offset-4 col-md-4">
                <div class="form-group nomP">
                    <label for="nom">Nom* :</label>
                    <input id="nom" name="nom"
                    <?php
                    if (isset($_POST['bouton'])) {
                        echo 'value = "' . $_POST['nom'] . '"';
                    }
                    ?> type="text" class="form-control" placeholder="ex: Atemgoua"/>
                    <span class="glyphicon glyphicon-remove form-control-feedback hide sp13"></span>
                </div>
            </div>    
        </div>
        <div class="row">                
            <div class="col-md-offset-4 col-md-4">
                <div class="form-group prenomP">
                    <label for="prenom">Prénom* :</label>
                    <span class="glyphicon glyphicon-remove form-control-feedback hide sp14">Desole</span>
                    <input id="prenom" <?php
                    if (isset($_POST['bouton'])) {
                        echo 'value = "' . $_POST['prenom'] . '"';
                    }
                    ?> name="prenom" type="text" class="form-control" placeholder="ex: Evadas"/>
                </div>
            </div>    
        </div>
        <div class="row">                
            <div class="col-md-offset-4 col-md-4">
                <div class="form-group adresseP">
                    <label for="adresse">Adresse* :</label>
                    <input id="adresse" <?php
                    if (isset($_POST['bouton'])) {
                        echo 'value = "' . $_POST['adresse'] . '"';
                    }
                    ?> name="adresse" type="text" class="form-control" placeholder="ex: juniorubuntu@gmail.com">
                    <span class="glyphicon glyphicon-remove form-control-feedback hide sp14"></span>
                </div>
            </div>    
        </div>
        <div class="row">                
            <div class="col-md-offset-4 col-md-4">
                <div class="form-group codesecret codeP">
                    <label for="code">Code secret de récupération* : </label>
                    <input id="code" <?php
                    if (isset($_POST['bouton'])) {
                        echo 'value = "' . $_POST['code'] . '"';
                    }
                    ?> name="code" type="text" class="form-control" placeholder="ex: ADJaohvs13<1">
                    <span class="glyphicon glyphicon-remove form-control-feedback hide sp16"></span>
                </div>
            </div>    
        </div>
        <div class="row">
            <div class="col-md-offset-6 col-md-1">
                <input type="submit" name="bouton" class="btn btn-primary" value="Create"/>
            </div> 

            <div>
                <a class="btn btn-default active">Cancel</a>
            </div>
        </div>
    </form>
    <?php
}

function createEleveForm() {
    
}
?>

<?php

function createMatiereForm() {
    /* Requete du menu déroulant des catégories */

    include './Php/functions/launch/connect.php';
    $bdd = connect();

    $requete = "SELECT id, libele FROM categorie";
    $resultat = $bdd->query($requete);


//    require './Classes/Categorie/CategorieManager.php';
//    require './Classes/Categorie/Categorie.php';
//    
//    $categoPerso = new PersonnelManager($bdd);
//    $categorie = $categoPerso->findPersonnel(1);

    echo ' <pre>';
    print_r($resultat);
    echo ' </pre>';

    /* echo 'OUPs!!!!!!!!!!!!!!!!!!!!';
      if (isset($_POST['bouton'])) {
      if (!empty($_POST['categorie']) && !empty($_POST['intitule'])) {
      $matiereManager = new MatiereManager($bdd);
      $matiere = new Matiere(array(
      'id_categorie' => utf8_decode($_POST['categorie']),
      'intitule' => utf8_decode($_POST['intitule'])
      ));
      $matiereManager->add($matiere);
      } else {
      echo'<div class="row">"
      <div class="col-md-offset-4 col-md-4"><span class="alert alert-danger">Veuillez remplir tous les champs obligatoire *</span></div>
      </div>';
      }
      } */
    ?>
    <div class="row">
        <h4 class="text-center">Enregistrement d'une nouvelle Matiere</h4>
    </div>
    <form method = "POST" action = "" >
        <div class = "row">
            <div class = "col-md-offset-4 col-md-4">
                <div class = "form-group">
                    <label for = "intitule">Intitulé* :</label>
                    <input id = "intitule" name = "intitule"
                    <?php
                    if (isset($_POST['bouton'])) {
                        echo 'value = "' . $_POST['intitule'] . '"';
                    }
                    ?> type="text" class="form-control" placeholder="ex: Litterature"/>
                </div>
            </div>    
        </div>
        <div class="row">                
            <div class="col-md-offset-4 col-md-6">
                <div class="form-group">
                    <label class="col-md-5" for="categorie">Selectionner une Catégorie* :</label>
                    <select class="col-md-3" name="categorie" id="categorie">
                        <?php /* while ($categorie = $resultat->fetch()) { ?>
                          <option value = " <?php echo $categorie['id']; ?>"><?php echo utf8_encode($categorie['libele']); ?></option>
                          <?php } */ ?>
                    </select>
                </div>
            </div>
        </div>
        <div class="row hide">
            <div class="col-md-offset-6 col-md-1">
                <input type="submit" name="bouton" class="btn btn-primary" value="Enregistrer"/>
            </div> 

            <div>
                <a class="btn btn-default active">Cancel</a>
            </div>
        </div>
    </form>
    <?php
}
