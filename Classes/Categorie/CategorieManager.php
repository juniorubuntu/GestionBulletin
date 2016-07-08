<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CategorieManager
 *
 * @author atbr
 */
class CategorieManager {

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

    public function delete(Categorie $categorie) {
        $this->_db->exec('DELETE FROM categorie WHERE id = ' . $categorie->get_id());
    }

    public function add(Categorie $categorie) {
        $q = $this->_db->prepare('INSERT INTO categorie SET libele = :libele');
        $q->bindValue(':libele', $categorie->get_libele());
        $q->execute() or die('Erreur d\'insertion de la categorie');
    }

    public function update(Categorie $categorie) {
        $q = $this->_db->prepare('UPDATE categorie SET libele =:libele WHERE id = :id');
        $q->bindValue(':id', $categorie->get_id(), PDO::PARAM_INT);
        $q->bindValue(':libele', $categorie->get_libele(), PDO::PARAM_STR);
        $q->execute() or die('Erreur de modifier la categorie');
    }

    public function findCategorie($info) {
        if (is_int($info)) {
            $q = $this->_db->query('SELECT id, libele FROM categorie WHERE id = ' . $info);
            $categorie = $q->fetch(PDO::FETCH_ASSOC);
            return new Categorie($categorie);
        } else {
            $q = $this->_db->prepare('SELECT id, libele FROM categorie WHERE libele = :libele');
            $q->execute(array(':libele' => $info));
            $categorie = $q->fetch(PDO::FETCH_ASSOC);
            return new Categorie($categorie);
        }
    }

}
