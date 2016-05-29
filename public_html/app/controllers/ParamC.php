<?php

/**
 * Created by PhpStorm.
 * User: kurawall
 * Date: 22/04/16
 * Time: 0:12
 */

namespace controllers;

class ParamC extends Response_WS {

    function imunvit() {
        $f3 = \Base::instance();
        $f3->set('breadcumb', ["Master" => $f3->get('SESSION.LastPageURL'), "Kelola Imunisasi & Vitamin" => $f3->get('SESSION.LastPageURL')]);
        $f3->set('loadCSS', [
            'custom'
        ]);

        $f3->set('headJS', []);
        $f3->set('loadJS', [
            'jquery.flot',
            'jquery.nicescroll',
            'localforage.min',
            'scripts',
            'locationpicker.jquery.min'
        ]);
        $f3->set('pageJS', []);

        $f3->set('content', 'pg-daftar-vit.html');
        echo \Template::instance()->render('templates/layout.html');
    }

    function penyuluhan() {
        $f3 = \Base::instance();
        $f3->set('breadcumb', ["Master" => $f3->get('SESSION.LastPageURL'), "Kelola Penyuluhan" => $f3->get('SESSION.LastPageURL')]);
        $f3->set('loadCSS', [
            'custom',
            'trumbowyg.min'
        ]);

        $f3->set('headJS', []);
        $f3->set('loadJS', [
            'jquery.flot',
            'jquery.nicescroll',
            'localforage.min',
            'scripts',
            'locationpicker.jquery.min',
            'trumbowyg.min'
        ]);
        $f3->set('pageJS', ['daftar-penyuluhan']);

        $f3->set('content', 'pg-daftar-penyuluhan.html');
        echo \Template::instance()->render('templates/layout.html');
    }

    function lihatPenyuluhan() {
        $f3 = \Base::instance();
        $f3->set('breadcumb', ["Master" => $f3->get('SESSION.LastPageURL'), "Kelola Penyuluhan" => $f3->get('SESSION.LastPageURL')]);
        $f3->set('loadCSS', [
            'custom'
        ]);

        $f3->set('headJS', []);
        $f3->set('loadJS', [
            'jquery.flot',
            'jquery.nicescroll',
            'localforage.min',
            'scripts',
            'locationpicker.jquery.min'
        ]);
        $f3->set('pageJS', ['']);

        $f3->set('content', 'pg-layanan-penyuluhan.html');
        echo \Template::instance()->render('templates/layout.html');
    }
    
    function acaraKegiatan() {
        $f3 = \Base::instance();
        $f3->set('breadcumb', ["Master" => $f3->get('SESSION.LastPageURL'), "Kelola Acara" => $f3->get('SESSION.LastPageURL')]);
        $f3->set('loadCSS', [
            'custom'
        ]);

        $f3->set('headJS', []);
        $f3->set('loadJS', [
            'jquery.flot',
            'jquery.nicescroll',
            'localforage.min',
            'scripts',
            'locationpicker.jquery.min'
        ]);
        $f3->set('pageJS', ['']);

        $f3->set('content', 'pg-daftar-acara.html');
        echo \Template::instance()->render('templates/layout.html');
    }

}
