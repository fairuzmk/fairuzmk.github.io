<!doctype html>
<html lang="en">
  <!--begin::Head-->
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Login to Milk.io App</title>
    <!--begin::Primary Meta Tags-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="title" content="Milk.io | Login App" />
    <meta name="author" content="ColorlibHQ" />
    <meta
      name="description"
      content="Milk.io is website app made by FairuzMK"
    />
    <meta
      name="keywords"
      content="Milk.io, fairuzmk, fairuz website, fairuz milky kuswa"
    />
    <!--end::Primary Meta Tags-->
    <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../project-app/plugins/fontawesome-free/css/all.min.css">


    <!-- SweetAlert2 -->
  <link rel="stylesheet" href="../project-app/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
  <!-- favicon -->
  <link rel="shortcut icon" type="image/png" href="milk-io.png">
  <!-- Toastr -->
  <link rel="stylesheet" href="../project-app/plugins/toastr/toastr.min.css">
  </head>
   <!-- Theme style -->
   <link rel="stylesheet" href="../project-app/dist/css/adminlte.css">

<body>
<?php
include "connection.php";
include "query.php";

$nama = $_POST["nama"];
?>

<!-- SweetAlert2 -->
<script src="../project-app/plugins/sweetalert2/sweetalert2.min.js"></script>

<!-- Toastr -->
<script src="../project-app/plugins/toastr/toastr.min.js"></script>

</body>

</html>

<?php



if (isset ($_POST["updFoto"])){

    if (updFoto($_POST) > 0){

        echo "<script>
            Swal.fire({
            icon: 'success',
            title: 'Update Berhasil Dilakukan!',
            showConfirmButton: false,
            timer: 1500
            }).then(() => {
                window.location.href = '../project-app/index.php?page=data-diri';
            });
            </script>";
    //header("Location : index.php");
        
    } else {
        echo "<script>
        Swal.fire({
            icon: 'error',
            title: 'Gagal Mengupload Foto!',
            showConfirmButton: false,
            timer: 1500
            }).then(() => {
                window.location.href = '../project-app/index.php?page=data-diri';
            });
        </script>";
        echo mysqli_error($koneksi);

    }



} ;


function updFoto($data){
    
    global $koneksi;
    global $nama;

   //UPLOAD FOTO GAMBAR
   $id = isset($data['id']) ? ($data['id']) : '';
   $foto = upload();
   if (!$foto) {
    return false;
   }

   $upd_foto = "UPDATE tb_personal 
   SET 
       foto='$foto'
     WHERE id = $id";

mysqli_query($koneksi, $upd_foto);

return mysqli_affected_rows($koneksi);

}

function upload(){
    global $nama;
    $namaFile = $_FILES ['foto']['name'];
    $ukuranFile = $_FILES ['foto']['size'];
    $error = $_FILES['foto']['error'];
    $tmpName = $_FILES['foto']['tmp_name'];

    // //CEK APAKAH GAMBAR SUDAH DIPILIH
    if ($error === 4){
        echo "<script>
        alert ('Silahkan Pilih Gambar');
        </script>";
        return false;
    }

    //CEK APAKAH YANG DIUPLOAD ADALAH GAMBAR
    $validasiEkstensi = ['jpg','jpeg', 'png'];
    $ekstensiFoto = explode('.', $namaFile);
    $ekstensiFoto = strtolower(end($ekstensiFoto));

    if(!in_array($ekstensiFoto,$validasiEkstensi)){
        echo "<script>
        alert ('Silahkan Upload Gambar yang benar!');
        </script>";
        return false;
    }

    //CEK UKURAN FILE 
    if ($ukuranFile > 5242880) {
        echo "<script>
        alert ('Ukuran Gambar Maksimal 5MB');
        </script>";
        return false;
        
    }

    //

    $namaFileBaru = strtok($nama, " ");
    $namaFileBaru .= '_';
    $namaFileBaru .= uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiFoto;

    if (!is_dir('img')) {
        mkdir('img', 0777, true);
    }

    if (move_uploaded_file($tmpName, '../project-app/img/' . $namaFileBaru)) {
        return $namaFileBaru;
    } else {
        echo "<script>alert('Gagal mengupload gambar');</script>";
        return false;
    }

}

