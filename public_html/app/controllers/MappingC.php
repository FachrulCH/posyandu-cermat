<?php
/**
 * Created by PhpStorm.
 * User: kurawall
 * Date: 17/04/16
 * Time: 11:01
 */

namespace controllers;


class MappingC extends Response_WS
{
    function getProv(){
        $prov = new \models\ProvinsiM();
        $provinsi = $prov->get_all();

        $this->set_code(200);
        $this->set_data('provinsi', $provinsi);
        $this->return_json();
    }

    function getKab($f3, $param){
        $id = (int) $param['id'];
        $k = new \models\KabupatenM();

        $kabupaten = $k->get_kab($id);

        $this->set_code(200);
        $this->set_data('kabupaten', $kabupaten);
        $this->return_json();
    }

    function getKec($f3, $param){
        $id = (int) $param['id'];
        $k = new \models\KecamatanM();

        $kecamatan = $k->get_kec($id);

        $this->set_code(200);
        $this->set_data('kecamatan', $kecamatan);
        $this->return_json();
    }

    function getKel($f3, $param){
        $id = (int) $param['id'];
        $k = new \models\KelurahanM();

        $kecamatan = $k->get_kel($id);

        $this->set_code(200);
        $this->set_data('kelurahan', $kecamatan);
        $this->return_json();
    }
}