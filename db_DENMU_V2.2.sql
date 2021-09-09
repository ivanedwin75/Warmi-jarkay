-- phpMyAdmin SQL Dump
-- version 5.1.1-1.fc34.remi
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 07-09-2021 a las 22:05:17
-- Versión del servidor: 8.0.25
-- Versión de PHP: 7.3.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `db_DENMU`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `PA_VERIFICARUSUARIO` (IN `_usu` CHAR(8), IN `_pass` VARCHAR(25))  SELECT
usuario.usu_nombre,
usuario.usu_clave,
CONCAT_WS(' ', efectivos.Cargo, efectivos.Ap_paterno, efectivos.Ap_materno, efectivos.Nombres),
Tipo_usuario.id_Tipo_usuario,
efectivos.id_efectivos,
Tipo_usuario.tipusu_descripcion,
usuario.id_usuario
FROM
efectivos
INNER JOIN usuario ON efectivos_id_efectivos = usuario.id_usuario
INNER JOIN Tipo_usuario ON usuario.Tipo_usuario_id_Tipo_usuario = Tipo_usuario.id_Tipo_usuario
WHERE usuario.usu_nombre = _usu AND usuario.usu_clave = _pass$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Asesor`
--

CREATE TABLE `Asesor` (
  `id_Asesor` int NOT NULL,
  `Ap_paterno` varchar(35) DEFAULT NULL,
  `Ap_materno` varchar(35) DEFAULT NULL,
  `Nombres` varchar(45) DEFAULT NULL,
  `Correo` varchar(45) DEFAULT NULL,
  `Cel` char(9) DEFAULT NULL,
  `Profesion` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asesoria`
--

