<?php
date_default_timezone_set('asia/jakarta');
$f3 = require('lib/base.php');

$f3->config('app/configurasi.ini');
$f3->config('app/routes.ini');

$f3->set('sekarang', date("Y-m-d H:i:s", time()));
$f3->set('DEBUG', 3);
$f3->set('DB', new DB\SQL("mysql:host=" . $f3->get('HOST') . ";port=" . $f3->get('PORT') . ";dbname=" . $f3->get('DATABASE'), $f3->get('USER'), $f3->get('PASWD')));
$f3->set('CACHE',true);
$f3->run();
