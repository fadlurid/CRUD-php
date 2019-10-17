<?php
//memanggil file functions bisa menggunakana include atau require
require 'functions.php';

//ditampung oleh parameter $anggota
$anggota = query("SELECT * FROM anggota");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Halaman Admin</title>
</head>
<body>
    <h1>Daftar Mahasiswa KLiM</h1>

    <!-- tambah data -->
    <a href="add.php">Tambah Data</a>

<br> <br>
    
    <!-- table -->
    <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>No</th>
            <th>NIK</th>
            <th>Nama</th>
            <th>Jurusan</th>
            <th>Email</th>
            <th>Action</th>
        </tr>

        <!-- penomoran -->
        <?php $i=1 ?>

        <!-- menggunakan forech loop
        foreach ($set as $value){
            // Do something to $value;
        } -->
        <?php foreach ($anggota as $row ):?> 
        <tr>
            <td><?= $i; ?></td> 
            <td><?= $row["nik"]; ?></td>
            <td><?= $row["nama"]; ?></td>
            <td><?= $row["jurusan"]; ?></td>
            <td><?= $row["email"]; ?></td>
            <td>
                <a href="edit.php?id=<?= $row["id"]; ?>">Edit</a> |
                <a href="delete.php?id=<?= $row["id"]; ?>"
                onclick ="return confirm('Yakin Ingin menghapus data ?')">Delete</a>
            </td>
        </tr>

        <!-- akhir dari penomoran -->
        <?php $i++; ?>

        <!-- akhir dari forech loop -->
        <?php endforeach; ?>
    </table>
    <!-- akhir table -->

</body>
</html>