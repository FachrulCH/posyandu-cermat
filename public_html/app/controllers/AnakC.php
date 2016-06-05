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
    function index(){
        $f3 = \Base::instance();
        $f3->set('breadcumb', ["Pendaftaran" => $f3->get('SESSION.LastPageURL'), "Daftar Anak" => $f3->get('SESSION.LastPageURL')]);
        $f3->set('loadCSS', [
            'custom',
            'dataTables.bootstrap.min',
            'bootstrap-select.min'
        ]);
        
        $f3->set('headJS', []);
        $f3->set('loadJS', [
            'jquery.flot',
            'jquery.nicescroll',
            'localforage.min',
            'scripts',
            'datatables.min',
            'bootstrap-select.min',
            'moment-2.2.1'
        ]);
        $f3->set('customJS', []);
        $f3->set('vendorJS', []);
        $f3->set('pageJS', ['daftar-anak']);
        
        $ibu = new \models\IbuM();
        $f3->set('list_ibu', $ibu->get_by_kel(1101012001));
        
        $f3->set('content', 'pg-daftar-anak.html');
        echo \Template::instance()->render('templates/layout.html');
    }
    
    function getProfile($id){
        $f3 = \Base::instance();
        $f3->set('breadcumb', ["Profile" => $f3->get('BASE_URL').'daftar/anak', "Anak" => $f3->get('SESSION.LastPageURL')]);
        $f3->set('loadCSS', [
            'custom',
            'dataTables.bootstrap.min'
        ]);
        
        $f3->set('headJS', []);
        $f3->set('loadJS', [
            'jquery.flot',
            'jquery.nicescroll',
            'localforage.min',
            'scripts',
            'datatables.min'
        ]);
        $f3->set('pageJS', ['profile-anak']);
        
        $f3->set('content', 'pg-profile-anak.html');
        echo \Template::instance()->render('templates/layout.html');
    }
    
    function getDataAnak(){
        $this->set_code(200);
        $this->set_msg('OK');
//        $data = [
//            [
//                "kode"  => '222',
//                "foto"  => 'anak3.png',
//                "nama"  => 'Nama anak',
//                "alias" => 'Nama Panggilan',
//                "ibu"   => '1',
//                "ibu_nama"   => 'Juminten',
//                "jk"    => '1',
//                "lahir" => 'Bekasi',
//                "ttl"   => '01-Jan-2016',
//                "noKK"  => '12121344',
//                "posyandu"  => 'Bintang',
//                "urutan" => '3'
//            ]
//        ];
        $anak = new \models\AnakM();
        $data = $anak->get_all();
        
        //tes looping
//        $foto = ['anak1.jpg','anak2.jpg','anak3.png'];
//        for ($index = 0; $index < 100; $index++) {
//            $newData = $data[0];
//            $newData['nama'] = "asoy ke".$index;
//            $newData['foto'] = $foto[rand(0,2)];
//            array_push($data,$newData);
//        }
        
        $this->set_data('data_anak', $data);
        $this->return_json();
    }
    
    function pemeriksaan1(){
        $f3 = \Base::instance();
        $f3->set('breadcumb', ["Pemeriksaan" => $f3->get('SESSION.LastPageURL'), "Anak" => $f3->get('SESSION.LastPageURL')]);
        $f3->set('loadCSS', [
            'custom',
            'dataTables.bootstrap.min'
        ]);
        
        $f3->set('headJS', []);
        $f3->set('loadJS', [
            'jquery.flot',
            'jquery.nicescroll',
            'localforage.min',
            'scripts',
            'datatables.min',
            'moment-2.2.1'
        ]);
        $f3->set('customJS', []);
        $f3->set('vendorJS', []);
        $f3->set('pageJS', ['periksa-anak']);
        
        $f3->set('content', 'pg-layanan-anak.html');
        echo \Template::instance()->render('templates/layout.html');
    }
    function pemeriksaan(){
        $f3 = \Base::instance();
        $f3->set('breadcumb', ["Pemeriksaan" => $f3->get('SESSION.LastPageURL'), "Anak" => $f3->get('SESSION.LastPageURL')]);
        $f3->set('loadCSS', [
            'custom',
            'dataTables.bootstrap.min'
        ]);
        
        $f3->set('headJS', []);
        $f3->set('loadJS', [
            'jquery.flot',
            'jquery.nicescroll',
            'localforage.min',
            'scripts',
            'datatables.min',
            'moment-2.2.1'
        ]);
        $f3->set('customJS', []);
        $f3->set('vendorJS', []);
        $f3->set('pageJS', ['periksa-anak2']);
        
        // get list posyandu sekitar kader
        $kelurahan_kader = $f3->get('SESSION.kel_id');
        $posyandu = new \models\PosyanduM();
        $f3->set('list_posyandu', $posyandu->listPosyandu($kelurahan_kader));
        $f3->set('kelurahan_kader', $kelurahan_kader);
        
        
        $f3->set('content', 'pg-layanan-anak2.html');
        echo \Template::instance()->render('templates/layout.html');
    }
    
    function getPeriksaAnak($f3){
        $this->set_code(200);
        $this->set_msg('OK');
        $data = [
            [
                "no_kk"  => '222',
                "foto"  => 'anak3.png',
                "nama"  => 'Nama anak',
                "nama_ibu" => 'Nama Panggilan',
                "ttl"   => '01-Jan-2016',
                "umur"   => '1',
                "berat"   => '9',
                "vit_a"    => 'ya',
                "asi" => '1',
                "nt" => 'ya',
                "t2"  => 'tidak',
                "O"  => 'tidak',
                "hadir" => '0'
            ]
        ];
        
        //tes looping
        $foto = ['anak1.jpg','anak2.jpg','anak3.png'];
        for ($index = 0; $index < 100; $index++) {
            $newData = $data[0];
            $newData['nama'] = "asoy ke".$index;
            $newData['foto'] = $foto[rand(0,2)];
            $newData['hadir'] = rand(0,1);
            array_push($data,$newData);
        }
        
        $this->set_data('data_anak', $data);
        $this->return_json();
    }
    
    public function simpan($f3){
        $post = $f3->get('POST');
//        echo "<pre>";
//        print_r($post);
        // simpan di database
        $anak = new \models\AnakM();
        $anak->simpan($post);
        $f3->reroute('/daftar/anak');
    }
    
    function postPeriksaAnak($f3){
        $post = $f3->get('POST');
        
        $this->set_code(200);
        $this->set_msg('OK');
        
        $anak = new \models\AnakM();
        $data = $anak->pemeriksaan($post['periode']);
        
//        $data = [
//            [
//                "no_kk"  => '222',
//                "foto"  => 'anak3.png',
//                "nama"  => 'Nama anak',
//                "nama_ibu" => 'Nama Panggilan',
//                "ttl"   => '01-Jan-2016',
//                "umur"   => '1',
//                "berat"   => '9',
//                "vit_a"    => 'ya',
//                "asi" => '1',
//                "nt" => 'ya',
//                "t2"  => 'tidak',
//                "O"  => 'tidak',
//                "hadir" => '0'
//            ]
//        ];
        
        //tes looping
//        $foto = ['anak1.jpg','anak2.jpg','anak3.png'];
//        for ($index = 0; $index < 100; $index++) {
//            $newData = $data[0];
//            $newData['nama'] = "asoy ke".$index;
//            $newData['foto'] = $foto[rand(0,2)];
//            $newData['hadir'] = rand(0,1);
//            array_push($data,$newData);
//        }
        
        $this->set_data('data_anak', $data);
        $this->return_json();
    }
    
    public function simpanPemeriksaan($f3) {
        $post = $f3->get('POST');
//        echo '<pre>';
//        print_r($post);
        $anak = new \models\AnakM();
        $anak->simpanPeriksa($post);
        $f3->reroute('/periksa/anak');
    }
}