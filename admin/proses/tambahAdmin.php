<?php 
  $conn = mysqli_connect('localhost', 'root', '', 'batiku');

  $idadmin = $_POST['idadmin'];
  $namaadmin = $_POST['namaadmin'];
  $email = $_POST['emailadmin'];
  $password = $_POST['password'];
  $query = mysqli_query($conn, " INSERT INTO tabel_admin (idAdmin, namaAdmin, email, password) VALUES ('$idadmin', '$namaadmin', '$email', md5('$password'))");
  
  if($query){
    echo '
      <script>
        alert("Admin berhasil ditambahkan");
        window.location = "../admin.php"
      </script>
    ';
  }else{
    echo '
      <script>
        alert("Terjadi Kesalahan, silahkan ulangi.");
        window.location = "../admin.php"
      </script>
    ';
  }
 ?>