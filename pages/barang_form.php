<?php
    include "systems/DB.php";
    $kode_barang = isset($_GET['kode_barang']) ? $_GET['kode_barang'] : '';
    $query=$db->get("*","barang","WHERE kode_barang='$kode_barang'");
    $data=$query->fetch();
    $peran = isset($data['peran']) ? $data['peran'] : '';
?>
<div class="flex flex-1  flex-col md:flex-row lg:flex-row mx-2">
    <div class="mb-2 border-solid border-gray-300 rounded border shadow-sm w-full">
        <div class="bg-gray-200 px-2 py-3 border-solid border-gray-200 border-b">
            Form Barang <?php echo isset($data['nama']) ? ': ' . $data['nama'] : '';?>
        </div>
        <div class="p-3">
            <form class="w-full" method="POST" action="actions/barang.php" enctype="multipart/form-data">
                <input type="hidden" name="kode_barang"
                    value="<?php echo isset($_GET['kode_barang']) ? $_GET['kode_barang'] : '' ?>">
                <input type="hidden" name="action"
                    value="<?php echo isset($_GET['kode_barang']) ? 'update' : 'insert' ?>">
                <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full md:w-1/2 px-3">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-light mb-1"
                            for="grid-name">
                            Nama
                        </label>
                        <input
                            class="appearance-none block w-full bg-gray-200 text-grey-darker border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white-500 focus:border-gray-600"
                            id="grid-name" type="text" placeholder="Nama" name="nama" required
                            value="<?php echo isset($data['nama']) ? $data['nama'] : '';?>">
                    </div>
                    <div class="w-full md:w-1/2 px-3">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-light mb-1"
                            for="grid-price">
                            Harga
                        </label>
                        <input
                            class="appearance-none block w-full bg-gray-200 text-grey-darker border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white-500 focus:border-gray-600"
                            id="grid-price" type="number" placeholder="1000" name="harga" required
                            value="<?php echo isset($data['harga']) ? $data['harga'] : '';?>">
                    </div>
                </div>
                <div class="flex flex-wrap -mx-3 mb-2">
                    <div class="w-full md:w-1/2 px-3 mb-6">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-light mb-1"
                            for="grid-image">
                            Gambar
                        </label>
                        <a href="<?php echo $data['gambar'];?>" target="_blank"><img class="m-3" width="48px" src="<?php echo $data['gambar'];?>" alt="<?php echo $data['nama'];?>"></a>
                        <input
                            class="appearance-none block w-full bg-gray-200 text-grey-darker border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white-500 focus:border-gray-600"
                            id="grid-image" type="file" placeholder="https://images.com/sample.png" name="gambar" <?php echo isset($data['gambar']) ? '' : 'required';?>>
                    </div>
                    <div class="w-full md:w-1/2 px-3 mb-6">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-light mb-1"
                            for="grid-stok">
                            Jumlah Stok
                        </label>
                        <input
                            class="appearance-none block w-full bg-gray-200 text-grey-darker border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white-500 focus:border-gray-600"
                            id="grid-stok" type="number" placeholder="1000" name="jml_stok" required
                            value="<?php echo isset($data['jml_stok']) ? $data['jml_stok'] : '';?>">
                    </div>
                    <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                        <button
                            class="shadow bg-purple-500 hover:bg-purple-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded"
                            type="submit" name="">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>