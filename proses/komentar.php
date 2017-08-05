<?php 
  $conn = mysqli_connect('localhost', 'root', '', 'batiku');

  $nama = $_POST['nama'];
  $email = $_POST['email'];
  $pesan = $_POST['pesan'];
  $query = mysqli_query($conn, " INSERT INTO tabel_komentar (nama, email, pesan) VALUES ('$nama', '$email', '$pesan')");
  
  if($query){
    echo '
      <script>
        alert("Komentar sudah dikirim !");
        window.location = "../home.php"
      </script>
    ';
  }else{
    echo '
      <script>
        alert("Komentar tidak terkirim, coba ulangi !");
        window.location = "../home.php"
      </script>
    ';
  }
 ?>