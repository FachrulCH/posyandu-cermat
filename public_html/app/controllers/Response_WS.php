<?php

namespace controllers;
class Response_WS
{
    /*
     * Status 00=success 01=error
     * 
     */

    private $response_code = "00";
    private $response_desc = "";
    private $response_data = [];
    private $key = "londria";

    public function set_code($code)
    {
        $this->response_code = $code;
    }

    public function set_msg($msg)
    {
        $this->response_desc = $msg;
    }

    public function set_data($name, $data)
    {
        $this->response_data = [$name => $data];
    }

    public function return_json()
    {
        header('Content-type:application/json;charset=utf-8');
        $data = ["response_code" => $this->response_code,
                "response_msg" => $this->response_desc,
                "response_data" => $this->response_data];
        echo json_encode($data);
    }

    public function diencode($data)
    {
        //return trim(base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, $this->key, $text, MCRYPT_MODE_ECB, mcrypt_create_iv(mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_ECB), MCRYPT_RAND))));
        return rtrim(strtr(base64_encode($this->key . $data), '+/', '-_'), '=');
    }

    public function didecode($data)
    {
        //return trim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, $this->key, base64_decode($text), MCRYPT_MODE_ECB, mcrypt_create_iv(mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_ECB), MCRYPT_RAND)));
        return str_replace($this->key, "", base64_decode(str_pad(strtr($data, '-_', '+/'), strlen($data) % 4, '=', STR_PAD_RIGHT)));
    }

}
