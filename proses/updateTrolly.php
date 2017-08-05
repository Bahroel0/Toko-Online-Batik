<?php 
  require("../config/db.php");

  $idTrolly = $_POST['idTrolly'];
  $harga = $_POST['harga'];
  $total = $_POST['jumlah'] * $harga;

  $query = mysqli_query($conn,"UPDATE tabel_trolly SET jumlah='$_POST[jumlah]', harga='$total' WHERE idTrolly='$idTrolly'");
  if($query){
    header("location:../keranjang.php");
  }



 ?>