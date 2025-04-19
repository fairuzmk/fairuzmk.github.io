<?php

include "../../config/connection.php";


$id = $_GET["id"];
$page = $_GET["page"];

    if ($page == "data-pendidikan"){
    $result = mysqli_query($koneksi, "DELETE FROM tb_pendidikan WHERE id='$id'");
    header("Location: ../index.php?page=$page");
    }
    else if ($page == "data-work"){
        $result = mysqli_query($koneksi, "DELETE FROM tb_experience WHERE id='$id'");
        header("Location: ../index.php?page=$page");

    }

    else if ($page == "data-kti"){
        $result = mysqli_query($koneksi, "DELETE FROM tb_karyailmiah WHERE id='$id'");
        header("Location: ../index.php?page=$page");

    }
    else if ($page == "data-pelatihan"){
        $result = mysqli_query($koneksi, "DELETE FROM tb_diklat WHERE id='$id'");
        header("Location: ../index.php?page=$page");

    }

?>
