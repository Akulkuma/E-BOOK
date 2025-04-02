<?php
if(isset($message)){
   foreach($message as $message){
      echo '
      <div class="message">
         <span>'.$message.'</span>
         <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
      </div>
      ';
   }
}
?>
<header id="header" class="header d-flex align-items-center fixed-top">
<div class="header-1">
         <p>New<a href="login.php">login</a> | <a href="register.php">register</a> </p>
      </div>
   </div>
    <div class="container-fluid container-xl position-relative d-flex align-items-center">

      <a href="home.php" class="logo d-flex align-items-center me-auto">
        <h1 class="sitename">E-BOOK</h1>
      </a>

      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="home.php" class="active">Home<br></a></li>
          <li><a href="about.php">About</a></li>
          <li><a href="shop.php">Shop</a></li>
          <li><a href="order.php">Orders</a></li>
          <li><a href="contact.php">Contact</a></li>
          <li> <div class="user-box hidden">
            <p>username : <span><?php echo $_SESSION['user_name']; ?></span></p>
            <p>email : <span><?php echo $_SESSION['user_email']; ?></span></p>
            <a href="logout.php" class="btn btn-danger ">logout</a>
         </div></li>
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>
      <div class="icons">
            <div id="user-btn btn btn-light position-relative" class="fas fa-user"></div>
            <?php
               $select_cart_number = mysqli_query($conn, "SELECT * FROM cart WHERE user_id = '$user_id'") or die('query failed');
               $cart_rows_number = mysqli_num_rows($select_cart_number); 
            ?>
            <a href="cart.php"> <i class="fas fa-shopping-cart"></i> <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">(<?php echo $cart_rows_number; ?>)</span> </a>
         </div>
      </div>
    </div>
  </header> 