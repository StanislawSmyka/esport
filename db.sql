-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Czas generowania: 21 Maj 2017, 16:15
-- Wersja serwera: 10.1.16-MariaDB
-- Wersja PHP: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `db`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `passcode` varchar(256) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `admin`
--

INSERT INTO `admin` (`id`, `username`, `passcode`, `email`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'test1@gmail.com');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `comments`
--

CREATE TABLE `comments` (
  `number` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `user` varchar(30) NOT NULL,
  `comment` varchar(255) NOT NULL,
  `created` date NOT NULL,
  `ip` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `comments`
--

INSERT INTO `comments` (`number`, `id`, `user`, `comment`, `created`, `ip`) VALUES
(32, 8, 'admin', 'elo', '2017-04-11', '::1'),
(37, 8, 'admin', 'dfsfsf', '2017-04-12', '::1'),
(38, 1, 'dssad', 'asdsadsdasad', '2017-04-18', '::1'),
(39, 8, 'sdf', 'sdfsfdsfd', '2017-04-18', '::1'),
(42, 1, 'admin', 'addas', '2017-05-21', '::1');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1=Active, 0=Block'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `events`
--

INSERT INTO `events` (`id`, `title`, `date`, `created`, `modified`, `status`) VALUES
(23, 'test', '2017-05-02', '2017-05-20 21:08:13', '2017-05-20 21:08:13', 1),
(24, 'test2', '2017-05-19', '2017-05-20 21:09:04', '2017-05-20 21:09:04', 1);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `info`
--

CREATE TABLE `info` (
  `id` int(11) NOT NULL,
  `title` varchar(256) NOT NULL,
  `bodytext` varchar(2000) NOT NULL,
  `created` date NOT NULL,
  `count` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `info`
--

INSERT INTO `info` (`id`, `title`, `bodytext`, `created`, `count`) VALUES
(1, 'Congratulations to the 2016 Hearthstone World Champion: Pavel!', '2016 saw the introduction of the Hearthstone Championship Tour, Standard format, and a much higher level of competition. We saw many familiar faces, long-time competitive players come into the limelight, and innovative fresh faces burst into the scene. Ultimately, Pavel managed to prepare and pilot his decks the best to navigate through the tough sea of competitors and be our 2016 Hearthstone World Champion!', '2017-01-04', 2),
(8, 'hello', 'world', '2017-04-11', 3),
(14, 'test', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas a lacus ipsum. Nulla in ligula eu nibh mattis auctor a ac mauris. In massa odio, lobortis quis nulla eu, mattis luctus sapien. Curabitur porta lorem quis nibh ornare, non tincidunt enim varius. Phasellus sollicitudin lectus nisl, eu malesuada mauris venenatis sed. Quisque arcu sem, mollis et dolor at, venenatis dapibus magna. Nunc sit amet lacus leo. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent odio velit, egestas ut feugiat vitae, vestibulum at nunc. Nam non convallis ligula. Donec ut viverra diam. Duis ut urna eu enim mattis sollicitudin et elementum mi.\r\n\r\nDonec porttitor luctus consectetur. In hac habitasse platea dictumst. Nunc malesuada neque leo, et volutpat felis malesuada non. Vestibulum ut est nec mauris dignissim elementum. Vestibulum sed enim mauris. Etiam convallis lobortis vestibulum. Morbi semper sit amet enim sed dignissim. Etiam laoreet congue enim, sit amet mattis enim interdum sit amet. Curabitur sagittis magna et ligula auctor elementum. Vivamus pretium, eros ut posuere condimentum, mi dolor finibus nisi, id lobortis felis massa vel nibh. Duis sollicitudin vulputate mollis. Ut fermentum, turpis eu consectetur tempus, ipsum diam pulvinar tellus, ac blandit nibh nisl cursus massa. Ut placerat sem eget purus faucibus malesuada. Vestibulum maximus lacus imperdiet purus vulputate, non mattis metus auctor. Aenean ante neque, ornare quis euismod et, pharetra eu justo.\r\n\r\nAenean facilisis, nibh in mattis iaculis, lectus elit elementum justo, a convallis lorem ligula non augue. Curabitur quis nisi lacus. Duis vehicula maximus ex, non rutrum neque sagittis ac. Interdum et malesuada fames ac ante ipsum primis in faucibus. Donec convallis semper erat, id ullamcorper nisl tincidunt id. Aenean at ex nec magna posuere faucibus nec vel quam. Suspendisse iaculis risus convallis fringilla fringilla. Fusce vitae imperdiet lectus. Vestibulum sagittis, urna vitae tempus feugiat, od', '2017-04-19', 0),
(15, 'Test 3', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas a lacus ipsum. Nulla in ligula eu nibh mattis auctor a ac mauris. In massa odio, lobortis quis nulla eu, mattis luctus sapien. Curabitur porta lorem quis nibh ornare, non tincidunt enim varius. Phasellus sollicitudin lectus nisl, eu malesuada mauris venenatis sed. Quisque arcu sem, mollis et dolor at, venenatis dapibus magna. Nunc sit amet lacus leo. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent odio velit, egestas ut feugiat vitae, vestibulum at nunc. Nam non convallis ligula. Donec ut viverra diam. Duis ut urna eu enim mattis sollicitudin et elementum mi.\r\n\r\nDonec porttitor luctus consectetur. In hac habitasse platea dictumst. Nunc malesuada neque leo, et volutpat felis malesuada non. Vestibulum ut est nec mauris dignissim elementum. Vestibulum sed enim mauris. Etiam convallis lobortis vestibulum. Morbi semper sit amet enim sed dignissim. Etiam laoreet congue enim, sit amet mattis enim interdum sit amet. Curabitur sagittis magna et ligula auctor elementum. Vivamus pretium, eros ut posuere condimentum, mi dolor finibus nisi, id lobortis felis massa vel nibh. Duis sollicitudin vulputate mollis. Ut fermentum, turpis eu consectetur tempus, ipsum diam pulvinar tellus, ac blandit nibh nisl cursus massa. Ut placerat sem eget purus faucibus malesuada. Vestibulum maximus lacus imperdiet purus vulputate, non mattis metus auctor. Aenean ante neque, ornare quis euismod et, pharetra eu justo.\r\n\r\nAenean facilisis, nibh in mattis iaculis, lectus elit elementum justo, a convallis lorem ligula non augue. Curabitur quis nisi lacus. Duis vehicula maximus ex, non rutrum neque sagittis ac. Interdum et malesuada fames ac ante ipsum primis in faucibus. Donec convallis semper erat, id ullamcorper nisl tincidunt id. Aenean at ex nec magna posuere faucibus nec vel quam. Suspendisse iaculis risus convallis fringilla fringilla. Fusce vitae imperdiet lectus. Vestibulum sagittis, urna vitae tempus feugiat, od', '2017-04-19', 0),
(16, 'test4', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas a lacus ipsum. Nulla in ligula eu nibh mattis auctor a ac mauris. In massa odio, lobortis quis nulla eu, mattis luctus sapien. Curabitur porta lorem quis nibh ornare, non tincidunt enim varius. Phasellus sollicitudin lectus nisl, eu malesuada mauris venenatis sed. Quisque arcu sem, mollis et dolor at, venenatis dapibus magna. Nunc sit amet lacus leo. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent odio velit, egestas ut feugiat vitae, vestibulum at nunc. Nam non convallis ligula. Donec ut viverra diam. Duis ut urna eu enim mattis sollicitudin et elementum mi.\r\n\r\nDonec porttitor luctus consectetur. In hac habitasse platea dictumst. Nunc malesuada neque leo, et volutpat felis malesuada non. Vestibulum ut est nec mauris dignissim elementum. Vestibulum sed enim mauris. Etiam convallis lobortis vestibulum. Morbi semper sit amet enim sed dignissim. Etiam laoreet congue enim, sit amet mattis enim interdum sit amet. Curabitur sagittis magna et ligula auctor elementum. Vivamus pretium, eros ut posuere condimentum, mi dolor finibus nisi, id lobortis felis massa vel nibh. Duis sollicitudin vulputate mollis. Ut fermentum, turpis eu consectetur tempus, ipsum diam pulvinar tellus, ac blandit nibh nisl cursus massa. Ut placerat sem eget purus faucibus malesuada. Vestibulum maximus lacus imperdiet purus vulputate, non mattis metus auctor. Aenean ante neque, ornare quis euismod et, pharetra eu justo.\r\n\r\nAenean facilisis, nibh in mattis iaculis, lectus elit elementum justo, a convallis lorem ligula non augue. Curabitur quis nisi lacus. Duis vehicula maximus ex, non rutrum neque sagittis ac. Interdum et malesuada fames ac ante ipsum primis in faucibus. Donec convallis semper erat, id ullamcorper nisl tincidunt id. Aenean at ex nec magna posuere faucibus nec vel quam. Suspendisse iaculis risus convallis fringilla fringilla. Fusce vitae imperdiet lectus. Vestibulum sagittis, urna vitae tempus feugiat, od', '2017-04-19', 0);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `links`
--

CREATE TABLE `links` (
  `id` int(11) NOT NULL,
  `link_lol` varchar(255) NOT NULL,
  `link_hs` varchar(255) NOT NULL,
  `link_csgo` varchar(255) NOT NULL,
  `link_hots` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `links`
--

INSERT INTO `links` (`id`, `link_lol`, `link_hs`, `link_csgo`, `link_hots`) VALUES
(2, 'https://www.youtube.com/embed/Zq7Linjywzs?wmode=transparent', 'https://www.youtube.com/embed/TadaR5cZy8I?wmode=transparent', 'https://www.youtube.com/embed/01qaUdD6cgg?wmode=transparent', 'https://www.youtube.com//embed/czIhN7dhgxU?wmode=transparent');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `streams`
--

CREATE TABLE `streams` (
  `id` int(11) NOT NULL,
  `game` varchar(255) NOT NULL,
  `channelname` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `streams`
--

INSERT INTO `streams` (`id`, `game`, `channelname`) VALUES
(1, 'League of Legends', 'riotgames'),
(2, 'Hearthstone', 'forsenlol'),
(3, 'CS:GO', 'esl_csgo'),
(4, 'Heroes of the Storm', 'blizzheroes');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `passcode` varchar(256) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `user`
--

INSERT INTO `user` (`id`, `username`, `passcode`, `email`) VALUES
(1, 'test', '098f6bcd4621d373cade4e832627b4f6', 'test@gmail.com');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`number`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `info`
--
ALTER TABLE `info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `links`
--
ALTER TABLE `links`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `streams`
--
ALTER TABLE `streams`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `comments`
--
ALTER TABLE `comments`
  MODIFY `number` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
--
-- AUTO_INCREMENT dla tabeli `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT dla tabeli `info`
--
ALTER TABLE `info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT dla tabeli `links`
--
ALTER TABLE `links`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT dla tabeli `streams`
--
ALTER TABLE `streams`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT dla tabeli `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
