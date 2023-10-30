<?php

namespace App\ServiceEnc;

class Enc
{
    public function encriptar($valor)
    {
        return bin2hex(openssl_encrypt($valor, 'aes-256-cbc', 'NKoYDwNSVrCmunjPd2HGQfdN0GbOCxlG', OPENSSL_RAW_DATA, '29Eu55ynrBtCnq2o'));
    }


    public function desencriptar($valor_encrip)
    {
        if (strlen($valor_encrip) % 2 != 0) {
            return null;
        }

        return openssl_decrypt(hex2bin($valor_encrip), 'aes-256-cbc', 'NKoYDwNSVrCmunjPd2HGQfdN0GbOCxlG', OPENSSL_RAW_DATA, '29Eu55ynrBtCnq2o');
    }
}
