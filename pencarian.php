<?php 
  require("config/db.php");
  $keyword = $_GET['keyword'];
  session_start();
 ?>

<!DOCTYPE html>
<html>
<head>
  <title>Toko Online Batik</title>
  <link rel="stylesheet" type="text/css" href="plugin/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="asset/css/main.css">
  <link rel="icon" type="image/gif/png" href="asset/img/Title.png">
</head>
<body>

<?php include('component/nav.php'); ?>

<div class="container-fluid" id="content-pencarian" >
  <div class="container">
    <div class="row">
      <div class="col-xs-3">
        <h3>Hasil Pencarian</h3>
      </div>
    </div> 
    <div class="container" id="produk">
    <ul>
    <?php 
    if(isset($keyword)){
      if($keyword == ''){
        echo '
      <div class="row">
        <div class="col-xs-5" style="background: #6cd83a;height: 10vh; color:white; line-height:10vh">
          <p>Tidak ada keyword !!!</p>
        </div>
      </div>
      ';
      }else{
        $queryCari = "SELECT * FROM tabel_produk WHERE nama LIKE '%$keyword%'";
        $query_cari = mysqli_query($conn, $queryCari);
        $jumlahCari = mysqli_num_rows($query_cari);

      if($jumlahCari > 0){
        while($arrayCari = mysqli_fetch_array($query_cari)){
          echo '
            <li>
        <a href="#'.$arrayCari['idProduk'].'">
          <img src="admin/proses/'.$arrayCari['path'].'" alt="'.$arrayCari['nama'].'">
          <span></span>
        </a>
        <div class="overlay" id="'.$arrayCari['idProduk'].'">
          <a href="#" class="close"><i class="glyphicon glyphicon-remove"></i></a>
          <img src="admin/proses/'.$arrayCari['path'].'">
          <div class="keterangan">
            <div class="container">
              <h4><strong>'.$arrayCari['nama'].'</strong></h4>
              <p>'.$arrayCari['keterangan'].'</p>
              <h5>Rp.'.$arrayCari['harga'].'</h5>
              <h5 class="ukur">Ukuran : '.$arrayCari['ukuran'].'</h5>
              <button type="button" class="btn btn-success">Stock : '.$arrayCari['stock'].'</button>
              ';
              if(isset($_SESSION['idUser'])){
                echo '
                  <a href="proses/beli.php?idProduk='.$arrayCari['idProduk'].'&idUser='.$iduser.'"><button type="button" class="btn btn-info">Masukkan Keranjang</button></a>
                ';
              }else{
                echo '
                  <button type="button" class="btn btn-info disabled">Masukkan Keranjang</button>
                ';
              }
              echo '
            
            </div>
          </div>
        </div>
      </li>  
      ';}
      }else{
        echo '
          <div class="row">
            <div class="col-xs-5 col-xs-offset-2" style="background: #6cd83a;height: 10vh; color:white; line-height:10vh; border-radius:10px">
              <p>Tidak ada hasil Pencarian dari "'.$keyword.'"</p>
            </div>
          </div>
          ';
      }
      }
    }else{
      echo '
      <div class="row">
        <div class="col-xs-5" style="background: #6cd83a;height: 10vh; color:white; line-height:10vh">
          <p>Tidak ada keyword !!!</p>
        </div>
      </div>
      ';

    }

     ?>
     </ul>
     </div>
  </div>
</div>

<?php include('component/footer.php'); ?>


<script type="text/javascript" src="plugin/Javascript/jquery.min.js"></script>
<script type="text/javascript" src="plugin/bootstrap/js/bootstrap.js"></script>
<script type="text/javascript" src="asset/js/script.js"></script>
</body>
</html>