<?php
require_once 'vendor/autoload.php';
require_once '../../config/connection.php'; // Sesuaikan dengan koneksi database Anda

use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\IOFactory;
use PhpOffice\PhpWord\Style\Cell;


// Pastikan user login
session_start();
if (!isset($_SESSION['nama'])) {
    die("Anda harus login terlebih dahulu.");
}

$nama = $_SESSION['nama'];



// Ambil data dari database
require_once '../../config/query.php';

$biodata = query("SELECT * FROM tb_personal WHERE nama = '$nama' ")[0];
$pendidikan = query("SELECT * FROM tb_pendidikan WHERE nama = '$nama' ORDER BY tahun ASC");
$work_exp = query("SELECT * FROM tb_experience WHERE nama = '$nama' ORDER BY year ASC");
$diklat = query("SELECT * FROM tb_diklat WHERE nama = '$nama' ORDER BY year ASC");
$kti = query("SELECT * FROM tb_karyailmiah WHERE nama = '$nama' ORDER BY year ASC");

// Buat objek PHPWord
$phpWord = new PhpWord();

// Atur default font dan ukuran font
$phpWord->setDefaultFontName('Arial'); // Ganti dengan font lain jika perlu
$phpWord->setDefaultFontSize(12); // Atur ukuran font

$phpWord->setDefaultParagraphStyle([
    'align' => 'left', // Justifikasi teks
    'spaceAfter' => \PhpOffice\PhpWord\Shared\Converter::pointToTwip(2), // Spasi setelah paragraf
    'spacing' => 50, // Jarak antar baris
]);
 
