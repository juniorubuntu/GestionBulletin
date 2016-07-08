<?php

/**
 * Description of EleveManager
 *
 * @author ElSha
 */
class EleveManager {

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

    public function add(Eleve $eleve) {
        $q = $this->_db->prepare('INSERT INTO eleve SET matricule =:matricule, nom=:nom, prenom = :prenom, datenaiss = :datenaiss, lieu=:lieu,sexe=:sexe');
        $q->bindValue(':matricule', $eleve->get_matricule());
        $q->bindValue(':nom', $eleve->get_nom());
        $q->bindValue(':prenom', $eleve->get_prenom());
        $q->bindValue(':datenaiss', $eleve->get_datenaiss());
        $q->bindValue(':lieu', $eleve->get_lieu());
        $q->bindValue(':sexe', $eleve->get_sexe());
        $q->execute() or die("Erreur de creation d\'un élève");
    }

    public function update(Eleve $eleve) {
        $q = $this->_db->prepare('UPDATE eleve SET matricule =:matricule, nom=:nom, prenom = :prenom, datenaiss = :datenaiss, lieu=:lieu,sexe=:sexe WHERE id=:id');
        $q->bindValue(':id', $eleve->get_id(), PDO::PARAM_INT);
        $q->bindValue(':matricule', $eleve->get_matricule(), PDO::PARAM_STR);
        $q->bindValue(':nom', $eleve->get_nom(), PDO::PARAM_STR);
        $q->bindValue(':prenom', $eleve->get_prenom(), PDO::PARAM_STR);
        $q->bindValue(':datenaiss', $eleve->get_datenaiss(), PDO::PARAM_STR);
        $q->bindValue(':lieu', $eleve->get_lieu(), PDO::PARAM_STR);
        $q->bindValue(':sexe', $eleve->get_sexe(), PDO::PARAM_INT);
        $q->execute() or die("Erreur de mise à jour d\'un élève");
    }

    public function findEleve($info) {
        if (is_int($info)) {
            $q = $this->_db->query('SELECT * FROM eleve WHERE id = ' . $info);
            $eleve = $q->fetch(PDO::FETCH_ASSOC);
            return new Eleve($eleve);
        } else {
            $q = $this->_db->prepare('SELECT * FROM eleve WHERE matricule = :matricule');
            $q->execute(array(':matricule' => $info));
            $eleve = $q->fetch(PDO::FETCH_ASSOC);
            return new Eleve($eleve);
        }
    }

    public function delete(Eleve $eleve) {
        $this->_db->exec('DELETE FROM eleve WHERE id = ' . $eleve->get_id());
    }

    public function findAll() {
        $eleves = array();
        $q = $this->_db->prepare('SELECT * FROM eleve ORDER BY nom');
        $q->execute() or die('Erreur de recuperation de la liste des élèves');
        while ($donnees = $q->fetch(PDO::FETCH_ASSOC)) {
            $eleves[] = new Eleve($donnees);
        }
        return $eleves;
    }

}