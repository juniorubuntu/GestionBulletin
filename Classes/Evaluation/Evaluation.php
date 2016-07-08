<?php

/**
 * Description of Evaluation
 *
 * @author atbr
 */
class Evaluation {

    private $_id,
            $_id_matiere,
            $_note,
            $_annee,
            $_id_sequence;

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

    function get_id_matiere() {
        return $this->_id_matiere;
    }

    function get_note() {
        return $this->_note;
    }

    function get_annee() {
        return $this->_annee;
    }

    function get_id_sequence() {
        return $this->_id_sequence;
    }

    function set_id($_id) {
        $this->_id = $_id;
    }

    function set_id_matiere($_id_matiere) {
        $this->_id_matiere = $_id_matiere;
    }

    function set_note($_note) {
        $this->_note = $_note;
    }

    function set_annee($_annee) {
        $this->_annee = $_annee;
    }

    function set_id_sequence($_id_sequence) {
        $this->_id_sequence = $_id_sequence;
    }

}
