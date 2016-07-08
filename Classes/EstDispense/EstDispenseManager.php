<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of EstDispenseManager
 *
 * @author atbr
 */
class EstDispenseManager {

    private $_db;

    public function __construct($db) {
        $this->set_db($db);
    }

    function get_db() {
        return $this->_db;
    }

    function set_db($_db) {
        $this->_db = $_db;
    }

    public function delete(EstDispense $estDispense) {
        $this->_db->exec('DELETE FROM estdispense WHERE id_matiere = ' . $estDispense->get_id_matiere()) or die('Erreur de Suppression du estdispense');
    }

    public function add(EstDispense $estDispense) {


        $q = $this->_db->prepare('INSERT INTO estdispense SET id_matiere= :id_matiere, id_personnel =:id_personnel, annee = :annee, coef = :coef');
        $q->bindValue(':id_matiere', $estDispense->get_id_matiere());
        $q->bindValue(':id_personnel', $estDispense->get_id_personnel());
        $q->bindValue(':annee', $estDispense->get_annee());
        $q->bindValue(':coef', $estDispense->get_coef());
        $q->execute() or die("Erreur de creation du estDispense");
    }

    public function update(EstDispense $estDispense) {
        $q = $this->_db->prepare('UPDATE estdispense SET id_matiere =:id_matiere, id_personnel =:id_personnel, annee = :annee, coef = :coef WHERE id_matiere = :id_matiere');
        $q->bindValue(':id_matiere', $estDispense->get_id_matiere(), PDO::PARAM_INT);
        $q->bindValue(':id_personnel', $estDispense->get_id_personnel(), PDO::PARAM_STR);
        $q->bindValue(':annee', $estDispense->get_annee(), PDO::PARAM_STR);
        $q->bindValue(':coef', $estDispense->get_coef(), PDO::PARAM_STR);
        $q->execute() or die('Erreur de mise à jour  du estDispense');
    }

    public function findEstDispense($info) {
        if (is_int($info)) {
            $q = $this->_db->query('SELECT id_matiere, id_personnel, annee, coef FROM  estdispense WHERE id_matiere = ' . $info);
            $estDispense = $q->fetch(PDO::FETCH_ASSOC);
            return new EstDispense($estDispense);
        } else {
            $q = $this->_db->prepare('SELECT id_matiere, id_personnel, annee, coef FROM  estdispense WHERE annee = :annee');
            $q->execute(array(':annee' => $info));
            $estDispense = $q->fetch(PDO::FETCH_ASSOC);
            return new EstDispense($estDispense);
        }
    }

}
