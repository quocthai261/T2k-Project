-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 13, 2022 lúc 08:50 AM
-- Phiên bản máy phục vụ: 10.4.24-MariaDB
-- Phiên bản PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `db_t2k`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_cart`
--

CREATE TABLE `tbl_cart` (
  `user_id` int(10) NOT NULL,
  `product_id` int(10) NOT NULL,
  `product_quantity` int(100) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `price` int(200) NOT NULL,
  `product_img` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_category`
--

CREATE TABLE `tbl_category` (
  `category_id` int(10) NOT NULL,
  `category_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_category`
--

INSERT INTO `tbl_category` (`category_id`, `category_name`) VALUES
(1, 'Dây chuyền'),
(2, 'Mặt dây chuyền'),
(3, 'Lắc & Vòng'),
(4, 'Nhẫn'),
(5, 'Bông tai');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_materials`
--

CREATE TABLE `tbl_materials` (
  `material_id` int(10) NOT NULL,
  `material_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_materials`
--

INSERT INTO `tbl_materials` (`material_id`, `material_name`) VALUES
(1, 'vàng'),
(2, 'bạc'),
(3, 'bạch kim');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_order`
--

CREATE TABLE `tbl_order` (
  `order_id` int(10) NOT NULL,
  `order_date` date NOT NULL,
  `order_status` varchar(100) NOT NULL,
  `order_price` int(100) NOT NULL,
  `user_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_order`
--

INSERT INTO `tbl_order` (`order_id`, `order_date`, `order_status`, `order_price`, `user_id`) VALUES
(37, '2022-11-11', 'Đã thanh toán', 34415000, 63),
(40, '2022-11-12', 'Đã thanh toán', 525000, 102),
(41, '2022-11-12', 'Đã thanh toán', 695000, 78),
(43, '2022-11-12', 'Đã thanh toán', 525000, 78),
(44, '2022-11-12', 'Đã thanh toán', 29185000, 78),
(45, '2022-11-12', 'Đã thanh toán', 2685000, 78),
(46, '2022-11-12', 'Đã thanh toán', 695000, 63),
(47, '2022-11-12', 'Đã thanh toán', 1220000, 78),
(48, '2022-11-13', 'Đã thanh toán', 695000, 78),
(49, '2022-11-13', 'Đã thanh toán', 1390000, 78),
(50, '2022-11-13', 'Đã thanh toán', 525000, 63),
(51, '2022-11-13', 'Đã thanh toán', 1390000, 102),
(52, '2022-11-13', 'Đã thanh toán', 1847000, 102);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_product`
--

CREATE TABLE `tbl_product` (
  `product_id` int(10) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `product_price` int(50) DEFAULT NULL,
  `category_id` int(10) NOT NULL,
  `product_img` varchar(200) DEFAULT NULL,
  `product_code` varchar(100) NOT NULL,
  `status` bit(1) NOT NULL DEFAULT b'1',
  `material_id` int(10) NOT NULL,
  `sub_name` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_product`
--

INSERT INTO `tbl_product` (`product_id`, `product_name`, `product_price`, `category_id`, `product_img`, `product_code`, `status`, `material_id`, `sub_name`) VALUES
(1, 'Nhẫn Bạc đính đá PNJSilver XMXMW060091', 525000, 4, 'https://cdn.pnj.io/images/thumbnails/300/300/detailed/137/snxmxmw060091-nhan-bac-dinh-da-pnjsilver-1.png', 'XMXMW060091', b'1', 2, 'Nhẫn bạc type 1'),
(2, 'Bông tai bạc đính đá CZ Style by PNJ Nàng Thu XMXMY000035', 695000, 5, 'https://cdn.pnj.io/images/thumbnails/300/300/detailed/136/sbxmxmy000035-bong-tai-bac-dinh-da-cz-style-by-pnj-em-va-trinh-01.png', 'XMXMY000035', b'1', 2, 'Bông tai bạc type 1'),
(3, 'Nhẫn bạc đính đá Style by PNJ Nàng Thu XM00Y000059', 465000, 4, 'https://cdn.pnj.io/images/thumbnails/300/300/detailed/136/snxm00y000059-nhan-bac-dinh-da-cz-style-by-pnj-em-va-trinh-01.png', 'XM00Y000059', b'1', 2, 'Nhẫn bạc type 2'),
(4, 'Nhẫn Bạch kim STYLE By PNJ Nàng Thu 0000W000065', 14150000, 4, 'https://cdn.pnj.io/images/thumbnails/300/300/detailed/136/sn0000w000065-nhan-bac-style-by-pnj-trinh-collection-1.png', 'XM00Y000059', b'1', 3, 'Nhẫn bạch kim type 1'),
(5, 'Bông tai bạch kim đính đá PNJSilver XMXMW060096', 1295000, 5, 'https://cdn.pnj.io/images/thumbnails/300/300/detailed/136/sbxmxmw060096-bong-tai-bac-dinh-da-pnjsilver-01.png', 'XMXMW060096', b'1', 3, 'Bông tai bạch kim type 1'),
(6, 'Dây cổ Bạc đính đá PNJSilver XMXMW060071', 795000, 1, 'https://cdn.pnj.io/images/thumbnails/300/300/detailed/137/scxmxmw060071-day-co-bac-dinh-da-pnjsilver-01.png', 'XMXMW060071', b'1', 2, 'Dây chuyền bạc type 1'),
(7, 'Vòng tay Bạch  kim Ý 18K PNJ 0000W060359', 27790000, 3, 'https://cdn.pnj.io/images/thumbnails/300/300/detailed/137/gv0000w060359-vong-tay-vang-trang-y-18k-pnj-1.png', '0000W060359', b'1', 3, 'Vòng tay bạch kim type 1'),
(8, 'Vòng tay Bạc đính đá PNJSilver PMPFW060000', 1345000, 3, 'https://cdn.pnj.io/images/thumbnails/300/300/detailed/135/svpmpfw060000-vong-tay-bac-dinh-da-pnjsilver-1.png', 'PMPFW060000', b'1', 2, 'Vòng tay bạc type 1'),
(9, 'Vòng tay Bạc Ý có đính đá PNJSilver 0000W060002', 1995000, 3, 'https://cdn.pnj.io/images/thumbnails/300/300/detailed/122/sv0000w060002-vong-tay-bac-y-pnjsilver-1.png', 'PMPFW060000', b'1', 2, 'Vòng tay bạc type 2'),
(10, 'Nhẫn Kim Tiền Vàng Ý 18K PNJ 0000Y000203', 1847000, 4, 'https://cdn.pnj.io/images/thumbnails/300/300/detailed/141/gn0000y000203-nhan-kim-tien-vang-y-18k-pnj-1__2_.png', '0000Y000203', b'1', 1, 'Nhẫn vàng type 1'),
(11, 'Nhẫn Vàng 18K đính đá CZ PNJ XMXMY001681', 4202000, 4, 'https://cdn.pnj.io/images/thumbnails/300/300/detailed/82/gnxmxmy004551-nhan-vang-14k-dinh-da-cz-pnj.png', 'XMXMY001681', b'1', 1, 'Nhẫn vàng type 2'),
(12, 'Nhẫn bạc đính đá PNJSilver XMXMX060006', 695000, 4, 'https://cdn.pnj.io/images/thumbnails/300/300/detailed/122/snxmxmx060006-nhan-bac-dinh-da-pnjsilver-1.png', 'XMXMX060006', b'1', 2, 'Nhẫn bạc type 3'),
(13, 'Mặt dây chuyền Vàng 18K đính đá Citrine PNJ CTXMY000296', 8416000, 2, 'https://cdn.pnj.io/images/thumbnails/300/300/detailed/136/gmctxmy000296-mat-day-chuyen-vang-18k-dinh-da-citrine-pnj-1.png', 'CTXMY000296', b'1', 1, 'Mặt dây chuyền vàng type 1'),
(14, 'Mặt dây chuyền Vàng 18K đính đá Ruby PNJ RBMXY000016', 9104000, 2, 'https://cdn.pnj.io/images/thumbnails/300/300/detailed/136/gmrbmxy000016-mat-day-chuyen-vang-18k-dinh-da-ruby-pnj-1.png', 'CTXMY000296', b'1', 1, 'Mặt dây chuyền vàng type 2'),
(15, 'Mặt dây chuyền Bạc đính đá PNJSilver ZT00W060000', 375000, 2, 'https://cdn.pnj.io/images/thumbnails/300/300/detailed/129/smzt00w060000-mat-day-chuyen-bac-dinh-da-pnjsilver.png', 'ZT00W060000', b'1', 2, 'Mặt dây chuyền bạc type 1'),
(16, 'Dây chuyền Vàng Ý 18K PNJ 0000C060142', 25590000, 1, 'https://cdn.pnj.io/images/thumbnails/300/300/detailed/137/gd0000c060142-day-chuyen-vang-y-18k-pnj-1.png', '0000C060142', b'1', 1, 'Dây chuyền vàng type 1'),
(17, 'Dây chuyền Bạch kim Ý 18K PNJ 0000W061146', 21990000, 1, 'https://cdn.pnj.io/images/thumbnails/300/300/detailed/137/gd0000w061146-day-chuyen-vang-trang-y-18k-pnj-02.png', '0000W061146', b'1', 3, 'Dây chuyền bạc type 2'),
(18, 'Bông tai Bạch kim 18K PNJ 0000W000133', 1902000, 5, 'https://cdn.pnj.io/images/thumbnails/300/300/detailed/95/gb0000w000133-bong-tai-vang-trang-y-18k-pnj-01_1_.png', '0000W000133', b'1', 3, 'Bông tai bach kim type 2'),
(19, 'Mặt dây chuyền Bạc PNJSilver 0000A060012', 695000, 2, 'https://cdn.pnj.io/images/thumbnails/300/300/detailed/129/sm0000a060012-mat-day-chuyen-bac-pnjsilver-1.png', '0000A060012', b'1', 2, 'Mặt dây chuyền bạc type 2'),
(20, 'Mặt dây chuyền Bạc đính đá PNJSilver XM00W000025', 395000, 2, 'https://cdn.pnj.io/images/detailed/129/smxm00w000025-mat-day-chuyen-bac-dinh-da-pnjsilver-1.png', 'XM00W000025', b'1', 2, 'Mặt dây chuyền bạc type 3'),
(21, 'Mặt dây chuyền Bạch kim PNJ 0000W060000', 5790000, 2, 'https://cdn.pnj.io/images/thumbnails/300/300/detailed/112/pm0000w060000-mat-day-chuyen-bach-kim-pnj-01.png', '0000W060000', b'1', 3, 'Mặt dây chuyền bạch kim type 3'),
(22, 'Bông tai Vàng 10K đính đá ECZ STYLE By PNJ Nàng Thu XMXMY005060', 3244000, 5, 'https://cdn.pnj.io/images/thumbnails/300/300/detailed/137/gbxmxmy005060-bong-tai-vang-10k-dinh-da-ecz-style-by-pnj-trinh-collection-1.png', 'XMXMY005060', b'1', 1, 'Bông tai vàng type 2'),
(23, 'Bông tai Vàng 14K đính đá Moon PNJ MOXMH000004', 15130000, 5, 'https://cdn.pnj.io/images/thumbnails/300/300/detailed/134/gbmoxmh000004-bong-tai-vang-14k-dinh-da-moon-pnj.png', 'MOXMH000004', b'1', 3, 'Bông tai vàng type 3'),
(24, 'Nhẫn Bạch kim 10K đính đá ECZ PNJ XMXMW002545\n', 5984000, 4, 'https://cdn.pnj.io/images/thumbnails/300/300/detailed/129/gnxmxmw002545-nhan-vang-trang-10k-dinh-da-ecz-pnj-01.png', 'XMXMW002545\n', b'1', 3, 'Nhẫn bạch kim type 2'),
(25, 'Nhẫn Vàng 10K đính đá Synthetic Disney|PNJ Alice in Wonderland ZTXMX000005', 2347000, 4, 'https://cdn.pnj.io/images/thumbnails/300/300/detailed/127/gnztxmx000005-nhan-vang-10k-dinh-da-synthetic-disneypnj-alice-in-wonderland.png', 'ZTXMX000005', b'1', 1, 'Nhẫn vàng type 3'),
(26, 'Nhẫn Vàng 10K đính đá Synthetic Disney|PNJ Alice In Wonderland ZTMXX000001', 2689000, 4, 'https://cdn.pnj.io/images/thumbnails/300/300/detailed/127/gnztmxx000001-nhan-vang-10k-dinh-da-synthetic-disneypnj-alice-in-wonderland.png', 'ZTXMX000005', b'1', 1, 'Nhẫn vàng type 4'),
(27, 'Vòng tay Vàng 10K PNJ 0000Y001294', 5304000, 3, 'https://cdn.pnj.io/images/thumbnails/300/300/detailed/127/gv0000y001294-vong-tay-tre-em-vang-10k-pnj-01.png', '0000Y001294', b'1', 1, 'Vòng tay vàng type 1'),
(28, 'Vòng tay Vàng 18K PNJ 0000Y001252', 21980000, 3, 'https://cdn.pnj.io/images/thumbnails/300/300/detailed/136/gv0000y001252-vong-tay-vang-18k-pnj.png', '0000Y001252', b'1', 1, 'Vòng tay vàng type 2'),
(29, 'Vòng tay Bạch kim 10K đính đá ECZ PNJ XMXMW000723', 16390000, 3, 'https://cdn.pnj.io/images/thumbnails/300/300/detailed/127/gvxmxmw000723-vong-tay-vang-trang-10k-dinh-da-ecz-pnj-01.png', 'XMXMW000723', b'1', 3, 'Vong tày bạch kim type 2'),
(30, 'Nhẫn Bạc đính đá CZ PNJSilver Hoa của Mẹ XMXMX000009', 545000, 4, 'https://cdn.pnj.io/images/thumbnails/300/300/detailed/124/snxmxmx000009-nhan-bac-dinh-da-cz-pnjsilver-hoa-cua-me-01.png', 'XMXMX000009', b'1', 2, 'Nhẫn bạc type 4'),
(38, 'Dây cổ trẻ em Bạc Disney|PNJ Winnie The Pooh 0000C060005', 795000, 4, 'https://cdn.pnj.io/images/thumbnails/300/300/detailed/141/SC0000C060005-Day-co-tre-em-Bac-Disney-PNJ-Winnie-The-Pooh-1.png', '0000C060005', b'1', 2, 'Dây chuyền vàng type 2'),
(39, 'Dây cổ Bạc đính Mother of Pearl STYLE by PNJ PMXMC000001', 1765000, 4, 'https://cdn.pnj.io/images/thumbnails/300/300/detailed/143/SCPMXMC000001-Day-co-Bac-dinh-Mother-of-Pearl-STYLE-by-PNJ-1.png', 'XMXMY005060', b'1', 2, 'Dây chuyền bạc type 3');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_user`
--

CREATE TABLE `tbl_user` (
  `user_id` int(10) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(300) NOT NULL,
  `user_phone` varchar(15) DEFAULT NULL,
  `user_address` varchar(100) DEFAULT NULL,
  `fullname` varchar(100) NOT NULL,
  `status` bit(1) NOT NULL,
  `role` bit(1) NOT NULL DEFAULT b'0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_user`
--

INSERT INTO `tbl_user` (`user_id`, `username`, `password`, `user_phone`, `user_address`, `fullname`, `status`, `role`) VALUES
(63, 'quocthai', '202cb962ac59075b964b07152d234b70', '012345678 ', 'Tây Ninh', 'Quốc Thái', b'1', b'0'),
(78, 'tuankien', '202cb962ac59075b964b07152d234b70', '0987623044', 'Đức Hòa', 'Tuấn Kiện', b'0', b'0'),
(84, 'admin', '202cb962ac59075b964b07152d234b70', NULL, NULL, 'Tuấn Kiện', b'0', b'1'),
(102, 'vankhoi', '202cb962ac59075b964b07152d234b70', '0123456789', 'Gia Lai', 'Văn Khôi', b'0', b'0'),
(124, 'a ', ' 0cc175b9c0f1b6a831c399e269772661 ', 'a ', ' a ', 'a', b'0', b'0');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `tbl_cart`
--
ALTER TABLE `tbl_cart`
  ADD PRIMARY KEY (`user_id`,`product_id`);

--
-- Chỉ mục cho bảng `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`category_id`);

--
-- Chỉ mục cho bảng `tbl_materials`
--
ALTER TABLE `tbl_materials`
  ADD PRIMARY KEY (`material_id`);

--
-- Chỉ mục cho bảng `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`order_id`);

--
-- Chỉ mục cho bảng `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`product_id`);

--
-- Chỉ mục cho bảng `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `category_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `tbl_materials`
--
ALTER TABLE `tbl_materials`
  MODIFY `material_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `order_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT cho bảng `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `product_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT cho bảng `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=125;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
