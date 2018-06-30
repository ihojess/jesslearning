<?php

class Usuarios {
    private $conw;

    public function __construct() {
        $this->conw = new mysqli('127.0.0.1', 'root', '', 'jess');
        

    }

    public function crearUsuario($nombre, $apellido, $edad) {
        $insert = "INSERT INTO usuarios (nombre, apellido, edad) VALUES ('$nombre', '$apellido', '$edad')";
        $response = "";

        if ($this->conw->query($insert) === true) {
            $response = "Usuario creado";
        } else {
            $response = "No se pudo crear el usuario";
        }

        return $response;
    }

    public function obtenerUsuarios() {
        $select = "SELECT * FROM usuarios";
        $response = [];
        $query = $this->conw->query($select);

        if ($query->num_rows > 0) {
            while ($row = $query->fetch_assoc()) {
                $response[] = $row;
            }
        }

        return $response;
    }
}