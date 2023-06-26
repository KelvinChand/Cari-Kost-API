<?php

require("koneksi.php");
if($_SERVER["REQUEST_METHOD"] == "POST"){
$id = $_POST["id"];
$perintah = "SELECT * FROM tbl_kost where id ='$id'";
$eksekusi = mysqli_query($connect,$perintah);
$cek = mysqli_affected_rows($connect);
}

if($cek > 0){
    $response['kode'] = 1;
    $response['pesan'] = "Data Tersedia";
    $response['data']= array();
    
    while($get = mysqli_fetch_object($eksekusi)){
        $var['id_kost'] = $get -> id;
        $var['nama_kost'] = $get ->nama_kost;
        $var['foto_kost']= $get -> foto_kost;
        $var['tipe_kost']= $get -> tipe_kost;
        $var['daerah_kost']= $get -> daerah_kost;
        $var['alamat_kost']= $get -> alamat_kost;
        $var['status_kost']= $get -> status_kost;
        $var['harga_kost']= $get -> harga_kost;
        $var['deskripsi_kost'] = $get -> deskripsi_kost;
        
        array_push($response['data'],$var);
    }
}else{
    $response['kode'] = 0;
    $response['pesan'] = "Data Tidak Tersedia";
}
header('Content-Type: application/json');
echo json_encode($response);
mysqli_close($connect);
