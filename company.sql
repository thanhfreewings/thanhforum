-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 15, 2016 at 11:32 AM
-- Server version: 5.5.47-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `company`
--

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE IF NOT EXISTS `message` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `message` text NOT NULL,
  `created_by` int(11) NOT NULL,
  `receiver_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=38 ;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`id`, `message`, `created_by`, `receiver_id`) VALUES
(28, 'hello', 10, 11),
(29, 'hdf', 10, 11),
(30, 'fdhfdh', 11, 10),
(34, 'hi', 11, 1),
(35, 'hi', 1, 1),
(36, '7 secrets this new book can teach you about being a superboss', 1, 11),
(37, '7 secrets this new book can teach you about being a superboss', 11, 1);

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE IF NOT EXISTS `post` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `thread_id` int(11) unsigned NOT NULL,
  `content` text NOT NULL,
  `created_by` int(11) unsigned NOT NULL,
  `created_at` int(10) NOT NULL,
  `updated_at` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `created_by` (`created_by`),
  KEY `thread_id` (`thread_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id`, `thread_id`, `content`, `created_by`, `created_at`, `updated_at`) VALUES
(8, 12, 'Curious to know what got you started on this side project? :) And why favourite haha.', 1, 1457594333, NULL),
(9, 12, 'Basically the project is a challenge for myself, and I enjoyed the whole long process of trying to overcome that, which eventually made it my most favourite project', 1, 1457594366, NULL),
(10, 12, 'On the other side of the world, Supercell just posted their Y2015 financial results â€“ $924M in profits with just 3 games.', 13, 1457598096, NULL),
(11, 12, 'His first startup role was that of a â€œdata collectorâ€. Advitiya recalls:', 11, 1457598412, NULL),
(12, 1, 'like :)', 11, 1457598907, NULL),
(13, 15, 'Housing wants to bring transparency into this sector. Several real estate portals were already active by then. â€œBut none of them answered the basic needs of a house hunter. The portals used to run on paid listings', 11, 1457600134, NULL),
(14, 15, 'We wanted something better, so we built it ourselves.â€ His first startup role was that of a â€œdata collectorâ€. Advitiya recalls:', 1, 1457674423, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `thread`
--

CREATE TABLE IF NOT EXISTS `thread` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL,
  `content` text NOT NULL,
  `created_by` int(11) unsigned NOT NULL,
  `created_at` int(10) NOT NULL,
  `updated_at` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `created_by` (`created_by`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `thread`
--

INSERT INTO `thread` (`id`, `title`, `content`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'Backstory of the boy from Jammu & Kashmir who star', 'A picturesque old town with rivers, orchards, and flowers nestled against the mighty Himalayas. Thatâ€™s Jammu in Indiaâ€™s northernmost state of Jammu and Kashmir. Itâ€™s stunningly beautiful but the area is in the news almost always for the wrong reasons.\r\n\r\nPlagued by communal politics, you often hear about bomb blasts, refugee camps, and thoughtless slaughter. You read about youngsters â€“ torn between beauty and the beastly â€“ straying into terrorism, picking up AK-47 rifles, ready to kill. But the hero of this story strayed into something else altogether.\r\n\r\nMeet Advitiya Sharma, co-founder of Housing â€“ the Mumbai-based real estate portal on which Japanâ€™s SoftBank bet US$90 million. Yesterday, Advitiya left the startup he founded after a series of controversies. This is the backstory of the meteoric rise of this young entrepreneur before his denouement.\r\n\r\nHousing began as a rental search platform in Mumbai. It now offers everything from youth hostels and paying guest accommodation to new housing projects, plots of land, legal agreements online, and even home loans across 50 Indian cities. Most of all, it pioneered the use of mobile map-based technology to locate and verify the listings on its site.\r\n\r\nReal estate is often a mugâ€™s game in India, but tech-based portals like Housing are helping to change that.', 10, 1457410904, 1457598197),
(3, 'The real world outside college walls  Advitiya Sha', 'Teenager Advitiya stepped out of Jammu to a different world in Mumbai when he joined Indian Institute of Technology (IIT) Bombay to study engineering. The hustle and bustle of Indiaâ€™s financial capital, brimming with migrants, was a novel experience for him. The IIT campus with brilliant techies from all over the country became a sanctuary where he connected with several like-minded friends.\r\n\r\nIt was in the final semester at college that he got a real dose of Mumbai. He knew he would have to move out of the college hostel soon, and decided to find an apartment for rent.\r\n\r\nAlmost immediately he found an ad for a three-bedroom apartment in the Bandra area for just INR 15,000 (US$237) per month. â€œI couldnâ€™t believe my luck. Imagine, living on the same street as Bollywood movie stars. I fell for it,â€ Advitiya recalls.\r\n\r\nBandra is one of the most expensive localities in Mumbai. One-bedroom flats cost over INR 100,000 (US$1,600) per month in rent. But Advitiya had never house-hunted before, and so naively believed the real estate broker who had advertised. â€œI called up the broker. He said he had found a tenant for the apartment that very morning, but had several more such properties for rent. â€˜Come on over,â€™ he told me, and I set out to find that dream home. But, what he promised and what I saw were completely different,â€ Advitiya recalls.\r\n\r\nRun-down flats in cramped streets, musty rooms with no natural light, all atrociously expensive â€“ that was all he found after tiring days of house-hunting. And that experience turned out to be life-altering.', 11, 1457510227, 1457598352),
(12, 'Our startup journey: why we didnâ€™t raise funding', 'Everyone loves to ask this question. People at startup events, college buddies on whatsapp groups and even your co-passengers on flights. And sure, I get it. In the world littered with umpteen startups, funding reflects a certain external validation and seriousness of your venture. So nothing wrong with this question, really. But what gets on my nerves is the way the conversation goes next:\r\n\r\nI say: No, we are bootstrapped.\r\n\r\nThe guy: Uh oh. Yeah, funding is a big problem these days.\r\n\r\nWait a minute. I only said we are bootstrapped. Did it automatically imply that we failed at raising funds? Is raising funds the only way to build a startup?\r\n\r\nOf course not. There are many successful startups that bootstrapped to success including the likes of Mailchimp and GitHub. But these are heady startup days and most people equate â€œfundingâ€ with â€œsuccessâ€. In an emotional post recently, Sumanth Ragahvendra put it this way:\r\n\r\n    We no longer care about what a startup has achieved or aims to do, the problems it solves, the benefits it provides or the impact it has had. We only care about one thingâ€Šâ€”â€Šhow much funding has a startup raised. And that amount determines where you are slotted in the startup caste systemâ€¦\r\n\r\nAt SocialHelpouts, we decided to skip raising funds early on. Our product idea could be applied to many markets and we were not sure which one would work out better. And even after choosing one market i.e. startup hiring, our biggest task was to figure out what problems to solve for which segment of that market.\r\n\r\nAt an early stage, our biggest task was to choose a market, test it and find our sweet spot. Funding was not going to do it for us â€“ we had to do it ourselves.\r\n\r\nSo in last 10 months, we evaluated different markets problems and experimented with different solutions to tackle them. We played with different types of positioning and tried different ways of acquiring our users. Along the way, we launched several creative initiatives such as making event networking effortless, helping laid off employees and doing high impact hiring events such as JoinTheRocketship. These things not only helped us test different customer problems but also helped us identify our own strengths and weaknesses as a team. ', 1, 1457594288, NULL),
(13, 'This mobile game is earning $100 million every mon', 'What does mobile gaming success look like? It looks like The Legend of Mir Mobile.\r\n\r\nOn Wednesday, Shanda Games vice-chair Zhu Xiaojing announced some pretty stunning data about Shandaâ€™s highest-earning game, The Legend of Mir Mobile. The game, Zhu says, is earning between US$92 million and US$107 million each month through Tencentâ€™s mobile game platform. On its best day, The Legend of Mir Mobile brought in more than US$7 million in just 24 hours.\r\n\r\nNot bad for a game thatâ€™s 15 years old.', 1, 1457597986, NULL),
(14, 'What is The Legend of Mir?', 'To understand why this game is making so much money, you have to understand what it is and where it comes from. The Legend of Mir Mobile is a mobile version of a PC game called The Legend of Mir 2. Mir 2 is a Korean massively-multiplayer online role-playing game (MMORPG) developed by WeMade Entertainment and first published way back in 2001.\r\n\r\nMir 2 was localized and published all over the world, but it made an especially big splash in China, where it was published for the PC by Shanda Games. In 2002 and 2003 it reportedly racked up 250,000 simultaneous players in China â€“ a modest accomplishment by modern standards, but an impressive one at a time when Chinaâ€™s internet penetration was barely five percent.', 13, 1457598068, NULL),
(15, 'Feet on the street with a DSLR camera', 'Globally, India is among the top 20 real estate investment markets. In 2012, when Advitiya and his 11 friends kicked off Housing, the recorded investment volume was over INR 190 billion (US$3 billion).\r\n\r\nThatâ€™s just the tip of the iceberg. Most of the real estate dealings are done under the table. The industry in India, projected to reach US$180 billion by 2020, is murky to say the least. There is much corruption, lack of clear property title deals, and even mafia involved. Many hapless buyers often find themselves forced to play along with the wheeling-and-dealing real estate agents, who demand huge brokerage commissions.\r\n\r\nHousing wants to bring transparency into this sector. Several real estate portals were already active by then. â€œBut none of them answered the basic needs of a house hunter. The portals used to run on paid listings, and had no verified information. If there had been a portal that gave me credible information and helped me find a good apartment when I was looking for one, then I would have never started up Housing,â€ Advitiya tells Tech in Asia. â€œWe wanted something better, so we built it ourselves.â€\r\n\r\nHis first startup role was that of a â€œdata collectorâ€. Advitiya recalls:', 11, 1457598395, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `avatar` varchar(100) DEFAULT NULL,
  `password` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `avatar`, `password`) VALUES
(1, 'admin', 'admin@gmail.com', 'uploads/1457931906_cover3.jpg', '1'),
(10, 'Max', 'max', 'uploads/1457932327_user-7.jpg', '1'),
(11, 'min', 'min@gmail.com', 'uploads/1457932185_user-2.jpg', '1'),
(13, 'Min', 'min', 'uploads/1457932441_user-14.jpg', '1'),
(14, 'Cat', 'cat@gmail.com', '/assets/img/user.png', '1');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `post_ibfk_1` FOREIGN KEY (`created_by`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `post_ibfk_2` FOREIGN KEY (`thread_id`) REFERENCES `thread` (`id`);

--
-- Constraints for table `thread`
--
ALTER TABLE `thread`
  ADD CONSTRAINT `thread_ibfk_1` FOREIGN KEY (`created_by`) REFERENCES `user` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
