<?php
/**
 * Created by PhpStorm.
 * User: kurawall
 * Date: 17/04/16
 * Time: 12:29
 */

namespace models;


class KelurahanM extends \DB\SQL\Mapper
{
    function __construct()
    {
        $f3 = \Base::instance();
        $db = $f3->get('DB');
        parent::__construct($db, 'tb_kelurahan');
    }

    function get_kel($id)
    {
        $data = $this->find(array('id_kec=:pid', ':pid' => $id), array('order' => 'id_kel'));

        $kelurahan = [];
        foreach ($data as $k){
            array_push($kelurahan, ["id_kel"=>$k->id_kel, "id_kec"=>$k->id_kec,"nama_kel"=>$k->nama_kel]);
        }
        return $kelurahan;
    }
}