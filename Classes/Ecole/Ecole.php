<?php

/**
 * Description of Ecole
 *
 * @author atbr
 */
class Ecole {

    private $_id,
            $_pb,
            $_nomfr,
            $_noman,
            $_devisefr,
            $_devisean;

    public function __construct(array $donnees) {
        $this->hydrate($donnees);
    }

    public function hydrate(array $donnees) {
        foreach ($donnees as $key => $value) {
            $method = 'set_' . lcfirst($key);
            if (method_exists($this, $method)) {
                $this->$method($value);
            }
        }
    }
    
    function get_id() {
        return $this->_id;
    }

    function get_pb() {
        return $this->_pb;
    }

    function get_nomfr() {
        return $this->_nomfr;
    }

    function get_noman() {
        return $this->_noman;
    }

    function get_devisefr() {
        return $this->_devisefr;
    }

    function get_devisean() {
        return $this->_devisean;
    }

    function set_id($_id) {
        $this->_id = $_id;
    }

    function set_pb($_pb) {
        $this->_pb = $_pb;
    }

    function set_nomfr($_nomfr) {
        $this->_nomfr = $_nomfr;
    }

    function set_noman($_noman) {
        $this->_noman = $_noman;
    }

    function set_devisefr($_devisefr) {
        $this->_devisefr = $_devisefr;
    }

    function set_devisean($_devisean) {
        $this->_devisean = $_devisean;
    }

        function toString() {
        return 'npmfr: ' . $this->_nomFr . '<br>noman: ' . $this->_nomAn . '<br>devisefr: ' . $this->_deviseFr . '<br>devisean: ' . $this->_deviseAn . '<br>pb: ' . $this->_pb;
    }

}
