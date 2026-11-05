CREATE DATABASE IF NOT EXISTS `konkanmewa_db` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `konkanmewa_db`;

-- Drop tables if needed
DROP TABLE IF EXISTS `order_items`;
DROP TABLE IF EXISTS `orders`;
DROP TABLE IF EXISTS `cart`;
DROP TABLE IF EXISTS `wishlist`;
DROP TABLE IF EXISTS `products`;
DROP TABLE IF EXISTS `sub_category`;
DROP TABLE IF EXISTS `category_master`;
DROP TABLE IF EXISTS `user_registration`;
DROP TABLE IF EXISTS `admin`;
DROP TABLE IF EXISTS `admins`;
DROP TABLE IF EXISTS `fruits`;

-- Admin tables
CREATE TABLE `admin` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `username` VARCHAR(100) NOT NULL,
    `password` VARCHAR(255) NOT NULL
);

INSERT INTO `admin` (`username`, `password`) VALUES ('admin', 'admin123'), ('admin', 'password');

CREATE TABLE `admins` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `username` VARCHAR(100) NOT NULL,
    `password` VARCHAR(255) NOT NULL
);
INSERT INTO `admins` (`username`, `password`) VALUES ('admin', 'admin123');

-- Category Master
CREATE TABLE `category_master` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `category_name` VARCHAR(255) NOT NULL,
    `category_image` VARCHAR(255) NOT NULL
);

INSERT INTO `category_master` (`id`, `category_name`, `category_image`) VALUES
(1, 'Konkani Fruits', 'Konkani Fruits.png'),
(2, 'Syrups', 'Syrups.png'),
(3, 'Jams', 'Jams.png'),
(4, 'Pickles', 'Pickles.png'),
(5, 'Bhajni,Flours', 'Bhajni,Flours.png'),
(6, 'Snacks', 'Snacks.png'),
(7, 'Papad & Poli', 'Papad & Poli.png'),
(8, 'Chutney & Masalas', 'Chutney & Masalas.png'),
(9, 'Instant', 'Instant.png'),
(10, 'Sweets', 'Sweets.png');

-- Sub Category
CREATE TABLE `sub_category` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `category_id` INT NOT NULL,
    `sub_cat_name` VARCHAR(255) NOT NULL,
    `sub_cat_img` VARCHAR(255) NOT NULL
);

INSERT INTO `sub_category` (`id`, `category_id`, `sub_cat_name`, `sub_cat_img`) VALUES
(1, 1, 'Alphonso Mangoes', 'subcat_67fb7c33c18f6.jpg'),
(2, 1, 'Cashews & Seasonal', 'subcat_67fb7aa62f9b0.jpg');

-- Products table
CREATE TABLE `products` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `product_name` VARCHAR(255) NOT NULL,
    `category_id` INT NOT NULL,
    `subcategory_id` INT DEFAULT 0,
    `price` DECIMAL(10,2) NOT NULL,
    `qty` INT DEFAULT 50,
    `product_image` VARCHAR(255) NOT NULL,
    `description` TEXT NULL
);

