create DATABASE cine_VertigoDB;
use cine_VertigoDB;
-- Tabla de usuarios
CREATE TABLE Usuarios (
  id_usuario INT AUTO_INCREMENT PRIMARY KEY,
  nombre VARCHAR(100),
  apellido_paterno VARCHAR(100),
  apellido_materno VARCHAR(100),
  correo VARCHAR(150) UNIQUE,
  telefono VARCHAR(20),
  fecha_de_nacimiento DATE,
  contrasena VARCHAR(255),
  tipo_usuario ENUM('cliente', 'administrador')
);

-- Tabla de métodos de pago
CREATE TABLE MetodoPago (
  id_Pago INT AUTO_INCREMENT PRIMARY KEY,
  id_usuario INT,
  tipo VARCHAR(50),
  datos VARCHAR(255),
  FOREIGN KEY (id_usuario) REFERENCES Usuarios(id_usuario)
);

-- Tabla de cines o sucursales
CREATE TABLE Cine (
  id_cine INT AUTO_INCREMENT PRIMARY KEY,
  nombre VARCHAR(100),
  ubicacion VARCHAR(255),
  gerente VARCHAR(100)
);

-- Tabla de salas
CREATE TABLE Sala (
  id_sala INT AUTO_INCREMENT PRIMARY KEY,
  nombre VARCHAR(100),
  capacidad INT,
  tipo ENUM('tradicional', 'VIP'),
  id_cine INT,
  FOREIGN KEY (id_cine) REFERENCES Cine(id_cine)
);

-- Tabla de asientos
CREATE TABLE Asiento (
  id_asiento INT AUTO_INCREMENT PRIMARY KEY,
  id_sala INT,
  fila CHAR(1),
  numero INT,
  FOREIGN KEY (id_sala) REFERENCES Sala(id_sala)
);

-- Tabla de películas
CREATE TABLE Pelicula (
  id_pelicula INT AUTO_INCREMENT PRIMARY KEY,
  titulo VARCHAR(150),
  descripcion TEXT,
  clasificacion VARCHAR(10),
  duracion INT,
  genero VARCHAR(50),
  poster_url VARCHAR(1000)
);

-- Tabla de funciones
CREATE TABLE Funcion (
  id_funcion INT AUTO_INCREMENT PRIMARY KEY,
  id_pelicula INT,
  id_sala INT,
  dia DATE,
  hora TIME,
  idioma VARCHAR(50),
  subtitulo BOOLEAN,
  tipo_funcion VARCHAR(50),
  estado ENUM('borrador', 'activa', 'finalizada', 'cancelada'),
  FOREIGN KEY (id_pelicula) REFERENCES Pelicula(id_pelicula),
  FOREIGN KEY (id_sala) REFERENCES Sala(id_sala)
);

-- Tabla de promociones
CREATE TABLE Promocion (
  id_promocion INT AUTO_INCREMENT PRIMARY KEY,
  titulo VARCHAR(100),
  descripcion TEXT,
  fecha_inicio DATE,
  fecha_fin DATE
);

-- Relación promociones por cine
CREATE TABLE PromocionCine (
  id_promocion INT,
  id_cine INT,
  PRIMARY KEY (id_promocion, id_cine),
  FOREIGN KEY (id_promocion) REFERENCES Promocion(id_promocion),
  FOREIGN KEY (id_cine) REFERENCES Cine(id_cine)
);

-- Relación promociones por usuario
CREATE TABLE PromocionUsuario (
  id_promocion INT,
  id_usuario INT,
  PRIMARY KEY (id_promocion, id_usuario),
  FOREIGN KEY (id_promocion) REFERENCES Promocion(id_promocion),
  FOREIGN KEY (id_usuario) REFERENCES Usuarios(id_usuario)
);

-- Tabla de reservasINSERT INTO Usuarios (id_usuario, nombre, apellido_paterno, apellido_materno, correo,telefono, fecha_de_nacimiento, contrasena, tipo_usuario) VALUES

CREATE TABLE Reserva (
  id_reserva INT AUTO_INCREMENT PRIMARY KEY,
  id_usuario INT,
  id_funcion INT,
  fecha_reserva DATETIME,
  cantidad INT CHECK (cantidad <= 10),
  estado ENUM('activa', 'cancelada', 'vencida'),
  FOREIGN KEY (id_usuario) REFERENCES Usuarios(id_usuario),
  FOREIGN KEY (id_funcion) REFERENCES Funcion(id_funcion)
);

-- Relación entre reserva y asiento
CREATE TABLE ReservaAsiento (
  id_reserva INT,
  id_asiento INT,
  bloqueado BOOLEAN,
  PRIMARY KEY (id_reserva, id_asiento),
  FOREIGN KEY (id_reserva) REFERENCES Reserva(id_reserva),
  FOREIGN KEY (id_asiento) REFERENCES Asiento(id_asiento)
);

-- Tabla de ventas
CREATE TABLE VentaBoleto (
  id_venta INT AUTO_INCREMENT PRIMARY KEY,
  id_usuario INT,
  id_funcion INT,
  id_Pago INT,
  cantidad INT,
  precio DECIMAL(10, 2),
  fecha_compra DATETIME,
  FOREIGN KEY (id_usuario) REFERENCES Usuarios(id_usuario),
  FOREIGN KEY (id_funcion) REFERENCES Funcion(id_funcion),
  FOREIGN KEY (id_Pago) REFERENCES MetodoPago(id_Pago)
);

-- Relación entre venta y asiento
CREATE TABLE VentaAsiento (
  id_venta INT,
  id_asiento INT,
  PRIMARY KEY (id_venta, id_asiento),
  FOREIGN KEY (id_venta) REFERENCES VentaBoleto(id_venta),
  FOREIGN KEY (id_asiento) REFERENCES Asiento(id_asiento)
);

-- Historial de acciones
CREATE TABLE Historial (
  id_historial INT AUTO_INCREMENT PRIMARY KEY,
  id_usuario INT,
  id_funcion INT,
  fecha DATETIME,
  accion VARCHAR(50),
  FOREIGN KEY (id_usuario) REFERENCES Usuarios(id_usuario),
  FOREIGN KEY (id_funcion) REFERENCES Funcion(id_funcion)
);


