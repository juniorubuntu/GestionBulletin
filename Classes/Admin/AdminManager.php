<?php

/**
 * Description of AdminManager
 *
 * @author ElSha
 */
class AdminManager {

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

    public function add(Admin $admin) {
        $q = $this->_db->prepare('INSERT INTO admin SET id= :id, code=:code ');
        $q->bindValue(':id', $admin->get_id());
        $q->bindValue(':code', $admin->get_code());
        $q->execute() or die("Erreur de creation d\'un administrateur");
    }

    public function update(Admin $admin) {
        $q = $this->_db->prepare('UPDATE admin SET code =:code WHERE id= :id');
        $q->bindValue(':id', $admin->get_id(), PDO::PARAM_INT);
        $q->bindValue(':code', $admin->get_code(), PDO::PARAM_STR);
        $q->execute() or die('Erreur de mise à jour de l\'administrateur');
    }

    public function findAdmin($info) {
        if (is_int($info)) {
            $q = $this->_db->query('SELECT * FROM admin WHERE id = ' . $info);
            $admin = $q->fetch(PDO::FETCH_ASSOC);
            return new Admin($admin);
        } else {
            $q = $this->_db->prepare('SELECT * FROM admin WHERE code = :code');
            $q->execute(array(':code' => $info));
            $admin = $q->fetch(PDO::FETCH_ASSOC);
            return new Admin($admin);
        }
    }

    public function delete(Admin $admin) {
        $this->_db->exec('DELETE FROM admin WHERE id = ' . $admin->get_id());
    }

    public function findAll() {
        $admins = array();
        $q = $this->_db->prepare('SELECT * FROM admin ORDER BY code');
        $q->execute() or die('Erreur de recuperation de la liste des administrateurs');
        while ($donnees = $q->fetch(PDO::FETCH_ASSOC)) {
            $admins[] = new Admin($donnees);
        }
        return $admins;
    }

}
