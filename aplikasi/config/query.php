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
             email = '$email',
             foto = '$foto'
         WHERE id = $id";

   mysqli_query($koneksi, $upd_datadiri);

   return mysqli_affected_rows($koneksi);

}
