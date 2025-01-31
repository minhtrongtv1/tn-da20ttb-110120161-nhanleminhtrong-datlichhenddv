-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th7 31, 2024 lúc 05:17 PM
-- Phiên bản máy phục vụ: 10.4.27-MariaDB
-- Phiên bản PHP: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `datlich`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `banner`
--

CREATE TABLE `banner` (
  `id_banner` int(11) NOT NULL,
  `banner` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `banner`
--

INSERT INTO `banner` (`id_banner`, `banner`) VALUES
(1, 'bg.png'),
(2, 'bia1.png'),
(3, 'bia3.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_admintong`
--

CREATE TABLE `tbl_admintong` (
  `id_admintong` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_admintong`
--

INSERT INTO `tbl_admintong` (`id_admintong`, `username`, `password`) VALUES
(1, 'admin', 'c4ca4238a0b923820dcc509a6f75849b');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_booking`
--

CREATE TABLE `tbl_booking` (
  `id_booking` int(11) NOT NULL,
  `id_lichhen` int(11) NOT NULL,
  `id_khachhang` int(11) NOT NULL,
  `id_quanly` int(11) NOT NULL,
  `tinhtrang` int(11) NOT NULL,
  `duocduyet` int(11) NOT NULL,
  `ngayhen` varchar(100) NOT NULL,
  `giohen` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_booking`
--

INSERT INTO `tbl_booking` (`id_booking`, `id_lichhen`, `id_khachhang`, `id_quanly`, `tinhtrang`, `duocduyet`, `ngayhen`, `giohen`) VALUES
(18, 5, 5, 1, 1, 1, '', ''),
(21, 5, 7, 1, 1, 1, '', ''),
(22, 5, 8, 1, 1, 1, '', ''),
(23, 5, 9, 1, 1, 1, '', ''),
(24, 5, 6, 1, 1, 1, '', ''),
(25, 9, 5, 1, 1, 1, '', ''),
(26, 9, 6, 1, 1, 1, '', ''),
(27, 9, 10, 1, 1, 1, '', ''),
(28, 9, 7, 1, 1, 1, '', ''),
(29, 9, 8, 1, 1, 1, '', ''),
(30, 6, 5, 2, 1, 1, '', ''),
(31, 6, 4, 2, 1, 1, '', ''),
(32, 6, 6, 2, 1, 1, '', ''),
(33, 6, 10, 2, 1, 1, '', ''),
(34, 10, 4, 2, 1, 1, '', ''),
(35, 10, 10, 2, 1, 1, '', ''),
(36, 10, 5, 2, 1, 1, '', ''),
(37, 10, 6, 2, 1, 1, '', ''),
(45, 11, 10, 2, 1, 1, '', ''),
(46, 11, 5, 2, 1, 0, '', ''),
(47, 13, 4, 2, 1, 1, '2024-07-23', '9h00-10h00'),
(49, 23, 4, 4, 1, 0, '2024-07-23', '14h00-15h00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_khachhang`
--

CREATE TABLE `tbl_khachhang` (
  `id_khachhang` int(11) NOT NULL,
  `hovaten` varchar(250) NOT NULL,
  `taikhoan` varchar(100) NOT NULL,
  `matkhau` varchar(100) NOT NULL,
  `sodienthoai` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `diachi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_khachhang`
--

INSERT INTO `tbl_khachhang` (`id_khachhang`, `hovaten`, `taikhoan`, `matkhau`, `sodienthoai`, `email`, `diachi`) VALUES
(4, 'Nhan Lê Minh Trọng', 'minhtrong', 'e10adc3949ba59abbe56e057f20f883e', 762887908, 'minhtrongtv1@gmail.com', 'Tra Vinh'),
(5, 'Lê Đình Hiếu', 'dinhhieu', 'c4ca4238a0b923820dcc509a6f75849b', 383113789, 'trunghieu@gmail.com', 'Trà Vinh'),
(6, 'Đặng Thị Quế Chi', 'quechi', 'c4ca4238a0b923820dcc509a6f75849b', 37445681, 'minhtrongtv123@gmail.com', 'Trà Vinh'),
(7, 'Trần Thanh Nhã', 'thanhnha', 'c4ca4238a0b923820dcc509a6f75849b', 356998428, 'thanhnha@gmail.com', 'Trà Vinh'),
(8, 'Nguyễn Bá Hoàng Du', 'hoangdu', 'c4ca4238a0b923820dcc509a6f75849b', 394336824, 'hoangdu@gmail.com', 'Trà Vinh'),
(9, 'Phạm Kiều Diễm Trinh', 'diemtrinh', 'c4ca4238a0b923820dcc509a6f75849b', 383664950, 'diemtrinh@gmail.com', 'Trà Vinh'),
(10, 'Trịnh Tuấn Vũ', 'tuanvu', 'c4ca4238a0b923820dcc509a6f75849b', 383446985, 'haibaconech147@gmail.com', 'Trà Vinh');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_lichhen`
--

CREATE TABLE `tbl_lichhen` (
  `id_lichhen` int(11) NOT NULL,
  `malichhen` varchar(100) NOT NULL,
  `tenlichhen` varchar(255) NOT NULL,
  `hinhanh` varchar(255) NOT NULL,
  `tomtat` tinytext NOT NULL,
  `noidung` longtext NOT NULL,
  `id_vaitro` int(11) NOT NULL,
  `diachi` varchar(255) NOT NULL,
  `tencoquan` varchar(255) NOT NULL,
  `tenquanly` varchar(255) NOT NULL,
  `gio` varchar(100) NOT NULL,
  `ngay` date NOT NULL,
  `id_quanly` int(11) NOT NULL,
  `trangthai_duyet` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_lichhen`
--

INSERT INTO `tbl_lichhen` (`id_lichhen`, `malichhen`, `tenlichhen`, `hinhanh`, `tomtat`, `noidung`, `id_vaitro`, `diachi`, `tencoquan`, `tenquanly`, `gio`, `ngay`, `id_quanly`, `trangthai_duyet`) VALUES
(5, '', 'Công chứng giấy tờ đất', 'congchung.jpg', 'Công chứng đất', 'Đ', 1, 'Trà Vinh', 'Phòng công chứng số 1', 'Lâm Trung Đức', '8h00-9h00', '2024-07-07', 1, 0),
(6, '', 'Khám tổng quát', 'yt1.jpg', 'Khám tổng quát', 'Khám tổng quát', 3, 'Trà Vinh', 'Bệnh viện quân y số 1', 'Nhan Lê Minh Trọng', '9h00-10h00', '2024-07-08', 2, 1),
(9, '', 'Công chứng giấy tờ đất', 'congchung1.jpg', 'Công chứng đất', 'Công chứng đất', 1, 'Trà Vinh', 'Phòng công chứng số 1', 'Lâm Trung Đức', '14h00-15h00', '2024-07-12', 1, 1),
(10, '', 'Test', 'background_body.jpg', 'tesst', '123', 3, 'Trà Vinh', 'Trung Tâm Tiêm Chủng VNVC Trà Vinh', 'Nhan Lê Minh Trọng', '10h00-11h00', '2024-07-16', 2, 1),
(11, '', 'Vắc xin Viêm gan B ( cho bé dưới 1 tuổi)', 'yt1.jpg', 'Viêm gan B là bệnh do virus viêm gan B gây ra, loại virus này có thể lây truyền qua đường máu, qua quan hệ tình dục và từ mẹ truyền sang con. Dù có cùng cách thức truyền bệnh với virus HIV nhưng khả năng lâ', 'Vắc-xin phòng viêm gan B giúp ngăn ngừa bệnh viêm gan B và các hậu quả như xơ gan, ung thư gan. Vắc-xin phòng viêm gan B được khuyến cáo sử dụng cho tất cả người lớn và trẻ em có nguy cơ tiếp xúc với virus viêm gan B. Tuy nhiên, việc tiêm chủng rộng rãi vắc-xin phòng viêm gan B sẽ góp phần kiểm soát viêm gan B trong cộng đồng và giảm tỉ lệ viêm gan D do viêm gan D không thể xảy ra nếu không bị nhiễm viêm gan B.', 3, 'Trung tâm thương mại Go!, Võ Nguyên Giáp, phường 07, Trà Vinh', 'Trung Tâm Tiêm Chủng VNVC Trà Vinh', 'Nhan Lê Minh Trọng', '8h00-9h00', '2024-07-21', 2, 1),
(12, '', 'Tiêm Vắc xin ngừa Lao (cho trẻ sơ sinh)', 'images.jpg', 'Bệnh lao do trực khuẩn lao có tên là Mycobacterium Tuberculosis (MTB) gây ra. Đây là loại trực khuẩn có thể lây truyền qua không khí, tức là nếu hít chung bầu không khí với người bị mắc bệnh lao thì nguy c', 'Việc chậm trễ tiêm vắc xin phòng bệnh lao cho trẻ sơ sinh có thể làm tăng nguy cơ mắc bệnh lao hơn những trẻ đã được tiêm; thậm chí trẻ có thể nhiễm lao ngay những ngày đầu sau sinh do lúc này hệ thống miễn dịch của trẻ còn yếu ớt nên không có đủ khả năng tự bảo vệ cơ thể trước mọi tác nhân xâm nhập – nhất là lao và các loại vi khuẩn khác.', 3, 'Trung tâm thương mại Go!, Võ Nguyên Giáp, phường 07, Trà Vinh', 'Trung Tâm Tiêm Chủng VNVC Trà Vinh', 'Nhan Lê Minh Trọng', '14h00-15h00', '2024-07-20', 2, 0),
(13, '', 'Tiêm Vắc xin Viêm gan B (cho trẻ em) fix', 'images.jpg', 'Viêm gan B là bệnh do virus viêm gan B gây ra, loại virus này có thể lây truyền qua đường máu, qua quan hệ tình dục và từ mẹ truyền sang con. Dù có cùng cách thức truyền bệnh với virus HIV nhưng khả năng lâ', 'test', 3, 'Trung tâm thương mại Go!, Võ Nguyên Giáp, phường 07, Trà Vinh', 'Trung Tâm Tiêm Chủng VNVC Trà Vinh', 'Nhan Lê Minh Trọng', '9h00-10h00', '2024-07-23', 2, 1),
(15, '', 'Tiêm Vắc xin Viêm gan B (cho trẻ em) hoản chỉnh', 'yt1.jpg', 'Viêm gan B là bệnh do virus viêm gan B gây ra, loại virus này có thể lây truyền qua đường máu, qua quan hệ tình dục và từ mẹ truyền sang con. Dù có cùng cách thức truyền bệnh với virus HIV nhưng khả năng lâ', 'fix hoàn chỉnh', 3, 'Trung tâm thương mại Go!, Võ Nguyên Giáp, phường 07, Trà Vinh', 'Trung Tâm Tiêm Chủng VNVC Trà Vinh', 'Nhan Lê Minh Trọng', '15h00-16h00', '2024-07-26', 2, 0),
(19, '', 'Tiêm Vắc xin Viêm gan B (cho trẻ em) mới', 'yt1.jpg', '123', 'test', 3, 'Trung tâm thương mại Go!, Võ Nguyên Giáp, phường 07, Trà Vinh', 'Trung Tâm Tiêm Chủng VNVC Trà Vinh', 'Nhan Lê Minh Trọng', '13h00-14h00', '2024-07-23', 2, 0),
(20, '', 'Tiêm Vắc xin Viêm gan B (cho trẻ em) mới 123', 'images.jpg', 'Viêm gan B là bệnh do virus viêm gan B gây ra, loại virus này có thể lây truyền qua đường máu, qua quan hệ tình dục và từ mẹ truyền sang con. Dù có cùng cách thức truyền bệnh với virus HIV nhưng khả năng lâ', 'test', 3, 'Trung tâm thương mại Go!, Võ Nguyên Giáp, phường 07, Trà Vinh', 'Trung Tâm Tiêm Chủng VNVC Trà Vinh', 'Nhan Lê Minh Trọng', '13h00-14h00', '2024-07-24', 2, 0),
(21, '', 'Công chứng giấy tờ hôn nhân (mới)', 'images.jpg', 'test', 'test', 1, '162 Lê Lợi, Phường 1, Trà Vinh', 'Ủy Ban Nhân Dân Phường 1', 'Nguyễn Văn An', '10h00-11h00', '2024-07-23', 3, 0),
(22, '', 'Đăng kiểm xe cơ giới', 'dangkiem.png', 'test', 'test', 2, '151 Nguyễn Đáng – P.7 – TX Trà Vinh – Trà Vinh', 'CHI CỤC ĐĂNG KIỂM TRÀ VINH', 'Minh Trọng', '10h00-11h00', '2024-07-23', 4, 0),
(23, '', 'Đăng kiểm xe cơ giới (mới)', 'dangkiem.png', 'Đăng kiểm xe cơ giới', 'test 123', 2, '151 Nguyễn Đáng – P.7 – TX Trà Vinh – Trà Vinh', 'CHI CỤC ĐĂNG KIỂM TRÀ VINH', 'Minh Trọng', '14h00-15h00', '2024-07-23', 4, 0),
(24, '', 'Đăng kiểm xe cơ giới', 'dangkiem.png', 'test', 'test', 2, '151 Nguyễn Đáng – P.7 – TX Trà Vinh – Trà Vinh', 'CHI CỤC ĐĂNG KIỂM TRÀ VINH', 'Minh Trọng', '15h00-16h00', '2024-07-24', 4, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_quanly`
--

CREATE TABLE `tbl_quanly` (
  `id_quanly` int(11) NOT NULL,
  `tenquanly` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_vaitro` int(10) NOT NULL,
  `chucvu` int(11) NOT NULL,
  `trangthai_dn` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_quanly`
--

INSERT INTO `tbl_quanly` (`id_quanly`, `tenquanly`, `username`, `password`, `id_vaitro`, `chucvu`, `trangthai_dn`) VALUES
(1, 'Lâm Trung Đức', 'trungduc', 'c4ca4238a0b923820dcc509a6f75849b', 1, 1, 1),
(2, 'Nhan Lê Minh Trọng', 'minhtrong', 'c4ca4238a0b923820dcc509a6f75849b', 3, 0, 1),
(3, 'Nguyễn Văn An', 'vanan', 'c4ca4238a0b923820dcc509a6f75849b', 1, 0, 1),
(4, 'Minh Trọng', 'trong', 'c4ca4238a0b923820dcc509a6f75849b', 2, 0, 1),
(5, 'Nguyễn Văn C', 'vanc', 'c4ca4238a0b923820dcc509a6f75849b', 2, 1, 1),
(6, 'Nguyễn Văn D', 'vand', 'c4ca4238a0b923820dcc509a6f75849b', 3, 1, 1),
(7, 'Phòng công chứng số 1', 'congchung1', 'c4ca4238a0b923820dcc509a6f75849b', 1, 1, 1),
(8, 'nguyen van n', 'vann', 'c4ca4238a0b923820dcc509a6f75849b', 1, 0, 0),
(9, 'nguyen van 1', 'van1', 'c4ca4238a0b923820dcc509a6f75849b', 1, 0, 0),
(10, 'Nguyễn Văn 10', 'van10', 'c4ca4238a0b923820dcc509a6f75849b', 1, 0, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_vaitro`
--

CREATE TABLE `tbl_vaitro` (
  `id_vaitro` int(11) NOT NULL,
  `tenvaitro` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_vaitro`
--

INSERT INTO `tbl_vaitro` (`id_vaitro`, `tenvaitro`) VALUES
(1, 'Công chứng'),
(2, 'Đăng kiểm'),
(3, 'Y tế');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`id_banner`);

--
-- Chỉ mục cho bảng `tbl_admintong`
--
ALTER TABLE `tbl_admintong`
  ADD PRIMARY KEY (`id_admintong`);

--
-- Chỉ mục cho bảng `tbl_booking`
--
ALTER TABLE `tbl_booking`
  ADD PRIMARY KEY (`id_booking`),
  ADD KEY `fk_lichhen` (`id_lichhen`),
  ADD KEY `fk_khachhang` (`id_khachhang`),
  ADD KEY `fk_ql` (`id_quanly`);

--
-- Chỉ mục cho bảng `tbl_khachhang`
--
ALTER TABLE `tbl_khachhang`
  ADD PRIMARY KEY (`id_khachhang`);

--
-- Chỉ mục cho bảng `tbl_lichhen`
--
ALTER TABLE `tbl_lichhen`
  ADD PRIMARY KEY (`id_lichhen`),
  ADD KEY `fk_vaitro` (`id_vaitro`),
  ADD KEY `fk_quanly` (`id_quanly`);

--
-- Chỉ mục cho bảng `tbl_quanly`
--
ALTER TABLE `tbl_quanly`
  ADD PRIMARY KEY (`id_quanly`),
  ADD KEY `fk_vt` (`id_vaitro`);

--
-- Chỉ mục cho bảng `tbl_vaitro`
--
ALTER TABLE `tbl_vaitro`
  ADD PRIMARY KEY (`id_vaitro`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `banner`
--
ALTER TABLE `banner`
  MODIFY `id_banner` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `tbl_admintong`
--
ALTER TABLE `tbl_admintong`
  MODIFY `id_admintong` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `tbl_booking`
--
ALTER TABLE `tbl_booking`
  MODIFY `id_booking` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT cho bảng `tbl_khachhang`
--
ALTER TABLE `tbl_khachhang`
  MODIFY `id_khachhang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `tbl_lichhen`
--
ALTER TABLE `tbl_lichhen`
  MODIFY `id_lichhen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT cho bảng `tbl_quanly`
--
ALTER TABLE `tbl_quanly`
  MODIFY `id_quanly` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `tbl_vaitro`
--
ALTER TABLE `tbl_vaitro`
  MODIFY `id_vaitro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `tbl_booking`
--
ALTER TABLE `tbl_booking`
  ADD CONSTRAINT `fk_khachhang` FOREIGN KEY (`id_khachhang`) REFERENCES `tbl_khachhang` (`id_khachhang`),
  ADD CONSTRAINT `fk_lichhen` FOREIGN KEY (`id_lichhen`) REFERENCES `tbl_lichhen` (`id_lichhen`),
  ADD CONSTRAINT `fk_ql` FOREIGN KEY (`id_quanly`) REFERENCES `tbl_quanly` (`id_quanly`);

--
-- Các ràng buộc cho bảng `tbl_lichhen`
--
ALTER TABLE `tbl_lichhen`
  ADD CONSTRAINT `fk_quanly` FOREIGN KEY (`id_quanly`) REFERENCES `tbl_quanly` (`id_quanly`),
  ADD CONSTRAINT `fk_vaitro` FOREIGN KEY (`id_vaitro`) REFERENCES `tbl_vaitro` (`id_vaitro`);

--
-- Các ràng buộc cho bảng `tbl_quanly`
--
ALTER TABLE `tbl_quanly`
  ADD CONSTRAINT `fk_vt` FOREIGN KEY (`id_vaitro`) REFERENCES `tbl_vaitro` (`id_vaitro`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
