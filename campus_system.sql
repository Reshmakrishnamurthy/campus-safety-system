-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 05, 2026 at 06:34 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `campus_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `pin` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `pin`) VALUES
(1, '123456');

-- --------------------------------------------------------

--
-- Table structure for table `announcements`
--

CREATE TABLE `announcements` (
  `id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `content` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `announcements`
--

INSERT INTO `announcements` (`id`, `title`, `content`, `created_at`) VALUES
(7, '🛠️ Maintenance Alert: Elevator Service Interruption', 'The main elevators in the Faculty of Computing and Informatics (FCI) are undergoing emergency maintenance. Please use the stairwells for the next 2 hours. We apologize for the inconvenience.\r\n', '2026-01-25 11:51:43'),
(8, 'EXAM', 'ON FEB', '2026-01-29 03:40:17');

-- --------------------------------------------------------

--
-- Table structure for table `campus_locations`
--

CREATE TABLE `campus_locations` (
  `id` int(11) NOT NULL,
  `location_name` varchar(100) NOT NULL,
  `category` varchar(50) NOT NULL,
  `latitude` decimal(10,6) NOT NULL,
  `longitude` decimal(10,6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `campus_locations`
--

INSERT INTO `campus_locations` (`id`, `location_name`, `category`, `latitude`, `longitude`) VALUES
(1, 'Faculty of Computing & Informatics (FCI)', 'Academic Building', 2.927420, 101.641950),
(2, 'Faculty of Engineering (FOE)', 'Academic Building', 2.927900, 101.642600),
(3, 'Faculty of Creative Multimedia (FCM)', 'Academic Building', 2.928500, 101.641300),
(4, 'Administration Building', 'Administrative Office', 2.926980, 101.641800),
(5, 'Student Services & Admissions', 'Administrative Office', 2.926600, 101.642400),
(6, 'MMU Cyberjaya Library', 'Library', 2.927100, 101.640900),
(7, 'MMU Main Cafeteria', 'Cafeteria', 2.927700, 101.640500),
(8, 'Student Food Court', 'Cafeteria', 2.928200, 101.641100),
(9, 'Main Parking Area', 'Parking', 2.926500, 101.640200),
(10, 'Staff Parking Zone', 'Parking', 2.928900, 101.642800),
(11, 'Emergency Assembly Point A', 'Emergency', 2.927300, 101.641200),
(12, 'Campus Health Centre', 'Emergency', 2.926900, 101.642900),
(13, 'Campus Security Office', 'Emergency', 2.927800, 101.640100);

-- --------------------------------------------------------

--
-- Table structure for table `campus_map_updates`
--

CREATE TABLE `campus_map_updates` (
  `id` int(11) NOT NULL,
  `map_image` varchar(255) NOT NULL,
  `emergency_exits` text DEFAULT NULL,
  `safety_zones` text DEFAULT NULL,
  `effective_date` date NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `campus_map_updates`
--

INSERT INTO `campus_map_updates` (`id`, `map_image`, `emergency_exits`, `safety_zones`, `effective_date`, `created_at`) VALUES
(1, 'map_1768632859.png', 'back', 'a', '2026-01-17', '2026-01-17 06:54:19'),
(2, 'map_1768633335.jpg', 'b', 'a', '2026-01-17', '2026-01-17 07:02:15'),
(3, 'map_1768737854.jpg', 'b', 'a', '2026-01-18', '2026-01-18 12:04:14'),
(4, 'map_1768737917.jpg', 'b', 'a', '2026-01-18', '2026-01-18 12:05:17'),
(5, 'map_1768740471.jpg', 'wgtergr', 'gerwgeg', '2026-01-24', '2026-01-18 12:47:51'),
(6, 'map_1768741456.jpg', 'a', 'b', '2026-01-18', '2026-01-18 13:04:16'),
(7, 'map_1768741678.jpg', 'Hostel Emergency Routes: Specific evacuation routes are designated for residential areas. For example, Hostel Building 3 has assigned leaders on each floor to guide residents during emergencies.\r\nGeneral Procedures: In case of fire or emergency, occupants should follow designated exit signs, ensure all doors/windows are closed if leaving, and proceed to the designated assembly area.\r\nSafety Precaution: Students are advised to keep emergency contact numbers saved and to follow all safety protocols provided by the security team.', '24/7 Security: Dedicated team available for incidents, lost cards, or concerns.', '2026-01-20', '2026-01-18 13:07:58'),
(8, 'map_1768869719.jpg', 'Hostel Emergency Routes: Specific evacuation routes are designated for residential areas. For example, Hostel Building 3 has assigned leaders on each floor to guide residents during emergencies.', '24/7 security', '2026-01-20', '2026-01-20 00:41:59'),
(9, 'map_1768872198.jpg', 'aesrdtrytiuyofdfygu', 'e579iuyfhyjgukilh', '2026-01-20', '2026-01-20 01:23:18'),
(10, 'map_1769342095.jpg', 'Primary Exit (Block A/B): \"Proceed to the nearest stairwell and exit via the Ground Floor Main Lobby. Do not use elevators.\"\r\n\r\nSecondary Exit (FCI/FMD): \"Use the external fire escape stairs located at the North and South wings of the building.\"', 'Parking Lot C: \"Overflow safety zone and staging area for emergency first responders.\"', '2026-01-25', '2026-01-25 11:54:55'),
(11, 'map_1769657984.jpg', 'primary exit c/d', 'a', '2026-01-03', '2026-01-29 03:39:44');

-- --------------------------------------------------------

--
-- Table structure for table `emergency_alerts`
--

CREATE TABLE `emergency_alerts` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `emergency_alerts`
--

INSERT INTO `emergency_alerts` (`id`, `title`, `message`, `created_at`) VALUES
(4, 'Fire Alert', '🚨 FIRE ALERT: BLOCK A. A fire has been reported on Level 3. Please evacuate via the nearest stairs to the Grand Pavilion immediately. Do not use elevators.\r\n', '2026-01-25 11:55:43'),
(5, 'Medical Emergency', '🚑 MEDICAL EMERGENCY. First responders are attending to an incident near the Library entrance. Please keep the area clear for emergency vehicles.\r\n', '2026-01-25 11:56:08'),
(6, 'Security Lockdown', '🔒 CAMPUS LOCKDOWN. A security threat has been detected near the West Gate. Please stay indoors, lock all doors, and wait for further instructions from campus security.\r\n', '2026-01-25 11:56:24'),
(7, 'WIFI', 'WIFI IS HAVING PROBLEM.', '2026-01-29 03:41:58');

-- --------------------------------------------------------

--
-- Table structure for table `emergency_messages`
--

CREATE TABLE `emergency_messages` (
  `id` int(11) NOT NULL,
  `language` varchar(50) NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `emergency_messages`
--

INSERT INTO `emergency_messages` (`id`, `language`, `message`) VALUES
(5, 'English', 'In case of emergency:\n\r\n1. Stay calm and do not panic.\n\r\n2. Follow evacuation signs to the nearest exit.\n\r\n3. Assist persons with disabilities if safe to do so.\n\r\n4. Proceed to the nearest safety zone.\n\r\n5. Call campus security or emergency services immediately.'),
(6, 'Malay', 'Dalam keadaan kecemasan:\n\r\n1. Kekal tenang dan jangan panik.\n\r\n2. Ikuti papan tanda keluar kecemasan terdekat.\n\r\n3. Bantu individu kurang upaya jika selamat.\n\r\n4. Bergerak ke zon keselamatan terdekat.\n\r\n5. Hubungi keselamatan kampus atau perkhidmatan kecemasan.'),
(7, 'Tamil', 'அவசர நிலை ஏற்பட்டால்:\n\r\n1. அமைதியாக இருங்கள்.\n\r\n2. அருகிலுள்ள அவசர வெளியேறும் வழியை பின்பற்றவும்.\n\r\n3. பாதுகாப்பாக இருந்தால் மாற்றுத் திறனாளிகளுக்கு உதவவும்.\n\r\n4. பாதுகாப்பு மண்டலத்திற்கு செல்லவும்.\n\r\n5. வளாக பாதுகாப்பு அல்லது அவசர சேவைகளை தொடர்பு கொள்ளவும்.'),
(8, 'Mandarin', '紧急情况下：\n\r\n1. 保持冷静，不要惊慌。\n\r\n2. 按照最近的紧急出口指示离开。\n\r\n3. 如安全，请协助残疾人士。\n\r\n4. 前往最近的安全区域。\n\r\n5. 立即联系校园保安或紧急服务。'),
(9, 'Arabic', 'في حالة الطوارئ:\n\r\n1. حافظ على الهدوء ولا تصاب بالذعر.\n\r\n2. اتبع علامات مخرج الطوارئ الأقرب.\n\r\n3. ساعد ذوي الاحتياجات الخاصة إذا كان ذلك آمناً.\n\r\n4. انتقل إلى منطقة الأمان الأقرب.\n\r\n5. اتصل بأمن الحرم الجامعي أو خدمات الطوارئ فوراً.');

-- --------------------------------------------------------

--
-- Table structure for table `safety_procedures`
--

CREATE TABLE `safety_procedures` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `student_id` varchar(20) NOT NULL,
  `password` varchar(50) DEFAULT NULL,
  `failed_attempts` int(11) DEFAULT 0,
  `lock_until` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `student_id`, `password`, `failed_attempts`, `lock_until`) VALUES
(1, 'MMU12345', '123456', 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `student_reports`
--

CREATE TABLE `student_reports` (
  `id` int(11) NOT NULL,
  `student_id` varchar(20) DEFAULT NULL,
  `report` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` enum('new','read') DEFAULT 'new'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student_reports`
--

INSERT INTO `student_reports` (`id`, `student_id`, `report`, `created_at`, `status`) VALUES
(7, 'MMU12345', 'safety Improvement Suggestion\r\nSubject: Lighting Complaint.\r\n\r\nMessage/Description: \"The pathway from the Grand Pavilion to the Male Hostel is very dark at night. Requesting more streetlights for safety.\"\r\n', '2026-01-25 12:06:34', 'read'),
(8, 'MMU12345', 'Emergency Assistance Request\r\nIncident Type: Medical Emergency.\r\n\r\nMessage/Description: \"A student has fainted in the FCI Ground Floor lobby. He is unconscious but breathing.\"\r\n', '2026-01-25 12:06:53', 'read'),
(9, 'MMU12345', 'Maintenance Hazard Report \r\n\r\nReport Category: Electrical Hazard.\r\n\r\nMessage/Description: \"The electrical socket in the Library (Level 2, Section A) is sparking and looks scorched.\"\r\n', '2026-01-25 12:07:07', 'read'),
(10, 'MMU12345', 'the bathroom has no water', '2026-01-29 03:52:28', 'read');

-- --------------------------------------------------------

--
-- Table structure for table `visitors`
--

CREATE TABLE `visitors` (
  `visitor_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `phone` varchar(200) NOT NULL,
  `email` varchar(100) NOT NULL,
  `purpose` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `visitors`
--

INSERT INTO `visitors` (`visitor_id`, `name`, `phone`, `email`, `purpose`, `created_at`) VALUES
(1, 'rtsfjyfj', '73547579', 'resh@gamil.com', 'rduitrdyfjghli', '2026-01-11 12:12:45'),
(2, 'rsydcvj', '0116476', 'resh@gmail.com', 'tfeiqgroqrfhoiwhf', '2026-01-11 12:31:30'),
(3, 'reshma ', '01170304090', 'reshma@gmail.com', 'dtafdtfgwvdghvdqihdvqbj', '2026-01-11 14:47:25'),
(4, 'etrytyguygu', '9079678564653', 'abc@fugdwdih', 'dytdytufuygikuhkijhk', '2026-01-11 16:01:07'),
(5, 'RESHMA', '01146579', 'RES@gmail', 'srtdjgmhbk;no', '2026-01-12 13:41:49'),
(6, 'tedytuyhbk', '7643256789', 'reshma@gmail', 'rsetdguhgxfgjkhl', '2026-01-12 17:32:34'),
(7, 'reshb.knl', '23456776543', 'resh@gmail', 'tfyutiyoihlctdtiuyohlkbj', '2026-01-12 19:42:10'),
(8, 'zexrctfgyhu9ij', '12345678ffggg', 'res@gmail.com', 'esrdtyfugiho', '2026-01-20 01:29:59'),
(9, 'abi', '01170304090', 'abc@gmail.com', 'hi', '2026-01-29 03:48:44'),
(10, 'resdcjc', '011154826595', 'resh@gmail.com', '6rx7ct8yv9buoinpm', '2026-02-01 14:21:39'),
(11, 'rdytucuhvfq', '988547536425', 'resh@gmail.com', 'dqdff2gif', '2026-02-01 14:26:05'),
(12, 'reshma', '905342', 'resh@gmail.com', 'rdufiuhlild', '2026-02-01 14:29:17'),
(13, 'reshma', '0117654654657687', 'resh@gmail.com', 'ersxrctyvuybiuni', '2026-02-02 11:19:42'),
(14, 'mia', '01170304090', 'reshma@gmail.com', 'see', '2026-02-04 22:14:59');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `announcements`
--
ALTER TABLE `announcements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `campus_locations`
--
ALTER TABLE `campus_locations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `campus_map_updates`
--
ALTER TABLE `campus_map_updates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `emergency_alerts`
--
ALTER TABLE `emergency_alerts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `emergency_messages`
--
ALTER TABLE `emergency_messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `safety_procedures`
--
ALTER TABLE `safety_procedures`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `student_id` (`student_id`);

--
-- Indexes for table `student_reports`
--
ALTER TABLE `student_reports`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `visitors`
--
ALTER TABLE `visitors`
  ADD PRIMARY KEY (`visitor_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `announcements`
--
ALTER TABLE `announcements`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `campus_locations`
--
ALTER TABLE `campus_locations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `campus_map_updates`
--
ALTER TABLE `campus_map_updates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `emergency_alerts`
--
ALTER TABLE `emergency_alerts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `emergency_messages`
--
ALTER TABLE `emergency_messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `safety_procedures`
--
ALTER TABLE `safety_procedures`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `student_reports`
--
ALTER TABLE `student_reports`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `visitors`
--
ALTER TABLE `visitors`
  MODIFY `visitor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
