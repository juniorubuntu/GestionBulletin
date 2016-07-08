<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

echo '<div class="parametres well col-md-12">
            <button class="btn btn-default btn-sm col-md-5" onclick="afficheAction()"><span class="glyphicon glyphicon-user"> Accounts </span></button>
            <div class="comptes dropdown-menu panel panel-info col-md-12">
                <h4><u>Action à effectuer</u></h4>
                <div class="actions panel">
                    <button class="btn btn-primary btn-sm col-md-12" onclick="newcompte()"><span class="glyphicon glyphicon-plus"> Create a new account </span></button>
                    <button class="btn btn-info btn-sm col-md-12"><span class="glyphicon glyphicon-edit"> Edit an account </span></button>
                    <button class="btn btn-danger btn-sm col-md-12"><span class="glyphicon glyphicon-remove"> Delete an account </span></button>
                </div>
            </div>
        </div>';