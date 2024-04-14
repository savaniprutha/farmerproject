-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 26, 2024 at 05:29 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `farmer_final`
--

-- --------------------------------------------------------

--
-- Table structure for table `answers`
--

CREATE TABLE `answers` (
  `answers_id` int(11) NOT NULL,
  `question_id` int(11) DEFAULT NULL,
  `farmers_id` int(11) DEFAULT NULL,
  `answers_text` text NOT NULL,
  `answers_img` varchar(100) NOT NULL,
  `answers_approve` varchar(100) DEFAULT NULL,
  `answers_date_time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `answers`
--

INSERT INTO `answers` (`answers_id`, `question_id`, `farmers_id`, `answers_text`, `answers_img`, `answers_approve`, `answers_date_time`) VALUES
(4, 5, 2, 'In the 1700s, English farmers settled in New England villages.\r\n', 'a2.jpg', 'No', '2024-01-21 16:50:15'),
(5, 6, 3, 'California produces the most agriculture\r\nfor the United States', 'a3.jpg', 'No', '2024-02-14 16:53:40'),
(6, 7, 4, 'The combine harvester saves the farmers time and labor.', 'a4.jpg', 'No', '2024-02-12 16:55:06'),
(7, 8, 5, 'There are reports that primitive milking machines.', 'a5.jpg', 'No', '2024-02-26 16:56:06'),
(8, 9, 6, 'A seed drill was a device that allowed farmers to plant.', 'a6.jpg', 'No', '2024-03-16 16:58:28'),
(9, 10, 7, 'Windmills, mechanisms that look like giant pinwheels.\r\n', 'a7.jpg', 'No', '2024-03-27 16:59:48'),
(10, 11, 8, 'Today, the huge, airy farm structures we know as barns are used mostly.\r\n', 'a8.jpg', 'No', '2024-03-28 17:00:56'),
(11, 12, 9, 'The tall, cylinder-shaped farm structures known as silos.', 'a9.jpg', 'No', '2024-02-22 17:02:12');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cartid` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `farmers_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cartid`, `product_id`, `farmers_id`, `qty`) VALUES
(126, 71, 0, 5),
(127, 47, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(100) NOT NULL,
  `category_img` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`, `category_img`) VALUES
(12, 'Veges', 'c4.jpg'),
(13, 'Norwegian planters', 'c25.jpg'),
(14, 'orchardists', 'c24.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `farmers`
--

CREATE TABLE `farmers` (
  `farmers_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `mobile_no` varchar(100) NOT NULL,
  `email_id` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `registration_date_time` datetime NOT NULL DEFAULT current_timestamp(),
  `photo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `farmers`
--

INSERT INTO `farmers` (`farmers_id`, `name`, `mobile_no`, `email_id`, `password`, `gender`, `registration_date_time`, `photo`) VALUES
(1, 'Kenil', '9824909713', 'kenilmiyani@gmail.com', '456', 'male', '2024-09-01 14:41:17', 'f1.jpg'),
(2, 'Mihir', '9824909859', 'mihir322@gmail.com', '4323', 'male', '2023-12-06 15:54:01', 'f2.jpg'),
(3, 'Pooja', '9328559447', 'poja387@gmail.com', '9868', 'female', '2023-10-12 15:56:58', 'f3.jpg'),
(5, 'Raj', '845448434', 'raj435@gamil.com', '8354', 'male', '2024-01-11 16:11:29', 'f5.jpg'),
(6, 'Hitesh', '9855735474', 'hitesh223@gmail.com', '7687', 'male', '2021-02-11 16:19:36', 'f6.jpg'),
(7, 'Krisha', '9877333754', 'krisha799@gmail.com', '9646', 'female', '2021-02-15 16:21:10', 'f7.jpg'),
(8, 'Mehul', '9977554666', 'mehul776@gmail.com', '6573', 'male', '2024-03-01 16:22:59', 'f8.jpg'),
(9, 'Kajal', '8675549565', 'kajal657@gmail.com', '9856', 'female', '2024-03-21 16:32:09', 'f9.jpg'),
(11, 'kano', '8320424811', 'kano@gmail.com', '1234', 'male', '2024-02-29 12:01:35', 'f11.jpg\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `items_id` int(11) NOT NULL,
  `orders_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `qty` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`items_id`, `orders_id`, `product_id`, `qty`) VALUES
(4, 7, 48, '2'),
(5, 7, 53, '3'),
(6, 8, 47, '1'),
(7, 8, 49, '1'),
(8, 8, 48, '1');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `login_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `contact_no` varchar(100) NOT NULL,
  `email_id` varchar(100) NOT NULL,
  `profile_photo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`login_id`, `name`, `user_name`, `password`, `contact_no`, `email_id`, `profile_photo`) VALUES
(1, 'admin', 'admin', 'admin', '1234567890', 'admin@gmail.com', 'abc.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `news_id` int(11) NOT NULL,
  `news_title` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `img` varchar(100) DEFAULT NULL,
  `news_date` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`news_id`, `news_title`, `description`, `img`, `news_date`) VALUES
