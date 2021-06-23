# EFRDS_Cloud

Netdisk for EFRDS

## NOTICE

For better reference, all materials below would be written in Chinese.

# EFRDS网盘系统

这是EFRDS网盘系统，原为可独立使用的ATSAST源代码的一部分，现在为了摸实验做了些改动（看下面功能最后两行），想拿来当网盘用的可以回滚。

forked from ZsgsDesign/ATSAST_Cloud, 但是虽然明明这个人完全没写东西却在别人名下感觉我像是白打工所以没有用fork而是自己传了一份

## 安装

先安装http服务器（apache，IIS，nginx之类的）、php、mysql以及必须的插件

新建数据库（默认`efrdsdisk`，可在下面的配置中修改，并导入项目根目录下的efrdsdisk.sql（默认用户空间1G，要改在这个文件里改）

新建/protected/model/CONFIG.php，插入内容如下

```php
<?php

class CONFIG {

	public static function GET($KEY)
	{
		$config=array(
			"EFRDS_MYSQL_HOST"=>"localhost",
			"EFRDS_MYSQL_PORT"=>"3306",
			"EFRDS_MYSQL_USER"=>"root",
			"EFRDS_MYSQL_DATABASE"=>"efrdsdisk",
			"EFRDS_MYSQL_PASSWORD"=>"root",

			"EFRDS_CDN"=>"/static", // 或者 https://cdn.xxx.com 之类的，末尾不带/
			"EFRDS_SALT"=>"@EFRDS+1s",
			"EFRDS_DOMAIN"=>"",

			"CLOUD_FILE_DIRECTORY"=>"/home/cloud_objs"
		);
		return $config[$KEY];
	}
	

}
```

修改/protected/config.php中的域名信息

## 部署地址

https://1.15.222.218

懒得搞域名了 ~~别日 phpinfo都没删~~

## 功能

预期实现的基本功能包括但不限于：

1. 注册登录；
1. 文件上传下载；
1. 上传进度显示；
1. 文件以及文件夹的新建删除；
1. 文件回收站的清空和恢复；
1. ~~文件分享；~~
1. ~~加密/时限分享；// 哦 我根本没写完啊 早忘了~~
1. 当前文件夹搜索和当前网盘全局搜索；
1. 急速快传；
1. 同名处理等；
1. 一般网盘的其他基础功能（文件预览因为实验要做加解密所以禁用了）；
1. 上传前加密，上传后解密 ~~我觉得这是个完全多此一举低效无用的功能，加密了还做什么重复文件检测。而且密钥跟随用户（出题人说的），那么说明密钥要存服务器，那么能拿到shell的话这加密不还是跟脱了裤子一样，拿不到shell也拿不到加密的文件，完全就是为了加需求而加需求~~。

## 框架

后端框架：`FlashPHP`

前端库：`Bootstrap Material Design`

数据库：`MySQL`

基本语言：`PHP`、`JS`、`CSS`

## 其他注意事项

因原项目为ATSAST源码一部分，项目协议转为AGPL。

虽然我想换wtfpl，又想了想也不全是我写的我也不能乱改，那就放着不管吧
