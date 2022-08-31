# Host: localhost  (Version 5.5.5-10.1.41-MariaDB)
# Date: 2022-04-09 09:05:13
# Generator: MySQL-Front 6.1  (Build 1.26)


#
# Structure for table "acl"
#

DROP TABLE IF EXISTS `acl`;
CREATE TABLE `acl` (
  `acl_id` int(11) NOT NULL AUTO_INCREMENT,
  `module_name` varchar(20) NOT NULL DEFAULT '' COMMENT '模块名',
  `controller_name` varchar(20) NOT NULL COMMENT '控制器名',
  `action_name` varchar(20) NOT NULL COMMENT '方法名',
  `acl_module` varchar(20) NOT NULL DEFAULT 'admin' COMMENT '模块英文名',
  `acl_controller` varchar(20) NOT NULL COMMENT '控制器英文名',
  `acl_action` varchar(20) NOT NULL COMMENT '方法英文名',
  `is_menu` tinyint(4) NOT NULL DEFAULT '0' COMMENT '是否是菜单项',
  `menu_sort` int(11) DEFAULT NULL COMMENT '菜单的排序，越小越在前面',
  PRIMARY KEY (`acl_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

#
# Data for table "acl"
#

INSERT INTO `acl` VALUES (4,'管理','文章管理','*','admin','article','*',1,0),(5,'管理','HTML生成','*','admin','html','*',1,0),(6,'管理','分类','*','admin','category','*',1,0),(7,'管理','后台首页','*','admin','main','*',0,0),(8,'管理','权限管理','*','admin','role','*',1,0),(9,'管理','用户','*','admin','user','*',1,0),(10,'管理','图片管理','*','admin','img','*',0,0),(11,'管理','模板','*','admin','template','*',0,0);

#
# Structure for table "article"
#

DROP TABLE IF EXISTS `article`;
CREATE TABLE `article` (
  `article_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL COMMENT '作者名',
  `category_id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL COMMENT '标题',
  `contents` text COMMENT '文章内容',
  `created` int(11) NOT NULL COMMENT '发布时间',
  `updated` int(11) NOT NULL COMMENT '更新时间',
  `page_view` bigint(20) NOT NULL DEFAULT '0' COMMENT '访问量',
  `template_id` int(11) DEFAULT NULL COMMENT '模板ID',
  PRIMARY KEY (`article_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

#
# Data for table "article"
#

INSERT INTO `article` VALUES (1,'admin',1,'helloJack','啊啊啊啊啊啊',1596263982,1596263982,7,0),(2,'admin',1,'啊啊啊啊','<img src=\"/upload/202008012212155218.jpg\" alt=\"\" /><img src=\"/upload/202008012213103590.jpg\" alt=\"\" />撒大大实打实',1596291141,1596291202,7,0);

#
# Structure for table "category"
#

DROP TABLE IF EXISTS `category`;
CREATE TABLE `category` (
  `category_id` int(11) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(50) NOT NULL COMMENT '分类名',
  `articles` int(11) NOT NULL DEFAULT '0' COMMENT '分类下文章数量',
  `template_id` int(11) DEFAULT NULL COMMENT '模板ID',
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

#
# Data for table "category"
#

INSERT INTO `category` VALUES (1,'作品',2,0);

#
# Structure for table "htmlmaker"
#

DROP TABLE IF EXISTS `htmlmaker`;
CREATE TABLE `htmlmaker` (
  `source_url` varchar(100) NOT NULL,
  `destination_url` varchar(100) NOT NULL,
  `update_job` varchar(20) NOT NULL,
  `is_made` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# Data for table "htmlmaker"
#


#
# Structure for table "img"
#

DROP TABLE IF EXISTS `img`;
CREATE TABLE `img` (
  `img_id` int(11) NOT NULL AUTO_INCREMENT,
  `article_id` int(11) NOT NULL,
  `upload_path` varchar(50) NOT NULL COMMENT '上传路径',
  `temp_article_id` char(13) DEFAULT NULL COMMENT '临时文章标识',
  `created_date` int(8) DEFAULT NULL COMMENT '创建日期，方便按日期删除',
  PRIMARY KEY (`img_id`,`article_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

#
# Data for table "img"
#

INSERT INTO `img` VALUES (1,0,'/upload/202008012211509412.jpg','5f2578148f660',20200801),(3,2,'/upload/202008012213103590.jpg','',20200801);

#
# Structure for table "product"
#

DROP TABLE IF EXISTS `product`;
CREATE TABLE `product` (
  `product_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `product_name` varchar(255) DEFAULT NULL,
  `product_img` varchar(255) DEFAULT NULL,
  `product_price` float(6,2) unsigned NOT NULL DEFAULT '0.00',
  PRIMARY KEY (`product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

#
# Data for table "product"
#

INSERT INTO `product` VALUES (1,'什锦便当','c_biandang.jpg',10.50),(2,'蛋炒饭','c_danchaofan.jpg',8.00),(3,'炒黄瓜','c_huanggua.jpg',5.60);

#
# Structure for table "role"
#

DROP TABLE IF EXISTS `role`;
CREATE TABLE `role` (
  `role_id` int(11) NOT NULL AUTO_INCREMENT,
  `rolename` varchar(20) DEFAULT NULL COMMENT '角色名',
  PRIMARY KEY (`role_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

#
# Data for table "role"
#

INSERT INTO `role` VALUES (1,'管理员'),(2,'用户');

#
# Structure for table "role2acl"
#

DROP TABLE IF EXISTS `role2acl`;
CREATE TABLE `role2acl` (
  `role2acl_id` int(11) NOT NULL AUTO_INCREMENT,
  `role_id` int(11) DEFAULT NULL,
  `acl_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`role2acl_id`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8;

#
# Data for table "role2acl"
#

INSERT INTO `role2acl` VALUES (29,1,4),(30,1,6),(31,1,5),(32,1,10),(33,1,7),(34,1,8),(35,1,11),(36,1,9);

#
# Structure for table "template"
#

DROP TABLE IF EXISTS `template`;
CREATE TABLE `template` (
  `template_id` int(11) NOT NULL AUTO_INCREMENT,
  `template_type` char(10) NOT NULL COMMENT '模板类型',
  `template_name` varchar(20) NOT NULL COMMENT '模板名',
  `filename` varchar(100) NOT NULL COMMENT '模板文件名',
  `created` int(11) NOT NULL,
  `updated` int(11) NOT NULL,
  `create_username` varchar(30) NOT NULL COMMENT '创建者',
  `update_username` varchar(30) NOT NULL COMMENT '修改者',
  PRIMARY KEY (`template_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# Data for table "template"
#


#
# Structure for table "trade"
#

DROP TABLE IF EXISTS `trade`;
CREATE TABLE `trade` (
  `trade_id` int(11) NOT NULL AUTO_INCREMENT,
  `deviceid` int(11) unsigned NOT NULL DEFAULT '0',
  `userid` int(11) unsigned NOT NULL DEFAULT '0',
  `productid` int(11) unsigned NOT NULL DEFAULT '0',
  `productweight` float(6,4) unsigned NOT NULL DEFAULT '0.0000',
  `ispay` enum('Y',' N') NOT NULL DEFAULT ' N',
  PRIMARY KEY (`trade_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

#
# Data for table "trade"
#

INSERT INTO `trade` VALUES (1,1,1,1,10.0000,' N'),(2,1,3,3,12.5000,' N'),(3,1,1,2,12.5000,' N'),(4,1,1,3,2.1235,' N'),(5,1,1,1,0.0000,' N'),(6,1,1,3,11.2300,' N'),(7,1,1,2,2.3600,' N'),(8,1,1,2,12.6000,' N');

#
# Structure for table "user"
#

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `userpass` varchar(50) NOT NULL,
  `salt` char(10) NOT NULL COMMENT '密码混淆码',
  `role_id` int(11) NOT NULL COMMENT '角色ID',
  `articles` int(11) DEFAULT NULL COMMENT '文章数',
  `created` int(11) DEFAULT NULL COMMENT '创建时间',
  `last_login` int(11) DEFAULT NULL COMMENT '上次登录时间',
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

#
# Data for table "user"
#

INSERT INTO `user` VALUES (1,'admin','f457188ab0766deec19fc0cfcad6707b','5a45d7c882',1,0,1514511569,1648904454),(2,'12345','202cb962ac59075b964b07152d234b70','62405fa8cc',0,NULL,NULL,NULL),(3,'54321','bdb3a2e133517737dcc66f2774844ba7','624060ab1b',0,NULL,NULL,1648481476),(4,'18252869566','c7b2fe623f20cd823118e6c8bb65138e','6245a8662d',0,NULL,NULL,NULL),(5,'18252869566','5ec49c35eff88b1b8049a02d453a9d02','6245a882c2',0,NULL,NULL,NULL),(6,'18252869561','25a1d2fa3881a0104b2497397cd58899','6245aae52f',0,NULL,NULL,NULL),(7,'18252869562','62b62ecf4ed31b84233aaa4a1d042e19','6245ac7b8c',0,NULL,NULL,NULL),(8,'18252869563','cb4563f2b4091a747df8e47d501ab84c','6245aeb85d',0,NULL,NULL,1648734035),(9,'18252869564','ba72f9b02eead8e8e69a6b4791502cba','6245af4ce3',0,NULL,NULL,NULL);
