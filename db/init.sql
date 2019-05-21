-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 21, 2019 at 10:07 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projectUAS`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `productID` bigint(20) NOT NULL,
  `userID` varchar(128) NOT NULL,
  `cartID` bigint(20) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `heroes`
--

CREATE TABLE `heroes` (
  `heroesID` int(11) NOT NULL,
  `heroesName` text NOT NULL,
  `heroesAttr` varchar(3) NOT NULL,
  `heroesImageURL` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `heroes`
--

INSERT INTO `heroes` (`heroesID`, `heroesName`, `heroesAttr`, `heroesImageURL`) VALUES
(10, 'Abbadon', 'STR', ''),
(11, 'Alchemist', 'STR', ''),
(12, 'Axe', 'STR', ''),
(13, 'Beastmaster', 'STR', ''),
(14, 'Brewmaster', 'STR', ''),
(15, 'Bristleback', 'STR', ''),
(16, 'Centaur Warrunner', 'STR', ''),
(17, 'Chaos Knight', 'STR', ''),
(18, 'Clockwerk', 'STR', ''),
(19, 'Doom', 'STR', ''),
(20, 'Dragon Knight', 'STR', ''),
(21, 'Earth Spirit', 'STR', ''),
(22, 'Earth Shaker', 'STR', ''),
(23, 'Elder Titan', 'STR', ''),
(24, 'Huskar', 'STR', ''),
(25, 'IO', 'STR', ''),
(26, 'Kunkka', 'STR', ''),
(27, 'Legion Commander', 'STR', ''),
(28, 'Lifestealer', 'STR', ''),
(29, 'Lycan', 'STR', ''),
(30, 'Magnus', 'STR', ''),
(31, 'Mars', 'STR', ''),
(32, 'Night Stalker', 'STR', ''),
(33, 'Omniknight', 'STR', ''),
(34, 'Phoenix', 'STR', ''),
(35, 'Pudge', 'STR', ''),
(36, 'Sand King', 'STR', ''),
(37, 'Slardar', 'STR', ''),
(38, 'Spirit Breaker', 'STR', ''),
(39, 'Sven', 'STR', ''),
(40, 'Tidehunter', 'STR', ''),
(41, 'Timbersaw', 'STR', ''),
(42, 'Tiny', 'STR', ''),
(43, 'Treant Protector', 'STR', ''),
(44, 'Tusk', 'STR', ''),
(45, 'Underlord', 'STR', ''),
(46, 'Undying', 'STR', ''),
(47, 'Wraith King', 'STR', ''),
(48, 'Anti-Mage', 'AGI', ''),
(49, 'Arc Warden', 'AGI', ''),
(50, 'Bloodseeker', 'AGI', ''),
(51, 'Bounty Hunter', 'AGI', ''),
(52, 'Broodmother', 'AGI', ''),
(53, 'Clinkz', 'AGI', ''),
(54, 'Drow Ranger', 'AGI', ''),
(55, 'Ember Spirit', 'AGI', ''),
(56, 'Faceless Void', 'AGI', ''),
(57, 'Gyrocopter', 'AGI', ''),
(58, 'Juggernaut', 'AGI', ''),
(59, 'Lone Druid', 'AGI', ''),
(60, 'Luna', 'AGI', ''),
(61, 'Medusa', 'AGI', ''),
(62, 'Meepo', 'AGI', ''),
(63, 'Mirana', 'AGI', ''),
(64, 'Monkey King', 'AGI', ''),
(65, 'Morphling', 'AGI', ''),
(66, 'Naga Siren', 'AGI', ''),
(67, 'Nyx Assassin', 'AGI', ''),
(68, 'Pangolier', 'AGI', ''),
(69, 'Phantom Assassin', 'AGI', ''),
(70, 'Phantom Lancer', 'AGI', ''),
(71, 'Razor', 'AGI', ''),
(72, 'Riki', 'AGI', ''),
(73, 'Shadow Fiend', 'AGI', ''),
(74, 'Slark', 'AGI', ''),
(75, 'Sniper', 'AGI', ''),
(76, 'Spectre', 'AGI', ''),
(77, 'Templar Assassin', 'AGI', ''),
(78, 'Terrorblade', 'AGI', ''),
(79, 'Troll Warlord', 'AGI', ''),
(80, 'Ursa', 'AGI', ''),
(81, 'Vengeful Spirit', 'AGI', ''),
(82, 'Venomancer', 'AGI', ''),
(83, 'Viper', 'AGI', ''),
(84, 'Weaver', 'AGI', ''),
(85, 'Ancient Apparition', 'INT', ''),
(86, 'Bane', 'INT', ''),
(87, 'Batrider', 'INT', ''),
(88, 'Chen', 'INT', ''),
(89, 'Crystal Maiden', 'INT', ''),
(90, 'Dark Seer', 'INT', ''),
(91, 'Dark Willow', 'INT', ''),
(92, 'Dazzle', 'INT', ''),
(93, 'Death Prophet', 'INT', ''),
(94, 'Disruptor', 'INT', ''),
(95, 'Enchantress', 'INT', ''),
(96, 'Enigma', 'INT', ''),
(97, 'Grimstroke', 'INT', ''),
(98, 'Invoker', 'INT', ''),
(99, 'Jakiro', 'INT', ''),
(100, 'Keeper of the Light', 'INT', ''),
(101, 'Leshrac', 'INT', ''),
(102, 'Lich', 'INT', ''),
(103, 'Lina', 'INT', ''),
(104, 'Lion', 'INT', ''),
(105, 'Nature\'s Prophet', 'INT', ''),
(106, 'Necrophos', 'INT', ''),
(107, 'Ogre Magi', 'INT', ''),
(108, 'Oracle', 'INT', ''),
(109, 'Outworld Devourer', 'INT', ''),
(110, 'Puck', 'INT', ''),
(111, 'Pugna', 'INT', ''),
(112, 'Queen of Pain', 'INT', ''),
(113, 'Rubick', 'INT', ''),
(114, 'Shadow Demon', 'INT', ''),
(115, 'Shadow Shaman', 'INT', ''),
(116, 'Silencer', 'INT', ''),
(117, 'Skywrath Mage', 'INT', ''),
(118, 'Storm Spirit', 'INT', ''),
(119, 'Techies', 'INT', ''),
(120, 'Tinker', 'INT', ''),
(121, 'Visage', 'INT', ''),
(122, 'Warlock', 'INT', ''),
(123, 'Windranger', 'INT', ''),
(124, 'Winter Wyvern', 'INT', ''),
(125, 'Witch Doctor', 'INT', ''),
(126, 'Zeus', 'INT', '');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `productID` bigint(20) NOT NULL,
  `name` varchar(128) NOT NULL,
  `price` int(11) NOT NULL,
  `stock` int(11) DEFAULT NULL,
  `description` text NOT NULL,
  `imageURL` varchar(128) NOT NULL,
  `heroesID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`productID`, `name`, `price`, `stock`, `description`, `imageURL`, `heroesID`) VALUES
