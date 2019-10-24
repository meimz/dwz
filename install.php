<?php
/**
 * Created by PhpStorm.
 * User: mrcong
 * Date: 2019-10-24
 * Time: 14:17
 */

include 'common.php';

if(!file_exists('install.lock')){
    $db->query('
    DROP TABLE IF EXISTS `urls`;
CREATE TABLE `urls` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT \'\' COMMENT \'标题\',
  `url` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT \'\' COMMENT \'标题\',
  `postip` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT \'\' COMMENT \'IP\',
  `jump_num` integer DEFAULT 0 ,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
    ');
    file_put_contents('install.lock','安装成功');
    echo '安装成功';
}else{
    echo '已安装请勿重复安装';
}
