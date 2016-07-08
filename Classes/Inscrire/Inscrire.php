<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Inscrire
 *
 * @author atbr
 */
class Inscrire {
    
    private $_id,
            $_id_classe,
            $_annee;

    public function __construct(array $donnees) {
        $this->hydrate($donnees);
    }

    public function hydrate(array $donnees) {
        foreach ($donnees as $key => $value) {
            $method = 'set_' . lcfirst($key);
            if (method_exists($this, $method)) {
                $this->$method($value);
            }
        }
    }

    function get_id() {
        return $this->_id;
    }

    function get_id_classe() {
        return $this->_id_classe;
    }

    function get_annee() {
        return $this->_annee;
    }

    function set_id($_id) {
        $this->_id = $_id;
    }

    function set_id_classe($_id_classe) {
        $this->_id_classe = $_id_classe;
    }

    function set_annee($_annee) {
        $this->_annee = $_annee;
    }
    
}
