<?php
/**
 * Created by PhpStorm.
 * User: kurawall
 * Date: 17/04/16
 * Time: 12:29
 */

namespace models;


class KecamatanM extends \DB\SQL\Mapper
{
    function __construct()
    {
        $f3 = \Base::instance();
        $db = $f3->get('DB');
        parent::__construct($db, 'tb_kecamatan');
    }

    function get_kec($id)
    {
        $data = $this->find(array('id_kab=:pid', ':pid' => $id), array('order' => 'id_kec'));

        $kecamatan = [];
        foreach ($data as $k){
            array_push($kecamatan, ["id_kec"=>$k->id_kec, "id_kab"=>$k->id_kab,"nama_kec"=>$k->nama_kec]);
        }
        return $kecamatan;
    }
}