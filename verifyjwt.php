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
use Lcobucci\JWT\Parser;
use Lcobucci\JWT\ValidationData;

/**
    echo "<pre>";
    print_r(apache_request_headers());
    echo "</pre>";
*/

// get message
$message=trim($_POST['message']);
$name=trim($_POST['name']);
// get token from http header 'Authorization'

$tokenStr=apache_request_headers()['Authorization'];
$signer= new Sha256();
$signerKey='testsignature';

try{
    $token=(new Parser())->parse((string)$tokenStr);
    $token->getHeaders();
    $token->getClaims();
    if(!$token->verify($signer,$signerKey)){
        $resData=[
            'code'=>1,
            'status'=>'fail',
            'msg'=>'signature false',
        ];
        return json()->data($resData);
    }
    $validata=new ValidationData();
    $validata->setIssuer('http://tp5.ptbird-ubuntu');
    $validata->setAudience('http://tp5.ptbird-ubuntu');
    $validata->setId($name);
    if(!$token->validate($validata)){
        $resData=[
            'code'=>1,
            'status'=>'fail',
            'msg'=>'validation fail',
        ];
       echo json_encode($resData);
       return ;
    }
    $username=$token->getClaim('username');
    if($username!=$name){
        $resData=[
            'code'=>1,
            'status'=>'fail',
            'msg'=>'name is not the same to username in token',
        ];
        echo json_encode($resData);
        return ;
    }
    // true token
    $resData=[
        'code'=>0,
        'status'=>'ok',
        'msg'=>'token verify true.',
        'data'=>['message'=>'Hello '.$name.' and your token is true.']
    ];
    echo json_encode($resData);
    return ;
}catch (\Exception $e){
    $resData=[
        'code'=>1,
        'status'=>'fail',
        'msg'=>$e->getMessage(),
    ];
    echo json_encode($resData);
    return ;
}
