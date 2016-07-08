<?php

/**
 * Description of MatiereManager
 *
 * @author ElSha
 */
class MatiereManager {

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

    public function add(Matiere $matiere) {
        $q = $this->_db->prepare('INSERT INTO matiere SET id_categorie=:id_categorie, intitule =:intitule');
        $q->bindValue(':id_categorie', $matiere->get_id_categorie());
        $q->bindValue(':intitule', $matiere->get_intitule());
        $q->execute() or die("Erreur de creation d\'une matiere");
    }

    public function update(Matiere $matiere) {
        $q = $this->_db->prepare('UPDATE matiere SET id_categorie =:id_categorie, intitule =:intitule WHERE id= :id');
        $q->bindValue(':id', $matiere->get_id(), PDO::PARAM_INT);
        $q->bindValue(':id_categorie', $matiere->get_id_categorie(), PDO::PARAM_INT);
        $q->bindValue(':intitule', $matiere->get_intitule(), PDO::PARAM_STR);
        $q->execute() or die('Erreur de mise à jour de la matière');
    }

    public function findMatiere($info) {
        if (is_int($info)) {
            $q = $this->_db->query('SELECT * FROM matiere WHERE id = ' . $info);
            $matiere = $q->fetch(PDO::FETCH_ASSOC);
            return new Matiere($matiere);
        } else {
            $q = $this->_db->prepare('SELECT * FROM matiere WHERE intitule = :intitule');
            $q->execute(array(':intitule' => $info));
            $matiere = $q->fetch(PDO::FETCH_ASSOC);
            return new Matiere($matiere);
        }
    }

    public function delete(Matiere $matiere) {
        $this->_db->exec('DELETE FROM matiere WHERE id = ' . $matiere->get_id());
    }
    
    public function findAll() {
        $matieres = array();
        $q = $this->_db->prepare('SELECT * FROM matiere ORDER BY intitule');
        $q->execute() or die('Erreur de recuperation de la liste des matieres');
        while ($donnees = $q->fetch(PDO::FETCH_ASSOC)) {
            $matieres[] = new Matiere($donnees);
        }
        return $matieres;
    }

}
