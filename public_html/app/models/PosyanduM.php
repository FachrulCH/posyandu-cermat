<?php
/**
 * Created by PhpStorm.
 * User: kurawall
 * Date: 17/04/16
 * Time: 12:29
 */

namespace models;


class KabupatenM extends \DB\SQL\Mapper
{
    function __construct()
    {
        $f3 = \Base::instance();
        $db = $f3->get('DB');
        parent::__construct($db, 'tb_kabupaten');
    }

    function getProfile($id)
    {
        
    }
}