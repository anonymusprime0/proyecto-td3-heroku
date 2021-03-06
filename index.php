<?php 
#require('..\Controladores\cl_login.php');
?>
<!DOCTYPE html>
<html lang="es-la">
<head>
<meta charset="utf-8">
<style type="text/css">
/* Formulario bordeado */
form {
    border: 3px solid #f1f1f1;
    display: inline-block;
    width: 50%;
    margin-left: 25%;
    margin-right: 25%;
}

/* Inputs 100% */
input[type=text], input[type=password] {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
}

/* Estilo de los botones */
button {
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 100%;
}

/* Centrar la imagen de avatar */
.imgcontainer {
    text-align: center;
    margin: 24px 0 12px 0;
}

/* Imagen de avatar */
img.avatar {
    width: 20%;
    border-radius: 40%;
}

/* Padding de los containers */
.container {
    padding: 16px;
}

.mensaje {
    width: 100%;
}

/* Cambiar estilo por pantalla */
@media screen and (max-width: 300px) {
    span.psw {
        display: block;
        float: none;
    }
}
</style>
	<title>Sistema Basico de Login</title>
</head>
<body>
<form action="<?php $_SERVER['PHP_SELF'];?>" method="POST">
  <div class="imgcontainer">
    <img src="https://encrypted-tbn3.gstatic.com/images?q=tbn:ANd9GcS2LsyQzL4G5tyQEBNahy4cn9VdD-tqMyC-78yELWVRmY86sEuH" alt="Avatar" class="avatar">
  </div>
  <h1>Taller Desarrollo 3</h1>
  <div class="container">
    <label><b>Usuario</b></label>
    <input type="text" placeholder="El usuario" name="user" required>

    <label><b>Contraseña</b></label>
    <input type="password" placeholder="La contraseña" name="pass" required>
        
    <button type="submit">Login</button>

  <div class="container">
    <?php
        $user = $_SESSION['user'];
        $pass = $_SESSION['pass'];
        $access_db = LoginCtrl::acceder($user, $pass);
        if ($access_db->activo == 2 or $access_db->activo == 0){
            echo "<span class='mensaje' style='background-color: #f44336'>Usuario no existe o se encuentra inactivo</span>";
            exit();
        } else{
            echo "<span class='mensaje' style='background-color: #4CAF50'>Bienvenido ".$access_db->nombre." ".$access_db->apellido."</span>";
            header('Refresh: 2; URL = alquileres.php');
        }

        if ($error){
            echo "<span class='mensaje' style='background-color: #f44336'>".$error."</span>";
            exit();
        } elseif ($usuario){
            echo "<span class='mensaje' style='background-color: #4CAF50'>Bienvenido ".$_SESSION['usuario']->nombre." ".$_SESSION['usuario']->apellido."</span>";
            header('Refresh: 2; URL = alquileres.php');
        }
    ?>
  </div>
</form>
</body>
</html>