-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 17, 2021 at 04:50 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

DROP TABLE IF EXISTS `brands`;
CREATE TABLE `brands` (
  `id` tinyint(3) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `field_id` tinyint(3) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `name`, `field_id`) VALUES
(9, 'Apple', 20),
(11, 'Xiaomi', 20),
(12, 'Samsung', 20),
(13, 'Oppo', 20),
(14, 'Dell', 21),
(15, 'Vsmart', 20),
(16, 'HP', 21),
(17, 'Lenovo', 21);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `failed_jobs`
--

INSERT INTO `failed_jobs` (`id`, `uuid`, `connection`, `queue`, `payload`, `exception`, `failed_at`) VALUES
(1, '48f51ed2-73df-4753-97a5-937034fe5356', 'database', 'default', '{\"uuid\":\"48f51ed2-73df-4753-97a5-937034fe5356\",\"displayName\":\"App\\\\Jobs\\\\sendEmail\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\sendEmail\",\"command\":\"O:18:\\\"App\\\\Jobs\\\\sendEmail\\\":11:{s:8:\\\"\\u0000*\\u0000email\\\";s:20:\\\"nhathoa512@gmail.com\\\";s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}', 'Swift_TransportException: Connection could not be established with host mailhog :stream_socket_client(): php_network_getaddresses: getaddrinfo failed: No such host is known.  in C:\\Users\\NHATHOA\\Desktop\\laravel_project\\vendor\\swiftmailer\\swiftmailer\\lib\\classes\\Swift\\Transport\\StreamBuffer.php:261\nStack trace:\n#0 [internal function]: Swift_Transport_StreamBuffer->{closure}(2, \'stream_socket_c...\', \'C:\\\\Users\\\\NHATHO...\', 264, Array)\n#1 C:\\Users\\NHATHOA\\Desktop\\laravel_project\\vendor\\swiftmailer\\swiftmailer\\lib\\classes\\Swift\\Transport\\StreamBuffer.php(264): stream_socket_client(\'mailhog:1025\', 0, \'php_network_get...\', 30, 4, Resource id #744)\n#2 C:\\Users\\NHATHOA\\Desktop\\laravel_project\\vendor\\swiftmailer\\swiftmailer\\lib\\classes\\Swift\\Transport\\StreamBuffer.php(58): Swift_Transport_StreamBuffer->establishSocketConnection()\n#3 C:\\Users\\NHATHOA\\Desktop\\laravel_project\\vendor\\swiftmailer\\swiftmailer\\lib\\classes\\Swift\\Transport\\AbstractSmtpTransport.php(143): Swift_Transport_StreamBuffer->initialize(Array)\n#4 C:\\Users\\NHATHOA\\Desktop\\laravel_project\\vendor\\swiftmailer\\swiftmailer\\lib\\classes\\Swift\\Mailer.php(65): Swift_Transport_AbstractSmtpTransport->start()\n#5 C:\\Users\\NHATHOA\\Desktop\\laravel_project\\vendor\\laravel\\framework\\src\\Illuminate\\Mail\\Mailer.php(521): Swift_Mailer->send(Object(Swift_Message), Array)\n#6 C:\\Users\\NHATHOA\\Desktop\\laravel_project\\vendor\\laravel\\framework\\src\\Illuminate\\Mail\\Mailer.php(288): Illuminate\\Mail\\Mailer->sendSwiftMessage(Object(Swift_Message))\n#7 C:\\Users\\NHATHOA\\Desktop\\laravel_project\\vendor\\laravel\\framework\\src\\Illuminate\\Mail\\Mailable.php(187): Illuminate\\Mail\\Mailer->send(\'client.email\', Array, Object(Closure))\n#8 C:\\Users\\NHATHOA\\Desktop\\laravel_project\\vendor\\laravel\\framework\\src\\Illuminate\\Support\\Traits\\Localizable.php(19): Illuminate\\Mail\\Mailable->Illuminate\\Mail\\{closure}()\n#9 C:\\Users\\NHATHOA\\Desktop\\laravel_project\\vendor\\laravel\\framework\\src\\Illuminate\\Mail\\Mailable.php(188): Illuminate\\Mail\\Mailable->withLocale(NULL, Object(Closure))\n#10 C:\\Users\\NHATHOA\\Desktop\\laravel_project\\vendor\\laravel\\framework\\src\\Illuminate\\Mail\\Mailer.php(304): Illuminate\\Mail\\Mailable->send(Object(Illuminate\\Mail\\Mailer))\n#11 C:\\Users\\NHATHOA\\Desktop\\laravel_project\\vendor\\laravel\\framework\\src\\Illuminate\\Mail\\Mailer.php(258): Illuminate\\Mail\\Mailer->sendMailable(Object(App\\Mail\\orderComplete))\n#12 C:\\Users\\NHATHOA\\Desktop\\laravel_project\\vendor\\laravel\\framework\\src\\Illuminate\\Mail\\PendingMail.php(121): Illuminate\\Mail\\Mailer->send(Object(App\\Mail\\orderComplete))\n#13 C:\\Users\\NHATHOA\\Desktop\\laravel_project\\app\\Jobs\\sendEmail.php(36): Illuminate\\Mail\\PendingMail->send(Object(App\\Mail\\orderComplete))\n#14 C:\\Users\\NHATHOA\\Desktop\\laravel_project\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(36): App\\Jobs\\sendEmail->handle()\n#15 C:\\Users\\NHATHOA\\Desktop\\laravel_project\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php(40): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#16 C:\\Users\\NHATHOA\\Desktop\\laravel_project\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(93): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#17 C:\\Users\\NHATHOA\\Desktop\\laravel_project\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(37): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#18 C:\\Users\\NHATHOA\\Desktop\\laravel_project\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(651): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#19 C:\\Users\\NHATHOA\\Desktop\\laravel_project\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\Dispatcher.php(128): Illuminate\\Container\\Container->call(Array)\n#20 C:\\Users\\NHATHOA\\Desktop\\laravel_project\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(128): Illuminate\\Bus\\Dispatcher->Illuminate\\Bus\\{closure}(Object(App\\Jobs\\sendEmail))\n#21 C:\\Users\\NHATHOA\\Desktop\\laravel_project\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(103): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(App\\Jobs\\sendEmail))\n#22 C:\\Users\\NHATHOA\\Desktop\\laravel_project\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\Dispatcher.php(132): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#23 C:\\Users\\NHATHOA\\Desktop\\laravel_project\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(120): Illuminate\\Bus\\Dispatcher->dispatchNow(Object(App\\Jobs\\sendEmail), false)\n#24 C:\\Users\\NHATHOA\\Desktop\\laravel_project\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(128): Illuminate\\Queue\\CallQueuedHandler->Illuminate\\Queue\\{closure}(Object(App\\Jobs\\sendEmail))\n#25 C:\\Users\\NHATHOA\\Desktop\\laravel_project\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(103): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(App\\Jobs\\sendEmail))\n#26 C:\\Users\\NHATHOA\\Desktop\\laravel_project\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(122): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#27 C:\\Users\\NHATHOA\\Desktop\\laravel_project\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(70): Illuminate\\Queue\\CallQueuedHandler->dispatchThroughMiddleware(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(App\\Jobs\\sendEmail))\n#28 C:\\Users\\NHATHOA\\Desktop\\laravel_project\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Jobs\\Job.php(98): Illuminate\\Queue\\CallQueuedHandler->call(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Array)\n#29 C:\\Users\\NHATHOA\\Desktop\\laravel_project\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(428): Illuminate\\Queue\\Jobs\\Job->fire()\n#30 C:\\Users\\NHATHOA\\Desktop\\laravel_project\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(378): Illuminate\\Queue\\Worker->process(\'database\', Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(Illuminate\\Queue\\WorkerOptions))\n#31 C:\\Users\\NHATHOA\\Desktop\\laravel_project\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(172): Illuminate\\Queue\\Worker->runJob(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), \'database\', Object(Illuminate\\Queue\\WorkerOptions))\n#32 C:\\Users\\NHATHOA\\Desktop\\laravel_project\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(117): Illuminate\\Queue\\Worker->daemon(\'database\', \'default\', Object(Illuminate\\Queue\\WorkerOptions))\n#33 C:\\Users\\NHATHOA\\Desktop\\laravel_project\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(101): Illuminate\\Queue\\Console\\WorkCommand->runWorker(\'database\', \'default\')\n#34 C:\\Users\\NHATHOA\\Desktop\\laravel_project\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(36): Illuminate\\Queue\\Console\\WorkCommand->handle()\n#35 C:\\Users\\NHATHOA\\Desktop\\laravel_project\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php(40): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#36 C:\\Users\\NHATHOA\\Desktop\\laravel_project\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(93): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#37 C:\\Users\\NHATHOA\\Desktop\\laravel_project\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(37): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#38 C:\\Users\\NHATHOA\\Desktop\\laravel_project\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(651): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#39 C:\\Users\\NHATHOA\\Desktop\\laravel_project\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(136): Illuminate\\Container\\Container->call(Array)\n#40 C:\\Users\\NHATHOA\\Desktop\\laravel_project\\vendor\\symfony\\console\\Command\\Command.php(299): Illuminate\\Console\\Command->execute(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#41 C:\\Users\\NHATHOA\\Desktop\\laravel_project\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(121): Symfony\\Component\\Console\\Command\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#42 C:\\Users\\NHATHOA\\Desktop\\laravel_project\\vendor\\symfony\\console\\Application.php(978): Illuminate\\Console\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#43 C:\\Users\\NHATHOA\\Desktop\\laravel_project\\vendor\\symfony\\console\\Application.php(295): Symfony\\Component\\Console\\Application->doRunCommand(Object(Illuminate\\Queue\\Console\\WorkCommand), Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#44 C:\\Users\\NHATHOA\\Desktop\\laravel_project\\vendor\\symfony\\console\\Application.php(167): Symfony\\Component\\Console\\Application->doRun(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#45 C:\\Users\\NHATHOA\\Desktop\\laravel_project\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Application.php(92): Symfony\\Component\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#46 C:\\Users\\NHATHOA\\Desktop\\laravel_project\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Console\\Kernel.php(129): Illuminate\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#47 C:\\Users\\NHATHOA\\Desktop\\laravel_project\\artisan(37): Illuminate\\Foundation\\Console\\Kernel->handle(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#48 {main}', '2021-10-17 07:20:13');

