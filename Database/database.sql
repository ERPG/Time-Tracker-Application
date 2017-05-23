-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 22-05-2017 a las 07:56:36
-- Versión del servidor: 5.6.35
-- Versión de PHP: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de datos: `Tasks_DB`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tasks_`
--

CREATE TABLE `tasks_` (
  `id_task` int(11) NOT NULL,
  `task` varchar(25) NOT NULL,
  `time_init` timestamp NULL DEFAULT NULL,
  `time_end` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tasks_`
--
ALTER TABLE `tasks_`
  ADD PRIMARY KEY (`id_task`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tasks_`
--
ALTER TABLE `tasks_`
  MODIFY `id_task` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=179;