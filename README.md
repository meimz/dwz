
第一步 修改 common.php 里面的用户名 密码 地址  
第二步 运行 install.php 进行安装  
第三步设置伪静态   
下面是ningx的设置方式  

location / {  
	try_files $uri $uri/ /index.php$is_args$query_string;  
}

安装完成 尽情体验吧。

使用请保留 m2a.co 链接谢谢  