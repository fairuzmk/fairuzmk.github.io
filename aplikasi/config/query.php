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
   $gelarDepan = isset($data['gelarDepan']) ? htmlspecialchars($data['gelarDepan']) : '';
   $gelarBelakang = isset($data['gelarBelakang']) ? htmlspecialchars($data['gelarBelakang']) : '';
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

  

 


   // Query untuk menyimpan data ke database
   $upd_datadiri = "UPDATE tb_personal 
         SET nama = '$nama',
             gelar_depan = '$gelarDepan',
             gelar_belakang = '$gelarBelakang',
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

 function editPendidikan($data){

    global $koneksi;
    
    $id = isset($data['idPend']) ? ($data['idPend']) : '';
    $nama = isset($data['nama']) ? htmlspecialchars($data['nama']) : '';
    $jenjang = isset($data['jenjang']) ? htmlspecialchars($data['jenjang']) : '';
    $kampus = isset($data['kampus']) ? htmlspecialchars($data['kampus']) : '';
    $jurusan = isset($data['jurusan']) ? htmlspecialchars($data['jurusan']) : '';
    $tahun_masuk = isset($data['tahun_masuk']) ? htmlspecialchars($data['tahun_masuk']) : '';
    $tahun = isset($data['tahun']) ? htmlspecialchars($data['tahun']) : '';
    
  
  
     $upd_pendidikan = "UPDATE tb_pendidikan 
                            SET 
                            nama = '$nama',
                            kampus = '$kampus', 
                            jenjang = '$jenjang', 
                            jurusan = '$jurusan', 
                            tahun_masuk = '$tahun_masuk', 
                            tahun = '$tahun' 
                            
                            WHERE id = $id";
          
 
    mysqli_query($koneksi, $upd_pendidikan);
 
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
    $publisher = isset($data['publisher']) ? htmlspecialchars($data['publisher']) : '';
  
  

    $tambah_kti = "INSERT INTO tb_karyailmiah (id,nama, judul, jurnal, author, year , reputasi, publisher) 
                                            VALUES ('','$nama','$judul', '$jurnal', '$author','$year', '$reputasi', '$publisher')";
          
 
    mysqli_query($koneksi, $tambah_kti);
 
    return mysqli_affected_rows($koneksi);
 
 }

 function editKti($data){

    global $koneksi;
    
    $id = isset($data['idKti']) ? ($data['idKti']) : '';
    $nama = isset($data['nama']) ? htmlspecialchars($data['nama']) : '';
    $judul = isset($data['judul']) ? htmlspecialchars($data['judul']) : '';
    $jurnal = isset($data['jurnal']) ? htmlspecialchars($data['jurnal']) : '';
    $author = isset($data['author']) ? htmlspecialchars($data['author']) : '';
    $year = isset($data['year']) ? htmlspecialchars($data['year']) : '';
    $reputasi = isset($data['reputasi']) ? htmlspecialchars($data['reputasi']) : '';
    $publisher = isset($data['publisher']) ? htmlspecialchars($data['publisher']) : '';
  
  

    $edit_kti = "UPDATE tb_karyailmiah 
                    SET nama= '$nama', 
                    judul = '$judul', 
                    jurnal = '$jurnal', 
                    author = '$author', 
                    year ='$year', 
                    reputasi  = '$reputasi',
                    publisher = '$publisher'
                    WHERE id = $id ";
          
 
    mysqli_query($koneksi, $edit_kti);
 
    return mysqli_affected_rows($koneksi);
 
 }


 function tambahWorkExp($data){

    global $koneksi;
    
    $nama = isset($data['nama']) ? htmlspecialchars($data['nama']) : '';
    $kegiatan = isset($data['kegiatan']) ? htmlspecialchars($data['kegiatan']) : '';
    $kerjasama = isset($data['kerjasama']) ? htmlspecialchars($data['kerjasama']) : '';
    $peran = isset($data['peran']) ? htmlspecialchars($data['peran']) : '';
    $year = isset($data['year']) ? htmlspecialchars($data['year']) : '';
 
  

    $tambah_workexp = "INSERT INTO tb_experience (id,nama, kegiatan, kerjasama, peran, year) 
                                            VALUES ('','$nama','$kegiatan', '$kerjasama', '$peran','$year')";
          
 
    mysqli_query($koneksi, $tambah_workexp);
 
    return mysqli_affected_rows($koneksi);
 
 }

 function editWorkExp($data){

    global $koneksi;
    
    $id = isset($data['idWork']) ? ($data['idWork']) : '';
    $nama = isset($data['nama']) ? htmlspecialchars($data['nama']) : '';
    $kegiatan = isset($data['kegiatan']) ? htmlspecialchars($data['kegiatan']) : '';
    $kerjasama = isset($data['kerjasama']) ? htmlspecialchars($data['kerjasama']) : '';
    $peran = isset($data['peran']) ? htmlspecialchars($data['peran']) : '';
    $year = isset($data['year']) ? htmlspecialchars($data['year']) : '';
 
  

    $edit_workexp = "UPDATE tb_experience 
                        SET nama = '$nama', 
                        kegiatan = '$kegiatan', 
                        kerjasama = '$kerjasama', 
                        peran = '$peran', 
                        year = '$year'                                         
                    WHERE id = $id";
          
 
    mysqli_query($koneksi, $edit_workexp);
 
    return mysqli_affected_rows($koneksi);
 
 }

 function tambahDiklat($data){

    global $koneksi;
    
    $nama = isset($data['nama']) ? htmlspecialchars($data['nama']) : '';
    $diklat = isset($data['diklat']) ? htmlspecialchars($data['diklat']) : '';
    $penyelenggara = isset($data['penyelenggara']) ? htmlspecialchars($data['penyelenggara']) : '';
    $tempat = isset($data['tempat']) ? htmlspecialchars($data['tempat']) : '';
    $year = isset($data['year']) ? htmlspecialchars($data['year']) : '';
 
  

    $tambah_diklat = "INSERT INTO tb_diklat (id,nama, diklat, penyelenggara, tempat, year) 
                                            VALUES ('','$nama','$diklat', '$penyelenggara', '$tempat','$year')";
          
 
    mysqli_query($koneksi, $tambah_diklat);
 
    return mysqli_affected_rows($koneksi);
 
 }

 function editDiklat($data){

    global $koneksi;
    
    $id = isset($data['idPelatihan']) ? ($data['idPelatihan']) : '';
    $nama = isset($data['nama']) ? htmlspecialchars($data['nama']) : '';
    $diklat = isset($data['diklat']) ? htmlspecialchars($data['diklat']) : '';
    $penyelenggara = isset($data['penyelenggara']) ? htmlspecialchars($data['penyelenggara']) : '';
    $tempat = isset($data['tempat']) ? htmlspecialchars($data['tempat']) : '';
    $year = isset($data['year']) ? htmlspecialchars($data['year']) : '';
 
  

    $edit_diklat = "UPDATE tb_diklat 
                        SET nama = '$nama',
                        diklat =  '$diklat', 
                        penyelenggara = '$penyelenggara', 
                        tempat = '$tempat', 
                        year = '$year'
                    WHERE id=$id";
          
 
    mysqli_query($koneksi, $edit_diklat);
 
    return mysqli_affected_rows($koneksi);
 
 }

