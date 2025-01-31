<?php

// Load PHPMailer library
require 'PHPMailer/PHPMailerAutoload.php'; // Include PHPMailer

// Database connection settings
$servername = 'sql111.infinityfree.com'; 
$dbname = 'if0_38194361_shopping';    
$dbusername = 'if0_38194361';           
$dbpassword = 'goeskQX6J69wO'; 

// Create a connection
$conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get POST data with validation
$userId = isset($_POST['userId']) ? (int) $_POST['userId'] : 0;
$cartId = isset($_POST['cartId']) ? (int) $_POST['cartId'] : 0;

// Fetch user email based on user_id
$emailQuery = "SELECT email FROM user WHERE id = ?";
$stmt = $conn->prepare($emailQuery);
$stmt->bind_param("i", $userId);
$stmt->execute();
$emailResult = $stmt->get_result();

// Check if the email was fetched successfully
if ($emailResult->num_rows > 0) {
    $userEmail = $emailResult->fetch_assoc()['email']; // Get the email of the user
} else {
    die("User not found or email not available.");
}

// Fetch cart items based on user_id and cart_id
$itemQuery = "SELECT c.id, c.quantity, p.name, p.price, (p.price * c.quantity) AS subtotal
              FROM cart c
              JOIN products p ON c.product_id = p.id
              WHERE c.user_id = ? AND c.id = ?";
$stmt = $conn->prepare($itemQuery);
$stmt->bind_param("ii", $userId, $cartId);
$stmt->execute();
$result = $stmt->get_result();

// Fetch cart items
$cartItems = [];
while ($row = $result->fetch_assoc()) {
    $cartItems[] = $row;
}

// Fetch total amount for the cart
$totalQuery = "SELECT total FROM cart_total WHERE user_id = ? AND cart_id = ?";
$stmt = $conn->prepare($totalQuery);
$stmt->bind_param("ii", $userId, $cartId);
$stmt->execute();
$totalResult = $stmt->get_result();
$totalAmount = $totalResult->fetch_assoc()['total'];

// Close the database connection
$stmt->close();
$conn->close();

// Check if cart items are available
if (empty($cartItems)) {
    die("No items found for this user and cart.");
}

// Create HTML content for the email
$message = "<html><body>";
$message .= "<h2>Your Cart Details (Cart ID: $cartId)</h2>";
$message .= "<table border='1' cellpadding='5' cellspacing='0' style='border-collapse: collapse;'>";
$message .= "<tr><th>Item</th><th>Price</th><th>Quantity</th><th>Subtotal</th></tr>";

// Loop through the cart items and add them to the email body
foreach ($cartItems as $item) {
    $message .= "<tr>";
    $message .= "<td>" . htmlspecialchars($item['name']) . "</td>";
    $message .= "<td>" . htmlspecialchars($item['price']) . "</td>";
    $message .= "<td>" . htmlspecialchars($item['quantity']) . "</td>";
    $message .= "<td>" . htmlspecialchars($item['subtotal']) . "</td>";
    $message .= "</tr>";
}

$message .= "</table>";
$message .= "<br><strong>Total: " . htmlspecialchars($totalAmount) . "</strong>";
$message .= "<br><p>Thank you for shopping with us!</p>";
$message .= "</body></html>";

// Create a new PHPMailer instance
$mail = new PHPMailer(true);

try {
    // Server settings for PHPMailer
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'jahnviaghera@gmail.com'; 
    $mail->Password = 'junjjfagzmwlxuoi';  // Use your app password securely
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;

    // Set the email sender and recipient
    $mail->setFrom('jahnviaghera@gmail.com', 'Your Store');
    $mail->addAddress($userEmail);  // Send the email to the user's email address

    // Content
    $mail->isHTML(true);
    $mail->Subject = 'Your Cart Details';
    $mail->Body = $message;

    // Send email
    if ($mail->send()) {
        echo 'Email sent successfully.';
    } else {
        echo 'Failed to send email. Please try again later.';
    }
} catch (Exception $e) {
    // Log detailed error message
    error_log("Mailer Error: {$mail->ErrorInfo}");
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

?>
