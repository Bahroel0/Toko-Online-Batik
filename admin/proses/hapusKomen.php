<?php 
  require('../config/db.php');
  $idkomen = $_GET['idKomen'];
  $query = mysqli_query($conn, "DELETE FROM tabel_komentar WHERE idKomen = $idkomen");
  if($query){
    echo '
      <script>
      alert("Komentar berhasil dihapus !");
      window.location = "../admin.php";
      </script>
    ';
  }

 ?>