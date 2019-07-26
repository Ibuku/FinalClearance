CREATE TABLE IF NOT EXISTS `books` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `matric` varchar(45) NOT NULL,
  `name` varchar(200) NOT NULL,
  `date_borrowed` varchar(45) NOT NULL,
  `status` int(11) NOT NULL,
  `price` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `books`
--

--

CREATE TABLE IF NOT EXISTS `library_admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(45) NOT NULL,
  `password` varchar(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `library_admin`
--

INSERT INTO `library_admin` (`id`, `username`, `password`, `name`) VALUES
(1, 'library', 'library', 'Librarian');

-- --------------------------------------------------------

--
-- Table structure for table `sports`
--

CREATE TABLE IF NOT EXISTS `sports` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `matric` varchar(45) NOT NULL,
  `name` varchar(200) NOT NULL,
  `date_borrowed` varchar(45) NOT NULL,
  `status` int(11) NOT NULL,
  `price` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `sports`
--


-- --------------------------------------------------------

--
-- Table structure for table `sport_admin`
--

CREATE TABLE IF NOT EXISTS `sport_admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(45) NOT NULL,
  `password` varchar(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `sport_admin`
--

INSERT INTO `sport_admin` (`id`, `username`, `password`, `name`) VALUES
(1, 'sport', 'sport', 'Sport Adminstrator');
