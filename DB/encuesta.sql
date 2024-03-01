create database encuesta;
use encuesta;

CREATE TABLE `preguntas` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `pregunta` text NOT NULL,
  `grupo` varchar(10) NOT NULL DEFAULT 'I',
  `status` int(2) NOT NULL DEFAULT 1,
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `preguntas` (`id`, `pregunta`, `grupo`, `status`) VALUES
(1, '¿Ha presenciado o sufrido alguna vez, durante o con motivo del trabajo un acontecimiento como los siguientes:
\nAccidente que tenga como consecuencia la muerte, la pérdida de un miembro o una lesión grave?
\nAsaltos?
\nActos violentos que derivaron en lesiones graves?
\nSecuestro?
\nAmenazas?, o cualquier otro que ponga en riesgo su vida o salud, y/o la de otras personas?', 'I', 1),
(2, '¿Ha tenido recuerdos recurrentes sobre el acontecimiento que le provocan malestares?', 'II', 1),
(3, '¿Ha tenido sueños de carácter recurrente sobre el acontecimiento, que le producen malestar?', 'II', 1),
(4, '¿Se ha esforzado por evitar todo tipo de sentimientos, conversaciones o situaciones que le puedan recordar el acontecimiento?', 'III', 1),
(5, '¿Se ha esforzado por evitar todo tipo de actividades, lugares o personas que motivan recuerdos del acontecimiento?', 'III', 1),
(6, '¿Ha tenido dificultad para recordar alguna parte importante del evento?', 'III', 1),
(7, '¿Ha disminuido su interés en sus actividades cotidianas?', 'III', 1),
(8, '¿Se ha sentido usted alejado o distante de los demás?', 'III', 1),
(9, '¿Ha notado que tiene dificultad para expresar sus sentimientos?', 'III', 1),
(10, '¿Ha tenido la impresión de que su vida se va a acortar, que va a morir antes que otras personas o que tiene un futuro limitado?', 'III', 1),
(11, '¿Ha tenido usted dificultades para dormir?', 'IV', 1),
(12, '¿Ha estado particularmente irritable o le han dado arranques de coraje?', 'IV', 1),
(13, '¿Ha tenido dificultad para concentrarse?', 'IV', 1),
(14, '¿Ha estado nervioso o constantemente en alerta?', 'IV', 1),
(15, '¿Se ha sobresaltado fácilmente por cualquier cosa?', 'IV', 1);

CREATE TABLE `respuestas` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_pregunta` int(10) UNSIGNED NOT NULL,
  `codigo_encuesta` varchar(45) NOT NULL,
  `creado` datetime DEFAULT NULL,
  `nombre_completo` text NOT NULL,
  `puesto` text NOT NULL,
  `tiempo_empresa` text NOT NULL,
  `centro_trabajo` text NOT NULL,
  `correo` text NOT NULL,
  `respuesta` varchar(10) NOT NULL,
  PRIMARY KEY (id),
  CONSTRAINT fk_respuestas_preguntas FOREIGN KEY (id_pregunta) REFERENCES preguntas (id) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
COMMIT;