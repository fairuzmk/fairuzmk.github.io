<?php

function registrasi($data){

   global $koneksi;

   $username = strtolower(stripslashes($data["username"]));
   $password = mysqli_real_escape_string($koneksi, $data["password"]);
   $password2 = mysqli_real_escape_string($koneksi, $data["password2"]);
   $level = mysqli_real_escape_string($koneksi, $data["level"]);
   //
   $nama = htmlspecialchars($data["nama"]);
   $email = htmlspecialchars($data["email"]);
   // $contact_hp = htmlspecialchars($data["contact_hp"]);
   $foto = htmlspecialchars($data["foto"]);
   //cek username sudah ada atau belum
   $cek_user = mysqli_query ($koneksi, "SELECT username FROM  tb_users WHERE username='$username'");
   if (mysqli_fetch_assoc($cek_user)){

      echo "<script>
      
      var Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
      });

      toastr.warning('Username sudah ada!')
      
        </script>";
      return false;

   }

   //CEK Konfirmasi Password
      if ($password !== $password2){
         echo "
      <script>
      
      var Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
      });

      toastr.error('Password yang dimasukkan tidak sama')
      
        </script>";
         return false;

      }
      
      if (empty($nama) || empty($email)) {
         echo "
      <script>
      
      var Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
      });

      toastr.warning('Pastikan Semua Field Sudah terisi')
      
        </script>";
         return false;

      }
      
   //ENKRIPSI PASSWORD
   $password = password_hash($password, PASSWORD_DEFAULT);


   //TAMBAHKAN DATA ke DATABASE
   mysqli_query($koneksi, "INSERT INTO tb_users (nama,username, password, level, email, contact_hp) 
                                       VALUES ('$nama', '$username', '$password', '$level', '$email', '')");
   
   mysqli_query($koneksi, "INSERT INTO tb_personal (nama, foto) 
                                       VALUES ('$nama', '$foto')");

   return mysqli_affected_rows($koneksi);
}

if (isset ($_POST["register"])){

    if (registrasi($_POST) > 0){

      echo "<script>
            Swal.fire({
            icon: 'success',
            title: 'Akun anda sudah dibuat!',
            showConfirmButton: false,
            timer: 1500
            });
            </script>";
      
      
    } else {
      echo mysqli_error($koneksi);

    }


}  
?> 


