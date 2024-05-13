-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 13, 2024 at 02:45 PM
-- Server version: 10.11.6-MariaDB-0+deb12u1
-- PHP Version: 8.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog_posts`
--

-- --------------------------------------------------------

--
-- Table structure for table `authors`
--

CREATE TABLE `authors` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL,
  `introduction` text NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `website` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `authors`
--

INSERT INTO `authors` (`id`, `name`, `introduction`, `email`, `phone`, `website`) VALUES
(1, 'Mari Maasikas ', 'Mari on blogimisega tegelenud 7 aastat. Tal on tumedad juuksed.', 'mari.maasikas@maasikas.ee ', '5566757', 'www.maasikas.ee'),
(2, 'Jüri Mustikas ', 'Jüri on keskmine eesti mees. Ta on blogimisega tegelenud 4 aastat. Tal on lokkis juuksed.', 'juri.mustikas@mustikas.ee ', '52366757', 'www.mustikas.ee'),
(3, 'Ott Vaarikas ', 'Ott on sahtlisse kirjutamisega tegelenud 17 aastat. Tal on peas vähe juukseid.', 'ott.vaarikas@vaarikas.ee ', '55666457', 'www.vaarikas.ee'),
(4, 'Mia Maria', 'Olen alles väike. ', 'mia@maria.com', '55776644', 'www.miamaria.com');

-- --------------------------------------------------------

--
-- Table structure for table `table1_posts`
--

CREATE TABLE `table1_posts` (
  `id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `author` varchar(50) NOT NULL,
  `content` text NOT NULL,
  `img_link` text NOT NULL,
  `added` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `author_id` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `table1_posts`
--

