<?php 
  session_start();
  if(isset($_SESSION['idAdmin'])){
    echo '
      <script>
        window.location="admin.php"
      </script>
    ';
  } else {
    echo '
      <script>
        window.location="login.php"
      </script>
    ';
  }
?>