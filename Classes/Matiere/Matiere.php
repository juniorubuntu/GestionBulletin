<?php

/**
 * Description of Matiere
 *
 * @author ElSha
 */
class Matiere {

    private $_id,
            $_id_categorie,
            $_intitule;

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

    function get_id_categorie() {
        return $this->_id_categorie;
    }

    function get_intitule() {
        return $this->_intitule;
    }

    function set_id($_id) {
        $this->_id = $_id;
    }

    function set_id_categorie($_id_categorie) {
        $this->_id_categorie = $_id_categorie;
    }

    function set_intitule($_intitule) {
        $this->_intitule = $_intitule;
    }


}
