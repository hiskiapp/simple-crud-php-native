<?php 
session_start();
include 'systems/DB.php';
if (isset($_POST['submit'])){
	$email = $_POST['email'];
	$password = $_POST['password'];
	$query = $db->get("*","user","WHERE email = '$email'");
	$data = $query->fetch();
	$rows = $query->rowCount();
	if($rows == 0){
		echo "<script>alert('Maaf Email Belum Terdaftar')</script>";
		echo "<script>document.location = 'login.php'</script>";
	}else{
		if(!password_verify($password, $data['password'])){
			echo "<script>alert('Maaf Password Salah')</script>";
			echo "<script>document.location = 'login.php'</script>";
		}else{
      $_SESSION['user_name'] = $data['nama'];
			$_SESSION['user_email'] = $data['email'];
			$_SESSION['user_id'] = $data['kode_user'];

			echo "<script>alert('Berhasil Login')</script>";
			echo "<script>document.location = 'index.php?page=dashboard'</script>";
		}
	}
}else{
  if(isset($_SESSION['user_name'])){
    echo "<script>document.location = 'index.php?page=dashboard'</script>";
  }
}
?>

<!doctype html>
<html lang="en">

<head>
  <title>Login | Toko ABC</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="assets/styles.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css"
    integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
  <style>
    .login {
      background: url('assets/images/login.jpeg')
    }
  </style>
</head>

<body class="h-screen font-sans login bg-cover">
  <div class="container mx-auto h-full flex flex-1 justify-center items-center">
    <div class="w-full max-w-lg">
      <div class="leading-loose">
        <form class="max-w-xl m-4 p-10 bg-white rounded shadow-xl" method="POST" action="login.php">
          <p class="mb-3">
            Demo Login:
            <br>Email: <b>admin@hiskia.app</b>
            <br>Password: <b>123456</b>
          </p>
          <hr>
          <p class="text-gray-800 font-medium text-center text-lg font-bold">Login</p>
          <div class="">
            <label class="block text-sm text-gray-00" for="email">Email</label>
            <input class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" id="email" name="email" type="email"
              required="" placeholder="email@example.com" aria-label="email">
          </div>
          <div class="mt-2">
            <label class="block text-sm text-gray-600" for="password">Password</label>
            <input class="w-full px-5  py-1 text-gray-700 bg-gray-200 rounded" id="password" name="password"
              type="password" required="" placeholder="*******" aria-label="password">
          </div>
          <div class="mt-4 items-center justify-between">
            <button class="px-4 py-1 text-white font-light tracking-wider bg-gray-900 rounded" type="submit"
              name="submit">Login</button>
          </div>
        </form>

      </div>
    </div>
  </div>
</body>

</html>
