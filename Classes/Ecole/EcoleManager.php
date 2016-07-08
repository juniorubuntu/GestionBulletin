<?php

/**
 * Description of EcoleManager
 *
 * @author atbr
 */
class EcoleManager {

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

    public function delete(Ecole $ecole) {
        $this->_db->exec('DELETE FROM ecole WHERE id = ' . $ecole->get_id());
    }

    public function add(Ecole $ecole) {
        $q = $this->_db->prepare('INSERT INTO ecole SET nomfr = :nomfr, noman = :noman, devisefr = :devisefr, devisean = :devisean, pb = :pb');
        $q->bindValue(':nomfr', $ecole->get_nomfr());
        $q->bindValue(':noman', $ecole->get_noman());
        $q->bindValue(':devisefr', $ecole->get_devisefr());
        $q->bindValue(':devisean', $ecole->get_devisean());
        $q->bindValue(':pb', $ecole->get_pb());
        $q->execute() or die('Erreur d\'insertion de l\'école');
    }

    public function update(Ecole $ecole) {
        $q = $this->db->prepare('SET nomfr = :nomfr, noman = :nomAn, devisefr = :deviseFr, devisean = :deviseAn, pb =: pb WHERE WHERE id = :id');
        $q->bindValue(':id', $ecole->get_id(), PDO::PARAM_INT);
        $q->bindValue(':nomfr', $ecole->get_nomfr(), PDO::PARAM_STR);
        $q->bindValue(':nomAn', $ecole->get_noman(), PDO::PARAM_STR);
        $q->bindValue(':deviseFr', $ecole->get_devisefr(), PDO::PARAM_STR);
        $q->bindValue(':devisean', $ecole->get_devisean(), PDO::PARAM_STR);
        $q->bindValue(':pb', $ecole->get_pb(), PDO::PARAM_STR);
        $q->execute() or die('Erreur de modification l\'école');
    }

    public function findEcole($info) {
        if (is_int($info)) {
            $q = $this->_db->query('SELECT * FROM ecole WHERE id = ' . $info);
            $ecole = $q->fetch(PDO::FETCH_ASSOC);
            return new Ecole($ecole);
        } else {
            $q = $this->_db->prepare('SELECT * FROM ecole WHERE nomfr = :nomfr');
            $q->execute(array(':nomfr' => $info));
            $ecole = $q->fetch(PDO::FETCH_ASSOC);
            return new Ecole($ecole);
        }
    }

    public function findAll() {
        $ecoles = array();
        $q = $this->_db->prepare('SELECT * FROM ecole ORDER BY nomfr');
        $q->execute() or die('Erreur de recuperation de la liste des ecoles');
        while ($donnees = $q->fetch(PDO::FETCH_ASSOC)) {
            $ecoles[] = new Ecole($donnees);
        }
        return $ecoles;
    }

}
