<?php
require("koneksi.php");

if($_SERVER["REQUEST_METHOD"] == "POST"){
    
          $id = $_POST["id"];
          $nama_kost = $_POST["nama_kost"];
          $foto_kost = $_POST["foto_kost"];
          $tipe_kost = $_POST["tipe_kost"];
          $daerah_kost = $_POST["daerah_kost"];
          $alamat_kost = $_POST["alamat_kost"];
          $status_kost= $_POST["status_kost"];
          $harga_kost = $_POST["harga_kost"];
          $deskripsi_kost = $_POST["deskripsi_kost"];
    
    $perintah = "UPDATE tbl_kost SET nama_kost = '$nama_kost', foto_kost = '$foto_kost', tipe_kost = '$tipe_kost', daerah_kost ='$daerah_kost',alamat_kost = '$alamat_kost',status_kost = '$status_kost', harga_kost= '$harga_kost' ,deskripsi_kost = '$deskripsi_kost' WHERE id = '$id'";
    $eksekusi = mysqli_query($connect , $perintah);
    $cek = mysqli_affected_rows($connect);
    
    if($cek > 0){
    $response["kode"] = 1 ;
    $response["pesan"] = "Sukses Mengubah Data";
    }
    
}else{
    $response["kode"] = 0 ;
    $response["pesan"] = "Tidak Ada Update Data";
}
    echo json_encode($response);
    mysqli_close($connect);