(14, ' India is not a food-surplus country', 'The roots of state intervention in agriculture, from government procurement to rationing and restrictions', 'n1.jpg', '2024-01-01 19:35:30'),
(15, 'Most Indians don’t eat enough they can’t afford to', 'Why are Indian diets poor when there is no scarcity of food? Most of them cannot afford good diets.', 'n2.jpg', '2024-01-16 19:38:27'),
(16, 'Farmers in Punjab, Haryana are better off than the rest', 'The farmers who are protesting outside Delhi’s borders are among the richest among their peers in India. ', 'n3.jpg', '2024-01-22 19:41:28'),
(17, 'Richer farmers inflicted greater environmental damage', 'The skewed nature of MSP procurement, especially for rice, has not been an unambiguous blessing for Punjab’s agriculture..                    ', 'n4.jpg', '2024-02-01 19:43:30'),
(18, ' PRESENT STAND-OFF WILL WIDEN TRUST DEFICIT BETWEEN FARMERS AND THE STATE', 'Even though Punjab and Haryana are not as critical to the country’s food security. ', 'n5.jpg', '2024-02-14 19:45:00'),
(19, 'Bharat bandh', 'Delhi Chief Minister Arvind Kejriwals party alleges he has been put under house arrest.                    ', 'n6.jpg', '2024-03-13 19:49:06');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `orders_id` int(11) NOT NULL,
  `farmers_id` int(11) NOT NULL,
  `addline_1` varchar(100) NOT NULL,
  `addline_2` varchar(100) NOT NULL,
  `landmask` varchar(100) NOT NULL,
  `pincode` varchar(100) NOT NULL,
  `orders_mobile_no` varchar(100) NOT NULL,
  `total_payment` decimal(18,2) NOT NULL,
  `is_pay` varchar(20) NOT NULL DEFAULT 'no',
  `pay_mode` varchar(20) NOT NULL DEFAULT 'cash',
  `orders_date_time` datetime NOT NULL DEFAULT current_timestamp(),
  `status` varchar(100) NOT NULL DEFAULT 'pending',
  `seller_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `cat_id` int(11) DEFAULT NULL,
  `product_name` varchar(100) NOT NULL,
  `price` decimal(18,2) NOT NULL,
  `img1` varchar(100) DEFAULT NULL,
  `img2` varchar(100) DEFAULT NULL,
  `img3` varchar(100) DEFAULT NULL,
  `product_added_date` datetime NOT NULL DEFAULT current_timestamp(),
  `description` text NOT NULL,
  `specification` text NOT NULL,
  `product_video_url` varchar(100) NOT NULL,
  `seller_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `cat_id`, `product_name`, `price`, `img1`, `img2`, `img3`, `product_added_date`, `description`, `specification`, `product_video_url`, `seller_id`) VALUES
