<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="landowner.css" />
    <link rel="stylesheet" href="header.css">
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
    />
    <title>Document</title>
  </head>
  <body>
    <?php
    include "header.php";
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
    $location = $_POST["location"];
    $address = $_POST["address"];
    $size = $_POST["size"];

    // Prepare and execute the SQL statement
    $stmt = $pdo->prepare("INSERT INTO landowner_req (name, email, phone, location, address, size) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->execute([$name, $email, $phone, $location, $address, $size]);

    // Check if the data is inserted successfully
    if ($stmt->rowCount() > 0) {
        echo "
        <div class='uploadshow'>
        <h1>Your message sent successfully. <br> We will contact with you soon.</div>
        ";
    } else {
        echo "<div class='uploadshow'>
        <h1>Sorry, something went wrong. <br> Please try again later.</div>";
    }
}
?>
    <section class="landowner">
      <div class="landowner-container">
        <h2>LandOwner</h2>
      </div>
    </section>
    <section class="description">
      <div class="description-container">
        <div class="container-body">
          <h2>Joint Venture Land Development with us</h2>
          <p>
            Live in the luxurious comfort of an elegantly-designed architectural
            abode. We provide you with a home that complements your esteemed
            lifestyle and is constructed with the finest architectural
            masterpiece. Become a part of the stunning architecture, modern
            engineering, and ultimate comfort that defines the structures
            erected by DreamLand. <br /><br />
            You become entitled to more than just an urban lifestyle with
            DreamLand. In essence, you get to live sustainably and contentedly.
            DreamLand’s properties exhilarate a sanctuary aligned with serenity
            and tranquility. Therefore, ensuring that the ambiance of each
            property compliments nature with modern living and architecture.
            <br /><br />
            Simply contact us and rest assured we shall become a part of an
            architectural emblem.
          </p>
        </div>
        <div class="container-img">
          <img src="images/sonadanga.jpg" alt="" />
        </div>
      </div>
    </section>
    <section class="contact-form">
      <div class="contact-form-container">
        <form method="post">
          <h3>LandOwner's Information</h3>
          <input type="text" name="name" placeholder="Name*" required />
          <input
            type="tel" name="phone"
            placeholder="Phone Number*(+880-xxxxxxxxxx)"
            required
          />
          <input type="email" name="email" placeholder="E-mail*" required />
          <h3>Land Information</h3>
          <input type="text" name="location" placeholder="Location*" required />
          <input type="text" name="address" placeholder="Full Address*" required />
          <input type="text" name="size" placeholder="Land Size(In Katha)*" required />
          <button>Submit</button>
        </form>
      </div>
    </section>
    <?php
      include "footer.php";
    ?>
  </body>
</html>
