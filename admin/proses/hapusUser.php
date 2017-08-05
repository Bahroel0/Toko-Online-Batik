<?php 
  require('../config/db.php');

  $iduser = $_GET['idUser'];
  $query = mysqli_query($conn, "DELETE FROM tabel_user WHERE idUser = '$iduser'");
  if($query){
    echo '
      <script>
      alert("User berhasil dihapus !");
      window.location = "../admin.php";
      </script>
    ';
  }
 ?>