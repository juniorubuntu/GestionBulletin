<?php

/**
 * @author atbr
 */
class PersonnelManager {

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

    public function add(Personnel $personnel) {
        $q = $this->_db->prepare('INSERT INTO personnel SET nom =:nom, prenom = :prenom, adresse = :adresse');
        $q->bindValue(':nom', $personnel->get_nom());
        $q->bindValue(':prenom', $personnel->get_prenom());
        $q->bindValue(':adresse', $personnel->get_adresse());
        $q->execute() or die("Erreur de creation d\'un personnel");
    }

    public function update(Personnel $personnel) {
        $q = $this->_db->prepare('UPDATE personnel SET nom =:nom, prenom = :prenom, adresse = :adresse WHERE id= :id');
        $q->bindValue(':id', $personnel->get_id(), PDO::PARAM_INT);
        $q->bindValue(':nom', $personnel->get_nom(), PDO::PARAM_STR);
        $q->bindValue(':prenom', $personnel->get_prenom(), PDO::PARAM_STR);
        $q->bindValue(':adresse', $personnel->get_adresse(), PDO::PARAM_STR);
        $q->execute() or die('Erreur de mise à jour du personnel');
    }

    public function findPersonnel($info) {
        if (is_int($info)) {
            $q = $this->_db->query('SELECT * FROM personnel WHERE id = ' . $info);
            $personnel = $q->fetch(PDO::FETCH_ASSOC);
            return new Personnel($personnel);
        } else {
            $q = $this->_db->prepare('SELECT * FROM personnel WHERE nom = :nom');
            $q->execute(array(':nom' => $info));
            $personnel = $q->fetch(PDO::FETCH_ASSOC);
            return new Personnel($personnel);
        }
    }

    public function delete(Personnel $personnel) {
        $this->_db->exec('DELETE FROM personnel WHERE id = ' . $personnel->get_id());
    }

    public function findAll() {
        $personnels = array();
        $q = $this->_db->prepare('SELECT * FROM personnel ORDER BY nom');
        $q->execute() or die('Erreur de recuperation de la liste du personnel');
        while ($donnees = $q->fetch(PDO::FETCH_ASSOC)) {
            $personnels[] = new Personnel($donnees);
        }
        return $personnels;
    }

}
