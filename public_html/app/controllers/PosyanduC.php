<?php
/**
 * Created by PhpStorm.
 * User: kurawall
 * Date: 22/04/16
 * Time: 0:12
 */

namespace controllers;


class PosyanduC extends Response_WS
{
    function getAll(){
        $f3 = \Base::instance();
        $f3->set('breadcumb', ["Pendaftaran" => $f3->get('SESSION.LastPageURL'), "Daftar Anak" => $f3->get('SESSION.LastPageURL')]);
        $f3->set('loadCSS', [
            'custom'
        ]);
        
        $f3->set('headJS', ['http://maps.google.com/maps/api/js?libraries=places']);
        $f3->set('loadJS', [
            'jquery.flot',
            'jquery.nicescroll',
            'scripts',
            'localforage.min',
            'datatables.min',
            'locationpicker.jquery.min'
        ]);
        $f3->set('pageJS', ['daftar-posyandu']);
        
        $f3->set('content', 'pg-daftar-posyandu.html');
        echo \Template::instance()->render('templates/layout.html');
    }
}