(10, 'Adoring Wingfall', 5, 20, 'Weapon', 'https://i.imgur.com/U9i5Oqd.png', 33),
(11, 'Alluvion Prophecy', 5, 20, 'Weapon', 'https://i.imgur.com/tuA1yGY.png', 108),
(12, 'Alpha Predator', 10, 15, 'Set', 'https://i.imgur.com/oAYZ1cM.png', 67),
(13, 'Anointed Armor of Ruination', 10, 15, 'Set', 'https://i.imgur.com/8gw666H.png', 10),
(14, 'Arcane Staff of the Ancients', 4, 30, 'Weapon', 'https://i.imgur.com/U2s1cZc.png', 100),
(15, 'Arms of Desolation', 10, 25, 'Arms', 'https://i.imgur.com/Vn7nZ5M.png', 73),
(16, 'Auspice of the Whyrlegyge', 5, 20, 'Back', 'https://i.imgur.com/c7BP0Cd.png', 107),
(17, 'Battlefury', 5, 15, 'Weapon', 'https://i.imgur.com/OE8kGCo.png', 56),
(18, 'Benevolent Companion', 30, 10, 'Arcana Set', 'https://i.imgur.com/cGp05FM.png', 25),
(19, 'Bitter Lineage', 5, 20, 'Weapon', 'https://i.imgur.com/RkMdMZG.png', 79),
(20, 'Black Nihility', 10, 20, 'Set', 'https://i.imgur.com/8cvyuUD.png', 32),
(21, 'Blade of Tears', 10, 20, 'Weapon', 'https://i.imgur.com/9T2BSHL.png', 65),
(22, 'Bladeform Legacy', 30, 10, 'Arcana Set', 'https://i.imgur.com/IVW6eht.png', 58),
(23, 'Blades of Voth Domosh', 30, 5, 'Arcana Set', 'https://i.imgur.com/gAzYzlv.png', 27),
(24, 'Blastforge Exhaler of the Crimson Witness', 5, 30, 'Head', 'https://i.imgur.com/SVXR2DK.png', 15),
(25, 'Blessings of Lucentyr Set', 10, 15, 'Set', 'https://i.imgur.com/GhkFNct.png', 60),
(26, 'Blistering Shade of the Crimson Witness', 10, 20, 'Arms', 'https://i.imgur.com/Oqvyn3H.png', 47),
(27, 'Bloodfeather Wings', 5, 20, 'Back', 'https://i.imgur.com/at5Sp19.png', 112),
(28, 'Bobusangs Traveling Necessities Set', 10, 15, 'Set', 'https://i.imgur.com/vNyBwf5.png', 44),
(29, 'Bonkers the Mad', 5, 25, 'Back', 'https://i.imgur.com/AaFehiD.png', 125),
(30, 'Crimson Unbroken Fealty', 10, 20, 'Weapon', 'https://i.imgur.com/5MMsYzG.png', 47),
(31, 'Colossal Crystal Chorus', 5, 20, 'Back', 'https://i.imgur.com/sYyMnx3.png', 62),
(32, 'Bracers of Aeons of the Crimson Witness', 5, 25, 'Arms', 'https://i.imgur.com/kF07GeA.png', 56),
(33, 'Chill of the Keepers Gaze', 10, 25, 'Set', 'https://i.imgur.com/qTLWnZC.png', 121),
(34, 'Claddish Cudgel', 4, 40, 'Weapon', 'https://i.imgur.com/7h6nDQH.png', 40),
(35, 'Clan of the Arctic Owlbear', 7, 40, 'Set', 'https://i.imgur.com/H25jxht.png', 59),
(36, 'Codicil of the Veiled Ones', 25, 5, 'Head', 'https://i.imgur.com/fXzeWkW.png', 69),
(37, 'Concord Dominion', 10, 45, 'Shoulder', 'https://i.imgur.com/x3bWRDm.png', 70),
(38, 'Controlled Burn', 9, 50, 'Weapon', 'https://i.imgur.com/Vtyoowy.png', 41),
(39, 'Crimson Censer of Gliss', 3, 75, 'Off-hand', 'https://i.imgur.com/gV7rVxC.png', 114),
(40, 'Crimson Edge of the Lost Order', 25, 15, 'Weapon', 'https://i.imgur.com/nzwtmfW.png', 58),
(41, 'Crimson Edict of Shadows', 5, 50, 'Head', 'https://i.imgur.com/S2cgC3d.png', 72),
(42, 'Crimson Emerald Conquest', 10, 25, 'Weapon', 'https://i.imgur.com/g6h3Mmv.png', 45),
(43, 'Crimson Hearts of Misrule', 15, 40, 'Head', 'https://i.imgur.com/vFDNwE5.png', 91),
(44, 'Crimson Mournful Reverie', 15, 75, 'Shoulder', 'https://i.imgur.com/ZzTpYqx.png', 81),
(45, 'Crimson Pique', 7, 40, 'Back', 'https://i.imgur.com/NfAJNJh.png', 84),
(46, 'Crown of Tears', 15, 50, 'Head', 'https://i.imgur.com/BbFs9no.png', 65),
(47, 'Crux of Perplex', 20, 40, 'Shoulder', 'https://i.imgur.com/ZTyyp1r.png', 113),
(48, 'Crystal Dryad', 15, 50, 'Weapon', 'https://i.imgur.com/8Ls8Tpp.png', 42),
(49, 'Cult of Aktok', 10, 90, 'Head', 'https://i.imgur.com/ED6PvKY.png', 82),
(51, 'Damarakan Muzzle of the Crimson Witness', 17, 40, 'Head', 'https://i.imgur.com/Y7MdomO.png', 116),
(52, 'Dark Artistry', 25, 25, 'Set', 'https://i.imgur.com/nv8H3AF.png', 98),
(53, 'Daughters of Hydrophiinae', 15, 45, 'Shoulder', 'https://i.imgur.com/7B4ykib.png', 61),
(54, 'Demon Eater', 35, 50, 'Arcana Set', 'https://i.imgur.com/5NfPvGL.png', 73),
(55, 'Disciple of the Wyrmwrought Flare', 15, 40, 'Belt', 'https://i.imgur.com/3BA78Yo.png', 103),
(56, 'Draining Wight', 10, 75, 'Nether Ward', 'https://i.imgur.com/SP18x9d.png', 111),
(57, 'Elder Convergence', 15, 30, 'Set', 'https://i.imgur.com/Py2yLYb.png', 99),
(58, 'Elemental Ice Infusion', 15, 80, 'Set', 'https://i.imgur.com/Yq0Pu32.png', 42),
(59, 'Elixir of Dragons Breath', 10, 80, 'Barrel', 'https://i.imgur.com/leSA9lK.png', 14),
(60, 'Empyrean', 5, 90, 'Weapon', 'https://i.imgur.com/lC9Cpb4.png', 117),
(61, 'Eternal Radiance Blades', 10, 70, 'Weapon', 'https://i.imgur.com/OjJe51y.png', 11),
(62, 'Fathomless Ravager', 15, 90, 'Set', 'https://i.imgur.com/CtVKYg2.png', 73),
(63, 'Fervid Monarch', 15, 60, 'Set', 'https://i.imgur.com/99et3Bj.png', 83),
(64, 'Fiery Soul of the Slayer', 35, 40, 'Arcana Set', 'https://i.imgur.com/kPKnkjt.png', 103),
(65, 'Fin Kings Charm', 10, 35, 'Weapon', 'https://i.imgur.com/96CaPBi.png', 104),
(66, 'Fire Lotus Belt', 15, 65, 'Belt', 'https://i.imgur.com/E8a3DrE.png', 103),
(67, 'Flourishing Lodestar', 15, 45, 'Head', 'https://i.imgur.com/xF8WCrE.png', 95),
(68, 'Fluttering Mortis', 15, 50, 'Legs', 'https://i.imgur.com/2UJrAjZ.png', 93),
(69, 'Fluttering Staff', 15, 75, 'Weapon', 'https://i.imgur.com/pF8nEbk.png', 105),
(70, 'Focal Resonance', 10, 80, 'Weapon', 'https://i.imgur.com/3KyCA48.png', 77),
(71, 'Form of the Great Calamity', 10, 90, 'Shapeshift', 'https://i.imgur.com/OM73w8O.png', 29),
(72, 'Fractal Horns of Inner Abysm', 40, 5, 'Arcana Set', 'https://i.imgur.com/WbNrNYz.png', 78),
(73, 'Friend of the West', 10, 85, 'Set', 'https://i.imgur.com/194ltXn.png', 13),
(74, 'Frost Avalanche', 35, 15, 'Arcana Set', 'https://i.imgur.com/o9sO7Jg.png', 89),
(76, 'Frostreach Brigands', 10, 80, 'Set', 'https://i.imgur.com/wvAVNLv.png', 11),
(77, 'Fungal Lord Set', 10, 60, 'Set', 'https://i.imgur.com/HiRc2WJ.png', 105),
(78, 'Geodesic Eidolon', 10, 40, 'Eidolons', 'https://i.imgur.com/MJy1ST1.png', 96),
(79, 'Gimlek Decanter', 10, 80, 'Weapon', 'https://i.imgur.com/80ld06m.png', 107),
(80, 'Glaive of Oscilla', 10, 85, 'Weapon', 'https://i.imgur.com/CJtJrUP.png', 116),
(81, 'Golden Atomic Ray Thrusters', 5, 90, 'Guns', 'https://i.imgur.com/XpoX3Qj.png', 57),
(82, 'Golden Basher Blades', 20, 50, 'Weapon Pack', 'https://i.imgur.com/zINXzc5.png', 48),
(83, 'Golden Floodmask', 10, 65, 'Head', 'https://i.imgur.com/wWyqCdJ.png', 40),
(84, 'Golden Full-Bore Bonanza', 10, 90, 'Back', 'https://i.imgur.com/FOA9ZHs.png', 75),
(85, 'Golden Grasping Bludgeon', 15, 45, 'Weapon', 'https://i.imgur.com/F72onLC.png', 37),
(86, 'Golden Moonfall', 10, 75, 'Shield', 'https://i.imgur.com/qMrSmgW.png', 60),
(87, 'Golden Nether Lords Regalia Set', 15, 40, 'Set', 'https://i.imgur.com/Pma42N1.png', 111),
(88, 'Golden Origins of Faith', 20, 80, 'Armor', 'https://i.imgur.com/qzawTTR.png', 48),
(89, 'Golden Pale Mausoleum', 10, 80, 'Tombstone', 'https://i.imgur.com/GBD7Rte.png', 46),
(90, 'Golden Severing Crest', 15, 60, 'Head', 'https://i.imgur.com/S04MyS7.png', 71),
(91, 'Golden Shadow Masquerade', 15, 75, 'Shoulder', 'https://i.imgur.com/dALt6yf.png', 72),
(92, 'Golden Shards of Exile', 15, 60, 'Weapon', 'https://i.imgur.com/2iJ2YAI.png', 109),
(93, 'Golden Staff of Perplex', 15, 55, 'Weapon', 'https://i.imgur.com/q4rVtlw.png', 113),
(94, 'Guardian of the Sapphire Flame', 10, 95, 'Set', 'https://i.imgur.com/mWm4KOU.png', 39),
(95, 'Harbringer of the Inauspicious Abyss Set', 15, 90, 'Set', 'https://i.imgur.com/wTDXO7C.png', 109),
(96, 'Hellborn Grasp', 10, 80, 'Weapon', 'https://i.imgur.com/TpJPaZO.png', 122),
(97, 'Hells Glare', 5, 85, 'Weapon', 'https://i.imgur.com/9twAdgS.png', 19),
(98, 'Hells Usher', 15, 75, 'Weapon', 'https://i.imgur.com/wkRGwxP.png', 69),
(99, 'Hunter in Distant Sands Set', 10, 70, 'Set', 'https://i.imgur.com/yuBe4E7.png', 51),
(100, 'Hunters Hoard of the Crimson Witness', 20, 85, 'Back', 'https://i.imgur.com/YIsdHV0.png', 51),
(101, 'Hydrakan Latch', 10, 50, 'Weapon', 'https://i.imgur.com/Gw26uej.png', 74),
(102, 'Icewrack Marauder', 10, 70, 'Set', 'https://i.imgur.com/9sQi3gY.png', 79),
(103, 'Infernal Chieftain of the Crimson Witness', 15, 95, 'Head', 'https://i.imgur.com/pN13bQf.png', 16),
(104, 'Instagib OSP', 10, 80, 'Weapon', 'https://i.imgur.com/qJnMK5n.png', 75),
(105, 'Inverse Bayonet', 20, 75, 'Weapon', 'https://i.imgur.com/HhairSm.png', 26),
(106, 'Iron Surge', 5, 85, 'Head', 'https://i.imgur.com/Yeyrdpx.png', 38),
(107, 'Jade Reckoning', 10, 70, 'Weapon', 'https://i.imgur.com/z3KA5KI.png', 21),
(108, 'Jewel of Aeons', 15, 70, 'Shoulder', 'https://i.imgur.com/VP6Z3Lv.png', 56),
(109, 'Kindred of the Iron Dragon', 15, 85, 'Elder Dragon Form', 'https://i.imgur.com/Kf4RHqA.png', 20),
(110, 'Lamb to the Slaughter', 10, 45, 'Weapon', 'https://i.imgur.com/x5QrJrK.png', 115),
(111, 'Latticean Shards of the Crimson Witness', 20, 35, 'Weapon', 'https://i.imgur.com/UIgXA8H.png', 67),
(112, 'Mace of Aeons', 10, 30, 'Weapon', 'https://i.imgur.com/XspnVFF.png', 56),
(113, 'Magus Accord', 20, 15, 'Arms', 'https://i.imgur.com/A0BPkot.png', 98),
(114, 'Magus Apex', 20, 10, 'Head', 'https://i.imgur.com/HxMtSDB.png', 98),
(115, 'Malefic Drakes Hood of the Crimson Witness', 20, 40, 'Head', 'https://i.imgur.com/wD5F6FN.png', 83),
(116, 'Mandate of the Stormborn', 10, 80, 'Arms', 'https://i.imgur.com/ydg9HS9.png', 118),
(117, 'Manias Mask', 25, 75, 'Head', 'https://i.imgur.com/RAysu1O.png', 54),
(118, 'Manifold Paradox', 35, 15, 'Arcana Set', 'https://i.imgur.com/egDBCZq.png', 69),
(119, 'Mantle of Grim Facade', 5, 90, 'Back', 'https://i.imgur.com/J7q2477.png', 114),
(120, 'Mantle of the Cinder Baron', 5, 25, 'Misc', 'https://i.imgur.com/zx7dYn3.png', 12),
(121, 'Mask of the Confidant', 25, 30, 'Head', 'https://i.imgur.com/QE0wFyK.png', 68),
(122, 'Masque of Awaleb Bundle', 20, 35, 'Set', 'https://i.imgur.com/V7b47CB.png', 125),
(123, 'Mecha Boots of Travel MK III', 10, 40, 'Misc', 'https://i.imgur.com/qHExF8q.png', 120),
(124, 'Merry Wanderers Brush', 15, 35, 'Tail', 'https://i.imgur.com/AzfhB3A.png', 110),
(125, 'Midas Knuckles', 10, 80, 'Arms', 'https://i.imgur.com/u5ODRS8.png', 11),
(126, 'Mistress of the Long Night', 10, 50, 'Set', 'https://i.imgur.com/LoqTtBr.png', 93),
(127, 'Molten Claw', 10, 50, 'Shoulder', 'https://i.imgur.com/PFsU1yi.png', 12),
(128, 'Moon Griffon', 15, 40, 'Mount', 'https://i.imgur.com/bYE39vv.png', 63),
(129, 'Morbific Provision', 15, 40, 'Set', 'https://i.imgur.com/GqkHxWq.png', 125),
(130, 'Muh Keen Gun', 10, 50, 'Weapon', 'https://i.imgur.com/neSFMhO.png', 75),
(131, 'Mulctant Pall of the Crimson Witness', 15, 20, 'Armor', 'https://i.imgur.com/QHO1J4l.png', 104),
(132, 'Murder of Crows', 15, 25, 'Set', 'https://i.imgur.com/Y0ZtxgC.png', 35),
(133, 'Nomad of the Burning Decree', 15, 40, 'Set', 'https://i.imgur.com/nakpQjY.png', 53),
(134, 'Nomad of the Burning Decree', 15, 39, 'Set', 'https://i.imgur.com/tL0XLZt.png', 53),
(135, 'Nothlic Burden of the Crimson Witness', 20, 75, 'Misc', 'https://i.imgur.com/csMio5z.png', 92),
(136, 'Nys Assassins Dagon', 17, 75, 'Misc', 'https://i.imgur.com/r7BMOsB.png', 67),
(137, 'Obsidian Golem', 20, 57, 'Golem', 'https://i.imgur.com/V4SIIv5.png', 122),
(138, 'Orb of Deliverance', 15, 90, 'Weapon', 'https://i.imgur.com/zTJLhCX.png', 94),
(139, 'Pale Augur', 7, 14, 'Arms', 'https://i.imgur.com/fFnETpJ.png', 46);

