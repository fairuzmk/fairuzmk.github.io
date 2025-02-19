<?php


function query($query){
   global $koneksi;
   $result = mysqli_query($koneksi, $query);
   $rows = [];
   while ( $row = mysqli_fetch_assoc($result)){
      $rows []=$row;

   }
   return $rows;

}

function updDataDiri($data){

   global $koneksi;
   
   $id = isset($data['id']) ? ($data['id']) : '';

   $nama = isset($data['nama']) ? htmlspecialchars($data['nama']) : '';
   $kelamin = isset($data['kelamin']) ? htmlspecialchars($data['kelamin']) : '';
   $tempatlahir = isset($data['tempatlahir']) ? htmlspecialchars($data['tempatlahir']) : '';
   if (isset($data['tgl_lahir'])) {
       $tgl_lahir_input = $data['tgl_lahir']; // Contoh: "10 Februari 2024"
       $tgl_lahir = date('Y-m-d', strtotime($tgl_lahir_input)); // Output: "2024-02-10"
   } else {
       $tgl_lahir = null;
   }
   $alamat_rumah = isset($data['alamat_rumah']) ? htmlspecialchars($data['alamat_rumah']) : '';
   $contact_hp = isset($data['contact_hp']) ? htmlspecialchars($data['contact_hp']) : '';
   $email = isset($data['email']) ? htmlspecialchars($data['email']) : '';
   $foto = isset($data['foto']) ? htmlspecialchars($data['foto']) : '';
   $nip = isset($data['nip']) ? htmlspecialchars($data['nip']) : '';
   $no_karpeg = isset($data['no_karpeg']) ? htmlspecialchars($data['no_karpeg']) : '';
   $pangkat_gol = isset($data['pangkat_gol']) ? htmlspecialchars($data['pangkat_gol']) : '';
   $jabatan = isset($data['jabatan']) ? htmlspecialchars($data['jabatan']) : '';
   if (isset($data['tmt_jabatan'])) {
       $tmt_jabatan_input = $data['tmt_jabatan']; // Contoh: "10 Februari 2024"
       $tmt_jabatan = date('Y-m-d', strtotime($tmt_jabatan_input)); // Output: "2024-02-10"
   } else {
       $tmt_jabatan = null;
   }
   $instansi = isset($data['instansi']) ? htmlspecialchars($data['instansi']) : '';
   $unit_kerja = isset($data['unit_kerja']) ? htmlspecialchars($data['unit_kerja']) : '';
   $alamat_kantor = isset($data['alamat_kantor']) ? htmlspecialchars($data['alamat_kantor']) : '';

  

 
 


   // // Validasi data tidak boleh kosong
   // if (empty($nama) || empty($kelamin) || empty($nip)) {
   //     echo json_encode(["status" => "error", "message" => "Nama, Jenis Kelamin, dan NIP wajib diisi!"]);
   //     exit();
   // }

   // Query untuk menyimpan data ke database
   $upd_datadiri = "UPDATE tb_personal 
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
             email = '$email'
             WHERE id = $id";

   mysqli_query($koneksi, $upd_datadiri);

   return mysqli_affected_rows($koneksi);

}

function updFoto($data){
    
    global $koneksi;

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
        alert ('Silahkan Upload Gambar yang benar');
        </script>";
    }

    //CEK UKURAN FILE 
    if ($ukuranFile > 50000000) {
        echo "<script>
        alert ('Ukuran Gambar Maksimal 5MB');
        </script>";
        return false;
    }

    //
    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiFoto;

    if (!is_dir('img')) {
        mkdir('img', 0777, true);
    }

    if (move_uploaded_file($tmpName, 'img/' . $namaFileBaru)) {
        return $namaFileBaru;
    } else {
        echo "<script>alert('Gagal mengupload gambar');</script>";
        return false;
    }

}

function tambahPendidikan($data){

    global $koneksi;
    
    $nama = isset($data['nama']) ? htmlspecialchars($data['nama']) : '';
    $jenjang = isset($data['jenjang']) ? htmlspecialchars($data['jenjang']) : '';
    $kampus = isset($data['kampus']) ? htmlspecialchars($data['kampus']) : '';
    $jurusan = isset($data['jurusan']) ? htmlspecialchars($data['jurusan']) : '';
    $tahun_masuk = isset($data['tahun_masuk']) ? htmlspecialchars($data['tahun_masuk']) : '';
    $tahun = isset($data['tahun']) ? htmlspecialchars($data['tahun']) : '';
   
  
  
     $tambah_pendidikan = "INSERT INTO tb_pendidikan (id,nama,kampus, jenjang, jurusan, tahun_masuk , tahun) 
                                            VALUES ('','$nama','$kampus', '$jenjang', '$jurusan','$tahun_masuk', '$tahun')";
          
 
    mysqli_query($koneksi, $tambah_pendidikan);
 
    return mysqli_affected_rows($koneksi);
 
 }

 function tambahKti($data){

    global $koneksi;
    
    $nama = isset($data['nama']) ? htmlspecialchars($data['nama']) : '';
    $judul = isset($data['judul']) ? htmlspecialchars($data['judul']) : '';
    $jurnal = isset($data['jurnal']) ? htmlspecialchars($data['jurnal']) : '';
    $author = isset($data['author']) ? htmlspecialchars($data['author']) : '';
    $year = isset($data['year']) ? htmlspecialchars($data['year']) : '';
    $reputasi = isset($data['reputasi']) ? htmlspecialchars($data['reputasi']) : '';
   
  
  

    $tambah_kti = "INSERT INTO tb_karyailmiah (id,nama, judul, jurnal, author, year , reputasi) 
                                            VALUES ('','$nama','$judul', '$jurnal', '$author','$year', '$reputasi')";
          
 
    mysqli_query($koneksi, $tambah_kti);
 
    return mysqli_affected_rows($koneksi);
 
 }


 function tambahWorkExp($data){

    global $koneksi;
    
    $nama = isset($data['nama']) ? htmlspecialchars($data['nama']) : '';
    $kegiatan = isset($data['kegiatan']) ? htmlspecialchars($data['kegiatan']) : '';
    $pendanaan = isset($data['pendanaan']) ? htmlspecialchars($data['pendanaan']) : '';
    $peran = isset($data['peran']) ? htmlspecialchars($data['peran']) : '';
    $year = isset($data['year']) ? htmlspecialchars($data['year']) : '';
 
  

    $tambah_workexp = "INSERT INTO tb_experience (id,nama, kegiatan, pendanaan, peran, year) 
                                            VALUES ('','$nama','$kegiatan', '$pendanaan', '$peran','$year')";
          
 
    mysqli_query($koneksi, $tambah_workexp);
 
    return mysqli_affected_rows($koneksi);
 
 }

