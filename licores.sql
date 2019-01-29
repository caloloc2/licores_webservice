/*
Navicat MySQL Data Transfer

Source Server         : NIBEMI
Source Server Version : 50559
Source Host           : 34.223.215.43:3306
Source Database       : licores

Target Server Type    : MYSQL
Target Server Version : 50559
File Encoding         : 65001

Date: 2019-01-29 15:22:08
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for pedidos
-- ----------------------------
DROP TABLE IF EXISTS `pedidos`;
CREATE TABLE `pedidos` (
  `id_pedido` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) DEFAULT NULL,
  `direccion` varchar(255) DEFAULT NULL,
  `retira_local` tinyint(1) DEFAULT '0',
  `forma_pago` tinyint(1) DEFAULT '0',
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  `estado` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id_pedido`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of pedidos
-- ----------------------------

-- ----------------------------
-- Table structure for pedidos_detalle
-- ----------------------------
DROP TABLE IF EXISTS `pedidos_detalle`;
CREATE TABLE `pedidos_detalle` (
  `id_pedido_detalle` int(11) NOT NULL AUTO_INCREMENT,
  `id_pedido` int(11) NOT NULL,
  `id_item` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  PRIMARY KEY (`id_pedido_detalle`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of pedidos_detalle
-- ----------------------------

-- ----------------------------
-- Table structure for productos
-- ----------------------------
DROP TABLE IF EXISTS `productos`;
CREATE TABLE `productos` (
  `id_producto` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `valor` varchar(5) NOT NULL DEFAULT '0',
  `stock` varchar(5) NOT NULL DEFAULT '0',
  `imagen` varchar(255) NOT NULL DEFAULT '',
  `estado` tinyint(4) DEFAULT '0',
  PRIMARY KEY (`id_producto`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of productos
-- ----------------------------
INSERT INTO `productos` VALUES ('1', 'Ron Abuelo Anejo', '12.5', '5', 'http://www.cataloencasa.com/706-thickbox_default/ron-abuelo-anejo-5-anos.jpg', '0');
INSERT INTO `productos` VALUES ('2', 'Ron 100 Fuegos', '24.1', '10', 'https://www.infocorporativo.tia.com.ec/sites/almacenestia.com/files/productos/images/241922000.jpg', '0');