(47, 12, 'Palak', 300.53, 'p2.jpg', 'productbig6.jpg', 'p1.jpg', '2021-10-28 17:39:31', 'palak is a leafy green vegetable native to central and western Asia .', 'Palak, also referred to as spinach in English, is a leafy green vegetable native to central and western Asia . It\'s a valuable source of vitamins and minerals and is commonly used in many cuisines around the world.', 'https://youtu.be/Tsx0zMylGbs', 11),
(48, 12, 'BeetRoot', 150.00, 'beet1.jpg', 'beet2.jpg', 'product31.jpg', '2021-10-20 17:41:04', 'Beetroot, also known as red beet', 'Beetroot, also known as red beet, table beet, or simply beet in North America, is the taproot portion of a beet plant . It\'s a root vegetable,  one of several cultivated varieties of Beta vulgaris grown for their edible taproots and leaves (called beet greens).  Other cultivars of the same species include the sugar beet, the leafy vegetable known as chard or spinach beet, and mangelwurzel, which is a fodder crop.\r\n', 'www.google.com', 11),
(49, 12, 'Cabbage', 300.53, 'c2.jpg', 'c3.jpg', 'c1.jpg', '2021-10-07 17:42:52', 'Cabbage is a leafy green, red, or white (pale green) biennial plant belonging to the \"cole crops\" or brassicas family. ', 'Arrangement: Alternating leaves spiraling up the stem.\r\nShape: Broad, rounded leaves with wavy or lobed edges. Some varieties have smooth, crinkled, or blistered leaves.\r\nColor: Green, red, purple, or white depending on the variety. The outer leaves tend to be darker green and tougher, while the inner leaves are lighter and more tender.\r\nVeins: Prominent central and lateral veins running through the leaves.', 'www.google.com', 11),
(50, 12, 'Milky', 300.53, 'loki3.jpg', 'loki1.jpg', 'loki4.jpg', '2021-10-07 17:44:59', 'This refers to something that is white or off-white and opaque, resembling milk. It often implies a slightly cloudy or hazy appearance, not perfectly clear white. ', 'Misspelling:  It could be a misspelling of a real vegetable name, like \"milky mushroom\" or \"milky lettuce.\"\r\n\r\nInformal Name:  In some regions, there might be a local or informal name for a vegetable that includes \"milky.\"  If you have any additional context about where you heard this term, I might be able to help you narrow it down.\r\n\r\nFigurative Description:  \"Milky\" might be used figuratively to describe a vegetable with a white or milky colored juice, like white asparagus or certain white squash varieties.', '', 11),
(51, 12, 'Brinjal', 324.00, 'b3.jpg', 'b4.jpg', 'b1.jpg', '2024-03-06 12:54:06', 'Fresho Brinjal - Purple\r\n', '\r\nBrinjal, also known as eggplant (US, CA, AU, NZ, PH) or aubergine (UK, IE) is a plant species in the nightshade family Solanaceae . Solanum melongena is grown worldwide for its edible fruit.', 'www.youtube.com/watch?v=z9yVt0T6AAs', 11),
(53, 12, 'Tomato', 100.00, 'p4.png', 'p3.png', 'p2.png', '2024-03-13 13:51:34', 'The tomato (Solanum lycopersicum) is a versatile fruit', 'The tomato (Solanum lycopersicum) is a versatile fruit, though culinarily speaking it\'s considered a vegetable, that originated in western South America, Mexico, and Central America  The tomato is the edible, fleshy berry of the plant. Tomatoes come in a variety of shapes and sizes, from small cherry tomatoes to large beefsteak tomatoes. They can also be a variety of colors, including red, yellow, orange, green, and purple. The most common color for tomatoes is red.', 'www.googel.com', 11),
(54, 12, 'Carrot', 100.00, 'product32.jpg', 'cr1.jpg', 'cr2.jpg', '2024-03-06 14:18:30', 'The taproot of the carrot is the part we typically eat. It comes in a variety of colors, including orange, yellow, purple, and white. ', 'At first glance, you might think the edible part of the carrot is the orange cone, but that\'s actually a taproot, a specially adapted root that stores nutrients for the plant.  The carrot top, with its feathery green leaves, is also edible!', 'www.googel.com', 11),
(55, 12, 'Lady Finger', 150.00, 'v5.jpg', 'ld1.jpg', 'ld2.jpg', '2024-03-15 14:18:30', 'Ladyfinger, also known as okra ', 'Ladyfinger, also known as okra (Abelmoschus esculentus), is a flowering plant in the mallow family, native to East Africa . It\'s cultivated in tropical, subtropical, and warm temperate regions around the world for its edible green seed pods.\r\n', 'ww.google.com', 11),
(56, 12, 'Radish', 90.00, 'v6.png', 'radish3.jpg', 'radish2.jpeg', '2024-03-28 14:26:24', 'Radishes come in a variety of shapes and sizes, including round, oblong, and cylindrical.', 'The radish (Raphanus sativus) is a crunchy and colorful root vegetable that belongs to the mustard family, Brassicaceae, along with cabbage, broccoli, and cauliflower .  It\'s believed to have been domesticated in Asia thousands of years ago .\r\n', 'www.googel.com', 11),
(57, 12, 'Brokoli', 300.00, 'bro1.jpg', 'bro2.jpg', 'bro4.jpg', '2024-03-07 14:41:50', 'Broccoli has a thick central stalk with branching florets resembling a miniature tree.', '\r\nBrocolli (Brassica oleracea var. italica) is a  nutritious green vegetable in the cabbage family (family Brassicaceae, genus Brassica) .  It\'s cultivated for its large flowering head, stalk, and small leaves which are all edible.', 'www.googel.com', 11),
(60, 13, 'Red raspberry', 600.00, 'Redraspberry.jpg', 'Redraspberry1.jpg', 'Redraspberry2.jpg', '2024-03-07 14:41:50', 'The most well-known feature is the red raspberry fruit, an aggregate fruit composed of numerous tiny drupelets clustered together.', 'Type: Aggregate fruit composed of numerous tiny drupelets clustered together\r\n\r\nCore: Detaches from the drupelets when picked, leaving the hollow \"raspberry\" behind (unlike blackberries)\r\n\r\nColor: Vibrant red (with some cultivars being yellow or purple)\r\n\r\nSize: Typically round, about 2 cm (0.8 inches) in diameter\r\n\r\nFlavor: Sweet yet slightly tart\r\n\r\nTexture: Juicy', 'www.googel.com', 10),
(61, 13, 'European ash', 800.00, '2.jpg', '3.jpg', '4.jpg', '2024-03-07 14:41:50', 'Height: Growing to a height of 65-115 feet (20-35 meters), with some exceptional specimens reaching up to 141 feet (43 meters).\r\n\r\nTrunk: The trunk is impressive, reaching diameters of 3-6 feet (1-2 meters) and developing a grayish-brown bark with shallow fissures as the tree matures.', 'Timber: Used for furniture, tool handles, flooring, veneer, and firewood.\r\n\r\nTool Making: Traditionally used for tool handles due to its shock-resistant properties.\r\n\r\nOrnamentation: Planted as an ornamental tree in parks and gardens due to its attractive form and foliage.', 'www.googel.com', 10),
(62, 13, 'Garden lupine', 200.00, 'Garden lupine.jpg', 'Garden lupine1.jpg', 'Garden lupine2.jpg', '2024-03-28 14:41:50', 'Garden lupines (Lupinus) are a captivating group of flowering perennials native to North America and South America, with some species also found in Europe, Asia, and the Mediterranean.  These herbaceous beauties are known for their tall, stately flower spikes boasting a vibrant array of colors.', 'Type: Herbaceous perennial\r\n\r\nHeight: Varies depending on the species and cultivar, but generally ranges from 1 to 5 feet (0.3 – 1.5 meters) tall.\r\n\r\nLeaves: Palmately compound, with numerous leaflets radiating from a central point, creating a lush, textured appearance. The leaflets themselves can be soft and green or have a silvery sheen.\r\n', 'www.googel.com', 10),
(63, 13, 'Chinese Money Plant', 500.00, 'cm.jpg', 'cm1.jpg', 'cm2.jpg', '2024-03-31 14:41:50', 'Pilea peperomioides, the Chinese money plant, UFO plant, pancake plant, lefse plant or missionary plant, is a species of flowering plant in the nettle family Urticaceae, native to Yunnan and Sichuan provinces in southern China. ', 'Pilea peperomioides, the Chinese money plant, UFO plant, pancake plant, lefse plant or missionary plant, is a species of flowering plant in the nettle family Urticaceae, native to Yunnan and Sichuan provinces in southern China.', 'www.googel.com', 10),
(65, 13, 'Common mugwort', 509.00, 'Commonmugwort.jpg', 'comman mugwrot 1.jpg', 'Commonmugwort2.jpg', '2024-03-31 14:41:50', 'Barbarea vulgaris, also called wintercress, or alternatively winter rocket, rocketcress, yellow rocketcress, yellow rocket, wound rocket, herb barbara, creases, or creasy greens, is a biennial herb of the genus Barbarea, belonging to the family Brassicaceae.', 'Leaves: Pinnately lobed, dark green on top, silvery white underneath, 1-4 inches (2.5-10 cm) long\r\n\r\nFlowers: Yellowish-white, small and clustered in drooping panicles, bloom in mid to late summer\r\n\r\nSoil Preference: Well-drained, sandy or loamy soil\r\n\r\n', 'www.googel.com', 10),
(66, 13, 'Swiss cheese plant', 500.00, 'scp.jpg', 'scp1.jpg', 'scp2.jpg', '2024-03-31 14:41:50', 'Monstera deliciosa, the Swiss cheese plant or split-leaf philodendron is a species of flowering plant native to tropical forests of southern Mexico, south to Panama. ', 'Plant Type: Evergreen perennial vine\r\n\r\nHabit: Climbing vine (requires support) or bushy (when pot-bound)\r\n', 'www.googel.com', 10),
(67, 14, 'Mango', 100.00, 'Mango.jpg', 'mango1.jpg', 'mango.jpg', '2024-03-13 14:41:50', 'A mango is a sweet tropical fruit, and it\'s also the name of the trees on which the fruit grows.', 'Plant Type: Evergreen tree\r\n\r\nHabit: Large,', 'www.googel.com', 9),
(68, 14, 'Grapes', 143.00, 'Grapes.jpg', 'gr1.jpg', 'gr2.jpg', '2024-03-13 14:41:50', 'A grape is a fruit, botanically a berry, of the deciduous woody vines of the flowering plant genus Vitis. ', 'Other Species:  There are many other Vitis species used for different purposes,  including V. labrusca (fox grapes) and V. rotundifolia (muscadine grapes).\r\n\r\nPlant Type: Deciduous climbing vine\r\n\r\nHabit: Requires support structures like trellises or arbors to grow and climb.', 'www.googel.com', 9),
(69, 14, 'Apple', 150.00, 'apple.jpg', 'apple1.jpg', 'apple2.jpg', '2024-03-13 14:41:50', 'The apple is one of the pome (fleshy) fruits. Apples at harvest vary widely in size, shape, colour, and acidity, but most are fairly round and some shade of red or yellow. ', 'Plant Type: Deciduous tree\r\n\r\nHabit: Single-trunked tree with a spreading canopy of branches.\r\n\r\nMature Size:\r\n\r\nHeight: 15-30 feet (4.5-9 meters) tall, depending on the variety.\r\nSpread: Can reach the same width as its height, creating a broad canopy.', 'www.googel.com', 9),
(70, 14, 'Banana', 50.00, 'Banana.jpg', 'Banana1.jpg', 'Banana2.jpg', '2024-03-13 14:41:50', 'A banana is a curved, yellow fruit with a thick skin and soft sweet flesh. If you eat a banana every day for breakfast, your roommate might nickname you \"the monkey.\" ', 'Plant Type: Herbaceous perennial\r\n\r\nHabit: Erect, giant, pseudostem (false stem) with leaves emerging from the top.\r\n\r\nMature Size:\r\n\r\nHeight: 15-40 ft (4.5-12 meters) tall\r\nSpread: 10-20 ft (3-6 meters) wide', 'www.googel.com', 9),
(71, 14, 'Tapioca', 40.00, 'Tapioca.jpg', 'Tapioca1.jpg', 'Tapioca2.jpg', '2024-03-13 14:41:50', 'Tapioca is a starch extracted from cassava root, a tuber native to South America. The cassava root is relatively easy to grow and a dietary staple in several countries in Africa, Asia, and South America. ', 'Type: Starch\r\n\r\nSource: Cassava root\r\n\r\nColor: White\r\n\r\nForm: Powder, flakes, or pearls (depending on processing)\r\n\r\nMoisture Content:\r\n\r\nTypically around 14% maximum, although some specifications may allow up to 16%.\r\nStarch Content:\r\n\r\nMinimum of 85% starch by weight on a dry basis.', 'www.googel.com', 9),
(72, 14, 'Arecanut', 200.00, 'Arecanut.jpg', 'Arecanut1.jpg', 'Arecanut2.jpg', '2024-03-13 14:41:50', 'Arecanut is a palm which grows in much of the tropical Pacific, Asia, and parts of East Africa.', 'Plant Type: Evergreen palm\r\n\r\nHabit: Single or clustering palm with a slender, upright trunk.\r\n\r\nMature Size:\r\n\r\nHeight: 40-60 feet (12-18 meters) tall\r\nSpread: Fronds can reach 10-15 feet (3-4.5 meters) in length, creating a broad canopy.', 'www.googel.com', 9),
(73, 14, 'Coconut', 45.00, 'co1.jpg', 'co2.jpg', 'Coconut.jpg', '2024-03-13 14:41:50', 'Coconut is the fruit of a tropical palm plant. It has a hard shell, edible white flesh and clear liquid, sometimes referred to as “water,” which is often used as a beverage. ', 'Plant Type: Palm tree\r\n\r\nHabit: Single trunk with a crown of large, pinnate leaves.\r\n\r\nMature Size:\r\n\r\nHeight: 60-100 feet (18-30 meters) tall\r\nSpread: Fronds can reach 13-20 feet (4-6 meters) in length, creating a broad canopy.', 'www.googel.com', 9),
(74, 12, 'Potato', 60.00, 'po1.jpg', 'po2.jpg', 'po.jpg', '2024-03-13 13:51:34', 'The potato (Solanum tuberosum) is a starchy, root vegetable native to the Americas that is consumed as a staple food in many parts of the world.  They are tubers, which are underground stems that store nutrients for the plant.', 'Shape: Potatoes come in a variety of shapes, including round, oval, oblong, and even kidney-shaped.\r\nSize: They can range in size from a marble to a large grapefruit, depending on the variety.\r\n\r\nFlesh: The inside of a potato, called the flesh, is usually white, yellow, or cream-colored. It can be starchy or waxy depending on the variety.', 'www.google.com/', 11),
(75, 12, 'Garlic', 300.00, 'g1.jpg', 'g2.jpg', 'g3.jpg', '2024-03-13 13:51:34', 'Garlic (Allium sativum) is a species of bulbous flowering plant in the genus Allium. Its close relatives include the onion, shallot, leek, chive, Welsh onion, and Chinese onion.', 'Bulb: The part we consume is the bulb, a compact underground structure composed of several individual cloves.\r\n\r\nAroma and Flavor:\r\n\r\nGarlic\'s defining characteristic is its strong, pungent aroma. This comes from allicin, a sulfur-containing compound released when a garlic clove is crushed or chopped.\r\nThe flavor of garlic is complex, starting out sharp and pungent when raw. However, it mellows and sweetens considerably when cooked, adding a savory depth to dishes.', 'www.google.com/', 11),
(76, 12, 'Lemon', 250.00, 'l2.jpg', 'l3.jpg', 'l1.jpg', '2024-03-13 13:51:34', 'The lemon  is a small evergreen tree in the flowering plant family Rutaceae, native to Asia, primarily Northeast India (Assam), Northern Myanmar, and China.  The tree\'s ellipsoidal yellow fruit is used for culinary and non-culinary purposes throughout the world, primarily for its juice, which has both culinary and cleaning uses. ', 'Shape: Lemons are typically oval, although some varieties might be slightly more round or elongated.\r\nSize: They range in size from a ping pong ball (1-2 inches or 2.5-5 cm in diameter) to a small grapefruit (3-4 inches or 7.5-10 cm in diameter).\r\nColor: The most well-known feature is the vibrant yellow rind, which can vary in shade from a pale, sunshine yellow to a deeper, almost golden yellow when fully ripe.\r\nSkin: The rind, or peel, has a bumpy or uneven texture. It\'s relatively thin but sturdy, protecting the juicy flesh inside.\r\n\r\n', 'www.google.com/', 11),
(77, 12, 'Capsicum', 200.00, 'cap.jpg', 'cap1.jpg', 'cap2.jpg', '2024-03-13 13:51:34', 'Capsicum, also known as peppers or chilies, are flowering plants in the nightshade family, Solanaceae.  They are native to the Americas and cultivated worldwide for their pungent fruits, which are popular spices.  They come in a wide variety of shapes, sizes, colors, and degrees of spiciness. ', 'Type: Berry (fleshy fruit with a core containing chambers and seeds)\r\nShape: Highly variable, including round, oblong, elliptical, banana-shaped, pointed, heart-shaped, and more.\r\nSize: Just as variable as the shape, ranging from tiny to very large, depending on the variety.\r\nColor: Green, yellow, orange, red, purple, black, or even a combination of these colors\r\nFlesh: Varies depending on the variety, but can be thick and fleshy or thin and papery.\r\nFlavor: Sweet to very hot and spicy, depending on the variety. The heat comes from a compound called capsaicin.\r\nSeeds: Cream, yellow, or white, and flat and oval-shaped.', 'www.google.com/', 11);

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `question_id` int(11) NOT NULL,
  `farmers_id` int(11) DEFAULT NULL,
  `question` text NOT NULL,
  `question_img` varchar(100) NOT NULL,
  `approve` varchar(100) DEFAULT NULL,
  `question_date_time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`question_id`, `farmers_id`, `question`, `question_img`, `approve`, `question_date_time`) VALUES
(5, 2, 'How has farming changed in the United States?', 'q2.jpg', 'Yes', '2024-01-01 16:01:20'),
(6, 3, 'How does the combine harvester help farmers?', 'q3.jpg', 'Yes', '2024-01-10 16:05:06'),
(7, 4, 'Who invented the earliest milking machines?', 'q4.jpg', 'Yes', '2024-01-12 16:14:14'),
(8, 5, 'What are windmills used for?', 'q5.jpg', 'Yes', '2021-02-02 16:17:29'),
(9, 6, 'What are barns used for?', 'q6.jpg', 'Yes', '2024-02-12 16:24:15'),
(10, 7, 'What is a silo?', 'q7.jpg', 'No', '2024-02-15 16:25:51'),
(12, 9, 'What is organic farming?', 'q9.jpg', 'No', '2024-03-01 16:35:01'),
(13, 10, 'Why do cows stand around in fields eating all day?', 'q10.jpg', 'No', '2024-03-15 16:38:55');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_city`
--

