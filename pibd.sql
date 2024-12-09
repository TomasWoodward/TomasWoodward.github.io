-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-12-2024 a las 23:30:27
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `pibd`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `albumes`
--

CREATE TABLE `albumes` (
  `idAlbum` int(11) NOT NULL,
  `titulo` text NOT NULL,
  `descripcion` text NOT NULL,
  `usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `albumes`
--

INSERT INTO `albumes` (`idAlbum`, `titulo`, `descripcion`, `usuario`) VALUES
(1, 'Vacaciones en la playa', 'Fotos de mis vacaciones en 2023', 1),
(2, 'Mi cumpleaños', 'Álbum de mi fiesta de cumpleaños', 2),
(3, 'Viaje a Europa', 'Imágenes de mi recorrido por Europa', 3),
(4, 'Mi perro', 'Fotos de mi mascota', 4),
(5, 'Graduación', 'Recuerdos de mi graduación', 5),
(6, 'Naturaleza', 'Paisajes naturales y fotos de viajes', 1),
(7, 'Comida favorita', 'Platillos que me encantan', 6),
(8, 'Amigos', 'Fotos con mis amigos', 11),
(9, 'Hobbies', 'Imágenes relacionadas con mis pasatiempos', 1),
(10, 'Familia', 'Recuerdos familiares', 11),
(11, 'Prueba de album', 'Esto es una prueba del album a ver si se inserta', 13);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estilos`
--

CREATE TABLE `estilos` (
  `idEstilo` int(11) NOT NULL,
  `nombre` text NOT NULL,
  `descripcion` text NOT NULL,
  `fichero` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `estilos`
--

INSERT INTO `estilos` (`idEstilo`, `nombre`, `descripcion`, `fichero`) VALUES
(1, 'default', 'Estilo predeterminado', ''),
(2, 'dark theme', 'Tema oscuro', ''),
(3, 'high contrast', 'Alto contraste', ''),
(4, 'big font', 'Fuente grande', ''),
(5, 'high big', 'Contraste alto con fuente grande', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fotos`
--

CREATE TABLE `fotos` (
  `idFoto` int(11) NOT NULL,
  `titulo` text NOT NULL,
  `descripcion` text NOT NULL,
  `fecha` date DEFAULT NULL,
  `pais` int(11) DEFAULT NULL,
  `album` int(11) NOT NULL,
  `fichero` text NOT NULL,
  `alternativo` text NOT NULL,
  `fRegistro` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `fotos`
--

INSERT INTO `fotos` (`idFoto`, `titulo`, `descripcion`, `fecha`, `pais`, `album`, `fichero`, `alternativo`, `fRegistro`) VALUES
(1, 'Atardecer en la playa', 'Hermoso atardecer en el mar', '2024-01-15', 5, 1, 'atardecer_playa.jpg', 'Foto de un atardecer', '2024-11-18 12:17:24'),
(2, 'Fiesta de cumpleaños', 'Celebrando mi cumpleaños con amigos', '2023-09-10', 5, 2, 'cumpleaños.jpg', 'Fiesta de cumpleaños', '2024-11-18 12:17:24'),
(3, 'Torre Eiffel', 'Visitando París en mi viaje a Europa', '2022-06-05', 7, 3, 'torre_eiffel.jpg', 'Foto de la Torre Eiffel', '2024-11-18 12:17:24'),
(4, 'Mi perro Max', 'Foto de Max en el parque', '2023-03-20', 5, 4, 'mi_perro.jpg', 'Foto de un perro', '2024-11-18 12:17:24'),
(5, 'Ceremonia de graduación', 'Momento especial de la ceremonia', '2023-07-15', 5, 5, 'graduacion.jpg', 'Foto de una graduación', '2024-11-18 12:17:24'),
(6, 'Cascada', 'Hermosa cascada en la selva', '2023-05-10', 4, 6, 'cascada.jpg', 'Foto de una cascada', '2024-11-18 12:17:24'),
(7, 'Cena especial', 'Platillo de una cena memorable', '2024-02-14', 6, 7, 'cena.jpg', 'Foto de comida', '2024-11-18 12:17:24'),
(8, 'Reunión de amigos', 'Foto de una reunión con mis mejores amigos', '2023-12-01', 5, 8, 'reunion_amigos.jpg', 'Foto de amigos', '2024-11-18 12:17:24'),
(9, 'Mi hobby: pintura', 'Mi última obra de arte en acuarela', '2023-08-18', 5, 9, 'hobby_pintura.jpg', 'Foto de pintura', '2024-11-18 12:17:24'),
(10, 'Foto familiar', 'Foto con toda mi familia en Navidad', '2023-12-25', 5, 10, 'familia_navidad.jpg', 'Foto familiar', '2024-11-18 12:17:24'),
(11, 'Amanecer en la playa', 'Fotografía de un amanecer en la playa con colores vibrantes.', '2024-11-01', 1, 1, 'playa_amanecer.jpg', 'Amanecer en la costa', '2024-11-18 16:57:28'),
(12, 'Montañas nevadas', 'Vista panorámica de montañas cubiertas de nieve.', '2024-11-02', 2, 2, 'montanas_nevadas.jpg', 'Paisaje de invierno', '2024-11-18 16:57:28'),
(13, 'Ciudad nocturna', 'Luces de una ciudad iluminada durante la noche.', '2024-11-03', 3, 3, 'ciudad_nocturna.jpg', 'Luces de ciudad', '2024-11-18 16:57:28'),
(14, 'Bosque en otoño', 'Colores cálidos de las hojas caídas en un bosque.', '2024-11-04', 4, 4, 'bosque_otono.jpg', 'Hojas de otoño', '2024-11-18 16:57:28'),
(15, 'Desierto dorado', 'Dunas de arena bajo un sol brillante.', '2024-11-05', 5, 5, 'desierto_dorado.jpg', 'Dunas del desierto', '2024-11-18 16:57:28'),
(57, 'Fotillo', 'Aqui intentando subir una fotillo', '2024-12-08', 1, 8, 'Captura de pantalla 2024-11-30 172106.png', 'INTENTANDO SUBIR UNA FOTO', '2024-12-08 21:23:49'),
(58, 'Fotillo', 'Aqui intentando subir una fotillo', '2024-12-08', 1, 8, 'Captura de pantalla 2024-11-30 172106.png', 'INTENTANDO SUBIR PUTA FOTO', '2024-12-08 21:33:19'),
(59, 'En amor y compañia', 'En amor y compañia con mi gente como debe ser', '2024-12-06', 1, 10, 'Captura de pantalla 2024-11-30 172106.png', 'Fotillo alternativa', '2024-12-08 21:41:27'),
(60, 'Nueva Foto', 'Nueva Foto', '2024-12-15', 4, 10, 'Captura de pantalla 2024-11-30 172106.png', 'Nueva foto', '2024-12-08 21:46:33');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paises`
--

CREATE TABLE `paises` (
  `idPais` int(11) NOT NULL,
  `nombre` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `paises`
--

INSERT INTO `paises` (`idPais`, `nombre`) VALUES
(1, 'Argentina'),
(2, 'Brasil'),
(3, 'Chile'),
(4, 'Colombia'),
(5, 'España'),
(6, 'Estados Unidos'),
(7, 'Francia'),
(8, 'Italia'),
(9, 'México'),
(10, 'Japón');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solicitudes`
--

CREATE TABLE `solicitudes` (
  `idSolicitud` int(11) NOT NULL,
  `album` int(11) NOT NULL,
  `nombre` text NOT NULL,
  `titulo` text NOT NULL,
  `descripcion` text NOT NULL,
  `email` text NOT NULL,
  `direccion` text NOT NULL,
  `telefono` int(20) NOT NULL,
  `color` text NOT NULL,
  `copias` int(11) NOT NULL,
  `resolucion` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `iColor` tinyint(1) NOT NULL,
  `fRegistro` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `coste` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `solicitudes`
--

INSERT INTO `solicitudes` (`idSolicitud`, `album`, `nombre`, `titulo`, `descripcion`, `email`, `direccion`, `telefono`, `color`, `copias`, `resolucion`, `fecha`, `iColor`, `fRegistro`, `coste`) VALUES
(11, 1, 'Juan Pérez', '', 'Impresión de álbum familiar', 'usuario1@example.com', 'Calle 123, Ciudad', 0, 'rojo', 2, 300, '2024-11-18', 1, '2024-11-18 13:03:53', 25.50),
(12, 2, 'Ana López', '', 'Fotografías de boda', 'usuario2@example.com', 'Avenida 45, Ciudad', 0, 'azul', 1, 600, '2024-11-15', 0, '2024-11-18 13:03:53', 15.75),
(13, 3, 'Carlos Gómez', '', 'Álbum de vacaciones', 'usuario3@example.com', 'Calle Real 67, Ciudad', 0, 'verde', 3, 300, '2024-11-16', 1, '2024-11-18 13:03:53', 30.00),
(14, 4, 'María Torres', '', 'Álbum de aniversario', 'usuario4@example.com', 'Boulevard Central, Ciudad', 0, 'amarillo', 2, 400, '2024-11-14', 1, '2024-11-18 13:03:53', 20.00),
(15, 5, 'Luis Fernández', '', 'Álbum de cumpleaños', 'usuario5@example.com', 'Calle Nueva 89, Ciudad', 0, 'morado', 4, 200, '2024-11-13', 0, '2024-11-18 13:03:53', 18.90),
(16, 1, 'Laura Sánchez', '', 'Impresión de portafolio', 'usuario6@example.com', 'Plaza Mayor, Ciudad', 0, 'naranja', 1, 500, '2024-11-17', 1, '2024-11-18 13:03:53', 22.50),
(17, 2, 'Pedro Castillo', '', 'Fotografías escolares', 'usuario7@example.com', 'Zona Industrial, Ciudad', 0, 'blanco', 2, 300, '2024-11-12', 0, '2024-11-18 13:03:53', 12.75),
(18, 3, 'Sofía Méndez', '', 'Álbum de graduación', 'usuario8@example.com', 'Colonia Jardines, Ciudad', 0, 'negro', 3, 600, '2024-11-11', 1, '2024-11-18 13:03:53', 35.00),
(19, 4, 'Miguel Ramírez', '', 'Álbum de viaje', 'usuario9@example.com', 'Residencial Sur, Ciudad', 0, 'gris', 1, 400, '2024-11-10', 1, '2024-11-18 13:03:53', 19.80),
(20, 5, 'Elena Duarte', '', 'Álbum corporativo', 'usuario10@example.com', 'Centro Histórico, Ciudad', 0, 'rosa', 2, 300, '2024-11-09', 0, '2024-11-18 13:03:53', 28.40),
(21, 1, 'pong', 'Prueba', 'asdasd', 'avm157@msloud.alu.es', 'asda403619Cordova', 7337333, '', 1, 150, '0000-00-00', 127, '0000-00-00 00:00:00', 12.00),
(22, 1, 'Prueba', 'Prueba', 'asdasd', 'avm157@msloud.alu.es', 'asda403619Cordova', 7337333, '', 2, 150, '0000-00-00', 127, '0000-00-00 00:00:00', 24.00),
(23, 10, 'Nueva solicitud', 'Prueba', 'asdasd', 'avm157@msloud.alu.es', 'asda403619Cordova', 7337333, '1', 2, 150, '0000-00-00', 127, '0000-00-00 00:00:00', 25.00),
(24, 10, 'Nueva solicitud', 'Prueba', 'asdasd', 'avm157@msloud.alu.es', 'asda403619Cordova', 7337333, '', 1, 150, '0000-00-00', 127, '0000-00-00 00:00:00', 12.00),
(25, 10, 'Probando calculos', 'Prueba', 'asdasd', 'avm157@msloud.alu.es', 'asda403619Cordova', 7337333, '', 1, 150, '0000-00-00', 127, '0000-00-00 00:00:00', 14.00),
(26, 10, 'Mas pruebas', 'Prueba', 'asdasd', 'avm157@msloud.alu.es', 'asda403619Cordova', 7337333, '', 1, 150, '0000-00-00', 127, '0000-00-00 00:00:00', 12.00),
(27, 10, 'Mas pruebas', 'Prueba', 'asdasd', 'avm157@msloud.alu.es', 'asda403619Cordova', 7337333, '', 1, 150, '0000-00-00', 127, '0000-00-00 00:00:00', 12.00);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `idUsuario` int(11) NOT NULL,
  `nomUsuario` text NOT NULL,
  `clave` text NOT NULL,
  `email` text NOT NULL,
  `sexo` tinyint(4) NOT NULL,
  `fNacimiento` date NOT NULL,
  `ciudad` text NOT NULL,
  `pais` int(11) NOT NULL,
  `foto` text NOT NULL,
  `fRegistro` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `estilo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`idUsuario`, `nomUsuario`, `clave`, `email`, `sexo`, `fNacimiento`, `ciudad`, `pais`, `foto`, `fRegistro`, `estilo`) VALUES
(1, 'user1', 'pass1', 'usuario1@example.com', 1, '1990-01-01', 'Madrid', 5, 'foto1.jpg', '2024-11-20 12:20:27', 1),
(2, 'usuario2', 'clave2', 'usuario2@example.com', 2, '1992-02-15', 'Barcelona', 5, 'foto2.jpg', '2024-11-18 12:12:14', 2),
(3, 'usuario3', 'clave3', 'usuario3@example.com', 1, '1985-05-10', 'Buenos Aires', 1, 'foto3.jpg', '2024-11-18 12:12:14', 3),
(4, 'usuario4', 'clave4', 'usuario4@example.com', 2, '1998-08-20', 'Santiago', 3, 'foto4.jpg', '2024-11-18 12:12:14', 4),
(5, 'usuario5', 'clave5', 'usuario5@example.com', 1, '1995-12-25', 'Bogotá', 4, 'foto5.jpg', '2024-11-18 12:12:14', 5),
(6, 'usuario6', 'clave6', 'usuario6@example.com', 2, '1993-07-07', 'Ciudad de México', 9, 'foto6.jpg', '2024-11-18 12:12:14', 1),
(7, 'usuario7', 'clave7', 'usuario7@example.com', 1, '1999-11-30', 'Nueva York', 6, 'foto7.jpg', '2024-11-18 12:12:14', 2),
(8, 'usuario8', 'clave8', 'usuario8@example.com', 2, '2000-03-14', 'París', 7, 'foto8.jpg', '2024-11-18 12:12:14', 3),
(9, 'usuario9', 'clave9', 'usuario9@example.com', 1, '1991-06-18', 'Roma', 8, 'foto9.jpg', '2024-11-18 12:12:14', 4),
(10, 'usuario10', 'clave10', 'usuario10@example.com', 2, '1987-04-22', 'Tokio', 10, 'foto10.jpg', '2024-11-18 12:12:14', 5),
(11, 'tomi', '$2y$10$0/QOoKOqWGmpoo64acYSQu3pL/r4cU/IN2iyQWidxmSxEGk4MXPBy', 'tomiwoodward86@gmail.com', 1, '0000-00-00', 'Setcases', 1, 'user.jpg', '2024-12-08 22:16:35', 1),
(12, 'paula', '$2y$10$jelcw6xlyyGyq6jvJ.95Gu5Rh6bhk8c4FSfc8GYzIlyyL6UdvzUfS', 'paula@gmail.com', 2, '0000-00-00', 'alicante', 5, 'user.jpg', '2024-11-21 11:15:32', 1),
(13, 'alex', '$2y$10$m0n64qgDNQAlomrwLkupne9nchmY2ioixAwt29s6eLkOu8IG/ZfQO', 'alex@gmail.com', 1, '0000-00-00', 'ALICANTE', 5, 'user.jpg', '2024-12-05 10:12:06', 1),
(14, 'alex2', '$2y$10$nXEFwx6xco.sedF6GIz/r.faUX4/2QwKjBBvuaUtpHxXpA5UhMu6C', 'alex2@gmail.com', 2, '2024-10-25', 'Setcases', 5, 'user.jpg', '2024-11-22 12:48:54', 1),
(15, 'felipe', '$2y$10$zZt4xCAWKfXt81wp/ryruOc9bL/s5lTVN52WDDEh/vz3SRfyvgEO6', 'felipe@gmail.com', 1, '0000-00-00', 'cordova', 1, 'user.jpg', '2024-12-08 15:22:32', 3);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `albumes`
--
ALTER TABLE `albumes`
  ADD PRIMARY KEY (`idAlbum`),
  ADD KEY `fKeyUsuarios` (`usuario`);

--
-- Indices de la tabla `estilos`
--
ALTER TABLE `estilos`
  ADD PRIMARY KEY (`idEstilo`);

--
-- Indices de la tabla `fotos`
--
ALTER TABLE `fotos`
  ADD PRIMARY KEY (`idFoto`),
  ADD KEY `fKeyPais` (`pais`),
  ADD KEY `fKeyAlbums` (`album`);

--
-- Indices de la tabla `paises`
--
ALTER TABLE `paises`
  ADD PRIMARY KEY (`idPais`);

--
-- Indices de la tabla `solicitudes`
--
ALTER TABLE `solicitudes`
  ADD PRIMARY KEY (`idSolicitud`),
  ADD KEY `fKeyAlbum` (`album`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`idUsuario`),
  ADD UNIQUE KEY `nomUsuario` (`nomUsuario`) USING HASH,
  ADD KEY `keyPaises` (`pais`),
  ADD KEY `keyEstilo` (`estilo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `albumes`
--
ALTER TABLE `albumes`
  MODIFY `idAlbum` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `estilos`
--
ALTER TABLE `estilos`
  MODIFY `idEstilo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `fotos`
--
ALTER TABLE `fotos`
  MODIFY `idFoto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT de la tabla `paises`
--
ALTER TABLE `paises`
  MODIFY `idPais` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `solicitudes`
--
ALTER TABLE `solicitudes`
  MODIFY `idSolicitud` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `albumes`
--
ALTER TABLE `albumes`
  ADD CONSTRAINT `fKeyUsuarios` FOREIGN KEY (`usuario`) REFERENCES `usuarios` (`idUsuario`);

--
-- Filtros para la tabla `fotos`
--
ALTER TABLE `fotos`
  ADD CONSTRAINT `fKeyAlbums` FOREIGN KEY (`album`) REFERENCES `albumes` (`idAlbum`),
  ADD CONSTRAINT `fKeyPais` FOREIGN KEY (`pais`) REFERENCES `paises` (`idPais`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Filtros para la tabla `solicitudes`
--
ALTER TABLE `solicitudes`
  ADD CONSTRAINT `fKeyAlbum` FOREIGN KEY (`album`) REFERENCES `albumes` (`idAlbum`);

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `keyEstilo` FOREIGN KEY (`estilo`) REFERENCES `estilos` (`idEstilo`),
  ADD CONSTRAINT `keyPaises` FOREIGN KEY (`pais`) REFERENCES `paises` (`idPais`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
