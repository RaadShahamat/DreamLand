
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="homeloan.css" />
    <link rel="stylesheet" href="header.css">
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
    />
    <!-- <link rel="stylesheet" href="header.css"> -->
    <link
      href="https://fonts.googleapis.com/css2?family=Amatic+SC:wght@700&family=Inconsolata:wght@700&family=Indie+Flower&family=Merriweather:ital,wght@1,300&family=Montserrat:wght@900&family=Sacramento&family=Space+Mono&family=Ubuntu&display=swap"
      rel="stylesheet"
    />
    <title>HomeLoan | DreamLand</title>
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
    $message = $_POST["message"];

    // Prepare and execute the SQL statement
    $stmt = $pdo->prepare("INSERT INTO homeloan_req (name, email, phone, message) VALUES (?, ?, ?, ?)");
    $stmt->execute([$name, $email, $phone, $message]);

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

    <section class="homeloan">
      <div class="homeloan-container">
        <h2>Home Loan</h2>
      </div>
    </section>
    <section class="description">
      <div class="description-container">
        <div class="container-body">
          <h2>It is the time...</h2>
          <p>
            Anything you can envision, you shall have it! With a home loan, you
            can buy the perfect house. Therefore, we assist in finding all the
            information you need to apply for a home loan right here and
            obtaining a mortgage loan from any bank or non-bank financial
            institute. Thus, fair terms, complete transparency, and flexibility
            are guaranteed. However, nothing should stand in the way of someone
            owning a home, in our opinion. <br /><br />
            The City Bank Ltd, Mutual Trust Bank Ltd, Prime Bank Ltd, IPDC
            Finance, Shimanto Bank Ltd, BD Finance, Standard Chartered Bank,
            Modhumoti Bank, Community Bank, Dhaka Bank, Meghna Bank, IDLC, Brac
            Bank, IFIC, Pubali Bank, NRBC Bank are just a few of the banks and
            financial institutions with which we have affiliations.
          </p>
        </div>
        <div class="container-img">
          <img src="images/cover.jpg" alt="" />
        </div>
      </div>
    </section>
    <div class="bank-partners">
      <img src="images/16601410735xbMu.svg" alt="" />
      <img src="images/1660141121g21nX.svg" alt="" />
      <img src="images/1660141088N515F.svg" alt="" />
      <img src="images/1660141073n3FoS.svg" alt="" />
      <img src="images/1660141088LqKIL.svg" alt="" />
    </div>
    <section class="contact-form">
      <h2>Contact with Us</h2>
      <div class="contact-form-container">
        <form method="post">
          <input type="text" name="name" placeholder="Name*" required />
          <input type=" email"name="email" placeholder="E-mail*" required />
          <input type=" tel" name="phone" placeholder="Phone-number*" required />
          <textarea
            placeholder="leave a message"
            rows="2"
            cols="100"
            name="message"
          ></textarea>
          <button type="submit" name="submit">Submit</button>
        </form>
      </div>
    </section>
    <?php
     include "footer.php";
    ?>
  </body>
</html>
