<?php
/**
 * Created by PhpStorm.
 * User: kurawall
 * Date: 17/04/16
 * Time: 12:29
 */

namespace models;


class KabupatenM extends \DB\SQL\Mapper
{
    function __construct()
    {
        $f3 = \Base::instance();
        $db = $f3->get('DB');
        parent::__construct($db, 'tb_kabupaten');
    }

    function get_kab($id)
    {
        $data = $this->find(array('id_prov=:pid', ':pid' => $id), array('order' => 'id_kab'));

        $kabupaten = [];
        foreach ($data as $k){
            array_push($kabupaten, ["id_kab"=>$k->id_kab, "id_prov"=>$k->id_prov,"nama_kab"=>$k->nama_kab]);
        }
        return $kabupaten;
    }
}