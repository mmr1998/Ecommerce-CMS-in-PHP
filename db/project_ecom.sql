-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 01, 2021 at 11:44 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project_ecom`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `admin_id` int(10) NOT NULL,
  `admin_name` varchar(255) NOT NULL,
  `admin_email` varchar(255) NOT NULL,
  `admin_pass` varchar(255) NOT NULL,
  `admin_image` text NOT NULL,
  `admin_country` text NOT NULL,
  `admin_about` text NOT NULL,
  `admin_contact` varchar(255) NOT NULL,
  `admin_job` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`admin_id`, `admin_name`, `admin_email`, `admin_pass`, `admin_image`, `admin_country`, `admin_about`, `admin_contact`, `admin_job`) VALUES
(1, 'mmr1998', 'mr.mmr1998@gmail.com', 'admin123', 'man.jpg', 'bangladesh', 'This ecommerce is created by MMR1998. to know more about me then visit <a href=\"#\">MMR1998.PRO</a>\r\n					\r\n					Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsa aut voluptate, dolore, doloremque tenetur inventore sapiente, aperiam nobis soluta, consequuntur quo laboriosam quaerat obcaecati incidunt maxime vero debitis. Nam, quas!', '01954947465', 'web developer'),
(3, 'Adnan habib', 'zarin.jerry12@gmail.com', '1234', 'customer-1.png', 'Bangladesh', '<p>Lorem ipsum dolor sit amet, <strong>consectetur adipisicing elit.</strong> Temporibus, necessitatibus, quod suscipit laudantium rem illo! Recusandae beatae quasi quidem, placeat molestias molestiae quisquam veniam accusamus officia ex est. Blanditiis, magnam.</p>\r\n<p>&nbsp; &nbsp;&nbsp;</p>\r\n<div id=\"gtx-trans\" style=\"position: absolute; left: 388px; top: -14px;\">\r\n<div class=\"gtx-trans-icon\">&nbsp;</div>\r\n</div>', '0123456789', 'designer');

-- --------------------------------------------------------

--
-- Table structure for table `boxes_section`
--

CREATE TABLE `boxes_section` (
  `box_id` int(10) NOT NULL,
  `box_title` text NOT NULL,
  `box_desc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `boxes_section`
--

