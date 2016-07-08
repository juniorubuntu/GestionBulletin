<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of InscrireManager
 *
 * @author atbr
 */
class InscrireManager {

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

    public function delete(Inscrire $inscrire) {
        $this->_db->exec('DELETE FROM inscrire WHERE id = ' . $inscrire->get_id());
    }

    public function add(Inscrire $inscrire) {
        echo '<pre>';
        print_r($inscrire);
        echo '</pre>';
        
        $q = $this->_db->prepare('INSERT INTO inscrire SET id =:id, id_classe = :id_classe, annee = :annee');
        $q->bindValue(':id', $inscrire->get_id());
        $q->bindValue(':id_classe', $inscrire->get_id_classe());
        $q->bindValue(':annee', $inscrire->get_annee());
        $q->execute() or die('Erreur d\'insertion de inscrire');
    }

    public function update(Inscrire $inscrire) {
        $q = $this->_db->prepare('UPDATE inscrire SET id_classe =:id_classe, annee =:annee WHERE id = :id');
        $q->bindValue(':id', $inscrire->get_id(), PDO::PARAM_INT);
        $q->bindValue(':id_classe', $inscrire->get_id_classe(), PDO::PARAM_STR);
        $q->bindValue(':annee', $inscrire->get_annee());
        $q->execute() or die('Erreur de modifier inscrire');
    }

    public function findInscrire($info) {
        if (is_int($info)) {
            $q = $this->_db->query('SELECT id, id_classe, annee FROM inscrire WHERE id = ' . $info);
            $inscrire = $q->fetch(PDO::FETCH_ASSOC);
            return new Inscrire($inscrire);
        } else {
            $q = $this->_db->prepare('SELECT id, id_classe, annee FROM inscrire WHERE id_classe = :id_classe');
            $q->execute(array(':id_classe' => $info));
            $inscrire = $q->fetch(PDO::FETCH_ASSOC);
            return new Inscrire($inscrire);
        }
    }

}
