<?php
echo '
    <div  class="container secnd dropdown-menu form-horizontal ">
               <!--tout le contenu du code (/en row et en coll 12)-->
                <div class="row">      
                    <div>   
                        <center><h4><u> ENTRER LES RENSEIGNEMENTS SUR VOTRE ECOLE </u> </br></br> <small>En francais</small></h4></center>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-offset-3 col-md-6">
                        <div class="form-group ecolefr">
                            <label class="col-md-2" for="nomEcole">Nom:</label>
                            <div class="col-md-10">
                                <input type="text" onfocus="editerFocus(\'ecolefr\', \'sp7\')" class="form-control" name="nomEcole" id ="nomEcole" placeholder="nom de l\'ecole"/>
                                <span class="glyphicon glyphicon-remove form-control-feedback hide sp7"></span>
                            </div>
                        </div>
                    </div>
                </div>    
                <div class="row">
                    <div class="col-md-offset-3 col-md-6">
                        <div class="form-group devisefr">
                            <label class="col-md-2" for="deviseEcole">Devise:</label>
                            <div class="col-md-10">
                                <input type="text" name="deviseEcole" onfocus="editerFocus(\'devisefr\', \'sp8\')" class="form-control" id ="deviseEcole" placeholder="devise de l\'ecole"/>
                                <span class="glyphicon glyphicon-remove form-control-feedback hide sp8"></span>
                            </div>
                        </div>
                    </div> 
                </div>
                <div class="row">
                    <div class="col-md-offset-3 col-md-6">
                        <div class="form-group boitefr">
                            <label class="col-md-2" for="boitePostal">Boite Postal:</label>
                            <div class="col-md-10">
                                <input type="text" name="boitePostal" onfocus="editerFocus(\'boitefr\', \'sp9\')" class="form-control" id ="boitePostal" placeholder="ex: BP 150 Maroua"/>
                                <span class="glyphicon glyphicon-remove form-control-feedback hide sp9"></span>
                            </div>
                        </div>
                    </div> 
                </div>
                <div class="row">      
                    <div>   
                        <center><h4> <small>En Anglais</small></h4></center>                     
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-offset-3 col-md-6">
                        <div class="form-group schoolen">
                            <label class="col-md-2" for="schoolName">Name:</label>
                            <div class="col-md-10">
                                <input type="text" name="schoolName" onfocus="editerFocus(\'schoolen\', \'sp10\')" class="form-control" id ="schoolName" placeholder="name of the school"/>
                                <span class="glyphicon glyphicon-remove form-control-feedback hide sp10"></span>
                            </div>
                        </div>
                    </div> 
                </div>
                <div class="row">
                    <div class="col-md-offset-3 col-md-6">
                        <div class="form-group mottoen">
                            <label class="col-md-2" for="schoolMotto">Motto:</label>
                                <div class="col-md-10">
                                    <input type="text" name="schoolMotto" onfocus="editerFocus(\'mottoen\', \'sp11\')" class="form-control" id ="schoolMotto" placeholder="Motto of the school"/>
                                    <span class="glyphicon glyphicon-remove form-control-feedback hide sp11"></span>
                                </div>
                        </div>
                    </div> 
                </div>
                <div class="row">
                    <div class="col-md-offset-3 col-md-6">
                        <div class="form-group poBoxEn">
                            <label class="col-md-2" for="poBox">PO Box:</label>
                                <div class="col-md-10">
                                    <input type="text" name="poBox" onfocus="editerFocus(\'poBoxEn\', \'sp12\')" class="form-control" id ="poBox" placeholder="ex: 150 Maroua"/>
                                    <span class="glyphicon glyphicon-remove form-control-feedback hide sp12"></span>
                                </div>
                        </div>
                    </div> 
                </div>
                <div class="row">
                        <div class="col-md-offset-6 col-md-1">
                            <button onclick="precedent()" class="btn-primary"><span class="glyphicon glyphicon-chevron-left"></span> Prev </button>
                        </div>
                        <div class="col-md-1">
                            <button class="btn-primary"><span class="glyphicon glyphicon-remove"></span>Exit</button>
                        </div>
                        <div class="col-md-1">
                            <button onclick="suivant2()"   class="btn-primary"> next <span class="glyphicon glyphicon-chevron-right"></span> </button>
                        </div> 
                </div>
            </div>
    </div>';