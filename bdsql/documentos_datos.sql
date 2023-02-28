-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-02-2023 a las 05:36:17
-- Versión del servidor: 10.1.37-MariaDB
-- Versión de PHP: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `documentos`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `doc_documento`
--

CREATE TABLE `doc_documento` (
  `DOC_ID` int(11) NOT NULL,
  `DOC_NOMBRE` varchar(60) COLLATE utf8_spanish_ci NOT NULL,
  `DOC_CODIGO` varchar(60) COLLATE utf8_spanish_ci NOT NULL,
  `DOC_CONTENIDO` varchar(4000) COLLATE utf8_spanish_ci NOT NULL,
  `DOC_ID_TIPO` int(11) NOT NULL,
  `DOC_ID_PROCESO` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `doc_documento`
--

INSERT INTO `doc_documento` (`DOC_ID`, `DOC_NOMBRE`, `DOC_CODIGO`, `DOC_CONTENIDO`, `DOC_ID_TIPO`, `DOC_ID_PROCESO`) VALUES
(1, 'INSTRUCTIVO DE DESARROLLO', 'INS-ING-1', 'Este documento pretende ser una herramienta para que a través de los procesos del\r\nHospital Universitario del Valle, se elabore el diagnóstico de la situación actual de la\r\nEntidad y permita a la nueva Administración, la base de orientación para que determine la\r\ndirección estratégica del nuevo plan, para los años 2016 – 2019.\r\nLa planeación estratégica, es un instrumento que facilita los diagnósticos, los análisis y la\r\ntoma de decisiones, para focalizarlos hacia los asuntos prioritarios que contribuyan al\r\ndesarrollo de una buena gestión en el Hospital.\r\nEl propósito final de ésta guía es orientar2\r\n, el mejoramiento continuo de la gestión que\r\nredunde en la calidad y atención del usuario interno y externo.\r\nLa Constitución y la Ley, exige a las entidades fijar objetivos, metas, planes de inversión y\r\npresupuestos e informar a las comunidad sobre los avances y resultados alcanzados.\r\n', 1, 1),
(2, 'FORMATOS DE HOSPITALIZACION', 'FOR-MED-1', 'HOJA DE HOSPITALIZACION • También llamada de egreso hospitalario u hojas largas. • • Para el llenado de este formato el medico debe consultar el expediente clínico. • • Si le faltan datos, el diagnostico o procemientos no concuerdan, será regresado con el responsable de su llenado.\r\n\r\nHOJA DE HOSPITALIZACION\r\n\r\nHOJA DE HOSPITALIZACION\r\n\r\nHOJA DE HOSPITALIZACION\r\n\r\nHOJA DE HOSPITALIZACION\r\n\r\nHOJA DE HOSPITALIZACION\r\n\r\nHOJA DE HOSPITALIZACION\r\n\r\nHOJA DIARIA DEL SERVICIO DE URGENCIAS', 2, 2),
(3, 'PROCEDIMIENTO CONTABLE', 'PRO-CONT-1', 'Los Procedimientos Contables, incorporados al Régimen de Contabilidad Pública (RCP), son el conjunto de directrices de carácter vinculante que, con base en el Marco Conceptual y en las Normas, desarrollan los procesos de reconocimiento, medición, revelación y presentación por temas particulares. Por ende, estos deben ser observados por la entidad cuando desarrolle alguna de las actividades que están reguladas en el procedimiento.', 3, 4),
(4, 'PROGRAMA DE INICIALIZACIÓN', 'PRO-ID-1', 'En informática, el arranque o secuencia de arranque (en inglés: bootstrapping, boot o booting) es el proceso que inicia el gestor de arranque que es un programa ejecutado por el BIOS cuando se enciende una computadora. Se encarga de la inicialización del sistema operativo y de los dispositivos', 4, 3),
(5, 'POLITICAS ADMINISTRATIVAS', 'POL-ADM-1', 'Políticas de administración ¿Qué son? La principal función de una política administrativa en una empresa, es facilitar la administración burocrática y permitir que se obtengan utilidades. Estas políticas alcanzan su cometido, cuando por medio de ellas, se permite efectuar los procesos y actividades organizativas, logrando su objetivo.', 5, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pro_proceso`
--

CREATE TABLE `pro_proceso` (
  `PRO_ID` int(11) NOT NULL,
  `PRO_PREFIJO` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `PRO_NOMBRE` varchar(60) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `pro_proceso`
--

INSERT INTO `pro_proceso` (`PRO_ID`, `PRO_PREFIJO`, `PRO_NOMBRE`) VALUES
(1, 'Ingeniería', 'ING'),
(2, 'Medicina', 'MED'),
(3, 'Idiomas', 'ID'),
(4, 'Contaduria', 'CONT'),
(5, 'Administración', 'ADM');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tip_tipo_doc`
--

CREATE TABLE `tip_tipo_doc` (
  `TIP_ID` int(11) NOT NULL,
  `TIP_NOMBRE` varchar(60) COLLATE utf8_spanish_ci NOT NULL,
  `TIP_PREFIJO` varchar(20) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tip_tipo_doc`
--

INSERT INTO `tip_tipo_doc` (`TIP_ID`, `TIP_NOMBRE`, `TIP_PREFIJO`) VALUES
(1, 'Instructivo', 'INS'),
(2, 'Formatos', 'FOR'),
(3, 'Procedimientos', 'PRO'),
(4, 'Programas', 'PROG'),
(5, 'Politicas', 'POL');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `doc_documento`
--
ALTER TABLE `doc_documento`
  ADD PRIMARY KEY (`DOC_ID`),
  ADD KEY `DOC_PROCESO` (`DOC_ID_PROCESO`) USING BTREE,
  ADD KEY `DOC_TIPO` (`DOC_ID_TIPO`) USING BTREE;

--
-- Indices de la tabla `pro_proceso`
--
ALTER TABLE `pro_proceso`
  ADD PRIMARY KEY (`PRO_ID`),
  ADD KEY `PRO_ID` (`PRO_ID`);

--
-- Indices de la tabla `tip_tipo_doc`
--
ALTER TABLE `tip_tipo_doc`
  ADD PRIMARY KEY (`TIP_ID`),
  ADD KEY `TIP_ID` (`TIP_ID`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `doc_documento`
--
ALTER TABLE `doc_documento`
  MODIFY `DOC_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT de la tabla `pro_proceso`
--
ALTER TABLE `pro_proceso`
  MODIFY `PRO_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `tip_tipo_doc`
--
ALTER TABLE `tip_tipo_doc`
  MODIFY `TIP_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `doc_documento`
--
ALTER TABLE `doc_documento`
  ADD CONSTRAINT `doc_documento_ibfk_1` FOREIGN KEY (`DOC_ID_TIPO`) REFERENCES `tip_tipo_doc` (`TIP_ID`),
  ADD CONSTRAINT `doc_documento_ibfk_2` FOREIGN KEY (`DOC_ID_PROCESO`) REFERENCES `pro_proceso` (`PRO_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
