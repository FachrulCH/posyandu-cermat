<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace controllers;

/**
 * Description of Debug
 *
 * @author fachrul.choliluddin
 */
class Debug {

    //put your code here
    public function koneksi($f3)
    {
        $ldr = new \controllers\Londria;
//        var_dump($ldr->didecode('bG9uZHJpYTIx'));
//        echo '<pre>';
//        print_r($f3);
        
        $post = $f3->get('POST');
        $data = $f3->scrub($post);
        $header = $f3->get("HEADERS");
        $dataHeader = $f3->scrub($header);
        $user_id = $ldr->didecode($dataHeader['Id']);
        echo "aslinya: ".$dataHeader['Id'];
        echo "<br/>useridny: ".$user_id;
        
        print_r($dataHeader);
        
        echo '<hr/>';
        print_r($data);
    }

    function getprov(){
        $p = new \models\ProvinsiM();
        $data = $p->get_all();
        echo "Jumlah: ".count($data);
        echo "<pre>";
//        print_r($data);

        foreach ($data as $d){
            print_r($d->cast());
            echo"<br/>";
        }
    }

    function test($f3){
        echo "ini bisa";
    }

    function anak($f3, $params){
        echo "hai <pre>";
        print_r($params);
    }

}
