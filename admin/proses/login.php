<?php 
  session_start();
  $conn = mysqli_connect('localhost', 'root', '', 'batiku');
  
  $email = $_POST['email'];
  $password = $_POST['password'];
  $query = mysqli_query($conn, "SELECT idAdmin FROM tabel_admin WHERE email='$email'");
  $count = mysqli_num_rows($query);
  if($count > 0){
    $queryId = mysqli_query($conn, "SELECT idAdmin FROM tabel_admin WHERE email='$email' AND password = md5('$password')");
    $numRow = mysqli_num_rows($queryId);
    if($numRow == 0){
      echo '
        <script>
          alert("Password Salah.");
          window.location = "../login.php"
        </script>
      ';
    }else{
      $arrayId = mysqli_fetch_array($queryId);
      $_SESSION['idAdmin'] = $arrayId['idAdmin'];
      if(isset($_SESSION['idAdmin'])){
        echo '
          <script>
          window.location = "../admin.php";
          </script>
        ';
      }
    }
  }else {
    echo '
      <script>
      alert("Email tidak terdaftar !");
      window.location = "../login.php"
      </script>
    ';
  }
 ?>