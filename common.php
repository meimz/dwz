<?php
/**
 * Created by PhpStorm.
 * User: mrcong
 * Date: 2019-10-24
 * Time: 15:04
 */

$db = new PDO('mysql:host=localhost;dbname=数据库名;charset=utf8mb4', '用户名', '密码');

function getByUrl($url){
    global $db;
    $stm=$db->prepare('select * from urls where url = :url limit 0,1;');
    $stm->execute([':url'=>$url]);
    return $stm->fetch();
}
function getByCode($code){
    global $db;
    $stm=$db->prepare('select * from urls where code = :code limit 0,1;');
    $stm->execute([':code'=>$code]);
    return $stm->fetch();
}

function randStr($lenth){
    $chars    = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
    $password = '';
    for ($i = 0; $i < $lenth; $i++) {
        $password .= $chars[mt_rand(0, strlen($chars) - 1)];
    }
    return $password;
}

function getIp()
{
    if ($_SERVER["HTTP_CLIENT_IP"] && strcasecmp($_SERVER["HTTP_CLIENT_IP"], "unknown")) {
        $ip = $_SERVER["HTTP_CLIENT_IP"];
    } else {
        if ($_SERVER["HTTP_X_FORWARDED_FOR"] && strcasecmp($_SERVER["HTTP_X_FORWARDED_FOR"], "unknown")) {
            $ip = $_SERVER["HTTP_X_FORWARDED_FOR"];
        } else {
            if ($_SERVER["REMOTE_ADDR"] && strcasecmp($_SERVER["REMOTE_ADDR"], "unknown")) {
                $ip = $_SERVER["REMOTE_ADDR"];
            } else {
                if (isset ($_SERVER['REMOTE_ADDR']) && $_SERVER['REMOTE_ADDR'] && strcasecmp($_SERVER['REMOTE_ADDR'],
                        "unknown")
                ) {
                    $ip = $_SERVER['REMOTE_ADDR'];
                } else {
                    $ip = "unknown";
                }
            }
        }
    }
    return ($ip);
}