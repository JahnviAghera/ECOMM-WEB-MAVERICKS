<?php
// Include session, header, and navbar as you did before
include 'includes/session.php';
include 'includes/header.php';
?>

<?php
session_start();
ini_set('display_errors', 1); // Enable error display
error_reporting(E_ALL); // Report all errors

// Email sending function
if (isset($_POST['items']) && isset($_POST['total'])) {
    $cartItems = $_POST['items'];
    $totalAmount = $_POST['total'];
    $host = 'smtp.gmail.com';
    $port = 587; // TLS port
    $username = 'jahnviaghera@gmail.com'; // Your Gmail address
    $password = 'junjjfagzmwlxuoi'; // Your Google App Password
    $from = 'jahnviaghera@gmail.com';
    $to = 'jahnviaghera@gmail.com';
    $subject = 'Order Confirmation';
    
    // Compose the email body with cart details
    $message = "Thank you for your order!\n\n";
    $message .= "Here are your cart details:\n\n";

    foreach ($cartItems as $item) {
        $message .= "Item: " . $item['name'] . "\n";
        $message .= "Price: " . $item['price'] . "\n";
        $message .= "Quantity: " . $item['quantity'] . "\n";
        $message .= "Subtotal: " . $item['subtotal'] . "\n\n";
    }

    $message .= "Total: " . $totalAmount . "\n\n";
    $message .= "We will process your order shortly.";

    // Open a connection to the Gmail SMTP server
    $connection = stream_socket_client("tcp://$host:$port", $errno, $errstr, 30);

    if (!$connection) {
        die("Failed to connect to the SMTP server: $errstr ($errno)");
    }

    // Read the server's initial response
    $response = fgets($connection, 512);
    if (strpos($response, '220') === false) {
        die("SMTP server connection failed: $response");
    }

    // Send EHLO command
    fwrite($connection, "EHLO localhost\r\n");
    $response = '';
    while ($line = fgets($connection, 512)) {
        $response .= $line;
        if (strpos($line, '250 ') === 0) break; // End of multi-line response
    }

    // Check for STARTTLS support
    if (strpos($response, '250-STARTTLS') === false) {
        die("STARTTLS not supported by the server.");
    }

    // Request STARTTLS
    fwrite($connection, "STARTTLS\r\n");
    $response = fgets($connection, 512);
    if (strpos($response, '220') === false) {
        die("STARTTLS command failed: $response");
    }

    // Enable TLS encryption
    stream_socket_enable_crypto($connection, true, STREAM_CRYPTO_METHOD_TLSv1_2_CLIENT);

    // Send EHLO again after STARTTLS
    fwrite($connection, "EHLO localhost\r\n");
    $response = '';
    while ($line = fgets($connection, 512)) {
        $response .= $line;
        if (strpos($line, '250 ') === 0) break; // End of multi-line response
    }

    // Start authentication
    fwrite($connection, "AUTH LOGIN\r\n");
    $response = fgets($connection, 512);
    if (strpos($response, '334') === false) {
        die("AUTH LOGIN command failed: $response");
    }

    // Send base64-encoded username
    fwrite($connection, base64_encode($username) . "\r\n");
    $response = fgets($connection, 512);
    if (strpos($response, '334') === false) {
        die("Username authentication failed: $response");
    }

    // Send base64-encoded password
    fwrite($connection, base64_encode($password) . "\r\n");
    $response = fgets($connection, 512);
    if (strpos($response, '235') === false) {
        die("Password authentication failed: $response");
    }

    // Send MAIL FROM command
    fwrite($connection, "MAIL FROM:<$from>\r\n");
    $response = fgets($connection, 512);
    if (strpos($response, '250') === false) {
        die("MAIL FROM command failed: $response");
    }

    // Send RCPT TO command
    fwrite($connection, "RCPT TO:<$to>\r\n");
    $response = fgets($connection, 512);
    if (strpos($response, '250') === false) {
        die("RCPT TO command failed: $response");
    }

    // Send DATA command
    fwrite($connection, "DATA\r\n");
    $response = fgets($connection, 512);
    if (strpos($response, '354') === false) {
        die("DATA command failed: $response");
    }

    // Compose and send the email content
    $email_content = "From: $from\r\n";
    $email_content .= "To: $to\r\n";
    $email_content .= "Subject: $subject\r\n";
    $email_content .= "MIME-Version: 1.0\r\n";
    $email_content .= "Content-Type: text/plain; charset=UTF-8\r\n";
    $email_content .= "\r\n"; // End of headers
    $email_content .= $message . "\r\n.\r\n"; // End of message

    fwrite($connection, $email_content);
    $response = fgets($connection, 512);
    if (strpos($response, '250') === false) {
        die("Message send failed: $response");
    }

    // Send QUIT command to end the session
    fwrite($connection, "QUIT\r\n");
    $response = fgets($connection, 512);

    // Close the connection
    fclose($connection);

    echo "Email sent successfully.";
}
?>
<body class="hold-transition skin-blue layout-top-nav">
<div class="wrapper">

  <?php include 'includes/navbar.php'; ?>
   
  <div class="content-wrapper">
    <div class="container">

      <!-- Main content -->
      <section class="content">
        <div class="row">
          <div class="col-sm-9">
            <h1 class="page-header">YOUR CART</h1>
            <div class="box box-solid">
              <div class="box-body">
                <table class="table table-bordered">
                  <thead>
                    <th></th>
                    <th>Photo</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th width="20%">Quantity</th>
                    <th>Subtotal</th>
                  </thead>
                  <tbody id="tbody">
                  </tbody>
                </table>
              </div>
            </div>
            <?php
              if (isset($_SESSION['user'])) {
                echo "<button id='checkout-button' class='btn btn-primary'>Checkout</button>";
              } else {
                echo "<h4>You need to <a href='login.php'>Login</a> to checkout.</h4>";
              }
            ?>
          </div>
        </div>
      </section>
     
    </div>
  </div>

  <?php $pdo->close(); ?>
  <?php include 'includes/footer.php'; ?>
