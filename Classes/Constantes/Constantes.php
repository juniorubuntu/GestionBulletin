<?php

/**
 * Description of Contantes
 *
 * @author ElSha
 */
class Constantes {

    private $_id,
            $_paysFr,
            $_paysan,
            $_ministryfr,
            $_ministryan,
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
    function get_paysFr() {
        return $this->_paysFr;
    }

    function set_paysFr($_paysFr) {
        $this->_paysFr = $_paysFr;
    }

    
    function get_paysan() {
        return $this->_paysan;
    }

    function get_ministryfr() {
        return $this->_ministryfr;
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

    function set_paysan($_paysan) {
        $this->_paysan = $_paysan;
    }
    
    function get_ministryan() {
        return $this->_ministryan;
    }

    function set_ministryan($_ministryan) {
        $this->_ministryan = $_ministryan;
    }

    
    function set_ministryfr($_ministryfr) {
        $this->_ministryfr = $_ministryfr;
    }

    function set_devisefr($_devisefr) {
        $this->_devisefr = $_devisefr;
    }

    function set_devisean($_devisean) {
        $this->_devisean = $_devisean;
    }
}
