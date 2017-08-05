<?php 
  session_start();
  require('../config/db.php');
  
  $email = $_POST['email'];
  $password = $_POST['password'];
  
  $query = mysqli_query($conn, " SELECT idUser FROM tabel_user WHERE email='$email' ");
  $count = mysqli_num_rows($query);
  if($count > 0){
    $queryId = mysqli_query($conn, "SELECT idUser FROM tabel_user WHERE email='$email' AND password=md5('$password') ");
    $numRow = mysqli_num_rows($queryId);
    if($numRow == 0){
      echo '
        <script>
          alert("Password Salah.");
          window.location = "../home.php"
        </script>
      ';
    } else {
      $arrayId = mysqli_fetch_array($queryId);
      $_SESSION['idUser'] = $arrayId['idUser'];
      if(isset($_SESSION['idUser'])){
        echo '
        <script>
          alert("Login Sukses, Selamat Berbelanja");
          window.location = "../home.php"
        </script>
        ';
      }
    }
  } else {
    echo '
      <script>
        alert("Email tidak terdaftar.");
        window.location = "../home.php"
      </script>
    ';
  }
?>