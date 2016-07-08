<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Compte
 *
 * @author atbr
 */
class Compte {

    private $_id,
            $_id_personnel,
            $_type,
            $_login,
            $_motpasse;

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

    function get_id_personnel() {
        return $this->_id_personnel;
    }

    function get_type() {
        return $this->_type;
    }

    function get_login() {
        return $this->_login;
    }

    function get_motpasse() {
        return $this->_motpasse;
    }

    function set_id($_id) {
        $this->_id = $_id;
    }

    function set_id_personnel($_id_personnel) {
        $this->_id_personnel = $_id_personnel;
    }

    function set_type($_type) {
        $this->_type = $_type;
    }

    function set_login($_login) {
        $this->_login = $_login;
    }

    function set_motpasse($_motpasse) {
        $this->_motpasse = $_motpasse;
    }


}
