<?php
/**
 * Author: root
 * Date  : 17-4-3
 * time  : 下午2:31
 * Site  : www.ptbird.cn
 * There I am , in the world more exciting!
 */
/**
 *  config info of jwt
 */
// composer require Lcobucci\JWT
// github:https://github.com/lcobucci/jwt/blob/3.2/README.md

use Lcobucci\JWT;
// Select the encryption method
$signer= new JWT\Signer\Hmac\Sha256();
// create the encryption key
$signerKey='testsignature';



