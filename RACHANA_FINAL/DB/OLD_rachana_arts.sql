-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 03, 2020 at 10:40 AM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rachana_arts`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `ad_id` int(11) NOT NULL,
  `ad_name` varchar(50) NOT NULL,
  `ad_contact` bigint(20) NOT NULL,
  `ad_address` varchar(50) NOT NULL,
  `ad_email` varchar(30) NOT NULL,
  `ad_username` varchar(20) NOT NULL,
  `ad_password` varchar(150) NOT NULL,
  `ad_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`ad_id`, `ad_name`, `ad_contact`, `ad_address`, `ad_email`, `ad_username`, `ad_password`, `ad_date`) VALUES
(1, 'Suhas Naikar', 9972205070, 'Dharwads', 'admin@gmail.com', 'admin08', 'YWRtaW4xMjM0', '2020-03-01');

-- --------------------------------------------------------

--
-- Table structure for table `chat_message`
--

CREATE TABLE `chat_message` (
  `chat_message_id` int(11) NOT NULL,
  `sender` varchar(15) NOT NULL,
  `from_user_id` int(11) NOT NULL,
  `to_user_id` int(11) NOT NULL,
  `chat_message` text NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `is_deleted` int(11) NOT NULL,
  `notify` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chat_message`
--

INSERT INTO `chat_message` (`chat_message_id`, `sender`, `from_user_id`, `to_user_id`, `chat_message`, `timestamp`, `is_deleted`, `notify`) VALUES
(8, 'CUSTOMER', 9, 1, 'Hi Im Soumya Patil\r\n', '2020-02-18 06:49:59', 0, 0),
(9, 'ADMIN', 1, 9, 'Yes Madam How may i help You', '2020-02-18 06:56:50', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `cu_id` int(11) NOT NULL,
  `cu_name` varchar(30) NOT NULL,
  `cu_contact` bigint(20) NOT NULL,
  `cu_email` varchar(50) NOT NULL,
  `cu_address` varchar(50) NOT NULL,
  `cu_type` varchar(20) NOT NULL,
  `cu_username` varchar(20) NOT NULL,
  `cu_password` varchar(150) NOT NULL,
  `cu_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`cu_id`, `cu_name`, `cu_contact`, `cu_email`, `cu_address`, `cu_type`, `cu_username`, `cu_password`, `cu_date`) VALUES
(10, 'Suhas Naikar', 9972205070, 'naikarsuhas27@gmail.com', 'Dharwads', 'GOVERNMENT', 'suhas', 'U3VoYXMxMjM0', '2020-03-01');

-- --------------------------------------------------------

--
-- Table structure for table `customer_order_details`
--

