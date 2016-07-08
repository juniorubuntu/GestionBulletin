<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CompteManager
 *
 * @author atbr
 */
class CompteManager {

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

    public function delete(Compte $compte) {
        $this->_db->exec('DELETE FROM compte WHERE id = ' . $compte->get_id());
    }

    public function add(Compte $comptes) {
        $q = $this->_db->prepare('INSERT INTO compte SET id_personnel =:id_personnel, type = :type, login = :login, motpasse = :motpasse');
        $q->bindValue(':id_personnel', $comptes->get_id_personnel());
        $q->bindValue(':type', $comptes->get_type());
        $q->bindValue(':login', $comptes->get_login());
        $q->bindValue(':motpasse', $comptes->get_motpasse());
        $q->execute() or die("Erreur de creation du compte");
    }

    public function update(Compte $comptes) {
        $q = $this->_db->prepare('UPDATE compte SET id_personnel =:id_personnel, type = :type, login = :login, motpasse = :motpasse WHERE id = :id');
        $q->bindValue(':id', $comptes->get_id(), PDO::PARAM_INT);
        $q->bindValue(':id_personnel', $comptes->get_id_personnel(), PDO::PARAM_STR);
        $q->bindValue(':type', $comptes->get_type(), PDO::PARAM_STR);
        $q->bindValue(':login', $comptes->get_login(), PDO::PARAM_STR);
        $q->bindValue(':motpasse', $comptes->get_motpasse(), PDO::PARAM_STR);
        $q->execute() or die('Erreur de mise à jour  du compte');
    }

    public function findCompte($info) {
        if (is_int($info)) {
            $q = $this->_db->query('SELECT id, id_personnel, type, login, motpasse FROM compte WHERE id = ' . $info);
            $compte = $q->fetch(PDO::FETCH_ASSOC);
            return new Compte($compte);
        } else {
            $q = $this->_db->prepare('SELECT id, id_personnel, type, login, motpasse FROM compte WHERE type = :type');
            $q->execute(array(':type' => $info));
            $compte = $q->fetch(PDO::FETCH_ASSOC);
            return new Compte($compte);
        }
    }

}
