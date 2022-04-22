<?php
include "systems/DB.php";
$barangs=$db->get("*","barang","ORDER BY kode_barang DESC");
?>
<div class="flex flex-1  flex-col md:flex-row lg:flex-row mx-2">
    <div class="mb-2 border-solid border-gray-300 rounded border shadow-sm w-full">
        <div class="bg-gray-200 px-2 py-3 border-solid border-gray-200 border-b">
            Data Barang
        </div>
        <div class="p-3">
            <div class="mb-4 float-right">
                <a href="index.php?page=barang_form" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"><i class="fas fa-plus"></i> Tambah Data</a>
            </div>
            <table class="table-responsive w-full rounded">
                <thead>
                    <tr>
                        <th class="border w-1/5 px-4 py-2">Kode Barang</th>
                        <th class="border w-1/6 px-4 py-2">Nama</th>
                        <th class="border w-1/6 px-4 py-2">Harga</th>
                        <th class="border w-1/6 px-4 py-2">Gambar</th>
                        <th class="border w-1/7 px-4 py-2">Jumlah Stok</th>
                        <th class="border w-1/5 px-4 py-2">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        foreach($barangs as $barang){
                    ?>
                    <tr>
                        <td class="border px-4 py-2"><?php echo $barang['kode_barang'];?></td>
                        <td class="border px-4 py-2"><?php echo $barang['nama'];?></td>
                        <td class="border px-4 py-2"><?php echo $barang['harga'];?></td>
                        <td class="border px-4 py-2">
                            <a href="<?php echo $barang['gambar'];?>" target="_blank"><img width="48px" src="<?php echo $barang['gambar'];?>" alt="<?php echo $barang['nama'];?> /"></a>
                        </td>
                        <td class="border px-4 py-2"><?php echo $barang['jml_stok'];?></td>
                        <td class="border px-4 py-2">
                            <a href="index.php?page=barang_form&kode_barang=<?php echo $barang['kode_barang'] ?>" class="bg-teal-300 cursor-pointer rounded p-1 mx-1 text-white">
                                <i class="fas fa-edit"></i></a>
                            <a href="actions/barang.php?action=delete&kode_barang=<?php echo $barang['kode_barang'] ?>" class="bg-teal-300 cursor-pointer rounded p-1 mx-1 text-red-500">
                                <i class="fas fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>