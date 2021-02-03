<?php
sleep(3);
include('conexion.php');


if(isset($_POST['user']) && isset($_POST['passwd']) && isset($_POST['email'])){
$email=$_POST['email'];
$user = $_POST['user'];

$passwd=password_hash($_POST['passwd'], PASSWORD_DEFAULT, ['cost' => 15]);

#echo "el usuario es". $user."y la contraseña". $passwd;
$query ="SELECT * FROM adminuser WHERE user='$user' OR email = '$email'";
$result= $conexion -> query($query);

$succes = $result->num_rows;

if($succes == 0){
    $query = "INSERT INTO adminuser (user, email, passwd)
            VALUES ('$user', '$email','$passwd')";
             $insert= $conexion->query($query) or die(mysqli_errno());
            echo 1;
}

else{
    echo 2;
}
}

?>