$paragraphStyle = ['alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER]; // Menengahkan teks secara horizontal
$paragraphKiri = [
    'alignment' => \PhpOffice\PhpWord\SimpleType\Jc::LEFT, // Rata kiri
    'indent' => 0.2, // Indentasi/margin kiri (satuan twip, 1 twip = 1/20 pt)
];

$paragraphTTD = [
    'alignment' => \PhpOffice\PhpWord\SimpleType\Jc::LEFT, // Rata kiri
    'indent' => 8, // Indentasi/margin kiri (satuan twip, 1 twip = 1/20 pt)
];

$section = $phpWord->addSection();



$section->addImage('../img/brin.png', [
    'width' => 125,
    'height' => 50,
    'alignment' => \PhpOffice\PhpWord\SimpleType\Jc::LEFT
]);

// Judul
$section->addText("DAFTAR RIWAYAT HIDUP", ['bold' => true, 'size' => 12], ['alignment' => 'center']);


// **1. Biodata**
$section->addText("PORTOFOLIO", ['bold' => true, 'size' => 12], ['alignment' => 'center']);
$section->addTextBreak();
// Tambahkan gaya tabel dengan border
$tableStyle = [
    'borderSize' => 6,  // Ketebalan garis (6 twips ≈ 0.5pt)
    'borderColor' => '000000', // Warna garis hitam
    'cellMargin' => 80, // Jarak teks dari tepi sel
    'alignment' => \PhpOffice\PhpWord\SimpleType\JcTable::CENTER // Posisi tabel
    
];

// Terapkan gaya ke tabel
$table = $section->addTable($tableStyle);
$cellStyle = ['borderSize' => 6, 'borderColor' => '000000', 'valign' => 'center', 'MarginLeft' => 100, 'MarginRight' => 100,]; // Border untuk setiap sel


$no = 1;

$table->addRow();
$table->addCell(500, $cellStyle)->addText($no.".", ['alignment' => 'center']);
$table->addCell(5000, $cellStyle)->addText("Nama Lengkap (Gelar)");
$table->addCell(7500, $cellStyle)->addText($biodata["nama"] . " " . $biodata["gelar_belakang"] );
$no += 1;

$table->addRow();
$table->addCell(500, $cellStyle)->addText($no.".", ['alignment' => 'center']);
$table->addCell(5000, $cellStyle)->addText("NIP");
$table->addCell(7500, $cellStyle)->addText($biodata["nip"]);
$no += 1;

$table->addRow();
$table->addCell(500, $cellStyle)->addText($no.".", ['alignment' => 'center']);
$table->addCell(5000, $cellStyle)->addText("No Seri Karpeg");
$table->addCell(7500, $cellStyle)->addText($biodata["no_karpeg"]);
$no += 1;

$table->addRow();
$table->addCell(500, $cellStyle)->addText($no.".", ['alignment' => 'center']);
$table->addCell(5000, $cellStyle)->addText("Tempat/Tanggal Lahir");
$table->addCell(7500, $cellStyle)->addText($biodata["tempatlahir"] . " / " . date("d F Y", strtotime($biodata["tgl_lahir"])));
$no += 1;

$table->addRow();
$table->addCell(500, $cellStyle)->addText($no.".", ['alignment' => 'center']);
$table->addCell(5000, $cellStyle)->addText("Pangkat/Golongan/TMT");
$table->addCell(7500, $cellStyle)->addText($biodata["pangkat_gol"] . " / " . date("d F Y", strtotime($biodata["tmt_jabatan"])));
$no += 1;

$table->addRow();
$table->addCell(500, $cellStyle)->addText($no.".", ['alignment' => 'center']);
$table->addCell(5000, $cellStyle)->addText("Jabatan Saat Ini (Terakhir)");
$table->addCell(7500, $cellStyle)->addText($biodata["jabatan"]);
$no += 1;

$table->addRow();
$table->addCell(500, $cellStyle)->addText($no.".", ['alignment' => 'center']);
$table->addCell(5000, $cellStyle)->addText("Instansi/Unit Kerja");
$table->addCell(7500, $cellStyle)->addText($biodata["instansi"] . " / " . $biodata["unit_kerja"] );
$no += 1;

$table->addRow();
$table->addCell(500, $cellStyle)->addText($no.".", ['alignment' => 'center']);
$table->addCell(5000, $cellStyle)->addText("Alamat Kantor/Telp/Faks/E-mail");
$table->addCell(7500, $cellStyle)->addText($biodata["alamat_kantor"]);
$no += 1;

$table->addRow();
$table->addCell(500, $cellStyle)->addText($no.".", ['alignment' => 'center']);
$table->addCell(5000, $cellStyle)->addText("Alamat Rumah/Telp/HP/Email");
$table->addCell(7500, $cellStyle)->addText($biodata["alamat_rumah"] . " / " . $biodata["contact_hp"] . " / " . $biodata["email"]);
$section->addTextBreak();

$section->addImage('../img/' . $biodata["foto"], [
    'width' => 100, 
    'height' => 100,
    'positioning' => 'absolute',  // Menjadikan posisi absolut
    'posHorizontal' => \PhpOffice\PhpWord\Style\Image::POSITION_HORIZONTAL_RIGHT, // Posisi kanan
    'posHorizontalRel' => 'margin', // Relatif terhadap margin halaman
    'posVertical' => \PhpOffice\PhpWord\Style\Image::POSITION_VERTICAL_TOP, // Posisi atas
    'posVerticalRel' => 'margin', // Relatif terhadap margin
    
    'wrappingStyle' => 'infront', // Membuat gambar di depan teks (in front of text)
]);


// **2. Pendidikan**
$section->addText("Pendidikan", ['bold' => true, 'size' => 12]);
$table = $section->addTable();
$table->addRow();
$table->addCell(2000, $cellStyle)->addText("Jenjang", ['bold' => true], ['alignment' => 'center']);
$table->addCell(4000, $cellStyle)->addText("Perguruan Tinggi", ['bold' => true], ['alignment' => 'center']);
$table->addCell(4000, $cellStyle)->addText("Jurusan", ['bold' => true], ['alignment' => 'center']);
$table->addCell(2000, $cellStyle)->addText("Tahun Lulus", ['bold' => true], ['alignment' => 'center']);

foreach ($pendidikan as $pend) {
    
    $table->addRow();
    $table->addCell(2000, $cellStyle)->addText($pend["jenjang"], [], $paragraphStyle);
    $table->addCell(4000, $cellStyle)->addText($pend["kampus"], [], $paragraphStyle);
    $table->addCell(4000, $cellStyle)->addText($pend["jurusan"], [], $paragraphStyle);
    $table->addCell(2000, $cellStyle)->addText($pend["tahun"], [], $paragraphStyle);
}

$section->addTextBreak(2);


// **3. Pengalaman Jabatan**
$section->addText("Pengalaman Jabatan (Sejak CPNS)", ['bold' => true, 'size' => 12]);
$table = $section->addTable();
$table->addRow();
$table->addCell(700, $cellStyle)->addText("No", ['bold' => true], ['alignment' => 'center']);
$table->addCell(3000, $cellStyle)->addText("Nama Jabatan", ['bold' => true], ['alignment' => 'center']);
$table->addCell(2500, $cellStyle)->addText("Pangkat/Golongan", ['bold' => true], ['alignment' => 'center']);
$table->addCell(2500, $cellStyle)->addText("Eselon/Jenjang Jabatan", ['bold' => true], ['alignment' => 'center']);
$table->addCell(3000, $cellStyle)->addText("Tahun .. s/d ..", ['bold' => true], ['alignment' => 'center']);
$table->addCell(1500, $cellStyle)->addText("Instansi/Unit Kerja", ['bold' => true], ['alignment' => 'center']);

$section->addTextBreak(2);

// **4. Pelatihan**
$section->addText("Pengalaman Mengikuti Pendidikan dan Pelatihan ", ['bold' => true, 'size' => 12]);
$table = $section->addTable();
$table->addRow();
$table->addCell(500, $cellStyle)->addText("No", ['bold' => true], ['alignment' => 'center']);
$table->addCell(3000, $cellStyle)->addText("Nama Diklat", ['bold' => true], ['alignment' => 'center']);
$table->addCell(3000, $cellStyle)->addText("Penyelenggara", ['bold' => true], ['alignment' => 'center']);
$table->addCell(4000, $cellStyle)->addText("Tempat Penyelenggaraan", ['bold' => true], ['alignment' => 'center']);
$table->addCell(2000, $cellStyle)->addText("Tahun", ['bold' => true], ['alignment' => 'center']);

$nodik=1;
foreach ($diklat as $dik) {
    $table->addRow();
    $table->addCell(500, $cellStyle)->addText($nodik, [], $paragraphStyle);
    $table->addCell(3000, $cellStyle)->addText($dik["diklat"], [], $paragraphKiri);
    $table->addCell(3000, $cellStyle)->addText($dik["penyelenggara"], [], $paragraphStyle);
    $table->addCell(4000, $cellStyle)->addText($dik["tempat"], [], $paragraphStyle);
    $table->addCell(2000, $cellStyle)->addText($dik["year"], [], $paragraphStyle);
    $nodik++;
}

$section->addTextBreak(2);

// **5. Karya Ilmiah**
$section->addText("Publikasi Ilmiah", ['bold' => true, 'size' => 12]);
$table = $section->addTable();
$table->addRow();
$table->addCell(500, $cellStyle)->addText("No", ['bold' => true], ['alignment' => 'center']);
$table->addCell(5000, $cellStyle)->addText("Judul Artikel Ilmiah", ['bold' => true], ['alignment' => 'center']);
$table->addCell(4000, $cellStyle)->addText("Nama Jurnal", ['bold' => true], ['alignment' => 'center']);
$table->addCell(1000, $cellStyle)->addText("Tahun", ['bold' => true], ['alignment' => 'center']);

$nokti=1;
foreach ($kti as $ktie) {
    $table->addRow();
    $table->addCell(500, $cellStyle)->addText($nokti, [], $paragraphStyle);
    $table->addCell(5000, $cellStyle)->addText($ktie["judul"], [], $paragraphKiri);
    $table->addCell(4000, $cellStyle)->addText($ktie["jurnal"], [], $paragraphKiri);
    $table->addCell(1000, $cellStyle)->addText($ktie["year"], [], $paragraphStyle);
    $nokti++;
}

$section->addTextBreak(2);


// **6. Pengalaman Kerja**

$section->addText("Pengalaman Mengikuti Kegiatan/Kajian ", ['bold' => true, 'size' => 12]);
$table = $section->addTable();
$table->addRow();
$table->addCell(500, $cellStyle)->addText("No", ['bold' => true], ['alignment' => 'center']);
$table->addCell(5000, $cellStyle)->addText("Nama Kegiatan", ['bold' => true], ['alignment' => 'center']);
$table->addCell(4000, $cellStyle)->addText("Pendanaan/Mitra", ['bold' => true], ['alignment' => 'center']);
//$table->addCell(2000, $cellStyle)->addText("Peran", ['bold' => true], ['alignment' => 'center']);
$table->addCell(1000, $cellStyle)->addText("Tahun", ['bold' => true], ['alignment' => 'center']);

$nowork=1;
foreach ($work_exp as $work) {
    $table->addRow();
    $table->addCell(500, $cellStyle)->addText($nowork, [], $paragraphStyle);
    $table->addCell(5000, $cellStyle)->addText($work["kegiatan"], [], $paragraphKiri);
    $table->addCell(4000, $cellStyle)->addText($work["kerjasama"], [], $paragraphKiri);
    //$table->addCell(2000, $cellStyle)->addText($work["peran"], [], $paragraphStyle);
    $table->addCell(1000, $cellStyle)->addText($work["year"], [], $paragraphStyle);
    $nowork++;
}

$section->addTextBreak(2);

//PERNYATAAN

$section->addText("Semua data yang saya isikan dan tercantum dalam biodata ini 
adalah benar dan dapat dipertanggungjawabkan secara hukum. Apabila di kemudian hari ternyata dijumpai 
ketidaksesuaian dengan kenyataan, saya sanggup menerima sanksi.", ['bold' => false, 'size' => 12], ['alignment' => 'both']);

$section->addTextBreak(8);

$section->addText($biodata["nama"], ['bold' => true, 'size' => 12], $paragraphTTD);
$section->addText("NIP. " . $biodata["nip"], ['bold' => true, 'size' => 12], $paragraphTTD);

// Simpan file
$file = 'CV_' . $nama . '.docx';
header('Content-Type: application/msword');
header('Content-Disposition: attachment;filename="' . $file . '"');
header('Cache-Control: max-age=0');

$objWriter = IOFactory::createWriter($phpWord, 'Word2007');
$objWriter->save('php://output');
exit;
?>