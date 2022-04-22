<?php
    include 'systems/DB.php';

    $user_count = $db->get("*","user")->rowCount();
    $barang_count = $db->get("*","barang","")->rowCount();
?>

<div class="flex flex-col">
    <!-- Stats Row Starts Here -->
    <div class="flex flex-1 flex-col md:flex-row lg:flex-row mx-2">
        <div
            class="shadow-lg bg-red-vibrant border-l-8 hover:bg-red-vibrant-dark border-red-vibrant-dark mb-2 p-2 md:w-1/4 mx-2">
            <div class="p-4 flex flex-col">
                <a href="index.php?page=user" class="no-underline text-white text-2xl">
                    <?php echo $user_count; ?>
                </a>
                <a href="index.php?page=user" class="no-underline text-white text-lg">
                    Jumlah User
                </a>
            </div>
        </div>

        <div class="shadow bg-info border-l-8 hover:bg-info-dark border-info-dark mb-2 p-2 md:w-1/4 mx-2">
            <div class="p-4 flex flex-col">
                <a href="index.php?page=barang" class="no-underline text-white text-2xl">
                    <?php echo $barang_count; ?>
                </a>
                <a href="index.php?page=barang" class="no-underline text-white text-lg">
                    Jumlah Barang
                </a>
            </div>
        </div>
    </div>

    <!-- /Stats Row Ends Here -->
</div>