<?php 
  require('../config/db.php');
  session_start();
  $idBarang = $_GET['idProduk'];
  $idUser = $_GET['idUser'];

  $query = mysqli_query($conn, "SELECT harga FROM tabel_produk WHERE idProduk='$idBarang'");
  $data = mysqli_fetch_array($query);
  $harga = $data['harga'];
  
  $queryInsert = mysqli_query($conn, "INSERT INTO tabel_trolly (idUser, idProduk, jumlah, harga) VALUES ('$idUser','$idBarang',1,'$harga')");

  if($queryInsert){
    header('location: ../keranjang.php');
  }



 ?>