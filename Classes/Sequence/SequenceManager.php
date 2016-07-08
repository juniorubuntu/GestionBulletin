<?php

/**
 * Description of PersonnelManager
 *
 * @author ElSha
 */
class SequenceManager {

    private $_db;

    function __construct($_db) {
        $this->set_db($_db);
    }

    function get_db() {
        return $this->_db;
    }

    function set_db($_db) {
        $this->_db = $_db;
    }

    public function add(Sequence $sequence) {
        $q = $this->_db->prepare('INSERT INTO sequence SET nom =:nom');
        $q->bindValue(':nom', $sequence->get_nom());
        $q->execute() or die("Erreur de creation d\'une sequence");
    }

    public function update(Sequence $sequence) {
        $q = $this->_db->prepare('UPDATE sequence SET nom =:nom WHERE id=:id');
        $q->bindValue(':id', $sequence->get_id(), PDO::PARAM_INT);
        $q->bindValue(':nom', $sequence->get_nom(), PDO::PARAM_STR);
        $q->execute() or die("Erreur de mise à jour d\'une sequence");
    }

    public function findSequence($info) {
        if (is_int($info)) {
            $q = $this->_db->query('SELECT * FROM sequence WHERE id = ' . $info);
            $sequence = $q->fetch(PDO::FETCH_ASSOC);
            return new Sequence($sequence);
        } else {
            $q = $this->_db->prepare('SELECT * FROM sequence WHERE nom = :nom');
            $q->execute(array(':nom' => $info));
            $sequence = $q->fetch(PDO::FETCH_ASSOC);
            return new Sequence($sequence);
        }
    }

    public function delete(Sequence $sequence) {
        $this->_db->exec('DELETE FROM sequence WHERE id = ' . $sequence->get_id());
    }

    public function findAll() {
        $sequence = array();
        $q = $this->_db->prepare('SELECT * FROM sequence ORDER BY nom');
        $q->execute() or die('Erreur de recuperation de la liste des sequences');
        while ($donnees = $q->fetch(PDO::FETCH_ASSOC)) {
            $sequence[] = new Sequence($donnees);
        }
        return $sequence;
    }

}