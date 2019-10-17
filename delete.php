<?php

//memanggil file functions bisa menggunakana include atau require
require 'functions.php';

$id = $_GET["id"];

if( delete($id) > 0){
    echo "
        <script>
            alert('data berhasil dihapus!');
            document.location.href='index.php'
        </script>
    ";
} else  {
    echo "
        <script>
            alert('data gagal dihapus!');
            document.location.href='index.php'
        </script>
    ";
}
?>