INSERT INTO `boxes_section` (`box_id`, `box_title`, `box_desc`) VALUES
(1, 'Best offer', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores, dolorum ipsum nostrum suscipit odio, saepe commodi fuga, consectetur exercitationem qui fugiat aut, rerum esse nesciunt repellendus sit! Vel, commodi beatae.'),
(2, 'Quality Products', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores, dolorum ipsum nostrum suscipit odio, saepe commodi fuga, consectetur exercitationem qui fugiat aut, rerum esse nesciunt repellendus sit! Vel, commodi beatae.'),
(3, '100% Satisfaction', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Assumenda repellendus similique sapiente iste fugiat, accusamus adipisci ullam amet reprehenderit. Rem nemo nobis veniam minus earum magnam sed doloremque enim quo!</p>\r\n<div id=\"gtx-trans\" style=\"position: absolute; left: 161px; top: 51px;\">\r\n<div class=\"gtx-trans-icon\">&nbsp;</div>\r\n</div>');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `p_id` int(10) NOT NULL,
  `ip_add` varchar(255) NOT NULL,
  `qty` int(10) NOT NULL,
  `size` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`p_id`, `ip_add`, `qty`, `size`) VALUES
(15, '::1', 5, 'Small'),
(17, '::1', 10, 'Small'),
(20, '::1', 1, 'Small');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(10) NOT NULL,
  `cat_title` text NOT NULL,
  `cat_top` text NOT NULL,
  `cat_image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`, `cat_top`, `cat_image`) VALUES
(1, 'Mans', 'yes', '3729.png'),
(2, 'Womans', 'yes', 'img_504781.png');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `customer_id` int(10) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `customer_email` varchar(255) NOT NULL,
  `customer_pass` int(255) NOT NULL,
  `customer_country` text NOT NULL,
  `customer_city` text NOT NULL,
  `customer_contact` varchar(255) NOT NULL,
  `customer_address` text NOT NULL,
  `customer_image` text NOT NULL,
  `customer_ip` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customer_id`, `customer_name`, `customer_email`, `customer_pass`, `customer_country`, `customer_city`, `customer_contact`, `customer_address`, `customer_image`, `customer_ip`) VALUES
(1, 'Md Mosaddiqur Rahman', 'mr.mmr1998@gmail.com', 0, 'Bangladesh', 'kapasia', '01954947465', 'vuleshar', 'man.png', '::1'),
(8, 'lubna', 'lubna99@gmail.com', 1234, 'bangladesh', 'gazipur', '01954947465', '27/A, konabari', 'shari-3.webp', '::1'),
(9, 'rakib', 'rakib.bcse@gmail.com', 1234, 'bangladesh', 'dhaka', '0172458645', 'mirpur-1', '_pragna_-men_s-shirt--awms-04.jpg', '::1');

-- --------------------------------------------------------

--
-- Table structure for table `customer_orders`
--

CREATE TABLE `customer_orders` (
  `order_id` int(10) NOT NULL,
  `customer_id` int(10) NOT NULL,
  `due_amount` int(100) NOT NULL,
  `invoice_no` int(100) NOT NULL,
  `qty` int(10) NOT NULL,
  `size` text NOT NULL,
  `order_date` date NOT NULL,
  `order_status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer_orders`
--

INSERT INTO `customer_orders` (`order_id`, `customer_id`, `due_amount`, `invoice_no`, `qty`, `size`, `order_date`, `order_status`) VALUES
(1, 8, 2400, 1011224403, 1, 'Small', '2020-10-07', 'pending'),
(2, 9, 1800, 2145308905, 1, 'Large', '2020-10-07', 'confirmed'),
(3, 1, 6000, 220814229, 3, 'Medium', '2020-10-07', 'complete');

-- --------------------------------------------------------

--
-- Table structure for table `manufacturers`
--

CREATE TABLE `manufacturers` (
  `manufacturer_id` int(10) NOT NULL,
  `manufacturer_title` text NOT NULL,
  `manufacturer_top` text NOT NULL,
  `manufacturer_image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `manufacturers`
--

INSERT INTO `manufacturers` (`manufacturer_id`, `manufacturer_title`, `manufacturer_top`, `manufacturer_image`) VALUES
(1, 'dorjibari', 'yes', '738aa41052ed-4c0f6c528c1c-99087551-2ed9-4207-a29c-7f7a02fc6df2-195.jpeg'),
(2, 'Aarong', 'no', 'download.png'),
(4, 'Anjans', 'no', 'f5a6f6edef76-548277_392847890762608_1342970042_n.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `payment_id` int(10) NOT NULL,
  `order_id` int(10) NOT NULL,
  `invoice_no` int(10) NOT NULL,
  `amount` int(10) NOT NULL,
  `payment_mode` text NOT NULL,
  `ref_no` int(10) NOT NULL,
  `code` text NOT NULL,
  `payment_date` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`payment_id`, `order_id`, `invoice_no`, `amount`, `payment_mode`, `ref_no`, `code`, `payment_date`) VALUES
(1, 2, 2145308905, 1800, 'Bkash', 124578644, '01745214578', '2020-10-08'),
(2, 3, 220814229, 6000, 'Bkash', 12345678, '01745214578', '2020-10-07');

-- --------------------------------------------------------

--
-- Table structure for table `pending_orders`
--

CREATE TABLE `pending_orders` (
  `order_id` int(10) NOT NULL,
  `customer_id` int(10) NOT NULL,
  `invoice_no` int(10) NOT NULL,
  `product_id` text NOT NULL,
  `qty` int(10) NOT NULL,
  `size` text NOT NULL,
  `order_status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pending_orders`
--

INSERT INTO `pending_orders` (`order_id`, `customer_id`, `invoice_no`, `product_id`, `qty`, `size`, `order_status`) VALUES
(1, 8, 1011224403, '21', 1, 'Small', 'pending'),
(2, 9, 2145308905, '19', 1, 'Large', 'confirmed'),
(3, 1, 220814229, '20', 3, 'Medium', 'complete');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(10) NOT NULL,
  `p_cat_id` int(10) NOT NULL,
  `cat_id` int(10) NOT NULL,
  `manufacturer_id` int(10) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `product_title` text NOT NULL,
  `product_img1` text NOT NULL,
  `product_img2` text NOT NULL,
  `product_img3` text NOT NULL,
  `product_price` int(10) NOT NULL,
  `stock` int(100) NOT NULL,
  `product_keywirds` text NOT NULL,
  `product_desc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `p_cat_id`, `cat_id`, `manufacturer_id`, `date`, `product_title`, `product_img1`, `product_img2`, `product_img3`, `product_price`, `stock`, `product_keywirds`, `product_desc`) VALUES
(15, 1, 1, 1, '2020-10-07 10:29:51', 'Pragna Men Shirt- AWMS-04', '_pragna_-men_s-shirt--awms-04.jpg', 'dsc_7231_1.png', 'dsc_7228_1.png', 1010, 105, 'solid color', '<h1>heading 1</h1>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quia ipsum quidem voluptates modi culpa, itaque, vel id assumenda totam enim tempora impedit laudantium at officia ea, ut illum facere. Maxime?</p>\r\n<h2>heading 2</h2>\r\n<p>orem ipsum dolor sit amet, consectetur adipisicing elit. Quia ipsum quidem voluptates modi culpa, itaque, vel id assumenda totam enim tempora impedit laudantium at officia ea, ut illum facere. Maxime?</p>\r\n<h3>heading 3</h3>\r\n<p>orem ipsum dolor sit amet, consectetur adipisicing elit. Quia ipsum quidem voluptates modi culpa, itaque, vel id assumenda totam enim tempora impedit laudantium at officia ea, ut illum facere. Maxime?</p>\r\n<div id=\"gtx-trans\" style=\"position: absolute; left: 137px; top: 145.5px;\">\r\n<div class=\"gtx-trans-icon\">&nbsp;</div>\r\n</div>'),
(16, 1, 1, 2, '2020-10-07 01:49:21', 'Mens Long Sleeve Printed Shirt ', '4c51580aaeea7c57aedbebfd564ca8c4.jpg', 'cfc93d01e167770d5e49e23747dd6491.jpg', '5ff3f334cead7a47e9542fb8f993f148_350x350.jpg', 1200, 100, 'full sleeve', '<h1>heading 1</h1>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Id necessitatibus sequi dolorum velit quam, quae corporis soluta! Repudiandae voluptas ab voluptates architecto, ipsum deserunt soluta tempore eum ullam nesciunt veritatis.</p>\r\n<h2>heading 2</h2>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Id necessitatibus sequi dolorum velit quam, quae corporis soluta! Repudiandae voluptas ab voluptates architecto, ipsum deserunt soluta tempore eum ullam nesciunt veritatis.</p>'),
(17, 1, 1, 4, '2020-10-07 10:39:25', 'Mens printed Short Sleeve Shirt ', '7a95c3d08328f3b7dfd921f46bea6d4c.jpg', '056b27018da25f599e8ca7dc5a71ad3c.jpg', 'b13abf0de1e2fcd6812306c17da1cfcc.jpg', 1500, 90, 'half sleeve', '<h1>Heading 1</h1>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Id necessitatibus sequi dolorum velit quam, quae corporis soluta! Repudiandae voluptas ab voluptates architecto, ipsum deserunt soluta tempore eum ullam nesciunt veritatis.</p>\r\n<h2>heading 2</h2>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Id necessitatibus sequi dolorum velit quam, quae corporis soluta! Repudiandae voluptas ab voluptates architecto, ipsum deserunt soluta tempore eum ullam nesciunt veritatis.</p>\r\n<h3>heading 3</h3>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Id necessitatibus sequi dolorum velit quam, quae corporis soluta! Repudiandae voluptas ab voluptates architecto, ipsum deserunt soluta tempore eum ullam nesciunt veritatis.</p>'),
(18, 3, 1, 1, '2020-10-07 03:09:53', 'Mens Panjabi with INDIAN ethnic design', '4054_1-426x426.jpg', '4054_collar-1000x1000.jpg', '4054_cuff-1000x1000.jpg', 1500, 100, 'indian panjabi', '<h1>heading 1</h1>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Id necessitatibus sequi dolorum velit quam, quae corporis soluta! Repudiandae voluptas ab voluptates architecto, ipsum deserunt soluta tempore eum ullam nesciunt veritatis.</p>\r\n<h2>heading 2</h2>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Id necessitatibus sequi dolorum velit quam, quae corporis soluta! Repudiandae voluptas ab voluptates architecto, ipsum deserunt soluta tempore eum ullam nesciunt veritatis.</p>\r\n<h3>heading 3</h3>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Id necessitatibus sequi dolorum velit quam, quae corporis soluta! Repudiandae voluptas ab voluptates architecto, ipsum deserunt soluta tempore eum ullam nesciunt veritatis.</p>'),
(19, 3, 1, 2, '2020-10-07 06:24:08', 'Mens Stylish Cotton Panjabi', '4052_1-426x426.jpg', '4052_collar-1000x1000.jpg', '4052_cuff-1000x1000.jpg', 1800, 99, 'indian panjabi', '<h1>heading 1</h1>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Id necessitatibus sequi dolorum velit quam, quae corporis soluta! Repudiandae voluptas ab voluptates architecto, ipsum deserunt soluta tempore eum ullam nesciunt veritatis.</p>\r\n<h2>heading 2</h2>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Id necessitatibus sequi dolorum velit quam, quae corporis soluta! Repudiandae voluptas ab voluptates architecto, ipsum deserunt soluta tempore eum ullam nesciunt veritatis.</p>\r\n<h3>heading 3</h3>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Id necessitatibus sequi dolorum velit quam, quae corporis soluta! Repudiandae voluptas ab voluptates architecto, ipsum deserunt soluta tempore eum ullam nesciunt veritatis.</p>\r\n<p>&nbsp;</p>'),
(20, 3, 1, 4, '2021-01-01 09:13:32', 'Indian Cotton Semi Long Panjabi For Men', '4071_1-426x426.jpg', '4071_collar-1000x1000.jpg', '4071_cuff-1000x1000.jpg', 2000, 96, 'indian panjabi', '<h1>heading 1</h1>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Id necessitatibus sequi dolorum velit quam, quae corporis soluta! Repudiandae voluptas ab voluptates architecto, ipsum deserunt soluta tempore eum ullam nesciunt veritatis.</p>\r\n<h2>heading 2</h2>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Id necessitatibus sequi dolorum velit quam, quae corporis soluta! Repudiandae voluptas ab voluptates architecto, ipsum deserunt soluta tempore eum ullam nesciunt veritatis.</p>\r\n<h3>heading 3</h3>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Id necessitatibus sequi dolorum velit quam, quae corporis soluta! Repudiandae voluptas ab voluptates architecto, ipsum deserunt soluta tempore eum ullam nesciunt veritatis.</p>'),
(21, 2, 2, 1, '2020-10-07 06:21:17', 'Banarasi Art Silk Woven Saree', 'shari.webp', 'shari-2.webp', 'shari-3.webp', 2400, 99, 'shari', '<h1>Heading 1</h1>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Id necessitatibus sequi dolorum velit quam, quae corporis soluta! Repudiandae voluptas ab voluptates architecto, ipsum deserunt soluta tempore eum ullam nesciunt veritatis.</p>\r\n<h2>heading 2</h2>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Id necessitatibus sequi dolorum velit quam, quae corporis soluta! Repudiandae voluptas ab voluptates architecto, ipsum deserunt soluta tempore eum ullam nesciunt veritatis.</p>\r\n<h3>heading 3</h3>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Id necessitatibus sequi dolorum velit quam, quae corporis soluta! Repudiandae voluptas ab voluptates architecto, ipsum deserunt soluta tempore eum ullam nesciunt veritatis.</p>');

-- --------------------------------------------------------

--
-- Table structure for table `products_categories`
--

CREATE TABLE `products_categories` (
  `p_cat_id` int(10) NOT NULL,
  `p_cat_title` text NOT NULL,
  `p_cat_top` text NOT NULL,
  `p_cat_image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products_categories`
--

INSERT INTO `products_categories` (`p_cat_id`, `p_cat_title`, `p_cat_top`, `p_cat_image`) VALUES
(1, 'Shirts', 'yes', '0044_Boys-Summer-Shirt.jpg'),
(2, 'Shari', 'yes', 'Red-Color-Jamdani-Shari.jpeg'),
(3, 'Panjabi', 'no', 'panjabi_1.jpg'),
(4, 'Pants', 'no', 'Me-002020_Approach_Pant_Me-01011_Shadow_Grey_grande.webp'),
(5, 'Shoes', 'no', 'leather-derby-shoe-vector-men-shoes-icon-115631711540hu1rqen8y.png');

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `slide_id` int(10) NOT NULL,
  `slide_name` varchar(255) NOT NULL,
  `slide_image` text NOT NULL,
  `slide_url` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`slide_id`, `slide_name`, `slide_image`, `slide_url`) VALUES
(7, 'slide no 2', 'slide-2.jpg', 'http://localhost/project/cart.php'),
(8, 'slide 3', 'slide-3.jpg', 'http://localhost/project/Shop.php'),
(11, 'slide no 4 ', 'slide-4.jpg', 'http://localhost/project/Shop.php'),
(12, 'slide 1', 'slide-1.jpg', 'http://localhost/project/contact.php');

-- --------------------------------------------------------

--
-- Table structure for table `terms`
--

CREATE TABLE `terms` (
  `term_id` int(10) NOT NULL,
  `term_title` varchar(100) NOT NULL,
  `term_link` varchar(100) NOT NULL,
  `term_desc` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `terms`
--

INSERT INTO `terms` (`term_id`, `term_title`, `term_link`, `term_desc`) VALUES
(1, 'Terms & Conditions', 'termslink', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto omnis sequi, eligendi ea. Labore saepe rerum molestiae velit veritatis tenetur, omnis temporibus beatae est, doloremque ipsam vel et, sunt mollitia!'),
(2, 'Refound Policy', 'Refoundlink', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto omnis sequi, eligendi ea. Labore saepe rerum molestiae velit veritatis tenetur, omnis temporibus beatae est, doloremque ipsam vel et, sunt mollitia!'),
(3, 'Promo & Other term conditions', 'promolink', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto omnis sequi, eligendi ea. Labore saepe rerum molestiae velit veritatis tenetur, omnis temporibus beatae est, doloremque ipsam vel et, sunt mollitia!'),
(6, 'check 2', 'check', '<p>seriously</p>');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `boxes_section`
--
ALTER TABLE `boxes_section`
  ADD PRIMARY KEY (`box_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `customer_orders`
--
ALTER TABLE `customer_orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `manufacturers`
--
ALTER TABLE `manufacturers`
  ADD PRIMARY KEY (`manufacturer_id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `pending_orders`
--
ALTER TABLE `pending_orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `products_categories`
--
ALTER TABLE `products_categories`
  ADD PRIMARY KEY (`p_cat_id`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`slide_id`);

--
-- Indexes for table `terms`
--
ALTER TABLE `terms`
  ADD PRIMARY KEY (`term_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `admin_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `boxes_section`
--
ALTER TABLE `boxes_section`
  MODIFY `box_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `customer_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `customer_orders`
--
ALTER TABLE `customer_orders`
  MODIFY `order_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `manufacturers`
--
ALTER TABLE `manufacturers`
  MODIFY `manufacturer_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `payment_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pending_orders`
--
ALTER TABLE `pending_orders`
  MODIFY `order_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `products_categories`
--
ALTER TABLE `products_categories`
  MODIFY `p_cat_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `slide_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `terms`
--
ALTER TABLE `terms`
  MODIFY `term_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
