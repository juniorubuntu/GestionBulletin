<?php

/**
 * Description of EvaluationManager
 *
 * @author atbr
 */
class EvaluationManager {

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

    public function add(Evaluation $evaluation) {
        $q = $this->_db->prepare('INSERT INTO evaluation SET id =:id, id_matiere=:id_matiere, note = :note, annee = :annee, id_sequence=:id_sequence');
        $q->bindValue(':id', $evaluation->get_id());
        $q->bindValue(':id_matiere', $evaluation->get_id_matiere());
        $q->bindValue(':note', $evaluation->get_note());
        $q->bindValue(':annee', $evaluation->get_annee());
        $q->bindValue(':id_sequence', $evaluation->get_id_sequence());
        $q->execute() or die("Erreur de creation d'une evaluation");
    }

    public function update(Evaluation $evaluation) {
        $q = $this->_db->prepare('UPDATE evaluation SET id =:id, id_matiere=:id_matiere, note = :note, annee = :annee, id_sequence=:id_sequence');
        $q->bindValue(':id', $evaluation->get_id(), PDO::PARAM_INT);
        $q->bindValue(':id_matiere', $evaluation->get_id_matiere(), PDO::PARAM_INT);
        $q->bindValue(':note', $evaluation->get_note(), PDO::PARAM_STR);
        $q->bindValue(':annee', $evaluation->get_annee(), PDO::PARAM_STR);
        $q->bindValue(':id_sequence', $evaluation->get_id_sequence(), PDO::PARAM_INT);
        $q->execute() or die("Erreur de mise à jour d'une evaluation");
    }

    public function findEvaluation($info) {
        if (is_int($info)) {
            $q = $this->_db->query('SELECT * FROM evaluation WHERE id = ' . $info);
            $evaluation = $q->fetch(PDO::FETCH_ASSOC);
            return new Evaluation($evaluation);
        } else {
            $q = $this->_db->prepare('SELECT * FROM evaluation WHERE annee = :annee');
            $q->execute(array(':annee' => $info));
            $evaluation = $q->fetch(PDO::FETCH_ASSOC);
            return new Evaluation($evaluation);
        }
    }

    public function delete(Evaluation $evaluation) {
        $this->_db->exec('DELETE FROM evaluation WHERE id = ' . $evaluation->get_id());
    }

    public function findAll() {
        $evaluations = array();
        $q = $this->_db->prepare('SELECT * FROM evaluation ORDER BY annee');
        $q->execute() or die('Erreur de recuperation de la liste des evaluations');
        while ($donnees = $q->fetch(PDO::FETCH_ASSOC)) {
            $evaluations[] = new Evaluation($donnees);
        }
        return $evaluations;
    }

}
