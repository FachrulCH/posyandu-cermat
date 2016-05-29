<?php

namespace models;

class IbuM extends \DB\SQL\Mapper {

    function __construct() {
        $f3 = \Base::instance();
        $db = $f3->get('DB');
        parent::__construct($db, 'tb_ibu');
    }

    function baru($data) {
        $this->reset();

        $this->no_ktp = $data['ktp'];
        $this->no_kk = $data['kk'];
        $this->nama = $data['nama'];
        $this->alias = $data['nama_panggilan'];
        $this->nama_suami = $data['nama_suami'];
        $this->tgl_lahir = $data['ttl'];
        $this->tempat_lahir = $data['tl'];
        $this->foto = $data[''];
        $this->prov_id = $data['prov'];
        $this->kota_id = $data['kota'];
        $this->kec_id = $data['kec'];
        $this->alamat = $data['alamat'];
        $this->posyandu_id = $data['posyandu'];
        $this->status_kb = $data['status_kb'];
        $this->jenis_kb = $data['jenis_kb'];

        $this->save();
        
        return $this->kode;
    }

    function get_all() {
//        $data = $this->find();
//        $provinsi = [];
//        //echo "<pre>";
//        foreach ($data as $p){
//            array_push($provinsi, ["id_prov"=>$p->id_prov,"nama_prov"=>$p->nama_prov]);
//        }
////        print_r($provinsi);
////        die();
//        return $provinsi;
    }

}
