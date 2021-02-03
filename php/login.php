<?php
sleep(3);
include("conexion.php");

if(isset($_POST['user']) && isset($_POST['passwd'])){
     $user = $_POST['user'];
     $passwd=$_POST['passwd'];
     $contador=0;


$query ="SELECT * FROM adminuser WHERE user='$user' OR email='$user'";
$script= mysqli_query($conexion,$query);

while($fila=mysqli_fetch_array($script,MYSQLI_ASSOC)){

// echo "usuario: " . $fila['user'] . "<br>";
// echo "contraseña: ".  $fila['passwd'];

if(password_verify($passwd, $fila['passwd'])){
    $contador++;
}


}

if($contador>0){
    SESSION_START();
    $_SESSION['user'] = $user;
    echo 1;
}
else{
    echo 0;
}



#echo "el usuario es". $user."y la contraseña". $passwd;
// $query ="SELECT * FROM adminuser WHERE user='$user' OR email = '$user' AND passwd = '$passwd';";
// $result= $conexion -> query($query);

// $succes = $result->num_rows;

// if($succes == 1){
//     SESSION_START();
//     $_SESSION['user'] = $user;
//     echo 1;
// }
// else{
//     echo 0;
// }


}


?>