INSERT INTO Cine (nombre, ubicacion, gerente) VALUES
('Cinépolis Perisur', 'Anillo Periférico Sur 4690, Insurgentes Cuicuilco, Coyoacán, 04530 Ciudad de México, CDMX', 'David Ojo Montaño de Encantador'),
('Cinépolis VIP Mítikah', 'Av. Río Churubusco 601, Xoco, Benito Juárez, 03330 Ciudad de México, CDMX', 'Martin Gabriel Ramero Hilario'),
('Cinemex Pabellón Cuauhtémoc', 'Av. Cuauhtémoc 19, Roma Norte, Cuauhtémoc, 06700 Ciudad de México, CDMX', 'Bruno Ricardo Valdes Feliz ');

INSERT INTO promocion (titulo, descripcion, fecha_inicio, fecha_fin)
VALUES
('Día del Cine', 'Entradas al 2x1 en todas las funciones del día.', '2025-05-18', '2025-05-18'),
('Semana de Palomitas Gratis', 'Por cada entrada comprada, palomitas medianas gratis.', '2025-05-19', '2025-05-23'),
('Miércoles de Parejas', 'Combo de 2 entradas + 2 bebidas a precio especial.', '2025-05-21', '2025-05-21'),
('Fin de Semana Familiar', 'Descuento del 30% en entradas familiares.', '2025-05-24', '2025-05-25'),
('Promo Estudiantil', '50% de descuento con credencial estudiantil.', '2025-05-20', '2025-05-22'),
('Maratón de Clásicos', 'Proyección de películas clásicas a precio reducido.', '2025-05-26', '2025-05-28'),
('Noche de Estreno', 'Entrada gratis al comprar dos entradas para el estreno.', '2025-05-29', '2025-05-29'),
('Descuento Final de Mes', '20% de descuento en todas las entradas.', '2025-05-30', '2025-05-30');

insert into Sala (nombre, capacidad, tipo, id_cine)
values
('Sala 1', 50, 1, 1),
('Sala 2', 30, 2, 1),
('Sala 3', 50, 1, 1),
('Sala 4', 30, 2, 1),

('Sala 1', 50, 1, 2),
('Sala 2', 30, 2, 2),
('Sala 3', 50, 1, 2),
('Sala 4', 30, 2, 2),

('Sala 1', 50, 1, 3),
('Sala 2', 30, 2, 3),
('Sala 3', 50, 1, 3),
('Sala 4', 30, 2, 3);

INSERT INTO promocioncine (id_promocion, id_cine)
VALUES
(1, 1),
(2, 1),
(4, 1),
(7, 2),

(8, 2),
(1, 2),
(3, 2),
(5, 2),

(2, 3),
(7, 3),
(6, 3),
(4, 3);

insert into asiento (id_sala, fila, numero)
values
(1, 'A', 1), (1, 'A', 2), (1, 'A', 3), (1, 'A', 4), (1, 'A', 5), (1, 'A', 6), (1, 'A', 7), (1, 'A', 8), (1, 'A', 9), (1, 'A', 10),
(1, 'B', 1), (1, 'B', 2), (1, 'B', 3), (1, 'B', 4), (1, 'B', 5), (1, 'B', 6), (1, 'B', 7), (1, 'B', 8), (1, 'B', 9), (1, 'B', 10),
(1, 'C', 1), (1, 'C', 2), (1, 'C', 3), (1, 'C', 4), (1, 'C', 5), (1, 'C', 6), (1, 'C', 7), (1, 'C', 8), (1, 'C', 9), (1, 'C', 10),
(1, 'D', 1), (1, 'D', 2), (1, 'D', 3), (1, 'D', 4), (1, 'D', 5), (1, 'D', 6), (1, 'D', 7), (1, 'D', 8), (1, 'D', 9), (1, 'D', 10),
(1, 'E', 1), (1, 'E', 2), (1, 'E', 3), (1, 'E', 4), (1, 'E', 5), (1, 'E', 6), (1, 'E', 7), (1, 'E', 8), (1, 'E', 9), (1, 'E', 10),

(2, 'A', 1), (2, 'A', 2), (2, 'A', 3), (2, 'A', 4), (2, 'A', 5), (2, 'A', 6),
(2, 'B', 1), (2, 'B', 2), (2, 'B', 3), (2, 'B', 4), (2, 'B', 5), (2, 'B', 6),
(2, 'C', 1), (2, 'C', 2), (2, 'C', 3), (2, 'C', 4), (2, 'C', 5), (2, 'C', 6),
(2, 'D', 1), (2, 'D', 2), (2, 'D', 3), (2, 'D', 4), (2, 'D', 5), (2, 'D', 6),
(2, 'E', 1), (2, 'E', 2), (2, 'E', 3), (2, 'E', 4), (2, 'E', 5), (2, 'E', 6),

-- Sala 3 (Normal)
(3, 'A', 1), (3, 'A', 2), (3, 'A', 3), (3, 'A', 4), (3, 'A', 5), (3, 'A', 6), (3, 'A', 7), (3, 'A', 8), (3, 'A', 9), (3, 'A', 10),
(3, 'B', 1), (3, 'B', 2), (3, 'B', 3), (3, 'B', 4), (3, 'B', 5), (3, 'B', 6), (3, 'B', 7), (3, 'B', 8), (3, 'B', 9), (3, 'B', 10),
(3, 'C', 1), (3, 'C', 2), (3, 'C', 3), (3, 'C', 4), (3, 'C', 5), (3, 'C', 6), (3, 'C', 7), (3, 'C', 8), (3, 'C', 9), (3, 'C', 10),
(3, 'D', 1), (3, 'D', 2), (3, 'D', 3), (3, 'D', 4), (3, 'D', 5), (3, 'D', 6), (3, 'D', 7), (3, 'D', 8), (3, 'D', 9), (3, 'D', 10),
(3, 'E', 1), (3, 'E', 2), (3, 'E', 3), (3, 'E', 4), (3, 'E', 5), (3, 'E', 6), (3, 'E', 7), (3, 'E', 8), (3, 'E', 9), (3, 'E', 10),

