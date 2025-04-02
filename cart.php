








<?php
include 'config.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    header('location:login.php');
    exit();
}

$user_id = $_SESSION['user_id'];

// Update cart quantity
if (isset($_POST['update_cart'])) {
    $cart_id = $_POST['cart_id'];
    $cart_quantity = $_POST['cart_quantity'];

    $stmt = $conn->prepare("UPDATE `cart` SET quantity = ? WHERE id = ?");
    $stmt->bind_param("ii", $cart_quantity, $cart_id);
    $stmt->execute();
    $stmt->close();
    
    $_SESSION['message'] = 'Cart updated successfully!';
}

// Delete single item
if (isset($_GET['delete'])) {
    $delete_id = $_GET['delete'];

    $stmt = $conn->prepare("DELETE FROM `cart` WHERE id = ?");
    $stmt->bind_param("i", $delete_id);
    $stmt->execute();
    $stmt->close();
    
    header('location:cart.php');
    exit();
}

// Clear cart
if (isset($_GET['delete_all'])) {
    $stmt = $conn->prepare("DELETE FROM `cart` WHERE user_id = ?");
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $stmt->close();

    header('location:cart.php');
    exit();
}

// Fetch cart items
$cart_items = [];
$total_price = 0;

$stmt = $conn->prepare("SELECT cart.id, products.name, products.price, cart.quantity FROM cart 
                        JOIN products ON cart.product_id = products.id 
                        WHERE cart.user_id = ?");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

while ($row = $result->fetch_assoc()) {
    $cart_items[] = $row;
    $total_price += $row['price'] * $row['quantity'];
}
$stmt->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Shopping Cart</title>
    <link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/main.css">
</head>
<body>

<?php include 'header.php'; ?>

<main class="container mt-5">
    <h2>Your Cart</h2>

    <?php if (!empty($_SESSION['message'])): ?>
        <div class="alert alert-success"><?= $_SESSION['message']; unset($_SESSION['message']); ?></div>
    <?php endif; ?>

    <?php if (!empty($cart_items)): ?>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Product</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Total</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($cart_items as $item): ?>
                    <tr>
                        <td><?= $item['name']; ?></td>
                        <td>$<?= number_format($item['price'], 2); ?></td>
                        <td>
                            <form method="POST">
                                <input type="hidden" name="cart_id" value="<?= $item['id']; ?>">
                                <input type="number" name="cart_quantity" value="<?= $item['quantity']; ?>" min="1">
                                <button type="submit" name="update_cart" class="btn btn-warning">Update</button>
                            </form>
                        </td>
                        <td>$<?= number_format($item['price'] * $item['quantity'], 2); ?></td>
                        <td><a href="cart.php?delete=<?= $item['id']; ?>" class="btn btn-danger">Remove</a></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <h4>Total Price: $<?= number_format($total_price, 2); ?></h4>

        <a href="cart.php?delete_all=true" class="btn btn-danger">Clear Cart</a>
        <a href="checkout.php" class="btn btn-success">Proceed to Checkout</a>
    <?php else: ?>
        <p>Your cart is empty.</p>
    <?php endif; ?>
</main>

<?php include 'footer.php'; ?>

<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>