-- --------------------------------------------------------

--
-- Table structure for table `fields`
--

DROP TABLE IF EXISTS `fields`;
CREATE TABLE `fields` (
  `id` tinyint(3) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fields`
--

INSERT INTO `fields` (`id`, `name`) VALUES
(20, 'SMARTPHONE'),
(21, 'LAPTOP'),
(26, 'ACCESSORY');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

DROP TABLE IF EXISTS `jobs`;
CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(28, '2021_09_07_074122_create_fields_table', 1),
(30, '2021_09_07_074228_create_brands_table', 2),
(31, '2021_09_07_064048_create_products_table', 3),
(46, '2021_09_07_074311_create_reviews_table', 4),
(47, '2014_10_12_000000_create_users_table', 5),
(48, '2014_10_12_100000_create_password_resets_table', 5),
(49, '2019_08_19_000000_create_failed_jobs_table', 5),
(50, '2019_12_14_000001_create_personal_access_tokens_table', 5),
(51, '2021_09_07_074608_create_orders_table', 5),
(52, '2021_09_07_074736_create_order_infos_table', 5),
(53, '2021_09_07_114935_create_replies_table', 6),
(54, '2021_10_17_140657_create_jobs_table', 7);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE `orders` (
  `id` tinyint(3) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subtotal` double(8,2) NOT NULL,
  `status` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Unpaid'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `name`, `phone_number`, `email`, `address`, `subtotal`, `status`) VALUES
(6, 'Vòng Nhật Hòa', '0943111111', 'abc@gmail.com', '111', 3251.00, 'Unpaid'),
(7, 'Vòng Nhật Hòa', '0943111111', 'abc@gmail.com', '123', 2300.00, 'Unpaid'),
(8, 'Vòng Nhật Hòa', '0943111111', 'nhathoa512@gmail.com', '111', 750.00, 'Unpaid'),
(9, 'Vòng Nhật Hòa', '0943111111', 'nhathoa512@gmail.com', '111', 200.00, 'Unpaid'),
(10, 'Vòng Nhật Hòa', '0943111111', 'nhathoa512@gmail.com', '111', 500.00, 'Unpaid');

-- --------------------------------------------------------

--
-- Table structure for table `order_infos`
--

DROP TABLE IF EXISTS `order_infos`;
CREATE TABLE `order_infos` (
  `id` tinyint(3) NOT NULL,
  `order_id` tinyint(3) UNSIGNED NOT NULL,
  `product_id` tinyint(3) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_infos`
--

INSERT INTO `order_infos` (`id`, `order_id`, `product_id`, `quantity`) VALUES
(1, 6, 8, 2),
(3, 6, 14, 3),
(4, 7, 15, 2),
(5, 7, 14, 1),
(6, 7, 8, 3),
(7, 8, 13, 1),
(8, 9, 15, 1),
(9, 10, 6, 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE `products` (
  `id` tinyint(3) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double(8,2) NOT NULL,
  `brand_id` tinyint(3) UNSIGNED NOT NULL,
  `field_id` tinyint(3) UNSIGNED NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `images` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `views` bigint(20) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `slug`, `price`, `brand_id`, `field_id`, `description`, `images`, `views`) VALUES
(6, 'Iphone 12 pro max', 'iphone-12-pro-max', 500.00, 9, 20, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi dapibus justo ipsum, mattis dapibus tellus vulputate non. Phasellus quis consequat augue. Nunc malesuada augue a venenatis ultricies. Suspendisse a magna nec orci molestie rutrum convallis vel sapien. Integer commodo mi auctor eleifend iaculis. Vivamus mollis luctus felis, ac semper purus ultricies ac. Praesent felis lacus, fringilla id tristique ac, posuere sed nunc.', '1631173924', 0),
(8, 'Xiaomi Redmi Note 10', 'xiaomi-redmi-note-10', 350.00, 11, 20, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam pulvinar auctor leo, ut scelerisque libero. Nullam lacinia ipsum vel tincidunt luctus. Fusce sit amet sapien dignissim justo fringilla auctor. Aliquam tincidunt, augue nec maximus tempor, odio velit egestas magna, vitae ullamcorper dui orci nec augue. Vestibulum nisl libero, porttitor eu varius a, semper quis purus. In eu tempus diam, id accumsan nibh. In tincidunt magna vitae urna fringilla, ac ultricies lorem sodales.', '1631188229', 0),
(9, 'Samsung Galaxy Note 20', 'samsung-galaxy-note-20', 350.00, 12, 20, 'Nulla volutpat porttitor justo a blandit. Sed vestibulum, felis eu pretium vulputate, metus mi vulputate est, non fringilla est nisi non lectus. Donec augue ipsum, pretium nec sapien vitae, lobortis tempor mauris. Nam in mattis dolor. Etiam eget ex sit amet est ornare congue eget ac nisl. Aenean dapibus, sapien ut fringilla ultricies, ligula augue consequat felis, eget commodo est justo non purus.', '1631188347', 0),
(10, 'Xiaomi Mi 11 Lite', 'xiaomi-mi-11-lite', 300.00, 11, 20, 'Mauris sit amet tempor lacus. Aliquam erat volutpat. Maecenas bibendum ex eget risus mollis blandit. Sed id imperdiet metus. Morbi laoreet, elit ac tempor tristique, quam nunc mattis justo, eget rhoncus lectus sem vulputate ex. Nunc felis neque, porttitor at orci eget, rhoncus fermentum ligula. Ut at massa elit. Duis ac diam at odio facilisis varius nec id sapien.', '1631188491', 0),
(11, 'OPPO Reno6 Z 5G', 'oppo-reno6-z-5g', 400.00, 13, 20, 'Proin sed ligula aliquam, commodo elit sit amet, tincidunt risus. Mauris dapibus varius bibendum. Phasellus ligula turpis, gravida convallis placerat ut, ultricies at ligula. Integer faucibus luctus elementum. Nunc accumsan justo eget tortor ornare, ac tristique massa malesuada. Donec faucibus scelerisque urna. Proin scelerisque molestie nulla non rhoncus.', '1631188603', 0),
(12, 'Laptop Dell Inspiron 3501', 'laptop-dell-inspiron-3501', 700.00, 14, 21, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque vel elementum ligula. Fusce magna sem, euismod sed velit et, dictum ornare metus. Praesent tristique massa nec eros iaculis, nec tristique justo rutrum. Nulla velit lorem, vestibulum sit amet eros et, aliquet iaculis libero.', '1631288429', 0),
(13, 'Laptop Dell Latitude 3520', 'laptop-dell-latitude-3520', 750.00, 14, 21, 'Praesent mattis tortor eget urna fermentum ullamcorper. Duis convallis felis eget felis condimentum viverra. Nunc sagittis lectus elementum arcu lobortis cursus. Maecenas cursus feugiat erat, quis rhoncus augue luctus vel. Duis sed neque tellus. Aliquam erat volutpat. Etiam at lacinia enim.', '1631289001', 0),
(14, 'Laptop Dell Vostro 5402', 'laptop-dell-vostro-5402', 850.00, 14, 21, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam varius, arcu a finibus posuere, felis lectus aliquet magna, eget sodales ligula erat eget orci. Donec a tincidunt felis, id fermentum dolor. Ut a posuere lacus, at efficitur tortor. Donec volutpat erat nec sapien molestie, id convallis nibh imperdiet. Sed ac condimentum est. Nunc sodales purus cursus mauris varius commodo. Sed porttitor faucibus justo ac dapibus.', '1631290310', 0),
(15, 'OPPO A74', 'oppo-a74', 200.00, 13, 20, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras placerat velit mi, eu bibendum nulla vestibulum in. Vestibulum tincidunt sodales aliquet. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Phasellus sit amet urna non mi rutrum eleifend ac sit amet ligula.', '1631796646', 0),
(16, 'OPPO Find X3 Pro 5G', 'oppo-find-x3-pro-5g', 450.00, 13, 20, 'Proin id ante et eros tincidunt elementum rutrum a tellus. Donec eget felis ut risus convallis mollis. Donec ornare blandit metus, non commodo tellus efficitur consequat. Donec a elit fringilla, dictum dolor vel, sodales ligula. Etiam varius tellus id porttitor pharetra. In non vulputate felis. Sed tincidunt lorem sapien, a efficitur ipsum efficitur vel.', '1631796752', 0),
(17, 'Samsung Galaxy A32', 'samsung-galaxy-a32', 300.00, 12, 20, 'Maecenas non diam rutrum orci malesuada malesuada. Suspendisse ut est eget velit convallis mollis. Integer in tellus vel enim suscipit pulvinar. Nulla est odio, placerat at magna a, venenatis dapibus ipsum. Nunc a nibh diam. Nunc tristique tempor elit nec dapibus. Fusce interdum, est sed scelerisque tincidunt, enim metus aliquet massa, quis bibendum risus ipsum id nibh. Curabitur convallis tincidunt felis.', '1631796820', 0),
(18, 'Samsung Galaxy S21 Ultra 5G', 'samsung-galaxy-s21-ultra-5g', 550.00, 12, 20, 'Etiam fermentum efficitur vulputate. Proin vehicula magna convallis, laoreet orci sed, venenatis risus. Nulla placerat, lectus at imperdiet lacinia, sapien nibh placerat odio, fermentum fermentum velit lectus id ante. Etiam scelerisque elit eu odio hendrerit lacinia. Nullam consectetur in mi et euismod.', '1631796884', 0),
(19, 'Vsmart Joy 4', 'vsmart-joy-4', 200.00, 15, 20, 'Cras nec nibh vitae urna vestibulum pharetra. Duis pretium ultrices erat, vel laoreet leo placerat ut. Vestibulum mi dolor, volutpat vitae condimentum quis, efficitur id quam. Aenean dictum vitae ipsum nec pretium. Vivamus sed sem sagittis, tempor magna a, gravida orci. Donec vel leo vel magna efficitur venenatis eu ac lectus.', '1631796965', 0),
(20, 'Vsmart Live 4', 'vsmart-live-4', 350.00, 15, 20, 'Etiam aliquet malesuada feugiat. Donec volutpat sollicitudin arcu ut ornare. Vivamus varius diam vitae magna molestie lobortis. Donec nec aliquam nisi, non suscipit risus. In sit amet metus dignissim, auctor urna sed, mattis tellus. Nullam mollis luctus neque, mattis maximus magna convallis tempus. Cras malesuada odio at blandit congue.', '1631797009', 0),
(21, 'Vsmart Star 5', 'vsmart-star-5', 200.00, 15, 20, 'Suspendisse potenti. Nulla aliquet dignissim sodales. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vivamus massa lacus, scelerisque quis nibh nec, pellentesque finibus leo. Mauris quis purus malesuada, vulputate dui at, commodo arcu.', '1631797057', 0),
(22, 'Laptop HP 240 G8', 'laptop-hp-240-g8', 800.00, 16, 21, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec euismod dolor vitae lectus ultrices, et vulputate nunc euismod. Aenean ut risus justo. Nulla facilisi. Integer condimentum sem maximus turpis fringilla, a congue eros molestie.', '1631801094', 0),
(23, 'Laptop HP Omen 15', 'laptop-hp-omen-15', 950.00, 16, 21, 'Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Proin turpis arcu, ullamcorper eget scelerisque et, commodo et arcu. Nunc efficitur, massa quis rhoncus mattis, enim neque hendrerit libero, ac suscipit tortor est a diam.', '1631801176', 0),
(24, 'Laptop HP Pavilion 15', 'laptop-hp-pavilion-15', 1000.00, 16, 21, 'Donec quis justo vitae lacus aliquet consequat. Nullam et laoreet enim. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. In non sapien semper, euismod velit vitae, consectetur justo. Nullam facilisis nisl nibh, volutpat pharetra risus rhoncus sit amet.', '1631801226', 0),
(25, 'Laptop HP Probook 450', 'laptop-hp-probook-450', 1100.00, 16, 21, 'Proin dapibus, orci et consectetur vehicula, urna leo facilisis risus, quis sollicitudin velit turpis ornare lacus. Donec dignissim, tortor quis lacinia blandit, velit massa egestas ante, at posuere elit ante id sem. Sed facilisis purus quis tortor blandit, at finibus odio semper.', '1631801272', 0),
(26, 'Laptop Lenovo Ideapad 5', 'laptop-lenovo-ideapad-5', 700.00, 17, 21, 'Etiam tempus, neque ac gravida ultricies, libero odio rutrum lectus, ut tempor lorem felis vel nibh. Praesent nibh lorem, euismod vel ante et, viverra sollicitudin nisi. Phasellus blandit metus sit amet augue lacinia interdum. Praesent sit amet semper enim. In dictum vestibulum libero.', '1631801315', 0),
(27, 'Laptop Lenovo IdeaPad Slim', 'laptop-lenovo-ideapad-slim', 850.00, 17, 21, 'Maecenas nulla ex, consequat vitae condimentum sit amet, egestas eget massa. Curabitur at lobortis risus, vitae faucibus enim. Sed porttitor accumsan vestibulum. Aenean non augue in nunc mollis hendrerit et sed libero. Praesent sagittis lorem ac fermentum imperdiet. Nam ut risus fringilla, condimentum elit a, mattis ipsum. Cras placerat dolor id dictum lacinia. Nam eget luctus lacus. Donec sagittis maximus neque.', '1631801371', 0),
(28, 'Laptop Lenovo ThinkBook 14s', 'laptop-lenovo-thinkbook-14s', 900.00, 17, 21, 'Etiam malesuada, libero eu hendrerit lobortis, ipsum eros tristique nulla, et sagittis ex ipsum eget justo. Sed vitae finibus nibh. Praesent eu risus interdum nisi ultricies mollis sit amet sed leo. Pellentesque imperdiet neque id leo eleifend venenatis. Sed maximus, justo in condimentum', '1631801414', 0);

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

DROP TABLE IF EXISTS `reviews`;
CREATE TABLE `reviews` (
  `id` tinyint(3) UNSIGNED NOT NULL,
  `product_id` tinyint(3) UNSIGNED NOT NULL,
  `parent_path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` tinyint(3) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `product_id`, `parent_path`, `parent_id`, `name`, `phone_number`, `email`, `content`, `created_at`) VALUES
(78, 12, '/', NULL, 'noname', '0913313131', 'noname@gmail.com', 'This is a review', '2021-09-15 19:34:04'),
(79, 12, '/78', 78, 'noname', '0913313131', 'noname@gmail.com', '@noname: This is a reply', '2021-09-15 19:34:12'),
(80, 6, '/', NULL, 'noname', '0913313131', 'noname@gmail.com', 'This is a new review for Iphone', '2021-09-15 19:37:02'),
(81, 6, '/80', 80, 'anonymous', '0913313131', 'noname@gmail.com', '@noname: This is a reply for noname', '2021-09-15 19:37:20'),
(82, 9, '/', NULL, 'anonymous', '0913313131', 'noname@gmail.com', 'This is a review for samsung galaxy note 20', '2021-09-15 19:39:56'),
(83, 16, '/', NULL, 'myname', '0913313131', 'noname@gmail.com', 'This is a first review', '2021-09-16 20:13:11'),
(84, 17, '/', NULL, 'myname', '0913313131', 'noname@gmail.com', 'This is a first review for this device', '2021-09-16 21:30:31'),
(85, 17, '/84', 84, 'myname', '0913313131', 'noname@gmail.com', '@myname: Fuck you myname', '2021-09-16 21:30:45'),
(86, 11, '/', NULL, 'myname', '0913313131', 'noname@gmail.com', 'This is a first review', '2021-09-17 10:32:45'),
(87, 11, '/', NULL, 'myname', '0913313131', 'noname@gmail.com', 'This is a second review', '2021-09-17 11:03:02'),
(88, 21, '/', NULL, 'myname', '0913313131', 'noname@gmail.com', 'This is a first review for Vsmart Star', '2021-09-17 16:06:27'),
(89, 21, '/88', 88, 'apple', '0913313131', 'noname@gmail.com', '@myname: This is a reply for myname', '2021-09-17 16:23:49'),
(90, 14, '/', NULL, 'abc', '0911111111', 'abc@gmail.com', 'abc', '2021-10-17 13:25:53'),
(91, 9, '/82', 82, 'abc', '0911111111', 'abc@gmail.com', '@anonymous: This is a reply for anonymous', '2021-10-17 14:30:05'),
(92, 15, '/', NULL, 'abc', '0911111111', 'abc@gmail.com', 'This is a review for appo a74', '2021-10-17 19:02:50'),
(93, 15, '/92', 92, 'abc', '0911111111', 'abc@gmail.com', '@abc: This is a reply for abc', '2021-10-17 19:03:27');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` tinyint(3) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('1','') COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('1','') COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `role`, `status`, `email`, `email_verified_at`, `password`, `remember_token`) VALUES
(4, 'Nhat Hoa', '1', '1', 'nhathoa@gmail.com', NULL, '$2y$10$3yHO9WIWAvur/7nARzf/T..wGdhF2LtG0kJ3pc6d7IMdoZ2ut7YuG', NULL),
(5, 'Nguyen Van A', '', '1', 'employee01@gmail.com', NULL, '$2y$10$74liEYK0TUHN2/haFA90wu11Hm.7mZI8Rmu/uXEz8Xk.bHW9BXXJ.', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`),
  ADD KEY `brands_field_id_foreign` (`field_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `fields`
--
ALTER TABLE `fields`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_infos`
--
ALTER TABLE `order_infos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_info` (`order_id`),
  ADD KEY `product_info` (`product_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_field_id_foreign` (`field_id`),
  ADD KEY `products_brand_id_foreign` (`brand_id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reviews_product_id_foreign` (`product_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `fields`
--
ALTER TABLE `fields`
  MODIFY `id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `order_infos`
--
ALTER TABLE `order_infos`
  MODIFY `id` tinyint(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `brands`
--
ALTER TABLE `brands`
  ADD CONSTRAINT `brands_field_id_foreign` FOREIGN KEY (`field_id`) REFERENCES `fields` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `order_infos`
--
ALTER TABLE `order_infos`
  ADD CONSTRAINT `order_info` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `product_info` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_brand_id_foreign` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `products_field_id_foreign` FOREIGN KEY (`field_id`) REFERENCES `fields` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
