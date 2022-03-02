-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 23, 2022 at 09:48 PM
-- Server version: 8.0.27
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hipermarket`
--

-- --------------------------------------------------------

--
-- Table structure for table `angajat`
--

DROP TABLE IF EXISTS `angajat`;
CREATE TABLE IF NOT EXISTS `angajat` (
  `id_angajat` smallint NOT NULL,
  `cod_magazin` smallint DEFAULT NULL,
  `nume` varchar(40) NOT NULL,
  `prenume` varchar(40) NOT NULL,
  `sex` enum('m','f') NOT NULL,
  `salariu` mediumint NOT NULL,
  `nr_telefon` varchar(15) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_angajat`),
  UNIQUE KEY `angajat_tel_email` (`nr_telefon`,`email`),
  KEY `cod_magazin` (`cod_magazin`)
) ;

--
-- Dumping data for table `angajat`
--

INSERT INTO `angajat` (`id_angajat`, `cod_magazin`, `nume`, `prenume`, `sex`, `salariu`, `nr_telefon`, `email`) VALUES
(1, 1, 'Popescu', 'Mircea', 'm', 4500, '+40778342901', 'mirceapopescu@gmail.com'),
(2, 5, 'Stoica', 'Alex', 'm', 4000, '+40758332920', 'alexstoica@yahoo.com'),
(3, 3, 'Apostol', 'Beatrice', 'f', 5000, '+40778349876', 'beatriceapostol@gmail.com'),
(4, 2, 'Enache', 'Lucian', 'm', 3300, '+40725342999', 'laurentiuenache@gmail.com'),
(5, 2, 'Stuparu', 'Mihai', 'm', 6600, '+40753442654', 'mihaistuparu22@gmail.com'),
(6, 7, 'Ionescu', 'Adriana', 'f', 5200, '+40778342911', 'adrianaionescu9@gmail.com'),
(7, 9, 'Cristian', 'Robert', 'm', 2500, '+40783442512', 'robertcristian@gmail.com'),
(8, 10, 'Lucian', 'Eric', 'm', 3100, '+40778342311', 'ericlucianx@gmail.com'),
(11, 1, 'Bujor', 'Clara', 'f', 6700, '+40778345761', 'bujorclara@gmail.com'),
(12, 1, 'Vilceanu', 'Diana', 'f', 3330, '+40778342123', 'vilceanudiana@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `categorie`
--

DROP TABLE IF EXISTS `categorie`;
CREATE TABLE IF NOT EXISTS `categorie` (
  `id_categorie` smallint NOT NULL,
  `nume` varchar(100) NOT NULL,
  `descriere` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_categorie`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `categorie`
--

INSERT INTO `categorie` (`id_categorie`, `nume`, `descriere`) VALUES
(1, 'Food nerefrigerate', 'Produse alimentare nerefrigerate'),
(2, 'Food refrigerate', 'Produse alimentare refrigerate'),
(3, 'Non-Food', 'Produse non-alimentare'),
(4, 'Legume', 'Produse alimentare din categoria legumelor'),
(5, 'Fructe', 'Produse alimentare din categoria fructelor');

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

DROP TABLE IF EXISTS `client`;
CREATE TABLE IF NOT EXISTS `client` (
  `id_client` smallint NOT NULL,
  `nume` varchar(40) NOT NULL,
  `prenume` varchar(40) NOT NULL,
  `nr_telefon` varchar(15) DEFAULT NULL,
  `adresa` varchar(255) DEFAULT NULL,
  `oras` varchar(30) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `sex` enum('m','f') NOT NULL,
  PRIMARY KEY (`id_client`),
  UNIQUE KEY `client_tel_email` (`nr_telefon`,`email`)
) ;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`id_client`, `nume`, `prenume`, `nr_telefon`, `adresa`, `oras`, `email`, `sex`) VALUES
(1, 'Badescu', 'Evelyn', '+40753499087', 'Strada Infratirii nr. 5', 'Bucuresti', 'badescuevelyn@gmail.com', 'f'),
(2, 'Ovidiu', 'Mario', '+40753499555', 'Strada Biruintei nr. 12', 'Bucuresti', 'ovidiumario@gmail.com', 'm'),
(3, 'Petruta', 'Radu', '+40753499111', 'Strada Bradului nr. 52', 'Oradea', 'petrutaradu@gmail.com', 'm'),
(4, 'Onisa', 'Daria', '+40735499631', 'Strada Limitei nr. 22', 'Craiova', 'onisadaria@yahoo.com', 'f'),
(5, 'Bacaran', 'Oana', '+4075349333', 'Strada Noptii nr. 15', 'Cluj', 'bacaranoana@gmail.com', 'f'),
(6, 'Zamfir', 'Tiberiu', '+40756399123', 'Strada Cotiturii nr. 66', 'Bucuresti', 'zamfirtiberiu@gmail.com', 'm');

-- --------------------------------------------------------

--
-- Table structure for table `comanda`
--

DROP TABLE IF EXISTS `comanda`;
CREATE TABLE IF NOT EXISTS `comanda` (
  `id_comanda` smallint NOT NULL,
  `id_client` smallint NOT NULL,
  `cod_magazin` smallint NOT NULL,
  `id_angajat` smallint NOT NULL,
  `data_timp` datetime DEFAULT NULL,
  `status` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`id_comanda`),
  KEY `id_client` (`id_client`),
  KEY `cod_magazin` (`cod_magazin`),
  KEY `id_angajat` (`id_angajat`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `comanda`
--

INSERT INTO `comanda` (`id_comanda`, `id_client`, `cod_magazin`, `id_angajat`, `data_timp`, `status`) VALUES
(1, 2, 1, 1, '2022-05-01 15:22:50', 'Platita'),
(2, 3, 6, 3, '2022-02-02 12:52:10', 'Platita'),
(3, 4, 5, 5, '2022-02-02 16:22:15', 'Anulata'),
(4, 5, 6, 2, '2022-02-02 16:55:22', 'Platita'),
(5, 6, 7, 2, '2022-02-02 19:20:22', 'Platita'),
(6, 2, 2, 3, '2022-01-29 08:53:00', 'Confirmata');

-- --------------------------------------------------------

--
-- Table structure for table `detalii_comanda`
--

DROP TABLE IF EXISTS `detalii_comanda`;
CREATE TABLE IF NOT EXISTS `detalii_comanda` (
  `id_comanda` smallint NOT NULL,
  `cod_produs` smallint NOT NULL,
  `cantitate` smallint DEFAULT NULL,
  `pret` smallint DEFAULT NULL,
  PRIMARY KEY (`id_comanda`,`cod_produs`),
  KEY `cod_produs` (`cod_produs`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `detalii_comanda`
--

INSERT INTO `detalii_comanda` (`id_comanda`, `cod_produs`, `cantitate`, `pret`) VALUES
(1, 2, 3, 23),
(1, 3, 2, 12),
(3, 3, 2, 16),
(3, 5, 2, 30),
(3, 6, 2, 52),
(5, 5, 10, 30);

-- --------------------------------------------------------

--
-- Table structure for table `furnizor`
--

DROP TABLE IF EXISTS `furnizor`;
CREATE TABLE IF NOT EXISTS `furnizor` (
  `id_furnizor` smallint NOT NULL,
  `nume_companie` varchar(40) NOT NULL,
  `nr_telefon` varchar(15) DEFAULT NULL,
  `nume_reprezentant` varchar(40) NOT NULL,
  `prenume_reprezentant` varchar(40) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_furnizor`),
  UNIQUE KEY `furnizor_tel_email` (`nr_telefon`,`email`)
) ;

