<?php

namespace controllers;

class LaporanC extends Response_WS{

    function penimbanganBalita($f3, $params)
    {

        $f3->set('breadcumb', ["Laporan" => $f3->get('SESSION.LastPageURL'), "balita" => '#']);
        $f3->set('loadCSS', [
            'custom'
        ]);
        
        $f3->set('headJS', []);
        $f3->set('loadJS', [
            'jquery.flot',
            'jquery.nicescroll',
            'scripts',
            'localforage.min',
            'moment-2.2.1'
        ]);
        $f3->set('pageJS', ['laporan-penimbangan']);
        $f3->set('vendorJS', []);

        $anak = new \models\AnakM();

        $data_penimbangan = $anak->penimbangan();


        $f3->set('data_anak', $data_penimbangan);
        $f3->set('data_anak_json', json_encode($data_penimbangan));
        //echo '<pre>';
//        print_r($data_penimbangan);
//        die();
        $f3->set('content', 'pg-penimbangan-anak.html');
        echo \Template::instance()->render('templates/layout.html');
    }

    function penimbanganPosyandu($f3, $params)
    {

        $f3->set('breadcumb', ["Laporan" => $f3->get('SESSION.LastPageURL'), "posyandu" => "#"]);
        $f3->set('loadCSS', [
            'custom'
        ]);
        
        $f3->set('headJS', []);
        $f3->set('loadJS', [
            'jquery.flot',
            'jquery.nicescroll',
            'moment-2.2.1',
            'localforage.min',
            'scripts'
        ]);
        $f3->set('pageJS', ['laporan-penimbangan-posyandu']);
        $f3->set('vendorJS', []);

//        $anak = new \models\AnakM();
//        
//        $data_penimbangan = $anak->penimbangan();


        $f3->set('data_anak', $data_penimbangan);
        $f3->set('data_anak_json', json_encode($data_penimbangan));
        //echo '<pre>';
//        print_r($data_penimbangan);
//        die();
        $f3->set('content', 'pg-laporan-penimbangan.html');
        echo \Template::instance()->render('templates/layout.html');
    }

    function getPenimbanganPosyandu($f3, $params)
    {
        $id = (int) $param['id'];

        $data_laporan = array(
            'A' => [
                'bulan' => 'januari',
                'tahun' => '2016',
                'id' => 'PSY001',
                'nama' => 'Posyandu Seroja',
                'alamat' => 'jl alamat paslu',
                'rtrw' => '001/002',
                'kelurahan' => 'Harapan Jaya',
                'kecamatan' => 'Bekasi Utara',
                'kota' => 'Kota Bekasi',
                'kader_jum' => '9 orang',
                'kader_jum_aktif' => '5 orang',
                'petugas' => 'Asep',
                'puskesmas' => 'Puskesmas Seroja'
            ],
            'B' => [
                'ibu_hamil' => 9 . ' orang',
                'ibu_hamil_fe' => 5 . ' orang',
                'ibu_hamil_kek' => 2 . ' orang',
                'ibu_nifas' => 1 . ' orang',
                'ibu_nifas_vitA' => 2 . ' orang',
                'ibu_buteki_fe' => 8 . ' orang'
            ],
            'C' => [
                ['L' => 1, 'P' => 2],
                ['L' => 3, 'P' => 2],
                ['L' => 0, 'P' => 1],
                ['L' => 3, 'P' => 1],
                ['L' => 4, 'P' => 6]
            ],
            'D' => [
                ['L' => 1, 'P' => 2],
                ['L' => 3, 'P' => 2],
                ['L' => 0, 'P' => 1],
                ['L' => 3, 'P' => 1],
                ['L' => 4, 'P' => 6]
            ],
            'E' => [
                ['L' => 1, 'P' => 2],
                ['L' => 3, 'P' => 2],
                ['L' => 0, 'P' => 1],
                ['L' => 3, 'P' => 1],
                ['L' => 4, 'P' => 6]
            ],
            'F' => [
                'N' => [
                    ['L' => 1, 'P' => 2],
                    ['L' => 3, 'P' => 2],
                    ['L' => 0, 'P' => 1],
                    ['L' => 3, 'P' => 1],
                    ['L' => 4, 'P' => 6]
                ],
                'T' => [
                    ['L' => 1, 'P' => 2],
                    ['L' => 3, 'P' => 2],
                    ['L' => 0, 'P' => 1],
                    ['L' => 3, 'P' => 1],
                    ['L' => 4, 'P' => 6]
                ],
                'O' => [
                    ['L' => 1, 'P' => 2],
                    ['L' => 3, 'P' => 2],
                    ['L' => 0, 'P' => 1],
                    ['L' => 3, 'P' => 1],
                    ['L' => 4, 'P' => 6]
                ],
                'B' => [
                    ['L' => 1, 'P' => 2],
                    ['L' => 3, 'P' => 2],
                    ['L' => 0, 'P' => 1],
                    ['L' => 3, 'P' => 1],
                    ['L' => 4, 'P' => 6]
                ]
            ],
            'G' => [
                ['L' => 1, 'P' => 2],
                ['L' => 3, 'P' => 2],
                ['L' => 0, 'P' => 1],
                ['L' => 3, 'P' => 1],
                ['L' => 4, 'P' => 6]
            ],
            'H' => [
                ['L' => 1, 'P' => 2],
                ['L' => 3, 'P' => 2],
                ['L' => 0, 'P' => 1],
                ['L' => 3, 'P' => 1],
                ['L' => 4, 'P' => 6]
            ],
            'I' => [
                ['L' => 1, 'P' => 2],
                ['L' => 3, 'P' => 2],
                ['L' => 0, 'P' => 1],
                ['L' => 3, 'P' => 1],
                ['L' => 4, 'P' => 6]
            ],
            'J' => [
                ['L' => 1, 'P' => 2],
                ['L' => 3, 'P' => 2],
                ['L' => 0, 'P' => 1],
                ['L' => 3, 'P' => 1],
                ['L' => 4, 'P' => 6]
            ]
        );
        
        $this->set_code(200);
        $this->set_data('data_laporan', $data_laporan);
        $this->return_json();
    }
}    