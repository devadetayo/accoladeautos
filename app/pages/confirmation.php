<?php
    $message = $_SESSION['confirmation_message'];
    unset($_SESSION['cart']);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Order Confirmation</title>
</head>
<body>
    <h1><?php echo $message; ?></h1>
    <p>Thank you for your order! We've sent your details to WhatsApp. You will receive a confirmation soon.</p>
</body>
</html>