INSERT INTO `products` (`id`, `product_name`, `category_id`, `subcategory_id`, `price`, `qty`, `product_image`) VALUES
(1, 'Karvand Syrup', 2, 0, 160.00, 50, 'Karvand Syrup.png'),
(2, 'Lemon Syrup', 2, 0, 120.00, 50, 'Lemon Syrup.png'),
(3, 'Kokum Aagal', 2, 0, 140.00, 50, 'Kokum Aagal.png'),
(4, 'Pachak', 2, 0, 110.00, 50, 'Pachak.png'),
(5, 'Kokum Syrup', 2, 0, 150.00, 50, 'Kokum Syrup.png'),
(6, 'Kesar Velchi Syrup', 2, 0, 190.00, 50, 'Kesar Velchi Syrup.png'),
(7, 'Amla Juice', 2, 0, 130.00, 50, 'Amla Juice.png'),
(8, 'Kairi Panha', 2, 0, 140.00, 50, 'Kairi Panha.png'),
(9, 'Amla Syrup', 2, 0, 150.00, 50, 'Amla Syrup.png'),
(10, 'Moravala', 3, 0, 180.00, 50, 'Moravala .png'),
(11, 'Mixed Fruit Jam', 3, 0, 150.00, 50, 'Mixed Fruit Jam.png'),
(12, 'Karvand Jam', 3, 0, 170.00, 50, 'Karvand Jam.png'),
(13, 'Alphonso Mango Jam', 3, 0, 190.00, 50, 'Alphonso Mango Jam.png'),
(14, 'Alphonso Muramba', 3, 0, 200.00, 50, 'Alphonso Muramba.png'),
(15, 'Karvand Pickle', 4, 0, 120.00, 50, 'Karvand Pickle.png'),
(16, 'Mix Pickle', 4, 0, 110.00, 50, 'Mix Pickle.png'),
(17, 'Ambe Halad Pickle', 4, 0, 140.00, 50, 'Ambe Halad Pickle.png'),
(18, 'Varhadi Thecha', 4, 0, 95.00, 50, 'Varhadi Thecha .png'),
(19, 'Chilli Kharada', 4, 0, 95.00, 50, 'Chilli Kharada.png'),
(20, 'Chilli Pickle', 4, 0, 90.00, 50, 'Chilli Pickle.png'),
(21, 'Amla Thecha', 4, 0, 100.00, 50, 'Amla Thecha.png'),
(22, 'Lemon Pickle', 4, 0, 100.00, 50, 'Lemon Pickle .png'),
(23, 'Amla Pickle', 4, 0, 110.00, 50, 'Amla Pickle.png'),
(24, 'Lemon Sweet Pickle', 4, 0, 115.00, 50, 'Lemon Sweet Pickle.png'),
(25, 'Chunda', 4, 0, 130.00, 50, 'Chunda.png'),
(26, 'Amboshi Pickle', 4, 0, 125.00, 50, 'Amboshi Pickle.png'),
(27, 'Mango Sweet Pickle', 4, 0, 55.00, 50, 'Mango Sweet Pickle Rs 55.png'),
(28, 'Mango Pickle', 4, 0, 130.00, 50, 'Mango Pickle Rs 130.png'),
(29, 'Kokani Thecha', 4, 0, 95.00, 50, 'Kokani Thecha.png'),
(30, 'Upavas Bhajani 200G', 5, 0, 80.00, 50, 'Upavas Bhajani 200G.jpeg'),
(31, 'Sunth Powder 100G', 5, 0, 75.00, 50, 'Sunth Powder100g .jpeg'),
(32, 'Nachani Satwa (Sugar)', 5, 0, 90.00, 50, 'Nachani Satwa ( Sugar).jpeg'),
(33, 'Malavani Vada Pith', 5, 0, 85.00, 50, 'Malavani Vada Pith.jpeg'),
(34, 'Amboli Pith 500G', 5, 0, 95.00, 50, 'Amboli Pith 500G .jpeg'),
(35, 'Amsul 500G', 5, 0, 160.00, 50, 'Amsul 500G.jpg'),
(36, 'Ghavan Flour', 5, 0, 85.00, 50, 'Ghavan Flour.png'),
(37, 'Kulith Flours', 5, 0, 90.00, 50, 'Kulith Flours.png'),
(38, 'Thalipeeth Bhajani', 5, 0, 95.00, 50, 'Thalipeeth Bhajani.png'),
(39, 'Nachani Satwa Without Sugar', 5, 0, 95.00, 50, 'Nachani Satwa Without Sugar.png'),
(40, 'Chivada', 6, 0, 90.00, 50, 'Chivada .png'),
(41, 'Chakali', 6, 0, 110.00, 50, 'Chakali.png'),
(42, 'Jackfruit Chips', 6, 0, 130.00, 50, 'Jackfruit Chips.png'),
(43, 'Kadboli Sticks', 6, 0, 85.00, 50, 'Kadboli Sticks.png'),
(44, 'Jambhul Poli (40 gm)', 7, 0, 60.00, 50, 'Jambhul Poli (40 gm ) .jpg'),
(45, 'Karvand Mava 200G', 7, 0, 140.00, 50, 'Karvand Mava 200G .jpg'),
(46, 'Karvand Wadi', 7, 0, 120.00, 50, 'Karvand Wadi .png'),
(47, 'Amla Petha', 7, 0, 130.00, 50, 'Amla Petha .png'),
(48, 'Amla Mawa', 7, 0, 140.00, 50, 'Amla Mawa .png'),
(49, 'Amba Modak', 7, 0, 160.00, 50, 'Amba Modak.png'),
(50, 'Alphonso Mango Poli', 7, 0, 120.00, 50, 'Alphonso Mango Poli.png'),
(51, 'Amba Vadi', 7, 0, 110.00, 50, 'Amba Vadi.jpg'),
(52, 'Poha Mirgund 100G', 7, 0, 65.00, 50, 'Poha Mirgund 100G.jpg'),
(53, 'Spe. Meat Masala 100G', 8, 0, 80.00, 50, 'Spe.Meat Masala 100G.jpeg'),
(54, 'Garam Masala', 8, 0, 75.00, 50, 'Garam Masala.png'),
(55, 'Fish Curry Masala', 8, 0, 85.00, 50, 'Fish Curry Masala .png'),
(56, 'Malvani Masala', 8, 0, 90.00, 50, 'Malvani Masala.png'),
(57, 'Goda Masala', 8, 0, 75.00, 50, 'Goda Masala.png'),
(58, 'Dangar', 8, 0, 60.00, 50, 'Dangar.png'),
(59, 'Metkut', 8, 0, 65.00, 50, 'Metkut.png'),
(60, 'Avala Supari 50 gm', 9, 0, 45.00, 50, 'Avala Supari 50 gm.jpeg'),
(61, 'Avala Supari 30G', 9, 0, 30.00, 50, 'Avala Supari 30G.jpg'),
(62, 'Lal Tandul 500G', 9, 0, 80.00, 50, 'Lal Tandul 500G.jpeg'),
(63, 'Gavathi Pohe 250G', 9, 0, 55.00, 50, 'Gavathi Pohe 250G.jpeg'),
(64, 'Khara Kaju 100G', 9, 0, 180.00, 50, 'Khara Kaju 100G.jpg'),
(65, 'Phanas Sandan', 9, 0, 120.00, 50, 'Phanas Sandan.png'),
(66, 'Khichadi', 9, 0, 70.00, 50, 'Khichadi.png'),
(67, 'Phanas Bhaji', 9, 0, 90.00, 50, 'Phanas Bhaji .png'),
(68, 'Gulbundi Ladoo', 10, 0, 150.00, 50, 'Gulbundi Ladoo.png'),
(69, 'Shankarpale', 10, 0, 110.00, 50, 'Shankarpale.png'),
(70, 'Shengdana Ladoo', 10, 0, 130.00, 50, 'Shengdana Ladoo .png'),
(71, 'Kadak Shev Ladoo', 10, 0, 140.00, 50, 'Kadak Shev Ladoo .png'),
(72, 'Kadak Bundi Ladoo', 10, 0, 140.00, 50, 'Kadak Bundi Ladoo.png'),
(73, 'Malvani Khaja', 10, 0, 160.00, 50, 'Malvani Khaja.png');