-- --------------------------------------------------------

--
-- Table structure for table `secret`
--

CREATE TABLE `secret` (
  `userID` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL,
  `salt` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `secret`
--

INSERT INTO `secret` (`userID`, `password`, `salt`) VALUES
('andreirawan', 'd138768d3b5eca407f0dd579c5ca3767', 123);

-- --------------------------------------------------------

--
-- Table structure for table `shoppinglog`
--

CREATE TABLE `shoppinglog` (
  `productID` bigint(20) NOT NULL,
  `userID` varchar(128) NOT NULL,
  `shoppingLogID` bigint(128) NOT NULL,
  `datePurchase` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `quantity` int(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shoppinglog`
--

INSERT INTO `shoppinglog` (`productID`, `userID`, `shoppingLogID`, `datePurchase`, `quantity`) VALUES
(61, 'andreirawan', 1, '2019-05-16 14:33:42', 1),
(137, 'andreirawan', 3, '2019-05-16 15:00:54', 3);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userID` varchar(128) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `saldo` int(11) NOT NULL,
  `email` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userID`, `nama`, `saldo`, `email`) VALUES
('andreirawan', 'Andre Irawan', 999967, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cartID`),
  ADD KEY `productID` (`productID`),
  ADD KEY `userID` (`userID`);

--
-- Indexes for table `heroes`
--
ALTER TABLE `heroes`
  ADD PRIMARY KEY (`heroesID`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`productID`),
  ADD KEY `heroesID` (`heroesID`);

--
-- Indexes for table `secret`
--
ALTER TABLE `secret`
  ADD PRIMARY KEY (`userID`);

--
-- Indexes for table `shoppinglog`
--
ALTER TABLE `shoppinglog`
  ADD PRIMARY KEY (`shoppingLogID`),
  ADD KEY `productID` (`productID`),
  ADD KEY `userID` (`userID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cartID` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `heroes`
--
ALTER TABLE `heroes`
  MODIFY `heroesID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=127;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `productID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=140;

--
-- AUTO_INCREMENT for table `shoppinglog`
--
ALTER TABLE `shoppinglog`
  MODIFY `shoppingLogID` bigint(128) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`productID`) REFERENCES `products` (`productID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`userID`) REFERENCES `users` (`userID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`heroesID`) REFERENCES `heroes` (`heroesID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `secret`
--
ALTER TABLE `secret`
  ADD CONSTRAINT `secret_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `users` (`userID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `shoppinglog`
--
ALTER TABLE `shoppinglog`
  ADD CONSTRAINT `shoppinglog_ibfk_1` FOREIGN KEY (`productID`) REFERENCES `products` (`productID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `shoppinglog_ibfk_2` FOREIGN KEY (`userID`) REFERENCES `users` (`userID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
