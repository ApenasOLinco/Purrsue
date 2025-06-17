-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 17, 2025 at 09:06 PM
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
-- Database: `purrsue`
--
CREATE DATABASE IF NOT EXISTS `purrsue` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `purrsue`;

-- --------------------------------------------------------

--
-- Table structure for table `_fotos_gatos`
--

CREATE TABLE `_fotos_gatos` (
  `gato_id` int(11) NOT NULL,
  `gato_foto_caminho` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `_fotos_gatos`
--

INSERT INTO `_fotos_gatos` (`gato_id`, `gato_foto_caminho`) VALUES
(204, 'https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fmedia.tenor.com%2FzBdboxlH4JcAAAAC%2Fmaxwell-cat.gif&f=1&nofb=1&ipt=7874e974a9e860a83b28c67e4342cfe1a4ce39f34bd0582b40503867cdf9838e'),
(210, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSGk7kLfucvI0pG398d1tup0yZ8XHF7WlOvLg&s'),
(221, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT0fHeYGJDLC7dGkV_Oz6Zy4Ww8JSfTEAjBM80xwOmZzb2IsecEqWpEEg8&s=10'),
(222, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQqMKaX5BKAVncT0eJSMN9ZFV_wtr_H0zckeB_HXQEMocei44mybneAOtg&s=10'),
(226, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ9WwMOYu6ASWZAZsVtk6cJRx0zPLaep01FVjDkohz87Ez58ngIz76yymIf&s=10'),
(227, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTNzk6SLVKsoErOvqt_6xjEdkKtX1lFuiN2vA&usqp=CAU'),
(228, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTtnZFtRoz1Q5YFQpTNi0hj8qvXvoXVMYi3pQ&usqp=CAU'),
(229, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ84yuP24jR8QYL11O_SRF6VMdoBPqaxZxMTQ&usqp=CAU'),
(230, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQZFHwQyShIc_g0OKQev4s_lkEzI3_SStDqIA&usqp=CAU'),
(230, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSkaCTOtwfNRsVTliFijzMbzZwvO318_ssThQ&usqp=CAU'),
(231, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSMfvCqG1NEdLNW0UV6U9Rz-uro8xs6NWnCkg&usqp=CAU'),
(231, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSYDdbmJNC6PswKtoBdYBzrVP6y0hNSIJRQfw&usqp=CAU'),
(231, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTd8fG0omE0ptrD_LjBu-ux_kzuAZw7mFdLhA&usqp=CAU'),
(231, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTr-DbpdhDXobpErH098TZq6XjyBkKBpvDsBQ&usqp=CAU'),
(231, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTs4pUT5EHtGoSLcdIuvcYtLPaTnoCiw3Ev_g&usqp=CAU');

-- --------------------------------------------------------

--
-- Table structure for table `_gatos`
--

CREATE TABLE `_gatos` (
  `id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `descricao` varchar(400) NOT NULL,
  `raca` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `_gatos`
--

INSERT INTO `_gatos` (`id`, `usuario_id`, `nome`, `descricao`, `raca`) VALUES
(204, 2, 'MAXWELL', 'ELE PARECE UM PÃO', 'karl marxwell'),
(210, 2, 'GATORRO', 'Ele late...', 'Gatorro'),
(221, 2, 'Gato pão, pão gato', 'Ele é um gato, mas é um pão também. Impressionante!!!!', 'Pão + Gato = Pato'),
(222, 2, 'Gato enorme', 'Descricao enormeDescricao enormeDescricao enormeDescricao enormeDescricao enormeDescricao enormeDescricao enormeDescricao enormeDescricao enormeDescricao enormeDescricao enormeDescricao enormeDescricao enormeDescricao enormeDescricao enormeDescricao enormeDescricao enormeDescricao enormeDescricao enormeDescricao enormeDescricao enorme', 'Enorme'),
(226, 2, 'Gato banho', 'Ele ou ela tomou um banho e agora tá de touquinha. Que legal!', 'Banheira'),
(227, 2, 'Gato largo', 'Esse gato é excessivamente largo - provavelmente por um infortúnio causado pela magia da edição de imagem; apesar disso, um enorme sorriso cobre seu rosto de orelha a orelha. Devemos nos inspirar em gatos como esse na nossa vida. Sorrir através da dor. Te amo, gatinho largo. Te amo.', 'Hiper larga'),
(228, 2, 'Gato fuçante', 'Ele tá fuçando você. Fique parado e deixe ele te fuçar.', 'Fuçante'),
(229, 2, 'Gato bobinho', 'Porque ser bobinho nunca sai da moda!', 'Linguarudo'),
(230, 2, 'Gato duas caras', 'Duas caras, duas fotos', 'Ambígua'),
(231, 2, 'O GATO DE MIL FACES', 'O TESTE SUPREMO PRO LAYOUT DESTE SITE. 5 IMAGENS', 'MIL RAÇAS');

-- --------------------------------------------------------

--
-- Table structure for table `_usuarios`
--

CREATE TABLE `_usuarios` (
  `id` int(11) NOT NULL,
  `usuario` varchar(100) NOT NULL,
  `senha` varchar(20) NOT NULL,
  `email` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `_usuarios`
--

INSERT INTO `_usuarios` (`id`, `usuario`, `senha`, `email`) VALUES
(2, 'LINCO', 'linco123', 'linco@linco.com'),
(3, 'NLINCO', 'linco321', 'linco@com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `_fotos_gatos`
--
ALTER TABLE `_fotos_gatos`
  ADD PRIMARY KEY (`gato_id`,`gato_foto_caminho`);

--
-- Indexes for table `_gatos`
--
ALTER TABLE `_gatos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuario_id` (`usuario_id`);

--
-- Indexes for table `_usuarios`
--
ALTER TABLE `_usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `usuario` (`usuario`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `_gatos`
--
ALTER TABLE `_gatos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=235;

--
-- AUTO_INCREMENT for table `_usuarios`
--
ALTER TABLE `_usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `_fotos_gatos`
--
ALTER TABLE `_fotos_gatos`
  ADD CONSTRAINT `gatos_fotos_fk` FOREIGN KEY (`gato_id`) REFERENCES `_gatos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `_gatos`
--
ALTER TABLE `_gatos`
  ADD CONSTRAINT `fk_usuario_id` FOREIGN KEY (`usuario_id`) REFERENCES `_usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
