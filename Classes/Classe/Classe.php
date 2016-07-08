<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Classe
 *
 * @author atbr
 */
class Classe {

    private $_id,
            $_nom;

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

    function get_nom() {
        return $this->_nom;
    }

    function set_id($_id) {
        $this->_id = $_id;
    }

    function set_nom($_nom) {
        $this->_nom = $_nom;
    }

    public function toString() {
        return 'id: ' . $this->_id . '<br>nom: ' . $this->_nom;
    }

}
