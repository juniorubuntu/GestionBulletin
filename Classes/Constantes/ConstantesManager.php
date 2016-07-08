<?php

/**
 * Description of ContantesManager
 *
 * @author ElSha
 */
class ConstantesManager {

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

    public function delete(Constantes $constante) {
        $this->_db->exec('DELETE FROM constantes WHERE id = ' . $constante->get_id());
    }

    public function add(Constantes $constantes) {
        $q = $this->_db->prepare('INSERT INTO constantes SET paysfr =:paysfr, paysan = :paysan, ministryfr = :ministryfr, ministryan = :ministryan,'
                . 'devisefr = :devisefr, devisean =:devisean');
        $q->bindValue(':paysfr', $constantes->get_paysFr());
        $q->bindValue(':paysan', $constantes->get_paysan());
        $q->bindValue(':ministryfr', $constantes->get_ministryfr());
        $q->bindValue(':ministryan', $constantes->get_ministryan());
        $q->bindValue(':devisefr', $constantes->get_devisefr());
        $q->bindValue(':devisean', $constantes->get_devisean());
        $q->execute() or die("Erreur de creation de la constante");
    }

    public function update(Constantes $constantes) {
        $q = $this->_db->prepare('UPDATE constantes SET paysfr =:paysfr, paysan = :paysan, ministryfr = :ministryfr, ministryan = :ministryan,'
                . 'devisefr = :devisefr, devisean =:devisean WHERE id = :id');
        $q->bindValue(':id', $constantes->get_id(), PDO::PARAM_INT);
        $q->bindValue(':paysfr', $constantes->get_paysfr(), PDO::PARAM_STR);
        $q->bindValue(':paysan', $constantes->get_paysan(), PDO::PARAM_STR);
        $q->bindValue(':ministryfr', $constantes->get_ministryfr(), PDO::PARAM_STR);
        $q->bindValue(':ministryan', $constantes->get_ministryan(), PDO::PARAM_STR);
        $q->bindValue(':devisefr', $constantes->get_devisefr(), PDO::PARAM_STR);
        $q->bindValue(':devisean', $constantes->get_devisean(), PDO::PARAM_STR);
        $q->execute() or die('Erreur de mise à jour  de la constante');
    }

    public function findConstantes($info) {
        if (is_int($info)) {
            $q = $this->_db->query('SELECT id, paysfr, paysan, ministryfr,ministryan,'
                    . 'devisefr, devisean FROM constantes WHERE id = ' . $info);
            $constante = $q->fetch(PDO::FETCH_ASSOC);
            return new Constantes($constante);
        } else {
            $q = $this->_db->prepare('SELECT id, paysfr, paysan, ministryfr,ministryan,'
                    . 'devisefr, devisean FROM constantes WHERE paysfr = :paysfr');
            $q->execute(array(':paysfr' => $info));
            $constante = $q->fetch(PDO::FETCH_ASSOC);
            return new Constantes($constante);
        }
    }
    public function findConstantesSpecial($info) {
            $q = $this->_db->query('SELECT id, paysfr, paysan, ministryfr,ministryan,'
                    . 'devisefr, devisean FROM constantes WHERE id = ' . $info);
            $constante = $q->fetch(PDO::FETCH_ASSOC);
            return $constante;
    }

    public function findAll() {
        $constantes = array();
        $q = $this->_db->prepare('SELECT * FROM constantes ORDER BY paysfr');
        $q->execute() or die('Erreur de recuperation de la liste de la constante');
        while ($donnees = $q->fetch(PDO::FETCH_ASSOC)) {
            $constantes[] = new Constantes($donnees);
        }
        return $constantes;
    }

}