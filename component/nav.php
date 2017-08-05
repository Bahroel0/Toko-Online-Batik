
<!-- navbar -->
<nav class="navbar navbar-fixed">
  
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="home.php">
        <img style="width:14vw; height:7vh; padding-top:0px;" alt="Brand" src="asset/img/Brand1.png">
      </a>
    </div>

    <ul class="nav navbar-nav navbar-right" >
      <li>
        <?php 
          $conn = mysqli_connect('localhost', 'root', '', 'batiku');
          if(isset($_SESSION['idUser'])){
            $iduser = $_SESSION['idUser'];
            $queryUser = mysqli_query($conn, "SELECT * FROM tabel_user WHERE idUser='$_SESSION[idUser]'");
            $arrayUser = mysqli_fetch_array($queryUser);
            echo '
                <a href="proses/logout.php"><button class="btn navbar-btn" id="btn-logout" style="color:#7986cb;margin-top:-0.8vh;
                background-color: white;"><b>Logout</b></button></a>
            ';
          }else{
            echo '
                <button class="btn navbar-btn" id="btn-login"><b>Login</b></button>
            ';
          }
       ?>
      </li>
      <li style="border-left: 1px solid white">
      <?php 
        $conn = mysqli_connect('localhost', 'root', '', 'batiku');
        if(isset($_SESSION['idUser'])){
          echo '
            <a class="not-active" href="keranjang.php" data-toggle="tooltip" data-placement="bottom" title="Keranjang"  ><i class="glyphicon glyphicon-shopping-cart" id="trolly"></i></a>
          ';
        }else{
          echo '
            <a class="not-active" href="#" data-toggle="tooltip" data-placement="bottom" title="Keranjang"  ><i class="glyphicon glyphicon-shopping-cart" id="trolly"></i></a>
          ';
        }
       ?>


        
      </li>
      
    </ul>
    

    <form action="pencarian.php" method="get" class="navbar-form navbar-right" style="margin-top: 4vh">
      <div class="input-group" style="width:45vw; margin-right: 8vw; margin-top: 1vh;">
        <input type="text" class="form-control" placeholder="Search Product" name="keyword">
        <div class="input-group-btn">
          <button class="btn btn-default" type="submit">
            <i class="glyphicon glyphicon-search" style="opacity: 0.7"></i>
          </button>
        </div>
      </div>
    </form>


  <!-- userLog -->
  <div class="container" id="log">
    <ul class="nav nav-tabs nav-justified">
      <li><a href="#freg" data-toggle="tab" style="font-style:bold;font-size: 1.2em; color:#1c6def">Daftar</a></li>
      <li class="active"><a href="#flogin" data-toggle="tab" style="font-style:bold;font-size: 1.2em; color:#1c6def">Login</a></li>
    </ul>
    <div class="tab-content">
        <form action="proses/login.php" method="post" role="form" id="flogin" style="padding-top: 10px" class="tab-pane fade in active">
        <div class="form-group">
          <label for="email">Email :</label>
          <input type="email" class="form-control" id="email" name="email">
        </div>
        <div class="form-group">
          <label for="pwd">Password :</label>
          <input type="password" class="form-control" id="pwd" name="password">
        </div>

        <button type="submit" class="btn btn-primary">Login</button>
      </form>

      <form action="proses/daftar.php" method="post" role="form" id="freg" style="padding-top: 10px" class="tab-pane fade">
        <div class="form-group">
          <label for="nama">Nama :</label>
          <input type="text" class="form-control" id="nama" name="nama" required>
        </div>
        <div class="form-group">
          <label for="noTelp">Nomor Telepon :</label>
          <input type="telp" class="form-control" id="noTelp" name="telpon" required>
        </div>
        <div class="form-group">
          <label for="email">Email :</label>
          <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="form-group">
          <label for="alamat">Alamat :</label>
          <input type="text" class="form-control" id="alamat" name="alamat" required>
        </div>
        <div class="form-group">
          <label for="pwd">Password :</label>
          <input type="password" class="form-control" id="pwd" name="password" required>
        </div>
        <div class="form-group">
          <label for="pwd2">Konfirmasi Password :</label>
          <input type="password" class="form-control" id="pwd2" name="repassword" required>
        </div>
        <button type="submit" class="btn btn-primary">Daftar</button>
      </form>
    </div>
  </div>
</nav>
<!-- end of navbar -->

<!-- navbar sekunder -->
<div class="container-fluid kategori">
  <div class="row">
    <div class="col-xs-2 col-xs-offset-2">
        <a href="home.php"><img style="width:14vw; height:7vh; padding-top:2vh;" alt="Brand" src="asset/img/Brand1.png"></a>
    </div>
    <div class="col-xs-6">
      <ul class="nav nav-pills kategori2">
        <li class="dropdown active"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Dewasa<span class="caret" style="margin-left:10px"></span></a>
            <ul class="dropdown-menu">
              <li><a data-toggle="pill" href="#pria">Pria</a></li>
              <li><a data-toggle="pill" href="#wanita">Wanita</a></li>
            </ul>

        </li>
        <li><a data-toggle="pill" href="#couple">Couple</a></li>
        <li><a data-toggle="pill" href="#anak" >Anak-anak</a></li>
        <li><a data-toggle="pill" href="#sarimbit">Sarimbit</a></li>
      </ul>
    </div>
  </div>
</div>
  
<!-- end of navbar sekunder -->