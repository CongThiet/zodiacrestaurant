-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th6 28, 2017 lúc 01:11 CH
-- Phiên bản máy phục vụ: 10.1.21-MariaDB
-- Phiên bản PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `restaurant_db`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `category` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id`, `category`, `created_at`, `updated_at`) VALUES
(1, 'bánh', NULL, NULL),
(2, 'nước hoa quả', NULL, NULL),
(3, 'nem - chạo', NULL, NULL),
(4, 'cơm', NULL, NULL),
(5, 'chè', NULL, NULL),
(6, 'bún', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `contacts`
--

CREATE TABLE `contacts` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `customers`
--

CREATE TABLE `customers` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `note` text,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `customers`
--

INSERT INTO `customers` (`id`, `user_id`, `name`, `gender`, `address`, `phone`, `note`, `created_at`, `updated_at`) VALUES
(1, 1, 'Trần Văn An', 'Nam', 'Nam Từ Liêm - Hà Nội', '0946278350', 'Giao hàng ngay tối nay nhé cửa hàng', '2017-06-27 18:58:06', '2017-06-27 18:58:06'),
(2, 1, 'Vũ Thị Cúc', 'Nam', 'Nam Từ Liêm - Hà Nội', '0946278350', 'Cần vào trưa nay', '2017-06-27 18:58:44', '2017-06-27 18:58:44'),
(3, 1, 'Trần An', 'Nam', 'Nam Từ Liêm - Hà Nội', '0987654321', 'Giao hàng trưa nay', '2017-06-27 19:01:41', '2017-06-27 19:01:41'),
(4, 1, 'Trần Văn An', 'Nam', 'Nam Từ Liêm - Hà Nội', '0946278350', 'cần vào lúc 11h trưa nay', '2017-06-27 19:08:48', '2017-06-27 19:08:48'),
(5, 1, 'Vũ Thị Cúc', 'Nam', 'Nam Từ Liêm - Hà Nội', '0946278350', 'giao hàng sớm', '2017-06-27 20:07:00', '2017-06-27 20:07:00'),
(6, 1, 'Trần Văn An', 'Nam', 'Nam Từ Liêm - Hà Nội', '0987654321', 'cần vào lúc 6 giờ tối', '2017-06-27 21:40:30', '2017-06-27 21:40:30');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `locations`
--

CREATE TABLE `locations` (
  `id` int(10) UNSIGNED NOT NULL,
  `location` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `time_open_close` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `locations`
--

INSERT INTO `locations` (`id`, `location`, `city`, `image`, `phone`, `time_open_close`, `created_at`, `updated_at`) VALUES
(1, '144 xuân thủy, quận cầu giấy', 'hà nội', '../../admin/images/images-location/144-xuan-thuy.png', '0987676777', '6h - 22h30', NULL, NULL),
(2, '165 cầu giấy, quận cầu giấy', 'hà nội', '../../admin/images/images-location/165-cau-giay.png', '0984646888', '6h - 22h30', NULL, NULL),
(3, '145 kim mã, quận cầu giấy', 'hà nội', '../../admin/images/images-location/145-kim-ma.png', '0123303666', '6h - 22h30', NULL, NULL),
(4, '52 nguyễn đình chiểu, quận 1', 'hồ chí minh', '../../admin/images/images-location/52-nguyen-dinh-chieu.png', '01263036767', '6h - 22h30', NULL, NULL),
(5, '184 cộng hòa, tân bình', 'hồ chí minh', '../../admin/images/images-location/184-cong-hoa.png', '0981010888', '6h - 22h30', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(86, '2014_10_12_000000_create_users_table', 1),
(87, '2014_10_12_100000_create_password_resets_table', 1),
(88, '2017_05_19_041245_create_products_table', 1),
(89, '2017_06_17_124007_create_categories_table', 1),
(90, '2017_06_21_134619_create_customers_table', 1),
(91, '2017_06_21_135411_create_orders_table', 1),
(92, '2017_06_21_140136_create_order_details_table', 1),
(93, '2017_06_25_173658_create_contacts_table', 1),
(94, '2017_06_27_043205_create_promotions_table', 1),
(95, '2017_06_27_043717_create_locations_table', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `customer_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `orderDate` date NOT NULL,
  `totalPrice` double NOT NULL,
  `payment` varchar(255) NOT NULL,
  `note` text,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`id`, `customer_id`, `user_id`, `orderDate`, `totalPrice`, `payment`, `note`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2017-06-28', 190, 'Thanh toán qua Internet Banking hoặc thẻ tín dụng', 'Giao hàng ngay tối nay nhé cửa hàng', '2017-06-27 18:58:07', '2017-06-27 18:58:07'),
