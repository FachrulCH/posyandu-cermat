<?php
/**
 * Created by PhpStorm.
 * User: kurawall
 * Date: 17/04/16
 * Time: 10:42
 */

namespace models;


class ProvinsiM extends \DB\SQL\Mapper
{
    function __construct()
    {
        $f3 = \Base::instance();
        $db = $f3->get('DB');
        parent::__construct($db, 'tb_provinsi');
    }

    function get_all()
    {
        $data = $this->find();
        $provinsi = [];
        //echo "<pre>";
        foreach ($data as $p){
            array_push($provinsi, ["id_prov"=>$p->id_prov,"nama_prov"=>$p->nama_prov]);
        }
//        print_r($provinsi);
//        die();
        return $provinsi;
    }

}