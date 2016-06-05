<?php

/**
 * Created by PhpStorm.
 * User: kurawall
 * Date: 22/04/16
 * Time: 0:12
 */

namespace controllers;

class PosyanduC extends Response_WS {

    function getAll() {
        $f3 = \Base::instance();
        $f3->set('breadcumb', ["Pendaftaran" => $f3->get('SESSION.LastPageURL'), "Daftar Anak" => $f3->get('SESSION.LastPageURL')]);
        $f3->set('loadCSS', [
            'custom',
            'dataTables.bootstrap.min'
        ]);

        $f3->set('headJS', ['http://maps.google.com/maps/api/js?libraries=places']);
        $f3->set('loadJS', [
            'jquery.flot',
            'jquery.nicescroll',
            'localforage.min',
            'scripts',
            'datatables.min',
            'locationpicker.jquery.min'
        ]);
        $f3->set('pageJS', ['daftar-posyandu']);

        $f3->set('content', 'pg-daftar-posyandu.html');
        echo \Template::instance()->render('templates/layout.html');
    }

    function getDataPosyandu() {

        $this->set_code(200);
        $this->set_msg('OK');
        $posyandu = new \models\PosyanduM();
        $data = $posyandu->getAll();
//        $data = [
//            [
//                "kode" => "A111",
//                "nama" => "Posyandu Mawar 1",
//                "alamat" => "Jl. Meruya Selatan No. 1, Meruya Selatan, Kembangan, Daerah Khusus Ibukota Jakarta",
//                "koordinat" => [
//                    "lat" => -6.2102982,
//                    "lng" => 106.7363191
//                ],
//                "kader_jum" => 8,
//                "status" => 1
//            ],
//            [
//                "kode" => "A222",
//                "nama" => "Posyandu Melati 1",
//                "alamat" => "Jl. Meruya Barat No. 1, Meruya Selatan, Kembangan, Daerah Khusus Ibukota Jakarta",
//                "koordinat" => [
//                    "lat" => -6.2202982,
//                    "lng" => 106.7362191
//                ],
//                "kader_jum" => 7,
//                "status" => 1
//            ]
//        ];
        
        $this->set_data('data_posyandu', $data);
        $this->return_json();
    }
    
    public function postListPosyandu() {
        $f3 = \Base::instance();
        $post = $f3->get('POST');
        $id_kel = (int) $post['kelurahan'];
        
        $posyandu = new \models\PosyanduM();
        $data = $posyandu->listPosyandu($id_kel);
        
        $this->set_code(200);
        $this->set_msg('OK');
        $this->set_data('data_posyandu', $data);
        $this->return_json();
    }
    
    public function simpan($f3) {
        $post = $f3->get('POST');
        
//        echo "<pre>";
//        print_r($post);
//        die();
        
        $posyandu = new \models\PosyanduM();
        $posyandu->simpan($post);
        $f3->reroute('/posyandu/daftar');
    }
    
    public function getPeriode($f3) {
        $post = $f3->get('POST');
        $periode = new \models\PeriodeM();
        
        $this->set_code(200);
        $this->set_msg('OK');
        
        $data = $periode->get_by_posyandu($post['posyandu_id']);
        $this->set_data('data_periode', $data);
        $this->return_json();
    }

}