--
-- Dumping data for table `furnizor`
--

INSERT INTO `furnizor` (`id_furnizor`, `nume_companie`, `nr_telefon`, `nume_reprezentant`, `prenume_reprezentant`, `email`) VALUES
(1, 'SC. Rosiile nebune', '+40756399123', 'Mircea', 'Tiberiu', 'mirceatiberiu@gmail.com'),
(2, 'Puiul cucurigu SRL', '+40756399123', 'Sarmasanu', 'Sebastian', 'sarmasanusebastian@gmail.com'),
(3, 'Kool Koffee', '+40756555566', 'Furtuna', 'Carina', 'furtunacarina@gmail.com'),
(4, 'Mini Sweets', '+40756399161', 'Popa', 'Bianca', 'popabianca@gmail.com'),
(5, 'Electro-Boom', '+40756399512', 'Mircea', 'Radu', 'mirgelradu@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `magazin`
--

DROP TABLE IF EXISTS `magazin`;
CREATE TABLE IF NOT EXISTS `magazin` (
  `cod_magazin` smallint NOT NULL,
  `nume` varchar(30) NOT NULL,
  `oras` varchar(30) DEFAULT NULL,
  `strada` varchar(255) DEFAULT NULL,
  `nr_telefon` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`cod_magazin`),
  UNIQUE KEY `magazin_nume_tel` (`nume`,`nr_telefon`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `magazin`
--

INSERT INTO `magazin` (`cod_magazin`, `nume`, `oras`, `strada`, `nr_telefon`) VALUES
(1, 'Oltenitei', 'Bucuresti', 'Soseaua Oltenitei 388', '+40745380260'),
(2, 'Sebastian', 'Bucuresti', 'Str. Mihail Sebastian nr. 88C', '+40745487222'),
(3, 'Ferentari', 'Bucuresti', 'Calea Ferentari nr. 62', '+40731325250'),
(4, 'Racari', 'Bucuresti', 'Str. Răcari nr. 5', '+40745680364'),
(5, 'Campului', 'Cluj', 'Str. Câmpului, nr. 9-19', '+40735347666'),
(6, 'Orhideelor', 'Bucuresti', 'Şos. Orhideelor nr. 46', '+40725386234'),
(7, 'Colentina', 'Bucuresti', 'Şos. Colentina nr. 6', '+40735350661'),
(8, 'Tei', 'Bucuresti', 'Str. Barbu Văcărescu nr. 120', '+40744330664'),
(9, 'Tineretului', 'Craiova', 'Str. Tineretului nr. 18C', '+40745332635'),
(10, 'Calea Bucuresti', 'Craiova', 'Calea Bucureşti nr. 72', '+40754336622'),
(11, 'Chimistilor', 'Timisoara', 'Str. Chimistilor nr 5-9', '+40734330555'),
(12, 'Aurel Vlaicu', 'Cluj', 'Str. Aurel Vlaicu nr.182', '+40784538565');

-- --------------------------------------------------------

--
-- Table structure for table `produs`
--

DROP TABLE IF EXISTS `produs`;
CREATE TABLE IF NOT EXISTS `produs` (
  `cod_produs` smallint NOT NULL,
  `id_categorie` smallint NOT NULL,
  `id_furnizor` smallint NOT NULL,
  `nume` varchar(100) NOT NULL,
  `ean` varchar(13) NOT NULL,
  `pret` float DEFAULT NULL,
  `descriere` varchar(255) DEFAULT NULL,
  `tdv` date NOT NULL,
  PRIMARY KEY (`cod_produs`),
  KEY `id_categorie` (`id_categorie`),
  KEY `id_furnizor` (`id_furnizor`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `produs`
--

INSERT INTO `produs` (`cod_produs`, `id_categorie`, `id_furnizor`, `nume`, `ean`, `pret`, `descriere`, `tdv`) VALUES
(1, 2, 2, 'Pulpe pui', '978020137962', 22.34, 'Pulpe dezosate pui', '2022-03-11'),
(2, 2, 2, 'Ceafa Porc', '6431520796946', 13.55, 'Ceafa porc fara os', '2022-02-17'),
(3, 1, 4, 'Ciocolata cu lapte', '3968608000310', 5, 'Ciocolata cu aroma de lapte', '2022-02-11'),
(4, 1, 1, 'Suc fructe padure', '2313840108439', 12, 'Suc natural cu fructe de padure', '2022-09-12'),
(5, 3, 4, 'Stick USB', '5350680141735', 45.5, 'Stick memorie USB 16GB', '2024-11-02'),
(6, 2, 3, 'Activia Iaurt Rodie', '1203912309812', 4.2, 'Este un iaurt de baut, este bun, perfect pentru cereale', '2022-01-30');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `angajat`
--
ALTER TABLE `angajat`
  ADD CONSTRAINT `angajat_ibfk_1` FOREIGN KEY (`cod_magazin`) REFERENCES `magazin` (`cod_magazin`) ON DELETE SET NULL;

--
-- Constraints for table `comanda`
--
ALTER TABLE `comanda`
  ADD CONSTRAINT `comanda_ibfk_1` FOREIGN KEY (`id_client`) REFERENCES `client` (`id_client`),
  ADD CONSTRAINT `comanda_ibfk_2` FOREIGN KEY (`cod_magazin`) REFERENCES `magazin` (`cod_magazin`),
  ADD CONSTRAINT `comanda_ibfk_3` FOREIGN KEY (`id_angajat`) REFERENCES `angajat` (`id_angajat`);

--
-- Constraints for table `detalii_comanda`
--
ALTER TABLE `detalii_comanda`
  ADD CONSTRAINT `detalii_comanda_ibfk_1` FOREIGN KEY (`id_comanda`) REFERENCES `comanda` (`id_comanda`),
  ADD CONSTRAINT `detalii_comanda_ibfk_2` FOREIGN KEY (`cod_produs`) REFERENCES `produs` (`cod_produs`);

--
-- Constraints for table `produs`
--
ALTER TABLE `produs`
  ADD CONSTRAINT `produs_ibfk_1` FOREIGN KEY (`id_categorie`) REFERENCES `categorie` (`id_categorie`),
  ADD CONSTRAINT `produs_ibfk_2` FOREIGN KEY (`id_furnizor`) REFERENCES `furnizor` (`id_furnizor`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
