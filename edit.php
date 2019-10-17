<?php

//memanggil file functions bisa menggunakana include atau require
require 'functions.php';

//ambil data di url
$id = $_GET["id"];
//var_dump($id); //tes data

// Query data mahasiswa berdasarkan id
$anggotaedit = query ("SELECT * FROM anggota WHERE id = $id")[0]; 
//var_dump($anggotaedit[0]["nik"]);

// cek apakah tombol submit sudah ditekan atau belum
// - - ketika tombol submit di tekan maka ambil data walaupun kosong
if( isset($_POST["submit"])){
    //gunakan untuk cek var_dump($_POST);

    // cek apakah data berhasil di tambah atau tidak
    // Saya menggunakan alert dari javascript
    // - - kirim ke function edit untuk di rubah
    if( edit($_POST) > 0){
        echo "
            <script>
                alert('data berhasil diubah!');
                document.location.href='index.php'
            </script>
        ";
    } else  {
        echo "
            <script>
                alert('data gagal diubah!');
                document.location.href='index.php'
            </script>
        ";
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Edit Data</title>
</head>
<body>
    <h1>Edit Data</h1>

    <form action="" method="post">  <!-- atribut (action : ) dan (method : hiden di url) -->
        
        <input type="hidden" name="id" value="<?= $anggotaedit["id"]; ?>">
        <ul>
            <li>
                <label for="nik">NIK    :</label>
                <input type="text" name="nik" id="nik" required 
                value="<?= $anggotaedit["nik"]; ?>"> 
                <!-- menambah value = dari $anggotaedit["nik"]; dst -->
            </li>

            <li>
                <label for="nama">Nama    :</label>
                <input type="text" name="nama" id="nama" required
                value="<?= $anggotaedit["nama"]; ?>">
                <!-- menambah value = dari $anggotaedit["nama"]; dst -->
            </li>

            <li>
                <label for="jurusan">Jurusan    :</label>
                <input type="text" name="jurusan" id="jurusan" required
                value="<?= $anggotaedit["jurusan"]; ?>">
                <!-- menambah value = dari $anggotaedit["jurusan"]; dst -->
            </li>

            <li>
                <label for="email">Email    :</label>
                <input type="text" name="email" id="email" required
                value="<?= $anggotaedit["email"]; ?>">
                <!-- menambah value = dari $anggotaedit["email"]; dst -->
            </li>

            <li>
                <button type="submit" name="submit">Ubah Data</button>
            </li>
            
        </ul>
    </form>
</body>
</html>