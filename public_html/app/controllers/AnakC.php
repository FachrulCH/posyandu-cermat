<?php
/**
 * Created by PhpStorm.
 * User: kurawall
 * Date: 22/04/16
 * Time: 0:12
 */

namespace controllers;


class AnakC extends Response_WS
{
    function getByProv($f3){
        echo "provinsi nya: ".$f3->get('PARAMS.provinsi');
    }
    function getByKota($f3){
        echo "provinsi nya: ".$f3->get('PARAMS.provinsi');
        echo "terus kotanya nya: ".$f3->get('PARAMS.kota');
    }
    function getByKecamatan($f3){
        echo "provinsi nya: ".$f3->get('PARAMS.provinsi');
        echo "terus kotanya nya: ".$f3->get('PARAMS.kota');
        echo "kemudian kecamatan nya: ".$f3->get('PARAMS.kecamatan');
    }
}