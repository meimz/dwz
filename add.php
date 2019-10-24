<?php
/**
 * Created by PhpStorm.
 * User: mrcong
 * Date: 2019-10-24
 * Time: 14:48
 */
include 'common.php';
$url=$_POST['url'];
if(!filter_var($url,FILTER_VALIDATE_URL)){
    exit(json_encode(['err'=>1,'msg'=>'url地址不正确','data'=>['code'=>'','url'=>'url地址不正确']]));
}
$r=getByUrl($url);
if($r){
    exit(json_encode(['err'=>0,'msg'=>'新增成功','data'=>['code'=>$r['code'],'url'=>$r['url']]]));
}else{
    // 动态调整长度
    $nowLength=3;
    $code=randStr($nowLength);

    $isExit=getByCode($code);
    $index=0;
    while ($isExit){
        if($index>3){
            $nowLength++;
            $index=0;
        }
        $code=randStr($nowLength);
        $isExit=getByCode($code);
        $index++;
    }

    $stm=$db->prepare('insert into  urls ( code , url , postip, created_at ) values( :code , :url , :postip , :created_at);');
    $stm->execute([':url'=>$url,':code'=>$code,'postip'=>getIp(),'created_at'=>date("Y-m-d H:i:s")]);
//    $db->commit();
    exit(json_encode(['err'=>0,'msg'=>'新增成功','data'=>['code'=>$code,'url'=>$url]]));
}