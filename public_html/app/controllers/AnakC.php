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
    function getAll(){
        $f3 = \Base::instance();
        $f3->set('breadcumb', ["Pendaftaran" => $f3->get('SESSION.LastPageURL'), "Daftar Anak" => $f3->get('SESSION.LastPageURL')]);
        $f3->set('loadCSS', [
            'custom'
        ]);
        
        $f3->set('headJS', []);
        $f3->set('loadJS', [
            'jquery.flot',
            'jquery.nicescroll',
            'scripts',
            'site',
            'localforage.min',
            'datatables.min',
        ]);
        $f3->set('customJS', []);
        $f3->set('vendorJS', []);
        
        $f3->set('content', 'pg-daftar-anak.html');
        echo \Template::instance()->render('templates/layout.html');
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
        $f3->set('pageJS', []);
        
        $f3->set('content', 'pg-profile-anak.html');
        echo \Template::instance()->render('templates/layout.html');
    }
}