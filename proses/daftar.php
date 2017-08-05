<?php 
  $conn = mysqli_connect('localhost', 'root', '', 'batiku');
  
  $nama = $_POST['nama'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $repass = $_POST['repassword'];
  $alamat = $_POST['alamat'];
  $telpon = $_POST['telpon'];

  if($password == $repass){
    $query = mysqli_query($conn, "INSERT INTO tabel_user (namaUser, email, password, alamat, telpon) VALUES ('$nama', '$email', md5('$password'), '$alamat', '$telpon')");
  }else{
    echo '
      <script>
        alert("Periksa password anda !");
        window.location  = "../home.php"
      </script>
    '; 
  }

  if($query){
    echo '
      <script>
        alert("Pendaftaran Berhasil, Silahkan login untuk berbelanja ");
        window.location  = "../home.php"
      </script>
    '; 
  } else {
    echo '
      <script>
        alert("Terjadi Kesalahan, Silahkan Ulangi Lagi. (Kesalahan E01)");
        window.location  = "../home.php"
      </script>
    '; 
  }
?>