(2, 2, 1, '2017-06-28', 225.5, 'Thanh toán khi nhận hàng', 'Cần vào trưa nay', '2017-06-27 18:58:44', '2017-06-27 18:58:44'),
(3, 3, 1, '2017-06-28', 109, 'Thanh toán qua Internet Banking hoặc thẻ tín dụng', 'Giao hàng trưa nay', '2017-06-27 19:01:41', '2017-06-27 19:01:41'),
(4, 4, 1, '2017-06-28', 127, 'Thanh toán khi nhận hàng', 'cần vào lúc 11h trưa nay', '2017-06-27 19:08:48', '2017-06-27 19:08:48'),
(5, 5, 1, '2017-06-28', 81, 'Thanh toán khi nhận hàng', 'giao hàng sớm', '2017-06-27 20:07:00', '2017-06-27 20:07:00'),
(6, 6, 1, '2017-06-28', 171.5, 'Thanh toán khi nhận hàng', 'cần vào lúc 6 giờ tối', '2017-06-27 21:40:30', '2017-06-27 21:40:30');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_details`
--

CREATE TABLE `order_details` (
  `id` int(10) UNSIGNED NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `product_id`, `quantity`, `price`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 46, '2017-06-27 18:58:07', '2017-06-27 18:58:07'),
(2, 1, 2, 1, 35, '2017-06-27 18:58:07', '2017-06-27 18:58:07'),
(3, 1, 3, 1, 53, '2017-06-27 18:58:07', '2017-06-27 18:58:07'),
(4, 1, 4, 1, 56, '2017-06-27 18:58:07', '2017-06-27 18:58:07'),
(5, 2, 6, 1, 45.5, '2017-06-27 18:58:44', '2017-06-27 18:58:44'),
(6, 2, 7, 1, 65.5, '2017-06-27 18:58:44', '2017-06-27 18:58:44'),
(7, 2, 30, 1, 59, '2017-06-27 18:58:44', '2017-06-27 18:58:44'),
(8, 2, 5, 1, 55.5, '2017-06-27 18:58:44', '2017-06-27 18:58:44'),
(9, 3, 3, 1, 53, '2017-06-27 19:01:41', '2017-06-27 19:01:41'),
(10, 3, 4, 1, 56, '2017-06-27 19:01:41', '2017-06-27 19:01:41'),
(11, 4, 1, 2, 46, '2017-06-27 19:08:48', '2017-06-27 19:08:48'),
(12, 4, 2, 1, 35, '2017-06-27 19:08:48', '2017-06-27 19:08:48'),
(13, 5, 1, 1, 46, '2017-06-27 20:07:00', '2017-06-27 20:07:00'),
(14, 5, 2, 1, 35, '2017-06-27 20:07:00', '2017-06-27 20:07:00'),
(15, 6, 3, 2, 53, '2017-06-27 21:40:30', '2017-06-27 21:40:30'),
(16, 6, 7, 1, 65.5, '2017-06-27 21:40:30', '2017-06-27 21:40:30');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `category_id` int(11) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `image` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `category_id`, `productName`, `price`, `image`, `created_at`, `updated_at`) VALUES
(1, 1, 'bánh cuốn hến', '46.0', '../../admin/images/images-product/banh/banh-cuon-hen.png', NULL, NULL),
(2, 2, 'nước bưởi ép', '35', '../../admin/images/images-product/nuoc-hoa-qua/buoi-ep.png', NULL, NULL),
(3, 3, 'chả phụng', '53.0', '../../admin/images/images-product/nem-chao/cha-phung.png', NULL, NULL),
(4, 1, 'bánh hỏi thịt nướng', '56.0', '../../admin/images/images-product/banh/banh-hoi-thit-nuong.png', NULL, NULL),
(5, 1, 'bánh đập mắm nêm', '55.5', '../../admin/images/images-product/banh/banh-dap-mam-nem.png', NULL, NULL),
(6, 1, 'bánh cuốn tôm chua', '45.5', '../../admin/images/images-product/banh/banh-cuon-tom-chua.png', NULL, NULL),
(7, 1, 'bánh ram ít', '65.5', '../../admin/images/images-product/banh/banh-ram-it.png', NULL, NULL),
(8, 1, 'bánh bèo', '60.0', '../../admin/images/images-product/banh/banh-beo.png', NULL, NULL),
(9, 1, 'bánh khoái', '40.0', '../../admin/images/images-product/banh/banh-khoai.png', NULL, NULL),
(10, 1, 'bánh ram huế', '39.0', '../../admin/images/images-product/banh/banh-ram-hue.png', NULL, NULL),
(11, 1, 'bánh bột lọc', '56.5', '../../admin/images/images-product/banh/banh-bot-loc.png', NULL, NULL),
(12, 1, 'bánh lá', '45.5', '../../admin/images/images-product/banh/banh-la.png', NULL, NULL),
(13, 1, 'bánh ướt tôm cháy', '50', '../../admin/images/images-product/banh/banh-uot-tom-chay.png', NULL, NULL),
(14, 1, 'bánh ướt thịt nướng', '49.5', '../../admin/images/images-product/banh/banh-uot-thit-nuong.png', NULL, NULL),
(15, 1, 'bánh thập cẩm', '54.0', '../../admin/images/images-product/banh/banh-thap-cam.png', NULL, NULL),
(16, 2, 'nước cam vắt', '34', '../../admin/images/images-product/nuoc-hoa-qua/cam-vat.png', NULL, NULL),
(17, 2, 'nước cà rốt đặc biệt', '33', '../../admin/images/images-product/nuoc-hoa-qua/ca-rot.png', NULL, NULL),
(18, 2, 'chanh dây đặc biệt', '32', '../../admin/images/images-product/nuoc-hoa-qua/chanh-day.png', NULL, NULL),
(19, 2, 'dưa hấu ép đặt biêt', '36.5', '../../admin/images/images-product/nuoc-hoa-qua/dua-hau-ep.png', NULL, NULL),
(20, 2, 'nước dừa tươi', '43', '../../admin/images/images-product/nuoc-hoa-qua/nuoc-dua-tuoi.png', NULL, NULL),
(21, 2, 'nước ép thập cẩm', '40', '../../admin/images/images-product/nuoc-hoa-qua/nuoc-ep-thap-cam.png', NULL, NULL),
(22, 2, 'nước ổi ép đặc biệt', '30', '../../admin/images/images-product/nuoc-hoa-qua/oi-ep.png', NULL, NULL),
(23, 2, 'sữa đậu nành', '29', '../../admin/images/images-product/nuoc-hoa-qua/sua-dau-nanh.png', NULL, NULL),
(24, 2, 'nước dứa ép đặc biệt', '45.5', '../../admin/images/images-product/nuoc-hoa-qua/dua-ep.png', NULL, NULL),
(25, 1, 'chạo tôm cuốn bánh hỏi', '53.0', '../../admin/images/images-product/banh/chao-tom-cuon-banh-hoi.png', NULL, NULL),
(26, 3, 'gỏi mít', '55', '../../admin/images/images-product/nem-chao/goi-mit.png', NULL, NULL),
(27, 3, 'gỏi trái vả', '56', '../../admin/images/images-product/nem-chao/goi-trai-va.png', NULL, NULL),
(28, 3, 'hến trộn xúc bánh đa', '57', '../../admin/images/images-product/nem-chao/hen-tron-xuc-banh-da.png', NULL, NULL),
(29, 3, 'chạo tôm cuốn', '58', '../../admin/images/images-product/nem-chao/chao-tom-cuon.png', NULL, NULL),
(30, 3, 'cuốn nhíp', '59', '../../admin/images/images-product/nem-chao/cuon-nhip.png', NULL, NULL),
(31, 3, 'nem công', '60', '../../admin/images/images-product/nem-chao/nem-cong.png', NULL, NULL),
(32, 3, 'tré', '62', '../../admin/images/images-product/nem-chao/tre.png', NULL, NULL),
(33, 3, 'nem nướng', '55', '../../admin/images/images-product/nem-chao/nem-nuong.png', NULL, NULL),
(34, 5, 'chè khoai môn', '20', '../../admin/images/images-product/che/che-khoai-mon.png', NULL, NULL),
(35, 5, 'chè bắp', '21', '../../admin/images/images-product/che/che-bap.png', NULL, NULL),
(36, 5, 'chè hạt sen', '22', '../../admin/images/images-product/che/che-hat-sen.png', NULL, NULL),
(37, 5, 'chè đậu đỏ bánh lọt', '23', '../../admin/images/images-product/che/che-dau-do-banh-lot.png', NULL, NULL),
(38, 5, 'chè nhãn bọc hạt sen', '24', '../../admin/images/images-product/che/che-nhan-boc-hat-sen.png', NULL, NULL),
(39, 5, 'chè sương sa hột lựu', '25', '../../admin/images/images-product/che/che-suong-sa-hot-luu.png', NULL, NULL),
(40, 5, 'chè bột lọc lừa', '26', '../../admin/images/images-product/che/che-bot-loc-dua.png', NULL, NULL),
(41, 6, 'bún bò giò gân', '55', '../../admin/images/images-product/bun/bun-bo-gio-gan.png', NULL, NULL),
(42, 6, 'bún bò giò nạc', '45', '../../admin/images/images-product/bun/bun-bo-gio-nac.png', NULL, NULL),
(43, 6, 'bún bò huế', '46', '../../admin/images/images-product/bun/bun-bo-hue.png', NULL, NULL),
(44, 6, 'bún bò tái đặc biệt', '47', '../../admin/images/images-product/bun/bun-bo-tai-dac-biet.png', NULL, NULL),
(45, 6, 'bún hến', '48', '../../admin/images/images-product/bun/bun-hen.png', NULL, NULL),
(46, 6, 'mì quảng', '49', '../../admin/images/images-product/bun/mi-quang.png', NULL, NULL),
(47, 6, 'bún nem nướng', '50', '../../admin/images/images-product/bun/bun-nem-nuong.png', NULL, NULL),
(48, 6, 'bún thịt nướng', '51', '../../admin/images/images-product/bun/bun-thit-nuong.png', NULL, NULL),
(49, 4, 'bánh bèo', '55', '../../admin/images/images-product/com/banh-beo.png', NULL, NULL),
(50, 4, 'bánh ướt thịt', '56', '../../admin/images/images-product/com/banh-uot-thit-nuong.png', NULL, NULL),
(51, 4, 'bún thịt nướng', '57.5', '../../admin/images/images-product/com/bun-thit-nuong.png', NULL, NULL),
(52, 4, 'cuốn nhíp', '67', '../../admin/images/images-product/com/cuon-nhip.png', NULL, NULL),
(53, 4, 'bún chả giò', '44', '../../admin/images/images-product/com/bun-cha-gio.png', NULL, NULL),
(54, 4, 'bánh hỏi thịt nướng', '45', '../../admin/images/images-product/com/banh-hoi-thit-nuong.png', NULL, NULL),
(55, 4, 'bánh khoái', '46', '../../admin/images/images-product/com/banh-khoai.png', NULL, NULL),
(56, 4, 'cơm lá sen', '47', '../../admin/images/images-product/com/com-la-sen.png', NULL, NULL),
(57, 4, 'gỏi mít', '56', '../../admin/images/images-product/com/goi-mit.png', NULL, NULL),
(58, 4, 'gỏi trái vả', '55', '../../admin/images/images-product/com/goi-trai-va.png', NULL, NULL),
(59, 4, 'mì quảng đặc biệt', '45', '../../admin/images/images-product/com/mi-quang-dac-biet.png', NULL, NULL),
(60, 4, 'bún bò huế', '60', '../../admin/images/images-product/com/bun-bo-hue.png', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `promotions`
--

CREATE TABLE `promotions` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `link` varchar(255) DEFAULT NULL,
  `description` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `promotions`
--

INSERT INTO `promotions` (`id`, `title`, `image`, `link`, `description`, `created_at`, `updated_at`) VALUES
(1, 'trở thành thành viên của nhà hàng để nhận ngay ưu đãi lớn', '../../admin/images/images-promotion/bun-bo-25k.jpg', NULL, 'Từ mùng 5/6 đến 5/7, khi đăng kí trở thành thành viên của nhà hàng bạn sẽ được thưởng thức bún bò chỉ còn 25k, ngoài ra còn rất nhiều phần quà ưu đãi mới...', NULL, NULL),
(2, 'thưởng thức ngay cà phê giá chỉ 12k', '../../admin/images/images-promotion/cafe-12k.jpg', NULL, 'Từ ngày mùng 6/6 đến 12/7, khi đến các địa điểm của nhà hàng từ 7h sáng đến 10h sáng quý khách hàng có thể mua một cốc cà phê giá chỉ 12k...', NULL, NULL),
(3, 'Mua ngay gói com bo rẻ chỉ  59k', '../../admin/images/images-promotion/combo-re.jpg', NULL, 'Từ ngày mùng 7/6 đến ngày 12/7, khi mua một món ăn bất kì bạn có cơ hội sỡ hữu 1 combo gồm bún bò huế và đồ uống bất kì chỉ còn 59k', NULL, NULL),
(4, 'Thưởng thức những món ăn ngon trong 3 ngày', '../../admin/images/images-promotion/tinh-hoa-am-thuc-viet.jpg', NULL, 'Từ ngày mùng 8/6 đến ngày 10/6, khi khác hàng mua và đặt món ăn có hóa đơn trên 200k sẽ được giảm giá ngay 30% giá trị đơn hàng...', NULL, NULL),
(5, 'Đăng kí thành viên để nhận được nhiều phần quà hấp dẫn', '../../admin/images/images-promotion/voucher-giam-gia.jpg', NULL, 'Từ ngày 11/6 đến 31/12, khi đăng kí thành viên khách hàng sẽ được nhận ngay 1 voucher giảm giá 30% hóa đơn...', NULL, NULL),
(6, 'Thưởng thức bát bún bò chỉ từ 35k', '../../admin/images/images-promotion/uu-dai-buoi-sang.jpg', NULL, 'Từ 13/6 đến 31/8, khi đến mua nhà hàng từ 6h30 đến 10, khách hàng sẽ được thưởng thức bát bún bò giá chỉ 35k...', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `lastName` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `birthday` varchar(255) DEFAULT NULL,
  `phone` varchar(255) NOT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `other_email` varchar(255) DEFAULT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `image_avatar` varchar(255) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `lastName`, `name`, `address`, `birthday`, `phone`, `gender`, `email`, `other_email`, `facebook`, `password`, `image_avatar`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'An', 'Trần Văn An', 'Phú Đô - Nam Từ Liêm - Hà Nội', '13/09/1996', '0946278350', 'Nam', 'tranvananuet@gmail.com', 'herolhp96@gmail.com', 'fb.com/abc', '$2y$10$.kX/yHSOoxpYdcc50NXRB.9lHjxiT7QbAguCWGcFRWF3ZcEvlDluu', '123.jpg', NULL, '2017-06-27 18:51:15', '2017-06-27 18:57:32');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `promotions`
--
ALTER TABLE `promotions`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT cho bảng `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT cho bảng `locations`
--
ALTER TABLE `locations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;
--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT cho bảng `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;
--
-- AUTO_INCREMENT cho bảng `promotions`
--
ALTER TABLE `promotions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
