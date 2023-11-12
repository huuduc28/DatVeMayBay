-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 18, 2022 lúc 05:15 PM
-- Phiên bản máy phục vụ: 10.4.25-MariaDB
-- Phiên bản PHP: 8.1.10
CREATE DATABASE `air_ticket_management`;

CREATE DATABASE IF NOT EXISTS data CHARACTER SET 'utf8' COLLATE 'utf8_general_ci';

USE air_ticket_management;

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `air_ticket_management`
--

-- --------------------------------------------------------

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `baiviet`
--

CREATE TABLE `baiviet` (
  `mabaiviet` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `tenbaiviet` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `chitietbai` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `ngaydang` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `baiviet`
--

INSERT INTO `baiviet` (`mabaiviet`, `tenbaiviet`, `chitietbai`, `ngaydang`) VALUES
('BV01', 'Phú Quốc mùa nào đẹp?', 'Quần đảo Phú Quốc nằm trong vịnh Thái Lan, cách TP HCM khoảng 400 km về hướng tây. Nơi đây thu hút du khách trong và ngoài nước bởi các loại hình du lịch đa dạng, với tài nguyên biển, đảo phong phú; hệ sinh thái rừng, biển đa dạng.\r\n\r\nVùng biển Phú Quốc có 22 hòn đảo lớn, nhỏ, tổng diện tích khoảng 589,23 km2. Trong đó, đảo Phú Quốc lớn nhất được chia thành bắc đảo và nam đảo. Thị trấn Dương Đông nằm ở trung tâm.\r\nThời điểm lý tưởng nhất để du lịch Đảo Ngọc là từ khoảng tháng 11 đến tháng 4 năm sau. Đây là mùa khô ở phương Nam, trời ít mưa, biển lặng, sóng êm và nắng ấm thích hợp cho các hoạt động du lịch ngoài trời. Mùa này thích hợp cho những tour du lịch nghỉ dưỡng, không thích hợp cho khách đi bụi hoặc đi phượt.\r\n\r\nTừ khoảng tháng 5 đến tháng 10 là mùa mưa, đôi khi có bão nhưng Phú Quốc vẫn đông khách do rơi vào khoảng thời gian nghỉ hè. Nếu đi Phú Quốc mùa này, bạn nên đến vào khoảng cuối tháng 4, lúc này khách vẫn chưa đông và thời tiết còn đẹp, giá cả cũng không tăng quá cao ', '2022-11-12'),
('BV010', 'Đăk Lăk', 'ádasdasd', '2022-12-19'),
('BV02', 'Đà Lạt được mệnh danh là thiên đường du lịch', 'Đà Lạt được mệnh danh là thiên đường du lịch. Một xứ sở của các loài hoa thi nhau đua sắc thắm.  \r\n                    Ở Đà Lạt tập trung rất nhiều các loài hoa quý từ các nước khác nhập về. \r\n                    Tạo thêm cho Đà Lạt một vẽ đẹp huyền bí và mơ mộng tới tột cùng. \r\n                    Màng không có một thành phố nào tại nước Việt Nam ta sánh kịp với Đà Lạt.\r\n                    Đà Lạt vừa là một địa điểm du lịch lý tưởng. Vừa là một nơi nghỉ mát cực kỳ hợp lý mà không đâu sánh bằng. \r\n                    Ngoài ra khi đến mùa hè Đà Lạt lại thể hiện được sức hút quyến rủ của mình. Mà không một thành phố nào bì kịp. \r\n                    Hầu hết mọi người trên đất nước Việt Nam đều đổ bộ vào Đà Lạt vào những ngày hè. Với hai mục đích chính, thức nhất là tránh nắng nóng khắc nghiệt. \r\n                    Việc thức 2 là tham quan du lịch các địa điểm nổi tiếng tại Đà Lạt', '2022-11-11'),
('BV03', 'Giới thiệu về Hà Nội – Vùng đất nghìn năm văn hiến', 'Do có kiểu khí hậu nhiệt đới gió mùa ẩm nên đến du lịch Hà Nội, bạn có thể thưởng thức đủ 4 mùa trong năm. Mỗi mùa đều có những đặc trưng riêng, cho bạn những cảm nhận khác nhau về cuộc sống, về cảnh vật và con người nơi đây. Hà Nội vào đông lạnh thì cũng lạnh lắm, vào hè nóng thì cũng nóng lắm nhưng không vì thế mà mất đi cái đẹp. Song có lẽ, đặc biệt nhất vẫn là mùa xuân, là mùa thu Hà Nội.\r\nHà Nội từ thuở còn là Kinh thành Thăng Long cho đến nay vẫn luôn là trung tâm văn hóa lớn nhất của cả nước. Vùng đất này đã sinh ra nền văn hóa dân gian với nhiều câu chuyện truyền thuyết, nhiều câu ca dao, tục ngữ, nhiều lễ hội dân gian và cả những vị anh hùng được ca ngợi, các di tích văn hóa vật thể và phi vật thể được công nhận.\r\nMột điều khi giới thiệu về Hà Nội – một Hà Nội rất đặc biệt khi mang nhiều nền văn hóa khác nhau, và không đâu nhiều làng văn hiến như nơi này. Cùng với đó là những ngôi làng với kiến trúc Phật giáo, dân gian, kiến trúc Pháp nằm rải rắp khắp nơi, hiến du khách không khỏi thích thú khi lạc bước trên một thành phố sầm uất, phát triển như Hà Nội vẫn tìm thấy những giá trị văn hóa ngàn năm trước đó\r\nTruyền thống Hà Nội hiện hữu từ những điều nhỏ nhặt nhất, từ lời nói “cảm ơn”, “xin lỗi” đến cách chào hỏi, cách mời nhau. Tất cả đã được thống nhất trong chuẩn mực giáo dục sao cho mọi người yêu mến. Truyền thống ấy còn được thể hiện ở những làng nghề truyền thống, các con phố buôn bán các mặt hàng độc đáo như gốm Bát Tràng, phố hàng Mã, hàng Bạc,…\r\nTôn giáo, tín ngưỡng từ lâu đã trở thành một phần quan trọng trong đời sống tinh thân của người Hà Nội nói riêng và người Việt Nam nói chung. Vùng đất này có nhiều tôn giáo như: Phật giáo, Đạo giáo, Nho giáo, Đạo Tin Lành, Đạo Hồi, Cao Đài,… để phục vụ nhu cầu sinh hoạt đời sống văn hóa, tín ngưỡng của người dân.\r\nĐây là thời điểm đẹp để du lịch Hà Nội', '2022-12-19'),
('BV04', 'Nha Trang - Vẻ Đẹp Tiềm Ẩn', 'Thành phố biển Nha Trang là thủ phủ của tỉnh Khánh Hòa, thuộc miền duyên hải Nam Trung bộ Việt Nam. Vịnh biển Nha Trang là một trong những vịnh biển đẹp nhất thế giới, đó là món quà vô giá mà thiên nhiên ban tặng cho vùng đất này.\r\n\r\nTrung tâm của Tp Nha Trang được xây dựng dọc tuyến đường Trần Phú, đây là nơi sầm uất nhất của thành phố Nha Trang,. Trên tuyến đường này có rất nhiều khách sạn, quán ăn ... bên kia đường là bãi tắm tuyệt đẹp của Tp Nha Trang.\r\n\r\nChỗ nghỉ ở Nha Trang thường được xây dựng gần các bãi biển để đáp ứng nhu cầu nghỉ dưỡng, tắm biển của du khách. Chỗ nghỉ ở Nha Trang có rất nhiều loại hình gồm các khu nghỉ dưỡng ven biển, khách sạn cao cấp, khách sạn bình dân, nha trọ, homestay, căn hộ ... tất cả đều được đánh giá chất lượng rất tốt.\r\n\r\nDu khách đến với Nha trang thường yêu thích lưu trú tại khu trung tâm của Tp Nha Trang, đây là khu vực sầm uất, náo nhiệt, xung quanh có rất nhiều điểm du lịch đẹp của Nha Trang.\r\n\r\nNghỉ ở khu vực này sẽ thuận tiện cho du khách di chuyển thăm quan các điểm du lịch hấp dẫn của Nha Trang, trong đó nổi tiếng nhất là bãi biển trung tâm Nha Trang rất đẹp, du khách chỉ mất vài phút đi bộ là tới bãi biển.\r\n\r\nNgoài khu vực trung tâm, đối với du khách yêu thích sự yên tĩnh, có thể lựa chọn chỗ nghỉ ở các khu vực khác như: khu vực Bãi Dài Cam Ranh, khu vực Dốc Lết, Vịnh Ninh Vân ...\r\nĐược mệnh danh là thiên đường miền nhiệt đới, sở hữu bãi biển rất đẹp ngay trung tâm thành phố, nên những điểm du lịch, hoạt động vui chơi, giải trí Nha Trang chủ yếu là  gắn liền với biển đảo.\r\n\r\nNhững bãi biển xinh đẹp luôn tràn ngập ánh nắng, bãi cát trải dài thơ mộng và nước biển trong xanh luôn là nơi thu hút nhất ở Nha Trang', '2022-12-18'),
('BV05', 'Đăk Lăk mùa nào đẹp?', 'Đăk Lăk nằm ở trung tâm vùng Tây Nguyên, đầu nguồn của hệ thống sông Sêrêpôk và một phần của sông Ba. Vùng đất này có vẻ đẹp tự nhiên phong phú, hài hòa với những dòng sông xen lẫn núi đồi, thung lũng, rừng nguyên sinh...\r\nĐăk Lăk có hai mùa rõ rệt, mùa mưa từ tháng 5 đến tháng 10, mùa khô từ tháng 11 đến tháng 4 năm sau, nhiệt độ trung bình trong năm là 24 độ C.\r\n\r\nĐăk Lăk đẹp nhất vào khoảng cuối tháng 11, vì đã qua mùa mưa, trời thu trong xanh và mát mẻ, thác vẫn còn nhiều nước. Những tháng đầu năm thời tiết cũng dễ chịu. Cuối tháng 2 đầu tháng 3 là mùa hoa cà phê, tháng 4 là mùa hoa pơ lang (hoa gạo) đỏ rực núi đồi, tháng 11 là mùa hoa dã quỳ. Ngoài ra còn có mùa hoa lau, muồng vàng, mai anh đào... Mùa hè Tây Nguyên thường có mưa vào buổi chiều, nhưng nhanh ngớt. Do đó, bạn nên tập trung thời gian tham quan buổi sáng.\r\nCó nhiều lựa chọn về lưu trú nếu ở ngay trung tâm thành phố Buôn Ma Thuột. Khách sạn Mường Thanh, Thanh Mai Hotel, Nice, Bazan Xanh, Biệt Điện, Elephants, Sai Gon Ban Me, Hami Garden... là những cơ sở lưu trú được đánh giá cao. Giá dao động từ 300.000 đến 900.000 đồng một đêm. Một số homestay có tiếng là Zan Homestay, Lee’s House, Đồi Sao Homestay... giá từ 300.000 đến 1.200.000 đồng một đêm.\r\n\r\nNếu đi theo nhóm đông bạn có thể ở trong khu du lịch Bản Đôn hay hồ Lăk để có cảm giác hòa mình với thiên nhiên, núi rừng. Lak Tented Camp là khu nghỉ dưỡng ven hồ nổi tiếng tại Buôn Ma Thuột.', '2022-12-17'),
('BV06', 'Du lịch Sài Gòn nghe là muốn xách balo lên và đi', 'Nếu Hà Nội được biết đến là thủ đô ngàn năm văn hiến với vẻ đẹp yên bình, trầm mạc cùng nhịp sống chậm rãi thì Sài Gòn lại là thành phố của những chuyển động, sự sôi nổi, sầm uất bậc nhất cả nước nhưng lại đan xen một chút cổ kính, một chút châu Âu giữa lòng Việt Nam. Để hiểu rõ nét kết hợp độc đáo đó của Sài Gòn hoa lệ, hãy cùng VNTRIP.VN bước vào hành trình khám phá nơi đây một cách đầy đủ và trọn vẹn nhất nhé…\r\nỞ Sài Gòn, thời tiết hầu như nóng quanh năm dù không nắng nóng gay gắt như miền Bắc hay oi bức như miền Trung, nhiệt độ trung bình là 27°C và thời gian nắng đỉnh điểm nhiệt độ còn có thể lên tới hơn 40°C. Có hai mùa rõ rệt nơi đây chính là mùa mưa và mùa khô. Mùa mưa bắt đầu từ tháng 5 đến tháng 11, bạn lưu ý nếu đến đây vào thời gian này thì đừng bao giờ quên mang theo bên mình những chiếc ô bởi những cơn mưa thời gian này luôn ghé thăm bất chợt không báo trước. Mùa khô thì thường kéo dài từ tháng 12 đến tháng 4.\r\nSài Gòn luôn sầm uất và có khí hậu khá dễ chịu nên bạn hoàn toàn có thể du lịch Sài Gòn vào bất cứ thời gian nào trong năm bởi mỗi mùa, Sài Gòn đều khoác lên mình một vẻ đẹp riêng quyến rũ du khách.', '2022-12-04');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `baiviet`
--
ALTER TABLE `baiviet`
  ADD PRIMARY KEY (`mabaiviet`);
COMMIT;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `banner`
--

CREATE TABLE `banner` (
  `mabanner` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `anhbanner` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `tendangnhap` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `mabaiviet` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `banner`
--

INSERT INTO `banner` (`mabanner`, `anhbanner`, `tendangnhap`, `mabaiviet`) VALUES
('BN01', '123456', 'nhanvien1', 'BV02'),
('BN02', '123456', 'nhanvien3', 'BV01');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitietchuyenbay`
--

CREATE TABLE `chitietchuyenbay` (
  `machuyenbay` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `masanbay` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `chitietchuyenbay`
--

INSERT INTO `chitietchuyenbay` (`machuyenbay`, `masanbay`) VALUES
('FT01', 'SGN'),
('FT01', 'HAN'),
('FT01', 'VCL'),
('FT02', 'VCL'),
('FT04', 'VCL'),
('FT05', 'DLI'),
('FT07', 'DLI'),
('FT02', 'DLI'),
('FT07', 'SGN'),
('FT01', 'DLI');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chuyenbay`
--

CREATE TABLE `chuyenbay` (
  `machuyenbay` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `tenmaybay` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `ngaydi` datetime DEFAULT NULL,
  `ngayden` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `chuyenbay`
--

INSERT INTO `chuyenbay` (`machuyenbay`, `tenmaybay`, `ngaydi`, `ngayden`) VALUES
('FT01', 'Boeing 777', '2022-11-11 02:30:00', '2022-11-11 05:30:00'),
('FT02', 'Airbus A330', '2022-12-11 01:30:00', '2022-12-11 04:00:00'),
('FT03', 'Fokker 70', '2022-12-12 10:00:00', '2022-12-12 12:00:00'),
('FT04', 'ATR 72', '2022-12-13 12:20:00', '2022-12-13 21:30:00'),
('FT05', 'Boeing 777', '2022-11-18 02:30:00', '2022-11-18 05:30:00'),
('FT06', 'Airbus A330', '2022-12-19 01:30:00', '2022-12-19 04:00:00'),
('FT07', 'Fokker 70', '2022-12-12 10:00:00', '2022-12-12 12:00:00'),
('FT08', 'ATR 72', '2022-12-13 12:20:00', '2022-12-13 21:30:00'),
('FT09', 'Boeing 777', '2022-12-12 02:30:00', '2022-12-12 05:30:00'),
('FT10', 'Airbus A330', '2022-12-11 01:30:00', '2022-12-11 04:00:00'),
('FT11', 'Fokker 70', '2022-12-12 10:00:00', '2022-12-12 12:00:00'),
('FT12', 'ATR 72', '2022-12-13 12:20:00', '2022-12-13 21:30:00'),
('FT13', 'Boeing 777', '2022-11-11 02:30:00', '2022-11-11 05:30:00'),
('FT14', 'Airbus A330', '2022-12-12 01:30:00', '2022-12-12 04:00:00'),
('FT15', 'Fokker 70', '2022-12-12 10:00:00', '2022-12-12 12:00:00'),
('FT16', 'ATR 72', '2022-12-13 12:20:00', '2022-12-13 21:30:00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khachhang`
--

CREATE TABLE `khachhang` (
  `sdt` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `matkhau` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `danhxung` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `hoten` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `ngaysinh` date DEFAULT NULL,
  `cccd_passport` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `quoctich` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `gioitinh` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `khachhang`
--

INSERT INTO `khachhang` (`sdt`, `matkhau`, `danhxung`, `hoten`, `ngaysinh`, `cccd_passport`, `quoctich`, `email`, `gioitinh`) VALUES
('0378588998', '123456', 'Mr. Hữu Đức', 'Hữu', '2002-02-10', '001082546478', 'Việt Nam', 'huu@gmail.com', 'Nam'),
('0378886998', '123456', 'Mr. Hải Đức', 'Hải', '2001-02-10', '001082549988', 'Việt Nam', 'hai@gmail.com', 'Nam'),
('0378888928', '123456', 'Khôi', 'Khôi', '1998-02-10', '001082546368', 'Việt Nam', 'khoi@gmail.com', 'Nam'),
('0378888998', '123456', 'Mr. Đức', 'Hữu Đức', '2002-03-02', '001082546333', 'Việt Nam', 'khongbiet@gmail.com', 'Nam'),
('0399799999', '123456', 'Trâm', 'Trâm', '1999-02-10', '001082546798', 'Việt Nam', 'tram@gmail.com', 'Nữ'),
('0399939999', '123456', 'Mr. Ci', 'Ci', '2000-02-10', '001082546368', 'Việt Nam', 'Ci@gmail.com', 'Nam'),
('0399979999', '123456', 'Mr. Đức Hưu', 'Hữu Đức', '2002-03-02', '001082846333', 'Việt Nam', 'khongbiet@gmail.com', 'Nam'),
('0399999999', '123456', 'Mr. Hải', 'Hải', '2002-02-10', '001082546888', 'Việt Nam', 'hai@gmail.com', 'Nam');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhanvien`
--

CREATE TABLE `nhanvien` (
  `tendangnhap` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `matkhau` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `hoten` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `ngaysinh` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `nhanvien`
--

INSERT INTO `nhanvien` (`tendangnhap`, `matkhau`, `email`, `hoten`, `ngaysinh`) VALUES
('admin', '123456', '123456@gmail.com', 'A23456', '2002-02-10'),
('nhanvien1', '123456', 'khoi@gmail.com', 'Khôi', '2002-02-10'),
('nhanvien2', '123456', 'tram@gmail.com', 'Ngân Trâm', '2002-03-02'),
('nhanvien3', '123456', 'hai@gmail.com', 'Đức Hải', '2002-02-10'),
('nhanvien4', '123456', 'duc@gmail.com', 'Hữu Đức', '2002-03-02');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanbay`
--

CREATE TABLE `sanbay` (
  `masanbay` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `tensanbay` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `thanhpho` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `quocgia` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `sanbay`
--

INSERT INTO `sanbay` (`masanbay`, `tensanbay`, `thanhpho`, `quocgia`) VALUES
('BMV', 'Sân Bay Buôn Ma Thuột', 'TP Buôn Ma Thuột', 'Việt Nam'),
('CXR', 'Sân Bay Quốc Tế Cam Ranh', 'TP Cam ranh', 'Việt Nam'),
('DAD', 'Sân Bay Quốc Tế Đà Nẵng', 'TP Đà nẵng', 'Việt Nam'),
('DLI', 'Sân Bay Đà lạt', 'TP Đà lạt', 'Việt Nam'),
('HAN', 'Nội Bài', 'TP Hà Nội', 'Việt Nam'),
('PQC', 'Sân Bay Phú Quốc', 'TP Phú quốc', 'Việt Nam'),
('SGN', 'Tân Sơn Nhất', 'TP HCM', 'Việt Nam'),
('VCL', 'Sân bay Chu Lai', 'TP Chu lai', 'Việt Nam');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thanhtoan`
--

CREATE TABLE `thanhtoan` (
  `magiaodich` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `tenkhachhang` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `phuongthucthanhtoan` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `ngaygiaodich` date DEFAULT NULL,
  `sotien` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `thanhtoan`
--

INSERT INTO `thanhtoan` (`magiaodich`, `tenkhachhang`, `phuongthucthanhtoan`, `ngaygiaodich`, `sotien`) VALUES
('GD01', 'Hữu Đức', 'Paypal', '2022-11-11', 1200000),
('GD02', 'Đức Hải', 'Momo', '2022-12-10', 1000000),
('GD03', 'Nguyễn văn A', 'Paypal', '2022-12-20', 1200000),
('GD04', 'Đức Hải', 'Momo', '2022-12-10', 2200000),
('GD05', 'Lê Văn Đ', 'Paypal', '2022-12-20', 2200000),
('GD06', 'Phạm OK', 'Momo', '2022-12-10', 1000000),
('GD07', 'Hữu Đức', 'Paypal', '2022-12-20', 1200000),
('GD08', 'Trâm trâm', 'Momo', '2022-12-10', 1000000),
('GD09', 'Hữu Hữu', 'Paypal', '2022-12-20', 1200000),
('GD10', 'Lê Thị C', 'Momo', '2022-12-10', 1000000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `vemaybay`
--

CREATE TABLE `vemaybay` (
  `madatcho` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `sodienthoaikhachdangnhap` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `hotenkhachhang` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `ngaysinhkhachhang` date DEFAULT NULL,
  `sodienthoai` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cccd_passport` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `loaikhachhang` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `vitrighe` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `congvao` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `sohangly_tuixach` int(10) NOT NULL,
  `tonggiave` int(100) NOT NULL,
  `loaive` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `tinhtrang` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `ngaydat` date NOT NULL,
  `machuyenbay` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `magiaodich` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `vemaybay`
--

INSERT INTO `vemaybay` (`madatcho`, `sodienthoaikhachdangnhap`, `hotenkhachhang`, `ngaysinhkhachhang`, `sodienthoai`, `cccd_passport`, `loaikhachhang`, `vitrighe`, `congvao`, `sohangly_tuixach`, `tonggiave`, `loaive`, `tinhtrang`, `ngaydat`, `machuyenbay`, `magiaodich`) VALUES
('VE101', NULL, 'Hữu Đức', '2002-03-02', NULL, '001072546333', 'Kim cương', '12A', '02', 2, 2200000, 'Thương gia', 'Đã thanh toán', '2022-12-12', 'FT01', 'GD03'),
('VE102', '0378888998', 'Hữu Đức', '2002-03-02', NULL, '001082546333', 'Kim cương', '14A', '02', 2, 2200000, 'Thương gia', 'Đã thanh toán', '2022-12-12', 'FT01', 'GD06'),
('VE103', '0399999999', 'Hải', '2002-02-10', NULL, '001082546888', 'Kim cương', '15A', '02', 1, 2200000, 'Thương gia', 'Đã thanh toán', '2022-12-12', 'FT01', 'GD02'),
('VE104', NULL, 'Hải', '2002-02-10', NULL, '001082596888', 'Kim cương', '11A', '02', 1, 2200000, 'Thương gia', 'Đã thanh toán', '2022-11-11', 'FT01', 'GD05'),
('VE105', NULL, 'Trâm', '2002-03-02', NULL, '001082546333', 'Kim cương', '10A', '02', 2, 2200000, 'Thương gia', 'Đã thanh toán', '2022-11-11', 'FT02', 'GD04'),
('VE106', '0399979999', 'Khôi', '2002-02-10', NULL, '001082516888', 'Kim cương', '15B', '02', 1, 500000, 'Bình dân', 'Đã thanh toán', '2022-11-11', 'FT01', 'GD08'),
('VE107', '0378886998', 'Hữu Hải', '2002-03-02', NULL, '005082546333', 'Bạc', '14B', '02', 2, 2600000, 'Thương gia', 'Đã thanh toán', '2022-11-11', 'FT09', 'GD01'),
('VE108', '0399939999', 'Hải Đức', '2002-02-10', NULL, '004082546888', 'Kim cương', '15A', '02', 1, 2200000, 'Thương gia', 'Đã thanh toán', '2022-11-12', 'FT01', 'GD07'),
('VE109', '0378588998', 'Hữu Hữu', '2002-03-02', NULL, '006082546333', 'Bạc', '11B', '02', 2, 4200000, 'Thương gia', 'Đã thanh toán', '2022-12-12', 'FT05', 'GD08'),
('VE110', '0399799999', 'Hải Hải', '2002-02-10', NULL, '003082546888', 'Kim cương', '15C', '02', 1, 2200000, 'Thương gia', 'Đã thanh toán', '2022-12-12', 'FT01', 'GD02'),
('VE111', NULL, 'Đức Đức', '1990-03-02', NULL, '009082546333', 'Kim cương', '14C', '02', 2, 200000, 'Thương gia', 'Đã thanh toán', '2022-12-12', 'FT07', 'GD06'),
('VE112', NULL, 'Trâm trâm', '2002-02-10', NULL, '001082746888', 'Kim cương', '11C', '02', 1, 2200000, 'Thương gia', 'Đã thanh toán', '2022-09-09', 'FT09', 'GD08'),
('VE113', '0378888928', 'Khôi ', '2001-03-02', NULL, '001082546333', 'Kim cương', '16A', '02', 2, 200000, 'Bình dân', 'Đã thanh toán', '2022-09-09', 'FT03', 'GD02'),
('VE114', NULL, 'Nguyễn văn A', '2002-02-10', NULL, '001087546888', 'Kim cương', '15A', '02', 1, 2200000, 'Thương gia', 'Đã thanh toán', '2022-09-09', 'FT01', 'GD07'),
('VE115', NULL, 'Trần Tăn B', '2003-03-02', NULL, '001082549333', 'Vàng', '17A', '02', 2, 2200000, 'Thương gia', 'Đã thanh toán', '2022-12-12', 'FT06', 'GD02'),
('VE116', NULL, 'Lê Thị C', '2000-02-10', NULL, '001082546688', 'Vàng', '19A', '02', 1, 2200000, 'Thương gia', 'Đã thanh toán', '2022-12-12', 'FT01', 'GD09'),
('VE117', NULL, 'Hữu Đức', '2002-03-02', NULL, '001082547333', 'Kim cương', '19B', '02', 2, 2200000, 'Thương gia', 'Đã thanh toán', '2022-08-08', 'FT01', 'GD02'),
('VE118', NULL, 'Lê Văn Đ', '2002-02-10', NULL, '001086546888', 'Bạch kim', '20A', '02', 1, 200000, 'Bình dânThương gia', 'Đã thanh toán', '2022-08-08', 'FT01', 'GD07'),
('VE119', NULL, 'Phạm OK', '1990-03-02', NULL, '001082346333', 'Kim cương', '09C', '02', 2, 2700000, 'Thương gia', 'Đã thanh toán', '2022-12-12', 'FT06', 'GD01'),
('VE120', NULL, 'Trần H', '2002-02-10', NULL, '001082576888', 'Đồng', '15D', '02', 1, 2200000, 'Thương gia', 'Đã thanh toán', '2022-12-12', 'FT04', 'GD07');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `baiviet`
--
ALTER TABLE `baiviet`
  ADD PRIMARY KEY (`mabaiviet`);

--
-- Chỉ mục cho bảng `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`mabanner`),
  ADD KEY `banner_ibfk_1` (`tendangnhap`),
  ADD KEY `banner_ibfk_2` (`mabaiviet`);

--
-- Chỉ mục cho bảng `chitietchuyenbay`
--
ALTER TABLE `chitietchuyenbay`
  ADD KEY `chitietchuyenbay_ibfk_1` (`masanbay`),
  ADD KEY `chitietchuyenbay_ibfk_2` (`machuyenbay`);

--
-- Chỉ mục cho bảng `chuyenbay`
--
ALTER TABLE `chuyenbay`
  ADD PRIMARY KEY (`machuyenbay`);

--
-- Chỉ mục cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`sdt`);

--
-- Chỉ mục cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD PRIMARY KEY (`tendangnhap`);

--
-- Chỉ mục cho bảng `sanbay`
--
ALTER TABLE `sanbay`
  ADD PRIMARY KEY (`masanbay`);

--
-- Chỉ mục cho bảng `thanhtoan`
--
ALTER TABLE `thanhtoan`
  ADD PRIMARY KEY (`magiaodich`);

--
-- Chỉ mục cho bảng `vemaybay`
--
ALTER TABLE `vemaybay`
  ADD PRIMARY KEY (`madatcho`),
  ADD KEY `sodienthoaikhachdangnhap` (`sodienthoaikhachdangnhap`),
  ADD KEY `machuyenbay` (`machuyenbay`),
  ADD KEY `magiaodich` (`magiaodich`);

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `banner`
--
ALTER TABLE `banner`
  ADD CONSTRAINT `banner_ibfk_1` FOREIGN KEY (`tendangnhap`) REFERENCES `nhanvien` (`tendangnhap`),
  ADD CONSTRAINT `banner_ibfk_2` FOREIGN KEY (`mabaiviet`) REFERENCES `baiviet` (`mabaiviet`);

--
-- Các ràng buộc cho bảng `chitietchuyenbay`
--
ALTER TABLE `chitietchuyenbay`
  ADD CONSTRAINT `chitietchuyenbay_ibfk_1` FOREIGN KEY (`masanbay`) REFERENCES `sanbay` (`masanbay`),
  ADD CONSTRAINT `chitietchuyenbay_ibfk_2` FOREIGN KEY (`machuyenbay`) REFERENCES `chuyenbay` (`machuyenbay`);

--
-- Các ràng buộc cho bảng `vemaybay`
--
ALTER TABLE `vemaybay`
  ADD CONSTRAINT `vemaybay_ibfk_1` FOREIGN KEY (`sodienthoaikhachdangnhap`) REFERENCES `khachhang` (`sdt`),
  ADD CONSTRAINT `vemaybay_ibfk_2` FOREIGN KEY (`machuyenbay`) REFERENCES `chuyenbay` (`machuyenbay`),
  ADD CONSTRAINT `vemaybay_ibfk_3` FOREIGN KEY (`magiaodich`) REFERENCES `thanhtoan` (`magiaodich`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
