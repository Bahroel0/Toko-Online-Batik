<?php 
  require('config/db.php');
  session_start();
 ?>



<!DOCTYPE html>
<html>
<head>
  <title>Toko Online Batik</title>
  <link rel="stylesheet" type="text/css" href="plugin/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="asset/css/main.css">
  <link rel="stylesheet" type="text/css" href="asset/css/keranjang.css">
  <link rel="icon" type="image/gif/png" href="asset/img/Title.png">
</head>
<body>

<?php include('component/nav.php'); ?>

<div class="container-fluid" id="total-keranjang" >
  <div class="row">
    <div class="col-xs-8 col-xs-offset-2">
      <div class="table-responsive">          
        <table class="table">
          <thead>
            <tr>
              <h3 style="font-family: Forte; color:"><strong>Keranjang Belanja</strong></h3>
            </tr>
          </thead>
          <tbody>
          <?php 
            
            $queryKeranjang = mysqli_query($conn, "SELECT * FROM tabel_trolly WHERE idUser='$_SESSION[idUser]' ");
            $jumlah = mysqli_num_rows($queryKeranjang);

            if($jumlah > 0){
              $queryTrolly = "SELECT * FROM tabel_trolly WHERE idUser='$_SESSION[idUser]'";
            $query_trolly = mysqli_query($conn, $queryTrolly);
            while($arrayTrolly = mysqli_fetch_array($query_trolly)){
              $queryProduk = mysqli_query($conn, "SELECT * FROM tabel_produk WHERE idProduk='$arrayTrolly[idProduk]'");
              $arrayProduk = mysqli_fetch_array($queryProduk);

              echo '
                <tr>
                  <td><img src="admin/proses/'.$arrayProduk['path'].'"></td>
                  <td>
                    <h4><strong>'.$arrayProduk['nama'].'</strong></h4>
                    <h5><strong>Harga</strong><span class="titik-harga">:</span> Rp.'.$arrayProduk['harga'].'</h5>
                    <form action="proses/updateTrolly.php" method="post">
                    <div class="form-group">
                        <label for="jumlah"><strong>Jumlah</strong><span class="titik-total">:</span></label>
                        <input type="hidden" name="harga" value="'.$arrayProduk['harga'].'">
                        <input type="hidden" name="idTrolly" value="'.$arrayTrolly['idTrolly'].'">
                        <input type="number" value="'.$arrayTrolly['jumlah'].'" name="jumlah" min="1" max="'.$arrayProduk['stock'].'" style="margin-left:-1vw">
                        </div>
                      </form>
                    <h5><strong>Total</strong><span class="titik-total">: Rp. '.$arrayTrolly['harga'].'</span></h5>
                  </td>
                  <td><a href="proses/batalBeli.php?idTrolly='.$arrayTrolly['idTrolly'].'"><button type="button" class="btn btn-warning"><strong>Batal Beli</strong></button></a></td>
                </tr>
              ';
            }
            ?>
            <tr id="total-bayar">
              <?php 
              $queryTotalBayar = mysqli_query($conn, "SELECT SUM(harga) FROM tabel_trolly WHERE idUser='$_SESSION[idUser]'");
              $arrayTotal = mysqli_fetch_array($queryTotalBayar);
              echo '
                <td>
                  <h4><strong>Total Bayar : Rp. '.$arrayTotal[0].'</strong></h4>
                </td>
              ';
               ?>

              
              <td></td>
              <td></td>
            </tr>
            <?php
            $belumAda = 0;
          }else{
            $belumAda = 1;
            echo '
              <div class="">
                <div class="col-xs-5" style="background: #6cd83a;height: 10vh; color:white; line-height:10vh;margin-left:20vw; border-radius:10px; text-align:center">
                  <p>Keranjang Masih Kosong !!!</p>
                </div>
              </div>
              ';
            }

           ?>           
          </tbody>
        </table>
  </div>
</div>
    </div>
  </div>
  
</div>


<?php
if($belumAda==0){
  echo '
  <div class="container" id="beli">
  <a href="proses/bayar.php?idUser='.$_SESSION['idUser'].'&&total='.$arrayTotal[0].'"><button type="button" class="btn btn-success"><strong>Beli Sekarang</strong></button></a>
  <a href="home.php"><button type="button" class="btn btn-success" style="margin-left:38vw"><strong>Kembali Berbelanja</strong></button></a>
</div>
';
}


 ?>

<?php include('component/footer.php'); ?>

<script type="text/javascript" src="plugin/Javascript/jquery.min.js"></script>
<script type="text/javascript" src="plugin/bootstrap/js/bootstrap.js"></script>
<script type="text/javascript" src="asset/js/script.js"></script>
</body>
</html>