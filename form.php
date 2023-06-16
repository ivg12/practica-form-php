<?php

// Validación del formulario del lado del servidor

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $email = $_POST['email'];

    // Valida campos vacíos
    if (empty($nombre) || empty($apellido) || empty($email)) {
        echo "Es necesario completar todos los campos.";
        return;
    }

    // Valida que el nombre y apellido no contengan números
    if (preg_match('/[0-9]/', $nombre) || preg_match('/[0-9]/', $apellido)) {
        echo "Recuerda que no se permiten caracteres numéricos en los campos Nombre y Apellido.";
        return;
    }

    // Valida formato de correo electrónico
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Por favor, ingresa un correo electrónico válido.";
        return;
    }

    // Conexión a la base de datos
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "cursoSQL";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Insertar los datos en la base de datos
    $sql = "INSERT INTO usuario (nombre, apellido, email) VALUES ('$nombre', '$apellido', '$email')";

    if ($conn->query($sql) === TRUE) {
        echo "Formulario enviado correctamente";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}

?>
