<?php 
  $conn = mysqli_connect('localhost', 'root', '', 'batiku');

  $harga = $_POST['harga'];
  $stock = $_POST['stock'];
  $id= $_POST['idProduk'];

  if($harga == 0 && $stock > 0){
    $query = mysqli_query($conn, "UPDATE tabel_produk SET stock='$stock' WHERE idProduk='$id' ");
      if($query){
        echo'
        <script>
        alert("Stock telah diupdate");
        window.location = "../admin.php";
        </script>
        ';
      }
  }else if($harga > 0 && $stock > 0){
    $query = mysqli_query($conn, "UPDATE tabel_produk SET harga='$harga', stock='$stock' WHERE idProduk='$id' ");
    if($query){
      echo'
      <script>
      alert("Data telah diupdate");
      window.location = "../admin.php";
      </script>
      ';
    }
  }else if($harga > 0 && $stock == 0){
    $query = mysqli_query($conn, "UPDATE tabel_produk SET harga='$harga' WHERE idProduk='$id' ");
    if($query){
      echo'
      <script>
      alert("Harga telah diupdate");
      window.location = "../admin.php";
      </script>
      ';
    }
  }  else{
      echo'
      <script>
      alert("Form Tidak boleh kosong !");
      window.location = "../admin.php";
      </script>
      ';
    }

 ?>