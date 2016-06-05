<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace models;

/**
 * Description of KaderM
 *
 * @author kurawall
 */
class PeriodeM extends \DB\SQL\Mapper {

    function __construct() {
        $f3 = \Base::instance();
        $db = $f3->get('DB');
        parent::__construct($db, 'tb_periode');
    }

    public function simpan($kader) {
//        
//        if (empty(@$kader['id'])){
//            $sq = new \models\SequencesM();
//            $id = $sq->get_kader();
//            $this->id = $id;
//        }else{
//            $id = $kader['id'];
//            $this->load(array('id=:pid', ':pid' => $id));
//        }
//        $this->nama = $kader['nama'];
//        $this->katasandi = md5($kader['katasandi']);
//        $this->alamat = $kader['alamat'];
//        $this->no_tlp = $kader['no_telp'];
//        $this->foto = @$kader['foto'];
//        $this->posyandu_id = $kader['posyandu_id'];
//        $this->kel_id = $kader['kel'];
//        $this->kec_id = $kader['kec'];
//        $this->kab_id = $kader['kab'];
//        $this->prov_id = $kader['prov'];
////        echo "<pre>";
////        print_r($kader);
////        die;
//        $this->save();
//        return $this->get('_id');
    }
    
    public function getAll() {
//        $this->prov_name = "SELECT nama_prov FROM tb_provinsi WHERE tb_provinsi.id_prov = tb_kader.prov_id";
//        $this->kab_name = "SELECT nama_kab FROM tb_kabupaten WHERE tb_kabupaten.id_kab = tb_kader.kab_id";
//        $this->kec_name = "SELECT nama_kec FROM tb_kecamatan WHERE tb_kecamatan.id_kec = tb_kader.kec_id";
//        $this->kel_name = "SELECT nama_kel FROM tb_kelurahan WHERE tb_kelurahan.id_kel = tb_kader.kel_id";
//        $this->posyandu_name = "SELECT nama FROM tb_posyandu WHERE tb_posyandu.id = tb_kader.posyandu_id";
//        $list = $this->find();
//        $list_kader = [];
//        foreach ($list as $kader){
//            array_push($list_kader, $kader->cast());
//        }
//        return $list_kader;
        
//        return $this->db->exec('SELECT * FROM tb_kader');
    }
    
    public function hapus($id) {
//        $this->load(array('id=:pid', ':pid' => $id));
//        $this->erase();
    }
    
    public function get_by_posyandu($id) {
        $start = date('Y-m-d', strtotime("first day of last month"));
        $list = $this->find(array('posyandu_id=? AND tanggal>?', $id, $start));
        $list_periode = [];
        foreach ($list as $periode){
            array_push($list_periode, $periode->cast());
        }
        return $list_periode;
    }

}
