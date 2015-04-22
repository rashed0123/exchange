-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 19, 2015 at 10:22 AM
-- Server version: 5.5.16
-- PHP Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `remittance_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE IF NOT EXISTS `countries` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `country_code` varchar(2) NOT NULL DEFAULT '',
  `country_name` varchar(100) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=243 ;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `country_code`, `country_name`) VALUES
(1, 'US', 'United States'),
(2, 'CA', 'Canada'),
(3, 'AF', 'Afghanistan'),
(4, 'AL', 'Albania'),
(5, 'DZ', 'Algeria'),
(6, 'DS', 'American Samoa'),
(7, 'AD', 'Andorra'),
(8, 'AO', 'Angola'),
(9, 'AI', 'Anguilla'),
(10, 'AQ', 'Antarctica'),
(11, 'AG', 'Antigua and/or Barbuda'),
(12, 'AR', 'Argentina'),
(13, 'AM', 'Armenia'),
(14, 'AW', 'Aruba'),
(15, 'AU', 'Australia'),
(16, 'AT', 'Austria'),
(17, 'AZ', 'Azerbaijan'),
(18, 'BS', 'Bahamas'),
(19, 'BH', 'Bahrain'),
(20, 'BD', 'Bangladesh'),
(21, 'BB', 'Barbados'),
(22, 'BY', 'Belarus'),
(23, 'BE', 'Belgium'),
(24, 'BZ', 'Belize'),
(25, 'BJ', 'Benin'),
(26, 'BM', 'Bermuda'),
(27, 'BT', 'Bhutan'),
(28, 'BO', 'Bolivia'),
(29, 'BA', 'Bosnia and Herzegovina'),
(30, 'BW', 'Botswana'),
(31, 'BV', 'Bouvet Island'),
(32, 'BR', 'Brazil'),
(33, 'IO', 'British lndian Ocean Territory'),
(34, 'BN', 'Brunei Darussalam'),
(35, 'BG', 'Bulgaria'),
(36, 'BF', 'Burkina Faso'),
(37, 'BI', 'Burundi'),
(38, 'KH', 'Cambodia'),
(39, 'CM', 'Cameroon'),
(40, 'CV', 'Cape Verde'),
(41, 'KY', 'Cayman Islands'),
(42, 'CF', 'Central African Republic'),
(43, 'TD', 'Chad'),
(44, 'CL', 'Chile'),
(45, 'CN', 'China'),
(46, 'CX', 'Christmas Island'),
(47, 'CC', 'Cocos (Keeling) Islands'),
(48, 'CO', 'Colombia'),
(49, 'KM', 'Comoros'),
(50, 'CG', 'Congo'),
(51, 'CK', 'Cook Islands'),
(52, 'CR', 'Costa Rica'),
(53, 'HR', 'Croatia (Hrvatska)'),
(54, 'CU', 'Cuba'),
(55, 'CY', 'Cyprus'),
(56, 'CZ', 'Czech Republic'),
(57, 'DK', 'Denmark'),
(58, 'DJ', 'Djibouti'),
(59, 'DM', 'Dominica'),
(60, 'DO', 'Dominican Republic'),
(61, 'TP', 'East Timor'),
(62, 'EC', 'Ecuador'),
(63, 'EG', 'Egypt'),
(64, 'SV', 'El Salvador'),
(65, 'GQ', 'Equatorial Guinea'),
(66, 'ER', 'Eritrea'),
(67, 'EE', 'Estonia'),
(68, 'ET', 'Ethiopia'),
(69, 'FK', 'Falkland Islands (Malvinas)'),
(70, 'FO', 'Faroe Islands'),
(71, 'FJ', 'Fiji'),
(72, 'FI', 'Finland'),
(73, 'FR', 'France'),
(74, 'FX', 'France, Metropolitan'),
(75, 'GF', 'French Guiana'),
(76, 'PF', 'French Polynesia'),
(77, 'TF', 'French Southern Territories'),
(78, 'GA', 'Gabon'),
(79, 'GM', 'Gambia'),
(80, 'GE', 'Georgia'),
(81, 'DE', 'Germany'),
(82, 'GH', 'Ghana'),
(83, 'GI', 'Gibraltar'),
(84, 'GR', 'Greece'),
(85, 'GL', 'Greenland'),
(86, 'GD', 'Grenada'),
(87, 'GP', 'Guadeloupe'),
(88, 'GU', 'Guam'),
(89, 'GT', 'Guatemala'),
(90, 'GN', 'Guinea'),
(91, 'GW', 'Guinea-Bissau'),
(92, 'GY', 'Guyana'),
(93, 'HT', 'Haiti'),
(94, 'HM', 'Heard and Mc Donald Islands'),
(95, 'HN', 'Honduras'),
(96, 'HK', 'Hong Kong'),
(97, 'HU', 'Hungary'),
(98, 'IS', 'Iceland'),
(99, 'IN', 'India'),
(100, 'ID', 'Indonesia'),
(101, 'IR', 'Iran (Islamic Republic of)'),
(102, 'IQ', 'Iraq'),
(103, 'IE', 'Ireland'),
(104, 'IL', 'Israel'),
(105, 'IT', 'Italy'),
(106, 'CI', 'Ivory Coast'),
(107, 'JM', 'Jamaica'),
(108, 'JP', 'Japan'),
(109, 'JO', 'Jordan'),
(110, 'KZ', 'Kazakhstan'),
(111, 'KE', 'Kenya'),
(112, 'KI', 'Kiribati'),
(113, 'KP', 'Korea, Democratic People''s Republic of'),
(114, 'KR', 'Korea, Republic of'),
(115, 'XK', 'Kosovo'),
(116, 'KW', 'Kuwait'),
(117, 'KG', 'Kyrgyzstan'),
(118, 'LA', 'Lao People''s Democratic Republic'),
(119, 'LV', 'Latvia'),
(120, 'LB', 'Lebanon'),
(121, 'LS', 'Lesotho'),
(122, 'LR', 'Liberia'),
(123, 'LY', 'Libyan Arab Jamahiriya'),
(124, 'LI', 'Liechtenstein'),
(125, 'LT', 'Lithuania'),
(126, 'LU', 'Luxembourg'),
(127, 'MO', 'Macau'),
(128, 'MK', 'Macedonia'),
(129, 'MG', 'Madagascar'),
(130, 'MW', 'Malawi'),
(131, 'MY', 'Malaysia'),
(132, 'MV', 'Maldives'),
(133, 'ML', 'Mali'),
(134, 'MT', 'Malta'),
(135, 'MH', 'Marshall Islands'),
(136, 'MQ', 'Martinique'),
(137, 'MR', 'Mauritania'),
(138, 'MU', 'Mauritius'),
(139, 'TY', 'Mayotte'),
(140, 'MX', 'Mexico'),
(141, 'FM', 'Micronesia, Federated States of'),
(142, 'MD', 'Moldova, Republic of'),
(143, 'MC', 'Monaco'),
(144, 'MN', 'Mongolia'),
(145, 'ME', 'Montenegro'),
(146, 'MS', 'Montserrat'),
(147, 'MA', 'Morocco'),
(148, 'MZ', 'Mozambique'),
(149, 'MM', 'Myanmar'),
(150, 'NA', 'Namibia'),
(151, 'NR', 'Nauru'),
(152, 'NP', 'Nepal'),
(153, 'NL', 'Netherlands'),
(154, 'AN', 'Netherlands Antilles'),
(155, 'NC', 'New Caledonia'),
(156, 'NZ', 'New Zealand'),
(157, 'NI', 'Nicaragua'),
(158, 'NE', 'Niger'),
(159, 'NG', 'Nigeria'),
(160, 'NU', 'Niue'),
(161, 'NF', 'Norfork Island'),
(162, 'MP', 'Northern Mariana Islands'),
(163, 'NO', 'Norway'),
(164, 'OM', 'Oman'),
(165, 'PK', 'Pakistan'),
(166, 'PW', 'Palau'),
(167, 'PA', 'Panama'),
(168, 'PG', 'Papua New Guinea'),
(169, 'PY', 'Paraguay'),
(170, 'PE', 'Peru'),
(171, 'PH', 'Philippines'),
(172, 'PN', 'Pitcairn'),
(173, 'PL', 'Poland'),
(174, 'PT', 'Portugal'),
(175, 'PR', 'Puerto Rico'),
(176, 'QA', 'Qatar'),
(177, 'RE', 'Reunion'),
(178, 'RO', 'Romania'),
(179, 'RU', 'Russian Federation'),
(180, 'RW', 'Rwanda'),
(181, 'KN', 'Saint Kitts and Nevis'),
(182, 'LC', 'Saint Lucia'),
(183, 'VC', 'Saint Vincent and the Grenadines'),
(184, 'WS', 'Samoa'),
(185, 'SM', 'San Marino'),
(186, 'ST', 'Sao Tome and Principe'),
(187, 'SA', 'Saudi Arabia'),
(188, 'SN', 'Senegal'),
(189, 'RS', 'Serbia'),
(190, 'SC', 'Seychelles'),
(191, 'SL', 'Sierra Leone'),
(192, 'SG', 'Singapore'),
(193, 'SK', 'Slovakia'),
(194, 'SI', 'Slovenia'),
(195, 'SB', 'Solomon Islands'),
(196, 'SO', 'Somalia'),
(197, 'ZA', 'South Africa'),
(198, 'GS', 'South Georgia South Sandwich Islands'),
(199, 'ES', 'Spain'),
(200, 'LK', 'Sri Lanka'),
(201, 'SH', 'St. Helena'),
(202, 'PM', 'St. Pierre and Miquelon'),
(203, 'SD', 'Sudan'),
(204, 'SR', 'Suriname'),
(205, 'SJ', 'Svalbarn and Jan Mayen Islands'),
(206, 'SZ', 'Swaziland'),
(207, 'SE', 'Sweden'),
(208, 'CH', 'Switzerland'),
(209, 'SY', 'Syrian Arab Republic'),
(210, 'TW', 'Taiwan'),
(211, 'TJ', 'Tajikistan'),
(212, 'TZ', 'Tanzania, United Republic of'),
(213, 'TH', 'Thailand'),
(214, 'TG', 'Togo'),
(215, 'TK', 'Tokelau'),
(216, 'TO', 'Tonga'),
(217, 'TT', 'Trinidad and Tobago'),
(218, 'TN', 'Tunisia'),
(219, 'TR', 'Turkey'),
(220, 'TM', 'Turkmenistan'),
(221, 'TC', 'Turks and Caicos Islands'),
(222, 'TV', 'Tuvalu'),
(223, 'UG', 'Uganda'),
(224, 'UA', 'Ukraine'),
(225, 'AE', 'United Arab Emirates'),
(226, 'GB', 'United Kingdom'),
(227, 'UM', 'United States minor outlying islands'),
(228, 'UY', 'Uruguay'),
(229, 'UZ', 'Uzbekistan'),
(230, 'VU', 'Vanuatu'),
(231, 'VA', 'Vatican City State'),
(232, 'VE', 'Venezuela'),
(233, 'VN', 'Vietnam'),
(234, 'VG', 'Virgin Islands (British)'),
(235, 'VI', 'Virgin Islands (U.S.)'),
(236, 'WF', 'Wallis and Futuna Islands'),
(237, 'EH', 'Western Sahara'),
(238, 'YE', 'Yemen'),
(239, 'YU', 'Yugoslavia'),
(240, 'ZR', 'Zaire'),
(241, 'ZM', 'Zambia'),
(242, 'ZW', 'Zimbabwe');

-- --------------------------------------------------------

--
-- Table structure for table `ex_house_infos`
--

CREATE TABLE IF NOT EXISTS `ex_house_infos` (
  `ex_house_id` int(11) NOT NULL AUTO_INCREMENT,
  `ex_house_name` varchar(255) NOT NULL,
  `contact_no` varchar(30) NOT NULL,
  `email_id` varchar(255) NOT NULL,
  `ex_address` text NOT NULL,
  `website` varchar(255) NOT NULL,
  `country_id` int(5) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`ex_house_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `ex_house_infos`
