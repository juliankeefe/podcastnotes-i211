-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 13, 2017 at 12:26 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `podcast_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `podcast`
--

CREATE TABLE `podcast` (
  `id` int(11) NOT NULL,
  `title` varchar(70) CHARACTER SET swe7 NOT NULL,
  `category` int(50) NOT NULL,
  `image` varchar(250) CHARACTER SET swe7 NOT NULL,
  `description` varchar(2000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `podcast`
--

INSERT INTO `podcast` (`id`, `title`, `category`, `image`, `description`) VALUES
(1, 'S-Town', 1, 'https://static.independent.co.uk/s3fs-public/styles/article_small/public/thumbnails/image/2017/03/29/15/s-town.jpg', 'S-Town is a new podcast from Serial and This American Life, hosted by Brian Reed, about a man named John who despises his Alabama town and decides to do something about it. He asks Brian to investigate the son of a wealthy family who''s allegedly been bragging that he got away with murder. But when someone else ends up dead, the search for the truth leads to a nasty feud, a hunt for hidden treasure, and an unearthing of the mysteries of one man''s life.\r\n'),
(2, 'The Joe Rogan Experience', 2, 'http://cloudfront.assets.stitcher.com/feedimagesplain328/13180.jpg', 'From comedian, UFC commentator and TV host, Joe Rogan. "The Joe Rogan Experience" is a long form, in-depth conversation with the best guests from the comedy world, the sports world, the science world and everything between. One of the most popular comedy podcasts, this show has something for everyone. Available on demand in Stitcher''s Comedy station.'),
(3, 'Radiolab', 3, 'http://cloudfront.assets.stitcher.com/feedimagesplain328/5459.jpg', 'Inspiring curiosity. Each episode of the Radiolab podcast is a patchwork of people, sounds, stories, society and experiences. Hosted by Jad Abumrad and Robert Krulwich, Radiolab is produced & made available on demand by WNYC public radio.'),
(4, 'True Crime Garage', 1, 'https://meaningbeyondwords.files.wordpress.com/2016/06/img_3385.jpg', 'ach week Nic & The Captain get in the garage and talk true crime and drink beer.'),
(5, 'Freakonomics Radio', 1, 'http://media.npr.org/images/podcasts/primary/icon_452538045-e6443cfc66e61bc69c7604ba05cd9c757152c10c-s300-c85.png', 'inspired by the books of the same name, Freakonomics Radio is hosted by Stephen Dubner, with co-author Steve Levitt. An award-winning podcast exploring "the hidden side of everything". From the economy, headline news to pop culture. Available weekly on demand from WNYC Public Radio.'),
(6, 'Planet Money', 5, 'https://upload.wikimedia.org/wikipedia/en/c/c7/NPR_Planet_Money_cover_art.jpg', 'Helping you make sense of our rapidly changing global economy. NPR''s Planet Money highlights high rollers, brainy economists and financial experts to keep you up to date on the fiscal world. Money makes the world go around, so listen on demand with two podcast episodes each week.'),
(7, 'Wait Wait... Don''t Tell Me!', 6, 'http://cloudfront.assets.stitcher.com/feedimagesplain328/4820.jpg', 'NPR''s weekly radio quiz show. Test your knowledge alongside some of the celebrity panelists made up of the best and brightest in the news and entertainment world. Have fun keeping up with current events. Hosted by Peter Sagal & Carl Kasell. Podcast episodes available on demand each Saturday.'),
(8, 'Real Time with Bill Maher', 2, 'http://glossynews.com/wp-content/uploads/2013/10/bill-maher-overtime-post-show2.jpg', 'HBO''s popular television show Real Time with Bill Maher for listening in on demand podcast format. The always outspoken Maher is known for his political satire and sociopolitical commentary, which targets a wide swath of topics including religion, politics, the mass media, and more.'),
(9, 'My Favorite Murder with Karen Kilgariff and Georgia Hardstark', 2, 'http://www.feralaudio.com/wp-content/themes/feral-audio-2/shows/artwork400/427.jpg', 'Ready yourself for a murder adventure hosted by Karen Kilgariff and Georgia Hardstark, two lifelong fans of true crime stories. Each episode the girls tell each other their favorite tales of murder, and hear hometown crime stories from friends and fans. Check your anxiety at the door, cause Karen & Georgia are dying to discuss death.'),
(10, 'Hidden Brain\r\n', 3, 'http://bakerartist.org/sites/default/files/migration/hidden-brain-logo-2015.png', 'The Hidden Brain helps curious people understand the world – and themselves. Using science and storytelling, Hidden Brain''s host Shankar Vedantam reveals the unconscious patterns that drive human behavior, the biases that shape our choices, and the triggers that direct the course of our relationships.'),
(13, 'Pulse of the Planet Podcast ', 3, 'http://cloudfront.assets.stitcher.com/feedimagesplain328/79607.jpg', 'Each weekday, Pulse of the Planet provides its listeners with a two-minute sound portrait of Planet Earth, tracking the rhythms of nature, culture and science worldwide and blending interviews and extraordinary natural sound.\r\n'),
(14, 'MSNBC Rachel Maddow (audio)', 4, 'http://cloudfront.assets.stitcher.com/feedimagesplain328/6602.jpg', 'Take MSNBC''s popular Rachel Maddow Show with you on the go. Listen to full episodes of the television show on demand daily. The MSNBC podcast takes an intelligent and thought provoking look at politics, pop culture, and top news. Hosted by political commentator Rachel Maddow.'),
(15, 'Ask Me Another', 6, 'http://media.npr.org/assets/img/2015/04/06/askmeanother_sq-ed74d1b32e360a54992e327bf3620365f7d80df7-s300-c85.jpg', 'Ask Me Another brings the lively spirit and healthy competition of your favorite trivia night right to your ears. With a rotating cast of funny people, puzzle writers and VIP guests, it features the wit of host Ophira Eisenberg, the music of house musician Jonathan Coulton, and rambunctious trivia games, all played in front of a live audience.'),
(16, 'The Moth\r\n', 7, 'http://mediad.publicbroadcasting.net/p/kwgs/files/201507/moth_logo_cover2_0.jpg', 'The Moth is an acclaimed not-for-profit organization dedicated to the art and craft of storytelling. Moth shows are renowned for the great range of human & social experiences they showcase. Each week, The Moth podcast features the best of the stories told live from Moth stages across the country and delivers them in this beautiful radio program, available on demand in Stitcher''s Society & Culture station.'),
(17, 'Stuff You Should Know', 8, 'http://cloudfront.assets.stitcher.com/feedimagesplain328/7183.jpg', 'Join Josh Clark and Chuck Bryant as they get to the bottom of odd questions, like how Twinkies work and if zombies exist. Listen to Stuff You Should Know on demand to enjoy this fascinating biweekly podcast from the HowStuffWorks team. A unique dose of education and entertainment.'),
(18, 'A Way with Words', 8, 'http://mediad.publicbroadcasting.net/p/kunr/files/AWWW.jpg', 'A Way with Words is a fun and funny radio show and podcast about language. Co-hosts Martha Barnette and Grant Barrett talk with callers from around the world about linguistics, slang, jokes, riddles, word games, grammar, old sayings, word origins, regional dialects, family expressions, and speaking and writing well. Email your language questions for the show to words@waywordradio.org. Or call with your questions toll-free *any* time in the U.S. and Canada at (877) 929-9673. From anywhere in the world: (619) 800-4443. Hear all past shows for free: http://waywordradio.org/. Also on Twitter at http://twitter.com/wayword.'),
(19, '99% Invisible', 1, 'http://cloudfront.assets.stitcher.com/feedimagesplain328/16374.jpg', 'Design is everywhere in our lives, perhaps most importantly in the places where we’ve just stopped noticing. 99% Invisible is a weekly exploration of the process and power of design and architecture. From award winning producer Roman Mars. Learn more at 99percentinvisible.org. A proud member of Radiotopia, from PRX. Learn more at radiotopia.fm.'),
(20, 'Stuff To Blow Your Mind', 3, 'http://cloudfront.assets.stitcher.com/feedimagesplain328/11623.jpg', 'Prepare for a trip down the rabbit hole as Robert Lamb and Julie Douglas lead you on a scientific journey to the very limits of human understanding. “Stuff to Blow Your Mind” examines neurological quandaries, cosmic mysteries, evolutionary marvels and the technological advances. This shocking and fun podcast from the HowStuffWorks team is available on demand your listening pleasure.');

-- --------------------------------------------------------

--
-- Table structure for table `podcast_categories`
--

CREATE TABLE `podcast_categories` (
  `category_id` int(22) NOT NULL,
  `category` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `podcast_categories`
--

INSERT INTO `podcast_categories` (`category_id`, `category`) VALUES
(1, 'Society & Culture'),
(2, 'Comedy'),
(3, 'Science & Medicine'),
(4, 'News & Politics'),
(5, 'Business'),
(6, 'Games & Hobbies'),
(7, 'Storytelling'),
(8, 'Education');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `firstname` text NOT NULL,
  `lastname` text NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `podcast`
--
ALTER TABLE `podcast`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `podcast_categories`
--
ALTER TABLE `podcast_categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `podcast`
--
ALTER TABLE `podcast`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `podcast_categories`
--
ALTER TABLE `podcast_categories`
  MODIFY `category_id` int(22) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
