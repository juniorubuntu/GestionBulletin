<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of EstDispense
 *
 * @author atbr
 */
class EstDispense {

    private $_id_matiere,
            $_id_personnel,
            $_annee,
            $_coef;

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

    function get_id_matiere() {
        return $this->_id_matiere;
    }

    function set_id_matiere($_id_matiere) {
        $this->_id_matiere = $_id_matiere;
    }

    function get_id_personnel() {
        return $this->_id_personnel;
    }

    function get_annee() {
        return $this->_annee;
    }

    function get_coef() {
        return $this->_coef;
    }

    function set_id_personnel($_id_personnel) {
        $this->_id_personnel = $_id_personnel;
    }

    function set_annee($_annee) {
        $this->_annee = $_annee;
    }

    function set_coef($_coef) {
        $this->_coef = $_coef;
    }

}
