<?php
namespace controllers;
class PosyanduC {
    function index(){
        $f3 = \Base::instance();
        $f3->set('breadcumb', ["Posyandu" => $f3->get('SESSION.LastPageURL')]);
        $f3->set('loadCSS', [
            'custom'
        ]);
        $f3->set('loadJS', [
            'jquery.flot',
            'jquery.nicescroll',
            'scripts',
            'site',
            'localforage.min',
            'datatables.min',
            'locationpicker.jquery.min'
        ]);
        $f3->set('customJS', []);
        $f3->set('vendorJS', []);
        
        $f3->set('content', 'pg-daftar-petugas.html');
        echo \Template::instance()->render('templates/layout.html');
    }
}