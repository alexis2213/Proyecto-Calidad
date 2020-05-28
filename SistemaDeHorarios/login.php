
<?php

session_start();
require("connect_db.php");

$username = $_POST['user'];
$pass = $_POST['pass'];

$sql = "SELECT * FROM usuarios WHERE user = '$username' AND pasadmin = '$pass'";
$sql2 = mysqli_query($mysqli, $sql);

if ($row = mysqli_fetch_assoc($sql2)) {

    $_SESSION['id'] = $row['id'];
    $_SESSION['user'] = $row['user'];
    $_SESSION['rol'] = $row['rol'];


    header('location: maestro.php');
} else {
    echo '<script>alert("USUARIO O CONTRASEÑA INCORRECTA")</script> ';
    echo "<script>location.href='index.php'</script>";
}

$sql3 = "SELECT * FROM usuarios WHERE user = '$username' AND password = '$pass'";
$sql1 = mysqli_query($mysqli, $sql3);


if ($f = mysqli_fetch_assoc($sql1)) {

    $_SESSION['id'] = $f['id'];
    $_SESSION['user'] = $f['user'];
    $_SESSION['rol'] = $f['rol'];

    header("Location: alumno.php");
} else {
    echo '<script>alert("USUARIO O CONTRASEÑA INCORRECTA")</script> ';
    echo "<script>location.href='index.php'</script>";
}
?>