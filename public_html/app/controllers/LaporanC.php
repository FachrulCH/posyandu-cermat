<?php
namespace controllers;
class LaporanC {
    function penimbanganBalita($f3, $params){
        
        $f3->set('breadcumb', ["Laporan" => $f3->get('SESSION.LastPageURL'), "balita" => '#']);
        $f3->set('loadCSS', [
            'custom'
        ]);
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
    function penimbanganPosyandu($f3, $params){
        
        $f3->set('breadcumb', ["Laporan" => $f3->get('SESSION.LastPageURL'), "posyandu" => "#"]);
        $f3->set('loadCSS', [
            'custom'
        ]);
        $f3->set('loadJS', [
            'jquery.flot',
            'jquery.nicescroll',
            'moment-2.2.1',
            'localforage.min',
            'scripts'
        ]);
        $f3->set('pageJS', ['laporan-penimbangan-posyandu']);
        $f3->set('vendorJS', []);
        
        $anak = new \models\AnakM();
        
        $data_penimbangan = $anak->penimbangan();
        
        
        $f3->set('data_anak', $data_penimbangan);
        $f3->set('data_anak_json', json_encode($data_penimbangan));
        //echo '<pre>';
//        print_r($data_penimbangan);
//        die();
        $f3->set('content', 'pg-laporan-penimbangan.html');
        echo \Template::instance()->render('templates/layout.html');
    }
}