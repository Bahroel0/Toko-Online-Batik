<?php 
  require('../config/db.php');
  $idadmin = $_GET['idAdmin'];
  $query = mysqli_query($conn, "DELETE FROM tabel_admin WHERE idAdmin = '$idadmin'");
  if($query){
    echo '
      <script>
      alert("Admin berhasil dihapus !");
      window.location = "../admin.php";
      </script>
    ';
  }

 ?>