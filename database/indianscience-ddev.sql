-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 29, 2026 at 05:21 AM
-- Server version: 5.7.23-23
-- PHP Version: 8.1.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `a1673gvs_indian_science_reports`
--

-- --------------------------------------------------------

--
-- Table structure for table `concepts`
--

DROP TABLE IF EXISTS `concepts`;
CREATE TABLE IF NOT EXISTS `concepts` (
  `inst` varchar(94) NOT NULL,
  `concept` varchar(80) NOT NULL,
  `TC` int(5) DEFAULT NULL,
  `freq` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `external`
--

DROP TABLE IF EXISTS `external`;
CREATE TABLE IF NOT EXISTS `external` (
  `grid` varchar(20) NOT NULL,
  `info` text,
  `wiki_link` text NOT NULL,
  `est_year` int(5) NOT NULL,
  `inst_type` varchar(10) NOT NULL,
  `arwu` varchar(15) DEFAULT NULL,
  `the` varchar(15) DEFAULT NULL,
  `qs` varchar(15) DEFAULT NULL,
  `leiden` varchar(15) DEFAULT NULL,
  `nirf` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `indian_grant_agencies`
--

DROP TABLE IF EXISTS `indian_grant_agencies`;
CREATE TABLE IF NOT EXISTS `indian_grant_agencies` (
  `grid` varchar(20) NOT NULL,
  `agency` varchar(200) NOT NULL,
  `amount` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='Stores the indian grant agencies data. Grants table 1.';

-- --------------------------------------------------------

--
-- Table structure for table `institutes`
--

DROP TABLE IF EXISTS `institutes`;
CREATE TABLE IF NOT EXISTS `institutes` (
  `grid` varchar(20) NOT NULL,
  `name` varchar(200) NOT NULL,
  `seq_no` int(11) NOT NULL,
  `pub_count` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `inter_grant_agencies`
--

DROP TABLE IF EXISTS `inter_grant_agencies`;
CREATE TABLE IF NOT EXISTS `inter_grant_agencies` (
  `grid` varchar(20) NOT NULL,
  `agency` varchar(200) NOT NULL,
  `amount` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='Stores the international grant agencies data. Grants table 2';

-- --------------------------------------------------------

--
-- Table structure for table `key_indicators`
--

DROP TABLE IF EXISTS `key_indicators`;
CREATE TABLE IF NOT EXISTS `key_indicators` (
  `grid` varchar(13) NOT NULL,
  `tp` int(5) DEFAULT NULL,
  `tc` int(6) DEFAULT NULL,
  `cpp` decimal(5,2) DEFAULT NULL,
  `h-index` int(3) DEFAULT NULL,
  `g-index` int(3) DEFAULT NULL,
  `x index` int(3) DEFAULT NULL,
  `x(g) index` int(3) DEFAULT NULL,
  `icp` decimal(5,2) DEFAULT NULL,
  `male-total` decimal(5,2) DEFAULT NULL,
  `female_total` decimal(5,2) DEFAULT NULL,
  `total oa prop` decimal(5,2) DEFAULT NULL,
  `twitter_coverage%` decimal(5,2) DEFAULT NULL,
  `fb_coverage%` decimal(5,2) DEFAULT NULL,
  `mendeley_coverage%` decimal(5,2) DEFAULT NULL,
  `tweets_per_paper` decimal(5,2) DEFAULT NULL,
  `fb_per_paper` decimal(5,2) DEFAULT NULL,
  `mendeley_per_paper` decimal(5,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `publications`
--

DROP TABLE IF EXISTS `publications`;
CREATE TABLE IF NOT EXISTS `publications` (
  `b_id` int(3) NOT NULL,
  `title` varchar(156) DEFAULT NULL,
  `authors` varchar(149) DEFAULT NULL,
  `journal` varchar(107) DEFAULT NULL,
  `web_link` varchar(103) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `sub_wise_research_output`
--

DROP TABLE IF EXISTS `sub_wise_research_output`;
CREATE TABLE IF NOT EXISTS `sub_wise_research_output` (
  `grid` varchar(20) NOT NULL,
  `sub1` int(11) NOT NULL,
  `sub2` int(11) NOT NULL,
  `sub3` int(11) NOT NULL,
  `sub4` int(11) NOT NULL,
  `sub5` int(11) NOT NULL,
  `sub6` int(11) NOT NULL,
  `sub7` int(11) NOT NULL,
  `sub8` int(11) NOT NULL,
  `sub9` int(11) NOT NULL,
  `sub10` int(11) NOT NULL,
  `sub11` int(11) NOT NULL,
  `sub12` int(11) NOT NULL,
  `sub13` int(11) NOT NULL,
  `sub14` int(11) NOT NULL,
  `sub15` int(11) NOT NULL,
  `sub16` int(11) NOT NULL,
  `sub17` int(11) NOT NULL,
  `sub18` int(11) NOT NULL,
  `sub19` int(11) NOT NULL,
  `sub20` int(11) NOT NULL,
  `sub21` int(11) NOT NULL,
  `sub22` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='Stores the subject-area-wise publications data. Research_Output Chart 2';

-- --------------------------------------------------------

--
-- Table structure for table `textajfo_indian_science_reports`
--

DROP TABLE IF EXISTS `textajfo_indian_science_reports`;
CREATE TABLE IF NOT EXISTS `textajfo_indian_science_reports` (
  `COL 1` varchar(94) COLLATE utf8_unicode_ci DEFAULT NULL,
  `COL 2` varchar(13641) COLLATE utf8_unicode_ci DEFAULT NULL,
  `COL 3` varchar(149) COLLATE utf8_unicode_ci DEFAULT NULL,
  `COL 4` varchar(107) COLLATE utf8_unicode_ci DEFAULT NULL,
  `COL 5` varchar(103) COLLATE utf8_unicode_ci DEFAULT NULL,
  `COL 6` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `COL 7` varchar(13) COLLATE utf8_unicode_ci DEFAULT NULL,
  `COL 8` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `COL 9` varchar(13) COLLATE utf8_unicode_ci DEFAULT NULL,
  `COL 10` varchar(21) COLLATE utf8_unicode_ci DEFAULT NULL,
  `COL 11` varchar(13) COLLATE utf8_unicode_ci DEFAULT NULL,
  `COL 12` varchar(21) COLLATE utf8_unicode_ci DEFAULT NULL,
  `COL 13` varchar(17) COLLATE utf8_unicode_ci DEFAULT NULL,
  `COL 14` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `COL 15` varchar(18) COLLATE utf8_unicode_ci DEFAULT NULL,
  `COL 16` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `COL 17` varchar(13) COLLATE utf8_unicode_ci DEFAULT NULL,
  `COL 18` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `COL 19` varchar(13) COLLATE utf8_unicode_ci DEFAULT NULL,
  `COL 20` varchar(21) COLLATE utf8_unicode_ci DEFAULT NULL,
  `COL 21` varchar(13) COLLATE utf8_unicode_ci DEFAULT NULL,
  `COL 22` varchar(8) COLLATE utf8_unicode_ci DEFAULT NULL,
  `COL 23` varchar(5) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `top_10_collaborators`
--

DROP TABLE IF EXISTS `top_10_collaborators`;
CREATE TABLE IF NOT EXISTS `top_10_collaborators` (
  `grid` varchar(13) NOT NULL,
  `C1` varchar(14) DEFAULT NULL,
  `P1` int(4) DEFAULT NULL,
  `C2` varchar(20) DEFAULT NULL,
  `P2` int(4) DEFAULT NULL,
  `C3` varchar(20) DEFAULT NULL,
  `P3` int(4) DEFAULT NULL,
  `C4` varchar(20) DEFAULT NULL,
  `P4` int(4) DEFAULT NULL,
  `C5` varchar(21) DEFAULT NULL,
  `P5` int(4) DEFAULT NULL,
  `C6` varchar(21) DEFAULT NULL,
  `P6` int(4) DEFAULT NULL,
  `C7` varchar(32) DEFAULT NULL,
  `P7` int(4) DEFAULT NULL,
  `C8` varchar(20) DEFAULT NULL,
  `P8` int(4) DEFAULT NULL,
  `C9` varchar(20) DEFAULT NULL,
  `P9` int(4) DEFAULT NULL,
  `C10` varchar(21) DEFAULT NULL,
  `P10` varchar(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `year_wise_altmetric_coverage`
--

DROP TABLE IF EXISTS `year_wise_altmetric_coverage`;
CREATE TABLE IF NOT EXISTS `year_wise_altmetric_coverage` (
  `grid` varchar(20) NOT NULL,
  `name` varchar(200) DEFAULT NULL,
  `2010` decimal(5,2) DEFAULT NULL,
  `2011` decimal(5,2) DEFAULT NULL,
  `2012` decimal(5,2) DEFAULT NULL,
  `2013` decimal(5,2) DEFAULT NULL,
  `2014` decimal(5,2) DEFAULT NULL,
  `2015` decimal(5,2) DEFAULT NULL,
  `2016` decimal(5,2) DEFAULT NULL,
  `2017` decimal(5,2) DEFAULT NULL,
  `2018` decimal(5,2) DEFAULT NULL,
  `2019` decimal(5,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `year_wise_auth_type`
--

DROP TABLE IF EXISTS `year_wise_auth_type`;
CREATE TABLE IF NOT EXISTS `year_wise_auth_type` (
  `grid` varchar(20) NOT NULL,
  `year` year(4) NOT NULL,
  `auth_1` decimal(5,2) NOT NULL,
  `auth_2` decimal(5,2) NOT NULL,
  `auth_3` decimal(5,2) NOT NULL,
  `auth_4` decimal(5,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='Stores the year-wise author type data. Author chart 1';

-- --------------------------------------------------------

--
-- Table structure for table `year_wise_cited_percent`
--

DROP TABLE IF EXISTS `year_wise_cited_percent`;
CREATE TABLE IF NOT EXISTS `year_wise_cited_percent` (
  `grid` varchar(20) NOT NULL,
  `cit_2010` decimal(5,2) NOT NULL,
  `cit_2011` decimal(5,2) NOT NULL,
  `cit_2012` decimal(5,2) NOT NULL,
  `cit_2013` decimal(5,2) NOT NULL,
  `cit_2014` decimal(5,2) NOT NULL,
  `cit_2015` decimal(5,2) NOT NULL,
  `cit_2016` decimal(5,2) NOT NULL,
  `cit_2017` decimal(5,2) NOT NULL,
  `cit_2018` decimal(5,2) NOT NULL,
  `cit_2019` decimal(5,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='Stores the year-wise cited percentage. Research_Output Chart 3';

-- --------------------------------------------------------

--
-- Table structure for table `year_wise_collab_type`
--

DROP TABLE IF EXISTS `year_wise_collab_type`;
CREATE TABLE IF NOT EXISTS `year_wise_collab_type` (
  `grid` varchar(13) NOT NULL,
  `year` int(4) NOT NULL,
  `inter` varchar(4) DEFAULT NULL,
  `dom_single` varchar(4) DEFAULT NULL,
  `dom_multi` varchar(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `year_wise_gender`
--

DROP TABLE IF EXISTS `year_wise_gender`;
CREATE TABLE IF NOT EXISTS `year_wise_gender` (
  `grid` varchar(20) NOT NULL,
  `year` year(4) NOT NULL,
  `male` decimal(5,2) NOT NULL,
  `female` decimal(5,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='Stores the year-wise male vs female authored publication proportion data. Gender chart 1';

-- --------------------------------------------------------

--
-- Table structure for table `year_wise_grants`
--

DROP TABLE IF EXISTS `year_wise_grants`;
CREATE TABLE IF NOT EXISTS `year_wise_grants` (
  `grid` varchar(13) NOT NULL,
  `fund_2010` varchar(9) DEFAULT NULL,
  `grant_no_2010` varchar(13) DEFAULT NULL,
  `fund_2011` varchar(9) DEFAULT NULL,
  `grant_no_2011` varchar(13) DEFAULT NULL,
  `fund_2012` varchar(9) DEFAULT NULL,
  `grant_no_2012` varchar(13) DEFAULT NULL,
  `fund_2013` varchar(9) DEFAULT NULL,
  `grant_no_2013` varchar(13) DEFAULT NULL,
  `fund_2014` varchar(9) DEFAULT NULL,
  `grant_no_2014` varchar(13) DEFAULT NULL,
  `fund_2015` varchar(9) DEFAULT NULL,
  `grant_no_2015` varchar(13) DEFAULT NULL,
  `fund_2016` varchar(9) DEFAULT NULL,
  `grant_no_2016` varchar(13) DEFAULT NULL,
  `fund_2017` varchar(9) DEFAULT NULL,
  `grant_no_2017` varchar(13) DEFAULT NULL,
  `fund_2018` varchar(9) DEFAULT NULL,
  `grant_no_2018` varchar(13) DEFAULT NULL,
  `fund_2019` varchar(9) DEFAULT NULL,
  `grant_no_2019` varchar(13) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `year_wise_oa_prop`
--

DROP TABLE IF EXISTS `year_wise_oa_prop`;
CREATE TABLE IF NOT EXISTS `year_wise_oa_prop` (
  `grid` varchar(20) NOT NULL,
  `year` year(4) NOT NULL,
  `closed` decimal(5,2) NOT NULL,
  `open` decimal(5,2) NOT NULL,
  `gold` decimal(5,2) NOT NULL,
  `hybrid` decimal(5,2) NOT NULL,
  `green` decimal(5,2) NOT NULL,
  `bronze` decimal(5,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='Stores the year-wise Open Access data. OA charts 1-2';

-- --------------------------------------------------------

--
-- Table structure for table `year_wise_pub_cit`
--

DROP TABLE IF EXISTS `year_wise_pub_cit`;
CREATE TABLE IF NOT EXISTS `year_wise_pub_cit` (
  `grid` varchar(20) NOT NULL,
  `cagr_pub` decimal(5,2) NOT NULL,
  `pub_2010` int(11) NOT NULL,
  `pub_2011` int(11) NOT NULL,
  `pub_2012` int(11) NOT NULL,
  `pub_2013` int(11) NOT NULL,
  `pub_2014` int(11) NOT NULL,
  `pub_2015` int(11) NOT NULL,
  `pub_2016` int(11) NOT NULL,
  `pub_2017` int(11) NOT NULL,
  `pub_2018` int(11) NOT NULL,
  `pub_2019` int(11) NOT NULL,
  `cit_2010` int(11) NOT NULL,
  `cit_2011` int(11) NOT NULL,
  `cit_2012` int(11) NOT NULL,
  `cit_2013` int(11) NOT NULL,
  `cit_2014` int(11) NOT NULL,
  `cit_2015` int(11) NOT NULL,
  `cit_2016` int(11) NOT NULL,
  `cit_2017` int(11) NOT NULL,
  `cit_2018` int(11) NOT NULL,
  `cit_2019` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='Stores the year-wise publications and citations data. Research_Output Chart 1';

-- --------------------------------------------------------

--
-- Table structure for table `year_wise_sdg`
--

DROP TABLE IF EXISTS `year_wise_sdg`;
CREATE TABLE IF NOT EXISTS `year_wise_sdg` (
  `grid` varchar(13) NOT NULL,
  `year` int(4) NOT NULL,
  `SDG1` int(1) DEFAULT NULL,
  `SDG2` int(2) DEFAULT NULL,
  `SDG3` int(3) DEFAULT NULL,
  `SDG4` int(2) DEFAULT NULL,
  `SDG5` int(1) DEFAULT NULL,
  `SDG6` int(2) DEFAULT NULL,
  `SDG7` int(3) DEFAULT NULL,
  `SDG8` int(2) DEFAULT NULL,
  `SDG9` int(1) DEFAULT NULL,
  `SDG10` int(2) DEFAULT NULL,
  `SDG11` int(2) DEFAULT NULL,
  `SDG12` int(2) DEFAULT NULL,
  `SDG13` int(3) DEFAULT NULL,
  `SDG14` int(1) DEFAULT NULL,
  `SDG15` int(2) DEFAULT NULL,
  `SDG16` int(2) DEFAULT NULL,
  `SDG17` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `year_wise_sdg_table`
--

DROP TABLE IF EXISTS `year_wise_sdg_table`;
CREATE TABLE IF NOT EXISTS `year_wise_sdg_table` (
  `grid` varchar(13) NOT NULL,
  `SDG` int(5) NOT NULL,
  `2010` int(2) DEFAULT NULL,
  `2011` int(2) DEFAULT NULL,
  `2012` int(2) DEFAULT NULL,
  `2013` int(3) DEFAULT NULL,
  `2014` int(3) DEFAULT NULL,
  `2015` int(3) DEFAULT NULL,
  `2016` int(3) DEFAULT NULL,
  `2017` int(3) DEFAULT NULL,
  `2018` int(3) DEFAULT NULL,
  `2019` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
