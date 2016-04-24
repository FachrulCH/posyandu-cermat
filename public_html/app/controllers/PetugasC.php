<?php
/**
 * Created by PhpStorm.
 * User: kurawall
 * Date: 24/04/16
 * Time: 14:39
 */

namespace controllers;


class PetugasC
{
    function dataPetugas()
    {
        $f3 = \Base::instance();
        $f3->set('breadcumb', ["Petugas" => $f3->get('SESSION.LastPageURL')]);
        $f3->set('loadCSS', [
            'custom'
        ]);
        $f3->set('loadJS', [
            'jquery.flot',
            'jquery.nicescroll',
            'scripts',
            'site'
        ]);
        $f3->set('customJS', []);
        $f3->set('para_petugas', [
            [
                "id" => 1,
                "nama" => "asep",
                "foto" => "ga.jpg"
            ],
            [
                "id" => 2,
                "nama" => "Sunandar",
                "foto" => "ga1.jpg"
            ],
            [
                "id" => 3,
                "nama" => "Sunarya",
                "foto" => "ga2.jpg"
            ],
            [
                "id" => 4,
                "nama" => "Unyil",
                "foto" => "ga3.jpg"
            ],
            [
                "id" => 5,
                "nama" => "Usro",
                "foto" => "ga4.jpg"
            ],
            [
                "id" => 6,
                "nama" => "Komo",
                "foto" => "ga5.jpg"
            ],
            [
                "id" => 7,
                "nama" => "Sapi",
                "foto" => "ga6.jpg"
            ],
            [
                "id" => 8,
                "nama" => "Kambing",
                "foto" => "ga7.jpg"
            ],
            [
                "id" => 9,
                "nama" => "Kebo",
                "foto" => "ga8.jpg"
            ],
            [
                "id" => 10,
                "nama" => "Harimau",
                "foto" => "ga4.jpg"
            ]
        ]);


        $f3->set('content', 'pg-daftar-petugas.html');
        echo \Template::instance()->render('templates/layout.html');
    }
}