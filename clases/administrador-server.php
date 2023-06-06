<?php

require "Conexion.php";

class Administrador extends Conexion {
    protected $id;
    protected $nombre;
    protected $apellido;
    protected $carnet;
    protected $salario;
    protected $telefono;
    protected $correo;
    protected $password;
    protected $id_departamento;
    protected $id_rol;

    /** CRUD de administradores */
    // Método para obtener todos los departamentos
    public function departamentos() {
        $this->conectar();
        $query = "SELECT * FROM departamento";
        $resultado = mysqli_query($this->conexion, $query);
        return $resultado;
    }

    // Método para obtener todos los cargos
    public function cargos() {
        $this->conectar();
        $query = "SELECT * FROM cargo";
        $resultado = mysqli_query($this->conexion, $query);
        return $resultado;
    }

    // Método para registrar un administrador utilizando el formulario HTML
    public function insertar() {
        if(isset($_POST['nombre'], $_POST['apellido'], $_POST['salario'], $_POST['carnet'], $_POST['telefono'], $_POST['correo'], $_POST['password'], $_POST['departamento'])) {
            $this->nombre = $_POST['nombre'];
            $this->apellido = $_POST['apellido'];
            $this->salario = $_POST['salario'];
            $this->carnet = $_POST['carnet'];
            $this->telefono = $_POST['telefono'];
            $this->correo = $_POST['correo'];
            $this->password = $_POST['password'];
            $this->id_departamento = $_POST['departamento'];
            $this->id_rol = 2;
            
            $this->conectar();
            $query = "INSERT INTO administrador (nombre, apellido, salario, carnet, telefono, correo, password, id_departamento, id_rol) VALUES ('$this->nombre', '$this->apellido', $this->salario, '$this->carnet', $this->telefono, '$this->correo', '$this->password', $this->id_departamento, $this->id_rol)";
            $result = mysqli_query($this->conexion, $query);

            if(!empty($result)) {
                header("location: index.php");
                exit;
            } else {
                echo "Error al registrar el administrador";
            }
        }
    }

    // Método para obtener todos los administradores
public function getAdministradores() {
    $this->conectar();
    $query = "SELECT * FROM administrador";
    $result = mysqli_query($this->conexion, $query);
    $administradores = [];

    while ($row = mysqli_fetch_assoc($result)) {
        $administradores[] = $row;
    }

    return $administradores;
}


    // Método para actualizar un administrador
    public function actualizar() {
        if(isset($_POST['id_administrador'], $_POST['nombre'], $_POST['apellido'], $_POST['salario'], $_POST['carnet'], $_POST['telefono'], $_POST['correo'], $_POST['password'], $_POST['departamento'])) {
            $this->id = $_POST['id_administrador'];
            $this->nombre = $_POST['nombre'];
            $this->apellido = $_POST['apellido'];
            $this->salario = $_POST['salario'];
            $this->carnet = $_POST['carnet'];
            $this->telefono = $_POST['telefono'];
            $this->correo = $_POST['correo'];
            $this->password = $_POST['password'];
            $this->id_departamento = $_POST['departamento'];
            
            $this->conectar();
            $query = "UPDATE administrador SET nombre = '$this->nombre', apellido = '$this->apellido', salario = $this->salario, carnet = '$this->carnet', telefono = $this->telefono, correo = '$this->correo', password = '$this->password', id_departamento = $this->id_departamento WHERE id = $this->id";
            $result = mysqli_query($this->conexion, $query);

            if(!empty($result)) {
                header("location: administradores.php");
                exit;
            } else {
                echo "Error al actualizar el administrador";
            }
        }
    }
    // Método para desactivar un administrador
    public function desactivar() {
        if(isset($_POST['id_administrador'])) {
            $this->id = $_POST['id_administrador'];
            $this->id_estado = 2; // Administrador inactivo
            $this->conectar();
            $query = "UPDATE administrador SET id_estado = $this->id_estado WHERE id = $this->id";
            $result = mysqli_query($this->conexion, $query);

            if(!empty($result)) {
                echo "";
            } else {
                echo "No se pudo desactivar el administrador";
            }
        }
    }
}

?>
