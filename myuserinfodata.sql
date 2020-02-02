-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th2 01, 2020 lúc 10:45 AM
-- Phiên bản máy phục vụ: 10.1.37-MariaDB
-- Phiên bản PHP: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `myuserinfodata`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `servicedata`
--

CREATE TABLE `servicedata` (
  `id` int(255) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `img_src` varchar(255) NOT NULL,
  `profile` text CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `price_normal` int(255) NOT NULL,
  `price_vip` int(255) NOT NULL,
  `price_vip2` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `servicedata`
--

INSERT INTO `servicedata` (`id`, `name`, `img_src`, `profile`, `price_normal`, `price_vip`, `price_vip2`) VALUES
(1, 'Ha Long Bay', 'halong.jpg', 'Ha Long Bay\r\nHa Long Bay is known not only as a UNESCO world heritage site but also as one of the world famous natural wonders. But few people know that Ha Long Bay Complex consists of two other beautiful pristine bays, Lan Ha Bay and Bai Tu Long Bay (hereinafter referred to as Halong Bay Complex, Ha Long Bay).\r\nWith many beautiful landscapes, diverse flora and fauna of great archeological and geological significance, with wooden stamps associated with cultural and historical values and near the international gateway, Ha Long Bay is considered. is one of the most famous places in Vietnam for foreign tourists.', 1000000, 2000000, 2500000),
(2, 'Hoan Kiem lake', 'boho.jpg', 'Hoan Kiem Lake\r\nHo Guom has always accompanied the development history of the Vietnamese nation from past to present. The name of Hoan Kiem was officially appeared in the early 15th century associated with the legend of King Le Thai To return the precious sword to the Turtle Turtle after borrowing a sword to fight, defeating the Ming enemy, officially becoming a king and establishing a dynasty. Le prosperity', 250000, 500000, 750000),
(3, 'Van Mieu Quoc Tu Giam', 'vanmieu.jpg', 'Temple of Literature - Quoc Tu Giam is the leading diverse and diverse complex of relics of Hanoi city, located south of Thang Long Citadel. This place has been included in the list of 23 special national monuments by the Prime Minister of Vietnam.', 300000, 450000, 600000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_comment`
--

CREATE TABLE `tbl_comment` (
  `service_id` int(255) NOT NULL,
  `comment_id` int(11) NOT NULL,
  `parent_comment_id` int(11) NOT NULL,
  `comment` varchar(255) CHARACTER SET utf8 NOT NULL,
  `comment_sender_name` varchar(50) CHARACTER SET utf8 NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `userdata`
--

CREATE TABLE `userdata` (
  `id` int(255) NOT NULL,
  `user` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `comment` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `userdata`
--

INSERT INTO `userdata` (`id`, `user`, `email`, `mobile`, `comment`) VALUES
(1, 'Hiep', 'hiepbkcntt@gmail.com', '0399685122', 'I like dog.'),
(8, 'Nguyen Van Ha', 'abc@gmail.com', '0123456789', 'I like cat!'),
(9, 'Hanh', 'hanh@gmail.com', '0123235235', 'I like chicken!'),
(10, '', '', '', '');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `servicedata`
--
ALTER TABLE `servicedata`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tbl_comment`
--
ALTER TABLE `tbl_comment`
  ADD PRIMARY KEY (`comment_id`);

--
-- Chỉ mục cho bảng `userdata`
--
ALTER TABLE `userdata`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `servicedata`
--
ALTER TABLE `servicedata`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `tbl_comment`
--
ALTER TABLE `tbl_comment`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `userdata`
--
ALTER TABLE `userdata`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
