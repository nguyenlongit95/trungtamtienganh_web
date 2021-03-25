-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1:3306
-- Thời gian đã tạo: Th3 25, 2021 lúc 09:49 AM
-- Phiên bản máy phục vụ: 5.7.24
-- Phiên bản PHP: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `trungtamtienganh_web`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `articles`
--

DROP TABLE IF EXISTS `articles`;
CREATE TABLE IF NOT EXISTS `articles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `info` text COLLATE utf8_unicode_ci,
  `description` text COLLATE utf8_unicode_ci,
  `author` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `time_public` timestamp NULL DEFAULT NULL,
  `status` int(11) NOT NULL COMMENT '0: unpublish 1: publish',
  `latest_reading_time` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `articles`
--

INSERT INTO `articles` (`id`, `category_id`, `name`, `slug`, `title`, `info`, `description`, `author`, `time_public`, `status`, `latest_reading_time`, `created_at`, `updated_at`, `deleted_at`) VALUES
(6, 2, 'Lớp học Java mới khai giảng vào hôm nay', 'lop-hoc-java-moi-khai-giang-vao-hom-nay', 'Khai giảng lớp Java nâng cao cho người đang đi làm', '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eos blanditiis, odit non asperiores possimus voluptas sit nihil nam id explicabo saepe sapiente excepturi similique, dicta officia odio natus nemo. Ratione ipsa distinctio explicabo esse quod autem veritatis, in fugit odio.&nbsp;Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>\r\n\r\n<p><img alt=\"\" src=\"https://drive.google.com/file/d/1GfIpSrT3m-8d4gC7jelsQue1lQ93EUfO/view?usp=sharing\" /></p>\r\n\r\n<p>Eos blanditiis, odit non asperiores possimus voluptas sit nihil nam id explicabo saepe sapiente excepturi similique, dicta officia odio natus nemo. Ratione ipsa distinctio explicabo esse quod autem veritatis, in fugit odio.</p>', '<p><img alt=\"\" src=\"/ckfinder/userfiles/images/avaHostingerAndMail.jpg\" style=\"height:958px; width:960px\" /><img alt=\"\" src=\"/ckfinder/userfiles/images/ava.jpg\" style=\"height:250px; width:250px\" />T&iacute;ch hợp th&agrave;nh c&ocirc;ng tr&igrave;nh xử l&yacute; h&igrave;nh&nbsp;ảnh v&agrave;o tr&igrave;nh xử l&yacute; văn bản</p>\r\n\r\n<p><img alt=\"\" src=\"/ckfinder/userfiles/images/hinhanhdemo.jpg\" style=\"height:648px; width:960px\" /></p>\r\n\r\n<p>&nbsp;</p>', 'LongNguyen', NULL, 0, NULL, '2021-03-24 02:50:53', '2021-03-24 21:23:30', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `article_tags`
--

DROP TABLE IF EXISTS `article_tags`;
CREATE TABLE IF NOT EXISTS `article_tags` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `article_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=30 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `article_tags`
--

