<?php
require 'config.php';

if (isset($_POST['kode_katalog'])){

    $kode_katalog = $_POST['kode_katalog'];

    $query = $db->query("SELECT * FROM katalog WHERE kode_katalog='$kode_katalog'");
    $data = mysqli_fetch_array($query);
    $gambar = $data['foto_katalog'];
    $del = "gambar_katalog/$gambar";
    
    if(file_exists($del)){
        unlink($del);
    }

    $result = $db->query("DELETE FROM katalog WHERE kode_katalog='$kode_katalog'");

    if($result){
        echo "<script>
                alert('Berhasil Menghapus Data');
                document.location.href='katalog.php';
            </script>";

    } else {
        echo "<script>
                alert('Gagal Menghapus Data');
            </script>";
    }
};
?>