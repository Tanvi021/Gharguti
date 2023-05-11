-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 28, 2023 at 01:49 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `food`
--

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `prod_id` int(11) NOT NULL,
  `prod_qty` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `user_id`, `prod_id`, `prod_qty`, `created_at`) VALUES
(34, 7, 20, 1, '2023-02-27 20:42:21');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `name` varchar(191) NOT NULL,
  `slug` varchar(191) NOT NULL,
  `description` mediumtext DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `popular` tinyint(4) NOT NULL DEFAULT 0,
  `image` varchar(191) NOT NULL,
  `meta_title` varchar(191) NOT NULL,
  `meta_description` mediumtext NOT NULL,
  `meta_keywords` mediumtext NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `name`, `slug`, `description`, `status`, `popular`, `image`, `meta_title`, `meta_description`, `meta_keywords`, `created_at`) VALUES
(10, 'Breakfast', 'breakfast', 'Breakfast the first meal of the day! #Gharguti offers a wide range of food-items that are cooked at home.\r\nFrom Kande Pohe to Masala Dosa, Rava Idli and Uttapa. Enjoy your first meal of the day with #Gharguti Nashta!\r\nBreakfast like a King!', 0, 1, '1676723291.png', 'Breakfast like a King!', '#Gharguti offers a wide range of food-items that are cooked at home.\r\nFrom Kande Pohe to Masala Dosa, Rava Idli and Uttapa. Enjoy your first meal of the day!', 'breakfast', '2023-02-18 12:28:11'),
(11, 'Lunch', 'lunch', 'Lunch the second meal of the day! Make it more nutritious and energetic with #Gharguti.\r\nChoose from a wide variety of lunchbox specialities. Enjoy your meals!', 0, 1, '1676723667.png', 'Lunch', 'Lunch the second meal of the day! Make it more nutritious and energetic with #Gharguti.', 'midday lunch', '2023-02-18 12:34:27'),
(12, 'Snacks', 'snacks', 'Variety of snacks, variety of tastes, and most importantly that Ghar ka swad has been added to these snacks.\r\nHealthy and Delicious snacks.\r\nEnjoy these snacks with your friends and family.', 0, 1, '1676724160.png', 'Snacks', 'Healthy and Delicious snacks.\r\nEnjoy these snacks with your friends and family.', 'evening snacks', '2023-02-18 12:42:40'),
(13, 'Dinner', 'dinner', 'Nothing beats a homemade Dinner.\r\nThe main meal of the day to be served at night, which must be a little light and full of appetite.\r\nDinner from #Gharguti it is!', 0, 1, '1676724808.png', 'Dinner', 'The main meal of the day to be served at night, which must be a little light and full of appetite.\r\nDinner from #Gharguti it is!', 'night dinner', '2023-02-18 12:53:28'),
(14, 'Today Special', 'todaysspecial', 'Todays special meal of the day!\r\nFrom sweets such as Puranpoli and Gulabjamun to Non-veg platters on Wednesday, Friday and Sunday \r\nwith a wide range of your favourite food items.', 0, 1, '1676725764.png', 'Todays Special', 'From sweets such as Puranpoli and Gulabjamun to Non-veg platters on Wednesday, Friday and Sunday \r\nwith a wide range of your favourite food items.', 'today special', '2023-02-18 13:09:24'),
(15, 'Non-Veg', 'nonveg', 'Taste the best Konkani Cuisine in our Non-veg menu.\r\nFrom Surmai Thali to Butter Chicken on your way to fulfill your cravings.\r\nEnjoy!', 1, 1, '1677523018.png', 'NonVeg', 'Taste the best Konkani Cuisine in our Non-veg menu.\r\nFrom Surmai Thali to Butter Chicken on your way to fulfill your cravings.\r\nEnjoy!', 'nonveg', '2023-02-27 18:36:58');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `tracking_no` varchar(191) NOT NULL,
  `user_id` int(191) NOT NULL,
  `name` varchar(191) NOT NULL,
  `email` varchar(191) NOT NULL,
  `phone` varchar(191) NOT NULL,
  `address` mediumtext NOT NULL,
  `pincode` int(191) NOT NULL,
  `total_price` int(191) NOT NULL,
  `payment_mode` varchar(191) NOT NULL,
  `payment_id` int(191) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `comments` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` int(11) NOT NULL,
  `order_id` int(191) NOT NULL,
  `prod_id` int(191) NOT NULL,
  `qty` int(191) NOT NULL,
  `price` int(191) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `name` varchar(191) NOT NULL,
  `slug` varchar(191) NOT NULL,
  `small_description` mediumtext NOT NULL,
  `description` mediumtext NOT NULL,
  `original_price` int(11) NOT NULL,
  `selling_price` int(11) NOT NULL,
  `image` varchar(191) NOT NULL,
  `qty` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `trending` tinyint(4) NOT NULL,
  `meta_title` varchar(191) NOT NULL,
  `meta_keywords` mediumtext NOT NULL,
  `meta_description` mediumtext NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `menu_id`, `name`, `slug`, `small_description`, `description`, `original_price`, `selling_price`, `image`, `qty`, `status`, `trending`, `meta_title`, `meta_keywords`, `meta_description`, `created_at`) VALUES
(12, 10, 'Kande Pohe', 'pohe', 'Kande Pohe is a very delicious and super healthy Maharashtrian breakfast. \r\nIt is a wholesome meal in itself and is highly nutritious.', 'Kande Pohe is a very delicious and super healthy Maharashtrian breakfast. \r\nIt is a wholesome meal in itself and is highly nutritious.\r\nPoha is nothing but parboiled, flattened rice.\r\nIt is easy to digest and is a good source of Iron and Carbohydrates, thus making it a healthy breakfast.', 35, 30, '1676933260.png', 14, 0, 1, 'Kande Pohe', 'Kande Pohe Poha', 'Kande Pohe is a very delicious and super healthy Maharashtrian breakfast. \r\nIt is a wholesome meal in itself and is highly nutritious.\r\nIt is easy to digest and is a good source of Iron and Carbohydrates, thus making it a healthy breakfast.', '2023-02-18 13:27:13'),
(13, 10, 'Upma', 'upma', 'Upma is a wholesome Indian dish made with dry semolina or rice flour,\r\ncooked into a thick porridge. Traditionally served hot for breakfast.\r\n', 'Upma is a flavorful South Indian breakfast dish made from rava or cream of wheat. This traditional dish involves cooking roasted rava in water that has been flavored by ghee (or oil), cashews, urad dal (lentils), chana dal (husked chickpeas), onion, ginger and additional herbs and spices.', 0, 40, '1676933430.png', 25, 0, 1, 'Upma', 'Upma', 'Upma is a wholesome Indian dish made with dry semolina or rice flour,\r\ncooked into a thick porridge. Traditionally served hot for breakfast.\r\n', '2023-02-20 16:36:58'),
(14, 10, 'Masala Dosa', 'masala dosa', 'Masala Dosa is made from a batter of soaked rice and lentils that is baked into a thin pancake \r\nand usually stuffed with potatoes, onions, and mustard seeds. \r\nThis dish is served with coconut chutney and Sambar.', 'A traditional southern Indian dish known as masala dosa is popular throughout the country,\r\nmade from a batter of soaked rice and lentils that is baked into a thin pancake and \r\nusually stuffed with potatoes, onions, and mustard seeds. \r\nThis dish is garnished with grated coconut and chopped coriander.', 0, 60, '1676933687.png', 27, 0, 1, 'Masala Dosa', 'masala dosa', 'Masala Dosa is made from a batter of soaked rice and lentils that is baked into a thin pancake \r\nand usually stuffed with potatoes, onions, and mustard seeds.', '2023-02-20 16:39:42'),
(15, 10, 'Medu Vada Sambar', 'meduvada', 'Vada Sambar (Medu Vada Or Ulundu Vadai) is a crispy fritter made of urad dal (black skinned lentil). \r\nThese vadas are crisp from outside and soft from inside served with Sambar.', 'Vada Sambar (Medu Vada Or Ulundu Vadai) is a crispy fritter made of urad dal (black skinned lentil). \r\nThese vadas are crisp from outside and soft from inside. \r\nMedhu vadai/ Ulunthu Vada is a popular snack all over India but it is a must in south Indian cuisine.\r\nNo festival, ceremony or party is complete without Vadai.', 45, 40, '1676934877.png', 19, 0, 1, 'Medu Vada Sambar', 'medu vada sambar', 'Vada Sambar (Medu Vada Or Ulundu Vadai) is a crispy fritter made of urad dal (black skinned lentil). \r\nThese vadas are crisp from outside and soft from inside served with Sambar.', '2023-02-20 23:14:37'),
(16, 10, 'Sabudana Khichdi', 'sabudanakhichdi', 'A delicious dish of tapioca pearls cooked with potatoes and peanuts. \r\nGood for the fasting days.', 'Sabudana Khichdi, a popular dish made from soaked sabudana. \r\nSabudana pearls (also referred as Sago/Tapioca/ Javarasi), is soaked for at least 5 hours (or overnight),\r\nand is then sautéed with cumin seeds, salt, green chillies, diced potatoes and crushed peanuts,\r\n garnished with finely chopped coriander leaves and generous squeeze of lemon.', 35, 30, '1676935426.png', 14, 0, 1, 'Sabudana Khichdi', 'sabudana', 'Sabudana Khichdi, a popular dish made from soaked sabudana. \r\nA delicious dish of tapioca pearls cooked with potatoes and peanuts. \r\nGood for the fasting days.', '2023-02-20 23:23:46'),
(17, 10, 'Idli Sambar', 'idlisambar', 'Idli Sambar is a South Indian breakfast meal where soft fluffy steamed cakes known as idli are served with sambar,\r\na vegetable lentil stew. Idli sambar is made with lentils, plenty of spices, mixed vegetables and herbs.', 'Idli Sambar is a South Indian breakfast meal where soft fluffy steamed cakes known as idli are served with sambar, \r\na vegetable lentil stew. Idli sambar is made with lentils, plenty of spices,\r\nmixed vegetables and herbs.Try this amazingly delicious and \r\neasy idli sambar for a hearty, protein packed and flavorsome meal.', 60, 50, '1676935804.png', 20, 0, 1, 'Idli Sambar', 'idli sambar', 'Idli Sambar is a South Indian breakfast meal where soft fluffy steamed cakes known as idli are served with sambar,\r\na vegetable lentil stew. Idli sambar is made with lentils, plenty of spices, mixed vegetables and herbs.', '2023-02-20 23:30:04'),
(18, 12, 'Samosa', 'samosa', 'There’s no doubt that the beloved samosa is one of the most popular snacks in southeast Asia,\r\nbut is a mouth-watering delight that should be enjoyed by everyone.', 'These deep-fried, triangular pastries are filled with a variety of ingredients ranging from vegetables to meat,\r\nsuch as onions, lentils, spiced potatoes, peas, or ground meat.\r\nThere’s no doubt that the beloved samosa is one of the most popular snacks in southeast Asia,\r\nbut is a mouth-watering delight that should be enjoyed by everyone.', 25, 20, '1677523360.png', 20, 0, 0, 'Samosa', 'samosa', 'There’s no doubt that the beloved samosa is one of the most popular snacks in southeast Asia,\r\nbut is a mouth-watering delight that should be enjoyed by everyone.', '2023-02-27 18:42:40'),
(19, 12, 'Cheese Toast Sandwitch', 'cheesetoast', 'A cheese  toast sandwich is a sandwich made with cheese on bread.\r\nTypically semi-hard cheeses are used for the filling, such as Cheddar,\r\nRed Leicester, or Double Gloucester.', 'A cheese  toast sandwich is a sandwich made with cheese on bread.\r\nTypically semi-hard cheeses are used for the filling, such as Cheddar,\r\nRed Leicester, or Double Gloucester.\r\nCraving to eat something cheesy order our Cheese Toast Sandwitch and enjoy!', 60, 50, '1677523698.png', 15, 0, 1, 'cheesytoast', 'CheeseToast', 'A cheese  toast sandwich is a sandwich made with cheese on bread.\r\nTypically semi-hard cheeses are used for the filling, such as Cheddar,\r\nRed Leicester, or Double Gloucester.', '2023-02-27 18:48:18'),
(20, 14, 'Modak', 'modak', 'Modak are Maharashtrian festive dumplings made with rice flour dough & a sweet coconut jaggery filling.', 'Modak are Maharashtrian festive dumplings made with rice flour dough & a sweet coconut jaggery filling.\r\nOrder aur Tuesday Special Modak served with ghee.\r\n5 dumplings served in one quantity.', 130, 121, '1677524657.png', 21, 0, 1, 'Modak', 'modak', 'Modak are Maharashtrian festive dumplings made with rice flour dough & a sweet coconut jaggery filling.\r\nOrder aur Tuesday Special Modak served with ghee.', '2023-02-27 19:04:17'),
(21, 14, 'Puranpoli', 'puranpoli', 'Puran Poli is an Indian delicacy made by stuffing soft whole wheat dough with soft-cooked yellow lentils, jaggery/brown sugar, cardamom, nutmeg, and saffron. It is then rolled thin and cooked on a pan with lots of ghee to make it into a crisp golden brown, flavorful, and aromatic flatbread.', 'Puran Poli is an Indian delicacy made by stuffing soft whole wheat dough with soft-cooked yellow lentils, jaggery/brown sugar, cardamom, nutmeg, and saffron. It is then rolled thin and cooked on a pan with lots of ghee to make it into a crisp golden brown, flavorful, and aromatic flatbread.\r\n2 Puranpolis are served with shreekhand in a platter.', 40, 30, '1677525299.png', 20, 0, 1, 'puranpoli', 'puranpoli', 'Puran Poli is an Indian delicacy made by stuffing soft whole wheat dough with soft-cooked yellow lentils, jaggery/brown sugar, cardamom, nutmeg, and saffron. It is then rolled thin and cooked on a pan with lots of ghee to make it into a crisp golden brown, flavorful, and aromatic flatbread.', '2023-02-27 19:14:59'),
(22, 14, 'Gulabjamun', 'gulabjamun', 'Gulab jamun is a beloved Indian dessert consisting of fried balls of a dough made from milk solids and semolina, soaked with an aromatic syrup spiced with green cardamom, rose water, saffron, and more. Paying close attention to the ingredients and temperatures involved yields sweet, light gulab jamuns with moist interiors.', 'Gulab jamun is a beloved Indian dessert consisting of fried balls of a dough made from milk solids and semolina,\r\nsoaked with an aromatic syrup spiced with green cardamom, rose water, saffron, and more. \r\nPaying close attention to the ingredients and temperatures involved yields sweet, light gulab jamuns with moist interiors.\r\n2 Gulab jamuns are served in 1 quantity.', 40, 30, '1677525493.png', 20, 0, 1, 'gulabjamun', 'gulabjamun', 'Gulab jamun is a beloved Indian dessert consisting of fried balls of a dough made from milk solids and semolina, soaked with an aromatic syrup spiced with green cardamom, rose water, saffron, and more. Paying close attention to the ingredients and temperatures involved yields sweet, light gulab jamuns with moist interiors.', '2023-02-27 19:18:13'),
(23, 11, 'Dal Makhani, 1 Thepla & Wild Rice Thali with Sprouts', 'L1', 'Enjoy this creamy mouth-watering accompaniment with soft methi thepla and rice mix. Made healthy with mix veggie raita topped with moong sprouts. Allergen Information- Contains Gluten, Dairy', 'Dal Makhani, 1 Thepla & Wild Rice Thali with Sprouts in one quantity.\r\nEnjoy this creamy mouth-watering accompaniment with soft methi thepla and rice mix. Made healthy with mix veggie raita topped with moong sprouts. Allergen Information- Contains Gluten, Dairy', 160, 100, '1677526256.png', 20, 0, 0, 'l1', 'l1', 'Enjoy this creamy mouth-watering accompaniment with soft methi thepla and rice mix. Made healthy with mix veggie raita topped with moong sprouts. Allergen Information- Contains Gluten, Dairy', '2023-02-27 19:30:56'),
(24, 11, 'Chole, Mix Veg Poriyal, Paratha Thali', 'l3', 'Ever loved combination of soft parathas along with chana masala and mix veg poriyal. Allergen information: Gluten', 'Chole, Mix Veg Poriyal, Paratha Thali in one quantity\r\nEver loved combination of soft parathas along with chana masala and mix veg poriyal. Allergen information Gluten.', 160, 100, '1677527067.png', 20, 0, 0, 'l3', 'l3', 'Ever loved combination of soft parathas along with chana masala and mix veg poriyal. Allergen information: Gluten', '2023-02-27 19:44:27'),
(25, 13, 'Shahi Subz Biryani', 'd1', 'Dig into our Shahi subz biryani thats the perfect balance of spices and flavours. Made with a medley of vegetables like carrots, beans and cauliflower, the white rice biryani is finished off with some caramelised onions. \r\nServed with raita. Allergen information: Contains dairy and nuts. \r\nNutrition value of raita excluded.', 'Dig into our Shahi subz biryani thats the perfect balance of spices and flavours. Made with a medley of vegetables like carrots, beans and cauliflower, the white rice biryani is finished off with some caramelised onions. \r\nServed with raita. Allergen information: Contains dairy and nuts. \r\nNutrition value of raita excluded.\r\n500gm in one quantity', 260, 200, '1677527822.png', 20, 0, 1, 'dinner', 'd1', 'Dig into our Shahi subz biryani thats the perfect balance of spices and flavours. Made with a medley of vegetables like carrots, beans and cauliflower, the white rice biryani is finished off with some caramelised onions. \r\nServed with raita. Allergen information: Contains dairy and nuts. \r\nNutrition value of raita excluded.', '2023-02-27 19:57:02'),
(26, 13, 'Daal Khichdi', 'daalkhichdi', 'Khichdi made with rice, moong dal lentils and spices,\r\nis a super comforting one pot protein-rich Indian meal. It’s delicious, nourishing and wholesome.', 'Khichdi has to be the healthiest and most comforting of all Indian food especially if you get the ratios right!\r\nKhichdi made with rice, moong dal lentils and spices,\r\nis a super comforting one pot protein-rich Indian meal. It’s delicious, nourishing and wholesome.', 60, 50, '1677528681.png', 20, 0, 1, 'daalkhichdi', 'daalkhichdi', 'Khichdi made with rice, moong dal lentils and spices,\r\nis a super comforting one pot protein-rich Indian meal. It’s delicious, nourishing and wholesome.', '2023-02-27 20:11:21');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(191) NOT NULL,
  `email` varchar(191) NOT NULL,
  `phone` int(15) NOT NULL,
  `password` varchar(191) NOT NULL,
  `role_as` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `password`, `role_as`, `created_at`) VALUES
(5, 'Gharguti Admin', 'ghargutiii@gmail.com', 2147483647, 'Ta@210303', 1, '2023-02-18 10:19:25'),
(6, 'John Doe', 'writeups.tanvi@gmail.com', 2147483647, 'tanvi', 0, '2023-02-18 16:01:45'),
(7, 'John Doe', 'writeupss.tanvi@gmail.com', 2147483647, 'tanvi', 0, '2023-02-27 20:32:31');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