INSERT INTO `article_tags` (`id`, `article_id`, `tag_id`, `created_at`, `updated_at`) VALUES
(29, 6, 2, '2021-03-25 04:23:30', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `blogs`
--

DROP TABLE IF EXISTS `blogs`;
CREATE TABLE IF NOT EXISTS `blogs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `info` text COLLATE utf8_unicode_ci,
  `description` text COLLATE utf8_unicode_ci,
  `author` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `latest_reading_time` timestamp NULL DEFAULT NULL,
  `status` int(11) NOT NULL COMMENT '0: unpublish 1: publish',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `blogs`
--

INSERT INTO `blogs` (`id`, `name`, `slug`, `title`, `info`, `description`, `author`, `latest_reading_time`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Hôm nay tôi học được nhiều điều hay', 'hom-nay-toi-hoc-duoc-nhieu-dieu-hay', 'Học nhiều điểu hay với LongNguyen', '<p><a href=\"#blog-single\">Your Blog Posts are Boring: 9 Tips for Making your Writing more Interesting</a></p>', '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eos blanditiis, odit non asperiores possimus voluptas sit nihil nam id explicabo saepe sapiente excepturi similique, dicta officia odio natus nemo. Ratione ipsa distinctio explicabo esse quod autem veritatis, in fugit odio.</p>\r\n\r\n<p><img alt=\"\" src=\"/ckfinder/userfiles/images/hinhanhdemo.jpg\" style=\"height:169px; width:250px\" /></p>\r\n\r\n<p><a href=\"#blog-single\">ips for Making your Writing more Interesting</a></p>\r\n\r\n<p><img alt=\"\" src=\"/ckfinder/userfiles/images/avaHostingerAndMail.jpg\" style=\"height:150px; width:150px\" /></p>\r\n\r\n<p>&nbsp;</p>', 'LongNguyen', NULL, 1, '2021-03-25 00:44:28', '2021-03-25 00:56:40', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `blog_tags`
--

DROP TABLE IF EXISTS `blog_tags`;
CREATE TABLE IF NOT EXISTS `blog_tags` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `blog_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `blog_tags`
--

INSERT INTO `blog_tags` (`id`, `blog_id`, `tag_id`, `created_at`, `updated_at`) VALUES
(3, 1, 2, '2021-03-25 07:57:33', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sort` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`id`, `name`, `slug`, `sort`, `created_at`, `updated_at`) VALUES
(3, 'Lớp học vui nhộn A02', 'lop-hoc-vui-nhon-a02', 2, '2021-03-24 01:50:22', '2021-03-24 01:50:22'),
(2, 'Lớp vui nhộn A01', 'lop-vui-nhon-a01', 1, '2021-03-24 01:35:14', '2021-03-24 01:35:43');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `contact`
--

DROP TABLE IF EXISTS `contact`;
CREATE TABLE IF NOT EXISTS `contact` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `contact`
--

INSERT INTO `contact` (`id`, `name`, `email`, `content`, `created_at`, `updated_at`) VALUES
(1, 'LongNguyen', 'nguyenlongit95@gmail.com', 'Tôi muốn vào dậy lập trình', '2021-03-25 08:46:23', NULL),
(2, 'ThanhNhan', 'thanhnhan030796@gmail.com', 'Tôi muốn vào dậy toán', '2021-03-25 08:46:23', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `paygates`
--

DROP TABLE IF EXISTS `paygates`;
CREATE TABLE IF NOT EXISTS `paygates` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `url` text COLLATE utf8_unicode_ci NOT NULL,
  `configs` text COLLATE utf8_unicode_ci NOT NULL,
  `icon` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `paygates`
--

INSERT INTO `paygates` (`id`, `name`, `code`, `url`, `configs`, `icon`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, 'Ngân Lượng', 'nganluong', 'https://www.nganluong.vn/checkout.php', '{\"currency\":\"USD\",\"MERCHANT_PASS\":\"Ax1L0GR3sB3f4kHQAj1JtIAWcuvgArQlNyrqcGCbdvLzGJ6nSHm8l2kF\",\"MERCHANT_ID\":\"Q3FZWYGFYLG8WDGW\",\"RECEIVER\":\"sb-3rtbb3863326_api1.business.example.com\"}', '', '2020-11-27 02:58:17', '2020-12-01 03:44:21', NULL),
(3, 'VNPAY', 'vnpay', 'http://sandbox.vnpayment.vn/paymentv2/vpcpay.html', '{\"currency\":\"VND\",\"vnp_TmnCode\":\"Ax1L0GR3sB3f4kHQAj1JtIAWcuvgArQlNyrqcGCbdvLzGJ6nSHm8l2kF\",\"vnp_HashSecret\":\"Q3FZWYGFYLG8WDGW\"}', '', '2020-12-02 02:49:33', '2020-12-02 02:49:33', NULL),
(4, 'PayPal', 'paypal', 'https://www.sandbox.paypal.com/webscr&cmd=_express-checkout&token=', '{\"API_USERNAME\":\"sb-nlqij3868487_api1.business.example.com\",\"API_PASSWORD\":\"R9SRY8RF3CCSNE3P\",\"API_SIGNATURE\":\"A3CZZ6twi-WT-7ZwGQua95N4-iDJAoXTkTDd9WQ7kUjYBGT3y8pqxT4D\", \"VERSION\" : \"53.0\"}', '', '2020-12-07 09:22:36', '2020-12-07 09:22:36', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `settings`
--

DROP TABLE IF EXISTS `settings`;
CREATE TABLE IF NOT EXISTS `settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `key` varchar(250) DEFAULT NULL,
  `value` text,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `settings`
--

INSERT INTO `settings` (`id`, `key`, `value`, `created_at`, `updated_at`) VALUES
(1, 'favicon', '/storage/userfiles/images/nencer-fav.png', NULL, '2019-01-25 09:56:44'),
(2, 'backendlogo', '/storage/userfiles/images/nencer-logo.png', NULL, '2019-01-25 09:56:44'),
(3, 'name', 'Long Nguyen', NULL, '2019-01-25 09:56:44'),
(4, 'title', 'Upload lưu trữ file không giới hạn, miễn phí và an toàn', NULL, '2019-01-25 09:56:44'),
(5, 'description', 'Ứng dụng lõi của mọi phần mềm và hệ thống', NULL, '2019-01-25 09:56:44'),
(6, 'language', 'N/A', NULL, '2019-01-25 09:56:44'),
(7, 'phone', '943793984', NULL, '2019-01-25 09:56:44'),
(8, 'twitter', 'fb.com/admin', NULL, '2019-01-25 09:56:44'),
(9, 'email', 'nguyenlongit95@gmail.com', NULL, '2019-01-25 09:56:44'),
(10, 'facebook', '35/45 Tran Thai Tong, Cau Giay, Ha Noi', NULL, '2019-01-25 09:56:44'),
(11, 'logo', '/storage/userfiles/images/nencer.png', NULL, '2019-01-25 09:56:44'),
(12, 'hotline', '0123456789', NULL, '2019-01-25 09:56:44'),
(13, 'backendname', 'AdminLTE', NULL, '2019-01-25 09:56:44'),
(14, 'backendlang', 'N/A', NULL, '2019-01-25 09:56:44'),
(15, 'copyright', 'Website đang chờ xin giấy phép của bộ TTTT.', NULL, '2019-01-25 09:56:44'),
(16, 'timezone', 'Asia/Ho_Chi_Minh', NULL, '2019-01-25 09:56:44'),
(17, 'googleplus', 'fb.com/admin', NULL, '2019-01-25 09:56:44'),
(18, 'websitestatus', 'ONLINE', NULL, '2019-01-25 09:56:44'),
(19, 'address', '35/45 Tran Thai Tong, Cau Giay, Ha Noi', '2018-08-21 03:53:44', '2019-01-25 09:56:44'),
(21, 'default_user_group', '2', '2018-08-21 04:06:25', '2019-01-25 09:56:44'),
(22, 'twofactor', 'none', '2018-09-05 14:17:56', '2019-01-25 09:56:44'),
(23, 'fronttemplate', 'default', '2018-09-25 06:29:14', '2019-01-25 09:56:44'),
(24, 'offline_mes', 'Website đang bảo trì!', NULL, '2019-01-25 09:56:44'),
(25, 'smsprovider', 'none', '2018-10-09 10:17:08', '2019-01-25 09:56:44'),
(26, 'youtube', 'https://www.youtube.com/watch?v=neCmEbI2VWg', NULL, '2019-01-25 09:56:44'),
(27, 'globalpopup', '0', NULL, '2019-01-25 09:56:44'),
(28, 'globalpopup_mes', '<p>Chưa c&oacute; nội dung g&igrave;</p>', NULL, '2019-01-25 09:56:44'),
(29, 'social_login', '0', NULL, '2019-01-25 09:56:44'),
(30, 'google_analytic_id', '30', NULL, '2019-01-25 09:56:44'),
(31, 'header_js', 'N/A', NULL, '2019-01-25 09:56:44'),
(32, 'footer_js', 'N/A', NULL, '2019-01-25 09:56:44'),
(33, 'home_tab_active', 'Softcard', NULL, '2019-01-25 09:56:44'),
(34, 'fileSecretkey', '12345678', NULL, NULL),
(35, 'affiliate', 'http://localhost/core/public/user/register/', NULL, '2019-01-14 08:33:48'),
(36, 'top_bg', 'N/A', '2019-01-23 06:42:05', '2019-01-25 09:56:44'),
(37, 'slide_bg', 'N/A', '2019-01-23 06:42:05', '2019-01-25 09:56:44'),
(38, 'footer_bg', 'N/A', '2019-01-23 06:42:05', '2019-01-25 09:56:44'),
(39, 'top_color', 'N/A', '2019-01-23 06:42:05', '2019-01-25 09:56:44'),
(40, 'allow_transfer', '0', '2019-01-23 06:42:05', '2019-01-25 09:56:44'),
(41, 'type_slider', 'slider', '2019-01-23 06:42:05', '2019-01-25 09:56:44'),
(42, 'countdown', '30', NULL, '2019-01-25 09:56:44'),
(43, 'footerlogo', '/storage/userfiles/images/nencer-logo-gray.png', NULL, NULL),
(44, 'logo', '/storage/userfiles/images/nencer-logo.png', NULL, '2020-12-01 23:37:56');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tags`
--

DROP TABLE IF EXISTS `tags`;
CREATE TABLE IF NOT EXISTS `tags` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tags`
--

INSERT INTO `tags` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Trending', 'trending', '2021-03-24 09:17:28', NULL),
(2, 'Today Highlights', 'today-highlights', '2021-03-24 09:17:28', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` int(11) NOT NULL DEFAULT '2',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `role`, `created_at`, `updated_at`) VALUES
(1, 'NguyenLong', 'nguyenlongit95@gmail.com', '2020-12-01 17:00:00', '$2y$10$/XiVXPWQ5Ol2RmUitWDmKebYsyMJfoS/ohx8Z5NTLbDd6zoot53fe', NULL, 0, NULL, '2020-12-02 00:50:30'),
(2, 'LongNguyen', 'testAccount@gmail.com', NULL, '$2y$10$r3QBckUKEBrK/Y08Q4lAbe/SzrWr.qbrbjz.r6YFqjnMI6uEQGu8K', NULL, 2, '2020-12-07 01:08:58', '2020-12-07 01:08:58');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
