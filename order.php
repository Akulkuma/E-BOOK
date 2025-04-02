<?php
include 'config.php';
session_start();

$user_id = $_SESSION['user_id'];

if (!isset($user_id)) {
    header('location:login.php');
}

// Fetch user details
$user_query = mysqli_query($conn, "SELECT * FROM users WHERE id = '$user_id'");
$user = mysqli_fetch_assoc($user_query);

// Fetch orders
$order_query = mysqli_query($conn, "SELECT * FROM orders WHERE user_id = '$user_id' ORDER BY id DESC");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Page</title>

    <!-- Bootstrap & FontAwesome -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link href="assets/css/main.css" rel="stylesheet">
</head>

<body>

<?php include 'header.php'; ?>

<div class="container order-container">
    <h2 class="text-center">Your Orders</h2>

    <div class="user-info">
        <p><strong>Name:</strong> <?php echo $user['name']; ?></p>
        <p><strong>Email:</strong> <?php echo $user['email']; ?></p>
        <p><strong>Address:</strong> <?php echo isset($user['address']) ? $user['address'] : 'No address provided'; ?></p>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered text-center">
            <thead>
                <tr>
                    <th>Order ID</th>
                    <th>Items</th>
                    <th>Total Amount</th>
                    <th>Status</th>
                    <th>Order Date</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($order = mysqli_fetch_assoc($order_query)) { ?>
                <tr>
                    <td>#<?php echo $order['id']; ?></td>
                    <td><?php echo $order['items']; ?></td>
                    <td>₹<?php echo $order['total_price']; ?></td>
                    <td><span class="badge bg-success"><?php echo $order['status']; ?></span></td>
                    <td><?php echo $order['order_date']; ?></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

    <a href="home.php" class="btn btn-success btn-lg">Continue Shopping</a>
</div>

<?php include 'footer.php'; ?>

<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/js/main.js"></script>

</body>
</html>
