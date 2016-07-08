<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Categorie
 *
 * @author atbr
 */
class Categorie {

    private $_id,
            $_libele;

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

    function get_libele() {
        return $this->_libele;
    }

    function set_id($_id) {
        $this->_id = $_id;
    }

    function set_libele($_libele) {
        $this->_libele = $_libele;
    }

    public function toString() {
        return 'id: ' . $this->_id . '<br>libele: ' . $this->_libele;
    }

}
