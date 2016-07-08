<?php

echo '<div class="first-start first block-first row">
            <div class="info-pays col-md-12">
                <div class="info-region">
                    <center><h2>Entrez vos informations régionales</h2></center>
                </div>
                <div class="info-region-save">
                    <div class="region-french col-sm-6">
                        <form class="col-md-12">
                        <legend>En Français</legend>
                            <div class="form-group paysfr">
                                <label for="texte">Nom du pays : </label>
                                <input id="nompays" name = "nompays" onfocus="editerFocus(\'paysfr\', \'sp1\')" type="text" class="form-control" placeholder="ex: Republique du Cameroun..">
                                <span class="glyphicon glyphicon-remove form-control-feedback hide sp1"></span>
                            </div>
                            <div class="form-group ministfr">
                                <label for="texte">Nom du ministere : </label>
                                <input id="nomMinistere" name = "nomMinistere" onfocus="editerFocus(\'ministfr\', \'sp2\')" type="text" class="form-control" placeholder="ex: Ministère des Enseig. Seco.">
                                <span class="glyphicon glyphicon-remove form-control-feedback hide sp2"></span>
                            </div>
                            <div class="form-group devisepfr">
                                <label for="devisePays">Devise : </label>
                                <input id="devisePays" type="text" name = "devisePays" onfocus="editerFocus(\'devisepfr\', \'sp3\')" class="form-control" placeholder="ex: Paix-Travail-Patrie">
                                <span class="glyphicon glyphicon-remove form-control-feedback hide sp3"></span>
                            </div>
                        </form>
                    </div>
                    <div class="region-english col-md-6">
                        <form class="col-md-12">
                            <legend>In English</legend>
                            <div class="form-group namepays">
                                <label for="countryName">Country\'s name : </label>
                                <input id="countryName" name="countryName" type="text" onfocus="editerFocus(\'namepays\', \'sp4\')" class="form-control" placeholder="ex: Republic  of Cameroon..">
                                <span class="glyphicon glyphicon-remove form-control-feedback hide sp4"></span>
                            </div>
                            <div class="form-group mintryname">
                                <label for="ministryName">Ministry\'s name : </label>
                                <input id="ministryName" name="ministryName" type="text" onfocus="editerFocus(\'mintryname\', \'sp5\')" class="form-control" placeholder="ex: Ministère des Enseig. Seco.">
                                <span class="glyphicon glyphicon-remove form-control-feedback hide sp5"></span>
                            </div>
                            <div class="form-group countrymotto">
                                <label for="countryMotto">Motto : </label>
                                <input id="countryMotto" name="countryMotto" type="text" onfocus="editerFocus(\'countrymotto\', \'sp6\')" class="form-control" placeholder="ex: Paix-Travail-Patrie">
                                <span class="glyphicon glyphicon-remove form-control-feedback hide sp6"></span>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="row bas">
                <div class="col-md-offset-8 col-md-1">
                     <button type="button"  onclick="cancel()" class="btn btn-primary"><span class = "glyphicon"></span>Cancel</button>
                </div>
                <div class="col-md-offset-1 col-md-1">
                     <button type="button"  onclick="suivant()" class="btn btn-primary"><span class = "glyphicon"></span>Next ></button>
                </div>
            </div>
        </div>';
