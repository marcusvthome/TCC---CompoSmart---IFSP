-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 02, 2021 at 03:02 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bdcompostagem`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbcoordenada`
--

CREATE TABLE `tbcoordenada` (
  `Id` int(11) NOT NULL,
  `CodSecao` int(11) NOT NULL,
  `Horizontal` double NOT NULL,
  `Vertical` double NOT NULL,
  `Temperatura` double NOT NULL,
  `Umidade` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbcoordenada`
--

INSERT INTO `tbcoordenada` (`Id`, `CodSecao`, `Horizontal`, `Vertical`, `Temperatura`, `Umidade`) VALUES
(608, 100, 1, 0.5, 30, 35),
(609, 100, 1, 0.5, 27, 34),
(610, 100, 1, 0.5, 30, 35),
(611, 101, 1, 0.5, 36, 40),
(612, 101, 1, 0.5, 40, 45),
(613, 101, 1, 0.5, 34, 38),
(614, 102, 1, 0.5, 35, 42),
(615, 102, 1, 0.5, 49, 68),
(616, 102, 1, 0.5, 37, 46),
(617, 103, 1, 0.5, 35, 46),
(618, 103, 1, 0.5, 63, 80),
(619, 103, 1, 0.5, 34, 44),
(620, 104, 1, 0.5, 33, 42),
(621, 104, 1, 0.5, 42, 50),
(622, 104, 1, 0.5, 35, 45),
(623, 105, 1, 0.5, 32, 40),
(624, 105, 1, 0.5, 36, 49),
(625, 105, 1, 0.5, 30, 38),
(626, 106, 1, 0.5, 33, 42),
(627, 106, 1, 0.5, 38, 52),
(628, 106, 1, 0.5, 32, 45),
(629, 107, 1, 0.5, 30, 45),
(630, 107, 1, 0.5, 19, 42),
(631, 107, 1, 0.5, 32, 40),
(632, 108, 1, 0.5, 31, 42),
(633, 108, 1, 0.5, 35, 46),
(634, 108, 1, 0.5, 30, 39);

-- --------------------------------------------------------

--
-- Table structure for table `tblinha`
--

CREATE TABLE `tblinha` (
  `Id` int(11) NOT NULL,
  `NomeLinha` varchar(255) NOT NULL,
  `DataCriacao` date NOT NULL,
  `Local` varchar(255) NOT NULL,
  `TipoComposto` varchar(255) NOT NULL,
  `Descricao` varchar(255) NOT NULL,
  `Tamanho` varchar(15) NOT NULL,
  `Estagio` varchar(255) NOT NULL,
  `Status` int(11) NOT NULL,
  `CodFuncionario` int(11) NOT NULL,
  `DataCadastro` date NOT NULL,
  `HoraCadastro` time NOT NULL,
  `CodLinhaMesclada` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblinha`
--

INSERT INTO `tblinha` (`Id`, `NomeLinha`, `DataCriacao`, `Local`, `TipoComposto`, `Descricao`, `Tamanho`, `Estagio`, `Status`, `CodFuncionario`, `DataCadastro`, `HoraCadastro`, `CodLinhaMesclada`) VALUES
(100, 'Linha 1 2x1', '2021-02-02', 'Sítio de Compostagem 1', 'C/N igual a 30/1', '', '2m x 1m', 'Inicial', 1, 27, '2021-11-20', '17:59:03', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbsecao`
--

CREATE TABLE `tbsecao` (
  `Id` int(11) NOT NULL,
  `CodLinha` int(11) NOT NULL,
  `PosicaoLinha` double NOT NULL,
  `DataCriacao` date NOT NULL,
  `DataCadastro` date NOT NULL,
  `HoraCadastro` time NOT NULL,
  `NomeFuncionario` varchar(40) NOT NULL,
  `CodFuncionarioCadastro` int(11) NOT NULL,
  `Observacao` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbsecao`
--

INSERT INTO `tbsecao` (`Id`, `CodLinha`, `PosicaoLinha`, `DataCriacao`, `DataCadastro`, `HoraCadastro`, `NomeFuncionario`, `CodFuncionarioCadastro`, `Observacao`) VALUES
(100, 100, 1, '2021-02-02', '2021-11-20', '18:02:18', 'Guilherme', 27, 0),
(101, 100, 2, '2021-02-03', '2021-11-20', '18:03:12', 'Guilherme', 27, 0),
(102, 100, 2.5, '2021-02-05', '2021-11-20', '18:04:34', 'Marcus', 27, 0),
(103, 100, 3, '2021-02-07', '2021-11-20', '18:05:49', 'Guilherme', 27, 0),
(104, 100, 5, '2021-03-07', '2021-11-20', '18:06:45', 'Paulo', 27, 0),
(105, 100, 12, '2021-03-18', '2021-11-20', '18:07:33', 'Guilherme', 27, 0),
(106, 100, 15, '2021-04-11', '2021-11-20', '18:08:11', 'Marcus', 27, 0),
(107, 100, 20, '2021-04-15', '2021-11-20', '18:09:42', 'Guilherme', 27, 0),
(108, 100, 11, '2021-03-08', '2021-11-20', '18:11:13', 'Marcus', 27, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbusuario`
--

CREATE TABLE `tbusuario` (
  `id` int(11) NOT NULL,
  `Nome` varchar(255) CHARACTER SET utf8 NOT NULL,
  `DataNasc` date NOT NULL,
  `Telefone` varchar(15) CHARACTER SET ucs2 NOT NULL,
  `Funcao` varchar(255) CHARACTER SET utf8 NOT NULL,
  `Email` varchar(255) CHARACTER SET utf8 NOT NULL,
  `Senha` varchar(255) CHARACTER SET utf8 NOT NULL,
  `Status` varchar(15) CHARACTER SET utf8 NOT NULL,
  `img` varchar(255) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbusuario`
--

INSERT INTO `tbusuario` (`id`, `Nome`, `DataNasc`, `Telefone`, `Funcao`, `Email`, `Senha`, `Status`, `img`) VALUES
(27, 'Administrador', '2000-01-01', '(17) 98120-4215', 'Administrador', 'admin@compost.com', '21232f297a57a5a743894a0e4a801fc3', 'Ativo', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbcoordenada`
--
ALTER TABLE `tbcoordenada`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `tblinha`
--
ALTER TABLE `tblinha`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `tbsecao`
--
ALTER TABLE `tbsecao`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `tbusuario`
--
ALTER TABLE `tbusuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbcoordenada`
--
ALTER TABLE `tbcoordenada`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=635;

--
-- AUTO_INCREMENT for table `tblinha`
--
ALTER TABLE `tblinha`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `tbsecao`
--
ALTER TABLE `tbsecao`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;

--
-- AUTO_INCREMENT for table `tbusuario`
--
ALTER TABLE `tbusuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
