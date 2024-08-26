<?php
session_start();

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
}

$response = array('success' => false, 'message' => 'Failed to update cart.');

if (isset($_POST['action'])) {
    $part_id = isset($_POST['part_id']) ? $_POST['part_id'] : null;
    $quantity = isset($_POST['quantity']) ? intval($_POST['quantity']) : 1;
    $action = $_POST['action'];

    // Handle the clear cart action
    if ($action === 'clear_cart') {
        $_SESSION['cart'] = array();
        $response = array(
            'success' => true,
            'message' => 'Cart cleared successfully.',
            'cartItemCount' => 0
        );
    } elseif ($action === 'add') {
        // If the part is already in the cart, show a message and increment the quantity
        if (isset($_SESSION['cart'][$part_id])) {
            $response = array(
                'success' => false,
                'message' => 'Item already added to cart.'
            );
        } else {
            // Add the new part to the cart
            $_SESSION['cart'][$part_id] = array('quantity' => $quantity);
            $response = array(
                'success' => true,
                'message' => 'Item added to cart.',
                'cartItemCount' => count($_SESSION['cart']),
                'quantity' => $quantity
            );
        }
    } elseif ($action === 'increment') {
        if (isset($_SESSION['cart'][$part_id])) {
            $_SESSION['cart'][$part_id]['quantity']++;
        }
    } elseif ($action === 'decrement') {
        if (isset($_SESSION['cart'][$part_id]) && $_SESSION['cart'][$part_id]['quantity'] > 1) {
            $_SESSION['cart'][$part_id]['quantity']--;
        }
    } elseif ($action === 'remove') {
        unset($_SESSION['cart'][$part_id]);
        $response = array(
            'success' => true,
            'message' => 'Item removed from cart.',
            'cartItemCount' => count($_SESSION['cart']),
            'quantity' => $quantity
        );
    }

    $cartItemCount = count($_SESSION['cart']);
    $response = array(
        'success' => true,
        'cartItemCount' => $cartItemCount,
        'message' => $response['message'],
        'quantity' => $_SESSION['cart'][$part_id]['quantity'] ?? 0,
        'partRemoved' => !isset($_SESSION['cart'][$part_id])
    );
} else {
    $response['message'] = 'Invalid action or part_id missing.';
}

// Send the response as JSON
echo json_encode($response);