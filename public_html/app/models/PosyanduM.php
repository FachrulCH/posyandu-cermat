<?php

/**
 * Created by PhpStorm.
 * User: kurawall
 * Date: 17/04/16
 * Time: 12:29
 */

namespace models;

class PosyanduM extends \DB\SQL\Mapper {

    function __construct() {
        $f3 = \Base::instance();
        $db = $f3->get('DB');
        parent::__construct($db, 'tb_posyandu');
    }

    function getProfile($id) {
        
    }

    public function listPosyandu($id_kel) {
        if ($id_kel == '*') {
            $list = $this->find();
        } else {
            $list = $this->find(array('kel_id=:pid', ':pid' => $id_kel), array('order' => 'nama'));
        }
        $list_posyandu = [];
        foreach ($list as $posyandu) {
            array_push($list_posyandu, $posyandu->cast());
        }

        return $list_posyandu;
    }

    public function getAll() {
        $this->prov_name = "SELECT nama_prov FROM tb_provinsi WHERE tb_provinsi.id_prov = tb_posyandu.prov_id";
        $this->kab_name = "SELECT nama_kab FROM tb_kabupaten WHERE tb_kabupaten.id_kab = tb_posyandu.kab_id";
        $this->kec_name = "SELECT nama_kec FROM tb_kecamatan WHERE tb_kecamatan.id_kec = tb_posyandu.kec_id";
        $this->kel_name = "SELECT nama_kel FROM tb_kelurahan WHERE tb_kelurahan.id_kel = tb_posyandu.kel_id";
        $list = $this->find();
        $list_posyandu = [];
        foreach ($list as $posyandu) {
            array_push($list_posyandu, $posyandu->cast());
        }
        return $list_posyandu;
    }

    public function simpan($posyandu) {
        if (empty($posyandu['id'])) {
            $sq = new \models\SequencesM();
            $id = $sq->get_posyandu();
            $this->id = $id;
        } else {
            $id = $posyandu['id'];
            $this->load(array('id=:pid', ':pid' => $id));
        }

        $this->nama = $posyandu['posyandu-name'];
        $this->alamat = $posyandu['alamat'];
        $this->rtrw = $posyandu['rtrw'];
        $this->kel_id = $posyandu['kel'];
        $this->kec_id = $posyandu['kec'];
        $this->kab_id = $posyandu['kab'];
        $this->prov_id = $posyandu['prov'];
        $this->latitude = $posyandu['lat'];
        $this->longitude = $posyandu['lng'];
//        echo "<pre>";
//        print_r($kader);
//        die;
        $this->save();
        return $this->get('_id');
    }

}