CREATE TABLE `tbl_city` (
  `city_id` int(11) NOT NULL,
  `state_id` int(11) NOT NULL,
  `city_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_city`
--

INSERT INTO `tbl_city` (`city_id`, `state_id`, `city_name`) VALUES
(3, 3, 'Surat'),
(4, 4, 'Itanagar'),
(5, 5, 'Raipur'),
(6, 6, 'Dispur');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_contact`
--

CREATE TABLE `tbl_contact` (
  `contact_id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `contact_number` varchar(100) NOT NULL,
  `purpose` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_contact`
--

INSERT INTO `tbl_contact` (`contact_id`, `title`, `contact_number`, `purpose`) VALUES
(701, 'Oakwood Farms', '9824909714', 'Our farm name generator, free to use, of course, is a great resource.'),
(702, 'Seeds Farming', '9898084586', 'A dairy company that uses organic farming to produce a range of organic dairy products.'),
(703, 'Open Pastures Co', '9328330189', 'An agricultural buying group, this business uses their location in their names. '),
(704, 'The Sun Pastures', '9373728399', 'Using your location in your business name can work well to entice local customers.'),
(705, 'Seeds Farming', '9723582678', 'Agriculture is a huge industry and provides lots of jobs around the world.');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_inquiry`
--

CREATE TABLE `tbl_inquiry` (
  `inq_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `contact` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_inquiry`
--

INSERT INTO `tbl_inquiry` (`inq_id`, `name`, `contact`, `email`, `message`) VALUES
(1, ' isha', '7845127845', 'abc@gmail.com', 'hello may name is isha'),
(81, 'Raj', '9824909724', 'rajkalathiya@gmail.com', 'Information inquiry involves the processes of searching for information and applying information to answer questions we raise personally and questions that are addressed to us. Techniques for gaining meaningful information may involve reading, listening, viewing, observing, interviewing, surveying, testing and more.'),
(82, 'Harshil', '9824674856', 'harshilnarola@gmail.com', 'Human society and individuals within society constantly generate and transmit this fund of knowledge. Experts, working at the boundary between the known and the unknown, constantly add to the fund of knowledge.'),
(83, 'Mayur', '8743936793', 'mayurmiyani@gmail.com', 'Certain attributes are necessary for both generating and effectively transmitting the fund of knowledge. The attributes that experts use to generate new knowledge are very similar to the qualities essential for the effective transmission of knowledge within the learners\' environment.'),
(84, 'Drashty', '8756436786', 'drashtygoyani@gmail.com', 'An effective and well-rounded education gives individuals very different but interrelated views of the world. All disciplines have important relationships that provide a natural and effective framework for the organization of the school curriculum.'),
(85, 'Nency', '8709543567', 'nencyitalia@gmail.com', 'While much thought and research has been spent on the role of inquiry in science education, inquiry learning can be applied to all disciplines. Individuals need many perspectives for viewing the world. Such views could include artistic, scientific, historic, economic.');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_seller`
--

CREATE TABLE `tbl_seller` (
  `seller_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `shop_name` varchar(100) NOT NULL,
  `contact_number` varchar(100) NOT NULL,
  `email_id` varchar(100) NOT NULL,
  `web_site` varchar(100) NOT NULL,
  `about` text NOT NULL,
  `certificate_url` text NOT NULL,
  `logo` varchar(100) NOT NULL,
  `shop_photo` varchar(100) NOT NULL,
  `is_approve` varchar(100) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `address` text NOT NULL,
  `landmark` varchar(100) NOT NULL,
  `pincode` varchar(100) NOT NULL,
  `aadhar_card` varchar(100) NOT NULL,
  `aadhar_photo` varchar(100) NOT NULL,
  `registration_date_time` datetime NOT NULL DEFAULT current_timestamp(),
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_seller`
--

INSERT INTO `tbl_seller` (`seller_id`, `name`, `shop_name`, `contact_number`, `email_id`, `web_site`, `about`, `certificate_url`, `logo`, `shop_photo`, `is_approve`, `user_name`, `password`, `address`, `landmark`, `pincode`, `aadhar_card`, `aadhar_photo`, `registration_date_time`, `category_id`) VALUES
(9, 'Richer Lands', 'Agricultural Materials Company', '9328330160.00', ' RicherLands222@gmail.com', 'https://www.amc.jo/en/', 'The name you will choose should be short, simple, and catchy. ', 'gst3.png', 'KenilLogo.png', 's1.jpg', 'Yes', 'admin', '1234', 'A-1002/Sankalp Heights', 'A-1002/Sankalp Heights', '395004', '123456789124', 'ok8.jpg', '2024-02-07 18:02:59', 14),
(10, 'Healthy Harvest', 'The Little Things', '9723582680.00', 'healthyharvest645@gmail.com', 'https://perfectframemb.com/', 'The Little Things is a 2021 American by Hancock and Mark Johnson.', 'gst3.png', 'adminLogo.png', 's2.jpg', 'Yes', 'ram', '1234', 'A-876/Sankalp Heights', 'Rander', '395 002', '874220864428', 'ok8.jpg', '2024-01-16 18:08:33', 13),
(11, 'Fresh ', 'Harmony Home Decor', '9898084585', 'Freshfields878@gmail.com', 'https://harmonyhomedecor.com/', 'Harmony home Décor opened in 2004 as a family.', 'gst3.png', 'oo2.jpg', 's3.jpg', 'Yes', 'kenil', '1234', 'A-904/Sankalp Height', 'A-904/Sankalp Height', '394520', '123465789145', 'ok8.jpg', '2024-02-21 18:13:52', 12);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_shops`
--

CREATE TABLE `tbl_shops` (
  `shop_id` int(11) NOT NULL,
  `shop_name` varchar(100) NOT NULL,
  `person_name` varchar(100) NOT NULL,
  `about` text NOT NULL,
  `contact` varchar(18) NOT NULL,
  `email` varchar(100) NOT NULL,
  `address` text NOT NULL,
  `landmark` varchar(100) NOT NULL,
  `pincode` int(18) NOT NULL,
  `city_id` int(11) NOT NULL,
  `lat` varchar(100) NOT NULL,
  `lng` varchar(100) NOT NULL,
  `image_url` varchar(100) NOT NULL,
  `is_block` varchar(100) NOT NULL,
  `shop_type` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_shops`
--

INSERT INTO `tbl_shops` (`shop_id`, `shop_name`, `person_name`, `about`, `contact`, `email`, `address`, `landmark`, `pincode`, `city_id`, `lat`, `lng`, `image_url`, `is_block`, `shop_type`) VALUES
(1, 'Harvest Haven', 'Rajeev Agarwal', 'This involves practices that protect the environment while ensuring good crop yields.', '9852364578', 'Harvesthaven@gmail.com', 'Surat, Gujarat', 'Surat', 395004, 3, '23.00', '27.00', 'b1.jpg', 'Block Agriculture Officer', 'Organic Farming'),
(2, 'Agroacres', 'Suresh Ahuja', 'This uses technology to improve efficiency and resource management in farming.', '8754612345', 'Agroacres@gmail.com', 'Surat, Gujarat', 'Surat', 395004, 3, '23.00', '27.00', 'b2.jpg', 'Block Agriculture Officer', 'Warehousing'),
(3, 'Farm Factory', 'Seema Dave', 'The Indian government has several initiatives to support agriculture, such as providing loans and subsidies to farmers.', '7845124578', 'Farmfactory@gmail.com', 'Itanagar, Gujarat', 'Itanagar', 791113, 4, '27.0844', '93.6053', 'b3.jpg', 'Block Agriculture Officer', 'Vertical Farming'),
(4, 'FarmLead', 'Abhishek Bakshi', 'This is the most traditional agriculture business idea, and it can be a very profitable one if you have the land, the skills, and the passion for it. You can grow food grains such as Wheat and Paddy or cash crops such as Sugarcane.   ', '6845784512', 'FarmLead@gmail.com', 'Raipur, Chhattisgarh', 'Raipur', 490042, 5, '27.0844', '93.6053', 'b4.jpg', 'Agrifarm Business and production', 'Vertical Farming');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_state`
--

CREATE TABLE `tbl_state` (
  `state_id` int(11) NOT NULL,
  `state_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_state`
--

INSERT INTO `tbl_state` (`state_id`, `state_name`) VALUES
(3, 'Gujarat'),
(4, 'Arunachal Pradesh'),
(5, 'Chhattisgarh'),
(6, 'Assam');

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

CREATE TABLE `videos` (
  `videos_id` int(11) NOT NULL,
  `videos_title` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `you_tube_url` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `videos`
--

INSERT INTO `videos` (`videos_id`, `videos_title`, `description`, `you_tube_url`) VALUES
(1, 'Misty Meadows Farm', 'Mark and Melissa Moeller raise organic poultry on pasture with love at Misty Meadows Farm, Washington. Read more about the struggles they and other real organic poultry farmers face in our November 2019 newsletter, Organic AND Pastured Eggs.', 'https://www.youtube.com/watch?v=nj-vQeeUCTI'),
(2, 'Frey Vineyards', 'The Frey family has been farming in Redwood Valley, California since 1980. Eliza Frey, winemaker at Frey Vineyards, says that healthy and diverse soil profiles are the basis of their wine quality.\r\n\r\n', 'https://www.youtube.com/watch?v=Cooj5XPqLdI'),
(3, 'Butterworks Farm', 'Butterworks Farm\'s 100% grass-fed Jersey cows bring premium organic dairy products to the market including yogurt, kefir, buttermilk, and heavy cream. In addition to producing delicious food, they are committed to using their land and livestock to sequester as much carbon as possible.', 'https://www.youtube.com/watch?v=0C8S3emEM_s'),
(4, 'Park Farming Organics', 'The Park family grows tomatoes for organic processors including Muir Glen and Bianco DiNapoli (well-renowned as some of the best canned tomatoes on the market). The flavor, they admit, comes from their cover cropping and other robust soil management practices.', 'https://www.youtube.com/watch?v=1i-yPhALWCA'),
(5, 'Full Moon Farm', 'Rachel Nevitt and David Zuckerman own and operate Full Moon Farm in Vermont, where they grow a delicious variety of produce, including melons, sweet corn, and heirloom tomatoes. When David isn\'t farming, he\'s representing the state of Vermont as Lieutenant Governor. In a rally in Thetford, Vermont, David announced, “Organic without soil is like democracy without people.” Click here to view the Full Moon Farm Know Your Farmer page', 'https://www.youtube.com/watch?v=pAzsFsiI6JM'),
(6, 'Misty Meadows Organic Eggs', 'Want to know the secret to flavorful eggs (hint: it comes before the salt and pepper)? It\'s giving the chickens ample amounts of pasture and access to bugs, sunshine, dust baths, and all other things that the birds love. Mark and Melissa keep animal happiness and natural behavior at the center of their practices, and the proof is in the product! Watch the Misty Meadows Video', 'https://www.youtube.com/watch?v=KbVWlQSh2Yw'),
(7, 'Frey Vineyards', 'The Frey family has been farming in Redwood Valley, California since 1980. Eliza Frey, winemaker at Frey Vineyards, says that healthy and diverse soil profiles are the basis of their wine quality.', 'https://www.youtube.com/watch?v=LWKMXkZyrWU'),
(8, 'Pete\'s Greens', 'Pete Johnson of Pete\'s Greens in Vermont\'s North East Kingdom is a leader in both organic farming and in the ongoing conversation around enforcing USDA standards, especially for the pasture rule. Pete serves on the Real Organic Project\'s standards board and is a strong voicefor animal welfare and enforcing rules that can prevent large-scale dairy operations from undercutting small family farms. Watch the Pete\'s Greens Video', 'https://www.youtube.com/watch?v=zQxJlbOIOe4'),
(9, 'Legend Organic\r\n', 'Real Organic Project interview with Stuart McMillan of Legend Organic Farm and Dag Falck of Nature\'s Path. Legend Organic grows grain for use in the production of Nature\'s Path foods, such as cereals and snacks. A large-scale producer, Nature\'s Path is 100% committed to true organic practices. Making a point to become a certified grower and land steward, the company can now see their food through all phases of production for their customers. Watch the Legend Organic Video.', 'https://www.youtube.com/watch?v=uV2fjjSeNaY'),
(10, 'Durst Organic Growers', 'Jim Durst, farm director at Durst Organic Growers, was a member of the California organic certification board when the organic standards for CCOF were first being debated and written. In his “Know Your Farmer” video, Jim explains that agriculture should be built upon the premise that the soil brings us life. Click here to view the Durst Organic Growers Know Your Farmer page', 'https://www.youtube.com/watch?v=XF90zRhGL0s');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answers`
--
ALTER TABLE `answers`
  ADD PRIMARY KEY (`answers_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cartid`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `farmers`
--
ALTER TABLE `farmers`
  ADD PRIMARY KEY (`farmers_id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`items_id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`login_id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`news_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`orders_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`question_id`);

--
-- Indexes for table `tbl_city`
--
ALTER TABLE `tbl_city`
  ADD PRIMARY KEY (`city_id`);

--
-- Indexes for table `tbl_contact`
--
ALTER TABLE `tbl_contact`
  ADD PRIMARY KEY (`contact_id`);

--
-- Indexes for table `tbl_inquiry`
--
ALTER TABLE `tbl_inquiry`
  ADD PRIMARY KEY (`inq_id`);

--
-- Indexes for table `tbl_seller`
--
ALTER TABLE `tbl_seller`
  ADD PRIMARY KEY (`seller_id`);

--
-- Indexes for table `tbl_shops`
--
ALTER TABLE `tbl_shops`
  ADD PRIMARY KEY (`shop_id`);

--
-- Indexes for table `tbl_state`
--
ALTER TABLE `tbl_state`
  ADD PRIMARY KEY (`state_id`);

--
-- Indexes for table `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`videos_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `answers`
--
ALTER TABLE `answers`
  MODIFY `answers_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cartid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=131;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `farmers`
--
ALTER TABLE `farmers`
  MODIFY `farmers_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `items_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `login_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `news_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `orders_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `question_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_city`
--
ALTER TABLE `tbl_city`
  MODIFY `city_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_contact`
--
ALTER TABLE `tbl_contact`
  MODIFY `contact_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=706;

--
-- AUTO_INCREMENT for table `tbl_inquiry`
--
ALTER TABLE `tbl_inquiry`
  MODIFY `inq_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT for table `tbl_seller`
--
ALTER TABLE `tbl_seller`
  MODIFY `seller_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_shops`
--
ALTER TABLE `tbl_shops`
  MODIFY `shop_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_state`
--
ALTER TABLE `tbl_state`
  MODIFY `state_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `videos`
--
ALTER TABLE `videos`
  MODIFY `videos_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
