-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 03, 2017 at 09:23 PM
-- Server version: 5.5.39
-- PHP Version: 5.4.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `crmlocnuoc`
--

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE IF NOT EXISTS `customers` (
`id` int(11) NOT NULL,
  `firstname` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `lastname` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `alias` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address2` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sex` enum('male','female','other','') CHARACTER SET latin1 NOT NULL,
  `birthday` int(11) NOT NULL,
  `type` enum('new','old','lead','caring','reject') CHARACTER SET latin1 NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `id_device` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `id_order` int(11) NOT NULL,
  `staff_create_id` int(11) NOT NULL,
  `time_call` int(11) NOT NULL,
  `time_lastcare` int(11) NOT NULL,
  `createdate` int(11) NOT NULL,
  `customer_code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `qrcode` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=8 ;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `firstname`, `lastname`, `avatar`, `alias`, `phone`, `address`, `address2`, `email`, `sex`, `birthday`, `type`, `password`, `id_device`, `id_order`, `staff_create_id`, `time_call`, `time_lastcare`, `createdate`, `customer_code`, `qrcode`) VALUES
(1, 'Việt', 'Hoàng', 'assets/uploads/customers/avatar.png', '80042dd631d9437f2c43df354808ea9d', '0904683491', 'hà nội', '', 'thandieudaihiep11088@gmail.com', 'male', 591663600, 'new', '72a02467e0aadcf0107a7ae3aeb79223', '2', 11, 2, 0, 0, 0, '', 0),
(2, 'tèo', 'tony', '', '1dde7dd4964ca7959d6de428666d40e0', '0123456789', 'bắc giang', '', 'tonyteo@gmail.com', 'male', 595638000, 'new', '', '3', 0, 2, 1479530772, 0, 0, 'c81e728d9d4c2f636f067f89cc14862c', 0),
(3, 'Trang', 'Thu', 'assets/uploads/customers/3.jpg', 'a6fa99e0789f06ca266f6652ae0f9853', '0904688888', 'Ngo 13 Khuat Duy Tien', '', 'thutrang@gmail.com', 'female', 595465200, 'new', '', '4', 0, 2, 1479849353, 0, 0, 'eccbc87e4b5ce2fe28308fd9f2a7baf3', 0),
(4, 'Obama', 'Barrack', '', '', '0988666888', 'white house, america', '', 'obama@whitehouse.org', 'male', 568141200, 'new', '', '3,1', 0, 2, 1484678062, 0, 0, 'a87ff679a2f3e71d9181a67b7542122c', 0),
(6, 'Nại', 'Nguyễn Ngọc', '', '', '0123456789', 'Hà Nam', '', 'nainn@gmail.com', 'male', 612723600, 'new', '', '5', 0, 2, 1484678357, 0, 0, '1679091c5a880faf6fb5e6087eb1b2dc', 0),
(7, 'Beckham', 'David', '', '', '09888888888', 'ho chi minh city', '', 'beckham@gmail.com', 'male', 379962000, 'new', '', '2', 0, 2, 1484949000, 0, 0, '8f14e45fceea167a5a36dedd4bea2543', 0);

-- --------------------------------------------------------

--
-- Table structure for table `customers_media`
--

CREATE TABLE IF NOT EXISTS `customers_media` (
  `id` int(11) DEFAULT NULL,
  `id_customer` int(11) NOT NULL,
  `media` text COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `customers_product`
--

CREATE TABLE IF NOT EXISTS `customers_product` (
`id` int(11) NOT NULL,
  `id_customer` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `start_date` int(11) NOT NULL,
  `expire_date` int(11) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `customers_product`
--

INSERT INTO `customers_product` (`id`, `id_customer`, `id_product`, `start_date`, `expire_date`) VALUES
(1, 1, 2, 1479530772, NULL),
(2, 1, 4, 1479530772, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `device`
--

CREATE TABLE IF NOT EXISTS `device` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `alias` varchar(255) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `brand_id` int(11) DEFAULT NULL,
  `sku` varchar(50) NOT NULL,
  `made_in` varchar(100) NOT NULL,
  `createtime` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `sell_price` int(11) DEFAULT NULL,
  `specifications` text NOT NULL,
  `short_description` text NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `thumb` varchar(255) NOT NULL,
  `specify_image` varchar(255) NOT NULL,
  `anh_bo_san_pham` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `packpage_accessories` text NOT NULL,
  `device_tag` text NOT NULL,
  `tag_dong_san_pham` text NOT NULL,
  `deleted` tinyint(4) NOT NULL,
  `featured` int(11) NOT NULL DEFAULT '0',
  `meta_title` varchar(255) NOT NULL,
  `meta_description` varchar(255) NOT NULL,
  `meta_keywords` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `device`
--

INSERT INTO `device` (`id`, `name`, `alias`, `cat_id`, `brand_id`, `sku`, `made_in`, `createtime`, `price`, `sell_price`, `specifications`, `short_description`, `description`, `image`, `thumb`, `specify_image`, `anh_bo_san_pham`, `packpage_accessories`, `device_tag`, `tag_dong_san_pham`, `deleted`, `featured`, `meta_title`, `meta_description`, `meta_keywords`) VALUES
(1, 'Máy lọc nước P3000 V', 'may-loc-nuoc-p3000-v', 7, 3, 'p3000v', 'Hàn Quốc', 1428672013, 9253000, 9053000, 'a:5:{s:9:"kichthuoc";s:15:"100 x 100 x 100";s:7:"dactinh";s:34:"Lọc nhanh, đảm bảo an toàn";s:8:"congsuat";s:3:"60W";s:9:"khoiluong";s:4:"10kg";s:11:"dientieuthu";s:6:"200W/h";}', '', '<p><strong>C&acirc;y lọc nước newlife P3000-R</strong> - M&aacute;y lọc nước cao cấp Newlife với c&ocirc;ng nghệ H&agrave;n Quốc t&iacute;ch hợp 3 chức năng : lọc nước, l&agrave;m n&oacute;ng v&agrave; lạnh v&agrave; loại bỏ độc tố, tạp chất đồng thời giữ lại kho&aacute;ng chất trong nước, gi&uacute;p gia đ&igrave;nh bạn cũng như những nơi c&ocirc;ng sở, c&ocirc;ng ty, bệnh viện, trường học&hellip; c&oacute; một nguồn nước tinh khiết gi&uacute;p tăng cường sức khỏe mỗi ng&agrave;y. M&aacute;y lọc nước H&agrave;n Quốc ch&iacute;nh h&atilde;ng Newlife mang lại nguồn nước cho tương lai.</p>\n', 'assets/upload/fa20d5774674e64.jpg', '', '', 'assets/upload/fa1f23b9dd740bd.png', 'a:1:{i:0;s:1:"1";}', 'a:1:{i:0;s:1:"2";}', 'a:1:{i:0;s:1:"1";}', 0, 1, '', '', ''),
(2, 'Máy lọc nước P3001 V', 'may-loc-nuoc-p3000-v', 7, 3, 'p3000r', 'Hàn Quốc', 1428671873, 9253000, 9053000, 'a:5:{s:9:"kichthuoc";s:15:"100 x 100 x 100";s:7:"dactinh";s:34:"Lọc nhanh, đảm bảo an toàn";s:8:"congsuat";s:3:"60W";s:9:"khoiluong";s:4:"10kg";s:11:"dientieuthu";s:6:"200W/h";}', '', '<p><strong>C&acirc;y lọc nước newlife P3000-R</strong> - M&aacute;y lọc nước cao cấp Newlife với c&ocirc;ng nghệ H&agrave;n Quốc t&iacute;ch hợp 3 chức năng : lọc nước, l&agrave;m n&oacute;ng v&agrave; lạnh v&agrave; loại bỏ độc tố, tạp chất đồng thời giữ lại kho&aacute;ng chất trong nước, gi&uacute;p gia đ&igrave;nh bạn cũng như những nơi c&ocirc;ng sở, c&ocirc;ng ty, bệnh viện, trường học&hellip; c&oacute; một nguồn nước tinh khiết gi&uacute;p tăng cường sức khỏe mỗi ng&agrave;y. M&aacute;y lọc nước H&agrave;n Quốc ch&iacute;nh h&atilde;ng Newlife mang lại nguồn nước cho tương lai.</p>\n', 'assets/upload/fa2e887aa88cb3a.jpg', '', '', 'assets/upload/fa88ef4c1cd827.jpg', 'a:1:{i:0;s:1:"1";}', 'a:1:{i:0;s:1:"2";}', 'a:1:{i:0;s:1:"1";}', 0, 1, '', '', ''),
(3, 'Máy lọc nước P3001 R', 'may-loc-nuoc-p3001-r', 7, 3, 'p30001r', 'Hàn Quốc', 1428716994, 9253000, 9253000, 'a:5:{s:9:"kichthuoc";s:11:"395x300x340";s:7:"dactinh";s:152:"ẫn nguồn trực tiếp (không dùng điện không có nước thải, không máy bơm, không bình chứa). Tiện ích cho người tiêu dùng";s:8:"congsuat";s:5:"40l/h";s:9:"khoiluong";s:4:"10kg";s:11:"dientieuthu";s:6:"200W/h";}', '', '<p style="text-align:justify"><span style="font-size:12pt"><strong>M&aacute;y lọc nước New Life P3001-R</strong>&nbsp;được trang bị C&ocirc;ng Nghệ M&agrave;ng si&ecirc;u lọc UF (c&ocirc;ng nghệ t&acirc;n tiến nhất của H&agrave;n Quốc) cho nước đầu ra với kế&nbsp;quả đ&aacute;ng kinh ngạc đ&atilde; thuyết phục những kh&aacute;ch h&agrave;ng kh&oacute; t&iacute;nh v&agrave; hiểu biết nhất họ cũng kh&acirc;m phục v&agrave; chứng minh điều đ&oacute;.&nbsp;</span></p>\n\n<p style="text-align:justify"><span style="font-size:12pt">-&nbsp;<strong>M&aacute;y lọc nước New Life P3001-R</strong>&nbsp;v&ocirc; c&ugrave;ng tiện &iacute;ch an to&agrave;n, tiết kiệm điện năng, tiết kiệm thời gian, kinh tế cũng như chi ph&iacute; cho người ti&ecirc;u d&ugrave;ng.</span></p>\n\n<p style="text-align:justify"><span style="font-size:12pt">- Hệ thống bộ lọc nước gồm 5&nbsp;l&otilde;i lọc qua 7&nbsp;cấp lọc đem lại nguồn tinh khiết m&agrave; vẫn giữ được nguy&ecirc;n kho&aacute;ng cần thiết cho cơ thể.</span></p>\n\n<p style="text-align:justify"><span style="font-size:12pt">-&nbsp;<strong>M&aacute;y lọc nước New Life P3001-R</strong>&nbsp;C&oacute; chức năng đun s&ocirc;i v&agrave; l&agrave;m lạnh nước uống theo nhu cầu của bạn,&nbsp;d&ugrave;ng nước ăn, uống, nấu nướng miễn ph&iacute; suốt đời.</span></p>\n\n<p style="text-align:justify"><span style="font-size:12pt">- Miễn ph&iacute; lắp đặt.</span></p>\n\n<p style="text-align:justify"><span style="font-size:12pt">- C&oacute; đội ngũ chuy&ecirc;n vi&ecirc;n lắp đặt, sửa chữa, bảo dưỡng, thay thế l&otilde;i lọc, thử nghiệm nước trước v&agrave; sau thay</span></p>\n\n<p style="text-align:justify"><span style="font-size:12pt">- Sản phẩm c&oacute; tem chứng nhận sản phẩm tiếp kiệm điện năng, v&agrave; c&aacute;c chứng nhận về sản phẩm chất lượng TỐT do hiệp hội NSF &amp; FDA cấ</span></p>\n', 'assets/upload/fa1c7db8d2ef8cd.png', '', '', 'assets/upload/fa1887652797929.png', 'a:1:{i:0;s:1:"1";}', 'a:1:{i:0;s:1:"2";}', 'a:1:{i:0;s:1:"1";}', 0, 1, '', '', ''),
(4, 'Máy lọc nước Nano 7 lõi', 'may-loc-nuoc-nano-7-loi', 7, 6, 'nano-7-loi', 'Hàn Quốc', 1428671015, 9000000, 9000000, 'a:5:{s:9:"kichthuoc";s:15:"100 x 100 x 100";s:7:"dactinh";s:34:"Lọc nhanh, đảm bảo an toàn";s:8:"congsuat";s:3:"60W";s:9:"khoiluong";s:4:"10kg";s:11:"dientieuthu";s:6:"200W/h";}', '', '<p>m&aacute;y lọc nước nano 6 l&otilde;i đảm bảo an to&agrave;n</p>\n', 'assets/upload/fac9f6a4aa.jpg', '', '', 'assets/upload/fac9f6a4aa.jpg', 'a:2:{i:0;s:1:"1";i:1;s:1:"2";}', '', '', 1, 1, '', '', ''),
(5, 'Máy lọc nước Nano 6 lõi', 'may-loc-nuoc-nano-6-loi', 6, 1, 'nano-6-loi', 'Hàn Quốc', 1425929055, 9000000, 9000000, 'a:5:{s:9:"kichthuoc";s:15:"100 x 100 x 100";s:7:"dactinh";s:34:"Lọc nhanh, đảm bảo an toàn";s:8:"congsuat";s:3:"60W";s:9:"khoiluong";s:4:"10kg";s:11:"dientieuthu";s:6:"200W/h";}', '', '<p>m&aacute;y lọc nước nano 6 l&otilde;i đảm bảo an to&agrave;n</p>\r\n', 'assets/upload/fac9f6a4aa.jpg', '', '', 'assets/upload/fac9f6a4aa.jpg', 'a:2:{i:0;s:1:"1";i:1;s:1:"2";}', '', '', 1, 1, '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `device_category`
--

CREATE TABLE IF NOT EXISTS `device_category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `alias` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `thumb` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `meta_title` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `meta_description` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `meta_keywords` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `device_category`
--

INSERT INTO `device_category` (`id`, `name`, `alias`, `description`, `image`, `thumb`, `meta_title`, `meta_description`, `meta_keywords`) VALUES
(1, 'Karofi', 'karofi', 'Máy lọc nước Karofi', '', 'assets/img/sample_thumb.png', 'Máy lọc nước Karofi', 'Máy lọc nước Karofi', 'Máy lọc nước Karofi, Karofi'),
(2, 'Akido', 'akido', '', 'assets/img/logo_akido.png', 'assets/img/logo_akido.png', 'Máy lọc nước Akido', 'Máy lọc nước Akido', 'Akido'),
(3, 'Kangaroo', 'kangaroo', '', 'assets/img/logo_kangaroo.jpg', 'assets/img/logo_kangaroo.jpg', 'Máy lọc nước Kangaroo', 'Máy lọc nước Kangaroo', 'Kangaroo'),
(4, 'Nano Geyser', 'nano-geyser', 'Máy lọc nước Nano Geyser', '', '', 'Máy lọc nước Nano Geyser', 'Máy lọc nước Nano Geyser', 'Máy lọc nước Nano Geyser'),
(5, 'Newlife', 'newlife', 'Máy lọc nước Newlife', '', '', 'Máy lọc nước Newlife', 'Máy lọc nước Newlife', 'Máy lọc nước Newlife');

-- --------------------------------------------------------

--
-- Table structure for table `device_tag`
--

CREATE TABLE IF NOT EXISTS `device_tag` (
  `id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `alias` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `device_tag`
--

INSERT INTO `device_tag` (`id`, `name`, `alias`) VALUES
(1, 'Công nghệ RO', 'cong-nghe-ro'),
(2, 'Công nghệ Nano/UF', 'cong-nghe-nano-uf');

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE IF NOT EXISTS `notification` (
`id` int(11) NOT NULL,
  `id_user_from` int(11) NOT NULL,
  `id_user_to` int(11) NOT NULL,
  `status` enum('new','pending','read') COLLATE utf8_unicode_ci NOT NULL,
  `content` text CHARACTER SET utf8 NOT NULL,
  `order_id` int(11) NOT NULL,
  `datetime` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=187 ;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`id`, `id_user_from`, `id_user_to`, `status`, `content`, `order_id`, `datetime`) VALUES
(1, 2, 1, 'read', 'gán đơn hàng cho bạn.', 8, 0),
(2, 2, 1, 'read', 'gán đơn hàng cho bạn.', 10, 0),
(3, 2, 1, 'read', 'gán đơn hàng cho bạn.', 8, 0),
(4, 2, 1, 'read', 'gán đơn hàng cho bạn.', 9, 0),
(5, 2, 1, 'read', 'tạo đơn hàng mới.', 11, 0),
(6, 2, 1, 'read', 'tạo đơn hàng mới.', 12, 0),
(7, 2, 1, 'read', 'gán đơn hàng cho bạn.', 12, 0),
(8, 2, 1, 'new', 'tạo đơn hàng mới.', 13, 0),
(9, 2, 4, 'new', 'tạo đơn hàng mới.', 13, 0),
(10, 2, 1, 'new', 'gán đơn hàng cho bạn.', 13, 0),
(11, 2, 1, 'new', 'gán đơn hàng cho bạn.', 8, 0),
(12, 2, 1, 'new', 'tạo đơn hàng mới.', 14, 0),
(13, 2, 4, 'new', 'tạo đơn hàng mới.', 14, 0),
(14, 2, 1, 'new', 'gán đơn hàng cho bạn.', 8, 0),
(15, 2, 1, 'new', 'gán đơn hàng cho bạn.', 9, 0),
(16, 2, 1, 'new', 'tạo đơn hàng mới.', 15, 0),
(17, 2, 4, 'new', 'tạo đơn hàng mới.', 15, 0),
(18, 2, 1, 'new', 'gán đơn hàng cho bạn.', 13, 0),
(19, 2, 1, 'new', 'gán đơn hàng cho bạn.', 10, 0),
(20, 2, 4, 'new', 'gán đơn hàng cho bạn.', 8, 0),
(21, 2, 1, 'new', 'gán đơn hàng cho bạn.', 8, 0),
(22, 2, 4, 'new', 'gán đơn hàng cho bạn.', 8, 0),
(23, 2, 1, 'new', 'tạo đơn hàng mới.', 16, 0),
(24, 2, 4, 'new', 'tạo đơn hàng mới.', 16, 0),
(25, 2, 4, 'new', 'gán đơn hàng cho bạn.', 16, 0),
(26, 2, 1, 'new', 'tạo đơn hàng mới.', 17, 0),
(27, 2, 4, 'new', 'tạo đơn hàng mới.', 17, 0),
(28, 2, 1, 'new', 'tạo đơn hàng mới.', 1, 0),
(29, 2, 4, 'new', 'tạo đơn hàng mới.', 1, 0),
(30, 2, 1, 'new', 'gán đơn hàng cho bạn.', 1, 0),
(31, 2, 1, 'new', 'gán đơn hàng cho bạn.', 1, 0),
(32, 2, 1, 'new', 'gán đơn hàng cho bạn.', 1, 0),
(33, 2, 4, 'new', 'gán đơn hàng cho bạn.', 1, 0),
(34, 2, 1, 'new', 'tạo đơn hàng mới.', 1, 0),
(35, 2, 4, 'new', 'tạo đơn hàng mới.', 1, 0),
(36, 2, 1, 'new', 'gán đơn hàng cho bạn.', 1, 0),
(37, 2, 1, 'new', 'tạo đơn hàng mới.', 2, 0),
(38, 2, 4, 'new', 'tạo đơn hàng mới.', 2, 0),
(39, 2, 4, 'new', 'gán đơn hàng cho bạn.', 2, 0),
(40, 2, 1, 'new', 'gán đơn hàng cho bạn.', 2, 0),
(41, 2, 4, 'new', 'gán đơn hàng cho bạn.', 2, 0),
(42, 2, 4, 'new', 'gán đơn hàng cho bạn.', 1, 0),
(43, 2, 1, 'new', 'gán đơn hàng cho bạn.', 2, 0),
(44, 2, 1, 'new', 'gán đơn hàng cho bạn.', 2, 0),
(45, 2, 1, 'new', 'gán đơn hàng cho bạn.', 2, 0),
(46, 2, 1, 'new', 'gán đơn hàng cho bạn.', 2, 0),
(47, 2, 1, 'new', 'gán đơn hàng cho bạn.', 2, 0),
(48, 2, 1, 'new', 'gán đơn hàng cho bạn.', 2, 0),
(49, 2, 1, 'new', 'gán đơn hàng cho bạn.', 2, 0),
(50, 2, 1, 'new', 'gán đơn hàng cho bạn.', 2, 0),
(51, 2, 4, 'new', 'gán đơn hàng cho bạn.', 1, 0),
(52, 2, 4, 'new', 'gán đơn hàng cho bạn.', 2, 0),
(53, 2, 1, 'new', 'gán đơn hàng cho bạn.', 2, 0),
(54, 2, 4, 'new', 'gán đơn hàng cho bạn.', 2, 0),
(55, 2, 1, 'new', 'gán đơn hàng cho bạn.', 2, 0),
(56, 2, 1, 'new', 'gán đơn hàng cho bạn.', 2, 0),
(57, 2, 4, 'new', 'gán đơn hàng cho bạn.', 2, 0),
(58, 2, 1, 'new', 'gán đơn hàng cho bạn.', 2, 0),
(59, 2, 1, 'new', 'gán đơn hàng cho bạn.', 1, 0),
(60, 2, 4, 'new', 'gán đơn hàng cho bạn.', 2, 0),
(61, 2, 4, 'new', 'gán đơn hàng cho bạn.', 2, 0),
(62, 2, 4, 'new', 'gán đơn hàng cho bạn.', 2, 0),
(63, 2, 4, 'new', 'gán đơn hàng cho bạn.', 1, 0),
(64, 2, 1, 'new', 'gán đơn hàng cho bạn.', 2, 0),
(65, 2, 1, 'new', 'gán đơn hàng cho bạn.', 1, 0),
(66, 2, 4, 'new', 'gán đơn hàng cho bạn.', 2, 0),
(67, 2, 1, 'new', 'gán đơn hàng cho bạn.', 1, 0),
(68, 2, 4, 'new', 'gán đơn hàng cho bạn.', 1, 0),
(69, 2, 4, 'new', 'gán đơn hàng cho bạn.', 2, 0),
(70, 2, 1, 'new', 'gán đơn hàng cho bạn.', 2, 0),
(71, 2, 4, 'new', 'gán đơn hàng cho bạn.', 2, 0),
(72, 2, 1, 'new', 'gán đơn hàng cho bạn.', 2, 0),
(73, 2, 1, 'new', 'gán đơn hàng cho bạn.', 1, 0),
(74, 2, 4, 'new', 'gán đơn hàng cho bạn.', 2, 0),
(75, 2, 1, 'new', 'gán đơn hàng cho bạn.', 2, 0),
(76, 2, 4, 'new', 'gán đơn hàng cho bạn.', 2, 0),
(77, 2, 1, 'new', 'tạo đơn hàng mới.', 3, 0),
(78, 2, 2, 'read', 'tạo đơn hàng mới.', 3, 0),
(79, 2, 4, 'new', 'tạo đơn hàng mới.', 3, 0),
(80, 2, 1, 'new', 'tạo đơn hàng mới.', 4, 0),
(81, 2, 2, 'read', 'tạo đơn hàng mới.', 4, 0),
(82, 2, 4, 'new', 'tạo đơn hàng mới.', 4, 0),
(83, 2, 1, 'new', 'tạo đơn hàng mới.', 5, 0),
(84, 2, 4, 'new', 'tạo đơn hàng mới.', 5, 0),
(85, 2, 1, 'new', 'tạo đơn hàng mới.', 6, 0),
(86, 2, 4, 'new', 'tạo đơn hàng mới.', 6, 0),
(87, 2, 1, 'new', 'tạo đơn hàng mới.', 7, 0),
(88, 2, 4, 'new', 'tạo đơn hàng mới.', 7, 0),
(89, 2, 1, 'new', 'tạo đơn hàng mới.', 7, 0),
(90, 2, 4, 'new', 'tạo đơn hàng mới.', 7, 0),
(91, 2, 1, 'new', 'tạo đơn hàng mới.', 8, 0),
(92, 2, 4, 'new', 'tạo đơn hàng mới.', 8, 0),
(93, 2, 1, 'new', 'tạo đơn hàng mới.', 9, 0),
(94, 2, 4, 'new', 'tạo đơn hàng mới.', 9, 0),
(95, 2, 1, 'new', 'tạo đơn hàng mới.', 10, 0),
(96, 2, 4, 'new', 'tạo đơn hàng mới.', 10, 0),
(97, 2, 1, 'new', 'tạo đơn hàng mới.', 11, 0),
(98, 2, 4, 'new', 'tạo đơn hàng mới.', 11, 0),
(99, 2, 1, 'new', 'tạo đơn hàng mới.', 12, 0),
(100, 2, 4, 'new', 'tạo đơn hàng mới.', 12, 0),
(101, 2, 1, 'new', 'tạo đơn hàng mới.', 13, 0),
(102, 2, 4, 'new', 'tạo đơn hàng mới.', 13, 0),
(103, 2, 1, 'new', 'tạo đơn hàng mới.', 14, 0),
(104, 2, 4, 'new', 'tạo đơn hàng mới.', 14, 0),
(105, 2, 1, 'new', 'tạo đơn hàng mới.', 15, 0),
(106, 2, 4, 'new', 'tạo đơn hàng mới.', 15, 0),
(107, 2, 1, 'new', 'tạo đơn hàng mới.', 16, 0),
(108, 2, 4, 'new', 'tạo đơn hàng mới.', 16, 0),
(109, 2, 1, 'new', 'tạo đơn hàng mới.', 17, 0),
(110, 2, 4, 'new', 'tạo đơn hàng mới.', 17, 0),
(111, 2, 1, 'new', 'tạo đơn hàng mới.', 7, 0),
(112, 2, 4, 'new', 'tạo đơn hàng mới.', 7, 0),
(113, 2, 1, 'new', 'tạo đơn hàng mới.', 8, 0),
(114, 2, 4, 'new', 'tạo đơn hàng mới.', 8, 0),
(115, 2, 1, 'new', 'tạo đơn hàng mới.', 9, 0),
(116, 2, 4, 'new', 'tạo đơn hàng mới.', 9, 0),
(117, 2, 1, 'new', 'tạo đơn hàng mới.', 10, 0),
(118, 2, 4, 'new', 'tạo đơn hàng mới.', 10, 0),
(119, 2, 1, 'new', 'tạo đơn hàng mới.', 11, 0),
(120, 2, 4, 'new', 'tạo đơn hàng mới.', 11, 0),
(121, 2, 1, 'new', 'tạo đơn hàng mới.', 12, 0),
(122, 2, 4, 'new', 'tạo đơn hàng mới.', 12, 0),
(123, 2, 1, 'new', 'tạo đơn hàng mới.', 13, 0),
(124, 2, 4, 'new', 'tạo đơn hàng mới.', 13, 0),
(125, 2, 1, 'new', 'tạo đơn hàng mới.', 14, 0),
(126, 2, 4, 'new', 'tạo đơn hàng mới.', 14, 0),
(127, 2, 1, 'new', 'tạo đơn hàng mới.', 15, 0),
(128, 2, 4, 'new', 'tạo đơn hàng mới.', 15, 0),
(129, 2, 1, 'new', 'tạo đơn hàng mới.', 16, 0),
(130, 2, 4, 'new', 'tạo đơn hàng mới.', 16, 0),
(131, 2, 1, 'new', 'tạo đơn hàng mới.', 17, 0),
(132, 2, 4, 'new', 'tạo đơn hàng mới.', 17, 0),
(133, 2, 1, 'new', 'tạo đơn hàng mới.', 18, 0),
(134, 2, 4, 'new', 'tạo đơn hàng mới.', 18, 0),
(135, 2, 1, 'new', 'gán đơn hàng cho bạn.', 18, 0),
(136, 2, 1, 'new', 'gán đơn hàng cho bạn.', 18, 0),
(137, 2, 4, 'new', 'gán đơn hàng cho bạn.', 6, 0),
(138, 2, 6, 'new', 'báo hoãn đơn hàng tới bạn.', 6, 0),
(139, 2, 6, 'new', 'báo hoãn đơn hàng tới bạn.', 6, 0),
(140, 2, 1, 'new', 'gán đơn hàng cho bạn.', 18, 0),
(141, 2, 4, 'new', 'gán đơn hàng cho bạn.', 6, 0),
(142, 2, 18, 'new', 'báo hoãn đơn hàng tới bạn.', 18, 0),
(143, 2, 18, 'new', 'báo hoãn đơn hàng tới bạn.', 18, 0),
(144, 2, 18, 'new', 'báo hoãn đơn hàng tới bạn.', 18, 0),
(145, 2, 6, 'new', 'báo hoãn đơn hàng tới bạn.', 6, 0),
(146, 2, 1, 'new', 'gán đơn hàng cho bạn.', 6, 0),
(147, 2, 6, 'new', 'báo hoãn đơn hàng tới bạn.', 6, 0),
(148, 2, 1, 'new', 'gán đơn hàng cho bạn.', 6, 0),
(149, 2, 1, 'new', 'gán đơn hàng cho bạn.', 6, 0),
(150, 2, 6, 'new', 'báo hoãn đơn hàng tới bạn.', 6, 0),
(151, 2, 1, 'new', 'gán đơn hàng cho bạn.', 6, 0),
(152, 2, 6, 'new', 'báo hoãn đơn hàng tới bạn.', 6, 0),
(153, 2, 1, 'new', 'gán đơn hàng cho bạn.', 6, 0),
(154, 2, 6, 'new', 'báo hoãn đơn hàng tới bạn.', 6, 0),
(155, 2, 1, 'new', 'gán đơn hàng cho bạn.', 6, 0),
(156, 2, 6, 'new', 'báo hoãn đơn hàng tới bạn.', 6, 0),
(157, 2, 6, 'new', 'báo hoãn đơn hàng tới bạn.', 6, 0),
(158, 2, 6, 'new', 'báo hoãn đơn hàng tới bạn.', 6, 0),
(159, 2, 1, 'new', 'gán đơn hàng cho bạn.', 18, 0),
(160, 2, 18, 'new', 'báo hoãn đơn hàng tới bạn.', 18, 0),
(161, 2, 1, 'new', 'gán đơn hàng cho bạn.', 18, 0),
(162, 2, 4, 'new', 'gán đơn hàng cho bạn.', 6, 0),
(163, 2, 1, 'new', 'gán đơn hàng cho bạn.', 5, 0),
(164, 2, 5, 'new', 'báo hoãn đơn hàng tới bạn.', 5, 0),
(165, 2, 1, 'new', 'gán đơn hàng cho bạn.', 5, 0),
(166, 2, 5, 'new', 'báo hoãn đơn hàng tới bạn.', 5, 0),
(167, 2, 1, 'new', 'gán đơn hàng cho bạn.', 5, 0),
(168, 2, 5, 'new', 'báo hoãn đơn hàng tới bạn.', 5, 0),
(169, 2, 1, 'new', 'tạo đơn hàng mới.', 19, 0),
(170, 2, 4, 'new', 'tạo đơn hàng mới.', 19, 0),
(171, 2, 4, 'new', 'gán đơn hàng cho bạn.', 19, 0),
(172, 2, 1, 'new', 'tạo đơn hàng mới.', 20, 0),
(173, 2, 4, 'new', 'tạo đơn hàng mới.', 20, 0),
(174, 2, 4, 'new', 'gán đơn hàng cho bạn.', 20, 0),
(175, 2, 1, 'new', 'tạo đơn hàng mới.', 21, 0),
(176, 2, 4, 'new', 'tạo đơn hàng mới.', 21, 0),
(177, 2, 1, 'new', 'gán đơn hàng cho bạn.', 21, 0),
(178, 2, 1, 'new', 'tạo đơn hàng mới.', 21, 0),
(179, 2, 4, 'new', 'tạo đơn hàng mới.', 21, 0),
(180, 2, 1, 'new', 'tạo đơn hàng mới.', 22, 0),
(181, 2, 4, 'new', 'tạo đơn hàng mới.', 22, 0),
(182, 2, 1, 'new', 'gán đơn hàng cho bạn.', 22, 0),
(183, 2, 1, 'new', 'tạo đơn hàng mới.', 22, 0),
(184, 2, 4, 'new', 'tạo đơn hàng mới.', 22, 0),
(185, 2, 1, 'new', 'tạo đơn hàng mới.', 18, 0),
(186, 2, 4, 'new', 'tạo đơn hàng mới.', 18, 0);

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE IF NOT EXISTS `order` (
`id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `staff_create_id` int(11) NOT NULL,
  `product_array` text COLLATE utf8_unicode_ci,
  `id_device` int(11) NOT NULL,
  `create_date` int(11) NOT NULL,
  `implement_date` int(11) NOT NULL,
  `complete_date` int(11) NOT NULL,
  `close_date` int(11) NOT NULL,
  `staff_technique_id` int(11) NOT NULL,
  `order_code` int(11) NOT NULL,
  `total_price` int(11) NOT NULL,
  `sale_percent` int(3) NOT NULL DEFAULT '0',
  `sale_amount` int(11) NOT NULL DEFAULT '0',
  `status` enum('new','pending','confirm','closed') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'new',
  `id_warehouse` int(3) DEFAULT NULL,
  `note` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=23 ;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`id`, `customer_id`, `staff_create_id`, `product_array`, `id_device`, `create_date`, `implement_date`, `complete_date`, `close_date`, `staff_technique_id`, `order_code`, `total_price`, `sale_percent`, `sale_amount`, `status`, `id_warehouse`, `note`) VALUES
(18, 6, 3, '[{"pro_id":6,"quantity":"6","id":0},{"pro_id":4,"quantity":"6","id":1}]', 4, 1484853645, 1485372042, 1487431202, 1487431214, 2, 0, 360000, 0, 0, 'pending', 2, 'ahihi'),
(19, 7, 2, '[{"pro_id":6,"quantity":"3","id":0},{"pro_id":5,"quantity":"0","id":1},{"pro_id":2,"quantity":"3","id":2}]', 0, 1484949037, 1485293510, 1485023351, 0, 2, 0, 270000, 10, 0, 'pending', 2, ''),
(20, 6, 2, '[{"pro_id":6,"quantity":"5","id":0},{"pro_id":5,"quantity":"5","id":1}]', 5, 1485024775, 1485863558, 1485024861, 0, 4, 0, 243000, 10, 0, 'confirm', 0, ''),
(22, 7, 2, '[{"pro_id":6,"quantity":"2","id":0},{"pro_id":4,"quantity":"3","id":1}]', 2, 1486050260, 1487778251, 1486050438, 0, 1, 0, 152000, 5, 0, 'confirm', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
`id` int(11) NOT NULL,
  `id_device` varchar(120) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `alias` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sku` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `input_price` int(11) NOT NULL,
  `sell_price` int(11) NOT NULL,
  `note` text COLLATE utf8_unicode_ci NOT NULL,
  `longevity` int(11) NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `thumb` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `commission` int(11) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `id_device`, `name`, `alias`, `sku`, `input_price`, `sell_price`, `note`, `longevity`, `image`, `thumb`, `commission`) VALUES
(2, '1,3', 'Lõi số 1 Nano', 'loi-so-1-nano', 'nano01', 50000, 80000, '<p>sdvsdv</p>\r\n', 365, 'assets/uploads/products/fa2880c9c27be70.jpg', 'assets/uploads/thumb/products/fa2880c9c27be70_thumb.jpg', NULL),
(4, '2,4', 'Lõi số 1 Kang', 'loi-so-1-kang', 'KG001', 20000, 40000, '', 1020, 'assets/uploads/products/fa1381005124d4.jpg', 'assets/uploads/thumb/products/fa1381005124d4_thumb.jpg', NULL),
(5, '3,5', 'Lõi số 2 Kang', 'loi-so-2-kang', 'KG002', 34000, 34000, '', 1020, 'assets/uploads/products/fa22e3eef979021.png', 'assets/uploads/thumb/products/fa22e3eef979021_thumb.png', NULL),
(6, '1,2,3,4,5', 'Lõi số 3 Kang', 'loi-so-3-kang', 'KG993', 10000, 20000, '', 180, 'assets/uploads/products/fadb158299427c.jpg', 'assets/uploads/thumb/products/fadb158299427c_thumb.jpg', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_in_ware`
--

CREATE TABLE IF NOT EXISTS `product_in_ware` (
`id` int(11) NOT NULL,
  `id_warehouse` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `number_product` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=17 ;

--
-- Dumping data for table `product_in_ware`
--

INSERT INTO `product_in_ware` (`id`, `id_warehouse`, `id_product`, `number_product`) VALUES
(1, 1, 1, 34),
(2, 2, 1, 34),
(3, 1, 2, 34),
(4, 2, 2, 30),
(5, 6, 2, 34),
(6, 6, 4, 34),
(7, 6, 5, 34),
(8, 6, 6, 34),
(9, 7, 2, 100),
(10, 7, 4, 100),
(11, 7, 5, 100),
(12, 7, 6, 100),
(13, 8, 2, 10),
(14, 8, 4, 10),
(15, 8, 5, 10),
(16, 8, 6, 10);

-- --------------------------------------------------------

--
-- Table structure for table `qrcode`
--

CREATE TABLE IF NOT EXISTS `qrcode` (
`id` int(11) NOT NULL,
  `number` int(11) NOT NULL,
  `code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `qrcode_image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `customer_id` int(11) NOT NULL,
  `status` enum('new','used','trash') COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=10 ;

--
-- Dumping data for table `qrcode`
--

INSERT INTO `qrcode` (`id`, `number`, `code`, `link`, `qrcode_image`, `customer_id`, `status`) VALUES
(1, 1, '6d6109be88dade78e2f98259de6a862d', 'http://locnuoccrm.dev/customer/6d6109be88dade78e2f98259de6a862d', 'http://chart.googleapis.com/chart?cht=qr&chs=300x300&chl=http://locnuoccrm.dev/customer/6d6109be88dade78e2f98259de6a862d', 0, 'new'),
(2, 2, '0208b59157f5092eaadc18371ccd41a7', 'http://locnuoccrm.dev/customer/0208b59157f5092eaadc18371ccd41a7', 'http://chart.googleapis.com/chart?cht=qr&chs=300x300&chl=http://locnuoccrm.dev/customer/0208b59157f5092eaadc18371ccd41a7', 0, 'new'),
(3, 3, 'dde1e0cb118009766da8d3e2ec3b79cf', 'http://locnuoccrm.dev/customer/dde1e0cb118009766da8d3e2ec3b79cf', 'http://chart.googleapis.com/chart?cht=qr&chs=300x300&chl=http://locnuoccrm.dev/customer/dde1e0cb118009766da8d3e2ec3b79cf', 0, 'new'),
(4, 4, '7e557c3ab6d5078625acca7ff37f3520', 'http://locnuoccrm.dev/customer/7e557c3ab6d5078625acca7ff37f3520', 'http://chart.googleapis.com/chart?cht=qr&chs=300x300&chl=http://locnuoccrm.dev/customer/7e557c3ab6d5078625acca7ff37f3520', 0, 'new'),
(5, 5, '80042dd631d9437f2c43df354808ea9d', 'http://locnuoccrm.dev/customer/80042dd631d9437f2c43df354808ea9d', 'http://chart.googleapis.com/chart?cht=qr&chs=300x300&chl=http://locnuoccrm.dev/customer/80042dd631d9437f2c43df354808ea9d', 0, 'new'),
(6, 6, '1dde7dd4964ca7959d6de428666d40e0', 'http://locnuoccrm.dev/customer/1dde7dd4964ca7959d6de428666d40e0', 'http://chart.googleapis.com/chart?cht=qr&chs=300x300&chl=http://locnuoccrm.dev/customer/1dde7dd4964ca7959d6de428666d40e0', 0, 'new'),
(7, 7, 'a6fa99e0789f06ca266f6652ae0f9853', 'http://locnuoccrm.dev/customer/a6fa99e0789f06ca266f6652ae0f9853', 'http://chart.googleapis.com/chart?cht=qr&chs=300x300&chl=http://locnuoccrm.dev/customer/a6fa99e0789f06ca266f6652ae0f9853', 0, 'new'),
(8, 8, 'c78f6625b97aea448e5436bc60ca446b', 'http://locnuoccrm.dev/customer/c78f6625b97aea448e5436bc60ca446b', 'http://chart.googleapis.com/chart?cht=qr&chs=300x300&chl=http://locnuoccrm.dev/customer/c78f6625b97aea448e5436bc60ca446b', 0, 'new'),
(9, 9, '4c41f52e279325f354f066933a6ce80e', 'http://locnuoccrm.dev/customer/4c41f52e279325f354f066933a6ce80e', 'http://chart.googleapis.com/chart?cht=qr&chs=300x300&chl=http://locnuoccrm.dev/customer/4c41f52e279325f354f066933a6ce80e', 0, 'new');

-- --------------------------------------------------------

--
-- Table structure for table `salary`
--

CREATE TABLE IF NOT EXISTS `salary` (
`id` int(11) NOT NULL,
  `id_user` int(6) NOT NULL,
  `hard_salary` int(11) NOT NULL,
  `target` int(11) NOT NULL,
  `actual_salary` int(11) NOT NULL,
  `month` int(2) NOT NULL,
  `year` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`id` int(11) NOT NULL,
  `firstname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `lastname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `position` int(255) NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_code` int(11) NOT NULL,
  `group_id` int(11) NOT NULL COMMENT '[1: Admin; 2: Sale; 3:Coordinator; 4: 2 + 3; 5: Technique Staff]',
  `id_warehouse` int(3) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `email`, `phone`, `address`, `avatar`, `position`, `password`, `user_code`, `group_id`, `id_warehouse`) VALUES
(1, 'Duong', 'Nguyen', 'duong48ptit@gmail.com', '0123456789', 'Hà Nội', 'assets/img/demo/user3-128x128.jpg', 1, 'df09a67551a4788b3b9ffe1b8a8b4d59', 1, 5, 1),
(2, 'Việt', 'Hoàng', 'hoangviet11088@gmail.com', '0904683491', 'Hà Nội', 'assets/uploads/users/avatar.png', 5, '72a02467e0aadcf0107a7ae3aeb79223', 1, 1, 1),
(3, 'Vinh', 'Lê Công', 'congvinh@gmail.com', '0904688888', 'Nghệ An', 'assets/img/demo/user7-128x128.jpg', 2, '72a02467e0aadcf0107a7ae3aeb79223', 1, 2, 3),
(4, 'Mạnh', 'Đinh Công', 'dinhmenh@gmail.com', '0904666666', 'Sầm Sơn, Thanh Hóa', 'assets/img/demo/user4-128x128.jpg', 3, '72a02467e0aadcf0107a7ae3aeb79223', 1, 5, 2);

-- --------------------------------------------------------

--
-- Table structure for table `users_cart`
--

CREATE TABLE IF NOT EXISTS `users_cart` (
`id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `product_number` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Dumping data for table `users_cart`
--

INSERT INTO `users_cart` (`id`, `id_user`, `id_product`, `product_number`) VALUES
(1, 2, 2, 50),
(2, 2, 4, 41),
(3, 2, 5, 45),
(4, 5, 6, 50),
(5, 2, 6, 37);

-- --------------------------------------------------------

--
-- Table structure for table `users_cart_history`
--

CREATE TABLE IF NOT EXISTS `users_cart_history` (
`id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_order` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `action` enum('increase','decrease') COLLATE utf8_unicode_ci NOT NULL,
  `datetime` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=15 ;

--
-- Dumping data for table `users_cart_history`
--

INSERT INTO `users_cart_history` (`id`, `id_user`, `id_order`, `id_product`, `action`, `datetime`) VALUES
(1, 2, 2, 2, 'decrease', 1483917988),
(2, 2, 2, 4, 'decrease', 1483917988),
(3, 2, 3, 2, 'decrease', 1483918836),
(4, 2, 3, 5, 'decrease', 1483918836),
(5, 2, 1, 2, 'decrease', 1483962953),
(6, 2, 1, 2, 'decrease', 1483963023),
(7, 2, 3, 2, 'decrease', 1483963164),
(8, 2, 3, 5, 'decrease', 1483963164),
(9, 2, 20, 6, 'decrease', 1485024861),
(10, 2, 20, 5, 'decrease', 1485024861),
(11, 2, 22, 6, 'decrease', 1486050438),
(12, 2, 22, 4, 'decrease', 1486050438),
(13, 2, 18, 6, 'decrease', 1487431202),
(14, 2, 18, 4, 'decrease', 1487431202);

-- --------------------------------------------------------

--
-- Table structure for table `users_history`
--

CREATE TABLE IF NOT EXISTS `users_history` (
`id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_order` int(11) NOT NULL,
  `id_user_to` int(11) NOT NULL,
  `action` enum('create','assign','take','complete','closed','update','modify','delayed') COLLATE utf8_unicode_ci NOT NULL,
  `datetime` int(11) NOT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=102 ;

--
-- Dumping data for table `users_history`
--

INSERT INTO `users_history` (`id`, `id_user`, `id_order`, `id_user_to`, `action`, `datetime`, `type`) VALUES
(1, 2, 2, 3, 'complete', 1483917988, ''),
(2, 1, 3, 0, 'create', 1483918767, ''),
(3, 2, 3, 2, 'complete', 1483918837, ''),
(4, 2, 1, 2, 'complete', 1483962953, ''),
(5, 2, 1, 2, 'complete', 1483963023, ''),
(6, 2, 3, 2, 'complete', 1483963164, ''),
(7, 2, 4, 0, 'create', 1484053457, ''),
(8, 2, 5, 0, 'create', 1484678548, ''),
(9, 2, 6, 0, 'create', 1484678666, ''),
(10, 2, 6, 0, 'modify', 1484680755, ''),
(11, 2, 7, 0, 'create', 1484680794, ''),
(12, 2, 7, 0, 'modify', 1484680827, ''),
(13, 2, 7, 0, 'modify', 1484680839, ''),
(14, 2, 7, 0, 'modify', 1484680843, ''),
(15, 2, 7, 0, 'modify', 1484680856, ''),
(16, 2, 7, 0, 'modify', 1484680872, ''),
(17, 2, 7, 0, 'modify', 1484681073, ''),
(18, 2, 7, 0, 'modify', 1484681106, ''),
(19, 2, 7, 0, 'modify', 1484681124, ''),
(20, 2, 7, 0, 'modify', 1484681137, ''),
(21, 2, 7, 0, 'modify', 1484681824, ''),
(22, 2, 7, 0, 'modify', 1484687225, ''),
(23, 2, 4, 2, 'complete', 1484687353, ''),
(24, 2, 7, 0, 'create', 1484850991, ''),
(25, 2, 8, 0, 'create', 1484852362, ''),
(26, 2, 9, 0, 'create', 1484852612, ''),
(27, 2, 10, 0, 'create', 1484852742, ''),
(28, 2, 11, 0, 'create', 1484852789, ''),
(29, 2, 12, 0, 'create', 1484852821, ''),
(30, 2, 13, 0, 'create', 1484852837, ''),
(31, 2, 14, 0, 'create', 1484852872, ''),
(32, 2, 15, 0, 'create', 1484852885, ''),
(33, 2, 16, 0, 'create', 1484852896, ''),
(34, 2, 17, 0, 'create', 1484852914, ''),
(35, 2, 7, 0, 'create', 1484853055, ''),
(36, 2, 8, 0, 'create', 1484853064, ''),
(37, 2, 9, 0, 'create', 1484853085, ''),
(38, 2, 10, 0, 'create', 1484853095, ''),
(39, 2, 11, 0, 'create', 1484853117, ''),
(40, 2, 12, 0, 'create', 1484853125, ''),
(41, 2, 13, 0, 'create', 1484853181, ''),
(42, 2, 14, 0, 'create', 1484853192, ''),
(43, 2, 15, 0, 'create', 1484853207, ''),
(44, 2, 16, 0, 'create', 1484853230, ''),
(45, 2, 17, 0, 'create', 1484853259, ''),
(46, 2, 18, 0, 'create', 1484853645, ''),
(47, 2, 6, 0, 'modify', 1484853861, ''),
(48, 2, 6, 0, 'modify', 1484853873, ''),
(49, 2, 18, 3, 'delayed', 1484859139, ''),
(50, 2, 18, 1, 'assign', 1484939660, ''),
(51, 2, 18, 3, 'delayed', 1484859685, ''),
(52, 2, 6, 3, 'delayed', 1484859694, ''),
(53, 2, 6, 4, 'assign', 1484939673, ''),
(54, 2, 18, 3, 'delayed', 1484859764, ''),
(55, 2, 18, 3, 'delayed', 1484859856, ''),
(56, 2, 6, 3, 'delayed', 1484859877, ''),
(57, 2, 18, 3, 'delayed', 1484860152, ''),
(58, 2, 18, 3, 'delayed', 1484860496, ''),
(59, 2, 18, 3, 'delayed', 1484860514, ''),
(60, 2, 18, 3, 'delayed', 1484860573, ''),
(61, 2, 18, 3, 'delayed', 1484861127, ''),
(62, 2, 18, 3, 'delayed', 1484861169, ''),
(63, 2, 18, 3, 'delayed', 1484861172, ''),
(64, 2, 6, 3, 'delayed', 1484861189, ''),
(65, 2, 18, 3, 'delayed', 1484861216, ''),
(66, 2, 6, 3, 'delayed', 1484861236, ''),
(67, 2, 18, 3, 'delayed', 1484861312, ''),
(68, 2, 6, 6, 'delayed', 1484862333, ''),
(69, 2, 6, 6, 'delayed', 1484862378, ''),
(70, 2, 18, 18, 'delayed', 1484862820, ''),
(71, 2, 18, 18, 'delayed', 1484862872, ''),
(72, 2, 18, 18, 'delayed', 1484862922, ''),
(73, 2, 6, 6, 'delayed', 1484863889, ''),
(74, 2, 6, 6, 'delayed', 1484864070, ''),
(75, 2, 6, 6, 'delayed', 1484864482, ''),
(76, 2, 6, 6, 'delayed', 1484864552, ''),
(77, 2, 6, 6, 'delayed', 1484864757, ''),
(78, 2, 6, 6, 'delayed', 1484864819, ''),
(79, 2, 6, 6, 'delayed', 1484864862, ''),
(80, 2, 6, 6, 'delayed', 1484864870, ''),
(81, 2, 18, 18, 'delayed', 1484938882, ''),
(82, 2, 5, 1, 'assign', 1484939927, ''),
(83, 2, 5, 5, 'delayed', 1484939838, ''),
(84, 2, 5, 5, 'delayed', 1484939919, ''),
(85, 2, 5, 5, 'delayed', 1484939982, ''),
(86, 2, 19, 0, 'create', 1484949037, ''),
(87, 2, 19, 4, 'assign', 1484953179, ''),
(88, 2, 19, 0, 'modify', 1484953215, ''),
(89, 2, 19, 2, 'complete', 1485023351, ''),
(90, 2, 18, 3, 'complete', 1485024618, ''),
(91, 2, 20, 0, 'create', 1485024775, ''),
(92, 2, 20, 4, 'assign', 1485024842, ''),
(93, 2, 20, 2, 'complete', 1485024861, ''),
(94, 2, 21, 0, 'create', 1485025669, ''),
(95, 2, 21, 1, 'assign', 1485025673, ''),
(96, 2, 21, 2, 'complete', 1486048921, ''),
(97, 2, 21, 2, 'complete', 1486049053, ''),
(98, 2, 22, 0, 'create', 1486050260, ''),
(99, 2, 22, 1, 'assign', 1486050268, ''),
(100, 2, 22, 2, 'complete', 1486050438, ''),
(101, 2, 18, 3, 'complete', 1487431202, '');

-- --------------------------------------------------------

--
-- Table structure for table `user_group`
--

CREATE TABLE IF NOT EXISTS `user_group` (
`id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `permission` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Dumping data for table `user_group`
--

INSERT INTO `user_group` (`id`, `name`, `permission`) VALUES
(1, 'Admin', '[]'),
(2, 'Sale', '[]'),
(3, 'Coordinator', '[]'),
(4, 'Manager', '[]'),
(5, 'Technique', 'Technique staff\r\n'),
(6, 'Chief', '{"admins":["index","add"],"admingroups":["index","add"]}');

-- --------------------------------------------------------

--
-- Table structure for table `warechief_history`
--

CREATE TABLE IF NOT EXISTS `warechief_history` (
`id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_order` int(11) NOT NULL,
  `id_user_to` int(11) NOT NULL,
  `action` enum('import','export','transfer') COLLATE utf8_unicode_ci NOT NULL,
  `datetime` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `warehouse`
--

CREATE TABLE IF NOT EXISTS `warehouse` (
`id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `alias` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `note` text COLLATE utf8_unicode_ci NOT NULL,
  `capacity` text COLLATE utf8_unicode_ci NOT NULL,
  `id_user` int(11) NOT NULL,
  `access` int(1) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=9 ;

--
-- Dumping data for table `warehouse`
--

INSERT INTO `warehouse` (`id`, `name`, `alias`, `address`, `phone`, `note`, `capacity`, `id_user`, `access`) VALUES
(1, '132C Nguyễn Huy Tưởng', '132c-nguyen-huy-tuong', '132C Nguyễn Huy Tưởng, Thanh Xuân Trung, Thanh Xuân, Hà Nội', '0969370019', '', '', 1, 1),
(2, 'HH3C Linh Đàm', 'hh3c-linh-dam', 'Linh đàm', '0904683491', '', '', 2, 1),
(5, 'tesst', 'tesst', 'tesst', '3333333', '<p>33333</p>\r\n', '', 3, 1),
(6, 'hoang viet', 'hoang-viet', 'hanoi', '0904683491', '', '', 4, 1),
(7, 'hồ gươm', 'ho-guom', '36 đinh tiên hoàng, Q. Hoàn Kiếm, Hà Nội', '0988666888', '', '', 2, 1),
(8, 'viet hoang', 'viet-hoang', 'nguyen quy duc', '904683491', '<p>56456464</p>\r\n', '', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `warehouse_history`
--

CREATE TABLE IF NOT EXISTS `warehouse_history` (
`id` int(11) NOT NULL,
  `id_warehouse` int(11) NOT NULL,
  `id_order` int(11) NOT NULL,
  `action` enum('increase','reduce','import','export') COLLATE utf8_unicode_ci NOT NULL,
  `number_input` int(11) NOT NULL,
  `number_output` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_user_to` int(11) NOT NULL,
  `note` text COLLATE utf8_unicode_ci NOT NULL,
  `createtime` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `warehouse_history`
--

INSERT INTO `warehouse_history` (`id`, `id_warehouse`, `id_order`, `action`, `number_input`, `number_output`, `id_product`, `id_user`, `id_user_to`, `note`, `createtime`) VALUES
(1, 2, 0, 'export', 0, 4, 2, 2, 2, '', 1483955688);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers_product`
--
ALTER TABLE `customers_product`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `device`
--
ALTER TABLE `device`
 ADD PRIMARY KEY (`id`), ADD KEY `cat_id` (`cat_id`);

--
-- Indexes for table `device_category`
--
ALTER TABLE `device_category`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `device_tag`
--
ALTER TABLE `device_tag`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_in_ware`
--
ALTER TABLE `product_in_ware`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `qrcode`
--
ALTER TABLE `qrcode`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `salary`
--
ALTER TABLE `salary`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_cart`
--
ALTER TABLE `users_cart`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_cart_history`
--
ALTER TABLE `users_cart_history`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_history`
--
ALTER TABLE `users_history`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_group`
--
ALTER TABLE `user_group`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `warechief_history`
--
ALTER TABLE `warechief_history`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `warehouse`
--
ALTER TABLE `warehouse`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `warehouse_history`
--
ALTER TABLE `warehouse_history`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `customers_product`
--
ALTER TABLE `customers_product`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=187;
--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `product_in_ware`
--
ALTER TABLE `product_in_ware`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `qrcode`
--
ALTER TABLE `qrcode`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `salary`
--
ALTER TABLE `salary`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `users_cart`
--
ALTER TABLE `users_cart`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `users_cart_history`
--
ALTER TABLE `users_cart_history`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `users_history`
--
ALTER TABLE `users_history`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=102;
--
-- AUTO_INCREMENT for table `user_group`
--
ALTER TABLE `user_group`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `warechief_history`
--
ALTER TABLE `warechief_history`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `warehouse`
--
ALTER TABLE `warehouse`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `warehouse_history`
--
ALTER TABLE `warehouse_history`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
