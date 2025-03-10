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
$phpWord->setDefaultFontName('Times New Roman'); // Ganti dengan font lain jika perlu
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


// $section->addImage('../img/brin.png', [
//     'width' => 125,
//     'height' => 50,
//     'alignment' => \PhpOffice\PhpWord\SimpleType\Jc::LEFT
// ]);

// Judul
$section->addText("CURRICULUM VITAE", ['bold' => true, 'size' => 12], ['alignment' => 'center']);
$section->addTextBreak();

// **1. Biodata**
$section->addText("PERSONAL DATA DETAILS", ['bold' => true, 'italic' => true, 'size' => 12], ['alignment' => 'LEFT']);
$section->addTextBreak();
// Tambahkan gaya tabel dengan border
$tableStyle = [
    
    'cellMargin' => 80, // Jarak teks dari tepi sel
    'alignment' => \PhpOffice\PhpWord\SimpleType\JcTable::CENTER // Posisi tabel
    
];

// Terapkan gaya ke tabel
$table = $section->addTable($tableStyle);
$cellStyle = ['valign' => 'top', 'MarginLeft' => 100, 'MarginRight' => 100,]; // Border untuk setiap sel


$no = 1;

$table->addRow();
$table->addCell(500, $cellStyle)->addText($no.".", ['alignment' => 'center']);
$table->addCell(5000, $cellStyle)->addText("Nama Lengkap");
$table->addCell(100, $cellStyle)->addText(":");
$table->addCell(7500, $cellStyle)->addText($biodata["nama"] . " " . $biodata["gelar_belakang"] );
$no += 1;

$table->addRow();
$table->addCell(500, $cellStyle)->addText($no.".", ['alignment' => 'center']);
$table->addCell(5000, $cellStyle)->addText("Jenis Kelamin");
$table->addCell(100, $cellStyle)->addText(":");
$table->addCell(7500, $cellStyle)->addText($biodata["kelamin"]);
$no += 1;

$table->addRow();
$table->addCell(500, $cellStyle)->addText($no.".", ['alignment' => 'center']);
$table->addCell(5000, $cellStyle)->addText("NIP");
$table->addCell(100, $cellStyle)->addText(":");
$table->addCell(7500, $cellStyle)->addText($biodata["nip"]);
$no += 1;

$table->addRow();
$table->addCell(500, $cellStyle)->addText($no.".", ['alignment' => 'center']);
$table->addCell(5000, $cellStyle)->addText("Tempat/Tanggal Lahir");
$table->addCell(100, $cellStyle)->addText(":");
$table->addCell(7500, $cellStyle)->addText($biodata["tempatlahir"] . " / " . date("d F Y", strtotime($biodata["tgl_lahir"])));
$no += 1;

// $table->addRow();
// $table->addCell(500, $cellStyle)->addText($no.".", ['alignment' => 'center']);
// $table->addCell(5000, $cellStyle)->addText("Pangkat/Golongan/TMT");
// $table->addCell(7500, $cellStyle)->addText($biodata["pangkat_gol"] . " / " . date("d F Y", strtotime($biodata["tmt_jabatan"])));
// $no += 1;

// $table->addRow();
// $table->addCell(500, $cellStyle)->addText($no.".", ['alignment' => 'center']);
// $table->addCell(5000, $cellStyle)->addText("Jabatan Saat Ini (Terakhir)");
// $table->addCell(7500, $cellStyle)->addText($biodata["jabatan"]);
// $no += 1;

$table->addRow();
$table->addCell(500, $cellStyle)->addText($no.".", ['alignment' => 'center']);
$table->addCell(5000, $cellStyle)->addText("Email");
$table->addCell(100, $cellStyle)->addText(":");
$table->addCell(7500, $cellStyle)->addText($biodata["email"]);
$no += 1;

$table->addRow();
$table->addCell(500, $cellStyle)->addText($no.".", ['alignment' => 'center']);
$table->addCell(5000, $cellStyle)->addText("Nomor Telp/HP");
$table->addCell(100, $cellStyle)->addText(":");
$table->addCell(7500, $cellStyle)->addText($biodata["contact_hp"]);
$no += 1;

$table->addRow();
$table->addCell(500, $cellStyle)->addText($no.".", ['alignment' => 'center']);
$table->addCell(5000, $cellStyle)->addText("Institusi");
$table->addCell(100, $cellStyle)->addText(":");
$table->addCell(7500, $cellStyle)->addText($biodata["unit_kerja"] . " - " . $biodata["instansi"]);
$no += 1;

$table->addRow();
$table->addCell(500, $cellStyle)->addText($no.".", ['alignment' => 'center']);
$table->addCell(5000, $cellStyle)->addText("Alamat Kantor");
$table->addCell(100, $cellStyle)->addText(":");
$table->addCell(7500, $cellStyle)->addText($biodata["alamat_kantor"]);
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

// **6. Pengalaman Kerja**

$section->addText("WORK EXPERIENCES", ['bold' => true, 'italic' => true, 'size' => 12]);
$table = $section->addTable();
$nowork=1;
foreach ($work_exp as $work) {
    $table->addRow();
    $table->addCell(500, $cellStyle)->addText($nowork . "." , [], $paragraphStyle);
    $table->addCell(10000, $cellStyle)->addText($work["kegiatan"] . " (" . $work["year"] . ", " . $work["kerjasama"] . ")" , [], $paragraphKiri);
    $nowork++;
}

$section->addTextBreak(2);

// **5. Karya Ilmiah**
$section->addText("Publication", ['bold' => true, 'size' => 12]);
$table = $section->addTable();
$nokti=1;
foreach ($kti as $ktie) {
    $table->addRow();
    $table->addCell(500, $cellStyle)->addText($nokti  . ".", [], $paragraphStyle);
    $table->addCell(10000, $cellStyle)->addText($ktie["judul"] . " (" . $ktie["jurnal"] . ", " . $ktie["year"] . ")" , [], $paragraphKiri);
    $nokti++;
}

$section->addTextBreak(2);

// **4. Pelatihan**
$section->addText("COURSE AND TRAINING ", ['bold' => true, 'size' => 12]);
$table = $section->addTable();
$nodik=1;
foreach ($diklat as $dik) {
    $table->addRow();
    $table->addCell(500, $cellStyle)->addText($nodik . ".", [], $paragraphStyle);
    $table->addCell(10000, $cellStyle)->addText($dik["diklat"] . ", " . $dik["penyelenggara"] . " - " . $dik["year"], [], $paragraphKiri);
    $nodik++;
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
$file = 'CV_' . $nama . '_SHI' . '.docx';
header('Content-Type: application/msword');
header('Content-Disposition: attachment;filename="' . $file . '"');
header('Cache-Control: max-age=0');

$objWriter = IOFactory::createWriter($phpWord, 'Word2007');
$objWriter->save('php://output');
exit;
?>