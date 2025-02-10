<?php
session_start();
include("connection.php");

$username=$_POST["username"];

$password=$_POST["password"];

$query = mysqli_query($koneksi,"SELECT * FROM tb_users WHERE username ='$username'");


if (mysqli_num_rows($query)===1)
{

   $user = mysqli_fetch_assoc($query);

   if( password_verify($password, $user["password"]) )
      {
         
         $_SESSION["nama"] = $user["nama"];
         $_SESSION["level"] = $user["level"];
         $_SESSION["id_user"] = $user["id_user"];
         header("Location: ../project-app"); 
         
         exit; 
      }
   
      



}

else if ($username ==''||$password='')
{
 header('Location:../index.php?error=10');
}


else{

   header('Location:../index.php?error=1');
   
}


?>