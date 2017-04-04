<?php
/**
 * Author: root
 * Date  : 17-4-3
 * time  : 下午2:31
 * Site  : www.ptbird.cn
 * There I am , in the world more exciting!
 */

/**
 * You should import class or interface of Lcobucci\JWT
 */

use Lcobucci\JWT\Builder;
use Lcobucci\JWT\Signer\Hmac\Sha256;

// Select the encryption method
    $signer= new Sha256();
// create the encryption key
    $signerKey='testsignature';
// get $name & $password
// demo name = postbird ; password = 123456
$name=trim($_POST['name']);
$password=trim($_POST['password']);
// check user with demo;
if($name!='postbird' || $password!='123456'){
    $resData=[
        'code'=>1,
        'status'=>'error',
        'msg'=>'Error username or password'
    ];
    // return the info .encode by json.
    echo json_encode($resData);
    return;
}
// If user's info is true.Create the token.
// composer require Lcobucci\JWT
// github:https://github.com/lcobucci/jwt/blob/3.2/README.md
$token=(new Builder())
    ->setIssuer('http://testjwt.ptbird.cn')
    ->setAudience('http://testjwt.ptbird.cn')
    ->setId($name,true) //
    ->setIssuedAt(time()) //
    ->setExpiration(time()+3600)//
    ->set('username',$name)//
    ->sign($signer,$signerKey) //
    ->getToken();
$token->getHeaders();
$token->getClaims();
$resData=[
    'code'=>0,
    'status'=>'ok',
    'msg'=>'Get Token Success.',
    'data'=>['token'=>(string)$token]
];
// return the info .encode by json.
echo json_encode($resData);
return;
