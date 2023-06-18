<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
$id="";
// Include config file
require_once "config.php";
$id=$_SESSION['id'];

// Define variables and initialize with empty values
$fullname = $phone = $nationality = $gender = $dob = $nid = $passport = $address= "";
$fullname_err = $phone_err = $nationality_err = $gender_err = $dob_err = $nid_err = $passport_err = $address_err ="";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Validate fullname
    if(empty(trim($_POST["fullname"]))){
        $fullname_err = "Please enter the Full Name.";     
    }else{
        $fullname = trim($_POST["fullname"]);
    }
    
    // Validate phone number
    if(empty(trim($_POST["phone"]))){
        $phone_err = "Please enter the phone number.";
    }elseif(strlen(trim($_POST["phone"])) != 11){
        $phone_err = "PHONE NUMBER MUST BE 11 DIGIT";
    }  else{
        $phone = trim($_POST["phone"]);    
    }

    //validate nationality
     if(empty(trim($_POST["nationality"]))){
        $nationality_err = "Please enter Nationality.";     
    }else{
        $nationality = trim($_POST["nationality"]);
    }
    //check gender
     if(empty(trim($_POST["gender"]))){
        $gender_err = "Please enter your gender.";     
    }else{
        $gender = trim($_POST["gender"]);
    }

    //check DOB
    //  if(empty(trim($_POST["dob"]))){
    //     $dob_err = "Please enter your DOB.";     
    // }else{
    //     $dob = trim($_POST["dob"]);
    // }
    $dob=$_POST["dob"];
    //check nid
     if(empty(trim($_POST["nid"]))){
        $nid_err = "Please enter your NID Number.";     
    }else{
        $nid = trim($_POST["nid"]);
    }

     //check passport
     if(empty(trim($_POST["passport"]))){
        $passport_err = "Please enter your PASSPORT Number.";     
    }else{
        $passport = trim($_POST["passport"]);
    }

    //check address
     if(empty(trim($_POST["address"]))){
        $address_err = "Please enter your address.";     
    }else{
        $address = trim($_POST["address"]);
    }

        
    // Check input errors before updating the database
    if(empty($fullname_err) && empty($phone_err) && empty($nationality_err) && empty($gender_err) && empty($dob_err) && empty($nid_err) && empty($passport_err) && empty($address_err)){
        // Prepare an update statement
        $query = "UPDATE user_reg SET fullname = ?, phone = ?, nationality = ?, gender = ?, dob = ?, nid = ?, passport = ?, address = ? WHERE id = ?";
        $stmt = mysqli_prepare($link, $query);
        mysqli_stmt_bind_param($stmt, 'ssssssssi', $fullname, $phone, $nationality, $gender, $dob, md5($nid), md5($passport), $address, $id);
        mysqli_stmt_execute($stmt);
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Password updated successfully. Destroy the session, and redirect to login page
                header("location: welcome.php");
                exit();
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
   
    
    // Close connection
    mysqli_close($link);
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
    <link rel="stylesheet" href="welcome.css">
    <link rel="stylesheet" href="header.css">
    <link rel="stylesheet" href="footer.css">
     <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
    />
    
</head>
<body>
    <?php
        include "header.php";

    ?>
    <h1 class="greeting">Hi, <b>"<?php echo htmlspecialchars($_SESSION["username"]); ?>"</b>. Welcome to your Dashboard</h1>
    <p class="container-btn">
        <a href="reset-password.php" class="link-btn">Reset Your Password</a>
        <a href="logout.php" class="link-btn">Sign Out of Your Account</a>
        
    </p>
    
    <!-- <p><img src="images/commercialchattogram.jpg" alt=""></p> -->
    <!-- <div class="container">
        <h2>Frequently asked question</h2>
        <button class="">How can i buy a flat?</button>
        <div><h4>You can buy it easily</h4></div>
    </div> -->
    <div class="container">
        <h2>Detailed Personal Information</h2>
        <form action="" method="POST">
            <input type="text" name="fullname" placeholder="Enter Full name*" required>    
            <!-- <input type="text" name="fullname" placeholder="Enter Full name*" required> -->
            <!-- <input type="email" name="email" placeholder="Enter Email" required> -->
            <input type="tel" name="phone" placeholder="Phone Number*" required>
            <input type="text" name="nationality" placeholder="Nationality*" required>
            <div class="radiobtn">
            <div class="radiobtn-section">

            
            <label for="gender">Gender: </label><input type="radio" name="gender" value="male"> Male
            <input type="radio" name="gender" value="female"> Female
            </div>
            <div class="radiobtn-section">


            <label for="date-of-birth">Date of Birth: </label><input type="date" name="dob"></div>
            </div>
            <input type="number" name="nid" placeholder="NID Number*" required>
            <input type="number" name="passport" placeholder="Passport Number*" required>
            <textarea id="address" name="address" placeholder="Present address*" required></textarea>
            <input class="btn" type="submit" name="submit" placeholder="Submit" value="Submit">
        </form>
    </div>
    <div class="container-body">
        <a href="index.php" class="home">Back to Home page <i class="fa-solid fa-arrow-right"></i></a>
    </div>

    <?php
        include "footer.php";
    ?>
</body>
</html>