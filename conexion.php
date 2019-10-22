<?php
$link = mysqli_connect("localhost", "root");//identifico el usuario
$sql= 'CREATE DATABASE EquiposFutbol';//creo la base de datos
if (mysqli_query($link, $sql)) {
    echo "La base de datos EquiposFutbol se creó correctamente\n";
} else {
    echo 'Error al crear la base de datos: ' . mysqli_error($link) . "\n";
}
$link = mysqli_connect("localhost", "root") or //me conecto a la base de datos
    die ('Unable to connect. Check your connection parameters.');
mysqli_select_db($link,'EquiposFutbol') or die(mysqli_error($link));//selecciono la bd
echo "</br>";
echo "Conectado";

$sql = 'CREATE TABLE Equipos (
idEquipos INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
nombresEquipos VARCHAR(50) NOT NULL,
ciudadEquipos VARCHAR(50) NOT NULL,
anyoCreacion VARCHAR(50) NOT NULL,
categoriaEquipo INT(6),
duenyoEquipo INT(6)
)';
echo "</br>";
if (mysqli_query($link,$sql)) {
    echo "La tabla Equipos se creó correctamente\n";
} else {
    echo 'Error al crear la tabla: ' . mysqli_error($link) . "\n";
}
echo "</br>";
$sql = 'CREATE TABLE Categoria (
idCategoria INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
nombreCategoria VARCHAR(50) NOT NULL)';
if (mysqli_query($link,$sql)) {
    echo "La tabla Categoria se creó correctamente\n";
} else {
    echo 'Error al crear la tabla: ' . mysqli_error($link) . "\n";
}

echo "</br>";
$sql = 'CREATE TABLE Personas (
idPersona INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
nombrePersona VARCHAR(50) NOT NULL,
esDirector INT(6),
esJugador INT(6))';
if (mysqli_query($link,$sql)) {
    echo "La tabla Personas se creó correctamente\n";
} else {
    echo 'Error al crear la tabla: ' . mysqli_error($link) . "\n";
}
echo "</br>";
$sql = 'INSERT INTO Equipos
        (idEquipos, nombresEquipos, ciudadEquipos, anyoCreacion, categoriaEquipo,
        duenyoEquipo)
    VALUES
        (1, "Andorra FC", "Andorra la vella", 2018, 3, 1),
        (2, "FC Barcelona", "Barcelona", 1899, 1, 2),
        (3, "Real Madrid", "Madrid", 1867, 2, 1),
        (4, "Atletico de Madrid", "Madrid", 1871, 3, 1)';
        
if (mysqli_query($link,$sql)) {
    echo "La query se creó correctamente\n";
} else {
    echo 'Error al crear la query: ' . mysqli_error($link) . "\n";
}
echo "</br>";
 $sql = 'INSERT INTO Categoria
        (idCategoria, nombreCategoria)
    VALUES
        (1, "Primera division"),
        (2, "Segunda division"),
        (3, "Segunda division B"),
        (4, "Tercera division")';
        
if (mysqli_query($link,$sql)) {
    echo "La query se creó correctamente\n";
} else {
    echo 'Error al crear la query: ' . mysqli_error($link) . "\n";
}

echo "</br>";
$sql = 'INSERT INTO Personas
        (idPersona, nombrePersona,esDirector,esJugador)
    VALUES
        (1, "Gerard Pique",1,1),
        (2, "Leo Messi",0,1),
        (3, "Xavi Hernandez",1,1),
        (4, "Josep Bartomeu",0,1)';
        
if (mysqli_query($link,$sql)) {
    echo "La query se creó correctamente\n";
} else {
    echo 'Error al crear la query: ' . mysqli_error($link) . "\n";
}

echo "</br>";
 


$sql = 'SELECT nombresEquipos,ciudadEquipos,anyoCreacion,nombreCategoria,nombrePersona from Equipos,Categoria,Personas where categoriaEquipo=idCategoria and duenyoEquipo=idPersona;';
$result = mysqli_query($link,$sql) or die(mysqli_error($link));
// show the results
while ($row = mysqli_fetch_assoc($result)) {
extract($row);
echo $nombresEquipos . '-' . $ciudadEquipos . '-' . $anyoCreacion .'-' . $nombreCategoria .'-'. $nombrePersona;
echo "</br>";
}

/*
 
 */


 
 
 








?>