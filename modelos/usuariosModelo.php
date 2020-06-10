<?php
class usuarios{
    private $db;



    public function __construct(){


        require_once("modelos/conectar.php");
        
        $this->db=Conectar::conexion();
    
    }




    public function getUsuarios($numero){
        $desde=0;
        $hasta=6;
        if($numero>=1){
        $desde=$numero*$hasta-$hasta;
        }
        $marcas=array();
        $consulta = $this->db->query("SELECT * FROM usuario WHERE alta = 1 ORDER BY  idusuario  DESC LIMIT $desde, $hasta");

        while($filas = $consulta->fetch(PDO::FETCH_ASSOC)){
        
            $usuarios[] = $filas;
        }

        return $usuarios;

    }












    public function getUsuarioRegistro($idusuario){
    
        $consulta = $this->db->query("SELECT * FROM usuario WHERE idusuario = $idusuario");

        while($filas = $consulta->fetch(PDO::FETCH_ASSOC)){
        
            $usuarios[] = $filas;
        }

        return $usuarios;

    }


    public function insertarUsuario( $nombre, $apellidos, $dni, $direccion, $telefono,
    
    $nick, $mail, $contrasena) {
        

      
    
        $consulta =  $this->db->query("INSERT INTO usuario (nombre, apellidos, dni, direccion, telefono,
    
        nick, mail, contrasena
          ) VALUES ('$nombre', '$apellidos', '$dni', '$direccion', '$telefono',
    
    '$nick', '$mail', '$contrasena')");
  
  
  
  
      }
  

    public function editarUsuario( $idusuario, $nick, $apellidos, $dni, $nivel, $nombre, $telefono, $direccion, $mail, $contrasena ){
            
        $consulta = $this->db->query( "UPDATE usuario SET
                nick = '$nick',
                apellidos = '$apellidos',
                dni = '$dni',
                nivel = $nivel,
                nombre = '$nombre',
                telefono = '$telefono',
                direccion = '$direccion',
                mail = '$mail',
                contrasena = '$contrasena'
            WHERE idusuario = $idusuario ");
        

    }

    public function borrarUsuario($idusuario){
            
        $consulta = $this->db->query( "UPDATE usuario SET
                alta = 0
            WHERE idusuario = $idusuario ");
        

    }



  public function   comprobarUsuario ($email){

    $consulta = $this->db->query("SELECT * FROM usuario WHERE mail = '$email'");


   return $consulta->rowCount();

  }


  public function   comprobarUsuarioContrasena ($email, $contrasena){

    $consulta = $this->db->query("SELECT * FROM usuario WHERE mail = '$email' AND contrasena = '$contrasena' AND alta = 1");
    $_SESSION['login'] = 0;

   return $consulta->rowCount();

  }
    
public function login($email, $contrasena){

   
        $consulta = $this->db->query("SELECT * FROM usuario WHERE mail = '$email' AND contrasena = '$contrasena'");
        
        while($filas = $consulta->fetch(PDO::FETCH_ASSOC)){
        
            $usuarios[] = $filas;
        }
      
        foreach( $usuarios  as $login){

            $_SESSION['login'] = $login['nivel'];
            $_SESSION['id'] = $login['idusuario'];
            

        }

        
    }





    public function editarLogin( $idusuario, $nick, $apellidos, $dni, $nombre, $telefono, $direccion, $contrasena ){
            
        $consulta = $this->db->query( "UPDATE usuario SET
                nick = '$nick',
                apellidos = '$apellidos',
                dni = '$dni',
                nombre = '$nombre',
                telefono = '$telefono',
                direccion = '$direccion',
                contrasena = '$contrasena'
            WHERE idusuario = $idusuario ");
        

    }


}


