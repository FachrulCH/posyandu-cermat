<?php

/**
 * Created by PhpStorm.
 * User: kurawall
 * Date: 24/04/16
 * Time: 14:39
 */

namespace controllers;

class KaderC {

    public function daftar() {
        $f3 = \Base::instance();
        $f3->set('breadcumb', ["Master" => $f3->get('SESSION.LastPageURL'), "Kader" => $f3->get('SESSION.LastPageURL')]);
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
        $f3->set('pageJS', ['daftar-kader']);

        $f3->set('content', 'pg-daftar-kader.html');

        $posyandu = new \models\PosyanduM();
        $kader = new \models\KaderM();
        $f3->set('list_posyandu', $posyandu->getAll());
        $f3->set('list_kader', $kader->getAll());

        echo \Template::instance()->render('templates/layout.html');
    }

    public function simpan($f3) {
        $post = $f3->get('POST');

        //print_r($post);

        $kader = new \models\KaderM();
        $kader->simpan($post);
        $f3->reroute('/kader/daftar');
//        var_dump($simpan);
    }

    public function hapus($f3) {
        $post = $f3->get('POST');
        $kader = new \models\KaderM();
        $kader->hapus($post['deleteid']);
        $f3->reroute('/kader/daftar');
    }

    public function login($f3) {
        $post = $f3->get('POST');
        print_r($post);
        echo 'login<hr/>';
        $kader = new \models\KaderM();
        $login = $kader->login($post['logid'], $post['logpass']);

        if (!empty($login->id)) {
            $f3->set('SESSION.logedin', true);
            $f3->set('SESSION.prov_id', $login->prov_id);
            $f3->set('SESSION.kab_id', $login->kab_id);
            $f3->set('SESSION.kec_id', $login->kec_id);
            $f3->set('SESSION.user_id', $login->id);
            $f3->set('SESSION.name', $login->nama);
            if ($login->id == 'admin') {
                $f3->set('SESSION.kel_id', '*');
            }else{
                $f3->set('SESSION.kel_id', $login->kel_id);
            }
            $f3->set('SESSION.posyandu_id', $login->posyandu_id);
            $f3->reroute('/');
        } else {
            $f3->reroute('/login.html#gagal');
        }
    }

    public function logout($f3) {
        $f3->set('SESSION', false);
        session_destroy();
        $f3->reroute('/login.html');
    }

}
