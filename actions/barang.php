 
<?php
include "../systems/DB.php";
$kode_barang = (isset($_POST['kode_barang'])) ? $_POST['kode_barang'] : (isset($_GET['kode_barang']) ? $_GET['kode_barang'] : null);
$nama = isset($_POST['nama']) ? $_POST['nama'] : null;
$harga = isset($_POST['harga']) ? $_POST['harga'] : null;
$gambar = null;
$jml_stok = isset($_POST['jml_stok']) ? $_POST['jml_stok'] : null;
$action = (isset($_POST['action'])) ? $_POST['action'] : (isset($_GET['action']) ? $_GET['action'] : null);
if(isset($_FILES['gambar']) && $_FILES['gambar']['size'] != 0){
    $extension_allowed	= array('png','jpg');
    $gambar = $_FILES['gambar']['name'];
    $x = explode('.', $gambar);
    $ekstensi = strtolower(end($x));
    $ukuran	= $_FILES['gambar']['size'];
    $gambar_tmp = $_FILES['gambar']['tmp_name'];	
    
    if(in_array($ekstensi, $extension_allowed) === true){
        if($ukuran < 1044070){
            move_uploaded_file($gambar_tmp, '../assets/images/'.$gambar);
            $gambar = 'assets/images/'.$gambar;
        }else{
            echo "<script>alert('Ukuran Gambar Terlalu besar')</script>";
            echo "<script>document.location.href='../index.php?page=barang'</script>";
        }
    }else{
        echo "<script>alert('Ekstensi Gambar Tidak Diperbolehkan')</script>";
        echo "<script>document.location.href='../index.php?page=barang'</script>";
    }
}

if ($action == 'insert') {
    $insert = $db->insert("barang (nama, harga, gambar, jml_stok)","'$nama', '$harga', '$gambar', '$jml_stok'");
    if($insert){
        echo "<script>alert('Berhasil Disimpan')</script>";
        echo "<script>document.location.href='../index.php?page=barang'</script>";
    }else{
        echo "<script>alert('Gagal Disimpan')</script>";
        echo "<script>document.location.href='../index.php?page=barang'</script>";
    }
}elseif ($action == 'update') {
    $values = "nama='$nama', harga='$harga', jml_stok='$jml_stok'";

    if($gambar){
        $values .= ", gambar='$gambar'";
    }

    $update=$db->update("barang",$values,"kode_barang='$kode_barang'" );
    if($update){
        echo "<script>alert('Berhasil Diupdate')</script>";
        echo "<script>document.location.href='../index.php?page=barang'</script>";
    }else{
        echo "<script>alert('Gagal Diupdate')</script>";
        echo "<script>document.location.href='../index.php?page=barang'</script>";
    }
}elseif ($action == 'delete') {
    $delete=$db->delete("barang","kode_barang='$kode_barang'");
    if($delete){
        echo "<script>alert('Data Berhasil Dihapus')</script>";
        echo "<script>document.location.href='../index.php?page=barang'</script>";
    }else{
        echo "<script>alert('Gagal Dihapus')</script>";
        echo "<script>document.location.href='../index.php?page=barang'</script>";
    }
}else {
    echo "<script>alert('Action not detected')</script>";
    echo "<script>document.location.href='../index.php?page=barang'</script>";
}
?>