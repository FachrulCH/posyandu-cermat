<?php

/**
 * Created by PhpStorm.
 * User=> kurawall
 * Date=> 17/04/16
 * Time=> 10=>42
 */

namespace models;

class AnakM extends \DB\SQL\Mapper {

    function __construct()
    {
        $f3 = \Base::instance();
        $db = $f3->get('DB');
        parent::__construct($db, 'tb_provinsi');
    }

    function penimbangan()
    {
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

}
