<?php


function createPersonnelForm($type){
        echo '<div class="block-first-admin form-newuser">
            <div class="info-admin col-md-12">
                <div class="info-region fin-install">
                    <center><h2>Fin de l\'installation</h2><h4>Création du compte administrateur</h4></center>
                </div>
                <form class="col-md-12">
                    <legend>Qui êtes vous ?</legend>
                    <div class="form-group">
                        <label for="texte">Nom :</label>
                        <input id="text" type="text" class="form-control" placeholder="ex: Atemgoua">
                    </div>
                    <div class="form-group">
                        <label for="texte">Prénom :</label>
                        <input id="text" type="text" class="form-control" placeholder="ex: Evadas">
                    </div>
                    <div class="form-group">
                        <label for="texte">Adresse :</label>
                        <input id="text" type="text" class="form-control" placeholder="ex: juniorubuntu@gmail.com">
                    </div>
                    <div class="form-group codesecret">
                        <label for="texte">Code secret de récupération : </label>
                        <input id="text" type="text" class="form-control" placeholder="ex: ADJaohvs13<1">
                    </div>
                </form>
            </div>
            <div class="avance-admin">
                <div class="boutton-start">
                    <div class="cancel">
                        <input type="button" onclick="ok()" value="Create" name="valider" class="btn-primary"/>
                    </div> 
                    <div class="next">
                        <input type="button" onclick="ok()" value="Cancel" name="annuler" class="btn-primary"/>
                    </div>
                </div>
            </div>
        </div>';
    if($type == 1){
        echo '<script type="text/javascript">$(\'.codesecret\').addClass(\'dropdown-menu\'); $(\'.fin-install\').addClass(\'dropdown-menu\');</script>';
    }
}

function createClasseForm(){
    
}

function createSequenceForm(){
    
}

function createCategorieForm(){
    
}

function createAccountForm(){
    
}

function createEleveForm(){
    
}


function createMatiereForm(){
    
}