<?php
/**
 * Created by PhpStorm.
 * User: mrcong
 * Date: 2019-10-24
 * Time: 13:58
 */

if(isset($_SERVER['REQUEST_URI'])){
    $jump=explode('/',$_SERVER['REQUEST_URI']);
    if(count($jump)>1){
        $needJump=explode('?',$jump[1])[0];
        include 'common.php';
        $r=getByCode($needJump);
        if($r){
            $stm=$db->prepare('update urls set jump_num = :jump_num where id = :id ;');
            $stm->execute([':id'=>$r['id'],'jump_num'=>$r['jump_num']+1]);
            header('Location:'.$r['url']);
            exit();
        }else{
            include 'create.php';
        }
    }
}else{
    include 'create.php';
}