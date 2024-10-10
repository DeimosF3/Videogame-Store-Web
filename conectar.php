<?php
class Conectar
{
    private $conexion;
    public function __construct($servidor, $usuario, $contrasena, $bbdd)
    {
        $this->conexion = new mysqli($servidor, $usuario, $contrasena, $bbdd);
    }

    public function hacer_consulta($consulta, $tipos, $variables)
    {
        $sentencia = $this->conexion->prepare($consulta);

        $array_completo = array_merge([$tipos], $variables);
        $referencias = [];
        foreach ($array_completo as $clave => $valor) {
            $referencias[$clave] = &$array_completo[$clave];
        }
        call_user_func_array([$sentencia, 'bind_param'], $referencias);
        $sentencia->execute();
        echo "Se han actualizado los datos correctamente";
        $this->conexion->close();

    }

    public function recibir_datos($consulta)
    {
        $sentencia = $this->conexion->query($consulta);
        $filas = [];
        while ($row = $sentencia->fetch_assoc()) {
            $filas[] = $row;
        }

        return $filas;
    }
}
