<?php
require '../header.php';
include '../../config/connection.php';

// Pastikan permintaan hanya diterima via POST

    // Ambil data dari form
    $id = isset($_POST['id']) ? ($_POST['id']) : '';

    $nama = isset($_POST['nama']) ? htmlspecialchars($_POST['nama']) : '';
    $kelamin = isset($_POST['kelamin']) ? htmlspecialchars($_POST['kelamin']) : '';
    $tempatlahir = isset($_POST['tempatlahir']) ? htmlspecialchars($_POST['tempatlahir']) : '';
    if (isset($_POST['tgl_lahir'])) {
        $tgl_lahir_input = $_POST['tgl_lahir']; // Contoh: "10 Februari 2024"
        $tgl_lahir = date('Y-m-d', strtotime($tgl_lahir_input)); // Output: "2024-02-10"
    } else {
        $tgl_lahir = null;
    }
    $alamat_rumah = isset($_POST['alamat_rumah']) ? htmlspecialchars($_POST['alamat_rumah']) : '';
    $contact_hp = isset($_POST['contact_hp']) ? htmlspecialchars($_POST['contact_hp']) : '';
    $email = isset($_POST['email']) ? htmlspecialchars($_POST['email']) : '';
    $foto = isset($_POST['foto']) ? htmlspecialchars($_POST['foto']) : '';
    $nip = isset($_POST['nip']) ? htmlspecialchars($_POST['nip']) : '';
    $no_karpeg = isset($_POST['no_karpeg']) ? htmlspecialchars($_POST['no_karpeg']) : '';
    $pangkat_gol = isset($_POST['pangkat_gol']) ? htmlspecialchars($_POST['pangkat_gol']) : '';
    $jabatan = isset($_POST['jabatan']) ? htmlspecialchars($_POST['jabatan']) : '';
    if (isset($_POST['tmt_jabatan'])) {
        $tmt_jabatan_input = $_POST['tmt_jabatan']; // Contoh: "10 Februari 2024"
        $tmt_jabatan = date('Y-m-d', strtotime($tmt_jabatan_input)); // Output: "2024-02-10"
    } else {
        $tmt_jabatan = null;
    }
    $instansi = isset($_POST['instansi']) ? htmlspecialchars($_POST['instansi']) : '';
    $unit_kerja = isset($_POST['unit_kerja']) ? htmlspecialchars($_POST['unit_kerja']) : '';
    $alamat_kantor = isset($_POST['alamat_kantor']) ? htmlspecialchars($_POST['alamat_kantor']) : '';
    


    // // Validasi data tidak boleh kosong
    // if (empty($nama) || empty($kelamin) || empty($nip)) {
    //     echo json_encode(["status" => "error", "message" => "Nama, Jenis Kelamin, dan NIP wajib diisi!"]);
    //     exit();
    // }

    // Query untuk menyimpan data ke database
    $query = "UPDATE tb_personal 
          SET nama = '$nama',
              nip = '$nip',
              tempatlahir = '$tempatlahir',
              tgl_lahir = '$tgl_lahir',
              no_karpeg = '$no_karpeg',
              kelamin = '$kelamin',
              pangkat_gol = '$pangkat_gol',
              tmt_jabatan = '$tmt_jabatan',
              jabatan = '$jabatan',
              instansi = '$instansi',
              unit_kerja = '$unit_kerja',
              alamat_rumah = '$alamat_rumah',
              alamat_kantor = '$alamat_kantor',
              contact_hp = '$contact_hp',
              email = '$email',
              foto = '$foto'
          WHERE id = $id";

require '../footer.php';

    if (mysqli_query($koneksi, $query)) {
        echo  "<script>
        Swal.fire({
        icon: 'success',
        title: 'Perubahan telah disimpan',
        showConfirmButton: false,
        timer: 1500
        });
        </script>";
    } else {
        echo "Gagal menyimpan data: ";
    }



//     // Tutup koneksi
//     mysqli_close($koneksi);
// } else {
//     echo json_encode(["status" => "error", "message" => "Metode tidak diizinkan"]);
// }