-- Also assign a couple to subcategories so subcategory views have products
UPDATE `products` SET `subcategory_id` = 1 WHERE `id` IN (13, 14, 50);
UPDATE `products` SET `subcategory_id` = 2 WHERE `id` IN (64);

-- User registration
CREATE TABLE `user_registration` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `first_name` VARCHAR(100) NOT NULL,
    `last_name` VARCHAR(100) NOT NULL,
    `email` VARCHAR(150) NOT NULL UNIQUE,
    `password` VARCHAR(255) NOT NULL,
    `phone` VARCHAR(50) DEFAULT NULL,
    `birthdate` DATE DEFAULT NULL,
    `gender` VARCHAR(20) DEFAULT NULL,
    `address` TEXT DEFAULT NULL,
    `city` VARCHAR(100) DEFAULT NULL,
    `region` VARCHAR(100) DEFAULT NULL,
    `postal` VARCHAR(20) DEFAULT NULL,
    `country` VARCHAR(100) DEFAULT NULL,
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO `user_registration` (`id`, `first_name`, `last_name`, `email`, `password`, `phone`, `birthdate`, `gender`, `address`, `city`, `region`, `postal`, `country`) VALUES
(1, 'Disha', 'Patil', 'disha@example.com', '123456', '9876543210', '2000-01-01', 'Female', 'Beach Road, Ratnagiri', 'Ratnagiri', 'Maharashtra', '415612', 'India'),
(2, 'Rahul', 'Sawant', 'rahul@example.com', '123456', '9822001122', '1998-05-15', 'Male', 'Malvan Market, Sindhudurg', 'Malvan', 'Maharashtra', '416606', 'India');

-- Cart table
CREATE TABLE `cart` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `user_id` INT NOT NULL,
    `product_id` INT NOT NULL,
    `qty` INT NOT NULL DEFAULT 1
);

INSERT INTO `cart` (`user_id`, `product_id`, `qty`) VALUES
(1, 1, 2),
(1, 5, 1);

-- Wishlist table
CREATE TABLE `wishlist` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `user_id` INT NOT NULL,
    `product_id` INT NOT NULL
);

INSERT INTO `wishlist` (`user_id`, `product_id`) VALUES
(1, 13),
(1, 41);

-- Orders table
CREATE TABLE `orders` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `user_id` INT NOT NULL,
    `fullname` VARCHAR(255) NOT NULL,
    `mobile` VARCHAR(50) NOT NULL,
    `address` TEXT NOT NULL,
    `total` DECIMAL(10,2) NOT NULL,
    `payment_method` VARCHAR(50) NOT NULL,
    `status` VARCHAR(50) NOT NULL,
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO `orders` (`id`, `user_id`, `fullname`, `mobile`, `address`, `total`, `payment_method`, `status`, `created_at`) VALUES
(1, 1, 'Disha Patil', '9876543210', 'Beach Road, Ratnagiri, Maharashtra', 470.00, 'cod', 'cod', '2026-11-04 10:30:00'),
(2, 2, 'Rahul Sawant', '9822001122', 'Malvan Market, Sindhudurg, Maharashtra', 780.00, 'online', 'paid', '2026-11-05 14:15:00');

-- Order items
CREATE TABLE `order_items` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `order_id` INT NOT NULL,
    `product_id` INT NOT NULL,
    `qty` INT NOT NULL,
    `price` DECIMAL(10,2) NOT NULL
);

INSERT INTO `order_items` (`order_id`, `product_id`, `qty`, `price`) VALUES
(1, 1, 2, 160.00),
(1, 5, 1, 150.00),
(2, 13, 2, 190.00),
(2, 14, 2, 200.00);

-- Fruits table (for fruits_list.php)
CREATE TABLE `fruits` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `fruits_name` VARCHAR(255) NOT NULL,
    `fruits_image` VARCHAR(255) NOT NULL
);
