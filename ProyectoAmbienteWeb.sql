CREATE DATABASE ProyectoAmbienteWeb;
GO
USE ProyectoAmbienteWeb;
GO

-- tabla Usuario
CREATE TABLE Usuario (
    Usuario_id INT IDENTITY(1,1) PRIMARY KEY,
    Nombre VARCHAR(100) NOT NULL,
    Apellidos VARCHAR(100) NOT NULL,
    Correo VARCHAR(100) NOT NULL
);
GO

-- tabla Usuario_tel
CREATE TABLE Usuario_tel (
    Usuario_id INT PRIMARY KEY,
    Num_Telefono VARCHAR(15) NOT NULL,
    FOREIGN KEY (Usuario_id) REFERENCES Usuario(Usuario_id)
);
GO

-- tabla Usuario_perfil
CREATE TABLE Usuario_perfil (
    Usuario_id INT PRIMARY KEY,
    Nombre_usuario VARCHAR(100) NOT NULL,
    Contraseña VARCHAR(100) NOT NULL,
    FOREIGN KEY (Usuario_id) REFERENCES Usuario(Usuario_id)
);
GO

-- tabla Mensajes
CREATE TABLE Mensajes (
    mensaje_id INT IDENTITY(1,1) PRIMARY KEY,
    Asunto VARCHAR(100) NOT NULL,
    Fecha_envio DATE NOT NULL,
    Usuario_id INT,
    FOREIGN KEY (Usuario_id) REFERENCES Usuario(Usuario_id)
);
GO

-- tabla Empresa
CREATE TABLE Empresa (
    Empresa_id INT IDENTITY(1,1) PRIMARY KEY,
    Nombre VARCHAR(100) NOT NULL,
    Ubicación VARCHAR(100) NOT NULL,
    Descripción TEXT NOT NULL
);
GO

-- tabla Contratador
CREATE TABLE Contratador (
    ID_contratador INT IDENTITY(1,1) PRIMARY KEY,
    NombreC VARCHAR(100) NOT NULL,
    ApellidosC VARCHAR(100) NOT NULL,
    CorreoC VARCHAR(100) NOT NULL,
    Empresa_id INT,
    FOREIGN KEY (Empresa_id) REFERENCES Empresa(Empresa_id)
);
GO

-- tabla Oferta_Empleo
CREATE TABLE Oferta_Empleo (
    Oferta_id INT IDENTITY(1,1) PRIMARY KEY,
    NombreOfer VARCHAR(100) NOT NULL,
    DescripcionOfer TEXT NOT NULL,
    Link_de_refireccion VARCHAR(255) NOT NULL,
    Empresa_id INT,
    FOREIGN KEY (Empresa_id) REFERENCES Empresa(Empresa_id)
);
GO

-- tabla Solicitud_empleo
CREATE TABLE Solicitud_empleo (
    Solicitud_ID INT IDENTITY(1,1) PRIMARY KEY,
    Nombre_de_aplicante VARCHAR(100) NOT NULL,
    CV_de_aplicante TEXT NOT NULL,
    Oferta_id INT,
    FOREIGN KEY (Oferta_id) REFERENCES Oferta_Empleo(Oferta_id)
);
GO