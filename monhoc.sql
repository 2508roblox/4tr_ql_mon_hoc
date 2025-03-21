-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 21, 2025 at 12:47 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `monhoc`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `id` bigint UNSIGNED NOT NULL,
  `student_id` bigint UNSIGNED NOT NULL,
  `course_id` bigint UNSIGNED NOT NULL,
  `week` tinyint UNSIGNED NOT NULL,
  `date` date DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`id`, `student_id`, `course_id`, `week`, `date`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, '2025-03-21', 1, '2025-03-20 21:47:14', '2025-03-21 04:25:56'),
(2, 1, 4, 1, '2025-03-21', 1, '2025-03-21 05:37:20', '2025-03-21 05:37:20');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('laravel_cache_902ba3cda1883801594b6e1b452790cc53948fda', 'i:1;', 1742531374),
('laravel_cache_902ba3cda1883801594b6e1b452790cc53948fda:timer', 'i:1742531374;', 1742531374),
('laravel_cache_livewire-rate-limiter:2b5beabac0aaa62b75ff665708fd5b0b5abb2408', 'i:1;', 1742559428),
('laravel_cache_livewire-rate-limiter:2b5beabac0aaa62b75ff665708fd5b0b5abb2408:timer', 'i:1742559428;', 1742559428),
('laravel_cache_theme', 's:6:\"sunset\";', 2057888761),
('laravel_cache_theme_color', 's:4:\"blue\";', 2057888757);

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` bigint UNSIGNED NOT NULL,
  `course_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_description` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `views` int NOT NULL DEFAULT '0',
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `course_name`, `slug`, `short_description`, `image`, `views`, `description`, `created_at`, `updated_at`, `created_by`) VALUES
(1, 'Hình học không gian (Spatial Geometry)', 'hinh-hoc-khong-gian-spatial-geometry', '<p>Hình học không gian (Spatial Geometry) là nhánh của toán học nghiên cứu các hình khối và cấu trúc trong không gian ba chiều. Nó bao gồm các khái niệm về điểm, đường thẳng, mặt phẳng và các hình khối như hình cầu, hình lập phương, hình chóp, và nhiều đối tượng hình học khác. Hình học không gian giúp chúng ta hiểu rõ hơn về các thuộc tính và mối quan hệ giữa các hình khối trong không gian.</p>', 'course_images/01JPVD3XTTMSF8M2KJE1X5XP9F.jpg', 0, '<p>Hình học không gian (Spatial Geometry) là một lĩnh vực quan trọng trong toán học, nghiên cứu các hình khối và cấu trúc trong không gian ba chiều. Nó mở rộng các khái niệm cơ bản của hình học phẳng như điểm, đường thẳng và mặt phẳng vào không gian ba chiều, cho phép chúng ta mô tả và phân tích các đối tượng phức tạp hơn.</p><p>Trong hình học không gian, chúng ta nghiên cứu các thuộc tính và mối quan hệ giữa các hình khối như hình cầu, hình lập phương, hình chóp, hình trụ và hình nón. Các khái niệm như thể tích, diện tích bề mặt, và các loại góc trở nên quan trọng trong việc tính toán và giải quyết vấn đề.</p><p>Hình học không gian cũng có ứng dụng rộng rãi trong nhiều lĩnh vực như kiến trúc, kỹ thuật, đồ họa máy tính, và khoa học tự nhiên. Nó giúp chúng ta hiểu cách các hình khối tương tác với nhau trong không gian và ứng dụng vào thiết kế và xây dựng các công trình, cũng như trong việc mô phỏng các hiện tượng vật lý. Qua đó, hình học không gian không chỉ là một bộ môn lý thuyết mà còn là công cụ thực tiễn cho nhiều ngành nghề.</p>', '2025-03-20 20:49:28', '2025-03-20 21:24:38', 7),
(2, 'Hình học không gian (Spatial Geometry)', 'hinh-hoc-khong-gian-spatial-geometry-675', '<p>Hình học không gian (Spatial Geometry) là nhánh của toán học nghiên cứu các hình khối và cấu trúc trong không gian ba chiều. Nó bao gồm các khái niệm về điểm, đường thẳng, mặt phẳng và các hình khối như hình cầu, hình lập phương, hình chóp, và nhiều đối tượng hình học khác. Hình học không gian giúp chúng ta hiểu rõ hơn về các thuộc tính và mối quan hệ giữa các hình khối trong không gian.</p>', 'course_images/01JPVD3XTTMSF8M2KJE1X5XP9F.jpg', 0, '<p>Hình học không gian (Spatial Geometry) là một lĩnh vực quan trọng trong toán học, nghiên cứu các hình khối và cấu trúc trong không gian ba chiều. Nó mở rộng các khái niệm cơ bản của hình học phẳng như điểm, đường thẳng và mặt phẳng vào không gian ba chiều, cho phép chúng ta mô tả và phân tích các đối tượng phức tạp hơn.</p><p>Trong hình học không gian, chúng ta nghiên cứu các thuộc tính và mối quan hệ giữa các hình khối như hình cầu, hình lập phương, hình chóp, hình trụ và hình nón. Các khái niệm như thể tích, diện tích bề mặt, và các loại góc trở nên quan trọng trong việc tính toán và giải quyết vấn đề.</p><p>Hình học không gian cũng có ứng dụng rộng rãi trong nhiều lĩnh vực như kiến trúc, kỹ thuật, đồ họa máy tính, và khoa học tự nhiên. Nó giúp chúng ta hiểu cách các hình khối tương tác với nhau trong không gian và ứng dụng vào thiết kế và xây dựng các công trình, cũng như trong việc mô phỏng các hiện tượng vật lý. Qua đó, hình học không gian không chỉ là một bộ môn lý thuyết mà còn là công cụ thực tiễn cho nhiều ngành nghề.</p>', '2025-03-20 21:37:41', '2025-03-20 21:37:41', 7),
(3, 'Hình học không gian (Spatial Geometry)', 'hinh-hoc-khong-gian-spatial-geometry-549', '<p>Hình học không gian (Spatial Geometry) là nhánh của toán học nghiên cứu các hình khối và cấu trúc trong không gian ba chiều. Nó bao gồm các khái niệm về điểm, đường thẳng, mặt phẳng và các hình khối như hình cầu, hình lập phương, hình chóp, và nhiều đối tượng hình học khác. Hình học không gian giúp chúng ta hiểu rõ hơn về các thuộc tính và mối quan hệ giữa các hình khối trong không gian.</p>', 'course_images/01JPVD3XTTMSF8M2KJE1X5XP9F.jpg', 0, '<p>Hình học không gian (Spatial Geometry) là một lĩnh vực quan trọng trong toán học, nghiên cứu các hình khối và cấu trúc trong không gian ba chiều. Nó mở rộng các khái niệm cơ bản của hình học phẳng như điểm, đường thẳng và mặt phẳng vào không gian ba chiều, cho phép chúng ta mô tả và phân tích các đối tượng phức tạp hơn.</p><p>Trong hình học không gian, chúng ta nghiên cứu các thuộc tính và mối quan hệ giữa các hình khối như hình cầu, hình lập phương, hình chóp, hình trụ và hình nón. Các khái niệm như thể tích, diện tích bề mặt, và các loại góc trở nên quan trọng trong việc tính toán và giải quyết vấn đề.</p><p>Hình học không gian cũng có ứng dụng rộng rãi trong nhiều lĩnh vực như kiến trúc, kỹ thuật, đồ họa máy tính, và khoa học tự nhiên. Nó giúp chúng ta hiểu cách các hình khối tương tác với nhau trong không gian và ứng dụng vào thiết kế và xây dựng các công trình, cũng như trong việc mô phỏng các hiện tượng vật lý. Qua đó, hình học không gian không chỉ là một bộ môn lý thuyết mà còn là công cụ thực tiễn cho nhiều ngành nghề.</p>', '2025-03-20 21:37:54', '2025-03-20 21:37:54', 7),
(4, 'Hình học không gian (Spatial Geometry)', 'hinh-hoc-khong-gian-spatial-geometry-549-909', '<p>Hình học không gian (Spatial Geometry) là nhánh của toán học nghiên cứu các hình khối và cấu trúc trong không gian ba chiều. Nó bao gồm các khái niệm về điểm, đường thẳng, mặt phẳng và các hình khối như hình cầu, hình lập phương, hình chóp, và nhiều đối tượng hình học khác. Hình học không gian giúp chúng ta hiểu rõ hơn về các thuộc tính và mối quan hệ giữa các hình khối trong không gian.</p>', 'course_images/01JPVD3XTTMSF8M2KJE1X5XP9F.jpg', 0, '<p>Hình học không gian (Spatial Geometry) là một lĩnh vực quan trọng trong toán học, nghiên cứu các hình khối và cấu trúc trong không gian ba chiều. Nó mở rộng các khái niệm cơ bản của hình học phẳng như điểm, đường thẳng và mặt phẳng vào không gian ba chiều, cho phép chúng ta mô tả và phân tích các đối tượng phức tạp hơn.</p><p>Trong hình học không gian, chúng ta nghiên cứu các thuộc tính và mối quan hệ giữa các hình khối như hình cầu, hình lập phương, hình chóp, hình trụ và hình nón. Các khái niệm như thể tích, diện tích bề mặt, và các loại góc trở nên quan trọng trong việc tính toán và giải quyết vấn đề.</p><p>Hình học không gian cũng có ứng dụng rộng rãi trong nhiều lĩnh vực như kiến trúc, kỹ thuật, đồ họa máy tính, và khoa học tự nhiên. Nó giúp chúng ta hiểu cách các hình khối tương tác với nhau trong không gian và ứng dụng vào thiết kế và xây dựng các công trình, cũng như trong việc mô phỏng các hiện tượng vật lý. Qua đó, hình học không gian không chỉ là một bộ môn lý thuyết mà còn là công cụ thực tiễn cho nhiều ngành nghề.</p>', '2025-03-20 21:38:28', '2025-03-20 21:38:28', 7);

-- --------------------------------------------------------

--
-- Table structure for table `enrollments`
--

CREATE TABLE `enrollments` (
  `id` bigint UNSIGNED NOT NULL,
  `student_id` bigint UNSIGNED NOT NULL,
  `course_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` tinyint NOT NULL DEFAULT '0' COMMENT '0: Chờ duyệt, 1: Đã duyệt, 2: Từ chối'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `enrollments`
--

INSERT INTO `enrollments` (`id`, `student_id`, `course_id`, `created_at`, `updated_at`, `status`) VALUES
(2, 1, 4, '2025-03-21 05:29:11', '2025-03-21 05:35:55', 1);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `feedbacks`
--

CREATE TABLE `feedbacks` (
  `id` bigint UNSIGNED NOT NULL,
  `student_id` bigint UNSIGNED NOT NULL,
  `course_id` bigint UNSIGNED NOT NULL,
  `understand` tinyint(1) NOT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `rating` tinyint NOT NULL DEFAULT '5' COMMENT 'Số sao đánh giá, tối đa 5 sao'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `feedbacks`
--

INSERT INTO `feedbacks` (`id`, `student_id`, `course_id`, `understand`, `comment`, `created_at`, `updated_at`, `rating`) VALUES
(1, 1, 1, 1, '123123', '2025-03-20 21:14:36', '2025-03-20 21:14:36', 1),
(2, 1, 1, 1, '34', '2025-03-20 21:28:56', '2025-03-20 21:28:56', 5);

-- --------------------------------------------------------

--
-- Table structure for table `grades`
--

CREATE TABLE `grades` (
  `id` bigint UNSIGNED NOT NULL,
  `course_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `file_path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `grade_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `grades`
