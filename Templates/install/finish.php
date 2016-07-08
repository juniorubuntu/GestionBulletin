<?php
echo '
<div class="container finish dropdown-menu">
    <div class="panel panel-info">
        <div class="panel-heading">
            <div class="row">
                <div class="col-md-offset-4 col-md-12">
                    <h2>
                        Recapitulatif des informations
                    </h2>
                </div>
            </div>
        </div>
        <div class="row frenchSession">
            <div class="col-md-6">
                <div class="alert alert-success text-center">
                    <h3>Informations en Français</h3>
                </div>
                <div class="row">
                    <div class="col-md-offset-1 col-md-5">
                        <div class="form-group">
                            <label for="nomPays">Nom du pays</label>
                            <input value="$_POST[\'nompays\']" type="text" class="form-control" id="nompaysF" name="nompays">
                        </div>
                    </div>
                    <div class="col-md-offset-1  col-md-5">
                        <div class="form-group">
                            <label for="deviseEcole">Devise de l\'école</label>
                            <input type="text" value="$_POST[\'deviseEcole\']" class="form-control" name="deviseEcole" id="deviseEcoleF"/>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-offset-1  col-md-5">
                        <div class="form-group">
                            <label for="devisePays">Devise du pays</label>
                            <input type="text" value="$_POST[\'devisePays\']" class="form-control" name="devisePays" id="devisePaysF">
                        </div>
                    </div>
                    <div class="col-md-offset-1 col-md-5">
                        <div class="form-group">
                            <label for="nomEcole">Nom de l\'ecole</label>
                            <input type="text" value="$_POST[\'nomEcole\']" class="form-control" name="nomEcole" id="nomEcoleF"/>
                        </div>
                    </div>
                </div>
                <div class="row">
                    
                    <div class="col-md-offset-1 col-md-5">
                        <div class="form-group">
                            <label for="nomMinistere">Nom du Ministère</label>
                            <input type="text" value="$_POST[\'nomMinistere\']" class="form-control" name="nomMinistere" id="nomMinistereF"/>
                        </div>
                    </div>
                    <div class="col-md-offset-1 col-md-5">
                        <div class="form-group">
                            <label for="boitePostal">Boite Postal</label>
                            <input type="text" value="$_POST[\'boitePostal\']" class="form-control" name="boitePostal"  id="boitePostalF"/>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="alert alert-success text-center">
                    <h3>Informations in English</h3>
                </div>
                <div class="row">
                    <div class="col-md-offset-1  col-md-5">
                        <div class="form-group">
                            <label for="countryName"> Name of the country</label>
                            <input type="text" value="$_POST[\'countryName\']" class="form-control" name="countryName" id="countryNameF"/>
                        </div>
                    </div>
                     <div class="col-md-offset-1  col-md-5">
                        <div class="form-group">
                            <label for="schoolMotto">Motto of the school</label>
                            <input type="text" value="$_POST[\'schoolMotto\']" class="form-control" name="schoolMotto" id="schoolMottoF"/>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-offset-1  col-md-5">
                        <div class="form-group">
                            <label for="countryMotto">Motto of the country</label>
                            <input type="text" value="$_POST[\'countryMotto\']" class="form-control" name="countryMotto" id="countryMottoF"/>
                        </div>
                    </div>
                    <div class="col-md-offset-1 col-md-5">
                        <div class="form-group">
                            <label for="schoolName">Name of the school</label>
                            <input type="text" value="$_POST[\'schoolName\']" class="form-control" name="schoolName"  id="schoolNameF"/>
                        </div>
                    </div>
                </div>
                <div class="row">
                   
                    <div class="col-md-offset-1 col-md-5">
                        <div class="form-group">
                            <label for="ministryName">Name of the ministry</label>
                            <input type="text" value="$_POST[\'ministryName\']" class="form-control" name="ministryName"  id="ministryNameF"/>
                        </div>
                    </div>
                    <div class="col-md-offset-1  col-md-5">
                        <div class="form-group">
                            <label for="poBox">PO Box</label>
                            <input type="text" value="$_POST[\'poBox\']" class="form-control" name="poBox" id="poBoxF"/>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="panel panel-footer">
            <div class="row">
                <div class=" col-md-offset-9 col-md-1">
                    <button type="button" onclick="precedent2()" class="btn btn-primary"><span class="glyphicon glyphicon-chevron-left"></span> Prev</button>
                </div>
                <div class="col-md-1">
                    <button type="cancel" class="btn btn-default active">Annuler</button>
                </div>
                <div class="col-md-1">
                    <button type="submit" class="btn btn-primary"><span class = "glyphicon glyphicon-save"></span>Installer</button>
                </div>
            </div>
        </div>
    </div>
</div>';