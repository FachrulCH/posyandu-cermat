<?php

/**
 * Created by PhpStorm.
 * User=> kurawall
 * Date=> 17/04/16
 * Time=> 10=>42
 */

namespace models;

class AnakM extends \DB\SQL\Mapper {

    function __construct() {
        $f3 = \Base::instance();
        $db = $f3->get('DB');
        parent::__construct($db, 'tb_anak');
    }

    function penimbangan() {
        $data = [
            "id_kms" => "KMS0001",
            "id_anak" => "AN0001",
            "nama" => "Unyil usro",
            "ttl" => "2015-01-01",
            "id_ibu" => "IB0001",
            "nama_ibu" => "Meimei",
            "alamat" => "Jalan cinta rt05 rw003",
            "penimbangan" => [
                [
                    "tanggal" => "2015-01-01",
                    "berat" => 5.6,
                    "gizi" => "H",
                    "RB" => "N"
                ],
                [
                    "tanggal" => "2015-02-01",
                    "berat" => 6.5,
                    "gizi" => "H",
                    "RB" => "N"
                ],
                [
                    "tanggal" => "2015-03-01",
                    "berat" => 7.2,
                    "gizi" => "H",
                    "RB" => "N"
                ]
            ],
            "id_posyandu" => "PSY-0001",
            "nama_posyandu" => "Sehat Jaya",
            "kota" => "Jakarta Barat"
        ];
        return $data;
    }

    public function simpan($anak) {
        if (empty($anak['id'])) {
            $sq = new \models\SequencesM();
            $id = $sq->get_anak();
            $this->id = $id;
        } else {
            $this->id = $anak['id'];
            $this->load(array('id=:pid', ':pid' => $this->id));
        }
        if ($anak['jk'] == 0) {
            $anak['foto'] = 'cewe-default.png';
        } else {
            $anak['foto'] = 'cowo-default.png';
        }
        $ibu = new \models\IbuM();
        $this->posyandu_id = $ibu->getPosyandu($anak['ibu']);

        $this->nama = $anak['nama'];
        $this->alias = $anak['alias'];
        $this->ibu_id = $anak['ibu'];
        $this->kms_id = $anak['kms_no'];
        $this->jk = $anak['jk'];
        $this->foto = $anak['foto'];
        $this->tempat_lahir = $anak['tl'];
        $this->tanggal_lahir = $anak['ttl'];
        $this->urutan = $anak['urutan'];
//        echo "<pre>";
//        print_r($this->cast());
//        die();
        $this->save();
    }

    public function get_by_kel($id_kel) {
        
    }

    public function get_all() {
        $this->ibu_nama = "SELECT nama FROM tb_ibu WHERE tb_ibu.id = tb_anak.ibu_id";

        $list = $this->find();
        $list_anak = [];
        foreach ($list as $anak) {
            array_push($list_anak, $anak->cast());
        }
        return $list_anak;
    }

    public function pemeriksaan($id_periode) {
        //$sql = "SELECT b.nama, b.foto, b.alias, b.tempat_lahir, b.tanggal_lahir, a.* FROM tb_periksa a, tb_anak b WHERE a.anak_id = b.id AND a.periode_id = '".$id_periode."'";
//        $sql = "select b.nama, b.foto, b.alias, b.tempat_lahir, b.tanggal_lahir, b.id as anak_id, a.berat, a.tinggi, a.asi, a.vit_a, a.nt, a.t2, a.o, a.hadir, a.periode_id  from tb_periksa a right join (select * from tb_anak a
//                where a.posyandu_id = (select posyandu_id from tb_periode b where b.id = '".$id_periode."')) b on a.anak_id = b.id";
        $sql = "SELECT b.nama, b.foto, b.alias, b.tempat_lahir, b.tanggal_lahir, b.id AS anak_id, a.berat, a.tinggi, a.asi, a.vit_a, a.nt, a.t2, a.o, a.hadir, a.periode_id, b.posyandu_id
                FROM tb_periksa a
                RIGHT JOIN tb_anak b ON a.anak_id = b.id
                and a.periode_id = '" . $id_periode . "' order by nama";
        return $this->db->exec($sql);
    }

    public function simpanPeriksa($periksa) {
        $hadir = $periksa['presensi'];
        $bb = $periksa['bb'];
        $tb = $periksa['tb'];
        $vita = $periksa['supvit']['vit_a'];
        $asi = $periksa['supvit']['asi'];
        $nt = $periksa['supvit']['nt'];
        $t2 = $periksa['supvit']['t2'];
        $o = $periksa['supvit']['o'];
        $id_anak = $periksa['per_id_anak'];
        $id_periode = $periksa['per_id_periode'];
        $sql = "REPLACE INTO tb_periksa (periode_id, anak_id, tanggal, berat, tinggi, vit_a, asi, nt, t2, o, hadir) 
            VALUES ('" . $id_periode . "', '" . $id_anak . "', now(), '" . $bb . "', '" . $tb . "', '" . $vita . "', '" . $asi . "', '" . $nt . "', '" . $t2 . "', '" . $o . "', '" . $hadir . "');";
//        echo "<pre>";
//        print_r($periksa['supvit']);
//        echo "========";
//        print_r($periksa);
//        
//        print_r($sql);
//        die();
        return $this->db->exec($sql);
    }

    public function get_profile_anak($id) {
        $this->ibu_nama = "SELECT nama FROM tb_ibu WHERE tb_ibu.id = tb_anak.ibu_id";
        $this->ibu_alamat = "SELECT alamat FROM tb_ibu WHERE tb_ibu.id = tb_anak.ibu_id";
        $this->posyandu_nama = "SELECT nama FROM tb_posyandu WHERE tb_posyandu.id = tb_anak.posyandu_id";
        $this->load(array('id=:pid', ':pid' => $id));
        $data = $this->cast();
        if ($data['jk'] == 0) {
            $data['jenis_kelamin'] = "Wanita";
        } else {
            $data['jenis_kelamin'] = "Pria";
        }
        return $data;
    }

    public function get_riwayat_pemeriksaan($id, $posyandu_id) {
        $jadwal = $this->db->exec("select t.id from tb_periode t where t.posyandu_id = '" . $posyandu_id . "'");
        
        $sql = "select * from (SELECT a.tanggal, b.nama, b.foto, b.alias, b.tempat_lahir, b.tanggal_lahir, b.id AS anak_id, a.berat, a.tinggi, a.asi, a.vit_a, a.nt, a.t2, a.o, a.hadir, a.periode_id, b.posyandu_id
                FROM tb_periksa a
                RIGHT JOIN tb_anak b ON a.anak_id = b.id AND a.periode_id = '".$jadwal[0]['id']."'
                ORDER BY nama) x
                where x.anak_id = '".$id."'";
        
        if (count($jadwal) > 1) {
            foreach ($jadwal as $k => $j) {
                if ($k != 0){
                $periode = $j['id'];
                $sql .= " union all
                        select * from (SELECT a.tanggal, b.nama, b.foto, b.alias, b.tempat_lahir, b.tanggal_lahir, b.id AS anak_id, a.berat, a.tinggi, a.asi, a.vit_a, a.nt, a.t2, a.o, a.hadir, a.periode_id, b.posyandu_id
                        FROM tb_periksa a
                        RIGHT JOIN tb_anak b ON a.anak_id = b.id AND a.periode_id = '".$periode."'
                        ORDER BY nama) x
                        where x.anak_id = '".$id."'";
                }
            }
        }
        
        return $this->db->exec($sql);
    }

}
