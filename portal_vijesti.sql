-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 13, 2024 at 10:57 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `portal_vijesti`
--

-- --------------------------------------------------------

--
-- Table structure for table `korisnik`
--

CREATE TABLE `korisnik` (
  `id` int(11) NOT NULL,
  `ime` varchar(50) NOT NULL,
  `prezime` varchar(50) NOT NULL,
  `korisnicko_ime` varchar(50) NOT NULL,
  `lozinka` varchar(255) NOT NULL,
  `admin_prava` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=cp1250 COLLATE=cp1250_croatian_ci;

--
-- Dumping data for table `korisnik`
--

INSERT INTO `korisnik` (`id`, `ime`, `prezime`, `korisnicko_ime`, `lozinka`, `admin_prava`) VALUES
(1, 'Domagoj', 'Papa', 'admin', '$2y$10$VT1YSD8Q4t9euJAckHHpWOPa1BUF185785.iRXIc5K7cL5nSAdwJG', 1),
(2, 'Neki', 'Prolaznik', 'posjetioc', '$2y$10$c5RZPMQZOOGCniZPkYWVrOOyPMufO5agYSRaepxjMI0vONCBVTtnm', 0),
(3, 'a', 'a', 'a', '$2y$10$0oxbFbvium6hinkdP7m6fObwCNVxrFfxrij1Mz4LFQstX4mvQV1T.', 0),
(4, 'sddfsf', 'fsdfdsf', 'fdfdfdsf', '$2y$10$AMEjqDT0pT5ZJbzDWLB7wuiiPA8vXvoRurfgIStxP1WOusX3POlPe', 1),
(5, '32323', 'e2432432', 'admino', '$2y$10$fcNweD2xh.ZXSaItOYScXuWYVtFHACqRjjPrwq/PmEgpDxU2Y/462', 1);

-- --------------------------------------------------------

--
-- Table structure for table `vijesti`
--

CREATE TABLE `vijesti` (
  `id` int(11) NOT NULL,
  `datum` date NOT NULL,
  `naslov` varchar(255) NOT NULL,
  `sazetak` text NOT NULL,
  `tekst` text NOT NULL,
  `slika` varchar(255) NOT NULL,
  `kategorija` varchar(50) NOT NULL,
  `arhiva` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=cp1250 COLLATE=cp1250_croatian_ci;

--
-- Dumping data for table `vijesti`
--

INSERT INTO `vijesti` (`id`, `datum`, `naslov`, `sazetak`, `tekst`, `slika`, `kategorija`, `arhiva`) VALUES
(8, '2024-06-13', 'Esports World Cup', 'League of Legends and Teamfight Tactics join the Esports World Cup', 'In addition, Riot Games will not select the participating teams. The company, however, did make space in its competitive calendars to allow the teams adequate time to prepare and participate in the World Cup.\r\n\r\nAlongside announcing the inclusion of TFT and League of Legends in the Esports World Cup, Riot Games also revealed that Arabic localisation will be included in League of Legends. Moreover, new servers in the Middle East for the company’s games will be launched in 2024. The company first announced its aim to localise League of Legends in the region back in 2019.\r\n\r\nRiot Games shared that there are ‘a few reasons’ for allowing the teams to compete in the World Cup. The first is the scale of the tournament, which now includes more than 20 games. Riot said that cross-game, cross-genre esports events ‘are unique moments for fans of all types’. In addition, bringing top-level teams to the MENA region was another point brought up in the announcement.\r\n\r\nAnother reason for the inclusion of TFT and LoL is the financial benefits it provides teams. In the statement, Riot highlighted that it understands that many organisations are facing financial troubles and that the company did not want to deny the teams a chance to participate in a ‘major economic and brand-building opportunity’.\r\n\r\nAn excerpt of Riot Games announcement reads: “The EWC offers not only the chance to compete on an international stage but also the ability to earn a piece of a meaningful prize pool, which helps enhance financial stability.  The community has been asking for more international play, and this event is part of a broader strategy to allow for additional high-impact tournaments to the esports calendar.”\r\n\r\nThe Esports World Cup is set to take place over the Summer in Riyadh, Saudi Arabia, and will replace the Gamers8 festival. The World Cup will have substantial prize pools for all games and will feature Overwatch 2, EA FC, Street Fighter, Tekken, PUBG Mobile, MLBB, Free Fire, CS2, Dota 2 and many other tournaments.\r\n\r\nDespite this being the first time League of Legends has been announced as a highlighted title in Saudi Arabia’s multi-title event, the game was featured at last year’s Gamers8 in 2023 as a smaller ERL tournament.\r\n\r\nIt should also be noted that Riot Games also came under criticism from its viewers and fans in 2020 after announcing NEOM, a Saudi Arabian mega project, as the official partner for the LEC Summer Split. The deal was later cancelled due to backlash from fans.', 'uploads/cs_3.png', 'League of Legends', 0),
(9, '2024-06-13', 'YOUR.GG', 'Gen.G Acquires League of Legends Data Analytics Platform YOUR.GG', 'By providing data-driven solutions and reports, Gen.G is also looking to foster growth for both its professional players and academy students.\r\n\r\nFinancial details regarding the purchase have not been revealed.\r\n\r\nEstablished in 2019, the Gen.G Global Academy is a talent development institution with three locations (Seoul, Los Angeles and Shanghai). The programme was born to provide future esports athletes with the support needed to educate and train them for a potential career in esports.\r\n\r\nAside from partnering with major brands such as LG UltraGear, Korean streaming platform AfreecaTV, clothing brand PUMA and energy drink brand Monster Energy, Gen.G has also developed strong relationships with educational institutions such as Warwick University and the University of Kentucky.\r\n\r\nOn the competitive side, Gen.G is mainly known for its endeavours across game titles such as League of Legends (LCK), VALORANT (VCT Pacific), Rocket League and NBA2K. The team recently won the LCK 2024 Spring Split and is participating in the League of Legends Mid-Season Invitational.\r\n\r\nGen.G CEO, Arnold Hur, commented: “Over the last few years, we’ve been hard at work pioneering what is now the world’s largest esports academy. With over 10,000 students having gone through our curriculum, we see the clear need to develop better tools that gamers, coaches and parents need to create the best gamers possible.\r\n\r\n“YOUR.GG’s best-in-class data, technology and analytics combined with millions of hours of our professional and academy student coaching will be able to unlock the next generations of esports tools that can help realise the true potential of every student and pro in our programme.” ', 'uploads/cs_2.png', 'Counter Strike', 0),
(10, '2024-06-13', 'Counter  Strike change?', 'How Counter-Strike esports has changed since CS2’s launch', 'Despite there now being a constant roll out of S-tier events and online tournaments, it is currently far too early to see most of CS2’s impacts on the Counter-Strike esports scene. Most, but not all. There have been some early signs that CS2 has caused different trends to emerge in CS esports.\r\n\r\nFor starters, CS2 was plagued with issues when it was first released. The game suffered from ‘peekers advantage’, which meant that players who peeked saw the enemy first and had the opportunity to shoot first. This created an incredible competitive edge and meant players with an aggressive play style flourished whilst ‘anchors’, those who hold sites, struggled. \r\n\r\nWhilst the game has been patched and a lot of these issues are fixed, there is still an element of peekers advantage thanks to a change in the servers which Valve calls ‘sub tick servers’. The full scale of the changes has yet to be seen, but since the release of CS2 players with a more aggressive playstyles, such as 17 year old Team Spirit prodigy Danil ‘donk’ Kryshkovets, have thrived. \r\n\r\nFollowing the launch of CS2 a crop of younger players have started to also appear on top teams, such as Andreas ‘aNdu’ Maasing and Ihor ‘w0nderful’ Zhdanov, but once again it is too early to say whether this will lead to a trend. Will this lead to the emergence of more academy teams and potentially a replacement for the currently dormant WePlay Academy league? Only time will tell. ', 'uploads/cs_1.png', 'Counter Strike', 0),
(11, '2024-06-13', 'Academy camp', 'Team Flash and Gen.G Global Academy launch League of Legends camp', 'Alongside the curriculum, Team Flash will provide career guidance for those participating in the course. According to a release, the career guidance will include ‘collaborative efforts within the industry.’ Details on further collaborations were not disclosed.\r\n\r\nThis is the second edition of Team Flash’s and Gen.G’s esports camp. In November 2022, the two organisations ran a camp offering students opportunities to develop skills in partnership with Singaporean school XCL World Academy.\r\n\r\nSince the first collaboration, Team Flash has continually to expand its presence within the South Asian esports market. In January 2024, the organisation partnered with telecommunications company FPT Corporation to host tournaments in Vietnam and to work on research and the development of new technologies.\r\n\r\nMark Chew, CEO of Team Flash, spoke on the partnership: “Team Flash is more than just an Esports organization. When we lead and coach our players, we always emphasised values that extend beyond the screen and conventional standards.\r\n\r\n“So through our Esports education camps, we hope to engage our community in more sustainable ways by providing mentorship to our community, promoting positive messaging in Esports and inspiring the younger generation of gaming communities.”', 'uploads/lol_3.png', 'League of Legends', 0),
(12, '2024-06-13', 'World Championship, MSI and ?', 'League of Legends esports announces third international event', 'The major new revamp of the League of Legends ecosystem is, according to Riot Games, a part of its new strategy to keep League of Legends esports sustainable. As a result, Riot Games has proposed plans to merge the LCS, LLA and CBLOL to create a united Americas league, similar to VALORANT. In addition, LCO, PCS, VCS and LJL will merge to create the APAC league.\r\n\r\nThe new major LAN event will feature five teams, from the three main regions (LEC, LPL and LCK) and the newly-formed Americas and APAC leagues. To accommodate the new tournament, all of League of Legends’ regions will adopt a three-split structure, previously used by the LEC. The new tournament will be smaller in scale and only feature the winners of the five main leagues, but will be an international LAN tournament.\r\n\r\nThe new event will take place after the first split, which the LEC has called the Winter Split. After the new event finishes, the second split will qualify teams for the Mid-Season Invitational as before. After MSI ends, teams will turn towards the World Championship.\r\n\r\nThe third split in every region will include a Regional Championship, similar to the ones featured by the LEC in 2023.\r\n\r\nEach region will now have one slot at the unnamed first event of the season, two slots at MSI, and three slots at Worlds. In addition, the MSI champions and the second-best-performing region will get a Worlds slots.', 'uploads/lol_1.png', 'League of Legends', 0),
(13, '2024-06-13', 'S1mple&#039;s confession', '“I want to see beautiful Counter-Strike” – s1mple launches esports education project ', '“I was interested in it because I know how to make players play better,” said s1mple in an interview with Esports Insider.\r\n\r\n“I see how many mistakes they do and I feel that it’s a good opportunity for them to learn something from me and from other pro players as well. Because there’s going to be a lot of examples of how to play and how to not play in some crucial situations.”\r\n\r\nAccording to s1mple, the project’s initial idea came from his brother and friends. The opportunity to create an educational series similar to popular online classes seen by companies such as Masterclass was an enticing proposition.\r\n\r\nSome features noted for the project include participating in tournaments with members, gaining personal communication with s1mple and ‘other top players’ and joining a like-minded community. The videos that will be made available from the project will be pre-recorded.\r\n\r\nFor those unaware, s1mple is arguably one of the biggest names in esports. Ranked the best CS:GO player in 2018, 2021 and 2022 by HLTV, the Ukrainian has spent most of his form years at NAVI, winning PGL Major Stockholm 2021, IEM Katowice 2020 and the BLAST Premier World Final in 2021, among many other accolades.\r\n\r\nAs esports matures and its history grows longer, the concept of individuals within esports — retired and current — providing skill development opportunities is not new. Some coaches and players have used platforms such as Metafy to provide coaching services. However, none are seemingly as in-depth as what the Play Like s1mple project is offering. \r\n\r\nAside from a stint with Team Falcons earlier this year, s1mple has largely taken a break from competitive Counter-Strike since October 2023. The player noted that during his hiatus he was able to invest in the project and develop the courses ready for launch. He said: “The break that I did from competitive [gameplay] was really, really nice to spend time with the new project. Because I got much more opportunity and much more time to do an even better project. So I focused more on these courses.”', 'uploads/lol_2.png', 'Counter Strike', 0),
(14, '2024-06-13', 'Comeback', 'Counter-Strike coverage site Rush B returns following two-year absence', 'Following a teaser in March, Rush B officially announced its return on April 22nd via X (formerly Twitter).\r\n\r\nIn an accompanying announcement on the website, former Rush B Writer and new Editor in Chief, Liam Slevin, introduced the outlet’s direction moving forward: “We are aiming to focus on the stories that don’t get the attention that they deserve in our community.\r\n\r\n“There is a broad spectrum of things to cover in Counter-Strike, and we think we have found some of the best up-and-coming writers who are passionate about being innovative and taking a different approach to covering the scene.”\r\n\r\nLike its previous version, the relaunched Rush B will be focused on highlighting aspiring writing talent to boost their career in the esports industry.\r\n\r\nSlevin, who had moved to BLAST.tv and Dust2.us after Rush B’s shutdown, will be supported by Adam ‘Incipiens’ Conway as Managing Editor and Jacob ‘haloflyer’ Halfman, who will assist with technical aspects of the site.\r\n\r\nThe new writing team consists of Emile ‘armchairigl’ Morales, Ty ‘simba’ Sherback, Joaqin ‘mitsuha’ Valencerina, Tom ‘tomtom94’ Coles, Hugh Dooley and Pablo ‘VdaK1NG’ Escobar. Esports veteran broadcast talent Sam ‘Tech Girl’ Wright will also write for Rush B. Meanwhile, Fred ‘RONN’ Tomines will contribute with graphic designs.\r\n\r\nFounded in 2018, Rush B Media specialised in CS:GO news coverage. Since February 2022, the outlet had been temporarily shut down after its Founder and CEO, Ryan Friend, left Rush B to join Counter-Strike coverage site Dust2.us as its new Editor in Chief.\r\n\r\nEsports and gaming media outlets have been hit particularly hard by the ongoing ‘esports winter’. Over the last couple of years, several sites laid off staff while others closed operations entirely.', 'uploads/cs4.png', 'Counter Strike', 1),
(15, '2024-06-13', 'Comeback', 'Counter-Strike coverage site Rush B returns following two-year absence', 'Following a teaser in March, Rush B officially announced its return on April 22nd via X (formerly Twitter).\r\n\r\nIn an accompanying announcement on the website, former Rush B Writer and new Editor in Chief, Liam Slevin, introduced the outlet’s direction moving forward: “We are aiming to focus on the stories that don’t get the attention that they deserve in our community.\r\n\r\n“There is a broad spectrum of things to cover in Counter-Strike, and we think we have found some of the best up-and-coming writers who are passionate about being innovative and taking a different approach to covering the scene.”\r\n\r\nLike its previous version, the relaunched Rush B will be focused on highlighting aspiring writing talent to boost their career in the esports industry.\r\n\r\nSlevin, who had moved to BLAST.tv and Dust2.us after Rush B’s shutdown, will be supported by Adam ‘Incipiens’ Conway as Managing Editor and Jacob ‘haloflyer’ Halfman, who will assist with technical aspects of the site.\r\n\r\nThe new writing team consists of Emile ‘armchairigl’ Morales, Ty ‘simba’ Sherback, Joaqin ‘mitsuha’ Valencerina, Tom ‘tomtom94’ Coles, Hugh Dooley and Pablo ‘VdaK1NG’ Escobar. Esports veteran broadcast talent Sam ‘Tech Girl’ Wright will also write for Rush B. Meanwhile, Fred ‘RONN’ Tomines will contribute with graphic designs.\r\n\r\nFounded in 2018, Rush B Media specialised in CS:GO news coverage. Since February 2022, the outlet had been temporarily shut down after its Founder and CEO, Ryan Friend, left Rush B to join Counter-Strike coverage site Dust2.us as its new Editor in Chief.\r\n\r\nEsports and gaming media outlets have been hit particularly hard by the ongoing ‘esports winter’. Over the last couple of years, several sites laid off staff while others closed operations entirely.', 'uploads/cs4.png', 'Counter Strike', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `korisnik`
--
ALTER TABLE `korisnik`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `korisnicko_ime` (`korisnicko_ime`);

--
-- Indexes for table `vijesti`
--
ALTER TABLE `vijesti`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `korisnik`
--
ALTER TABLE `korisnik`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `vijesti`
--
ALTER TABLE `vijesti`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
