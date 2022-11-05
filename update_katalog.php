<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="input_katalog.css">
    <title>Update Katalog | Cozy Furniture</title>
</head>
<body>
    <div class="header-brand">
        <div class="first_name">cozy</div>
        <div class="last_name">furniture</div>
    </div>
    <div class="navigation">
        <li><a href="admin_page.html" title="Back"><i class="fa-solid fa-arrow-left"></i></a></li>
    </div>
    <div class="content">
        <!-- <a href="katalog.php"></a> -->
      
        <form action="katalog.php" method = "post" enctype="multipart/form-data">
            <h3>Update katalog</h3><br>

            <label for="">kode barang</label><br>
            <input type="text" name="kode_katalog" placeholder="kode katalog"><br><br>

            <label for="">nama barang</label><br>
            <input type="text" name="nama_katalog" placeholder="nama katalog"><br><br>

            <label for="">warna barang</label><br>
            <input type="text" name="warna_katalog" placeholder="warna katalog"><br><br>

            <label for="">jenis barang</label><br>
            <input type="text" name="jenis_katalog" placeholder="jenis katalog"><br><br>

            <label for="">upload gambar katalog</label><br>
            <input type="file" name="foto_katalog" placeholder="foto katalog"><br><br>

            <input type="hidden" name="tanggal_upload" value= <?=date("Y-m-d H:i:s a")?> >
            <input type="submit" name="kirim" value="kirim" class="button">
        </form>

    </div>
    <div class="footer-c">
        Copyright &copy; 2022 Designed by Natalie Fuad
    </div>
</body>
</html>
    
<?php
    require 'config.php';
    
    if (isset($_POST['kode_katalog'])){
        $kode_katalog = $_POST['kode_katalog'];
    }
    
    $query = $db->query("SELECT * FROM katalog WHERE kode_katalog='$kode_katalog'");

    $row = mysqli_fetch_array($query);
    
    if (isset($_POST['kirim'])){
        
        $nama_katalog = $_POST['nama_katalog'];
        $warna_katalog = $_POST['warna_katalog'];
        $tanggal = date("Y-m-d H:i:s a");
        $jenis_katalog = $_POST['jenis_katalog'];

        $gambar = $_FILES['foto_katalog']['name'];
        $x = explode('.', $gambar);

        $ekstensi = strtolower(end($x));
        $gambar_baru = "$kode_katalog.$ekstensi";

        $tmp = $_FILES['foto_katalog']['tmp_name'];

        if(move_uploaded_file($tmp,"gambar_katalog/".$gambar_baru)){
            $query = ("UPDATE katalog SET nama_katalog='$nama_katalog', warna_katalog='$warna_katalog',
                        jenis_katalog='$jenis_katalog', foto_katalog='$gambar', tanggal_upload='$tanggal'
                        WHERE kode_katalog='$kode_katalog'");

            $result = $db->query($query);

            if($result){
                echo "<script>
                alert('Data Berhasil Diupdate');
                document.location.href = 'katalog.php');
                </script>";
            }else{
                echo "<script>
                alert('Data Gagal Diupdate');
                </script>";
            }
        }
        }
        
?>