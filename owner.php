<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="owner.css" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
    />
  <link rel="stylesheet" href="header.css">
    <title>Buyer | DreamLand</title>
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
    $type = $_POST["type"];
    $city = $_POST["city"];

    // Prepare and execute the SQL statement
    $stmt = $pdo->prepare("INSERT INTO owner_req (name, phone, email, type, city) VALUES (?, ?, ?, ?, ?)");
    $stmt->execute([$name, $phone, $email, $type, $city]);

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
        <h2>BUYER</h2>
      </div>
    </section>
    <section class="description">
      <div class="description-container">
        <div class="container-body">
          <h2>Joint Venture Land Development with us</h2>
          <p>
            When life demands you to settle down, it necessitates tranquility
            and a cozy atmosphere. Thus, you are obligated to allow yourself to
            be open to settling in the ideal home. DreamLand creates a
            comfortable and energetic living environment, just for you. Making a
            constant effort to ensure your satisfaction and comfort while
            enabling you to create priceless memories. <br /><br />
            DreamLand has been laying the foundations for that precise moment
            because they appreciate how important a turning point it will be for
            you. Thus, our condominiums, commercial and residential buildings,
            and apartments are structured and constructed with the modern
            architecture and style. With DreamLand, we search for all of the
            solutions to your preferences and enlighten with options to satisfy
            your desire for chic urban living.
          </p>
        </div>
        <div class="container-img">
          <img src="images/bashundhara.jpg" alt="" />
        </div>
      </div>
    </section>
    <section class="contact-form">
      <div class="contact-form-container">
        <form method="post">
          <h3>LandOwner's Information</h3>
          <input type="text" name="name" placeholder="Name*" required />
          <input
            type="tel"
            name="phone" 
            placeholder="Phone Number*(+880-xxxxxxxxxx)"
            required
          />
          <input type=" email" name="email"  placeholder="E-mail*" required />
          <select name="type" id="type" onchange="populate(this.id,'type2')">
            <option value="">--SELECT TYPE--</option>
            <option value="residential">Residential</option>
            <option value="commercial">Commercial</option>
            <option value="condominium">Condominium</option>
          </select>
          <select name="city" id="type2">
            <option value="">--SELECT CITY--</option>
          </select>
          <button>Submit</button>
        </form>
      </div>
    </section>
    <?php
      include "footer.php";
    ?>
    <script src="script.js"></script>
  </body>
</html>
