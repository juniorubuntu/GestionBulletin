<?php

/**
 * Description of Admin
 *
 * @author atbr
 */
class Personnel {

    private $_id,
            $_nom,
            $_prenom,
            $_adresse;

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

    function get_prenom() {
        return $this->_prenom;
    }

    function get_adresse() {
        return $this->_adresse;
    }

    function set_id($_id) {
        $this->_id = $_id;
    }

    function set_nom($_nom) {
        $this->_nom = $_nom;
    }

    function set_prenom($_prenom) {
        $this->_prenom = $_prenom;
    }

    function set_adresse($_adresse) {
        $this->_adresse = $_adresse;
    }

}
