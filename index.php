<?php 
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
session_start();
if (!isset($_SESSION['user_name'])){
	header("location:login.php");
}
$page=isset($_GET['page']) ? $_GET['page'] : 'dashboard';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Css -->
    <link rel="stylesheet" href="assets/styles.css">
    <link rel="stylesheet" href="assets/all.css">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,400i,600,600i,700,700i" rel="stylesheet">
    <title>Dashboard | Toko ABC</title>
</head>

<body>
<!--Container -->
<div class="mx-auto bg-grey-400">
    <!--Screen-->
    <div class="min-h-screen flex flex-col">
        <!--Header Section Starts Here-->
        <header class="bg-nav">
            <div class="flex justify-between">
                <div class="p-1 mx-3 inline-flex items-center">
                    <i class="fas fa-bars pr-2 text-white" onclick="sidebarToggle()"></i>
                    <h1 class="text-white p-2">Toko ABC</h1>
                </div>
                <div class="p-1 flex flex-row items-center">
                    <img onclick="profileToggle()" class="inline-block h-8 w-8 rounded-full" src="https://avatars.dicebear.com/v2/initials/<?php echo strtolower($_SESSION['user_name']) ?>.svg" alt="">
                    <a href="#" onclick="profileToggle()" class="text-white p-2 no-underline hidden md:block lg:block"><?php echo $_SESSION['user_name'] ?></a>
                    <div id="ProfileDropDown" class="rounded hidden shadow-md bg-white absolute pin-t mt-12 mr-1 pin-r">
                        <ul class="list-reset">
                          <li><a href="logout.php" class="no-underline px-4 py-2 block text-black hover:bg-grey-light">Logout</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </header>
        <!--/Header-->

        <div class="flex flex-1">
            <!--Sidebar-->
            <aside id="sidebar" class="bg-side-nav w-1/2 md:w-1/6 lg:w-1/6 border-r border-side-nav hidden md:block lg:block">

                <ul class="list-reset flex flex-col">
                    <li class=" w-full h-full py-3 px-2 border-b border-light-border <?php echo $page == 'dashboard' ? 'bg-white' : '' ?>">
                        <a href="index.php?page=dashboard"
                           class="font-sans font-hairline hover:font-normal text-sm text-nav-item no-underline">
                            <i class="fas fa-tachometer-alt float-left mx-2"></i>
                            Dashboard
                            <span><i class="fas fa-angle-right float-right"></i></span>
                        </a>
                    </li>
                    <li class="w-full h-full py-3 px-2 border-b border-light-border <?php echo $page == 'user' ? 'bg-white' : '' ?>">
                        <a href="index.php?page=user"
                           class="font-sans font-hairline hover:font-normal text-sm text-nav-item no-underline">
                            <i class="fab fa-wpforms float-left mx-2"></i>
                            User
                            <span><i class="fa fa-angle-right float-right"></i></span>
                        </a>
                    </li>
                    <li class="w-full h-full py-3 px-2 border-b border-light-border <?php echo $page == 'barang' ? 'bg-white' : '' ?>">
                        <a href="index.php?page=barang"
                           class="font-sans font-hairline hover:font-normal text-sm text-nav-item no-underline">
                            <i class="fas fa-grip-horizontal float-left mx-2"></i>
                            Barang
                            <span><i class="fa fa-angle-right float-right"></i></span>
                        </a>
                    </li>
                </ul>

            </aside>
            <!--/Sidebar-->
            <!--Main-->
            <main class="bg-white-300 flex-1 p-3 overflow-hidden">
            <?php
                if(!$page){
                    echo "<script>document.location.href='index.php?page=home'</script>";
                }else{
                    if(!@include("pages/$page.php")) {
                        echo '<center style="font-size:40px;margin-top:25%;margin-bottom:25%">Page not found 👋</center>';
                    }
                }
            ?>
            </main>
            <!--/Main-->
        </div>
        <!--Footer-->
        <footer class="bg-grey-darkest text-white p-2">
            <div class="flex flex-1 mx-auto">&copy; 2021 Toko ABC</div>
            <div class="flex flex-1 mx-auto">Created by: Hiskia Anggi Puji Pratama - A11.2020.12730</div>
        </footer>
        <!--/footer-->

    </div>

</div>
<script src="assets/main.js"></script>
</body>

</html>