-- Sala 4 (VIP)
(4, 'A', 1), (4, 'A', 2), (4, 'A', 3), (4, 'A', 4), (4, 'A', 5), (4, 'A', 6),
(4, 'B', 1), (4, 'B', 2), (4, 'B', 3), (4, 'B', 4), (4, 'B', 5), (4, 'B', 6),
(4, 'C', 1), (4, 'C', 2), (4, 'C', 3), (4, 'C', 4), (4, 'C', 5), (4, 'C', 6),
(4, 'D', 1), (4, 'D', 2), (4, 'D', 3), (4, 'D', 4), (4, 'D', 5), (4, 'D', 6),
(4, 'E', 1), (4, 'E', 2), (4, 'E', 3), (4, 'E', 4), (4, 'E', 5), (4, 'E', 6),

-- Sala 5 (Normal)
(5, 'A', 1), (5, 'A', 2), (5, 'A', 3), (5, 'A', 4), (5, 'A', 5), (5, 'A', 6), (5, 'A', 7), (5, 'A', 8), (5, 'A', 9), (5, 'A', 10),
(5, 'B', 1), (5, 'B', 2), (5, 'B', 3), (5, 'B', 4), (5, 'B', 5), (5, 'B', 6), (5, 'B', 7), (5, 'B', 8), (5, 'B', 9), (5, 'B', 10),
(5, 'C', 1), (5, 'C', 2), (5, 'C', 3), (5, 'C', 4), (5, 'C', 5), (5, 'C', 6), (5, 'C', 7), (5, 'C', 8), (5, 'C', 9), (5, 'C', 10),
(5, 'D', 1), (5, 'D', 2), (5, 'D', 3), (5, 'D', 4), (5, 'D', 5), (5, 'D', 6), (5, 'D', 7), (5, 'D', 8), (5, 'D', 9), (5, 'D', 10),
(5, 'E', 1), (5, 'E', 2), (5, 'E', 3), (5, 'E', 4), (5, 'E', 5), (5, 'E', 6), (5, 'E', 7), (5, 'E', 8), (5, 'E', 9), (5, 'E', 10),

-- Sala 6 (VIP)
(6, 'A', 1), (6, 'A', 2), (6, 'A', 3), (6, 'A', 4), (6, 'A', 5), (6, 'A', 6),
(6, 'B', 1), (6, 'B', 2), (6, 'B', 3), (6, 'B', 4), (6, 'B', 5), (6, 'B', 6),
(6, 'C', 1), (6, 'C', 2), (6, 'C', 3), (6, 'C', 4), (6, 'C', 5), (6, 'C', 6),
(6, 'D', 1), (6, 'D', 2), (6, 'D', 3), (6, 'D', 4), (6, 'D', 5), (6, 'D', 6),
(6, 'E', 1), (6, 'E', 2), (6, 'E', 3), (6, 'E', 4), (6, 'E', 5), (6, 'E', 6),

-- Sala 7 (Normal)
(7, 'A', 1), (7, 'A', 2), (7, 'A', 3), (7, 'A', 4), (7, 'A', 5), (7, 'A', 6), (7, 'A', 7), (7, 'A', 8), (7, 'A', 9), (7, 'A', 10),
(7, 'B', 1), (7, 'B', 2), (7, 'B', 3), (7, 'B', 4), (7, 'B', 5), (7, 'B', 6), (7, 'B', 7), (7, 'B', 8), (7, 'B', 9), (7, 'B', 10),
(7, 'C', 1), (7, 'C', 2), (7, 'C', 3), (7, 'C', 4), (7, 'C', 5), (7, 'C', 6), (7, 'C', 7), (7, 'C', 8), (7, 'C', 9), (7, 'C', 10),
(7, 'D', 1), (7, 'D', 2), (7, 'D', 3), (7, 'D', 4), (7, 'D', 5), (7, 'D', 6), (7, 'D', 7), (7, 'D', 8), (7, 'D', 9), (7, 'D', 10),
(7, 'E', 1), (7, 'E', 2), (7, 'E', 3), (7, 'E', 4), (7, 'E', 5), (7, 'E', 6), (7, 'E', 7), (7, 'E', 8), (7, 'E', 9), (7, 'E', 10),

-- Sala 8 (VIP)
(8, 'A', 1), (8, 'A', 2), (8, 'A', 3), (8, 'A', 4), (8, 'A', 5), (8, 'A', 6),
(8, 'B', 1), (8, 'B', 2), (8, 'B', 3), (8, 'B', 4), (8, 'B', 5), (8, 'B', 6),
(8, 'C', 1), (8, 'C', 2), (8, 'C', 3), (8, 'C', 4), (8, 'C', 5), (8, 'C', 6),
(8, 'D', 1), (8, 'D', 2), (8, 'D', 3), (8, 'D', 4), (8, 'D', 5), (8, 'D', 6),
(8, 'E', 1), (8, 'E', 2), (8, 'E', 3), (8, 'E', 4), (8, 'E', 5), (8, 'E', 6),

-- Sala 9 (Normal)
(9, 'A', 1), (9, 'A', 2), (9, 'A', 3), (9, 'A', 4), (9, 'A', 5), (9, 'A', 6), (9, 'A', 7), (9, 'A', 8), (9, 'A', 9), (9, 'A', 10),
(9, 'B', 1), (9, 'B', 2), (9, 'B', 3), (9, 'B', 4), (9, 'B', 5), (9, 'B', 6), (9, 'B', 7), (9, 'B', 8), (9, 'B', 9), (9, 'B', 10),
(9, 'C', 1), (9, 'C', 2), (9, 'C', 3), (9, 'C', 4), (9, 'C', 5), (9, 'C', 6), (9, 'C', 7), (9, 'C', 8), (9, 'C', 9), (9, 'C', 10),
(9, 'D', 1), (9, 'D', 2), (9, 'D', 3), (9, 'D', 4), (9, 'D', 5), (9, 'D', 6), (9, 'D', 7), (9, 'D', 8), (9, 'D', 9), (9, 'D', 10),
(9, 'E', 1), (9, 'E', 2), (9, 'E', 3), (9, 'E', 4), (9, 'E', 5), (9, 'E', 6), (9, 'E', 7), (9, 'E', 8), (9, 'E', 9), (9, 'E', 10),

