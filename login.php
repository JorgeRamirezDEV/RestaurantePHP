<?php
require _ once 'bd. php' ;

if ($_SERVER["REQUEST_METHOD"] == "POST") {

$usu = comprobar_usuario($_POST['usuario'], $_POST[ 'clave']);
if($usu===FALSE){
$err = TRUE;
$usuario = $_POST['usuario'];
}else{
session_start();
// $usu tiene campos correo y codRes, correo
$_SESSI0N['usuario'] = $usu;
$ SESSION['carrito'] = [];
header("Location: categorias.php");
return;
}
}
?>
< ! DOCTYPE html>
<html>
    <head>
        <title>Formulario de login</title>
        <meta charset = "UTF-8">
    </head>
    <body>
    <?php if(isset($_GET["redirigido"])){
        echo "<p>Haga login para continuar</p>";
    }?>
    <?php if(isset($err) and $err == TRUE){
        echo "<p> Revise usuario y contrasefia</p>";
    }?>
        <form action = "<?php echo htmlspecialchars($_SERVER["PHP_
        SELF"]); ?>" method = "POST">
        <label for = "usuario">Usuario</label>
    <input value = "<?php if(isset($usuario) )echo $usuario;?>"
    id= "usuario" name = "usuario" type = "text">