<?php
include "systems/DB.php";
$users=$db->get("*","user","ORDER BY kode_user DESC");
?>
<div class="flex flex-1  flex-col md:flex-row lg:flex-row mx-2">
    <div class="mb-2 border-solid border-gray-300 rounded border shadow-sm w-full">
        <div class="bg-gray-200 px-2 py-3 border-solid border-gray-200 border-b">
            Data User
        </div>
        <div class="p-3">
            <div class="mb-4 float-right">
                <a href="index.php?page=user_form" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"><i class="fas fa-plus"></i> Tambah Data</a>
            </div>
            <table class="table-responsive w-full rounded">
                <thead>
                    <tr>
                        <th class="border w-1/5 px-4 py-2">Kode User</th>
                        <th class="border w-1/6 px-4 py-2">Nama</th>
                        <th class="border w-1/6 px-4 py-2">Email</th>
                        <th class="border w-1/6 px-4 py-2">Telp</th>
                        <th class="border w-1/7 px-4 py-2">Peran</th>
                        <th class="border w-1/5 px-4 py-2">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        foreach($users as $user){
                    ?>
                    <tr>
                        <td class="border px-4 py-2"><?php echo $user['kode_user'];?></td>
                        <td class="border px-4 py-2"><?php echo $user['nama'];?></td>
                        <td class="border px-4 py-2"><?php echo $user['email'];?></td>
                        <td class="border px-4 py-2"><?php echo $user['telp'];?></td>
                        <td class="border px-4 py-2"><?php echo $user['peran'];?></td>
                        <td class="border px-4 py-2">
                            <a href="index.php?page=user_form&kode_user=<?php echo $user['kode_user'] ?>" class="bg-teal-300 cursor-pointer rounded p-1 mx-1 text-white">
                                <i class="fas fa-edit"></i></a>
                            <a href="actions/user.php?action=delete&kode_user=<?php echo $user['kode_user'] ?>" class="bg-teal-300 cursor-pointer rounded p-1 mx-1 text-red-500">
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