-- Sala 10 (VIP)
(10, 'A', 1), (10, 'A', 2), (10, 'A', 3), (10, 'A', 4), (10, 'A', 5), (10, 'A', 6),
(10, 'B', 1), (10, 'B', 2), (10, 'B', 3), (10, 'B', 4), (10, 'B', 5), (10, 'B', 6),
(10, 'C', 1), (10, 'C', 2), (10, 'C', 3), (10, 'C', 4), (10, 'C', 5), (10, 'C', 6),
(10, 'D', 1), (10, 'D', 2), (10, 'D', 3), (10, 'D', 4), (10, 'D', 5), (10, 'D', 6),
(10, 'E', 1), (10, 'E', 2), (10, 'E', 3), (10, 'E', 4), (10, 'E', 5), (10, 'E', 6),

-- Sala 11 (Normal)
(11, 'A', 1), (11, 'A', 2), (11, 'A', 3), (11, 'A', 4), (11, 'A', 5), (11, 'A', 6), (11, 'A', 7), (11, 'A', 8), (11, 'A', 9), (11, 'A', 10),
(11, 'B', 1), (11, 'B', 2), (11, 'B', 3), (11, 'B', 4), (11, 'B', 5), (11, 'B', 6), (11, 'B', 7), (11, 'B', 8), (11, 'B', 9), (11, 'B', 10),
(11, 'C', 1), (11, 'C', 2), (11, 'C', 3), (11, 'C', 4), (11, 'C', 5), (11, 'C', 6), (11, 'C', 7), (11, 'C', 8), (11, 'C', 9), (11, 'C', 10),
(11, 'D', 1), (11, 'D', 2), (11, 'D', 3), (11, 'D', 4), (11, 'D', 5), (11, 'D', 6), (11, 'D', 7), (11, 'D', 8), (11, 'D', 9), (11, 'D', 10),
(11, 'E', 1), (11, 'E', 2), (11, 'E', 3), (11, 'E', 4), (11, 'E', 5), (11, 'E', 6), (11, 'E', 7), (11, 'E', 8), (11, 'E', 9), (11, 'E', 10),

-- Sala 12 (VIP)
(12, 'A', 1), (12, 'A', 2), (12, 'A', 3), (12, 'A', 4), (12, 'A', 5), (12, 'A', 6),
(12, 'B', 1), (12, 'B', 2), (12, 'B', 3), (12, 'B', 4), (12, 'B', 5), (12, 'B', 6),
(12, 'C', 1), (12, 'C', 2), (12, 'C', 3), (12, 'C', 4), (12, 'C', 5), (12, 'C', 6),
(12, 'D', 1), (12, 'D', 2), (12, 'D', 3), (12, 'D', 4), (12, 'D', 5), (12, 'D', 6),
(12, 'E', 1), (12, 'E', 2), (12, 'E', 3), (12, 'E', 4), (12, 'E', 5), (12, 'E', 6);

