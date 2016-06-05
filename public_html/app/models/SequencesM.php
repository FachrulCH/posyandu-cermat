<?php

namespace models;

class SequencesM extends \DB\SQL\Mapper {

    function __construct() {
        $f3 = \Base::instance();
        $db = $f3->get('DB');
        parent::__construct($db, 'sequences');
    }

    function get_kader() {
//        echo '<pre>';
        $tahun = date('y');
//        $data = $this->find('id=1');
        $this->load(array('id=:pid', ':pid' => 1));
        $this->value++;
        $this->save();
//        print_r($this->db->log());
//        print_r($this->cast());
        return $this->prefix . $tahun . '0' . $this->value;
    }

    function get_posyandu() {
        $tahun = date('y');
        $this->load(array('seq_name=:pid', ':pid' => 'sqposyandu'));
        $this->value++;
        $this->save();
        return $this->prefix . $tahun . '0' . $this->value;
    }
    
    function get_ibu() {
        $tahun = date('y');
        $this->load(array('seq_name=:pid', ':pid' => 'sqibu'));
        $this->value++;
        $this->save();
        return $this->prefix . $tahun . '0' . $this->value;
    }
    
    function get_anak() {
        $tahun = date('y');
        $this->load(array('seq_name=:pid', ':pid' => 'sqanak'));
        $this->value++;
        $this->save();
        return $this->prefix . $tahun . '0' . $this->value;
    }

}