</div>

<?php include 'includes/scripts.php'; ?>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
// Function to handle checkout and send email
function sendBillEmail(cartItems, totalAmount) {
    // Prepare email content (simplified here, should match actual function you need)
    var emailContent = "Thank you for your order! Here are your cart details:\n";
    cartItems.forEach(function(item) {
        emailContent += item.name + " x" + item.quantity + " = " + item.subtotal + "\n";
    });
    emailContent += "Total Amount: " + totalAmount;

    // Create the data object for the AJAX request
    var emailData = {
        items: cartItems,
        total: totalAmount,
        content: emailContent,
    };

    // Send AJAX request to PHP script to send the email
    $.ajax({
        type: 'POST',
        url: 'send_email.php',  // PHP script that handles email sending
        data: emailData,
        success: function(response) {
            if (response == "success") {
                alert("Your order has been placed and the confirmation email has been sent.");
            } else {
                alert("There was an error sending the email.");
            }
        },
        error: function() {
            alert("There was an error processing your request.");
        }
    });
}


var total = 0;

$(document).ready(function(){
  // Handle adding, removing, and updating cart items
  $(document).on('click', '#checkout-button', function(e){
    e.preventDefault();

    // Prepare order details
    var cartItems = [];  // Array to hold cart items for email
    var totalAmount = total; // The total amount of the cart
    
    // Collecting cart details
    $('#tbody tr').each(function(){
      var item = {
        name: $(this).find('td:nth-child(3)').text(),
        price: $(this).find('td:nth-child(4)').text(),
        quantity: $(this).find('input[type="number"]').val(),
        subtotal: $(this).find('td:nth-child(6)').text()
      };
      cartItems.push(item);
    });

    // Send the email directly after checkout
    sendBillEmail(cartItems, totalAmount);  // Send the email with the cart items and total amount
    alert("Your order has been processed successfully!");
  });

  getDetails();
  getTotal();
});

// Fetch cart details
function getDetails(){
  $.ajax({
    type: 'POST',
    url: 'cart_details.php',
    dataType: 'json',
    success: function(response){
      $('#tbody').html(response);
      getCart();
    }
  });
}

function getTotal(){
  $.ajax({
    type: 'POST',
    url: 'cart_total.php',
    dataType: 'json',
    success: function(response){
      total = response;
    }
  });
}

</script>
</body>
</html>
