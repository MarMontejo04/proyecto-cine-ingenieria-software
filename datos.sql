}-- Tabla de usuarios
CREATE TABLE Usuarios (
  id_usuario INT AUTO_INCREMENT PRIMARY KEY,
  nombre VARCHAR(100),
  apellido_paterno VARCHAR(100),
  apellido_materno VARCHAR(100),
  correo VARCHAR(150) UNIQUE,
  telefono VARCHAR(20),
  fecha_de_nacimiento DATE,
  contraseña VARCHAR(255),
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
  poster_url VARCHAR(255)
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
  trailer_url VARCHAR(255),
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

-- Tabla de reservas
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
