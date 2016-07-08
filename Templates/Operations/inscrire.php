<form class="form-horizontal well col-md-offset-3 col-md-5 inscrire dropdown-menu">
    <div class="form-group">
        <label for="matricule" class="col-sm-4 control-label">Matricule</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="matricule" name="matricule" placeholder="Matricule">
        </div>
    </div>
    <div class="form-group">
        <label for="Nom" class="col-sm-4 control-label">Nom</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="Nom" name="nom" placeholder="Nom">
        </div>
    </div>
    <div class="form-group">
        <label for="prenom" class="col-sm-4 control-label">Prénom</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="prenom" name="matricule" placeholder="Prénom">
        </div>
    </div>
    <div class="form-group">
        <label for="datenaiss" class="col-sm-4 control-label">Date de naissance</label>
        <div class="col-sm-6">
            <select class=" " style="height: 30px;">
                <option value="0" selected="">Jour</option>
                <?php
                for ($i = 1; $i <= 31; $i++) {
                    echo '<option value = "' . $i . '">' . $i . '</option>';
                }
                ?>
            </select>
            <select class="" style="height: 30px;">
                <option value="0" selected="">Mois</option>
                <?php
                for ($i = 1; $i <= 12; $i++) {
                    echo '<option value = "' . $i . '">' . $i . '</option>';
                }
                ?>
            </select>
            <select class=" " style="height: 30px;">
                <option value="0" selected="">Année</option>
                <?php
                for ($i = 2000; $i <= 2050; $i++) {
                    echo '<option value = "' . $i . '">' . $i . '</option>';
                }
                ?>
            </select>
        </div>
    </div>
    <div class="form-group">
        <label for="lieu" class="col-sm-4 control-label">Lieu de naissance</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="lieu" name="datenaiss" placeholder="Lieu de naissance">
        </div>
    </div>
    <div class="form-group">
        <label for="sexe" class="col-sm-4 control-label">Sexe</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="sexe" name="datenaiss" placeholder="Sexe">
        </div>
    </div>
    <div class="form-group col-sm-8 pull-right">
        <button type="button" onclick="use = 0; $('.inscrire').hide('slow');" class="btn btn-default"><span class="glyphicon glyphicon-remove"> Abandonner</span></button>
        <button type="button" class="btn btn-primary"><span class="glyphicon glyphicon-save"> Inscrire</span></button>
    </div>
</form>

<form class="form-inline row well col-md-offset-2 col-md-8 dropdown-menu addClasse">
    <div class="form-group">
        <label for="nom"> Nom de la classe</label>
        <input type="text" class="form-control" id="name" name="nomclasse" placeholder="Nom classe">
    </div>
    <div class="form-group">
        <select name="cycle" style="height: 30px;">
            <option value="0"> Cycle</option>
            <option value="1">1<sup>er</sup> Cycle</option>
            <option value="2">2<sup>nd</sup> Cycle</option>
        </select>
    </div>
    <button type="button" class="btn btn-info col-md-offset-1"><span class="glyphicon glyphicon-plus"> Ajouter</span></button>
    <button type="button" onclick="use = 0; $('.addClasse').hide('slow');" class="btn btn-default col-md-offset-1"><span class="glyphicon glyphicon-remove"> Annuler</span></button>
</form>

<form class="well col-md-offset-1 col-md-10 dropdown-menu remplirNote">
    <center><h4><u>Remplissage des notes</u></h4></center>
    <div class="form-group col-md-12">
        
        <select name="classe" style="height: 30px;" class="col-md-2">
            <option value="0"> Classe</option>
            <option value="1"> Sixième</option>
            <option value="2"> Cinquième</option>
            <option value="3"> Quantrième</option>
        </select>

        <select name="cycle" style="height: 30px;" class="col-md-offset-1 col-sm-3">
            <option value="0"> Matière</option>
            <option value="1"> Mathématiques</option>
            <option value="2"> Informatiques</option>
        </select>

        <select name="cycle" style="height: 30px;" class="col-md-offset-1 col-md-2">
            <option value="0"> Séquence</option>
            <option value="1"> Séquence 1</option>
            <option value="2"> Séquence 2</option>
        </select>
        <button type="button" onclick="$('.addNote').removeClass('dropdown-menu'); $('.remplirNote').hide('slow');" class="btn btn-info col-md-offset-1"><span class="glyphicon glyphicon-ok">Valider</span></button>
        <button type="button" onclick="use = 0; $('.remplirNote').hide('slow');" class="btn btn-default"><span class="glyphicon glyphicon-remove">Annuler</span></button>
    </div>
</form>

<form class="well col-md-offset-2 col-md-8 dropdown-menu addNote"  method="POST" target="blank" action="impressionNotes.php">
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
                include_once '../../Php/functions/launch/connect.php';
                $bdd = connect();

                require '../../Classes/Eleve/EleveManager.php';
                require '../../Classes/Eleve/Eleve.php';

                $eleveManag = new EleveManager($bdd);
                $eleve = $eleveManag->findAll();
                $i = 1;
                foreach ($eleve as $elev) {
                    echo '
                    <tr style= "font-family: Arial; font-size: 18px"';
                    if ($i % 2) {
                        echo'class = "success"';
                    }
                    echo'>
                        <input type = "text" class="hide" name="id_' . $i . '" value="' . $elev->get_id() . '"/><td>' . $i . '</td>
                        <input type = "text" class="hide" name="matricule_' . $i . '" value="' . $elev->get_matricule() . '"/><td>' . $elev->get_matricule() . '</td>
                        <input type = "text" class="hide" name="nom_' . $i . '" value="' . $elev->get_nom() . '"/><td>' . $elev->get_nom() . ' &nbsp' . $elev->get_prenom() . '</td>
                        <td><input type = "text" name = "note_' . $i . '" class = "col-md-12"></td>
                        <td>6</td>
                        <td></td>
                    </tr>';
                    $i++;
                }

                echo'<input type="text" name="idMatiere" value="' . $matiere . '" class="hide">
                <input type="text" name="annee" value="' . $annee . '" class="hide">
                <input type="text" name="id_sequence" value="' . $sequence . '" class="hide">
                <input type="text" name="total" value="' . --$i . '" class="hide">
                <input type="text" name="coef" value="6" class="hide"/>';
                ?>
            </tbody>
        </table>
    </div>
    <div class=" col-md-offset-7 col-md-8">
        <div class="">
            <button type="button" onclick="use = 0; $('.addNote').hide('slow');" class="btn btn-default"><span class="glyphicon glyphicon-remove"></span> Annuler</button>
            <button type="submit" class="btn btn-info col-md-offset-1" name="valider" value="1"><span class="glyphicon glyphicon-ok"></span> Valider</button>
        </div>
    </div>
</form>