CREATE TABLE `asesoria` (
  `id_asesoria` int NOT NULL,
  `Motivo` varchar(100) DEFAULT NULL,
  `victima_id_victima` int NOT NULL,
  `Asesor_id_Asesor` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `denuncia`
--

CREATE TABLE `denuncia` (
  `id_denuncia` int NOT NULL,
  `N_exp_juzgado` varchar(8) DEFAULT NULL,
  `Nivel_riesgo` char(1) DEFAULT NULL,
  `N_oficio_fiscalia` varchar(20) DEFAULT NULL,
  `N_oficio_juzgado` varchar(20) DEFAULT NULL,
  `Denuncia_scan` varchar(120) DEFAULT NULL,
  `Demanda_electronica` varchar(120) DEFAULT NULL,
  `Medidas_proteccion` varchar(45) DEFAULT NULL,
  `fiscalia_id_Fiscalia` int NOT NULL,
  `min_pub_id_Min_pub` int NOT NULL,
  `efectivos_id_efectivos` int NOT NULL,
  `victima_id_victima` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `efectivos`
--

CREATE TABLE `efectivos` (
  `id_efectivos` int NOT NULL,
  `Cargo` varchar(10) DEFAULT NULL,
  `Ap_paterno` varchar(35) DEFAULT NULL,
  `Ap_materno` varchar(35) DEFAULT NULL,
  `Nombres` varchar(40) DEFAULT NULL,
  `Dni` char(8) DEFAULT NULL,
  `Cel` char(9) DEFAULT NULL,
  `Correo` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `efectivos`
--

INSERT INTO `efectivos` (`id_efectivos`, `Cargo`, `Ap_paterno`, `Ap_materno`, `Nombres`, `Dni`, `Cel`, `Correo`) VALUES
(1, 'SO3', 'QUISPE', 'HUMPIRI', 'DANIEL', '45453445', '999999999', 'ivanedwin75@gmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entrega`
--

CREATE TABLE `entrega` (
  `id_entrega` int NOT NULL,
  `Direccion` varchar(200) DEFAULT NULL,
  `Referencia` varchar(200) DEFAULT NULL,
  `Cel` char(9) DEFAULT NULL,
  `denuncia_id_denuncia` int NOT NULL,
  `denuncia_fiscalia_id_Fiscalia` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `examen`
--

CREATE TABLE `examen` (
  `id_examen` int NOT NULL,
  `Tipo_examen` varchar(20) DEFAULT NULL,
  `Resultados` varchar(120) DEFAULT NULL,
  `Organizacion` varchar(45) DEFAULT NULL,
  `victima_id_victima` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fiscalia`
--

CREATE TABLE `fiscalia` (
  `id_Fiscalia` int NOT NULL,
  `Org_jurisdiccional` varchar(50) DEFAULT NULL,
  `Fiscal_nombre` varchar(100) DEFAULT NULL,
  `Expediente` varchar(50) DEFAULT NULL,
  `F_presentacion` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `min_pub`
--

CREATE TABLE `min_pub` (
  `id_Min_pub` int NOT NULL,
  `Juzgado` varchar(45) DEFAULT NULL,
  `Juez_nombre` varchar(100) DEFAULT NULL,
  `Expediente` varchar(45) DEFAULT NULL,
  `F_presentacion` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Tipo_usuario`
--

CREATE TABLE `Tipo_usuario` (
  `id_Tipo_usuario` int NOT NULL,
  `tipusu_descripcion` varchar(15) DEFAULT NULL,
  `tipusu_estado` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `Tipo_usuario`
--

INSERT INTO `Tipo_usuario` (`id_Tipo_usuario`, `tipusu_descripcion`, `tipusu_estado`) VALUES
(1, 'ADMINISTRADOR', 'ACTIVO'),
(2, 'VICTIMA', 'ACTIVO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int NOT NULL,
  `usu_nombre` char(8) DEFAULT NULL,
  `usu_clave` varchar(25) DEFAULT NULL,
  `Tipo_usuario_id_Tipo_usuario` int NOT NULL,
  `victima_id_victima` int DEFAULT NULL,
  `efectivos_id_efectivos` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `usu_nombre`, `usu_clave`, `Tipo_usuario_id_Tipo_usuario`, `victima_id_victima`, `efectivos_id_efectivos`) VALUES
(1, 'admin', '123456', 1, NULL, 1),
(2, 'vict', '1234567', 2, 1, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `victima`
--

CREATE TABLE `victima` (
  `id_victima` int NOT NULL,
  `Ap_paterno` varchar(35) DEFAULT NULL,
  `Ap_materno` varchar(35) DEFAULT NULL,
  `Nombres` varchar(40) DEFAULT NULL,
  `Edad` varchar(2) DEFAULT NULL,
  `Est_civil` varchar(15) DEFAULT NULL,
  `Dni` char(8) DEFAULT NULL,
  `Direccion` varchar(200) DEFAULT NULL,
  `Cel` char(9) DEFAULT NULL,
  `F_registro` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `victima`
--

INSERT INTO `victima` (`id_victima`, `Ap_paterno`, `Ap_materno`, `Nombres`, `Edad`, `Est_civil`, `Dni`, `Direccion`, `Cel`, `F_registro`) VALUES
(1, 'QUISPE', 'AQUISE', 'MARGARITA', '25', 'SOLTERO', '74350889', 'AV. LOS ROBLES 445', '951334456', '2021-09-01'),
(2, 'CABANA', 'MAMANI', 'EDGAR', '34', 'SOLTERO', '01988767', 'AV. SIMON BOLIVAR 343', '999333222', '2021-09-01');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `Asesor`
--
ALTER TABLE `Asesor`
  ADD PRIMARY KEY (`id_Asesor`);

--
-- Indices de la tabla `asesoria`
--
ALTER TABLE `asesoria`
  ADD PRIMARY KEY (`id_asesoria`),
  ADD KEY `fk_asesoria_victima1_idx` (`victima_id_victima`),
  ADD KEY `fk_asesoria_Asesor1_idx` (`Asesor_id_Asesor`);

--
-- Indices de la tabla `denuncia`
--
ALTER TABLE `denuncia`
  ADD PRIMARY KEY (`id_denuncia`,`fiscalia_id_Fiscalia`),
  ADD KEY `fk_denuncia_fiscalia_idx` (`fiscalia_id_Fiscalia`),
  ADD KEY `fk_denuncia_min_pub1_idx` (`min_pub_id_Min_pub`),
  ADD KEY `fk_denuncia_efectivos1_idx` (`efectivos_id_efectivos`),
  ADD KEY `fk_denuncia_victima1_idx` (`victima_id_victima`);

--
-- Indices de la tabla `efectivos`
--
ALTER TABLE `efectivos`
  ADD PRIMARY KEY (`id_efectivos`);

--
-- Indices de la tabla `entrega`
--
ALTER TABLE `entrega`
  ADD PRIMARY KEY (`id_entrega`),
  ADD KEY `fk_entrega_denuncia1_idx` (`denuncia_id_denuncia`,`denuncia_fiscalia_id_Fiscalia`);

--
-- Indices de la tabla `examen`
--
ALTER TABLE `examen`
  ADD PRIMARY KEY (`id_examen`),
  ADD KEY `fk_examen_victima1_idx` (`victima_id_victima`);

--
-- Indices de la tabla `fiscalia`
--
ALTER TABLE `fiscalia`
  ADD PRIMARY KEY (`id_Fiscalia`);

--
-- Indices de la tabla `min_pub`
--
ALTER TABLE `min_pub`
  ADD PRIMARY KEY (`id_Min_pub`);

--
-- Indices de la tabla `Tipo_usuario`
--
ALTER TABLE `Tipo_usuario`
  ADD PRIMARY KEY (`id_Tipo_usuario`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`),
  ADD KEY `fk_usuario_Tipo_usuario1_idx` (`Tipo_usuario_id_Tipo_usuario`),
  ADD KEY `fk_usuario_victima1_idx` (`victima_id_victima`),
  ADD KEY `fk_usuario_efectivos1_idx` (`efectivos_id_efectivos`);

--
-- Indices de la tabla `victima`
--
ALTER TABLE `victima`
  ADD PRIMARY KEY (`id_victima`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `Asesor`
--
ALTER TABLE `Asesor`
  MODIFY `id_Asesor` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `asesoria`
--
ALTER TABLE `asesoria`
  MODIFY `id_asesoria` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `denuncia`
--
ALTER TABLE `denuncia`
  MODIFY `id_denuncia` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `efectivos`
--
ALTER TABLE `efectivos`
  MODIFY `id_efectivos` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `entrega`
--
ALTER TABLE `entrega`
  MODIFY `id_entrega` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `examen`
--
ALTER TABLE `examen`
  MODIFY `id_examen` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `fiscalia`
--
ALTER TABLE `fiscalia`
  MODIFY `id_Fiscalia` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `min_pub`
--
ALTER TABLE `min_pub`
  MODIFY `id_Min_pub` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `Tipo_usuario`
--
ALTER TABLE `Tipo_usuario`
  MODIFY `id_Tipo_usuario` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `victima`
--
ALTER TABLE `victima`
  MODIFY `id_victima` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `asesoria`
--
ALTER TABLE `asesoria`
  ADD CONSTRAINT `fk_asesoria_Asesor1` FOREIGN KEY (`Asesor_id_Asesor`) REFERENCES `Asesor` (`id_Asesor`),
  ADD CONSTRAINT `fk_asesoria_victima1` FOREIGN KEY (`victima_id_victima`) REFERENCES `victima` (`id_victima`);

--
-- Filtros para la tabla `denuncia`
--
ALTER TABLE `denuncia`
  ADD CONSTRAINT `fk_denuncia_efectivos1` FOREIGN KEY (`efectivos_id_efectivos`) REFERENCES `efectivos` (`id_efectivos`),
  ADD CONSTRAINT `fk_denuncia_fiscalia` FOREIGN KEY (`fiscalia_id_Fiscalia`) REFERENCES `fiscalia` (`id_Fiscalia`),
  ADD CONSTRAINT `fk_denuncia_min_pub1` FOREIGN KEY (`min_pub_id_Min_pub`) REFERENCES `min_pub` (`id_Min_pub`),
  ADD CONSTRAINT `fk_denuncia_victima1` FOREIGN KEY (`victima_id_victima`) REFERENCES `victima` (`id_victima`);

--
-- Filtros para la tabla `entrega`
--
ALTER TABLE `entrega`
  ADD CONSTRAINT `fk_entrega_denuncia1` FOREIGN KEY (`denuncia_id_denuncia`,`denuncia_fiscalia_id_Fiscalia`) REFERENCES `denuncia` (`id_denuncia`, `fiscalia_id_Fiscalia`);

--
-- Filtros para la tabla `examen`
--
ALTER TABLE `examen`
  ADD CONSTRAINT `fk_examen_victima1` FOREIGN KEY (`victima_id_victima`) REFERENCES `victima` (`id_victima`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `fk_usuario_efectivos1` FOREIGN KEY (`efectivos_id_efectivos`) REFERENCES `efectivos` (`id_efectivos`),
  ADD CONSTRAINT `fk_usuario_Tipo_usuario1` FOREIGN KEY (`Tipo_usuario_id_Tipo_usuario`) REFERENCES `Tipo_usuario` (`id_Tipo_usuario`),
  ADD CONSTRAINT `fk_usuario_victima1` FOREIGN KEY (`victima_id_victima`) REFERENCES `victima` (`id_victima`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
