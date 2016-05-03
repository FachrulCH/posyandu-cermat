<?php
/**
 * Created by PhpStorm.
 * User: kurawall
 * Date: 22/04/16
 * Time: 0:12
 */

namespace controllers;


class IbuC extends Response_WS
{
    function getAll(){
        $f3 = \Base::instance();
        $f3->set('breadcumb', ["Pendaftaran" => $f3->get('SESSION.LastPageURL'), "Daftar Ibu" => $f3->get('SESSION.LastPageURL')]);
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
        
        $f3->set('content', 'pg-daftar-ibu.html');
        echo \Template::instance()->render('templates/layout.html');
    }
}