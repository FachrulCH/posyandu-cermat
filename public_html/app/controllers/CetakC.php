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

    function cetak($url, $nama) {
        include_once "lib/dompdf/autoload.inc.php";
        $html = file_get_contents($url);
        $dompdf = new \Dompdf\Dompdf();
//        $dompdf->load_html($html);
        $dompdf->loadHtml(html_entity_decode($html));
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();
        $dompdf->stream('laporan_' . $nama . '.pdf');
    }

    function contoh($f3) {
        $f3->set('namanya', "ALUL");
        echo \Template::instance()->render('templates/cetakan-test.html');
    }

    function reportpenimbangan($f3) {
        $get = $f3->get('GET');
        $id_anak = $get['id'];
        $this->cetak($f3->get('BASE_URL') . "cetak/halpenimbangan?id=" . $id_anak, $id_anak);
    }

    function halpenimbangan($f3) {
        $f3->set('namanya', "ALUL");
        $get = $f3->get('GET');
        $id_anak = $get['id'];

        $anak = new \models\AnakM();
        $profil_anak = $anak->get_profile_anak($id_anak);
        $riwayat = $anak->get_riwayat_pemeriksaan($profil_anak['id'], $profil_anak['posyandu_id']);
//        print_r($profil_anak);
//        die();
        $f3->set('profil_anak', $profil_anak);
        $f3->set('tgl_lahir', $this->DateToIndo($profil_anak['tanggal_lahir']));
        $f3->set('riwayat', $riwayat);
        $f3->set('tabel2', $this->generate_riwayat($riwayat));
        echo \Template::instance()->render('templates/cetakan-penimbangan.html');
    }

    function DateToIndo($date) { // fungsi atau method untuk mengubah tanggal ke format indonesia
        // variabel BulanIndo merupakan variabel array yang menyimpan nama-nama bulan
        $BulanIndo = array("Januari", "Februari", "Maret",
            "April", "Mei", "Juni",
            "Juli", "Agustus", "September",
            "Oktober", "November", "Desember");

        $tahun = substr($date, 0, 4); // memisahkan format tahun menggunakan substring
        $bulan = substr($date, 5, 2); // memisahkan format bulan menggunakan substring
        $tgl = substr($date, 8, 2); // memisahkan format tanggal menggunakan substring

        $result = $tgl . " " . $BulanIndo[(int) $bulan - 1] . " " . $tahun;
        return($result);
    }

    function generate_riwayat($riwayat) {
        $tr = "";
        for ($index = 0; $index < 15; $index++) {
            $data = $riwayat[$index];
            if (empty($data) || empty($data['tanggal'])) {
                $tr .= '<tr><td></td><td></td><td></td><td></td><td></td></tr>';
            } else {
                $tr .= "<tr>
                    <td>" . $this->DateToIndo($data['tanggal']) . "</td>
                    <td>" . $this->hitung_bulan($data['tanggal_lahir'], $data['tanggal']) . "</td>
                    <td>" . $data['berat'] . "</td>
                    <td>H</td>
                    <td>N</td></tr>";
            }
        }
        return $tr;
    }

    function hitung_bulan($tgl_lahir, $tgl_itu) {
        $d1 = new \DateTime($tgl_lahir);
        $d2 = new \DateTime($tgl_itu);
//        return $d1->diff($d2)->m;
        $diff = $d1->diff($d2);
        $months = $diff->y * 12 + $diff->m + $diff->d / 30;
        return (int) round($months);
    }

}
