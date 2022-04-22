<?php
    include "systems/DB.php";
    $kode_user = isset($_GET['kode_user']) ? $_GET['kode_user'] : '';
    $query=$db->get("*","user","WHERE kode_user='$kode_user'");
    $data=$query->fetch();
    $peran = isset($data['peran']) ? $data['peran'] : '';
?>
<div class="flex flex-1  flex-col md:flex-row lg:flex-row mx-2">
    <div class="mb-2 border-solid border-gray-300 rounded border shadow-sm w-full">
        <div class="bg-gray-200 px-2 py-3 border-solid border-gray-200 border-b">
            Form User
        </div>
        <div class="p-3">
            <form class="w-full" method="POST" action="actions/user.php">
                <input type="hidden" name="kode_user" value="<?php echo isset($_GET['kode_user']) ? $_GET['kode_user'] : '' ?>">
                <input type="hidden" name="action" value="<?php echo isset($_GET['kode_user']) ? 'update' : 'insert' ?>">
                <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full md:w-1/2 px-3">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-light mb-1"
                            for="grid-name">
                            Nama
                        </label>
                        <input
                            class="appearance-none block w-full bg-gray-200 text-grey-darker border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white-500 focus:border-gray-600"
                            id="grid-name" type="text" placeholder="Nama" name="nama" required value="<?php echo isset($data['nama']) ? $data['nama'] : '';?>">
                    </div>
                    <div class="w-full md:w-1/2 px-3">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-light mb-1"
                            for="grid-email">
                            Email
                        </label>
                        <input
                            class="appearance-none block w-full bg-gray-200 text-grey-darker border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white-500 focus:border-gray-600"
                            id="grid-email" type="email" placeholder="Email" name="email" required value="<?php echo isset($data['email']) ? $data['email'] : '';?>">
                    </div>
                </div>
                <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full px-3">
                        <label class="block uppercase tracking-wide text-grey-darker text-xs font-light mb-1"
                            for="grid-password">
                            Password
                        </label>
                        <input
                            class="appearance-none block w-full bg-grey-200 text-grey-darker border border-grey-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-grey"
                            id="grid-password" type="password" placeholder="******************" name="password" <?php if(!isset($_GET['kode_user'])): ?> required <?php endif; ?>>
                        <?php if(isset($_GET['kode_user'])): ?>
                        <p class="text-grey-dark text-xs italic">Abaikan jika tidak ingin mengubah password</p>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="flex flex-wrap -mx-3 mb-2">
                    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-grey-darker text-xs font-light mb-1"
                            for="grid-telp">
                            Telp
                        </label>
                        <input
                            class="appearance-none block w-full bg-grey-200 text-grey-darker border border-grey-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-grey"
                            id="grid-telp" type="text" placeholder="+62" name="telp" required value="<?php echo isset($data['telp']) ? $data['telp'] : '';?>">
                    </div>
                    <div class="w-full md:w-1/2 px-3 mb-6">
                        <label class="block uppercase tracking-wide text-grey-darker text-xs font-light mb-1"
                            for="grid-state">
                            Peran
                        </label>
                        <div class="relative">
                            <select
                                class="block appearance-none w-full bg-grey-200 border border-grey-200 text-grey-darker py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-grey"
                                id="grid-state" name="peran" required>
                                <option value="" disabled selected>-- Pilih Peran</option>
                                <option <?php echo ($peran == 'Admin') ? 'selected' : '';?>>Admin</option>
                                <option <?php echo ($peran == 'Director') ? 'selected' : '';?>>Director
                                </option>
                                <option <?php echo ($peran == 'HO') ? 'selected' : '';?>>HO</option>
                            </select>
                            <div
                                class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-grey-darker">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 20 20">
                                    <path
                                        d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                                </svg>
                            </div>
                        </div>
                    </div>
                    <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                    <button class="shadow bg-purple-500 hover:bg-purple-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="submit" name="">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>