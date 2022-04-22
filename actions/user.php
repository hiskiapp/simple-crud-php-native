 
<?php
session_start();
include "../systems/DB.php";
$kode_user = (isset($_POST['kode_user'])) ? $_POST['kode_user'] : (isset($_GET['kode_user']) ? $_GET['kode_user'] : null);
$nama = isset($_POST['nama']) ? $_POST['nama'] : null;
$email = isset($_POST['email']) ? $_POST['email'] : null;
$password = password_hash(isset($_POST["password"]) ? $_POST["password"] : '', PASSWORD_DEFAULT);
$telp = isset($_POST['telp']) ? $_POST['telp'] : null;
$peran = isset($_POST['peran']) ? $_POST['peran'] : null;
$action = (isset($_POST['action'])) ? $_POST['action'] : (isset($_GET['action']) ? $_GET['action'] : null);

if ($action == 'insert') {
    $query = $db->get("*","user","WHERE email = '$email'");
	$data = $query->fetch();
	$rows = $query->rowCount();
    if($rows > 0){
        echo "<script>alert('Email Sudah Terdaftar')</script>";
        echo "<script>document.location.href='../index.php?page=user'</script>";
    }else{
        $insert = $db->insert("user (nama, email, password, telp, peran)","'$nama', '$email', '$password', '$telp', '$peran'");
        if($insert){
            echo "<script>alert('Berhasil Disimpan')</script>";
            echo "<script>document.location.href='../index.php?page=user'</script>";
        }else{
            echo "<script>alert('Gagal Disimpan')</script>";
            echo "<script>document.location.href='../index.php?page=user'</script>";
        }
    }
}elseif ($action == 'update') {
    $values = "nama='$nama', email='$email', telp='$telp', peran='$peran'";
    if(isset($_POST['password']) && $_POST['password'] != ''){
        $values .= ", password='$password'";
    }

    if($_SESSION['user_id'] == $kode_user){
        $_SESSION['user_name'] = $nama;
		$_SESSION['user_email'] = $email;
    }
    
    $update=$db->update("user",$values,"kode_user='$kode_user'" );
    if($update){
        echo "<script>alert('Berhasil Diupdate')</script>";
        echo "<script>document.location.href='../index.php?page=user'</script>";
    }else{
        echo "<script>alert('Gagal Diupdate')</script>";
        echo "<script>document.location.href='../index.php?page=user'</script>";
    }
}elseif ($action == 'delete') {
    $delete=$db->delete("user","kode_user='$kode_user'");
    if($delete){
        echo "<script>alert('Data Berhasil Dihapus')</script>";
        echo "<script>document.location.href='../index.php?page=user'</script>";
    }else{
        echo "<script>alert('Gagal Dihapus')</script>";
        echo "<script>document.location.href='../index.php?page=user'</script>";
    }
}else {
    echo "<script>alert('Action not detected')</script>";
    echo "<script>document.location.href='../index.php?page=user'</script>";
}
?>