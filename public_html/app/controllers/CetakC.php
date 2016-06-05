<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace controllers;

/**
 * Description of CetakC
 *
 * @author kurawall
 */
class CetakC {
    function cetak($url) {
        include_once "lib/dompdf/autoload.inc.php";
        $nama = "classcetak";
        $html = file_get_contents($url);
        $dompdf = new \Dompdf\Dompdf();
//        $dompdf->load_html($html);
        $dompdf->loadHtml(html_entity_decode($html));
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();
        $dompdf->stream('laporan_' . $nama . '.pdf');
    }
    
    function contoh($f3){
        $f3->set('namanya', "ALUL");
        echo \Template::instance()->render('templates/cetakan-test.html');
    }
    
    function reportpenimbangan($f3){
        $get = $f3->get('GET');
        $id_anak = $get['id'];
        $this->cetak($f3->get('BASE_URL')."cetak/halpenimbangan?id=".$id_anak);
    }
    
    function halpenimbangan($f3){
        $f3->set('namanya', "ALUL");
        $get = $f3->get('GET');
        $id_anak = $get['id'];
        
        $anak = new \models\AnakM();
        $profil_anak = $anak->get_profile_anak($id_anak);
//        print_r($profil_anak);
//        die();
        $f3->set('profil_anak', $profil_anak);
        echo \Template::instance()->render('templates/cetakan-penimbangan.html');
    }
}
