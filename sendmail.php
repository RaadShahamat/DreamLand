<?php
// Database connection settings
$host = 'localhost';
$db_name = 'user_login_test';
$db_user = 'root';
$db_password = '';

// Establish database connection
try {
    $pdo = new PDO("mysql:host=$host;dbname=$db_name", $db_user, $db_password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form data
    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $message = $_POST["message"];

    // Prepare and execute the SQL statement
    $stmt = $pdo->prepare("INSERT INTO homeloan_req (name, email, phone, message) VALUES (?, ?, ?, ?)");
    $stmt->execute([$name, $email, $phone, $message]);

    // Check if the data is inserted successfully
    if ($stmt->rowCount() > 0) {
        echo "Data stored successfully!";
    } else {
        echo "Sorry, there was an error storing your data. Please try again later.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>User Data Form</title>
</head>
<body>
    <h1>User Data Form</h1>
    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" required><br><br>

        <label for="email">Email:</label>
        <input type="email" name="email" id="email" required><br><br>

        <label for="phone">Phone Number:</label>
        <input type="tel" name="phone" id="phone" required><br><br>

        <label for="message">Message:</label><br>
        <textarea name="message" id="message" required></textarea><br><br>

        <input type="submit" value="Submit">
    </form>
</body>
</html>
