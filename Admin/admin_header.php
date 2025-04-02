<?php
// Include database connection
include 'config.php';
if (session_status() === PHP_SESSION_NONE) {
   session_start();
}

// Check if admin is logged in
if (!isset($_SESSION['admin_id'])) {
    header('location:login.php');
    exit;
}

$admin_id = $_SESSION['admin_id'];

// Fetch admin details from database
$stmt = $conn->prepare("SELECT name, email FROM users WHERE id = ?");
$stmt->bind_param("i", $admin_id);
$stmt->execute();
$result = $stmt->get_result();
$admin_data = $result->fetch_assoc();

if ($admin_data) {
    $_SESSION['admin_name'] = $admin_data['name'];  // ✅ Store in session
    $_SESSION['admin_email'] = $admin_data['email'];  
} else {
    session_destroy();
    header('location:login.php');
    exit;
}
$stmt->close();
?>

<header class="header">
   <div class="flex">
      <a href="admin_page.php" class="logo">Admin<span>Panel</span></a>

      <nav class="navbar">
         <a href="admin_page.php">home</a>
         <a href="admin_products.php">products</a>
         <a href="admin_orders.php">orders</a>
         <a href="admin_users.php">users</a>
         <a href="admin_contacts.php">messages</a>
      </nav>

      <div class="icons">
         <div id="menu-btn" class="fas fa-bars"></div>
         <div id="user-btn" class="fas fa-user"></div>
      </div>

      <div class="account-box">
         <p>Username: <span><?php echo htmlspecialchars($_SESSION['admin_name']); ?></span></p>
         <p>Email: <span><?php echo htmlspecialchars($_SESSION['admin_email']); ?></span></p>
         <a href="../logout.php" class="delete-btn">logout</a>
         <div>new <a href="../login.php">login</a> | <a href="../register.php">register</a></div>
      </div>
   </div>
</header>