--

INSERT INTO `ex_house_infos` (`ex_house_id`, `ex_house_name`, `contact_no`, `email_id`, `ex_address`, `website`, `country_id`, `created_date`, `update_date`) VALUES
(1, 'Singapore Exchange House', '019119151811', 'rashed@semiconbd.com', 'test', 'http://www.rashedblog.com', 0, '2015-04-05 06:39:34', '0000-00-00 00:00:00'),
(2, 'Remittance Exchange Administration Panel', '', 'info@semiconbd.com', 'Houose: 200(4th Floor), Road No: 08, Central Road Mohakhali DOHS, Dhaka-1206.', 'http://www.semiconbd.com', 0, '2015-04-09 09:51:54', '0000-00-00 00:00:00'),
(3, 'Uttara exchange House', '01911915181', 'rashed@gmail.com', 'sdfadfa', '', 0, '2015-04-11 06:42:29', '0000-00-00 00:00:00'),
(4, 'd', 'd', 'd@f', 'fgfdgf', '', 0, '2015-04-19 08:14:18', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `ex_otps`
--

CREATE TABLE IF NOT EXISTS `ex_otps` (
  `ex_otp_id` int(21) NOT NULL AUTO_INCREMENT,
  `ex_users_id` varchar(21) DEFAULT NULL,
  `otp_code` varchar(10) NOT NULL,
  `generate_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` int(1) NOT NULL COMMENT '1 = unused, 2 = used',
  `used_time` varchar(25) NOT NULL,
  PRIMARY KEY (`ex_otp_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=29 ;

--
-- Dumping data for table `ex_otps`
--

INSERT INTO `ex_otps` (`ex_otp_id`, `ex_users_id`, `otp_code`, `generate_time`, `status`, `used_time`) VALUES
(1, 'exchange', '76863', '2015-04-08 09:14:56', 2, ''),
(28, 'admin', '', '2015-04-19 06:48:44', 2, '');

-- --------------------------------------------------------

--
-- Table structure for table `ex_users`
--

CREATE TABLE IF NOT EXISTS `ex_users` (
  `ex_tbusers_id` int(11) NOT NULL AUTO_INCREMENT,
  `ex_user_id` varchar(21) NOT NULL,
  `ex_password` varchar(255) NOT NULL,
  `ex_house_info_id` int(11) NOT NULL,
  `ex_user_type` int(1) NOT NULL COMMENT '1 for administrative, 2 for exchange house, 3 for others',
  `del_status` int(1) NOT NULL COMMENT '1 for active 2 for delete',
  `last_login_ip` varchar(31) NOT NULL,
  `last_login_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`ex_tbusers_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `ex_users`
--

INSERT INTO `ex_users` (`ex_tbusers_id`, `ex_user_id`, `ex_password`, `ex_house_info_id`, `ex_user_type`, `del_status`, `last_login_ip`, `last_login_date`) VALUES
(1, 'exchange', '6ffc30aa5548fc4c7edf6b5fe615e7dd', 1, 2, 0, '192.168.1.1', '2015-04-05 10:34:16'),
(2, 'admin', '25d55ad283aa400af464c76d713c07ad', 2, 1, 0, '', '2015-04-15 11:59:37'),
(3, 'admin1', 'e10adc3949ba59abbe56e057f20f883e', 3, 2, 0, '', '2015-04-11 06:42:29'),
(4, 'd', 'e10adc3949ba59abbe56e057f20f883e', 4, 2, 0, '', '2015-04-19 08:14:18');

-- --------------------------------------------------------

--
-- Table structure for table `remitter_info`
--

CREATE TABLE IF NOT EXISTS `remitter_info` (
  `id` int(30) NOT NULL AUTO_INCREMENT,
  `civil_id` varchar(150) DEFAULT NULL,
  `tr_id` varchar(30) DEFAULT NULL,
  `name` varchar(230) DEFAULT NULL,
  `mobile_no` varchar(30) DEFAULT NULL,
  `address` varchar(230) DEFAULT NULL,
  `local_currency` varchar(20) DEFAULT NULL,
  `local_dollar` varchar(20) DEFAULT NULL,
  `dollar_rate` varchar(20) DEFAULT NULL,
  `bdt_rate` varchar(20) DEFAULT NULL,
  `taka` varchar(20) DEFAULT NULL,
  `ac_type` varchar(150) DEFAULT NULL,
  `mb_service` varchar(150) DEFAULT NULL,
  `ben_mobile` varchar(20) DEFAULT NULL,
  `cus_name` varchar(150) DEFAULT NULL,
  `response` varchar(150) DEFAULT NULL,
  `status` varchar(15) DEFAULT NULL,
  `star` varchar(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=69 ;

--
-- Dumping data for table `remitter_info`
--

INSERT INTO `remitter_info` (`id`, `civil_id`, `tr_id`, `name`, `mobile_no`, `address`, `local_currency`, `local_dollar`, `dollar_rate`, `bdt_rate`, `taka`, `ac_type`, `mb_service`, `ben_mobile`, `cus_name`, `response`, `status`, `star`) VALUES
(40, 'sas', NULL, 'asdasd', '35345345', 'asdasdas', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(41, 'sas', NULL, 'asdasd', '35345345', 'asdasdas', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(42, 'sas', NULL, 'asdasd', '35345345', 'asdasdas', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(43, 'sas', NULL, 'asdasd', '35345345', 'asdasdas', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(44, 'sas', NULL, 'asdasd', '35345345', 'asdasdas', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(45, 'sas', NULL, 'asdasd', '35345345', 'asdasdas', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(46, 'sas', NULL, 'asdasd', '35345345', 'asdasdas', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(47, 'sas', NULL, 'asdasd', '35345345', 'asdasdas', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(48, 'sas', NULL, 'asdasd', '35345345', 'asdasdas', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(49, 'sas', NULL, 'asdasd', '35345345', 'asdasdas', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(50, 'sas', NULL, 'asdasd', '35345345', 'asdasdas', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(51, 'sas', NULL, 'asdasd', '35345345', 'asdasdas', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(52, 'sas', NULL, 'asdasd', '35345345', 'asdasdas', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(53, 'sas', NULL, 'asdasd', '35345345', 'asdasdas', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(54, 'sas', NULL, 'asdasd', '35345345', 'asdasdas', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(55, 'sas', NULL, 'asdasd', '35345345', 'asdasdas', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(56, 'sas', NULL, 'asdasd', '35345345', 'asdasdas', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(57, 'sas', NULL, 'asdasd', '35345345', 'asdasdas', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(58, 'sas', NULL, 'asdasd', '35345345', 'asdasdas', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(59, 'sas', NULL, 'asdasd', '35345345', 'asdasdas', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(60, 'sas', NULL, 'asdasd', '35345345', 'asdasdas', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(61, 'sas', NULL, 'asdasd', '35345345', 'asdasdas', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(62, 'sas', '21504160000081', 'Firozz', '01756858585', 'asdasd test', '2', '1', '4', '78', '0', 'Mobile Banking Service', 'HelloCash', '01717059697', 'HelloCash Customer 2', 'You have successfully transferred Tk. 41.3 to 01717059697. Txn ID: 21504160000081', NULL, NULL),
(63, 'sas', '21504160000081', 'Firozz', '01756858585', 'asdasd test', '2', '0.533', '3.75', '77.50', '³.41.308', 'Mobile Banking Service', 'HelloCash', '01717059697', 'HelloCash Customer 2', 'You have successfully transferred Tk. 41.3 to 01717059697. Txn ID: 21504160000081', NULL, NULL),
(64, 'sas', '21504160000081', 'Firozz', '01756858585', 'asdasd test', '2', '0.533', '3.75', '77.50', '41.308', 'Mobile Banking Service', 'HelloCash', '01717059697', 'HelloCash Customer 2', 'You have successfully transferred Tk. 41.3 to 01717059697. Txn ID: 21504160000081', NULL, NULL),
(65, 'sas', '21504160000081', 'Firozz', '01756858585', 'asdasd test', '2', '0.533', '3.75', '77.50', '41.308', 'Mobile Banking Service', 'HelloCash', '01717059697', 'HelloCash Customer 2', 'You have successfully transferred Tk. 41.3 to 01717059697. Txn ID: 21504160000081', NULL, NULL),
(66, 'sas', '21504160000082', 'Firozz', '01756858585', 'asdasd test', '2', '0.533', '3.75', '77.50', '41.308', 'Mobile Banking Service', 'HelloCash', '01717059697', 'HelloCash Customer 2', 'You have successfully transferred Tk. 41.3 to 01717059697. Txn ID: 21504160000082', NULL, NULL),
(67, 'firoz43', '21504160000083', 'Firoz', '01763070743', 'riyad,sudiya', '3', '0.750', '4', '80', '60.000', 'Mobile Banking Service', 'UCash', '01920033758', 'New Customer', 'You have successfully transferred Tk. 60 to 01833333333. Txn ID: 21504160000083', NULL, NULL),
(68, 'rashed', '21504190000085', 'ddfa', '7896541223', 'dasf adsf sdfa', '2', '0.533', '3.75', '77.50', '41.308', 'Mobile Banking Service', 'HelloCash', '01911915181', 'New Customer', 'You have successfully transferred Tk. 41.3 to 01911915181. Txn ID: 21504190000085', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tmp_remitter_infos`
--

CREATE TABLE IF NOT EXISTS `tmp_remitter_infos` (
  `id` int(30) NOT NULL AUTO_INCREMENT,
  `civil_id` varchar(50) NOT NULL,
  `name` varchar(150) NOT NULL,
  `mobile_no` varchar(30) NOT NULL,
  `address` varchar(230) NOT NULL,
  `status` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `tmp_remitter_infos`
--

INSERT INTO `tmp_remitter_infos` (`id`, `civil_id`, `name`, `mobile_no`, `address`, `status`) VALUES
(13, 'sas', 'Firozz', '01756858585', 'asdasd test', NULL),
(14, 'firoz43', 'Firoz', '01763070743', 'riyad,sudiya', NULL),
(15, 'firoz58', 'firoz test', '01920033758', 'Arabiya', NULL),
(16, 'asdasd', '', '', '', NULL),
(17, 'dasas', '', '', '', NULL),
(18, 'sdfdsf', 'dsfas', '543643563465', 'asdfaf adfsasf adsfa', NULL),
(19, '1212', 'ddfa', '754675', 'safasf', NULL),
(20, '774', 'dsf', '78965', 'adsfas sdafasdf', NULL),
(21, 'rashed', 'ddfa', '7896541223', 'dasf adsf sdfa', NULL);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
