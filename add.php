<?php

//memanggil file functions bisa menggunakana include atau require
require 'functions.php';

// cek apakah tombol submit sudah ditekan atau belum
if(isset($_POST["submit"])){
    //gunakan untuk cek var_dump($_POST);

    // cek apakah data berhasil di tambah atau tidak
    // Saya menggunakan alert dari javascript
    if( add($_POST) > 0){
        echo "
            <script>
                alert('data berhasil ditambahkan!');
                document.location.href='index.php'
            </script>
        ";
    } else  {
        echo "
            <script>
                alert('data gagal ditambahkan!');
                document.location.href='index.php'
            </script>
        ";
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Tambah Data</title>
</head>
<body>
    <h1>Tambah Data</h1>

    <form action="" method="post">  <!-- atribut (action : ) dan (method : hiden di url) -->
        <ul>
            <li>
                <label for="nik">NIK    :</label>
                <input type="text" name="nik" id="nik" required>
            </li>

            <li>
                <label for="nama">Nama    :</label>
                <input type="text" name="nama" id="nama" required>
            </li>

            <li>
                <label for="jurusan">Jurusan    :</label>
                <input type="text" name="jurusan" id="jurusan" required>
            </li>

            <li>
                <label for="email">Email    :</label>
                <input type="text" name="email" id="email" required>
            </li>

            <li>
                <button type="submit" name="submit">Simpan Data</button>
            </li>
        </ul>
    </form>
</body>
</html>