--

INSERT INTO `grades` (`id`, `course_id`, `created_at`, `updated_at`, `file_path`, `grade_name`) VALUES
(1, 1, '2025-03-20 21:28:47', '2025-03-20 21:28:47', 'grade-files/01JPVFBXTMVAN1069FF5DN5GXB.xls', 'Điểm tổng kết 2025'),
(2, 2, '2025-03-20 21:37:41', '2025-03-20 21:37:41', 'grade-files/01JPVFBXTMVAN1069FF5DN5GXB.xls', 'Điểm tổng kết 2025'),
(3, 3, '2025-03-20 21:37:54', '2025-03-20 21:37:54', 'grade-files/01JPVFBXTMVAN1069FF5DN5GXB.xls', 'Điểm tổng kết 2025'),
(4, 4, '2025-03-20 21:38:28', '2025-03-20 21:38:28', 'grade-files/01JPVFBXTMVAN1069FF5DN5GXB.xls', 'Điểm tổng kết 2025');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `lesson_resources`
--

CREATE TABLE `lesson_resources` (
  `id` bigint UNSIGNED NOT NULL,
  `material_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video_path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lesson_resources`
--

INSERT INTO `lesson_resources` (`id`, `material_id`, `name`, `file_path`, `video_path`, `created_at`, `updated_at`) VALUES
(1, 1, 'Video: Giới thiệu về hình học không gian', 'lesson_files/file_example_MP4_1920_18MG.mp4', NULL, '2025-03-20 21:05:32', '2025-03-20 21:05:32'),
(2, 1, 'Tài liệu 1: Các định nghĩa và công thức cơ bản', 'lesson_files/example.docx', NULL, '2025-03-20 21:05:32', '2025-03-20 21:05:32'),
(3, 1, 'Tài liệu 2: Ví dụ minh họa về hình khối', 'lesson_files/example.docx', NULL, '2025-03-20 21:05:32', '2025-03-20 21:05:32'),
(4, 2, 'Video: Cách tính thể tích và diện tích bề mặt của các hình khối', 'lesson_files/file_example_MP4_1920_18MG.mp4', NULL, '2025-03-20 21:17:49', '2025-03-20 21:17:49'),
(5, 2, 'Tài liệu 1: Bảng công thức thể tích và diện tích', 'lesson_files/example.docx', NULL, '2025-03-20 21:17:49', '2025-03-20 21:17:49'),
(6, 2, 'Tài liệu 2: Bài tập thực hành tính toán', 'lesson_files/example.docx', NULL, '2025-03-20 21:17:49', '2025-03-20 21:17:49'),
(7, 3, 'Video: Ứng dụng của hình học không gian trong thực tế', 'lesson_files/file_example_MP4_1920_18MG.mp4', NULL, '2025-03-20 21:22:19', '2025-03-20 21:22:19'),
(8, 3, 'Tài liệu 1: Các ví dụ ứng dụng trong kiến trúc và thiết kế', 'lesson_files/example.docx', NULL, '2025-03-20 21:22:19', '2025-03-20 21:22:19'),
(9, 3, 'Tài liệu 2: Tài liệu nghiên cứu về vai trò của hình học không gian', 'lesson_files/example.docx', NULL, '2025-03-20 21:22:19', '2025-03-20 21:22:19'),
(10, 4, 'Video: Giới thiệu về hình học không gian', 'lesson_files/file_example_MP4_1920_18MG.mp4', NULL, '2025-03-20 21:37:41', '2025-03-20 21:37:41'),
(11, 4, 'Tài liệu 1: Các định nghĩa và công thức cơ bản', 'lesson_files/example.docx', NULL, '2025-03-20 21:37:41', '2025-03-20 21:37:41'),
(12, 4, 'Tài liệu 2: Ví dụ minh họa về hình khối', 'lesson_files/example.docx', NULL, '2025-03-20 21:37:41', '2025-03-20 21:37:41'),
(13, 5, 'Video: Cách tính thể tích và diện tích bề mặt của các hình khối', 'lesson_files/file_example_MP4_1920_18MG.mp4', NULL, '2025-03-20 21:37:41', '2025-03-20 21:37:41'),
(14, 5, 'Tài liệu 1: Bảng công thức thể tích và diện tích', 'lesson_files/example.docx', NULL, '2025-03-20 21:37:41', '2025-03-20 21:37:41'),
(15, 5, 'Tài liệu 2: Bài tập thực hành tính toán', 'lesson_files/example.docx', NULL, '2025-03-20 21:37:41', '2025-03-20 21:37:41'),
(16, 6, 'Video: Ứng dụng của hình học không gian trong thực tế', 'lesson_files/file_example_MP4_1920_18MG.mp4', NULL, '2025-03-20 21:37:41', '2025-03-20 21:37:41'),
(17, 6, 'Tài liệu 1: Các ví dụ ứng dụng trong kiến trúc và thiết kế', 'lesson_files/example.docx', NULL, '2025-03-20 21:37:41', '2025-03-20 21:37:41'),
(18, 6, 'Tài liệu 2: Tài liệu nghiên cứu về vai trò của hình học không gian', 'lesson_files/example.docx', NULL, '2025-03-20 21:37:41', '2025-03-20 21:37:41'),
(19, 7, 'Video: Giới thiệu về hình học không gian', 'lesson_files/file_example_MP4_1920_18MG.mp4', NULL, '2025-03-20 21:37:54', '2025-03-20 21:37:54'),
(20, 7, 'Tài liệu 1: Các định nghĩa và công thức cơ bản', 'lesson_files/example.docx', NULL, '2025-03-20 21:37:54', '2025-03-20 21:37:54'),
(21, 7, 'Tài liệu 2: Ví dụ minh họa về hình khối', 'lesson_files/example.docx', NULL, '2025-03-20 21:37:54', '2025-03-20 21:37:54'),
(22, 8, 'Video: Cách tính thể tích và diện tích bề mặt của các hình khối', 'lesson_files/file_example_MP4_1920_18MG.mp4', NULL, '2025-03-20 21:37:54', '2025-03-20 21:37:54'),
(23, 8, 'Tài liệu 1: Bảng công thức thể tích và diện tích', 'lesson_files/example.docx', NULL, '2025-03-20 21:37:54', '2025-03-20 21:37:54'),
(24, 8, 'Tài liệu 2: Bài tập thực hành tính toán', 'lesson_files/example.docx', NULL, '2025-03-20 21:37:54', '2025-03-20 21:37:54'),
(25, 9, 'Video: Ứng dụng của hình học không gian trong thực tế', 'lesson_files/file_example_MP4_1920_18MG.mp4', NULL, '2025-03-20 21:37:54', '2025-03-20 21:37:54'),
(26, 9, 'Tài liệu 1: Các ví dụ ứng dụng trong kiến trúc và thiết kế', 'lesson_files/example.docx', NULL, '2025-03-20 21:37:54', '2025-03-20 21:37:54'),
(27, 9, 'Tài liệu 2: Tài liệu nghiên cứu về vai trò của hình học không gian', 'lesson_files/example.docx', NULL, '2025-03-20 21:37:54', '2025-03-20 21:37:54'),
(28, 10, 'Video: Giới thiệu về hình học không gian', 'lesson_files/file_example_MP4_1920_18MG.mp4', NULL, '2025-03-20 21:38:28', '2025-03-20 21:38:28'),
(29, 10, 'Tài liệu 1: Các định nghĩa và công thức cơ bản', 'lesson_files/example.docx', NULL, '2025-03-20 21:38:28', '2025-03-20 21:38:28'),
(30, 10, 'Tài liệu 2: Ví dụ minh họa về hình khối', 'lesson_files/example.docx', NULL, '2025-03-20 21:38:28', '2025-03-20 21:38:28'),
(31, 11, 'Video: Cách tính thể tích và diện tích bề mặt của các hình khối', 'lesson_files/file_example_MP4_1920_18MG.mp4', NULL, '2025-03-20 21:38:28', '2025-03-20 21:38:28'),
(32, 11, 'Tài liệu 1: Bảng công thức thể tích và diện tích', 'lesson_files/example.docx', NULL, '2025-03-20 21:38:28', '2025-03-20 21:38:28'),
(33, 11, 'Tài liệu 2: Bài tập thực hành tính toán', 'lesson_files/example.docx', NULL, '2025-03-20 21:38:28', '2025-03-20 21:38:28'),
(34, 12, 'Video: Ứng dụng của hình học không gian trong thực tế', 'lesson_files/file_example_MP4_1920_18MG.mp4', NULL, '2025-03-20 21:38:28', '2025-03-20 21:38:28'),
(35, 12, 'Tài liệu 1: Các ví dụ ứng dụng trong kiến trúc và thiết kế', 'lesson_files/example.docx', NULL, '2025-03-20 21:38:28', '2025-03-20 21:38:28'),
(36, 12, 'Tài liệu 2: Tài liệu nghiên cứu về vai trò của hình học không gian', 'lesson_files/example.docx', NULL, '2025-03-20 21:38:28', '2025-03-20 21:38:28');

-- --------------------------------------------------------

--
-- Table structure for table `materials`
--

CREATE TABLE `materials` (
  `id` bigint UNSIGNED NOT NULL,
  `course_id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_description` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `description` text COLLATE utf8mb4_unicode_ci,
  `file_path` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `video_path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `materials`
--

INSERT INTO `materials` (`id`, `course_id`, `title`, `slug`, `short_description`, `description`, `file_path`, `video_path`, `created_at`, `updated_at`) VALUES
(1, 1, 'Bài 1: Các khái niệm cơ bản trong hình học không gian', 'bai-1-cac-khai-niem-co-ban-trong-hinh-hoc-khong-gian', '<h3>Bài 1: Các khái niệm cơ bản trong hình học không gian</h3><p><br></p>', '<h3>Bài 1: Các khái niệm cơ bản trong hình học không gian</h3><p><br></p>', NULL, NULL, '2025-03-20 21:05:32', '2025-03-20 21:05:32'),
(2, 1, 'Bài 2: Tính toán thể tích và diện tích bề mặt', 'bai-2-tinh-toan-the-tich-va-dien-tich-be-mat', '<h3>Bài 2: Tính toán thể tích và diện tích bề mặt</h3><p><br></p>', '<h3>Bài 2: Tính toán thể tích và diện tích bề mặt</h3><p><br></p>', NULL, NULL, '2025-03-20 21:17:49', '2025-03-20 21:17:49'),
(3, 1, 'Bài 3: Hình học không gian trong đời sống', 'bai-3-hinh-hoc-khong-gian-trong-doi-song', NULL, '<p>Bài 3: Hình học không gian trong đời sống</p>', NULL, NULL, '2025-03-20 21:22:19', '2025-03-20 21:22:19'),
(4, 2, 'Bài 1: Các khái niệm cơ bản trong hình học không gian', 'bai-1-cac-khai-niem-co-ban-trong-hinh-hoc-khong-gian-930', '<h3>Bài 1: Các khái niệm cơ bản trong hình học không gian</h3><p><br></p>', '<h3>Bài 1: Các khái niệm cơ bản trong hình học không gian</h3><p><br></p>', NULL, NULL, '2025-03-20 21:37:41', '2025-03-20 21:37:41'),
(5, 2, 'Bài 2: Tính toán thể tích và diện tích bề mặt', 'bai-2-tinh-toan-the-tich-va-dien-tich-be-mat-182', '<h3>Bài 2: Tính toán thể tích và diện tích bề mặt</h3><p><br></p>', '<h3>Bài 2: Tính toán thể tích và diện tích bề mặt</h3><p><br></p>', NULL, NULL, '2025-03-20 21:37:41', '2025-03-20 21:37:41'),
(6, 2, 'Bài 3: Hình học không gian trong đời sống', 'bai-3-hinh-hoc-khong-gian-trong-doi-song-733', NULL, '<p>Bài 3: Hình học không gian trong đời sống</p>', NULL, NULL, '2025-03-20 21:37:41', '2025-03-20 21:37:41'),
(7, 3, 'Bài 1: Các khái niệm cơ bản trong hình học không gian', 'bai-1-cac-khai-niem-co-ban-trong-hinh-hoc-khong-gian-916', '<h3>Bài 1: Các khái niệm cơ bản trong hình học không gian</h3><p><br></p>', '<h3>Bài 1: Các khái niệm cơ bản trong hình học không gian</h3><p><br></p>', NULL, NULL, '2025-03-20 21:37:54', '2025-03-20 21:37:54'),
(8, 3, 'Bài 2: Tính toán thể tích và diện tích bề mặt', 'bai-2-tinh-toan-the-tich-va-dien-tich-be-mat-449', '<h3>Bài 2: Tính toán thể tích và diện tích bề mặt</h3><p><br></p>', '<h3>Bài 2: Tính toán thể tích và diện tích bề mặt</h3><p><br></p>', NULL, NULL, '2025-03-20 21:37:54', '2025-03-20 21:37:54'),
(9, 3, 'Bài 3: Hình học không gian trong đời sống', 'bai-3-hinh-hoc-khong-gian-trong-doi-song-329', NULL, '<p>Bài 3: Hình học không gian trong đời sống</p>', NULL, NULL, '2025-03-20 21:37:54', '2025-03-20 21:37:54'),
(10, 4, 'Bài 1: Các khái niệm cơ bản trong hình học không gian', 'bai-1-cac-khai-niem-co-ban-trong-hinh-hoc-khong-gian-916-685', '<h3>Bài 1: Các khái niệm cơ bản trong hình học không gian</h3><p><br></p>', '<h3>Bài 1: Các khái niệm cơ bản trong hình học không gian</h3><p><br></p>', NULL, NULL, '2025-03-20 21:38:28', '2025-03-20 21:38:28'),
(11, 4, 'Bài 2: Tính toán thể tích và diện tích bề mặt', 'bai-2-tinh-toan-the-tich-va-dien-tich-be-mat-449-232', '<h3>Bài 2: Tính toán thể tích và diện tích bề mặt</h3><p><br></p>', '<h3>Bài 2: Tính toán thể tích và diện tích bề mặt</h3><p><br></p>', NULL, NULL, '2025-03-20 21:38:28', '2025-03-20 21:38:28'),
(12, 4, 'Bài 3: Hình học không gian trong đời sống', 'bai-3-hinh-hoc-khong-gian-trong-doi-song-329-650', NULL, '<p>Bài 3: Hình học không gian trong đời sống</p>', NULL, NULL, '2025-03-20 21:38:28', '2025-03-20 21:38:28');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_03_15_021541_create_students_table', 1),
(5, '2025_03_15_021542_create_courses_table', 1),
(6, '2025_03_15_021542_create_enrollments_table', 1),
(7, '2025_03_15_021542_create_grades_table', 1),
(8, '2025_03_15_021543_create_attendance_table', 1),
(9, '2025_03_15_021543_create_feedbacks_table', 1),
(10, '2025_03_15_021543_create_materials_table', 1),
(11, '2025_03_15_022219_add_columns_to_courses_table', 1),
(12, '2025_03_15_022503_add_themes_settings_to_users_table', 1),
(13, '2025_03_15_023405_add_columns_to_courses_table', 1),
(14, '2025_03_15_031230_add_slug_to_materials_table', 1),
(15, '2025_03_15_031355_add_fields_to_materials_table', 1),
(16, '2025_03_16_112259_add_email_verified_at_to_students_table', 1),
(17, '2025_03_16_112434_add_verification_code_to_students', 1),
(18, '2025_03_17_105426_create_lesson_resources_table', 1),
(19, '2025_03_17_112311_add_rating_to_feedbacks_table', 1),
(20, '2025_03_18_012257_add_remember_token_to_students_table', 1),
(21, '2025_03_18_012258_create_student_learning_history_table', 1),
(22, '2025_03_20_020429_modify_grades_table', 1),
(23, '2025_03_20_044436_add_username_to_users_table', 1),
(24, '2025_03_21_000000_modify_attendance_table', 1),
(25, '2025_03_21_121729_add_status_to_enrollments_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('0LYQS3q8hNgUWtYPemWRkd6Smsx6FyWYRLOvM7cL', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiOGtzblZHd2lCbDNCb0JMMkRHSWc3UVJENFppVmFRa1BzZVUyVXhjZiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NjY6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9jb3Vyc2VzL2hpbmgtaG9jLWtob25nLWdpYW4tc3BhdGlhbC1nZW9tZXRyeSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1742556495),
('AQghNgVaqHtcv2gJdWVVOWL8SOYmgoqsxizbbuwz', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiclNXZXpYR3lUMml0Qm8zVkpzYmwzS1RFdDZxbGNGb2l5aDlDMW1ueCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NjY6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9jb3Vyc2VzL2hpbmgtaG9jLWtob25nLWdpYW4tc3BhdGlhbC1nZW9tZXRyeSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1742556459),
('dzmHjcgVQeS8LmjXL5vXbIVvMNMLmO7zG6W07KgZ', 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', 'YTo3OntzOjY6Il90b2tlbiI7czo0MDoiVXpIRTRwcFlLOHVEQldITGtEb3dRcWQ4N2pzUTFjR0NKN0ZiMEFJNCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzc6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9hZG1pbi9kaWVtLWRhbmgiO31zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToyO3M6MTc6InBhc3N3b3JkX2hhc2hfd2ViIjtzOjYwOiIkMnkkMTIkSEo4a3lhNUlCZC9lMGdUZ0NHNkQyT2J1MmJ1WS9pc3poOVl2QThSSHA2V2dUbllnNTRSdlciO3M6NTQ6ImxvZ2luX3N0dWRlbnRfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO3M6ODoiZmlsYW1lbnQiO2E6MDp7fX0=', 1742561039);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` bigint UNSIGNED NOT NULL,
  `student_id` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `full_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `verification_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `student_id`, `full_name`, `email`, `email_verified_at`, `verification_code`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'H12411', 'Hoàng Giang', 'trangiangzxc@gmail.com', '2025-03-20 21:10:45', NULL, '$2y$12$PmXvW/HPzKZBdSCS4Sv9/OwGkvYJqpcJfngfNKX6juOfLdqbowXGm', NULL, '2025-03-20 21:07:51', '2025-03-20 21:10:45');

-- --------------------------------------------------------

--
-- Table structure for table `student_learning_history`
--

CREATE TABLE `student_learning_history` (
  `id` bigint UNSIGNED NOT NULL,
  `student_id` bigint UNSIGNED NOT NULL,
  `lesson_resource_id` bigint UNSIGNED NOT NULL,
  `started_at` timestamp NULL DEFAULT NULL,
  `completed_at` timestamp NULL DEFAULT NULL,
  `is_completed` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student_learning_history`
--

INSERT INTO `student_learning_history` (`id`, `student_id`, `lesson_resource_id`, `started_at`, `completed_at`, `is_completed`, `created_at`, `updated_at`) VALUES
(1, 1, 2, '2025-03-20 21:13:58', NULL, 1, '2025-03-20 21:13:58', '2025-03-20 21:13:58'),
(2, 1, 3, '2025-03-20 21:14:01', NULL, 1, '2025-03-20 21:14:01', '2025-03-20 21:14:01'),
(3, 1, 1, '2025-03-20 21:14:04', NULL, 1, '2025-03-20 21:14:04', '2025-03-20 21:14:04'),
(4, 1, 10, '2025-03-20 21:38:13', NULL, 1, '2025-03-20 21:38:13', '2025-03-20 21:38:13');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` enum('admin','giảng viên') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'giảng viên',
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `theme` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'default',
  `theme_color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `role`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `theme`, `theme_color`) VALUES
(1, 'Test User', NULL, 'giảng viên', 'test@example.com', '2025-03-20 20:43:15', '$2y$12$1TCLd8BpsFfDZZVG1ivQs.VrlNYwMQ//78EeHAmdlIK9/gQOzElOy', 'kct8p5OCLv', '2025-03-20 20:43:15', '2025-03-20 20:43:15', 'default', NULL),
(2, 'truonghainam', 'truonghainam', 'admin', 'truonghainam@gmail.com', NULL, '$2y$12$HJ8kya5IBd/e0gTgCG6D2Obu2buY/iszh9YvA8RHp6WgTnYg54RvW', NULL, '2025-03-20 20:44:00', '2025-03-20 20:44:00', 'default', NULL),
(3, 'giangvien1', 'giangvien1', 'giảng viên', 'giangvien1@gmail.com', NULL, '$2y$12$tWJ/ltFbJfgOVCLgemo14OzckdwkH0j/JArn1V8Vvap5sq4Oo3DwG', NULL, '2025-03-20 20:45:21', '2025-03-20 20:45:21', 'default', NULL),
(4, 'giangvien2', 'giangvien2', 'giảng viên', 'giangvien2@gmail.com', NULL, '$2y$12$tWJ/ltFbJfgOVCLgemo14OzckdwkH0j/JArn1V8Vvap5sq4Oo3DwG', NULL, '2025-03-20 20:45:21', '2025-03-20 20:45:21', 'default', NULL),
(5, 'giangvien3', 'giangvien3', 'giảng viên', 'giangvien3@gmail.com', NULL, '$2y$12$tWJ/ltFbJfgOVCLgemo14OzckdwkH0j/JArn1V8Vvap5sq4Oo3DwG', NULL, '2025-03-20 20:45:21', '2025-03-20 20:45:21', 'default', NULL),
(6, 'giangvien4', 'giangvien4', 'giảng viên', 'giangvien4@gmail.com', NULL, '$2y$12$tWJ/ltFbJfgOVCLgemo14OzckdwkH0j/JArn1V8Vvap5sq4Oo3DwG', NULL, '2025-03-20 20:45:21', '2025-03-20 20:45:21', 'default', NULL),
(7, 'giangvien5', 'giangvien5', 'giảng viên', 'giangvien5@gmail.com', NULL, '$2y$12$tWJ/ltFbJfgOVCLgemo14OzckdwkH0j/JArn1V8Vvap5sq4Oo3DwG', NULL, '2025-03-20 20:45:21', '2025-03-20 20:45:21', 'default', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `attendance_student_id_course_id_week_unique` (`student_id`,`course_id`,`week`),
  ADD KEY `attendance_course_id_foreign` (`course_id`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `courses_slug_unique` (`slug`),
  ADD KEY `courses_created_by_foreign` (`created_by`);

--
-- Indexes for table `enrollments`
--
ALTER TABLE `enrollments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `enrollments_student_id_foreign` (`student_id`),
  ADD KEY `enrollments_course_id_foreign` (`course_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `feedbacks`
--
ALTER TABLE `feedbacks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `feedbacks_student_id_foreign` (`student_id`),
  ADD KEY `feedbacks_course_id_foreign` (`course_id`);

--
-- Indexes for table `grades`
--
ALTER TABLE `grades`
  ADD PRIMARY KEY (`id`),
  ADD KEY `grades_course_id_foreign` (`course_id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lesson_resources`
--
ALTER TABLE `lesson_resources`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lesson_resources_material_id_foreign` (`material_id`);

--
-- Indexes for table `materials`
--
ALTER TABLE `materials`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `materials_slug_unique` (`slug`),
  ADD KEY `materials_course_id_foreign` (`course_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `students_student_id_unique` (`student_id`),
  ADD UNIQUE KEY `students_email_unique` (`email`);

--
-- Indexes for table `student_learning_history`
--
ALTER TABLE `student_learning_history`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `student_learning_history_student_id_lesson_resource_id_unique` (`student_id`,`lesson_resource_id`),
  ADD KEY `student_learning_history_lesson_resource_id_foreign` (`lesson_resource_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_username_unique` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `enrollments`
--
ALTER TABLE `enrollments`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `feedbacks`
--
ALTER TABLE `feedbacks`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `grades`
--
ALTER TABLE `grades`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lesson_resources`
--
ALTER TABLE `lesson_resources`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `materials`
--
ALTER TABLE `materials`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `student_learning_history`
--
ALTER TABLE `student_learning_history`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `attendance`
--
ALTER TABLE `attendance`
  ADD CONSTRAINT `attendance_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `attendance_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `courses`
--
ALTER TABLE `courses`
  ADD CONSTRAINT `courses_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `enrollments`
--
ALTER TABLE `enrollments`
  ADD CONSTRAINT `enrollments_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `enrollments_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `feedbacks`
--
ALTER TABLE `feedbacks`
  ADD CONSTRAINT `feedbacks_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `feedbacks_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `grades`
--
ALTER TABLE `grades`
  ADD CONSTRAINT `grades_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `lesson_resources`
--
ALTER TABLE `lesson_resources`
  ADD CONSTRAINT `lesson_resources_material_id_foreign` FOREIGN KEY (`material_id`) REFERENCES `materials` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `materials`
--
ALTER TABLE `materials`
  ADD CONSTRAINT `materials_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `student_learning_history`
--
ALTER TABLE `student_learning_history`
  ADD CONSTRAINT `student_learning_history_lesson_resource_id_foreign` FOREIGN KEY (`lesson_resource_id`) REFERENCES `lesson_resources` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `student_learning_history_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
