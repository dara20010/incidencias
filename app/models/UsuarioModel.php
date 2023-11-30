<?php
//Lo relaciona con el archivo de conexion de la bd
require_once 'config/conexion.php';
//Esta clase maneja la autenticacion y los roles
class UsuarioModel
{
    private $db; //Almacena la conexion a la bd
    protected $usuario;
    protected $password;

    //Método constructor: Estable la conexion a la bd
    public function __construct()
    {
        $this->db = (new Conexion())->getConexion();
    }

    //Método para iniciar sesión
    public function iniciarSesion($username, $password)
    {
        $this->usuario = $username;
        $this->password = $password;
        $query = "EXEC SP_Usuario_login :username, :password"; //Procedimiento almacenado para la autenticacion
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':username', $this->usuario);
        $stmt->bindParam(':password', $this->password);
        $stmt->execute();

        $resultado = $stmt->fetch(); // Obtiene el resultado de la autenticación

        $logData = "SP Result: " . $resultado;
        file_put_contents('logs/log.txt', $logData . PHP_EOL, FILE_APPEND);
        if ($resultado) {
            // Inicio de sesión exitoso, almacena el nombre de la persona en la sesión
            $_SESSION['nombreDePersona'] = $resultado['PER_nombre'];
            return true;
        }
        return false;

    }

    public function obtenerRol($username)
    {
        $consulta="SELECT  ROL_nombre as rol
                    FROM USUARIO u
                    INNER JOIN ROL r ON r.ROL_codigo = u.ROL_codigo 
                    WHERE USU_usuario = :username";
        $stmt = $this->db->prepare($consulta);
        $stmt->bindParam(':username', $username);
        $stmt->execute();

        $fila = $stmt->fetch();

        if ($fila) {
            return $fila['rol']; // Devuelve el rol del usuario
        } else {
            return null; // El usuario no existe o no tiene un rol asignado
        }
    }
    public function redireccionSegunRol($username)
    {
        $rol = $this->obtenerRol($username);
        if($rol ==='Administrador'){
            //Redirige al panel de administrador
            header('Location: registro-incidencia.php');
        }elseif ($rol === 'Trabajador'){
            header('Location:registro-incidencia.php');
        }else{
            //No se redirige
        }
    }
}
