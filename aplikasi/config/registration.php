<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../vendor/autoload.php'; // Jika menggunakan Composer
require 'connection.php'; // File koneksi ke database
date_default_timezone_set('Asia/Jakarta');

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
         $mail = new PHPMailer(true);
         try {
            $mail->isSMTP();
            $mail->Host       = 'smtp.gmail.com';
            $mail->SMTPAuth   = true;
            $mail->Username   = 'fairuzdeveloper@gmail.com';
            $mail->Password   = 'cbmm lbvj tbjr vnql'; // App Password Gmail
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
            $mail->Port       = 465;

            $mail->setFrom('fairuzdeveloper@gmail.com', 'MILK-io Website');
            $mail->addAddress($email, $nama);

            $mail->isHTML(true);
            $mail->Subject = "Konfirmasi Pendaftaran Akun - MILK-io";

            $mail->Body = "
            <html>
            <head>
               <style>
                  body { font-family: Arial, sans-serif; background-color: #f8f8f8; padding: 20px; }
                  .container { max-width: 600px; margin: auto; background-color: #ffffff; padding: 20px; border-radius: 10px; }
                  .header { background-color: #3f51b5; color: white; padding: 10px 20px; border-radius: 10px 10px 0 0; }
                  .content { padding: 20px; }
                  .footer { font-size: 12px; color: #888; margin-top: 20px; text-align: center; }
               </style>
            </head>
            <body>
               <div class='container'>
                  <div class='header'>
                  <h2>Selamat Datang di MILK-io!</h2>
                  </div>
                  <div class='content'>
                  <p>Halo <strong>$nama</strong>,</p>
                  <p>Akun Anda telah berhasil didaftarkan ke sistem kami.</p>
                  <p><strong>Username:</strong> $username</p>
                  <p>Silakan login untuk mulai menggunakan layanan MILK-io.</p>
                  <br>
                  <p>Jika Anda merasa tidak melakukan pendaftaran ini, silakan abaikan email ini.</p>
                  </div>
                  <div class='footer'>
                  &copy; " . date('Y') . " MILK-io. All rights reserved.
                  </div>
               </div>
            </body>
            </html>";

            $mail->AltBody = "Halo $nama,\n\nAkun Anda berhasil dibuat.\nUsername: $username\n\nSilakan login.\n\nTerima kasih.";

            $mail->send();

         } catch (Exception $e) {
            echo "Email tidak dapat dikirim. Error: {$mail->ErrorInfo}";
         }

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


