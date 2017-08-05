<?php 
  require('../config/db.php');
  $idtransaksi = $_GET['idTransaksi'];
  $query = mysqli_query($conn, "DELETE FROM tabel_transaksi WHERE idTransaksi = '$idtransaksi' ");
  if($query){
    echo '
      <script>
      alert("Transaksi berhasil dihapus !");
      window.location = "../admin.php";
      </script>
    ';
  }

 ?>