CREATE TABLE `customer_order_details` (
  `cod_id` int(11) NOT NULL,
  `cu_id` int(11) NOT NULL,
  `order_json` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `order_no` int(11) NOT NULL,
  `order_date` date NOT NULL,
  `order_grand_total` int(11) NOT NULL,
  `order_status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer_order_details`
--

INSERT INTO `customer_order_details` (`cod_id`, `cu_id`, `order_json`, `order_no`, `order_date`, `order_grand_total`, `order_status`) VALUES
(51, 10, '{\"product_details\":{\"33\":{\"id\":33,\"name\":\"Big Cricket Medal\",\"pd_quality\":\"METAL(METALLIC)\",\"pd_size\":\"5Â INCH\",\"qty\":\"50\",\"image\":\"IMG_548513107.jpg\",\"price\":100,\"discount_percent\":0,\"totalamount\":5000,\"max_qty_allowed\":100,\"min_qty_allowed\":50,\"order_content\":\"KARNATAKA SCIENCE COLLEGE DHARWAD\"},\"47\":{\"id\":47,\"name\":\"Wood Engraving\",\"pd_quality\":\"IMPORTED WOOD(HIGH)\",\"pd_size\":\"25Â SQ.FT\",\"qty\":\"1\",\"image\":\"IMG_1846782687.jpg\",\"price\":8000,\"discount_percent\":1000,\"totalamount\":7000,\"max_qty_allowed\":1,\"min_qty_allowed\":1,\"order_content\":\"NOT APPLICABLE\"}},\"amount_details\":{\"total\":12000,\"sub_total\":11900,\"tax\":1190,\"discount_charges\":\"100\",\"grand_total\":13090},\"shipping_details\":{\"shipping_address\":\"Govt College Dharwad\",\"landmark\":\"Malmaddi \",\"contact_no\":\"9972205070\",\"payment_mode\":\"BY CHEQUE\",\"transaction_no\":\"0\"},\"customer_id\":{\"customer_id\":\"10\"}}', 246678, '2020-03-01', 13090, 'ORDER CONFIRMED');

-- --------------------------------------------------------

--
-- Table structure for table `extra_charges`
--

CREATE TABLE `extra_charges` (
  `ec_id` int(11) NOT NULL,
  `ec_tax` float NOT NULL,
  `ec_discount` int(11) NOT NULL,
  `ec_min_amount` int(11) NOT NULL,
  `ec_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `extra_charges`
--

INSERT INTO `extra_charges` (`ec_id`, `ec_tax`, `ec_discount`, `ec_min_amount`, `ec_date`) VALUES
(3, 10, 500, 2000, '2020-03-02');

-- --------------------------------------------------------

--
-- Table structure for table `portfolio`
--

CREATE TABLE `portfolio` (
  `pf_id` int(11) NOT NULL,
  `pf_name` varchar(50) NOT NULL,
  `pf_description` text NOT NULL,
  `pf_image` varchar(100) NOT NULL,
  `pf_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `portfolio`
--

INSERT INTO `portfolio` (`pf_id`, `pf_name`, `pf_description`, `pf_image`, `pf_date`) VALUES
(1, 'KCD COLLEGE DHARWAD', '<p>SOME DESCRIPTIONs</p>', 'IMG_798388161.jpg', '2020-03-02');

-- --------------------------------------------------------

--
-- Table structure for table `product_category`
--

CREATE TABLE `product_category` (
  `pc_id` int(11) NOT NULL,
  `pc_name` varchar(20) NOT NULL,
  `pc_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_category`
--

INSERT INTO `product_category` (`pc_id`, `pc_name`, `pc_date`) VALUES
(1, 'MOMENTOS', '2020-03-02'),
(2, 'TROPHY', '2020-02-10'),
(3, 'MEDALS', '2020-02-10'),
(4, 'NAME BOARDS', '2020-02-10'),
(5, 'INTERIOR DESIGN', '2020-02-10');

-- --------------------------------------------------------

--
-- Table structure for table `product_details`
--

CREATE TABLE `product_details` (
  `pd_id` int(11) NOT NULL,
  `pc_id` int(11) NOT NULL,
  `ps_id` int(11) NOT NULL,
  `pt_id` int(11) NOT NULL,
  `pd_name` varchar(200) NOT NULL,
  `pd_image1` varchar(100) NOT NULL,
  `pd_description` text NOT NULL,
  `pd_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_details`
--

INSERT INTO `product_details` (`pd_id`, `pc_id`, `ps_id`, `pt_id`, `pd_name`, `pd_image1`, `pd_description`, `pd_date`) VALUES
(3, 1, 16, 3, 'FTA', 'IMG_1795809546.jpg', '<p><span style=\"color:#000000; font-family:&quot;Open Sans&quot;,Arial,sans-serif; font-size:14px; text-align:justify\">Lorem ipsum dolor sit amet, consectetur adipiscing elit.&nbsp;</span></p><p><span style=\"color:#000000; font-family:&quot;Open Sans&quot;,Arial,sans-serif; font-size:14px; text-align:justify\">Ut ornare risus eu felis feugiat consequat. Sed dapibus, justo&nbsp;</span></p><p><span style=\"color:#000000; font-family:&quot;Open Sans&quot;,Arial,sans-serif; font-size:14px; text-align:justify\">a efficitur euismod, orci mauris placerat nibh,</span></p>', '2020-02-21'),
(4, 1, 15, 3, 'FTK', 'IMG_1152594861.jpg', '<p><span style=\"color:#000000; font-family:&quot;Open Sans&quot;,Arial,sans-serif; font-size:14px; text-align:justify\">Lorem ipsum dolor sit amet, consectetur adipiscing elit.&nbsp;</span></p><p><span style=\"color:#000000; font-family:&quot;Open Sans&quot;,Arial,sans-serif; font-size:14px; text-align:justify\">Ut ornare risus eu felis feugiat consequat. Sed dapibus, justo&nbsp;</span></p><p><span style=\"color:#000000; font-family:&quot;Open Sans&quot;,Arial,sans-serif; font-size:14px; text-align:justify\">a efficitur euismod, orci mauris placerat nibh,</span></p>', '2020-02-21'),
(5, 1, 14, 3, 'FTS', 'IMG_1826468843.jpg', '<p><span style=\"color:#000000; font-family:&quot;Open Sans&quot;,Arial,sans-serif; font-size:14px; text-align:justify\">Lorem ipsum dolor sit amet, consectetur adipiscing elit.&nbsp;</span></p><p><span style=\"color:#000000; font-family:&quot;Open Sans&quot;,Arial,sans-serif; font-size:14px; text-align:justify\">Ut ornare risus eu felis feugiat consequat. Sed dapibus, justo&nbsp;</span></p><p><span style=\"color:#000000; font-family:&quot;Open Sans&quot;,Arial,sans-serif; font-size:14px; text-align:justify\">a efficitur euismod, orci mauris placerat nibh,</span></p>', '2020-02-21'),
(6, 1, 13, 3, 'FTK', 'IMG_1400705027.jpg', '<p><span style=\"color:#000000; font-family:&quot;Open Sans&quot;,Arial,sans-serif; font-size:14px; text-align:justify\">Lorem ipsum dolor sit amet, consectetur adipiscing elit.&nbsp;</span></p><p><span style=\"color:#000000; font-family:&quot;Open Sans&quot;,Arial,sans-serif; font-size:14px; text-align:justify\">Ut ornare risus eu felis feugiat consequat. Sed dapibus, justo&nbsp;</span></p><p><span style=\"color:#000000; font-family:&quot;Open Sans&quot;,Arial,sans-serif; font-size:14px; text-align:justify\">a efficitur euismod, orci mauris placerat nibh,</span></p>', '2020-02-21'),
(7, 1, 3, 12, 'FTF', 'IMG_1410053474.jpg', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.&nbsp;</p><p>Ut ornare risus eu felis feugiat consequat. Sed dapibus, justo&nbsp;</p><p>a efficitur euismod, orci mauris placerat nibh,</p>', '2020-02-21'),
(8, 1, 11, 3, 'FTM', 'IMG_1690051514.jpg', '<p><span style=\"color:#000000; font-family:&quot;Open Sans&quot;,Arial,sans-serif; font-size:14px; text-align:justify\">Lorem ipsum dolor sit amet, consectetur adipiscing elit.&nbsp;</span></p><p><span style=\"color:#000000; font-family:&quot;Open Sans&quot;,Arial,sans-serif; font-size:14px; text-align:justify\">Ut ornare risus eu felis feugiat consequat. Sed dapibus, justo&nbsp;</span></p><p><span style=\"color:#000000; font-family:&quot;Open Sans&quot;,Arial,sans-serif; font-size:14px; text-align:justify\">a efficitur euismod, orci mauris placerat nibh,</span></p>', '2020-02-21'),
(9, 1, 10, 3, 'FTW', 'IMG_319826048.jpg', '<p><span style=\"color:#000000; font-family:&quot;Open Sans&quot;,Arial,sans-serif; font-size:14px; text-align:justify\">Lorem ipsum dolor sit amet, consectetur adipiscing elit.&nbsp;</span></p><p><span style=\"color:#000000; font-family:&quot;Open Sans&quot;,Arial,sans-serif; font-size:14px; text-align:justify\">Ut ornare risus eu felis feugiat consequat. Sed dapibus, justo&nbsp;</span></p><p><span style=\"color:#000000; font-family:&quot;Open Sans&quot;,Arial,sans-serif; font-size:14px; text-align:justify\">a efficitur euismod, orci mauris placerat nibh,</span></p>', '2020-02-21'),
(10, 1, 6, 3, 'FTNine', 'IMG_1801234138.jpg', '<p><span style=\"color:#000000; font-family:&quot;Open Sans&quot;,Arial,sans-serif; font-size:14px; text-align:justify\">Lorem ipsum dolor sit amet, consectetur adipiscing elit.&nbsp;</span></p><p><span style=\"color:#000000; font-family:&quot;Open Sans&quot;,Arial,sans-serif; font-size:14px; text-align:justify\">Ut ornare risus eu felis feugiat consequat. Sed dapibus, justo&nbsp;</span></p><p><span style=\"color:#000000; font-family:&quot;Open Sans&quot;,Arial,sans-serif; font-size:14px; text-align:justify\">a efficitur euismod, orci mauris placerat nibh,</span></p>', '2020-02-21'),
(11, 1, 5, 3, 'FTS', 'IMG_1507171477.jpg', '<p><span style=\"color:#000000; font-family:&quot;Open Sans&quot;,Arial,sans-serif; font-size:14px; text-align:justify\">Lorem ipsum dolor sit amet, consectetur adipiscing elit.&nbsp;</span></p><p><span style=\"color:#000000; font-family:&quot;Open Sans&quot;,Arial,sans-serif; font-size:14px; text-align:justify\">Ut ornare risus eu felis feugiat consequat. Sed dapibus, justo&nbsp;</span></p><p><span style=\"color:#000000; font-family:&quot;Open Sans&quot;,Arial,sans-serif; font-size:14px; text-align:justify\">a efficitur euismod, orci mauris placerat nibh,</span></p>', '2020-02-21'),
(12, 1, 4, 3, 'FSS', 'IMG_495775049.jpg', '<p><span style=\"color:#000000; font-family:&quot;Open Sans&quot;,Arial,sans-serif; font-size:14px; text-align:justify\">Lorem ipsum dolor sit amet, consectetur adipiscing elit.&nbsp;</span></p><p><span style=\"color:#000000; font-family:&quot;Open Sans&quot;,Arial,sans-serif; font-size:14px; text-align:justify\">Ut ornare risus eu felis feugiat consequat. Sed dapibus, justo&nbsp;</span></p><p><span style=\"color:#000000; font-family:&quot;Open Sans&quot;,Arial,sans-serif; font-size:14px; text-align:justify\">a efficitur euismod, orci mauris placerat nibh,</span></p>', '2020-02-21'),
(13, 1, 12, 3, 'TAF', 'IMG_720895873.jpg', '<p><span style=\"color:#000000; font-family:&quot;Open Sans&quot;,Arial,sans-serif; font-size:14px; text-align:justify\">Lorem ipsum dolor sit amet, consectetur adipiscing elit.&nbsp;</span></p><p><span style=\"color:#000000; font-family:&quot;Open Sans&quot;,Arial,sans-serif; font-size:14px; text-align:justify\">Ut ornare risus eu felis feugiat consequat. Sed dapibus, justo&nbsp;</span></p><p><span style=\"color:#000000; font-family:&quot;Open Sans&quot;,Arial,sans-serif; font-size:14px; text-align:justify\">a efficitur euismod, orci mauris placerat nibh,</span></p>', '2020-02-21'),
(14, 2, 9, 4, 'ACR', 'IMG_456514353.jpg', '<p><span style=\"color:#000000; font-family:&quot;Open Sans&quot;,Arial,sans-serif; font-size:14px; text-align:justify\">Integer interdum pellentesque ullamcorper.&nbsp;</span></p><p><span style=\"color:#000000; font-family:&quot;Open Sans&quot;,Arial,sans-serif; font-size:14px; text-align:justify\">Nullam eu vestibulum dui. Donec sed sem lectus.&nbsp;</span></p><p><span style=\"color:#000000; font-family:&quot;Open Sans&quot;,Arial,sans-serif; font-size:14px; text-align:justify\">Integer orci mi, scelerisque eu dui ac,</span></p>', '2020-02-22'),
(15, 2, 8, 4, 'FTDE', 'IMG_745497957.jpg', '<p><span style=\"color:#000000; font-family:&quot;Open Sans&quot;,Arial,sans-serif; font-size:14px; text-align:justify\">Integer interdum pellentesque ullamcorper.&nbsp;</span></p><p><span style=\"color:#000000; font-family:&quot;Open Sans&quot;,Arial,sans-serif; font-size:14px; text-align:justify\">Nullam eu vestibulum dui. Donec sed sem lectus.&nbsp;</span></p><p><span style=\"color:#000000; font-family:&quot;Open Sans&quot;,Arial,sans-serif; font-size:14px; text-align:justify\">Integer orci mi, scelerisque eu dui ac,</span></p>', '2020-02-22'),
(16, 2, 7, 1, 'Dish Trophy', 'IMG_938717656.jpg', '<p><span style=\"color:#000000; font-family:&quot;Open Sans&quot;,Arial,sans-serif; font-size:14px; text-align:justify\">Integer interdum pellentesque ullamcorper.&nbsp;</span></p><p><span style=\"color:#000000; font-family:&quot;Open Sans&quot;,Arial,sans-serif; font-size:14px; text-align:justify\">Nullam eu vestibulum dui. Donec sed sem lectus.&nbsp;</span></p><p><span style=\"color:#000000; font-family:&quot;Open Sans&quot;,Arial,sans-serif; font-size:14px; text-align:justify\">Integer orci mi, scelerisque eu dui ac,</span></p>', '2020-02-22'),
(17, 2, 19, 1, 'FTK Cricket World ', 'IMG_437094830.jpg', '<p><span style=\"color:#000000; font-family:&quot;Open Sans&quot;,Arial,sans-serif; font-size:14px; text-align:justify\">Integer interdum pellentesque ullamcorper.&nbsp;</span></p><p><span style=\"color:#000000; font-family:&quot;Open Sans&quot;,Arial,sans-serif; font-size:14px; text-align:justify\">Nullam eu vestibulum dui. Donec sed sem lectus.&nbsp;</span></p><p><span style=\"color:#000000; font-family:&quot;Open Sans&quot;,Arial,sans-serif; font-size:14px; text-align:justify\">Integer orci mi, scelerisque eu dui ac,</span></p>', '2020-02-22'),
(18, 2, 20, 4, 'FT one', 'IMG_1039947661.jpg', '<p><span style=\"color:#000000; font-family:&quot;Open Sans&quot;,Arial,sans-serif; font-size:14px; text-align:justify\">Integer interdum pellentesque ullamcorper.&nbsp;</span></p><p><span style=\"color:#000000; font-family:&quot;Open Sans&quot;,Arial,sans-serif; font-size:14px; text-align:justify\">Nullam eu vestibulum dui. Donec sed sem lectus.&nbsp;</span></p><p><span style=\"color:#000000; font-family:&quot;Open Sans&quot;,Arial,sans-serif; font-size:14px; text-align:justify\">Integer orci mi, scelerisque eu dui ac,</span></p>', '2020-02-22'),
(19, 2, 21, 1, 'Star ', 'IMG_1049930496.jpg', '<p><span style=\"color:#000000; font-family:&quot;Open Sans&quot;,Arial,sans-serif; font-size:14px; text-align:justify\">Integer interdum pellentesque ullamcorper.&nbsp;</span></p><p><span style=\"color:#000000; font-family:&quot;Open Sans&quot;,Arial,sans-serif; font-size:14px; text-align:justify\">Nullam eu vestibulum dui. Donec sed sem lectus.&nbsp;</span></p><p><span style=\"color:#000000; font-family:&quot;Open Sans&quot;,Arial,sans-serif; font-size:14px; text-align:justify\">Integer orci mi, scelerisque eu dui ac,</span></p>', '2020-02-22'),
(20, 2, 22, 4, 'FTKOne', 'IMG_324578197.jpg', '<p><span style=\"color:#000000; font-family:&quot;Open Sans&quot;,Arial,sans-serif; font-size:14px; text-align:justify\">Integer interdum pellentesque ullamcorper.&nbsp;</span></p><p><span style=\"color:#000000; font-family:&quot;Open Sans&quot;,Arial,sans-serif; font-size:14px; text-align:justify\">Nullam eu vestibulum dui. Donec sed sem lectus.&nbsp;</span></p><p><span style=\"color:#000000; font-family:&quot;Open Sans&quot;,Arial,sans-serif; font-size:14px; text-align:justify\">Integer orci mi, scelerisque eu dui ac,</span></p>', '2020-02-22'),
(21, 2, 24, 4, 'FTAM Acrylic Chef', 'IMG_1991525607.jpg', '<p><span style=\"color:#000000; font-family:&quot;Open Sans&quot;,Arial,sans-serif; font-size:14px; text-align:justify\">Integer interdum pellentesque ullamcorper.&nbsp;</span></p><p><span style=\"color:#000000; font-family:&quot;Open Sans&quot;,Arial,sans-serif; font-size:14px; text-align:justify\">Nullam eu vestibulum dui. Donec sed sem lectus.&nbsp;</span></p><p><span style=\"color:#000000; font-family:&quot;Open Sans&quot;,Arial,sans-serif; font-size:14px; text-align:justify\">Integer orci mi, scelerisque eu dui ac,</span></p>', '2020-02-22'),
(22, 2, 25, 4, 'Dane', 'IMG_1464376369.jpg', '<p><span style=\"color:#000000; font-family:&quot;Open Sans&quot;,Arial,sans-serif; font-size:14px; text-align:justify\">Integer interdum pellentesque ullamcorper.&nbsp;</span></p><p><span style=\"color:#000000; font-family:&quot;Open Sans&quot;,Arial,sans-serif; font-size:14px; text-align:justify\">Nullam eu vestibulum dui. Donec sed sem lectus.&nbsp;</span></p><p><span style=\"color:#000000; font-family:&quot;Open Sans&quot;,Arial,sans-serif; font-size:14px; text-align:justify\">Integer orci mi, scelerisque eu dui ac,</span></p>', '2020-02-22'),
(23, 2, 23, 1, 'FTKK', 'IMG_1601076748.jpg', '<p><span style=\"color:#000000; font-family:&quot;Open Sans&quot;,Arial,sans-serif; font-size:14px; text-align:justify\">Integer interdum pellentesque ullamcorper.&nbsp;</span></p><p><span style=\"color:#000000; font-family:&quot;Open Sans&quot;,Arial,sans-serif; font-size:14px; text-align:justify\">Nullam eu vestibulum dui. Donec sed sem lectus.&nbsp;</span></p><p><span style=\"color:#000000; font-family:&quot;Open Sans&quot;,Arial,sans-serif; font-size:14px; text-align:justify\">Integer orci mi, scelerisque eu dui ac,</span></p>', '2020-02-22'),
(24, 3, 26, 5, 'Cutter Star Medal', 'IMG_363692251.jpg', '<p><span style=\"color:#000000; font-family:&quot;Open Sans&quot;,Arial,sans-serif; font-size:14px; text-align:justify\">Nulla fermentum dui et placerat tincidunt.&nbsp;</span></p><p><span style=\"color:#000000; font-family:&quot;Open Sans&quot;,Arial,sans-serif; font-size:14px; text-align:justify\">Nulla blandit condimentum turpis, sit amet tempor eros ornare nec.&nbsp;</span></p><p><span style=\"color:#000000; font-family:&quot;Open Sans&quot;,Arial,sans-serif; font-size:14px; text-align:justify\">Suspendisse et purus et ante accumsan eleifend a et mi.&nbsp;</span></p><p><span style=\"color:#000000; font-family:&quot;Open Sans&quot;,Arial,sans-serif; font-size:14px; text-align:justify\">In interdum ligula a posuere posuere. Aliquam convallis lacus id elit auctor porttitor.</span></p>', '2020-02-22'),
(25, 3, 27, 5, 'Bell Leaf', 'IMG_145055810.jpg', '<p><span style=\"color:#000000; font-family:&quot;Open Sans&quot;,Arial,sans-serif; font-size:14px; text-align:justify\">Nulla fermentum dui et placerat tincidunt.&nbsp;</span></p><p><span style=\"color:#000000; font-family:&quot;Open Sans&quot;,Arial,sans-serif; font-size:14px; text-align:justify\">Nulla blandit condimentum turpis, sit amet tempor eros ornare nec.&nbsp;</span></p><p><span style=\"color:#000000; font-family:&quot;Open Sans&quot;,Arial,sans-serif; font-size:14px; text-align:justify\">Suspendisse et purus et ante accumsan eleifend a et mi.&nbsp;</span></p><p><span style=\"color:#000000; font-family:&quot;Open Sans&quot;,Arial,sans-serif; font-size:14px; text-align:justify\">In interdum ligula a posuere posuere. Aliquam convallis lacus id elit auctor porttitor.</span></p>', '2020-02-22'),
(27, 3, 28, 5, 'FTSS  Sports Medal', 'IMG_1572267468.jpg', '<p><span style=\"color:#000000; font-family:&quot;Open Sans&quot;,Arial,sans-serif; font-size:14px; text-align:justify\">Nulla fermentum dui et placerat tincidunt.&nbsp;</span></p><p><span style=\"color:#000000; font-family:&quot;Open Sans&quot;,Arial,sans-serif; font-size:14px; text-align:justify\">Nulla blandit condimentum turpis, sit amet tempor eros ornare nec.&nbsp;</span></p><p><span style=\"color:#000000; font-family:&quot;Open Sans&quot;,Arial,sans-serif; font-size:14px; text-align:justify\">Suspendisse et purus et ante accumsan eleifend a et mi.&nbsp;</span></p><p><span style=\"color:#000000; font-family:&quot;Open Sans&quot;,Arial,sans-serif; font-size:14px; text-align:justify\">In interdum ligula a posuere posuere. Aliquam convallis lacus id elit auctor porttitor.</span></p>', '2020-02-22'),
(28, 3, 29, 5, 'Medal Gold', 'IMG_2098341558.jpg', '<p><span style=\"color:#000000; font-family:&quot;Open Sans&quot;,Arial,sans-serif; font-size:14px; text-align:justify\">Nulla fermentum dui et placerat tincidunt.&nbsp;</span></p><p><span style=\"color:#000000; font-family:&quot;Open Sans&quot;,Arial,sans-serif; font-size:14px; text-align:justify\">Nulla blandit condimentum turpis, sit amet tempor eros ornare nec.&nbsp;</span></p><p><span style=\"color:#000000; font-family:&quot;Open Sans&quot;,Arial,sans-serif; font-size:14px; text-align:justify\">Suspendisse et purus et ante accumsan eleifend a et mi.&nbsp;</span></p><p><span style=\"color:#000000; font-family:&quot;Open Sans&quot;,Arial,sans-serif; font-size:14px; text-align:justify\">In interdum ligula a posuere posuere. Aliquam convallis lacus id elit auctor porttitor.</span></p>', '2020-02-22'),
(29, 3, 30, 5, 'Shield Medal', 'IMG_1302760525.jpg', '<p><span style=\"color:#000000; font-family:&quot;Open Sans&quot;,Arial,sans-serif; font-size:14px; text-align:justify\">Nulla fermentum dui et placerat tincidunt.&nbsp;</span></p><p><span style=\"color:#000000; font-family:&quot;Open Sans&quot;,Arial,sans-serif; font-size:14px; text-align:justify\">Nulla blandit condimentum turpis, sit amet tempor eros ornare nec.&nbsp;</span></p><p><span style=\"color:#000000; font-family:&quot;Open Sans&quot;,Arial,sans-serif; font-size:14px; text-align:justify\">Suspendisse et purus et ante accumsan eleifend a et mi.&nbsp;</span></p><p><span style=\"color:#000000; font-family:&quot;Open Sans&quot;,Arial,sans-serif; font-size:14px; text-align:justify\">In interdum ligula a posuere posuere. Aliquam convallis lacus id elit auctor porttitor.</span></p>', '2020-02-22'),
(30, 3, 31, 5, 'Sun Silver Medal', 'IMG_1613700819.jpg', '<p><span style=\"color:#000000; font-family:&quot;Open Sans&quot;,Arial,sans-serif; font-size:14px; text-align:justify\">Nulla fermentum dui et placerat tincidunt.&nbsp;</span></p><p><span style=\"color:#000000; font-family:&quot;Open Sans&quot;,Arial,sans-serif; font-size:14px; text-align:justify\">Nulla blandit condimentum turpis, sit amet tempor eros ornare nec.&nbsp;</span></p><p><span style=\"color:#000000; font-family:&quot;Open Sans&quot;,Arial,sans-serif; font-size:14px; text-align:justify\">Suspendisse et purus et ante accumsan eleifend a et mi.&nbsp;</span></p><p><span style=\"color:#000000; font-family:&quot;Open Sans&quot;,Arial,sans-serif; font-size:14px; text-align:justify\">In interdum ligula a posuere posuere. Aliquam convallis lacus id elit auctor porttitor.</span></p>', '2020-02-22'),
(31, 3, 32, 5, 'Leaf gold star Medal', 'IMG_1431312202.jpg', '<p><span style=\"color:#000000; font-family:&quot;Open Sans&quot;,Arial,sans-serif; font-size:14px; text-align:justify\">Nulla fermentum dui et placerat tincidunt.&nbsp;</span></p><p><span style=\"color:#000000; font-family:&quot;Open Sans&quot;,Arial,sans-serif; font-size:14px; text-align:justify\">Nulla blandit condimentum turpis, sit amet tempor eros ornare nec.&nbsp;</span></p><p><span style=\"color:#000000; font-family:&quot;Open Sans&quot;,Arial,sans-serif; font-size:14px; text-align:justify\">Suspendisse et purus et ante accumsan eleifend a et mi.&nbsp;</span></p><p><span style=\"color:#000000; font-family:&quot;Open Sans&quot;,Arial,sans-serif; font-size:14px; text-align:justify\">In interdum ligula a posuere posuere. Aliquam convallis lacus id elit auctor porttitor.</span></p>', '2020-02-22'),
(32, 3, 33, 5, 'Big cup Medal', 'IMG_47681613.jpg', '<p><span style=\"color:#000000; font-family:&quot;Open Sans&quot;,Arial,sans-serif; font-size:14px; text-align:justify\">Nulla fermentum dui et placerat tincidunt.&nbsp;</span></p><p><span style=\"color:#000000; font-family:&quot;Open Sans&quot;,Arial,sans-serif; font-size:14px; text-align:justify\">Nulla blandit condimentum turpis, sit amet tempor eros ornare nec.&nbsp;</span></p><p><span style=\"color:#000000; font-family:&quot;Open Sans&quot;,Arial,sans-serif; font-size:14px; text-align:justify\">Suspendisse et purus et ante accumsan eleifend a et mi.&nbsp;</span></p><p><span style=\"color:#000000; font-family:&quot;Open Sans&quot;,Arial,sans-serif; font-size:14px; text-align:justify\">In interdum ligula a posuere posuere. Aliquam convallis lacus id elit auctor porttitor.</span></p>', '2020-02-22'),
(33, 3, 34, 5, 'Big Cricket Medal', 'IMG_548513107.jpg', '<p><span style=\"color:#000000; font-family:&quot;Open Sans&quot;,Arial,sans-serif; font-size:14px; text-align:justify\">Nulla fermentum dui et placerat tincidunt.&nbsp;</span></p><p><span style=\"color:#000000; font-family:&quot;Open Sans&quot;,Arial,sans-serif; font-size:14px; text-align:justify\">Nulla blandit condimentum turpis, sit amet tempor eros ornare nec.&nbsp;</span></p><p><span style=\"color:#000000; font-family:&quot;Open Sans&quot;,Arial,sans-serif; font-size:14px; text-align:justify\">Suspendisse et purus et ante accumsan eleifend a et mi.&nbsp;</span></p><p><span style=\"color:#000000; font-family:&quot;Open Sans&quot;,Arial,sans-serif; font-size:14px; text-align:justify\">In interdum ligula a posuere posuere. Aliquam convallis lacus id elit auctor porttitor.</span></p>', '2020-02-22'),
(34, 3, 35, 5, 'Apple Medal', 'IMG_1021769786.jpg', '<p><span style=\"color:#000000; font-family:&quot;Open Sans&quot;,Arial,sans-serif; font-size:14px; text-align:justify\">Nulla fermentum dui et placerat tincidunt.&nbsp;</span></p><p><span style=\"color:#000000; font-family:&quot;Open Sans&quot;,Arial,sans-serif; font-size:14px; text-align:justify\">Nulla blandit condimentum turpis, sit amet tempor eros ornare nec.&nbsp;</span></p><p><span style=\"color:#000000; font-family:&quot;Open Sans&quot;,Arial,sans-serif; font-size:14px; text-align:justify\">Suspendisse et purus et ante accumsan eleifend a et mi.&nbsp;</span></p><p><span style=\"color:#000000; font-family:&quot;Open Sans&quot;,Arial,sans-serif; font-size:14px; text-align:justify\">In interdum ligula a posuere posuere. Aliquam convallis lacus id elit auctor porttitor.</span></p>', '2020-02-22'),
(35, 3, 36, 5, 'Big Badminton', 'IMG_763747016.jpg', '<p><span style=\"color:#000000; font-family:&quot;Open Sans&quot;,Arial,sans-serif; font-size:14px; text-align:justify\">Nulla fermentum dui et placerat tincidunt.&nbsp;</span></p><p><span style=\"color:#000000; font-family:&quot;Open Sans&quot;,Arial,sans-serif; font-size:14px; text-align:justify\">Nulla blandit condimentum turpis, sit amet tempor eros ornare nec.&nbsp;</span></p><p><span style=\"color:#000000; font-family:&quot;Open Sans&quot;,Arial,sans-serif; font-size:14px; text-align:justify\">Suspendisse et purus et ante accumsan eleifend a et mi.&nbsp;</span></p><p><span style=\"color:#000000; font-family:&quot;Open Sans&quot;,Arial,sans-serif; font-size:14px; text-align:justify\">In interdum ligula a posuere posuere. Aliquam convallis lacus id elit auctor porttitor.</span></p>', '2020-02-22'),
(36, 4, 37, 3, 'Wooden Ganesh Name Board', 'IMG_581672210.jpg', '<p><span style=\"color:#000000; font-family:&quot;Open Sans&quot;,Arial,sans-serif; font-size:14px; text-align:justify\">Nam eget lobortis metus. Nulla facilisi.&nbsp;</span></p><p><span style=\"color:#000000; font-family:&quot;Open Sans&quot;,Arial,sans-serif; font-size:14px; text-align:justify\">In lobortis, nisi finibus mollis molestie, ipsum nisl iaculis mi,&nbsp;</span></p><p><span style=\"color:#000000; font-family:&quot;Open Sans&quot;,Arial,sans-serif; font-size:14px; text-align:justify\">eget tincidunt velit enim ac mi. Donec eros dui,&nbsp;</span></p>', '2020-02-22'),
(37, 4, 38, 5, 'Metallic Name Board', 'IMG_1211472090.jpg', '<p><span style=\"color:#000000; font-family:&quot;Open Sans&quot;,Arial,sans-serif; font-size:14px; text-align:justify\">Nam eget lobortis metus. Nulla facilisi.&nbsp;</span></p><p><span style=\"color:#000000; font-family:&quot;Open Sans&quot;,Arial,sans-serif; font-size:14px; text-align:justify\">In lobortis, nisi finibus mollis molestie, ipsum nisl iaculis mi,&nbsp;</span></p><p><span style=\"color:#000000; font-family:&quot;Open Sans&quot;,Arial,sans-serif; font-size:14px; text-align:justify\">eget tincidunt velit enim ac mi. Donec eros dui,&nbsp;</span></p>', '2020-02-22'),
(38, 4, 39, 3, 'Wooden Name Board', 'IMG_1131628913.jpg', '<p><span style=\"color:#000000; font-family:&quot;Open Sans&quot;,Arial,sans-serif; font-size:14px; text-align:justify\">Nam eget lobortis metus. Nulla facilisi.&nbsp;</span></p><p><span style=\"color:#000000; font-family:&quot;Open Sans&quot;,Arial,sans-serif; font-size:14px; text-align:justify\">In lobortis, nisi finibus mollis molestie, ipsum nisl iaculis mi,&nbsp;</span></p><p><span style=\"color:#000000; font-family:&quot;Open Sans&quot;,Arial,sans-serif; font-size:14px; text-align:justify\">eget tincidunt velit enim ac mi. Donec eros dui,&nbsp;</span></p>', '2020-02-22'),
(39, 4, 40, 3, 'Peacock Wooden Board', 'IMG_879526909.jpg', '<p><span style=\"color:#000000; font-family:&quot;Open Sans&quot;,Arial,sans-serif; font-size:14px; text-align:justify\">Nam eget lobortis metus. Nulla facilisi.&nbsp;</span></p><p><span style=\"color:#000000; font-family:&quot;Open Sans&quot;,Arial,sans-serif; font-size:14px; text-align:justify\">In lobortis, nisi finibus mollis molestie, ipsum nisl iaculis mi,&nbsp;</span></p><p><span style=\"color:#000000; font-family:&quot;Open Sans&quot;,Arial,sans-serif; font-size:14px; text-align:justify\">eget tincidunt velit enim ac mi. Donec eros dui,&nbsp;</span></p>', '2020-02-22'),
(40, 4, 41, 4, 'Acrylic Name Board', 'IMG_109311197.jpg', '<p><span style=\"color:#000000; font-family:&quot;Open Sans&quot;,Arial,sans-serif; font-size:14px; text-align:justify\">Nam eget lobortis metus. Nulla facilisi.&nbsp;</span></p><p><span style=\"color:#000000; font-family:&quot;Open Sans&quot;,Arial,sans-serif; font-size:14px; text-align:justify\">In lobortis, nisi finibus mollis molestie, ipsum nisl iaculis mi,&nbsp;</span></p><p><span style=\"color:#000000; font-family:&quot;Open Sans&quot;,Arial,sans-serif; font-size:14px; text-align:justify\">eget tincidunt velit enim ac mi. Donec eros dui,&nbsp;</span></p>', '2020-02-22'),
(41, 4, 42, 5, 'Kowleys Metallic  Name Board ', 'IMG_729706144.jpg', '<p><span style=\"color:#000000; font-family:&quot;Open Sans&quot;,Arial,sans-serif; font-size:14px; text-align:justify\">Nam eget lobortis metus. Nulla facilisi.&nbsp;</span></p><p><span style=\"color:#000000; font-family:&quot;Open Sans&quot;,Arial,sans-serif; font-size:14px; text-align:justify\">In lobortis, nisi finibus mollis molestie, ipsum nisl iaculis mi,&nbsp;</span></p><p><span style=\"color:#000000; font-family:&quot;Open Sans&quot;,Arial,sans-serif; font-size:14px; text-align:justify\">eget tincidunt velit enim ac mi. Donec eros dui,&nbsp;</span></p>', '2020-02-22'),
(42, 4, 43, 4, 'Rivington Acrylic Board', 'IMG_1164734502.jpg', '<p><span style=\"color:#000000; font-family:&quot;Open Sans&quot;,Arial,sans-serif; font-size:14px; text-align:justify\">Nam eget lobortis metus. Nulla facilisi.&nbsp;</span></p><p><span style=\"color:#000000; font-family:&quot;Open Sans&quot;,Arial,sans-serif; font-size:14px; text-align:justify\">In lobortis, nisi finibus mollis molestie, ipsum nisl iaculis mi,&nbsp;</span></p><p><span style=\"color:#000000; font-family:&quot;Open Sans&quot;,Arial,sans-serif; font-size:14px; text-align:justify\">eget tincidunt velit enim ac mi. Donec eros dui,&nbsp;</span></p>', '2020-02-22'),
(43, 4, 44, 1, 'Wooden & Metallic Name Board', 'IMG_912393075.jpg', '<p><span style=\"color:#000000; font-family:&quot;Open Sans&quot;,Arial,sans-serif; font-size:14px; text-align:justify\">Nam eget lobortis metus. Nulla facilisi.&nbsp;</span></p><p><span style=\"color:#000000; font-family:&quot;Open Sans&quot;,Arial,sans-serif; font-size:14px; text-align:justify\">In lobortis, nisi finibus mollis molestie, ipsum nisl iaculis mi,&nbsp;</span></p><p><span style=\"color:#000000; font-family:&quot;Open Sans&quot;,Arial,sans-serif; font-size:14px; text-align:justify\">eget tincidunt velit enim ac mi. Donec eros dui,&nbsp;</span></p>', '2020-02-22'),
(44, 4, 45, 3, 'Wooden Crushed Name Board', 'IMG_990027355.png', '<p><span style=\"color:#000000; font-family:&quot;Open Sans&quot;,Arial,sans-serif; font-size:14px; text-align:justify\">Nam eget lobortis metus. Nulla facilisi.&nbsp;</span></p><p><span style=\"color:#000000; font-family:&quot;Open Sans&quot;,Arial,sans-serif; font-size:14px; text-align:justify\">In lobortis, nisi finibus mollis molestie, ipsum nisl iaculis mi,&nbsp;</span></p><p><span style=\"color:#000000; font-family:&quot;Open Sans&quot;,Arial,sans-serif; font-size:14px; text-align:justify\">eget tincidunt velit enim ac mi. Donec eros dui,&nbsp;</span></p>', '2020-02-22'),
(45, 4, 46, 2, 'Wooden Scaled Name Board', 'IMG_1313300970.png', '<p><span style=\"color:#000000; font-family:&quot;Open Sans&quot;,Arial,sans-serif; font-size:14px; text-align:justify\">Nam eget lobortis metus. Nulla facilisi.&nbsp;</span></p><p><span style=\"color:#000000; font-family:&quot;Open Sans&quot;,Arial,sans-serif; font-size:14px; text-align:justify\">In lobortis, nisi finibus mollis molestie, ipsum nisl iaculis mi,&nbsp;</span></p><p><span style=\"color:#000000; font-family:&quot;Open Sans&quot;,Arial,sans-serif; font-size:14px; text-align:justify\">eget tincidunt velit enim ac mi. Donec eros dui,&nbsp;</span></p>', '2020-02-22'),
(46, 5, 47, 3, 'MDF Board', 'IMG_718875394.jpg', '<p><span style=\"color:#000000; font-family:&quot;Open Sans&quot;,Arial,sans-serif; font-size:14px; text-align:justify\">Cras sit amet metus eros.&nbsp;</span></p><p><span style=\"color:#000000; font-family:&quot;Open Sans&quot;,Arial,sans-serif; font-size:14px; text-align:justify\">Ut pellentesque laoreet ipsum, vel rutrum velit.&nbsp;</span></p><p><span style=\"color:#000000; font-family:&quot;Open Sans&quot;,Arial,sans-serif; font-size:14px; text-align:justify\">Curabitur quis erat purus. Integer iaculis eros vitae purus consectetur</span></p>', '2020-02-24'),
(47, 5, 48, 3, 'Wood Engraving', 'IMG_1846782687.jpg', '<p><span style=\"color:#000000; font-family:&quot;Open Sans&quot;,Arial,sans-serif; font-size:14px; text-align:justify\">Cras sit amet metus eros.&nbsp;</span></p><p><span style=\"color:#000000; font-family:&quot;Open Sans&quot;,Arial,sans-serif; font-size:14px; text-align:justify\">Ut pellentesque laoreet ipsum, vel rutrum velit.&nbsp;</span></p><p><span style=\"color:#000000; font-family:&quot;Open Sans&quot;,Arial,sans-serif; font-size:14px; text-align:justify\">Curabitur quis erat purus. Integer iaculis eros vitae purus consectetur</span></p>', '2020-02-24'),
(48, 5, 49, 5, 'MDF Grill', 'IMG_2117085680.jpg', '<p><span style=\"color:#000000; font-family:&quot;Open Sans&quot;,Arial,sans-serif; font-size:14px; text-align:justify\">Cras sit amet metus eros.&nbsp;</span></p><p><span style=\"color:#000000; font-family:&quot;Open Sans&quot;,Arial,sans-serif; font-size:14px; text-align:justify\">Ut pellentesque laoreet ipsum, vel rutrum velit.&nbsp;</span></p><p><span style=\"color:#000000; font-family:&quot;Open Sans&quot;,Arial,sans-serif; font-size:14px; text-align:justify\">Curabitur quis erat purus. Integer iaculis eros vitae purus consectetur</span></p>', '2020-02-24'),
(49, 5, 50, 5, 'MDF Grill Pannel', 'IMG_841804282.png', '<p>Cras sit amet metus eros.&nbsp;</p><p>Ut pellentesque laoreet ipsum, vel rutrum velit.&nbsp;</p><p>Curabitur quis erat purus. Integer iaculis eros vitae purus consectetur</p>', '2020-03-02'),
(50, 5, 51, 3, 'MDF Pannels', 'IMG_1103052396.jpg', '<p>Cras sit amet metus eros.&nbsp;</p><p>Ut pellentesque laoreet ipsum, vel rutrum velit.&nbsp;</p><p>Curabitur quis erat purus. Integer iaculis eros vitae purus consectetur</p>', '2020-03-02'),
(51, 5, 52, 1, 'Wooden Engraving Design', 'IMG_321567478.jpg', '<p>Cras sit amet metus eros. ddddddddddd</p><p>Ut pellentesque laoreet ipsum, vel rutrum velit.&nbsp;</p><p>Curabitur quis erat purus. Integer iaculis eros vitae purus consectetur</p>', '2020-03-02'),
(52, 5, 3, 53, 'Laser Cut  Templates', 'IMG_249652445.jpg', '<p>Cras sit amet metus eros. ssssssss</p><p>Ut pellentesque laoreet ipsum, vel rutrum velit.&nbsp;</p><p>Curabitur quis erat purus. Integer iaculis eros vitae purus consectetur</p>', '2020-03-02');

-- --------------------------------------------------------

--
-- Table structure for table `product_size`
--

CREATE TABLE `product_size` (
  `ps_id` int(11) NOT NULL,
  `pc_id` int(11) NOT NULL,
  `pu_id` int(11) NOT NULL,
  `ps_size` float NOT NULL,
  `ps_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_size`
--

INSERT INTO `product_size` (`ps_id`, `pc_id`, `pu_id`, `ps_size`, `ps_date`) VALUES
(4, 1, 1, 7, '2020-02-17'),
(5, 1, 1, 9, '2020-02-17'),
(6, 1, 1, 11, '2020-02-17'),
(7, 2, 1, 9, '2020-02-22'),
(8, 2, 1, 14, '2020-02-22'),
(9, 2, 1, 5.5, '2020-02-22'),
(10, 1, 1, 10, '2020-02-20'),
(11, 1, 1, 9.5, '2020-02-20'),
(12, 1, 1, 9.25, '2020-02-20'),
(13, 1, 1, 8, '2020-02-20'),
(14, 1, 1, 11.5, '2020-02-20'),
(15, 1, 1, 5, '2020-02-20'),
(16, 1, 1, 9.75, '2020-02-20'),
(17, 2, 1, 15, '2020-02-22'),
(18, 2, 1, 13, '2020-02-22'),
(19, 2, 1, 15.5, '2020-02-22'),
(20, 2, 1, 13.5, '2020-02-22'),
(21, 2, 1, 11.25, '2020-02-22'),
(22, 2, 1, 17, '2020-02-22'),
(23, 2, 1, 16, '2020-02-22'),
(24, 2, 1, 10, '2020-02-22'),
(25, 2, 1, 8, '2020-02-22'),
(26, 3, 1, 2.5, '2020-02-22'),
(27, 3, 1, 2, '2020-02-22'),
(28, 3, 1, 3.75, '2020-02-22'),
(29, 3, 1, 2.75, '2020-02-22'),
(30, 3, 1, 4, '2020-02-22'),
(31, 3, 1, 2.25, '2020-02-22'),
(32, 3, 1, 3.5, '2020-02-22'),
(33, 3, 1, 3.25, '2020-02-22'),
(34, 3, 1, 5, '2020-02-22'),
(35, 3, 1, 4.5, '2020-02-22'),
(36, 3, 1, 3, '2020-02-22'),
(37, 4, 2, 2, '2020-02-22'),
(38, 4, 2, 8, '2020-02-22'),
(39, 4, 2, 10, '2020-02-22'),
(40, 4, 2, 5, '2020-02-22'),
(41, 4, 2, 6, '2020-02-22'),
(42, 4, 2, 12, '2020-02-22'),
(43, 4, 2, 14, '2020-02-22'),
(44, 4, 2, 16, '2020-02-22'),
(45, 4, 2, 20, '2020-02-22'),
(46, 4, 2, 22, '2020-02-22'),
(47, 5, 2, 20, '2020-02-24'),
(48, 5, 2, 25, '2020-02-24'),
(49, 5, 2, 30, '2020-02-24'),
(50, 5, 2, 35, '2020-02-24'),
(51, 5, 2, 40, '2020-02-24'),
(52, 5, 2, 10, '2020-02-24'),
(53, 5, 2, 15, '2020-03-02');

-- --------------------------------------------------------

--
-- Table structure for table `product_type`
--

CREATE TABLE `product_type` (
  `pt_id` int(11) NOT NULL,
  `pt_name` varchar(20) NOT NULL,
  `pt_quality` varchar(20) NOT NULL,
  `pt_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_type`
--

INSERT INTO `product_type` (`pt_id`, `pt_name`, `pt_quality`, `pt_date`) VALUES
(1, 'MD MATERIAL', 'LOW', '2020-02-10'),
(2, 'POWDER COATED', 'MEDIUM', '2020-02-10'),
(3, 'IMPORTED WOOD', 'HIGH', '2020-02-10'),
(4, 'ACRYLIC ', 'PREMIUM', '2020-02-10'),
(5, 'METAL', 'METALLIC', '2020-02-22');

-- --------------------------------------------------------

--
-- Table structure for table `product_units`
--

CREATE TABLE `product_units` (
  `pu_id` int(11) NOT NULL,
  `pu_type` varchar(20) NOT NULL,
  `pu_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_units`
--

INSERT INTO `product_units` (`pu_id`, `pu_type`, `pu_date`) VALUES
(1, 'INCH', '2020-02-10'),
(2, 'SQ.FT', '2020-02-10'),
(3, 'A4', '2020-02-10');

-- --------------------------------------------------------

--
-- Table structure for table `stock_details`
--

CREATE TABLE `stock_details` (
  `sd_id` int(11) NOT NULL,
  `pd_id` int(11) NOT NULL,
  `sd_unitprice` int(11) NOT NULL,
  `sd_discount` int(11) NOT NULL,
  `sd_min_qty_order` int(11) NOT NULL,
  `sd_max_qty_order` int(11) NOT NULL,
  `sd_status` varchar(50) NOT NULL,
  `sd_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stock_details`
--

INSERT INTO `stock_details` (`sd_id`, `pd_id`, `sd_unitprice`, `sd_discount`, `sd_min_qty_order`, `sd_max_qty_order`, `sd_status`, `sd_date`) VALUES
(36, 45, 2500, 10, 2, 2, 'AVAILABLE', '2020-02-23'),
(37, 43, 4000, 100, 1, 1, 'AVAILABLE', '2020-03-02'),
(39, 35, 600, 0, 1, 1, 'NOT AVAILABLE', '2020-02-23'),
(40, 31, 1500, 100, 2, 1, 'NOT AVAILABLE', '2020-02-23'),
(41, 28, 150, 0, 10, 2, 'NOT AVAILABLE', '2020-02-23'),
(42, 27, 200, 20, 5, 1, 'AVAILABLE', '2020-02-23'),
(43, 25, 600, 2, 4, 1, 'AVAILABLE', '2020-02-23'),
(44, 16, 5000, 0, 1, 1, 'AVAILABLE', '2020-02-23'),
(45, 5, 6000, 2, 1, 1, 'AVAILABLE', '2020-02-23'),
(46, 52, 4500, 500, 1, 1, 'AVAILABLE', '2020-03-02'),
(47, 50, 2000, 100, 3, 5, 'AVAILABLE', '2020-02-24'),
(48, 48, 5000, 0, 2, 4, 'AVAILABLE', '2020-02-24'),
(49, 46, 1000, 0, 1, 1, 'AVAILABLE', '2020-02-24'),
(50, 51, 2500, 10, 5, 100, 'NOT AVAILABLE', '2020-02-24'),
(51, 42, 1200, 0, 4, 10, 'AVAILABLE', '2020-02-24'),
(52, 44, 100, 0, 10, 100, 'NOT AVAILABLE', '2020-02-24'),
(53, 41, 2600, 0, 10, 20, 'NOT AVAILABLE', '2020-02-24'),
(54, 49, 6000, 0, 10, 20, 'AVAILABLE', '2020-02-24'),
(55, 40, 200, 10, 5, 10, 'AVAILABLE', '2020-02-24'),
(56, 39, 600, 0, 3, 10, 'AVAILABLE', '2020-02-24'),
(57, 36, 800, 100, 6, 12, 'AVAILABLE', '2020-02-24'),
(58, 47, 8000, 1000, 1, 1, 'AVAILABLE', '2020-02-24'),
(59, 38, 600, 0, 1, 10, 'NOT AVAILABLE', '2020-02-24'),
(60, 37, 700, 0, 10, 50, 'AVAILABLE', '2020-02-24'),
(61, 34, 50, 0, 100, 500, 'AVAILABLE', '2020-02-24'),
(62, 33, 100, 0, 50, 100, 'AVAILABLE', '2020-02-24'),
(63, 32, 90, 10, 50, 200, 'NOT AVAILABLE', '2020-02-24'),
(64, 30, 80, 10, 100, 150, 'AVAILABLE', '2020-02-24'),
(65, 29, 60, 0, 50, 200, 'NOT AVAILABLE', '2020-02-24'),
(66, 24, 100, 0, 100, 200, 'AVAILABLE', '2020-02-24'),
(67, 23, 100, 10, 4, 10, 'AVAILABLE', '2020-02-24'),
(68, 22, 400, 0, 2, 4, 'AVAILABLE', '2020-02-24'),
(69, 21, 500, 100, 6, 10, 'AVAILABLE', '2020-02-24'),
(70, 20, 600, 10, 3, 8, 'AVAILABLE', '2020-02-24'),
(71, 19, 800, 100, 5, 10, 'AVAILABLE', '2020-02-24'),
(72, 18, 400, 10, 5, 10, 'AVAILABLE', '2020-02-24'),
(73, 17, 10000, 0, 1, 5, 'AVAILABLE', '2020-02-24'),
(74, 15, 4000, 0, 2, 4, 'AVAILABLE', '2020-02-24'),
(75, 14, 1000, 10, 5, 10, 'AVAILABLE', '2020-02-24'),
(76, 13, 12000, 1000, 5, 15, 'NOT AVAILABLE', '2020-02-24'),
(77, 12, 5000, 0, 5, 50, 'AVAILABLE', '2020-02-24'),
(78, 11, 1000, 0, 6, 20, 'AVAILABLE', '2020-02-24'),
(79, 10, 1500, 10, 6, 25, 'AVAILABLE', '2020-02-24'),
(80, 9, 2300, 100, 8, 12, 'AVAILABLE', '2020-02-24'),
(81, 8, 6600, 0, 10, 15, 'AVAILABLE', '2020-02-24'),
(82, 7, 1230, 10, 5, 15, 'NOT AVAILABLE', '2020-02-24'),
(83, 6, 2500, 0, 8, 10, 'AVAILABLE', '2020-02-24'),
(84, 4, 5800, 100, 2, 15, 'AVAILABLE', '2020-02-24'),
(85, 3, 600, 0, 2, 10, 'AVAILABLE', '2020-02-24');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`ad_id`);

--
-- Indexes for table `chat_message`
--
ALTER TABLE `chat_message`
  ADD PRIMARY KEY (`chat_message_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`cu_id`);

--
-- Indexes for table `customer_order_details`
--
ALTER TABLE `customer_order_details`
  ADD PRIMARY KEY (`cod_id`);

--
-- Indexes for table `extra_charges`
--
ALTER TABLE `extra_charges`
  ADD PRIMARY KEY (`ec_id`);

--
-- Indexes for table `portfolio`
--
ALTER TABLE `portfolio`
  ADD PRIMARY KEY (`pf_id`);

--
-- Indexes for table `product_category`
--
ALTER TABLE `product_category`
  ADD PRIMARY KEY (`pc_id`);

--
-- Indexes for table `product_details`
--
ALTER TABLE `product_details`
  ADD PRIMARY KEY (`pd_id`);

--
-- Indexes for table `product_size`
--
ALTER TABLE `product_size`
  ADD PRIMARY KEY (`ps_id`);

--
-- Indexes for table `product_type`
--
ALTER TABLE `product_type`
  ADD PRIMARY KEY (`pt_id`);

--
-- Indexes for table `product_units`
--
ALTER TABLE `product_units`
  ADD PRIMARY KEY (`pu_id`);

--
-- Indexes for table `stock_details`
--
ALTER TABLE `stock_details`
  ADD PRIMARY KEY (`sd_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `ad_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `chat_message`
--
ALTER TABLE `chat_message`
  MODIFY `chat_message_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `cu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `customer_order_details`
--
ALTER TABLE `customer_order_details`
  MODIFY `cod_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `extra_charges`
--
ALTER TABLE `extra_charges`
  MODIFY `ec_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `portfolio`
--
ALTER TABLE `portfolio`
  MODIFY `pf_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `product_category`
--
ALTER TABLE `product_category`
  MODIFY `pc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `product_details`
--
ALTER TABLE `product_details`
  MODIFY `pd_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `product_size`
--
ALTER TABLE `product_size`
  MODIFY `ps_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `product_type`
--
ALTER TABLE `product_type`
  MODIFY `pt_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `product_units`
--
ALTER TABLE `product_units`
  MODIFY `pu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `stock_details`
--
ALTER TABLE `stock_details`
  MODIFY `sd_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
