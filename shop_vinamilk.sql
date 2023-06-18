-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th6 14, 2023 lúc 11:05 AM
-- Phiên bản máy phục vụ: 10.4.27-MariaDB
-- Phiên bản PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `shop_vinamilk`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `customers`
--

CREATE TABLE `customers` (
  `Customer_ID` int(11) NOT NULL,
  `Customer_Name` varchar(100) DEFAULT NULL,
  `Shipping_Address` varchar(200) DEFAULT NULL,
  `Phone` varchar(20) DEFAULT NULL,
  `username` varchar(20) DEFAULT NULL,
  `password` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `customers`
--

INSERT INTO `customers` (`Customer_ID`, `Customer_Name`, `Shipping_Address`, `Phone`, `username`, `password`) VALUES
(1, 'User1', 'Hà Nội', '0982758208', 'son123', '123'),
(2, 'son1', 'Hà Nội', '019319311', 'son', '123');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_items`
--

CREATE TABLE `order_items` (
  `OrderItemID` int(11) NOT NULL,
  `CustomerID` varchar(20) DEFAULT NULL,
  `ProductID` varchar(20) DEFAULT NULL,
  `Quantity` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `order_items`
--

INSERT INTO `order_items` (`OrderItemID`, `CustomerID`, `ProductID`, `Quantity`) VALUES
(10, '1', '7', 5),
(11, '1', '10', 1),
(12, '1', '12', 1),
(13, '2', '8', 1),
(14, '2', '9', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `Product_ID` int(11) NOT NULL,
  `Image` varchar(250) DEFAULT NULL,
  `Product_Name` varchar(100) DEFAULT NULL,
  `Pro_quantity` int(11) DEFAULT NULL,
  `Price` decimal(10,3) DEFAULT NULL,
  `Entry_Price` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`Product_ID`, `Image`, `Product_Name`, `Pro_quantity`, `Price`, `Entry_Price`) VALUES
(7, 'anh2.jpg', 'Sua bot', 250, '300.000', '250.00'),
(8, 'anh3.jpg', 'Sua tuoi tiet trung', 200, '33.000', '23.00'),
(9, 'anh4.jpg', 'Sua ong tho', 150, '18.000', '10.00'),
(10, 'anh5.jpg', 'Bot an dam', 120, '67.000', '55.00'),
(11, 'anh6.jpg', 'Sua chua uong', 180, '25.000', '15.00'),
(12, 'anh7.jpg', 'Sua dau nanh', 90, '27.000', '15.00'),
(13, 'anh8.jpg', 'Nuoc ep', 250, '42.000', '30.00'),
(14, 'anh9.jpg', 'Nuoc dua tuoi', 170, '19.900', '12.00'),
(15, 'anh10.jpg', 'Sua chua nep cam', 200, '32.133', '25.00'),
(16, 'anh11.png', 'Sua Grow Plus To Yen', 150, '680.000', '590.00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `receive`
--

CREATE TABLE `receive` (
  `id_receive` int(11) NOT NULL,
  `name_receive` varchar(50) NOT NULL,
  `phone_receive` bigint(20) NOT NULL,
  `add_receive` varchar(255) NOT NULL,
  `order_item` int(11) DEFAULT NULL,
  `money` decimal(10,3) NOT NULL,
  `customerid` int(11) NOT NULL,
  `status` varchar(110) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `receive`
--

INSERT INTO `receive` (`id_receive`, `name_receive`, `phone_receive`, `add_receive`, `order_item`, `money`, `customerid`, `status`) VALUES
(13, 'Lê Sơn', 983111222, ' Địa chỉ nhận', 12, '109.000', 1, 'not delivery');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`Customer_ID`);

--
-- Chỉ mục cho bảng `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`OrderItemID`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`Product_ID`);

--
-- Chỉ mục cho bảng `receive`
--
ALTER TABLE `receive`
  ADD PRIMARY KEY (`id_receive`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `customers`
--
ALTER TABLE `customers`
  MODIFY `Customer_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `order_items`
--
ALTER TABLE `order_items`
  MODIFY `OrderItemID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `Product_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT cho bảng `receive`
--
ALTER TABLE `receive`
  MODIFY `id_receive` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
