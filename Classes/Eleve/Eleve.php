<?php

/**
 * Description of Eleve
 *
 * @author ElSha
 */
class Eleve {

    private $_id,
            $_matricule,
            $_nom,
            $_prenom,
            $_datenaiss,
            $_lieu,
            $_sexe;

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

    function get_matricule() {
        return $this->_matricule;
    }

    function get_nom() {
        return $this->_nom;
    }

    function get_prenom() {
        return $this->_prenom;
    }

    function get_datenaiss() {
        return $this->_datenaiss;
    }

    function get_lieu() {
        return $this->_lieu;
    }

    function get_sexe() {
        return $this->_sexe;
    }

    function set_id($_id) {
        $this->_id = $_id;
    }

    function set_matricule($_matricule) {
        $this->_matricule = $_matricule;
    }

    function set_nom($_nom) {
        $this->_nom = $_nom;
    }

    function set_prenom($_prenom) {
        $this->_prenom = $_prenom;
    }

    function set_datenaiss($_datenaiss) {
        $this->_datenaiss = $_datenaiss;
    }

    function set_lieu($_lieu) {
        $this->_lieu = $_lieu;
    }

    function set_sexe($_sexe) {
        $this->_sexe = $_sexe;
    }

}
