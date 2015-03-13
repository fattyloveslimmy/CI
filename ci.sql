/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50612
Source Host           : localhost:3306
Source Database       : ci

Target Server Type    : MYSQL
Target Server Version : 50612
File Encoding         : 65001

Date: 2015-03-13 18:28:37
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for cz_address
-- ----------------------------
DROP TABLE IF EXISTS `cz_address`;
CREATE TABLE `cz_address` (
  `address_id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '地址编号',
  `user_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '地址所属用户ID',
  `consignee` varchar(60) NOT NULL DEFAULT '' COMMENT '收货人姓名',
  `province` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '省份，保存是ID',
  `city` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '市',
  `district` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '区',
  `street` varchar(100) NOT NULL DEFAULT '' COMMENT '街道地址',
  `zipcode` varchar(10) NOT NULL DEFAULT '' COMMENT '邮政编码',
  `telephone` varchar(20) NOT NULL DEFAULT '' COMMENT '电话',
  `mobile` varchar(20) NOT NULL DEFAULT '' COMMENT '移动电话',
  PRIMARY KEY (`address_id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of cz_address
-- ----------------------------

-- ----------------------------
-- Table structure for cz_admin
-- ----------------------------
DROP TABLE IF EXISTS `cz_admin`;
CREATE TABLE `cz_admin` (
  `admin_id` smallint(5) unsigned NOT NULL AUTO_INCREMENT COMMENT '管理员编号',
  `admin_name` varchar(30) NOT NULL DEFAULT '' COMMENT '管理员名称',
  `password` char(32) NOT NULL DEFAULT '' COMMENT '管理员密码',
  `email` varchar(50) NOT NULL DEFAULT '' COMMENT '管理员邮箱',
  `add_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '添加时间',
  PRIMARY KEY (`admin_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of cz_admin
-- ----------------------------
INSERT INTO `cz_admin` VALUES ('1', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin@itcast.cn', '0');
INSERT INTO `cz_admin` VALUES ('2', 'admin', 'admin', 'admin@itcast.cn', '0');

-- ----------------------------
-- Table structure for cz_attribute
-- ----------------------------
DROP TABLE IF EXISTS `cz_attribute`;
CREATE TABLE `cz_attribute` (
  `attr_id` smallint(5) unsigned NOT NULL AUTO_INCREMENT COMMENT '商品属性ID',
  `attr_name` varchar(50) NOT NULL DEFAULT '' COMMENT '商品属性名称',
  `type_id` smallint(6) NOT NULL DEFAULT '0' COMMENT '商品属性所属类型ID',
  `attr_type` tinyint(4) NOT NULL DEFAULT '1' COMMENT '属性是否可选 0 为唯一，1为单选，2为多选',
  `attr_input_type` tinyint(4) NOT NULL DEFAULT '1' COMMENT '属性录入方式 0为手工录入，1为从列表中选择，2为文本域',
  `attr_value` text COMMENT '属性的值',
  `sort_order` tinyint(4) NOT NULL DEFAULT '50' COMMENT '属性排序依据',
  PRIMARY KEY (`attr_id`),
  KEY `type_id` (`type_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of cz_attribute
-- ----------------------------

-- ----------------------------
-- Table structure for cz_brand
-- ----------------------------
DROP TABLE IF EXISTS `cz_brand`;
CREATE TABLE `cz_brand` (
  `brand_id` smallint(5) unsigned NOT NULL AUTO_INCREMENT COMMENT '商品品牌ID',
  `brand_name` varchar(30) NOT NULL DEFAULT '' COMMENT '商品品牌名称',
  `brand_description` varchar(255) NOT NULL DEFAULT '' COMMENT '商品品牌描述',
  `url` varchar(100) NOT NULL DEFAULT '' COMMENT '商品品牌网址',
  `logo` varchar(50) NOT NULL DEFAULT '' COMMENT '品牌logo',
  `sort_order` tinyint(3) unsigned NOT NULL DEFAULT '50' COMMENT '商品品牌排序依据',
  `is_show` tinyint(4) NOT NULL DEFAULT '1' COMMENT '是否显示，默认显示',
  PRIMARY KEY (`brand_id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of cz_brand
-- ----------------------------
INSERT INTO `cz_brand` VALUES ('1', '诺基亚', '公司网站：http://www.nokia.com.cn/ 客服电话：...', 'http://www.nokia.com.cn/', '', '50', '1');
INSERT INTO `cz_brand` VALUES ('2', '摩托罗拉', '官方咨询电话：4008105050 售后网点：http://www.mo...', 'http://www.motorola.com.cn', '', '50', '1');
INSERT INTO `cz_brand` VALUES ('3', '多普达', '官方咨询电话：4008201668 售后网点：http://www.do...', 'http://www.dopod.com', '', '50', '1');
INSERT INTO `cz_brand` VALUES ('4', '飞利浦', '官方咨询电话：4008800008 售后网点：http://www.ph...', 'http://www.philips.com.cn', '', '50', '1');
INSERT INTO `cz_brand` VALUES ('5', '夏新', '官方咨询电话：4008875777 售后网点：http://www.am...', '	http://www.amobile.com.cn', '', '50', '1');
INSERT INTO `cz_brand` VALUES ('6', '三星', '官方咨询电话：8008105858 售后网点：http://cn.sam...', 'http://cn.samsungmobile.com', '', '50', '1');
INSERT INTO `cz_brand` VALUES ('7', '索爱', '官方咨询电话：4008100000 售后网点：http://www.so...', 'http://www.sonyericsson.com.cn', '', '50', '1');
INSERT INTO `cz_brand` VALUES ('8', 'LG', '官方咨询电话：4008199999 售后网点：http://www.lg...', 'http://cn.wowlg.com', '', '50', '1');
INSERT INTO `cz_brand` VALUES ('9', '联想', '官方咨询电话：4008188818 售后网点：http://www.le...', 'http://www.lenovomobile.com/', '', '50', '1');
INSERT INTO `cz_brand` VALUES ('10', '金立', '官方咨询电话：4007796666 售后网点：http://www.gi...', 'http://www.gionee.net', '', '50', '1');
INSERT INTO `cz_brand` VALUES ('11', '品牌10', '0', 'http://bbs.pcbeta.com/', '', '50', '0');
INSERT INTO `cz_brand` VALUES ('12', '品牌2', 'open189/sms/proxy', 'http://101.227.251.180:10001/open189/sms/proxy.php', '', '50', '1');

-- ----------------------------
-- Table structure for cz_cart
-- ----------------------------
DROP TABLE IF EXISTS `cz_cart`;
CREATE TABLE `cz_cart` (
  `cart_id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '购物车ID',
  `user_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '用户ID',
  `goods_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '商品ID',
  `goods_name` varchar(100) NOT NULL DEFAULT '' COMMENT '商品名称',
  `goods_img` varchar(50) NOT NULL DEFAULT '' COMMENT '商品图片',
  `goods_attr` varchar(255) NOT NULL DEFAULT '' COMMENT '商品属性',
  `goods_number` smallint(5) unsigned NOT NULL DEFAULT '1' COMMENT '商品数量',
  `market_price` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '市场价格',
  `goods_price` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '成交价格',
  `subtotal` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '小计',
  PRIMARY KEY (`cart_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of cz_cart
-- ----------------------------

-- ----------------------------
-- Table structure for cz_category
-- ----------------------------
DROP TABLE IF EXISTS `cz_category`;
CREATE TABLE `cz_category` (
  `cate_id` smallint(5) unsigned NOT NULL AUTO_INCREMENT COMMENT '商品类别ID',
  `cate_name` varchar(30) NOT NULL DEFAULT '' COMMENT '商品类别名称',
  `parent_id` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '商品类别父ID',
  `sort_order` int(10) NOT NULL DEFAULT '50' COMMENT '排序依据',
  `unit` varchar(15) NOT NULL DEFAULT '' COMMENT '单位',
  `is_show` tinyint(4) NOT NULL DEFAULT '1' COMMENT '是否显示，默认显示',
  `show_in_nav` tinyint(4) NOT NULL DEFAULT '0',
  `cate_recommend` varchar(20) NOT NULL DEFAULT '',
  `cate_description` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`cate_id`),
  KEY `pid` (`parent_id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of cz_category
-- ----------------------------
INSERT INTO `cz_category` VALUES ('1', '手机类型', '0', '50', '个', '1', '0', '', '                                                                                                                                                                        肾6哦~~~!                                                                                ');
INSERT INTO `cz_category` VALUES ('2', '充值卡', '0', '50', '个', '1', '0', '', '                                                                                                                                                                        肾6哦~~~!                                                                                ');
INSERT INTO `cz_category` VALUES ('3', '手机配件', '0', '50', '个', '1', '0', '', '                                                                                                                                                                        肾6哦~~~!                                                                                ');
INSERT INTO `cz_category` VALUES ('4', 'CDMA手机', '1', '50', '个', '1', '0', '', '                                                                                                                                                                        肾6哦~~~!                                                                                ');
INSERT INTO `cz_category` VALUES ('5', '3G手机', '1', '50', '个', '1', '0', '', '                                                                                                                                                                        肾6哦~~~!                                                                                ');
INSERT INTO `cz_category` VALUES ('6', 'iPhone 4s', '5', '50', '个', '1', '0', '', '                                                                                                                                                                                                                                                               ');
INSERT INTO `cz_category` VALUES ('7', 'iPhone6 Plus ', '5', '50', '个', '1', '0', '', '                                                                                                                                                                                                                                                          肾6哦~~');
INSERT INTO `cz_category` VALUES ('8', '联通手机充值卡', '2', '50', '个', '1', '0', '', '                                                                                                                                                                        肾6哦~~~!                                                                                ');
INSERT INTO `cz_category` VALUES ('9', '移动手机充值卡', '2', '50', '个', '1', '0', '', '                                                                                                                                                                        肾6哦~~~!                                                                                ');
INSERT INTO `cz_category` VALUES ('10', '耳机', '3', '50', '个', '1', '0', '', '                                                                                                                                                                        肾6哦~~~!                                                                                ');
INSERT INTO `cz_category` VALUES ('11', '电池', '3', '50', '个', '1', '0', '', '                                                                                                                                                                        肾6哦~~~!                                                                                ');

-- ----------------------------
-- Table structure for cz_galary
-- ----------------------------
DROP TABLE IF EXISTS `cz_galary`;
CREATE TABLE `cz_galary` (
  `img_id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '图片编号',
  `goods_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '商品ID',
  `img_url` varchar(50) NOT NULL DEFAULT '' COMMENT '图片URL',
  `thumb_url` varchar(50) NOT NULL DEFAULT '' COMMENT '缩略图URL',
  `img_desc` varchar(50) NOT NULL DEFAULT '' COMMENT '图片描述',
  PRIMARY KEY (`img_id`),
  KEY `goods_id` (`goods_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of cz_galary
-- ----------------------------

-- ----------------------------
-- Table structure for cz_goods
-- ----------------------------
DROP TABLE IF EXISTS `cz_goods`;
CREATE TABLE `cz_goods` (
  `goods_id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '商品ID',
  `goods_sn` varchar(30) NOT NULL DEFAULT '' COMMENT '商品货号',
  `goods_name` varchar(100) NOT NULL DEFAULT '' COMMENT '商品名称',
  `goods_brief` varchar(255) NOT NULL DEFAULT '' COMMENT '商品简单描述',
  `goods_desc` text COMMENT '商品详情',
  `cat_id` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '商品所属类别ID',
  `brand_id` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '商品所属品牌ID',
  `market_price` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '市场价',
  `shop_price` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '本店价格',
  `promote_price` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '促销价格',
  `promote_start_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '促销起始时间',
  `promote_end_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '促销截止时间',
  `goods_img` varchar(50) NOT NULL DEFAULT '' COMMENT '商品图片',
  `goods_thumb` varchar(50) NOT NULL DEFAULT '' COMMENT '商品缩略图',
  `goods_number` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '商品库存',
  `click_count` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '点击次数',
  `type_id` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '商品类型ID',
  `is_promote` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '是否促销，默认为0不促销',
  `is_best` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '是否精品,默认为0',
  `is_new` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '是否新品，默认为0',
  `is_hot` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '是否热卖,默认为0',
  `is_onsale` tinyint(3) unsigned NOT NULL DEFAULT '1' COMMENT '是否上架,默认为1',
  `add_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '添加时间',
  PRIMARY KEY (`goods_id`),
  KEY `cat_id` (`cat_id`),
  KEY `brand_id` (`brand_id`),
  KEY `type_id` (`type_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of cz_goods
-- ----------------------------

-- ----------------------------
-- Table structure for cz_goods_attr
-- ----------------------------
DROP TABLE IF EXISTS `cz_goods_attr`;
CREATE TABLE `cz_goods_attr` (
  `goods_attr_id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '编号ID',
  `goods_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '商品ID',
  `attr_id` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '属性ID',
  `attr_value` varchar(255) NOT NULL DEFAULT '' COMMENT '属性值',
  `attr_price` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '属性价格',
  PRIMARY KEY (`goods_attr_id`),
  KEY `goods_id` (`goods_id`),
  KEY `attr_id` (`attr_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of cz_goods_attr
-- ----------------------------

-- ----------------------------
-- Table structure for cz_goods_type
-- ----------------------------
DROP TABLE IF EXISTS `cz_goods_type`;
CREATE TABLE `cz_goods_type` (
  `type_id` smallint(5) unsigned NOT NULL AUTO_INCREMENT COMMENT '商品类型ID',
  `type_name` varchar(50) NOT NULL DEFAULT '' COMMENT '商品类型名称',
  PRIMARY KEY (`type_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of cz_goods_type
-- ----------------------------

-- ----------------------------
-- Table structure for cz_order
-- ----------------------------
DROP TABLE IF EXISTS `cz_order`;
CREATE TABLE `cz_order` (
  `order_id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '订单ID',
  `order_sn` varchar(30) NOT NULL DEFAULT '' COMMENT '订单号',
  `user_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '用户ID',
  `address_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '收货地址id',
  `order_status` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '订单状态 1 待付款 2 待发货 3 已发货 4 已完成',
  `postscripts` varchar(255) NOT NULL DEFAULT '' COMMENT '订单附言',
  `shipping_id` tinyint(4) NOT NULL DEFAULT '0' COMMENT '送货方式ID',
  `pay_id` tinyint(4) NOT NULL DEFAULT '0' COMMENT '支付方式ID',
  `goods_amount` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '商品总金额',
  `order_amount` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '订单总金额',
  `order_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '下单时间',
  PRIMARY KEY (`order_id`),
  KEY `user_id` (`user_id`),
  KEY `address_id` (`address_id`),
  KEY `pay_id` (`pay_id`),
  KEY `shipping_id` (`shipping_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of cz_order
-- ----------------------------

-- ----------------------------
-- Table structure for cz_order_goods
-- ----------------------------
DROP TABLE IF EXISTS `cz_order_goods`;
CREATE TABLE `cz_order_goods` (
  `rec_id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '编号',
  `order_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '订单ID',
  `goods_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '商品ID',
  `goods_name` varchar(100) NOT NULL DEFAULT '' COMMENT '商品名称',
  `goods_img` varchar(50) NOT NULL DEFAULT '' COMMENT '商品图片',
  `shop_price` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '商品价格',
  `goods_price` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '成交价格',
  `goods_number` smallint(5) unsigned NOT NULL DEFAULT '1' COMMENT '购买数量',
  `goods_attr` varchar(255) NOT NULL DEFAULT '' COMMENT '商品属性',
  `subtotal` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '商品小计',
  PRIMARY KEY (`rec_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of cz_order_goods
-- ----------------------------

-- ----------------------------
-- Table structure for cz_payment
-- ----------------------------
DROP TABLE IF EXISTS `cz_payment`;
CREATE TABLE `cz_payment` (
  `pay_id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT COMMENT '支付方式ID',
  `pay_name` varchar(30) NOT NULL DEFAULT '' COMMENT '支付方式名称',
  `pay_desc` varchar(255) NOT NULL DEFAULT '' COMMENT '支付方式描述',
  `enabled` tinyint(3) unsigned NOT NULL DEFAULT '1' COMMENT '是否启用，默认启用',
  PRIMARY KEY (`pay_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of cz_payment
-- ----------------------------

-- ----------------------------
-- Table structure for cz_region
-- ----------------------------
DROP TABLE IF EXISTS `cz_region`;
CREATE TABLE `cz_region` (
  `region_id` smallint(5) unsigned NOT NULL AUTO_INCREMENT COMMENT '地区ID',
  `parent_id` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '父ID',
  `region_name` varchar(30) NOT NULL DEFAULT '' COMMENT '地区名称',
  `region_type` tinyint(3) unsigned NOT NULL DEFAULT '1' COMMENT '地区类型 1 省份 2 市 3 区(县)',
  PRIMARY KEY (`region_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of cz_region
-- ----------------------------

-- ----------------------------
-- Table structure for cz_shipping
-- ----------------------------
DROP TABLE IF EXISTS `cz_shipping`;
CREATE TABLE `cz_shipping` (
  `shipping_id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT COMMENT '编号',
  `shipping_name` varchar(30) NOT NULL DEFAULT '' COMMENT '送货方式名称',
  `shipping_desc` varchar(255) NOT NULL DEFAULT '' COMMENT '送货方式描述',
  `shipping_fee` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '送货费用',
  `enabled` tinyint(3) unsigned NOT NULL DEFAULT '1' COMMENT '是否启用，默认启用',
  PRIMARY KEY (`shipping_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of cz_shipping
-- ----------------------------

-- ----------------------------
-- Table structure for cz_user
-- ----------------------------
DROP TABLE IF EXISTS `cz_user`;
CREATE TABLE `cz_user` (
  `user_id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '用户编号',
  `user_name` varchar(50) NOT NULL DEFAULT '' COMMENT '用户名',
  `email` varchar(50) NOT NULL DEFAULT '' COMMENT '电子邮箱',
  `password` char(32) NOT NULL DEFAULT '' COMMENT '用户密码,md5加密',
  `reg_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '用户注册时间',
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of cz_user
-- ----------------------------

-- ----------------------------
-- Table structure for news
-- ----------------------------
DROP TABLE IF EXISTS `news`;
CREATE TABLE `news` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(50) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `content` text CHARACTER SET utf8 NOT NULL,
  `author` varchar(50) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `add_time` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of news
-- ----------------------------
INSERT INTO `news` VALUES ('1', '这是标题1', '正文1', '我是作者1', '1425368629');
INSERT INTO `news` VALUES ('2', '这是标题2', '正文2', '我是作者2', '1425368686');
INSERT INTO `news` VALUES ('3', '这是标题3', '正文3', '我是作者3', '1425368827');