INSERT INTO `table1_posts` (`id`, `title`, `author`, `content`, `img_link`, `added`, `modified`, `author_id`) VALUES
(1, 'Esimene postitus ', 'Mari Maasikas ', 'Lorem ipsum lorem ipsum', 'https://images.pexels.com/photos/349758/hummingbird-bird-birds-349758.jpeg?auto=compress&cs=tinysrgb&w=600', '2021-10-08 09:53:13', '2021-10-08 19:53:13', NULL),
(2, 'Teine postitus ', 'Mari Maasikas ', 'Lorem ipsum lorem ipsum', 'https://images.pexels.com/photos/1661179/pexels-photo-1661179.jpeg?auto=compress&cs=tinysrgb&w=600', '2021-10-08 09:53:13', '2021-10-11 19:53:13', NULL),
(3, 'Kolmas postitus ', 'Ott Vaarikas ', 'Lorem ipsum lorem ipsum', 'https://images.pexels.com/photos/349758/hummingbird-bird-birds-349758.jpeg?auto=compress&cs=tinysrgb&w=600', '2021-09-08 09:53:13', '2021-11-08 19:53:13', NULL),
(4, 'Teine postitus ', 'Mari Maasikas ', 'Lorem ipsum lorem ipsum', 'https://images.pexels.com/photos/1661179/pexels-photo-1661179.jpeg?auto=compress&cs=tinysrgb&w=600', '2021-10-10 09:53:13', '2021-10-11 19:53:13', NULL),
(6, 'Kanad hakkavad munele', 'Mari Maasikas', 'Munakanad hakkavad tavaliselt munema umbes 18 nädala vanuselt ning neid peetakse farmides 2-3 aastat, sest iga aastaga väheneb munade tootlus.[2] Kanad munevad päevas ühe muna ning nende reproduktiivsüsteemi eripärast võib mõni päev vahele jääda. Peale munemist võtab uue muna valmimine aega 26 tundi. [3] Munemiseks on väga oluline päevavalgus, mida vajatakse vähemalt 14 tundi. Noored kanad munevad keskmiselt 270 muna aastas, aga kui kanad on vanemad kui 2 aastat, võivad nad muneda kuni kaks korda nädalas. ', 'NULL', '2024-04-25 22:18:21', '2024-04-25 22:18:21', NULL),
(7, 'Erinevad haneliigid', 'Ott Vaarikas', 'Partlaste sugukonda kuulub kolm alamsugukonda: harakhanilased, kuhu kuulub üksainus liik, hanilased ja partlased[1]. Hanilaste alamsugukonna suurim perekond ongi hani, aga sinna kuuluvad ka perekonnad luik, lagle, ogahani, tuhkhani ja vaaraohani[2].\r\n\r\nLumehane (Chen), keiserhane (Philacte), stepihane (Cygnopsis) ja vööthane (Eulabeia) käsitletakse ka eraldi perekondadena.\r\n\r\nTänapäeval elab maailmas kümmekond liiki hanesid. Kõige suurem neist on hallhani, kes kaalub 2,5–4,1 kg, kõige väiksem Rossi hani, kes kaalub 1,2–1,6 kg. Kõigil hanedel on jalad ja varbad roosad või oranžid ning nokk on roosa, oranž või must. Kõigil on kõhu- ja sabaalune valge või vähemalt väge hele ja paljudel on peas valget. Kael, keha ja tiivad on hallid, harvem valged, hoosuled osaliselt või täielikult mustad. Lagledest erinevad haned selle poolest, et lagledel on mustad jalad ja nende sulestik on üldiselt tumedam. ', 'https://upload.wikimedia.org/wikipedia/commons/7/72/Anser_anser_2_%28Piotr_Kuczynski%29.jpg', '2024-04-25 23:10:57', '2024-04-25 23:10:57', NULL),
(8, 'Väike-laukhani', 'Jüri Juurikas', 'Valge lauba ja mustade kõhuvöötidega hani sarnaneb väga suur-laukhanega. Nokk on lühike, kolmnurkse kuju ja sügavroosa värvusega. Väike-laukhane tiivad on pikad ja tiivaotsad ulatuvad seisval linnul üsna selgesti üle saba serva, suur-laukhanel on tiivaotsad sabaga ühepikkused. Jalad on oranžid. Kõige parem tunnus määramiseks on erekollane rõngas ümber silma. Pea ja kaela ülaosa on väike-laukhanel tume hallikaspruun. Kaela alaosa ja rind on veidi heledamad. Kõhul esinevad tumedad laigud on erineva suurusega. Selg on tumepruun, aga siiski mitte nii tume kui pea ja kaela ülaosa.            ', 'https://upload.wikimedia.org/wikipedia/commons/thumb/9/97/Anser_erythropus.jpg/800px-Anser_erythropus.jpg', '2024-04-25 23:23:24', '2024-04-25 23:23:24', NULL),
(9, 'Lääne-pöialpoiss', 'Kusti Kaalikas', 'Lääne-pöialpoiss (Regulus ignicapillus) on põõsalindlaste sugukonda kuuluv lind. Eestis on ta eksikülaline. Tavaline pöialpoiss on levinud katkelisel areaalil kogu parasvöötme Euraasias Assooridelt, Briti saartelt ja Norrast kuni Sahhalini ja Jaapanini. Eestis on pöialpoiss tavaline lind, tema pesitsusaegset arvukust hinnatakse 300 000 – 400 000 paarile, talvist arvukust 200 000 – 600 000 isendile[3]. ', 'https://upload.wikimedia.org/wikipedia/commons/thumb/0/08/Regulus_ignicapilla_Arundel.jpg/220px-Regulus_ignicapilla_Arundel.jpg', '2024-05-07 11:53:19', '2024-05-07 11:53:19', NULL),
(13, 'Kanad hakkavad munele', 'Kusti Kaalikas', 'Some quick example text to build on the card title and make up the bulk of the card\'s content.', 'https://upload.wikimedia.org/wikipedia/commons/2/23/Grus_grus_2_%28Marek_Szczepanek%29.jpg', '2024-05-07 21:46:24', '2024-05-07 21:46:24', NULL),
(14, 'Piraaditar', 'Mari Maasikas', 'Piraaditar ja Capitano leiavad merelt külmunud piraadi ja otsustavad ta hoolimata Tindika hoiatustest üles sulatada. Siis aga selgub nende ehmatuseks, et tegu on hirmsa ja halastamatu röövliga...', 'https://s.err.ee/photo/crop/2018/10/01/580242hc0fat16.jpg', '2024-05-08 09:45:52', '2024-05-08 09:45:52', NULL),
(16, 'Kassidest adminis', 'Mari Maasikas', 'Kass ehk kodukass on kaslaste sugukonna kassi perekonda kuuluv väike kiskja, kaslaste hulgas ainus koduloom. Kodukasse arvatakse maailmas elavat 600 miljonit ehk rohkem kui kõiki teisi kaslasi kokku. \r\nlisatud tekst ehk seda on nüüd muudetud. ', 'https://cdn.pixabay.com/photo/2024/01/29/20/40/cat-8540772_960_720.jpg', '2024-05-08 12:50:20', '2024-05-08 12:50:20', NULL),
(17, 'Kanad hakkavad munele', 'Mari Maasikas', 'Leht, millel viibid, üritab sind suunata aadressile https://lasteekraan.err.ee/1038765/piraaditar-ja-capitano.\r\n\r\n Kui sa ei soovi seda lehte külastada, siis sa võid minna tagasi eelmisele lehele.', 'NULL', '2024-05-13 13:33:09', '2024-05-13 13:33:09', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `authors`
--
ALTER TABLE `authors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `table1_posts`
--
ALTER TABLE `table1_posts`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `authors`
--
ALTER TABLE `authors`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `table1_posts`
--
ALTER TABLE `table1_posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