insert INTO Pelicula (titulo, descripcion, clasificacion, duracion, genero, poster_url)
values ('SUPERMAN', 'Explora la lucha de Superman por reconciliar su herencia kryptoniana con su crianza humana en un mundo cínico.', 'PG13', 146, 'Accion, Aventura, Ciencia Ficcion, Superheroes', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS4ypCFjK9-K_UndTZ96WzGOB9waCFSNjlEnw&s'),
('JURASSIC WORLD', 'Cuenta la historia de una nueva expedición, cinco años después de "Jurassic World: Dominion", que se adentra en regiones ecuatoriales para obtener el ADN de tres enormes criaturas prehistóricas con el fin de lograr un avance médico revolucionario', 'PG13', 134, 'Ciencia Ficcion, Aventura, Accion, Suspenso', 'https://www.movieposters.com/cdn/shop/files/jurassic-world-rebirth_6gyim32q.jpg?v=1739552244'),
('F1', 'Es un drama deportivo y de acción sobre el Campeonato Mundial de Fórmula 1, protagonizado por Brad Pitt como un ex piloto que regresa a las pistas.', 'PG13', 120, 'Drama', 'https://cdn.eldestapeweb.com/eldestape/052025/1747161079617.webp?cw=400&ch=225&extw=jpg'),
('Killer SOFA', 'Relata la historia de un sillón reclinable con poderes que se enamora de una chica y, en un intento de protegerla, comete crímenes.', 'C', 81, 'Cine de terror, Comedia cinematográfica, Thriller', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT82WKlm7yyaRYHSo4DT0Jm4ErsrmqVHL8lTQ&s'),
('HOW TO TRAIN YOUR DRAGON', 'La trama sigue a Hipo, un joven vikingo que no se ajusta a la tradición de su tribu de cazar dragones, y su encuentro con Desdentao, un Furia Nocturna, con quien establece una amistad y aprende a entender a las criaturas.', 'PG', 125, 'Accion, Fantasia', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTHFKJkv98e1mo53qu_nBzyYdTvJIcktx_ASQ&s'),
('KILLER CLOWNS FROM OUTER SPACE', 'Es una película de comedia de terror de 1988 que narra la historia de un grupo de extraterrestres con apariencia de payasos que aterrizan en un pequeño pueblo y comienzan a capturar y matar a los habitantes.', 'PG13', 88, 'Comedia, Ciencia Ficcion', 'https://m.media-amazon.com/images/M/MV5BNzU2MDU0ZjYtOGUzZS00ZTk5LWJiYmYtMDY3YWJlZmMwZGZjXkEyXkFqcGc@._V1_FMjpg_UX1000_.jpg'),
('Fantastic4', 'Es una película de superhéroes de 2025, basada en el equipo homónimo de Marvel Comics', 'PG13', 140, 'Accion, Ciencia Ficcion', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTdMTt0bmlciIOKlDdnZRbXDsdw9LieMvCopg&s'),
('TERMINATOR 2 JUDGMENT DAY', 'Un Terminator, enviado desde el futuro por la resistencia humana, protege a John Connor, el futuro líder, de otro Terminator más avanzado, el T-1000, enviado por Skynet para matarlo.', 'C', 146, 'Accion, Ciencia Ficcion, Aventura, Suspenso', 'https://m.media-amazon.com/images/I/51YBB+EinIL._AC_UF894,1000_QL80_.jpg'),
('THE IRON GIANT', 'Un joven se hace amigo de un robot gigante del espacio exterior al que un agente paranoico del gobierno quiere destruir', 'PG', 86, 'Animacion, Ciencia Ficcion', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQOZYBPAe9HRfZnuExmmN8r2lrsiD_BXUrq8A&s'),
('LA LA LAND', 'Cuenta la historia de Mia, una aspirante a actriz, y Sebastian, un pianista de jazz, y cómo sus caminos se cruzan en Los Ángeles mientras persiguen sus sueños.', 'PG13', 128, 'Drama, Clasico, Musical, Melodrama', 'https://moviepostermexico.com/cdn/shop/products/la_la_land_ver8_xxlg.jpg?v=1571355800'),
('MONSTERS VS ALIENS', 'Tras ser alcanzada por un meteorito, una mujer se transforma en gigante y pasará a formar parte de un equipo de monstruos reunidos por el Gobierno de los Estados Unidos para derrotar a un alienígena que planea invadir la Tierra.', 'PG', 94, 'Accion, Aventura, Animacion, Ciencia Ficcion', 'https://m.media-amazon.com/images/I/517AHA3ch1L.jpg'),
('THE INCREDIBLES', 'Cuenta la historia de una familia de superhéroes retirados que intentan vivir una vida normal, pero que pronto deben regresar a su papel de protectores de la sociedad.', 'PG', 123, 'Accion, Infantil, Drama, Ciencia Ficcion', 'https://play-lh.googleusercontent.com/5jT41uOhPHiZgyL8ryXKv9il5TVsHjffmGJ3dzYzTT3ECNSKQf3XK-EjV0U1wbmsCMs=w240-h480-rw'),
('SHERK', 'Shrek es un ogro verde solitario, con acento escocés, que vive en un pantano y disfruta asustando a los humanos que se acercan a su hogar. Es conocido por su personalidad huraña, antisocial y territorial.', 'PG', 90, 'Accion, Aventura, Drama, Fantasia', 'https://moviepostermexico.com/cdn/shop/products/shrek_ver3_xxlg_1024x1024@2x.jpg?v=1581215574'),
('MEGAMIND', 'La historia sigue a Megamind, un supervillano brillante pero inefectivo, que finalmente logra derrotar a su archirrival, Metro Man, pero luego se ve sin propósito al perder a su antagonista. ', 'A', 96, 'Animacion,, Ciencia Ficcion, Drama, Aventura', 'https://m.media-amazon.com/images/I/61OtufrnSTL._AC_UF894,1000_QL80_.jpg'),
('VACAS VAQUERAS', 'Cuando un delincuente ambicioso planifica apropiarse de una granja local, tres vacas comprometidas, un semental karateca y un colorido corral de criaturas unen fuerzas para salvar su hogar.', 'PG', 76, 'Animacion, Infantil, Musica, Accion, Musical', 'https://m.media-amazon.com/images/S/pv-target-images/dc6cff677e12a4ac2695d71fa84da809fbd91e25f62a748f074472838a18e636.jpg');


INSERT INTO Funcion (id_pelicula, id_sala, dia, hora, idioma, subtitulo, tipo_funcion, estado)
VALUES
(7, 11, '2025-05-22', '14:00:00', 'Español', FALSE, 'Tradicional', 'activa'),
(12, 3, '2025-05-24', '20:00:00', 'Francés', FALSE, 'Tradicional', 'activa'),
(1, 2, '2025-05-28', '05:00:00', 'Español', TRUE, 'VIP', 'activa'),
(9, 3, '2025-05-23', '02:00:00', 'Español', TRUE, 'Tradicional', 'activa'),
(13, 11, '2025-05-28', '20:00:00', 'Inglés', FALSE, 'Tradicional', 'activa'),
(4, 3, '2025-05-28', '17:00:00', 'Francés', TRUE, 'Tradicional', 'activa'),
(11, 5, '2025-05-23', '17:00:00', 'Inglés', FALSE, 'Tradicional', 'activa'),
(8, 7, '2025-05-28', '23:00:00', 'Francés', TRUE, 'Tradicional', 'activa'),
(1, 7, '2025-05-23', '17:00:00', 'Español', TRUE, 'Tradicional', 'activa'),
(9, 4, '2025-05-27', '17:00:00', 'Inglés', TRUE, 'VIP', 'activa'),
(11, 1, '2025-05-26', '23:00:00', 'Francés', TRUE, 'VIP', 'activa'),
(9, 5, '2025-05-24', '05:00:00', 'Inglés', FALSE, 'Tradicional', 'activa'),
(13, 9, '2025-05-26', '23:00:00', 'Español', FALSE, 'Tradicional', 'activa'),
(9, 8, '2025-05-23', '20:00:00', 'Francés', TRUE, 'VIP', 'activa'),
(6, 2, '2025-05-28', '20:00:00', 'Francés', FALSE, 'VIP', 'activa'),
(6, 9, '2025-05-26', '17:00:00', 'Francés', TRUE, 'Tradicional', 'activa'),
(2, 6, '2025-05-23', '20:00:00', 'Inglés', TRUE, 'Tradicional', 'activa'),
(11, 12, '2025-05-23', '23:00:00', 'Francés', TRUE, 'VIP', 'activa'),
(14, 10, '2025-05-22', '05:00:00', 'Francés', TRUE, 'VIP', 'activa'),
(2, 2, '2025-05-26', '23:00:00', 'Francés', FALSE, 'VIP', 'activa'),
(10, 11, '2025-05-27', '02:00:00', 'Inglés', FALSE, 'Tradicional', 'activa'),
(13, 3, '2025-05-24', '02:00:00', 'Francés', TRUE, 'Tradicional', 'activa'),
(6, 6, '2025-05-23', '05:00:00', 'Español', FALSE, 'VIP', 'activa'),
(4, 4, '2025-05-27', '02:00:00', 'Inglés', FALSE, 'VIP', 'activa'),
(14, 7, '2025-05-23', '17:00:00', 'Francés', TRUE, 'Tradicional', 'activa'),
(1, 2, '2025-05-26', '05:00:00', 'Inglés', TRUE, 'VIP', 'activa'),
(14, 9, '2025-05-25', '17:00:00', 'Inglés', TRUE, 'Tradicional', 'activa'),
(3, 8, '2025-05-28', '02:00:00', 'Francés', TRUE, 'VIP', 'activa'),
(1, 4, '2025-05-28', '02:00:00', 'Español', TRUE, 'VIP', 'activa'),
(9, 11, '2025-05-23', '23:00:00', 'Inglés', FALSE, 'Tradicional', 'activa'),
(13, 7, '2025-05-23', '20:00:00', 'Español', FALSE, 'Tradicional', 'activa'),
(3, 5, '2025-05-25', '20:00:00', 'Inglés', TRUE, 'Tradicional', 'activa'),
(11, 12, '2025-05-27', '14:00:00', 'Inglés', TRUE, 'VIP', 'activa'),
(12, 9, '2025-05-27', '23:00:00', 'Francés', FALSE, 'Tradicional', 'activa'),
(2, 2, '2025-05-23', '02:00:00', 'Inglés', FALSE, 'VIP', 'activa'),
(8, 5, '2025-05-27', '23:00:00', 'Francés', FALSE, 'Tradicional', 'activa'),
(1, 6, '2025-05-27', '17:00:00', 'Español', FALSE, 'VIP', 'activa'),
(13, 12, '2025-05-23', '20:00:00', 'Francés', TRUE, 'VIP', 'activa'),
(7, 2, '2025-05-25', '05:00:00', 'Francés', FALSE, 'VIP', 'activa'),
(2, 9, '2025-05-24', '23:00:00', 'Francés', FALSE, 'Tradicional', 'activa'),
(13, 12, '2025-05-26', '23:00:00', 'Francés', TRUE, 'VIP', 'activa'),
(3, 8, '2025-05-22', '14:00:00', 'Español', TRUE, 'VIP', 'activa'),
(5, 3, '2025-05-24', '05:00:00', 'Francés', FALSE, 'Tradicional', 'activa'),
(7, 3, '2025-05-27', '17:00:00', 'Español', TRUE, 'Tradicional', 'activa'),
(12, 7, '2025-05-26', '14:00:00', 'Español', TRUE, 'Tradicional', 'activa'),
(10, 5, '2025-05-23', '05:00:00', 'Español', TRUE, 'Tradicional', 'activa'),
(2, 12, '2025-05-22', '23:00:00', 'Francés', TRUE, 'VIP', 'activa'),
(9, 9, '2025-05-25', '05:00:00', 'Inglés', FALSE, 'Tradicional', 'activa'),
(10, 3, '2025-05-24', '23:00:00', 'Francés', TRUE, 'Tradicional', 'activa'),
(13, 1, '2025-05-22', '23:00:00', 'Inglés', TRUE, 'Tradicional', 'activa'),
(6, 6, '2025-05-26', '14:00:00', 'Inglés', FALSE, 'VIP', 'activa'),
(8, 11, '2025-05-22', '20:00:00', 'Francés', FALSE, 'Tradicional', 'activa'),
(12, 4, '2025-05-23', '02:00:00', 'Español', FALSE, 'VIP', 'activa'),
(10, 3, '2025-05-26', '20:00:00', 'Francés', FALSE, 'Tradicional', 'activa'),
(8, 9, '2025-05-24', '20:00:00', 'Francés', FALSE, 'Tradicional', 'activa'),
(10, 12, '2025-05-25', '02:00:00', 'Inglés', FALSE, 'VIP', 'activa'),
(10, 11, '2025-05-26', '17:00:00', 'Francés', FALSE, 'Tradicional', 'activa'),
(4, 1, '2025-05-28', '14:00:00', 'Francés', FALSE, 'VIP', 'activa'),
(6, 1, '2025-05-25', '23:00:00', 'Inglés', FALSE, 'VIP', 'activa'),
(1, 1, '2025-05-27', '02:00:00', 'Español', TRUE, 'Tradicional', 'activa'),
(2, 5, '2025-05-26', '05:00:00', 'Español', TRUE, 'Tradicional', 'activa'),
(1, 10, '2025-05-27', '17:00:00', 'Español', TRUE, 'VIP', 'activa'),
(1, 4, '2025-05-26', '14:00:00', 'Francés', FALSE, 'VIP', 'activa'),
(7, 1, '2025-05-27', '05:00:00', 'Francés', FALSE, 'Tradicional', 'activa'),
(9, 6, '2025-05-27', '23:00:00', 'Español', FALSE, 'VIP', 'activa'),
(8, 7, '2025-05-27', '14:00:00', 'Francés', FALSE, 'Tradicional', 'activa'),
(6, 2, '2025-05-25', '02:00:00', 'Español', TRUE, 'VIP', 'activa'),
(10, 3, '2025-05-27', '20:00:00', 'Francés', TRUE, 'Tradicional', 'activa'),
(1, 1, '2025-05-24', '14:00:00', 'Francés', TRUE, 'Tradicional', 'activa'),
(4, 5, '2025-05-24', '17:00:00', 'Español', FALSE, 'Tradicional', 'activa'),
(6, 3, '2025-05-28', '14:00:00', 'Español', TRUE, 'Tradicional', 'activa'),
(1, 2, '2025-05-28', '17:00:00', 'Inglés', TRUE, 'VIP', 'activa'),
(8, 2, '2025-05-24', '05:00:00', 'Inglés', FALSE, 'VIP', 'activa'),
(1, 1, '2025-05-22', '05:00:00', 'Español', FALSE, 'Tradicional', 'activa'),
(4, 10, '2025-05-24', '05:00:00', 'Español', FALSE, 'VIP', 'activa'),
(11, 4, '2025-05-22', '17:00:00', 'Inglés', FALSE, 'VIP', 'activa'),
(7, 8, '2025-05-25', '05:00:00', 'Español', TRUE, 'VIP', 'activa'),
(7, 1, '2025-05-25', '02:00:00', 'Inglés', FALSE, 'Tradicional', 'activa'),
(10, 11, '2025-05-26', '20:00:00', 'Francés', TRUE, 'Tradicional', 'activa'),
(9, 6, '2025-05-26', '05:00:00', 'Inglés', FALSE, 'VIP', 'activa'),
(6, 9, '2025-05-24', '23:00:00', 'Francés', FALSE, 'Tradicional', 'activa'),
(9, 1, '2025-05-26', '02:00:00', 'Español', FALSE, 'Tradicional', 'activa'),
(9, 7, '2025-05-23', '02:00:00', 'Inglés', TRUE, 'Tradicional', 'activa'),
(1, 4, '2025-05-24', '20:00:00', 'Francés', TRUE, 'VIP', 'activa'),
(14, 1, '2025-05-25', '17:00:00', 'Francés', TRUE, 'Tradicional', 'activa'),
(4, 6, '2025-05-22', '02:00:00', 'Francés', FALSE, 'VIP', 'activa'),
(3, 8, '2025-05-26', '14:00:00', 'Inglés', TRUE, 'VIP', 'activa'),
(9, 2, '2025-05-27', '23:00:00', 'Español', TRUE, 'VIP', 'activa'),
(13, 8, '2025-05-25', '14:00:00', 'Inglés', TRUE, 'VIP', 'activa'),
(1, 10, '2025-05-24', '02:00:00', 'Francés', FALSE, 'VIP', 'activa'),
(11, 1, '2025-05-23', '14:00:00', 'Inglés', TRUE, 'VIP', 'activa'),
(5, 1, '2025-05-22', '02:00:00', 'Inglés', TRUE, 'VIP', 'activa'),
(10, 6, '2025-05-27', '02:00:00', 'Inglés', TRUE, 'VIP', 'activa'),
(5, 5, '2025-05-28', '20:00:00', 'Inglés', TRUE, 'Tradicional', 'activa'),
(10, 9, '2025-05-23', '05:00:00', 'Inglés', TRUE, 'Tradicional', 'activa'),
(6, 2, '2025-05-27', '14:00:00', 'Español', FALSE, 'VIP', 'activa'),
(7, 1, '2025-05-26', '05:00:00', 'Francés', FALSE, 'Tradicional', 'activa'),
(13, 4, '2025-05-26', '20:00:00', 'Inglés', TRUE, 'VIP', 'activa'),
(14, 2, '2025-05-22', '05:00:00', 'Francés', FALSE, 'VIP', 'activa'),
(3, 5, '2025-05-23', '23:00:00', 'Francés', TRUE, 'Tradicional', 'activa'),
(8, 5, '2025-05-25', '14:00:00', 'Español', FALSE, 'Tradicional', 'activa'),
(1, 12, '2025-05-24', '20:00:00', 'Francés', FALSE, 'VIP', 'activa'),
(2, 7, '2025-05-24', '17:00:00', 'Francés', TRUE, 'Tradicional', 'activa'),
(4, 2, '2025-05-26', '02:00:00', 'Inglés', FALSE, 'VIP', 'activa'),
(11, 1, '2025-05-22', '20:00:00', 'Francés', TRUE, 'Tradicional', 'activa'),
(13, 2, '2025-05-23', '14:00:00', 'Francés', FALSE, 'VIP', 'activa'),
(1, 5, '2025-05-23', '05:00:00', 'Francés', TRUE, 'Tradicional', 'activa'),
(4, 7, '2025-05-25', '17:00:00', 'Francés', FALSE, 'Tradicional', 'activa'),
(3, 8, '2025-05-26', '05:00:00', 'Francés', FALSE, 'VIP', 'activa'),
(5, 7, '2025-05-24', '05:00:00', 'Francés', FALSE, 'Tradicional', 'activa'),
(6, 2, '2025-05-26', '20:00:00', 'Inglés', FALSE, 'VIP', 'activa'),
(2, 3, '2025-05-27', '23:00:00', 'Español', TRUE, 'Tradicional', 'activa'),
(13, 6, '2025-05-25', '05:00:00', 'Inglés', FALSE, 'VIP', 'activa'),
(9, 1, '2025-05-28', '17:00:00', 'Español', TRUE, 'Tradicional', 'activa'),
(11, 2, '2025-05-27', '14:00:00', 'Francés', TRUE, 'VIP', 'activa'),
(3, 6, '2025-05-26', '02:00:00', 'Español', FALSE, 'VIP', 'activa'),
(9, 2, '2025-05-26', '14:00:00', 'Inglés', TRUE, 'VIP', 'activa'),
(1, 4, '2025-05-25', '20:00:00', 'Inglés', TRUE, 'VIP', 'activa'),
(5, 6, '2025-05-28', '17:00:00', 'Francés', TRUE, 'VIP', 'activa'),
(3, 6, '2025-05-23', '17:00:00', 'Francés', TRUE, 'VIP', 'activa'),
(1, 5, '2025-05-27', '23:00:00', 'Español', TRUE, 'Tradicional', 'activa'),
(5, 4, '2025-05-24', '23:00:00', 'Español', TRUE, 'VIP', 'activa'),
(4, 8, '2025-05-22', '17:00:00', 'Francés', FALSE, 'VIP', 'activa'),
(13, 7, '2025-05-22', '14:00:00', 'Francés', FALSE, 'Tradicional', 'activa'),
(8, 7, '2025-05-24', '14:00:00', 'Español', TRUE, 'Tradicional', 'activa'),
(1, 6, '2025-05-26', '17:00:00', 'Francés', TRUE, 'VIP', 'activa'),
(7, 2, '2025-05-26', '02:00:00', 'Francés', FALSE, 'VIP', 'activa'),
(8, 1, '2025-05-28', '23:00:00', 'Español', TRUE, 'Tradicional', 'activa'),
(7, 4, '2025-05-26', '05:00:00', 'Inglés', TRUE, 'VIP', 'activa'),
(15, 6, '2025-05-27', '23:00:00', 'Inglés', TRUE, 'VIP', 'activa'),
(5, 6, '2025-05-28', '05:00:00', 'Español', FALSE, 'VIP', 'activa'),
(3, 4, '2025-05-28', '17:00:00', 'Inglés', FALSE, 'VIP', 'activa'),
(12, 5, '2025-05-25', '02:00:00', 'Inglés', TRUE, 'Tradicional', 'activa'),
(7, 5, '2025-05-24', '20:00:00', 'Español', FALSE, 'Tradicional', 'activa'),
(14, 5, '2025-05-28', '14:00:00', 'Inglés', TRUE, 'Tradicional', 'activa'),
(8, 3, '2025-05-27', '05:00:00', 'Español', TRUE, 'Tradicional', 'activa'),
(1, 5, '2025-05-26', '14:00:00', 'Inglés', TRUE, 'Tradicional', 'activa'),
(11, 7, '2025-05-26', '02:00:00', 'Inglés', FALSE, 'Tradicional', 'activa'),
(7, 1, '2025-05-23', '14:00:00', 'Francés', TRUE, 'Tradicional', 'activa'),
(7, 7, '2025-05-25', '14:00:00', 'Español', FALSE, 'Tradicional', 'activa'),
(6, 7, '2025-05-28', '02:00:00', 'Inglés', TRUE, 'Tradicional', 'activa'),
(8, 2, '2025-05-23', '02:00:00', 'Español', FALSE, 'VIP', 'activa'),
(1, 6, '2025-05-24', '20:00:00', 'Francés', FALSE, 'VIP', 'activa'),
(9, 1, '2025-05-26', '14:00:00', 'Español', FALSE, 'VIP', 'activa'),
(5, 7, '2025-05-23', '14:00:00', 'Inglés', FALSE, 'VIP', 'activa'),
(6, 9, '2025-05-25', '14:00:00', 'Inglés', TRUE, 'Tradicional', 'activa'),
(11, 8, '2025-05-24', '17:00:00', 'Inglés', FALSE, 'VIP', 'activa'),
(5, 2, '2025-05-23', '05:00:00', 'Francés', FALSE, 'VIP', 'activa'),
(7, 5, '2025-05-23', '14:00:00', 'Español', FALSE, 'Tradicional', 'activa'),
(5, 4, '2025-05-23', '23:00:00', 'Inglés', TRUE, 'VIP', 'activa'),
(9, 9, '2025-05-23', '14:00:00', 'Francés', FALSE, 'Tradicional', 'activa'), 
(7, 4, '2025-05-28', '20:00:00', 'Inglés', TRUE, 'VIP', 'activa'),
(14, 1, '2025-05-22', '02:00:00', 'Español', FALSE, 'Tradicional', 'activa'),
(9, 1, '2025-05-23', '14:00:00', 'Español', TRUE, 'Tradicional', 'activa'),
(6, 7, '2025-05-28', '14:00:00', 'Español', TRUE, 'Tradicional', 'activa'),
(4, 3, '2025-05-25', '05:00:00', 'Francés', FALSE, 'Tradicional', 'activa'),
(4, 4, '2025-05-24', '14:00:00', 'Inglés', TRUE, 'VIP', 'activa'),
(8, 8, '2025-05-24', '20:00:00', 'Francés', TRUE, 'VIP', 'activa'),
(11, 8, '2025-05-23', '02:00:00', 'Inglés', FALSE, 'VIP', 'activa'),
(14, 2, '2025-05-22', '02:00:00', 'Español', FALSE, 'VIP', 'activa'),
(6, 2, '2025-05-26', '17:00:00', 'Español', TRUE, 'VIP', 'activa'),
(7, 8, '2025-05-24', '14:00:00', 'Español', TRUE, 'VIP', 'activa'),
(3, 12, '2025-05-25', '17:00:00', 'Español', TRUE, 'VIP', 'activa'),
(9, 4, '2025-05-22', '20:00:00', 'Español', FALSE, 'VIP', 'activa'),
(5, 1, '2025-05-24', '17:00:00', 'Español', FALSE, 'VIP', 'activa'),
(12, 7, '2025-05-22', '14:00:00', 'Inglés', TRUE, 'Tradicional', 'activa'),
(1, 7, '2025-05-25', '20:00:00', 'Español', TRUE, 'Tradicional', 'activa'),
(7, 4, '2025-05-22', '23:00:00', 'Inglés', TRUE, 'VIP', 'activa'),
(4, 8, '2025-05-25', '02:00:00', 'Español', FALSE, 'VIP', 'activa'),
(9, 8, '2025-05-26', '14:00:00', 'Francés', FALSE, 'VIP', 'activa'),
(4, 2, '2025-05-24', '20:00:00', 'Francés', TRUE, 'VIP', 'activa'),
(6, 3, '2025-05-24', '17:00:00', 'Francés', FALSE, 'Tradicional', 'activa'),
(6, 7, '2025-05-28', '17:00:00', 'Inglés', TRUE, 'Tradicional', 'activa'),
(4, 11, '2025-05-26', '05:00:00', 'Francés', TRUE, 'Tradicional', 'activa'),
(1, 3, '2025-05-26', '17:00:00', 'Inglés', FALSE, 'Tradicional', 'activa'),
(8, 9, '2025-05-27', '23:00:00', 'Español', FALSE, 'Tradicional', 'activa'),
(7, 4, '2025-05-24', '05:00:00', 'Francés', FALSE, 'VIP', 'activa'),
(13, 9, '2025-05-26', '05:00:00', 'Francés', FALSE, 'Tradicional', 'activa');




INSERT INTO Usuarios (id_usuario, nombre, apellido_paterno, apellido_materno, correo,telefono, fecha_de_nacimiento, contrasena, tipo_usuario) VALUES
(1, 'Donovan Amaury', 'Alcantara', 'Cruz', 'mau@gmail.com', '5512345678', '2002-01-25', '$2y$10$f.WI0tmajCqYjLgeP3rWN.l2Kxt.38UbUeDt16UJw.9SIU65b3SLS', 'cliente'),
(2, 'Mariana', 'Montejo', 'Padilla', 'mariana@gmail.com', '5510283718', '2004-10-11', '$2y$10$enF2/nxSO/7.Fsx1YUr9/u0vC84izmkCfs.53nRVr2XU4i8pRxAzu', 'cliente'),
(3, 'Alan', 'Otzar', 'NoMeAcuerdo', 'clasista@unam.fes.aragon.mx', '5552983718', '2004-05-15', '$2y$10$vPO92Thc9uEiidZ6JUe/P.QtzB56CgF6V6llOr4xGc8oFButSKnFW', 'cliente'),
(4, 'Alejandro', 'Enrique', 'Ortega', 'ale120cm@gmail.com', '5519462872', '2005-07-10', '$2y$10$3mVrFuZ7XWrNHtCwW48njeIOXVPrRIsUc5yhaljHD0CcvYiH67x5G', 'cliente'),
(5, 'ADMIN', 'ADMIN', 'ADMIN', 'ADMIN@GMAIL', '1111111111', '1111-11-11', '$2y$10$8sF42eUgrPWnjdzBxYOOmeUtJSB7Wx.M.Frj99JxllSMGX1Nd2Rou', 'administrador');


