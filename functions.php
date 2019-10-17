<?php
//merapikan halaman supaya tidak mengulang2 koneksi di setiap halaman

//koneksi ke database
$koneksidb = mysqli_connect("localhost", "root", "root", "klim");

//function query disini menangkap dari index.php
function query($sql) { //parameter $sql menangkap dr query
    global $koneksidb;
    $result = mysqli_query($koneksidb, $sql);
    $kotakbaju = []; // variable $kotakbaju array kosong (kotak kosong)- proses 
    while ($baju = mysqli_fetch_assoc($result)){ //proses mengambil data menggunakan looping 
        $kotakbaju[] = $baju; //menambahkan elemen baru di setiap akhir array 
    }

    return $kotakbaju; //kembalikan kotaknya
}


//function add data
function add($dataadd){
    global $koneksidb;
    
    //ambil data dari setiap elemen dalam form
    //gunakan htmlspecialchars untuk antisipasi inputan
    $nik     = htmlspecialchars($dataadd["nik"]);
    $nama    = htmlspecialchars($dataadd["nama"]);
    $jurusan = htmlspecialchars($dataadd["jurusan"]);
    $email   = htmlspecialchars($dataadd["email"]);

    //query insert data ke database
    $sql = "INSERT INTO anggota
            VALUES 
            (null,'$nik','$nama','$jurusan','$email')";

    mysqli_query($koneksidb, $sql);
    
    return mysqli_affected_rows($koneksidb); //kembalikan 
}


//fuction delete Data
function delete($id){
    global $koneksidb;
    mysqli_query($koneksidb, "DELETE FROM anggota WHERE id=  $id");

    return mysqli_affected_rows($koneksidb); //Kembalikan
}


//function Edit Data
function edit($dataedit){
    global $koneksidb;
    
    //ambil data dari setiap elemen dalam form
    //gunakan htmlspecialchars untuk antisipasi inputan
    $id      = $dataedit["id"];
    $nik     = htmlspecialchars($dataedit["nik"]);
    $nama    = htmlspecialchars($dataedit["nama"]);
    $jurusan = htmlspecialchars($dataedit["jurusan"]);
    $email   = htmlspecialchars($dataedit["email"]);

    //query UPDATE data ke database
    $sql = "UPDATE anggota SET
                nik     = '$nik',
                nama    = '$nama',
                jurusan = '$jurusan',
                email   = '$email'
            WHERE id    = $id";

    mysqli_query($koneksidb, $sql);
    
    return mysqli_affected_rows($koneksidb); //kembalikan 

}

?>

