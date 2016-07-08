<?php

/**
 * Description of FaireManager
 *
 * @author ElSha
 */
class FaireManager {

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

    public function add(Faire $faire) {
        $q = $this->_db->prepare('INSERT INTO faire SET id_matiere=:id_matiere, id_classe =:id_classe');
        $q->bindValue(':id_matiere', $faire->get_id_matiere());
        $q->bindValue(':id_classe', $faire->get_id_classe());
        $q->execute() or die("Erreur de creation d\'une faisabilité");
    }

    public function update(Faire $faire) {
        $q = $this->_db->prepare('UPDATE faire SET id_classe =:id_classe WHERE id_matiere=:id_matiere');
        $q->bindValue(':id_matiere', $faire->get_id_matiere());
        $q->bindValue(':id_classe', $faire->get_id_classe());
        $q->execute() or die("Erreur de creation d\'une faisabilité");
    }

    public function findFaire($info) {
        $q = $this->_db->query('SELECT * FROM faire WHERE id_matiere = ' . $info);
        $faire = $q->fetch(PDO::FETCH_ASSOC);
        return new Faire($faire);
    }

    public function delete(Faire $faire) {
        $this->_db->exec('DELETE FROM faire WHERE id = ' . $faire->get_id_matiere());
    }
    
    public function findAll() {
        $faire = array();
        $q = $this->_db->prepare('SELECT * FROM faire');
        $q->execute() or die('Erreur de recuperation de la liste des faisabilités');
        while ($donnees = $q->fetch(PDO::FETCH_ASSOC)) {
            $faire[] = new Faire($donnees);
        }
        return $faire;
    }
}