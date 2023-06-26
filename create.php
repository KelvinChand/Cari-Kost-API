<?php
     require('koneksi.php');

     $response = array();

     if($_SERVER["REQUEST_METHOD"] == "POST")
     {
          $nama_kost = $_POST["nama_kost"];
          $foto_kost = $_POST["foto_kost"];
          $tipe_kost = $_POST["tipe_kost"];
          $daerah_kost = $_POST["daerah_kost"];
          $alamat_kost = $_POST["alamat_kost"];
          $status_kost= $_POST["status_kost"];
          $harga_kost = $_POST["harga_kost"];
          $deskripsi_kost = $_POST["deskripsi_kost"];
          
          $command = "INSERT INTO tbl_kost (nama_kost,foto_kost,tipe_kost,daerah_kost,alamat_kost,status_kost,harga_kost,deskripsi_kost) VALUES ('$nama_kost', '$foto_kost','$tipe_kost','$daerah_kost','$alamat_kost','$status_kost','$harga_kost','$deskripsi_kost')";
          $execute = mysqli_query($connect, $command);
          $check = mysqli_affected_rows($connect);

          if($check > 0)
          {
               $response["kode"] = 1;
               $response["pesan"] = "Sukses Menyimpan Data";
          }
          else
          {
               $response["kode"] = 0;
               $response["pesan"] = "Gagal Menyimpan Data";
          }
          
     }
     else
     {
          $response["kode"] = 0;
          $response["pesan"] = "Tidak ada POST Data";
     }

     echo json_encode($response);
     mysqli_close($connect);


?>