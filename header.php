<?php
// Initialize the session
  // session_start();
  require_once "config.php";

?>
<div class="naving" id="navbar">
   <div class="heading">
        <header>
            <h1><i class="fa-solid fa-d"></i>reamLand</h1>
            <ul>
                <li><a href="index.php#About">Home</a></li>
                <li><a href="index.php#Service">Service</a></li>
                <li class="dropdown">
                  <a onclick="ion()" class="dropbtn">Projects</a>
                <ul id="myDropdown" class="dropdown-content">
                  <a  href="projects.php?status=Ongoing">Ongoing</a>
                  <a href="projects.php?status=Ready">Ready</a>
                  <a name="Upcoming" href="projects.php?status=Upcoming">Upcoming</a>
              </ul>
          
              </li>
                <li><a href="index.php#Contact">Contact</a></li>
                
                <?php 
                    if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
                      echo"
                        <li><a href='#'>$_SESSION[username]</a></li>
                        <li><a href='logout.php' class='triggerLogin'>Logout</a></li>
                      ";
                    }
                    else{
                      echo "
                        <li><a href='login.php' class='triggerLogin'>Login</a></li>
                        <li><a href='registration.php' class='triggerLogin'>Register</a></li>
                      ";
                    }
                ?>
                
        
            </ul>
              <!-- <a href="#About">Home</a>
            <a href="#Service">Service</a>
            <a href="#Project">Project</a>
            <a href="#Contact">Contact</a>
            <a href="/login.php" class="logIn">LogIn</a>
            <a href="/login.php">SignUp</a> -->
        </header>
        <button><i class="fa-solid fa-bars"></i></button>
    </div>
</div>
        <ul class="vertical-link">
          <li class="home-link">
            <a href="#About">Home</a>
          </li>
          <li class="service-link">
            <a href="#Service">Service</a>
          </li>
          <li class="project-link">
            <a href="#Project">Project</a>
          </li>
          <li class="contact-link">
            <a href="#Contact">Contact</a>
          </li>
          <?php 
            if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
              echo"
              <li><a href='#'>$_SESSION[username]</a></li>
              <li><a href='logout.php' class='triggerLogin'>Logout</a></li>
               ";
               }
            else{
              echo "
                <li><a href='login.php' class='triggerLogin'>Login</a></li>
                <li><a href='registration.php' class='triggerLogin'>Register</a></li>
                ";
                }
          ?>
          
          </li>
        </ul>

        <script>
var prevScrollpos = window.pageYOffset;
window.onscroll = function() {
var currentScrollPos = window.pageYOffset;
  if (prevScrollpos > currentScrollPos) {
    document.getElementById("navbar").style.top = "0";
  } else {
    document.getElementById("navbar").style.top = "-150px";
  }
  prevScrollpos = currentScrollPos;
}
</script>
 <script>
/* When the user clicks on the button, 
toggle between hiding and showing the dropdown content */
function ion() {
  document.getElementById("myDropdown").classList.toggle("show");
}

// Close the dropdown if the user clicks outside of it
window.onclick = function(event) {
  if (!event.target.matches('.dropbtn')) {
    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}
</script>

  