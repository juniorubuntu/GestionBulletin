<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

echo '<script type = "text/javascript">
            function suivant() {
                if(recapitulatifFirst() === 6){
                    $(\'.first\').addClass(\'dropdown-menu\');
                    $(\'.secnd\').removeClass(\'dropdown-menu\');
                }
            }
            function precedent() {
                $(\'.secnd\').addClass(\'dropdown-menu\');
                $(\'.first\').removeClass(\'dropdown-menu\');
            }
            function suivant2() {
                if(recapitulatifSecond() === 6){
                    $(\'.secnd\').addClass(\'dropdown-menu\');
                    $(\'.finish\').removeClass(\'dropdown-menu\');
                }
            }
            function precedent2() {
                $(\'.finish\').addClass(\'dropdown-menu\');
                $(\'.secnd\').removeClass(\'dropdown-menu\');
            }
    </script>';