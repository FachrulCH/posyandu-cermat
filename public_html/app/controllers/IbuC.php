<?php
namespace controllers;


class IbuC extends Response_WS
{
    function index(){
        $f3 = \Base::instance();
        $f3->set('breadcumb', ["Pendaftaran" => $f3->get('SESSION.LastPageURL'), "Daftar Ibu" => $f3->get('SESSION.LastPageURL')]);
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
            'jquery.dataTables.min',
            'dataTables.bootstrap.min'
        ]);
        $f3->set('customJS', []);
        $f3->set('vendorJS', []);
        $f3->set('pageJS', ['daftar-ibu']);
        
        $f3->set('content', 'pg-daftar-ibu.html');
        echo \Template::instance()->render('templates/layout.html');
    }
    
    function getDataIbu(){
        $this->set_code(200);
        $this->set_msg('OK');
//        $data = [
//            [
//                "kode" => "A111",
//                "nama" => "Situ",
//                "alias" => "Ceu Situ",
//                "nama_suami" => "Unyil",
//                "ttl" => "1990-01-02",
//                "tl" => "Sukabumi",
//                "prov_id" => "1",
//                "prov" => "Daerah Khusus Ibukota Jakarta",
//                "kota_id" => "2",
//                "kota" => "Kembangan",
//                "kec_id" => "3",
//                "kec" => "Meruya Selatan",
//                "kel_id" => "4",
//                "kel" => "Meruya Selatan",
//                "posyandu_id" => "5",
//                "posyandu" => "Bintang",
//                "statusKB" => "1",
//                "jenisKb" => "1",
//                "alamat" => "Jl. Meruya Selatan No. 1",
//                "foto" => "ani2.jpg",
//                "ktp" => 8,
//                "kk" => '1119990000',
//                "status" => 1
//            ]
//        ];
//        
//        //tes looping
//        for ($index = 0; $index < 100; $index++) {
//            $newData = $data[0];
//            $newData['nama'] = "asoy ke".$index;
//            $newData['foto'] = "in".rand(1,11).'.jpg';
//            array_push($data,$newData);
//        }
        $ibu = new \models\IbuM();
        $data = $ibu->get_all();
        
        $this->set_data('data_ibu', $data);
        $this->return_json();
    }
    
    function getProfile($id){
        $f3 = \Base::instance();
        $f3->set('breadcumb', ["Pendaftaran" => $f3->get('BASE_URL').'daftar/ibu#tambah', "Profile" => $f3->get('SESSION.LastPageURL')]);
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
        ]);
        $f3->set('customJS', []);
        $f3->set('vendorJS', []);
        $f3->set('pageJS', ['profile-ibu']);
        
        $f3->set('content', 'pg-profile-ibu.html');
        echo \Template::instance()->render('templates/layout.html');
    }
    
    function getPgBumil(){
        $f3 = \Base::instance();
        $f3->set('breadcumb', ["Pendaftaran" => $f3->get('SESSION.LastPageURL'), "Daftar Ibu Hamil" => $f3->get('SESSION.LastPageURL')]);
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
            'jquery.dataTables.min',
            'dataTables.bootstrap.min'
        ]);
        $f3->set('customJS', []);
        $f3->set('vendorJS', []);
        $f3->set('pageJS', ['daftar-ibu-hamil']);
        
        $f3->set('content', 'pg-daftar-ibu-hamil.html');
        echo \Template::instance()->render('templates/layout.html');
    }
    
    function getDataBumil(){
        $this->set_code(200);
        $this->set_msg('OK');
        $data = [
            [
                "kode" => "A111",
                "nama" => "Situ",
                "alias" => "Ceu Situ",
                "nama_suami" => "Unyil",
                "nama_panggilan" => "Unyil",
                "ttl" => "1990-01-02",
                "tl" => "Sukabumi",
                "prov_id" => "1",
                "prov" => "Daerah Khusus Ibukota Jakarta",
                "kota_id" => "2",
                "kota" => "Kembangan",
                "kec_id" => "3",
                "kec" => "Meruya Selatan",
                "kel_id" => "4",
                "kel" => "Meruya Selatan",
                "posyandu_id" => "5",
                "posyandu" => "Bintang",
                "status_kb" => "1",
                "jenis_kb" => "1",
                "alamat" => "Jl. Meruya Selatan No. 1",
                "foto" => "ani2.jpg",
                "ktp" => 8,
                "kk" => '1119990000',
                "status" => 1,
                "usia_hamil" => 3,
                "anakke" => 1
            ]
        ];
        
        //tes looping
        for ($index = 0; $index < 100; $index++) {
            $newData = $data[0];
            $newData['nama'] = "asoy ke".$index;
            $newData['foto'] = "in".rand(1,11).'.jpg';
            array_push($data,$newData);
        }
        
        $this->set_data('data_ibu', $data);
        $this->return_json();
    }
    
    function save($f3){
        $post = $f3->get('POST');
        
        $this->set_code(200);
        $this->set_msg('OK');
        $ibu = new \models\IbuM();
        $id = $ibu->baru($post);
        
        $this->set_data('ibu_saved', $id);
        $this->return_json();
    }
    
    public function simpan($f3) {
        $post = $f3->get('POST');
        $ibu = new \models\IbuM();
        $ibu->baru($post);
        $f3->reroute('/daftar/ibu');
    }
            
}