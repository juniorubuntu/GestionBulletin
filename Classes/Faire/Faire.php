<?php

/**
 * Description of Faire
 *
 * @author ElSha
 */
class Faire {

    private $_id_matiere,
            $_id_classe;

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

    function get_id_classe() {
        return $this->_id_classe;
    }

    function set_id_matiere($_id_matiere) {
        $this->_id_matiere = $_id_matiere;
    }

    function set_id_classe($_id_classe) {
        $this->_id_classe = $_id_classe;
    }

}
