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
        if (empty($data['id'])){
            $sq = new \models\SequencesM();
            $id = $sq->get_ibu();
            $this->id = $id;
        }else{
            $id = $data['id'];
            $this->load(array('id=:pid', ':pid' => $id));
        }

        $this->no_ktp = $data['no_ktp'];
        $this->no_kk = $data['no_kk'];
        $this->nama = $data['nama'];
        $this->alias = $data['alias'];
        $this->nama_suami = $data['nama_suami'];
        $this->tgl_lahir = $data['ttl'];
        $this->tempat_lahir = $data['tl'];
        $this->foto = 'ibu-default.png';
        $this->prov_id = $data['prov'];
        $this->kab_id = $data['kab'];
        $this->kec_id = $data['kec'];
        $this->kel_id = $data['kel'];
        $this->alamat = $data['alamat'];
        $this->posyandu_id = $data['posyandu_ibu'];
        $this->status_kb = $data['kb'];
        $this->jenis_kb = $data['jenis_kb'];

        $this->save();
    }

    function get_all() {
        $this->prov_name = "SELECT nama_prov FROM tb_provinsi WHERE tb_provinsi.id_prov = tb_ibu.prov_id";
        $this->kab_name = "SELECT nama_kab FROM tb_kabupaten WHERE tb_kabupaten.id_kab = tb_ibu.kab_id";
        $this->kec_name = "SELECT nama_kec FROM tb_kecamatan WHERE tb_kecamatan.id_kec = tb_ibu.kec_id";
        $this->posyandu_name = "SELECT nama FROM tb_posyandu WHERE tb_posyandu.id = tb_ibu.posyandu_id";
        $data = $this->find();
        $listIbu = [];
        //echo "<pre>";
        foreach ($data as $ibu) {
            array_push($listIbu, [
                "kode" => $ibu->id,
                "nama" => $ibu->nama,
                "alias" => $ibu->alias,
                "nama_suami" => $ibu->nama_suami,
                "ttl" => $ibu->tgl_lahir,
                "tl" => $ibu->tempat_lahir,
                "prov_id" => $ibu->prov_id,
                "prov_name" => $ibu->prov_name,
                "kab_id" => $ibu->kab_id,
                "kab_name" => $ibu->kab_name,
                "kec_id" => $ibu->kec_id,
                "kec_name" => $ibu->kec_name,
                "kel_id" => $ibu->kel_id,
                "kel_name" => "Meruya Selatan",
                "posyandu_id" => $ibu->posyandu_id,
                "posyandu_name" => $ibu->posyandu_name,
                "status_kb" => $ibu->status_kb,
                "jenisKb" => $ibu->jenis_kb,
                "alamat" => $ibu->alamat,
                "foto" => $ibu->foto,
                "ktp" => $ibu->no_ktp,
                "kk" => $ibu->no_kk,
                "status" => $ibu->status
            ]);
        }
//        print_r($provinsi);
//        die();
        return $listIbu;
    }
    
    public function get_by_kel($id_kelurahan) {
        $this->prov_name = "SELECT nama_prov FROM tb_provinsi WHERE tb_provinsi.id_prov = tb_ibu.prov_id";
        $this->kab_name = "SELECT nama_kab FROM tb_kabupaten WHERE tb_kabupaten.id_kab = tb_ibu.kab_id";
        $this->kec_name = "SELECT nama_kec FROM tb_kecamatan WHERE tb_kecamatan.id_kec = tb_ibu.kec_id";
        $this->posyandu_name = "SELECT nama FROM tb_posyandu WHERE tb_posyandu.id = tb_ibu.posyandu_id";
        
        if ($id_kelurahan != '*'){
        $data = $this->find(array('kel_id=:pid', ':pid' => $id_kelurahan), array('order' => 'nama'));
        }else{
            $data = $this->find();
        }
        $listIbu = [];
        //echo "<pre>";
        foreach ($data as $ibu) {
            array_push($listIbu, [
                "id" => $ibu->id,
                "nama" => $ibu->nama,
                "alias" => $ibu->alias,
                "nama_suami" => $ibu->nama_suami,
                "ttl" => $ibu->tgl_lahir,
                "tl" => $ibu->tempat_lahir,
                "prov_id" => $ibu->prov_id,
                "prov_name" => $ibu->prov_name,
                "kab_id" => $ibu->kab_id,
                "kab_name" => $ibu->kab_name,
                "kec_id" => $ibu->kec_id,
                "kec_name" => $ibu->kec_name,
                "kel_id" => $ibu->kel_id,
                "kel_name" => "Meruya Selatan",
                "posyandu_id" => $ibu->posyandu_id,
                "posyandu_name" => $ibu->posyandu_name,
                "status_kb" => $ibu->status_kb,
                "jenisKb" => $ibu->jenis_kb,
                "alamat" => $ibu->alamat,
                "foto" => $ibu->foto,
                "ktp" => $ibu->no_ktp,
                "kk" => $ibu->no_kk,
                "status" => $ibu->status
            ]);
        }
//        print_r($provinsi);
//        die();
        return $listIbu;
    }
    
    public function getPosyandu($id) {
        $this->load(array('id=:pid', ':pid' => $id));
        return $this->posyandu_id;
    }

}
