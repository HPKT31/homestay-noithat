-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 27, 2023 lúc 02:49 AM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `noithat`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `firstname` varchar(20) NOT NULL,
  `lastname` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `Message` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `contact`
--

INSERT INTO `contact` (`id`, `firstname`, `lastname`, `email`, `Message`) VALUES
(4, 'Lê', 'Khoa', 'quaysjeu@gmail.com', 'asda'),
(5, 'Lê', 'Khoa', 'quaysjeu@gmail.com', 'asda');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danhmuc`
--

CREATE TABLE `danhmuc` (
  `id_danhmuc` int(11) NOT NULL,
  `ten` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `danhmuc`
--

INSERT INTO `danhmuc` (`id_danhmuc`, `ten`) VALUES
(1, 'Ghế đẩu'),
(2, 'Ghế dài'),
(3, 'Sofa');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoadon`
--

CREATE TABLE `hoadon` (
  `id` int(11) NOT NULL,
  `fk_user` int(11) NOT NULL,
  `fk_sanpham` int(11) NOT NULL,
  `ngaymuahang` date NOT NULL,
  `tongtien` double NOT NULL,
  `tinhtrang` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `hoadon`
--

INSERT INTO `hoadon` (`id`, `fk_user`, `fk_sanpham`, `ngaymuahang`, `tongtien`, `tinhtrang`) VALUES
(1, 19, 3, '2023-11-09', 1000000, 'Đang vận chuyển'),
(2, 27, 3, '2023-11-09', 1000000, 'Chờ xử lý');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhacungcap`
--

CREATE TABLE `nhacungcap` (
  `id` int(11) NOT NULL,
  `ten` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `nhacungcap`
--

INSERT INTO `nhacungcap` (`id`, `ten`) VALUES
(1, 'Facebook'),
(2, 'Zalo'),
(3, 'Instagram');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `ten` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `role`
--

INSERT INTO `role` (`id`, `ten`) VALUES
(1, 'admin'),
(2, 'user');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

CREATE TABLE `sanpham` (
  `id` int(11) NOT NULL,
  `ten` varchar(50) NOT NULL,
  `gia` float NOT NULL,
  `soluong` int(11) NOT NULL,
  `id_dm` int(11) NOT NULL,
  `img` varchar(300) NOT NULL,
  `view` int(11) NOT NULL,
  `tinhtrang` int(11) NOT NULL,
  `nhacungcap` int(11) NOT NULL,
  `mota` varchar(255) NOT NULL,
  `gioithieu` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`id`, `ten`, `gia`, `soluong`, `id_dm`, `img`, `view`, `tinhtrang`, `nhacungcap`, `mota`, `gioithieu`) VALUES
(1, 'Nordic Chair', 1213750, 1000, 1, 'product-1.png', 12, 1, 2, 'Ghế Nordic Chair là một dòng ghế ăn và ghế cafe sang trọng, được thiết kế theo phong cách Bắc Âu. Sản phẩm này có cấu trúc từ chất liệu da cao cấp và khung thép sơn tĩnh điện.', 'Ghế Nordic Chair là một dòng ghế ăn và ghế cafe sang trọng, được thiết kế theo phong cách Bắc Âu. Sản phẩm này có cấu trúc từ chất liệu da cao cấp và khung thép sơn tĩnh điện. Ghế Nordic Chair có nhiều màu sắc để lựa chọn như ghi, nâu, xám và được thiết kế đơn giản nhưng tinh tế. Nhà thiết kế Poul M Volther đã tạo ra một tác phẩm đẹp mắt với những đường nét không cầu kỳ nhưng tinh xảo. Ghế này rất dễ phối hợp với các loại bàn và có thể được sử dụng trong nhiều không gian khác nhau như nhà hàng, '),
(2, 'Kruzo Aero Chair 1', 1893140, 1000, 1, 'product-2.png', 7, 1, 2, '', ''),
(3, 'Ergonomic Chair', 1043820, 1000, 1, 'product-3.png', 1, 1, 2, '', ''),
(4, 'Nordic Chair 1', 1213750, 1000, 1, 'product-1.png', 0, 1, 2, '', ''),
(5, 'Kruzo Aero Chair', 1893140, 1000, 1, 'product-2.png', 0, 1, 2, '', ''),
(6, 'Ergonomic Chair 1', 1043820, 1000, 1, 'product-3.png', 0, 1, 2, '', ''),
(7, 'Nordic Chair 2', 1213750, 1000, 1, 'product-1.png', 0, 1, 2, '', ''),
(8, 'Kruzo Aero Chair 2', 1893140, 1000, 1, 'product-2.png', 0, 1, 2, '', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tinhtrang`
--

CREATE TABLE `tinhtrang` (
  `id` int(11) NOT NULL,
  `tentt` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tinhtrang`
--

INSERT INTO `tinhtrang` (`id`, `tentt`) VALUES
(1, 'Còn hàng'),
(2, 'Hết hàng');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `ten` varchar(40) NOT NULL,
  `pass` varchar(40) NOT NULL,
  `fk_role` int(11) NOT NULL,
  `email` varchar(40) NOT NULL,
  `img` varchar(300) NOT NULL,
  `taik` varchar(200) NOT NULL,
  `sdt` varchar(10) NOT NULL,
  `address` varchar(300) NOT NULL,
  `code` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`id`, `ten`, `pass`, `fk_role`, `email`, `img`, `taik`, `sdt`, `address`, `code`) VALUES
(19, 'min', '202cb962ac59075b964b07152d234b70', 2, 'khoa@gmail.com', 'admin.jpg', 'khoasadasdasdadsasdasdadasdasdad', '0', '0', ''),
(27, 'max', '202cb962ac59075b964b07152d234b70', 2, 'khoa@gmail.com', 'admin.jpg', 'khoasadasdasdadsasdasdadasdasdad', '0', '0', ''),
(31, 'admin', '202cb962ac59075b964b07152d234b70', 1, 'zấc@123', 'admin.jpg', 'admin', '8788777', '', ''),
(34, 'tai', '123', 2, 'pha31t@gmail.com', '53.jpg', 'phat', '2147483647', 'phat', ''),
(35, 'phat', '83b959282926655244495d10f565ff0f', 2, 'ndh26072004@gmail.com', 'admin.jpg', 'phat', '834361939', 'phat', 'bf5ee9');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `danhmuc`
--
ALTER TABLE `danhmuc`
  ADD PRIMARY KEY (`id_danhmuc`);

--
-- Chỉ mục cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user` (`fk_user`),
  ADD KEY `fk_sanpham` (`fk_sanpham`);

--
-- Chỉ mục cho bảng `nhacungcap`
--
ALTER TABLE `nhacungcap`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_danhmuc` (`id_dm`),
  ADD KEY `fk_tinhtrang` (`tinhtrang`),
  ADD KEY `fk_cungcap` (`nhacungcap`);

--
-- Chỉ mục cho bảng `tinhtrang`
--
ALTER TABLE `tinhtrang`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_role` (`fk_role`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `danhmuc`
--
ALTER TABLE `danhmuc`
  MODIFY `id_danhmuc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `nhacungcap`
--
ALTER TABLE `nhacungcap`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT cho bảng `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT cho bảng `tinhtrang`
--
ALTER TABLE `tinhtrang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  ADD CONSTRAINT `fk_sanpham` FOREIGN KEY (`fk_sanpham`) REFERENCES `sanpham` (`id`),
  ADD CONSTRAINT `fk_user` FOREIGN KEY (`fk_user`) REFERENCES `user` (`id`);

--
-- Các ràng buộc cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `fk_cungcap` FOREIGN KEY (`nhacungcap`) REFERENCES `nhacungcap` (`id`),
  ADD CONSTRAINT `fk_danhmuc` FOREIGN KEY (`id_dm`) REFERENCES `danhmuc` (`id_danhmuc`),
  ADD CONSTRAINT `fk_tinhtrang` FOREIGN KEY (`tinhtrang`) REFERENCES `tinhtrang` (`id`);

--
-- Các ràng buộc cho bảng `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `fk_role` FOREIGN KEY (`fk_role`) REFERENCES `role` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
