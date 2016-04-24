<?php
/**
 * Created by PhpStorm.
 * User: kurawall
 * Date: 24/04/16
 * Time: 13:55
 */

namespace controllers;


class Admin
{
    function Dashboard()
    {
        $f3 = \Base::instance();
        $f3->set('breadcumb', ["Dashboard" => $f3->get("BASE_URL")]);
        $f3->set('loadCSS',[
            'graph',
            'clndr',
            'custom'
        ]);
        $f3->set('loadJS', [
            'Chart',
            'pie-chart',
            'jquery.flot',
            'jquery.nicescroll',
            'scripts',
            'underscore-min',
            'moment-2.2.1',
            'clndr',
            'site'
        ]);
        $f3->set('pageJS', ['dashboard']);
        $f3->set('content', 'dashboard.html');
        echo \Template::instance()->render('templates/layout.html');
    }

}