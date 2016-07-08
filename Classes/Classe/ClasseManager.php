<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ClasseManager
 *
 * @author atbr
 */
class ClasseManager {

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

    public function delete(Classe $classe) {
        $this->_db->exec('DELETE FROM classe WHERE id = ' . $classe->get_id());
    }

    public function add(Classe $classe) {
        $q = $this->_db->prepare('INSERT INTO classe SET nom = :nom');
        $q->bindValue(':nom', $classe->get_nom());
        $q->execute() or die('Erreur d\'insertion de la classe');
    }

    public function update(Classe $classe) {
        $q = $this->_db->prepare('UPDATE classe SET nom =:nom WHERE id = :id');
        $q->bindValue(':id', $classe->get_id(), PDO::PARAM_INT);
        $q->bindValue(':nom', $classe->get_nom(), PDO::PARAM_STR);
        $q->execute() or die('Erreur de modifier la classe');
    }

    public function findClasse($info) {
        if (is_int($info)) {
            $q = $this->_db->query('SELECT id, nom FROM classe WHERE id = ' . $info);
            $classe = $q->fetch(PDO::FETCH_ASSOC);
            return new Classe($classe);
        } else {
            $q = $this->_db->prepare('SELECT id, nom FROM classe WHERE nom = :nom');
            $q->execute(array(':nom' => $info));
            $classe = $q->fetch(PDO::FETCH_ASSOC);
            return new Classe($classe);
        }
    }

}
