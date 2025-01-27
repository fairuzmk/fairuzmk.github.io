<?php

include '../../config/connection.php';

$judul = $_GET['judul'];
$publisher = $_GET['publisher'];
$author = $_GET['author'];
$year = $_GET['year'];
$reputasi =  $_GET['reputasi'];

$query = mysqli_query($koneksi,"INSERT INTO tb_karyailmiah (id,judul,jurnal,author,year,reputasi) VALUES('','$judul','$publisher','$author','$year','$reputasi')" );

header('Location: ../index.php?page=cv-generator');