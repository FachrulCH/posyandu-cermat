<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace controllers;

/**
 * Description of Debug
 *
 * @author fachrul.choliluddin
 */
class Debug {

    //put your code here
    public function koneksi($f3) {
        $ldr = new \controllers\Londria;
//        var_dump($ldr->didecode('bG9uZHJpYTIx'));
//        echo '<pre>';
//        print_r($f3);

        $post = $f3->get('POST');
        $data = $f3->scrub($post);
        $header = $f3->get("HEADERS");
        $dataHeader = $f3->scrub($header);
        $user_id = $ldr->didecode($dataHeader['Id']);
        echo "aslinya: " . $dataHeader['Id'];
        echo "<br/>useridny: " . $user_id;

        print_r($dataHeader);

        echo '<hr/>';
        print_r($data);
    }

    function getprov() {
        $p = new \models\ProvinsiM();
        $data = $p->get_all();
        echo "Jumlah: " . count($data);
        echo "<pre>";
//        print_r($data);

        foreach ($data as $d) {
            print_r($d->cast());
            echo"<br/>";
        }
    }

    function test($f3) {
        echo "ini bisa";
    }

    function anak($f3, $params) {
        echo "hai <pre>";
        print_r($params);
    }

    function listpost($f3, $params) {
        //print_r($params);
        $posyandu = new \models\PosyanduM();
        $id_kel = 1101012001;
        $data = $posyandu->listPosyandu($id_kel);
        echo '<pre>';
        print_r($data);
    }

    function periode($f3) {
        echo "<pre>";
        $periode = new \models\PeriodeM();
        $start = $periode->get_by_posyandu('PSY1605');
        print_r($start);
    }

    function periksa($f3) {
        echo "<pre>";
        $anak = new \models\AnakM();
        $data = $anak->pemeriksaan(1);
        print_r($data);
    }

    function posyanduibu($f3) {
        echo "<pre>";
        $ibu = new \models\IbuM();
        $data = $ibu->getPosyandu('IBU1605');
        print_r($data);
    }

    function riwayatanak($f3) {
        echo "<pre>";
        $anak = new \models\AnakM();
        $data = $anak->get_riwayat_pemeriksaan('ANK1607', 'PSY1605');
        print_r($data);
        //echo count($data);
    }

    function cetak($f3) {
        $cetak = new \controllers\CetakC();
        $cetak->cetak();
//        include_once "lib/dompdf/autoload.inc.php";
//        $nama = "Cihui";
//        $alamat = "report";
//
////        $html = '<html><body>' .
////                '<h1>Halo, ' . $nama . ' berikut alamat Anda : </h1>' .
////                '<p>Alamat lengkap Anda adalah : ' . $alamat . '</p>' .
////                '</body></html>';
////                
////        use Dompdf\Dompdf;
//        $html = file_get_contents("http://localhost/PRJ/posyandu/public_html/debug/cetakantest");
//        $dompdf = new \Dompdf\Dompdf();
////        $dompdf->load_html($html);
//        $dompdf->loadHtml(html_entity_decode($html));
//        $dompdf->setPaper('A4', 'portrait');
//        $dompdf->render();
//        $dompdf->stream('laporan_' . $nama . '.pdf');
    }
    
    function contohcetak($f3){
        echo '<html><body>' .
                '<h1>Ini adalah contoh halaman cetakan</h1>' .
                '<p>Alamat lengkap Anda adalah</p>' .
                '</body></html>';
    }
    
    function cetakantest($f3){
        $f3->set('namanya', "ALUL");
        echo \Template::instance()->render('templates/cetakan-test.html');
    }

}
